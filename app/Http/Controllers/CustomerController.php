<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCustomerRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mail;

class CustomerController extends Controller
{
    /** đăng kí*/
    public function CreateAccount(RegisterRequest $request)
    {
        $email_public = ($request->public == "on") ? 1 : 0;
        // xử lí hình ảnh
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(config('image.imgUser'), $name);
        } else {
            $name = 'user.png';
        }
        $user = User::create(array(
            'full_name' => $request->name,
            'location' => $request->address,
            'email' => $request->email,
            'description' => $request->aboutme,
            'password' => bcrypt($request->password),
            'image' => $name,
            'email_public' => $email_public,
            'role' => 0
        ));
        Auth::login($user);
        return redirect()->back();
    }

    /** Đăng nhập */
    public function Login(Request $request)
    {
        $this->checkLogin($request);

        if (Auth::attempt(['email' => $request->email1, 'password' => $request->password1, 'role' =>0 ])) {
            return redirect()->back();
        }
        return redirect()->back()->with('messager_login', 'Wrong username and password');
    }

    /** đăng xuất*/
    public function Logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    /** thông tin người dùng */
    public function Getprofile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $posts=Post::where('user_id',$user->id)->where('status',1)->paginate(4);
            return view('profile', ['user' => $user,'posts'=>$posts]);
        }
        return redirect()->route('index');
    }
    /** thông tin những người theo dõi */
    public function getFollowUser($id){
        $users=User::find($id);
       return view('profile_follow', ['users'=> $users]);
    }
    /** tìm kiếm users*/
    public function searchUser(Request $request){
            $users=User::where('full_name', 'like', "%$request->search%")->where('role',0)->get();
            return view('search_users', ['users'=> $users]);
    }
    /** sửa thông tin người dùng và đổi mật khẩu
     */
    public function UpdateProfile(EditCustomerRequest $request)
    {
        $user = Auth::user();
        $user->full_name = $request->nameEdit;
        $user->location = $request->addressEdit;
        $user->description = $request->aboutmeEdit;
        $user->email_public = ($request->public == "on") ? 1 : 2;
        // hình ảnh
        if ($request->hasFile('fileEdit')) {
            $file = $request->file('fileEdit');
            $name = time() . "_" . $file->getClientOriginalName();
            $file->move(config('image.imgUser'), $name);
            if ($user->image != 'user.png') {
                unlink(config('image.imgUser') . $user->image);
            }
            $user->image = $name;
        }

        if ($request->passwordOld || $request->passwordEdit || $request->repasswordEdit) {
            if (Hash::check($request->passwordOld, $user->password)) {
                $this->checkChangePassword($request);
                $user->password = bcrypt($request->passwordEdit);
            } else {
                return redirect()->back()->with('ReportChangePassword', 'Password is incorrect');
            }
        }
        $user->save();

        return redirect()->back();
    }

    /** lấy danh sách người dùng theo điểm */
    public function GetListUserPoint()
    {

        $users = User::orderBy('point', 'DESC')->where('role',0)->paginate(9);

        return view('user_point', ['users' => $users]);
    }

    /** thong tin nguoi dung theo id*/
    public function DetailProfile($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id',$user->id)->where('status',1)->paginate(4);
        if($user->role==0) {
            return view('profile', ['user' => $user,'posts' => $posts]);
        }
        return redirect()->back();
    }


   /** lấy danh sát người dùng theo tên alpha*/
   public function GetListUser(){
       foreach (range('A', 'Z') as $i){
           $users=User::where('full_name', 'like', "$i%")->where('role',0)->get()->toArray();
           if($users){
               $listUsers[$i]=$users;
           }
       }
       return view('user', ['listUsers'=> $listUsers]);
   }
   /** gửi email hỗ trợ lấy mật khẩu*/
   public function SendEmail(Request $request){
        $email=$request->emailforget;
        $user=User::where('email',  $email)->first();
        $ramdom=rand(10000000, 99999999);
        if($user) {
            $user->code=$ramdom;

            $user->save();
            Mail::send('form_email', array('code' => $ramdom), function ($message) use ($email) {
                $message->to($email, 'Visitor')->subject('forget password');
                $message->from('khoanld98@gmail.com', '1q231345');
            });
            return redirect()->route('customer.check.code', $user->id);
        }
        return redirect()->back()->with('messager_email', ' Email is incorrect');
    }

    /** nhập code từ email*/
    public function CheckCodeForget($id)
    {

        return view('verify_code_email', ['id' => $id]);
    }

    /** xác thực code và thay đổi mật khẩu theo code*/
    public function VerifyCode(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->code == $request->codeforget) {
            $user->password = bcrypt($request->codeforget);
            $user->save();
            Auth::login($user);
            return redirect()->route('index');
        }
        return redirect()->back()->with('errorcode', 'You entered the wrong code');
    }

    /** kiem tra mat khau*/
    public function checkChangePassword(Request $request)
    {
        $this->validate($request, [
            'passwordEdit' => 'required|min:8|max:16',
            'repasswordEdit' => 'same:passwordEdit'
        ], [
            'passwordEdit.required' => 'enter password',
            'passwordEdit.min' => 'Password is greater than 8 characters',
            'passwordEdit.max' => 'Password must be less than 16 characters',
            'repasswordEdit.same' => 'The two passwords do not match'
        ]);
    }

    /** validate email và passowrd*/
    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'email1' => 'required|email',
            'password1' => 'required'
        ], [
            'email1.required' => 'enter email',
            'password1.required' => 'enter password'
        ]);
    }
}
