<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Category;
use App\Http\Requests\AdminChangePasswordRequest;
use App\Http\Requests\createAdminRequest;
use App\Http\Requests\editAdminRequest;
use App\Http\Requests\editMyProfileRequest;
class UserController extends Controller
{
    protected $auth;

    public function __construct() {
        $this->auth = Auth::guard('admin');
    }

/** hiện danh sách các admin*/
    public function index() {
        $users = User::where([
            ['id', '!=', $this->auth->user()->id],
            ['role', '!=', 2],
        ])->paginate(6);
        return view('admin.users.index', compact('users'));
    }

/** tạo  1 admin */
    public function create() {
        $user=$this->auth->user();
        if($user->cant('create',$user)){
            return redirect()->back()->withErrors(['rpErrorCreate'=>'done']);
        }
        return view('admin.users.create');
    }

    public function postCreate(createAdminRequest $request){
        //dd($request->all());
        User::create([
            'full_name'=> $request->full_name,
            'email' => $request->email,
            'location' => $request->location,
            'password' => bcrypt($request->passwordAdmin),
            'role' => '1',
            'email_public' => '0',
            'description' => 'gà mờ',
            'point' => '1000',
            'image' =>'user.png'
        ]);

        return redirect()->back()->with('sussces','create susscess');
    }

    /** tìm kiếm Admin bằng ajax*/
    public function AjaxSearchAdmin(Request $request){
        if ($request->search){
            $users = User::where('full_name','like',"%$request->search%")->paginate(6);
        } else {
            $users = User::paginate(6);
        }

        return view('jax.search_admin', compact('users'));

    }

/** thông tin của user*/
    public function profile() {
        $user = User::findOrFail($this->auth->user()->id);

        return view('admin.users.profile', compact('user'));
    }

/** thay đổi mật khẩu */
    public function createChangePassword($id) {
        $auth = $this->auth->user();
        $user = User::findOrFail($id);
        if ($auth->cant('changePassword', $user)) {
            return redirect()->route('admin.account_list');
        }
        return view('admin.users.changePassword', compact('id'));
    }

    public function postChangePassword(AdminChangePasswordRequest $request, $id) {
        $user = User::findOrFail($id);
        $user->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('success', 'Change Password Success!');
    }

    /** chỉnh sửa tài khoản admin con */
    public function editAdmin($id){
        $user=$this->auth->user();
        $model2=User::find($id);
        if($user->cant('create', $model2)){
            return redirect()->back();
        }
        return view('admin.users.editAdmin',['user'=>$model2]);
    }
    public function postEditAdmin(editAdminRequest $request, $id){
        $user=User::find($id);
        $user->full_name = $request->full_name;
        $user->location = $request->location;
        $user->email = ($user->email==$request->emai) ? $user->email : $request->email ;
        $user->role = $request->role;
        $user->save();
        return redirect()->back()->with('sussces','sussces');

    }
    /** chỉnh sửa tài khoản của mình */
    public function editmyprofile($id){
        $user=$this->auth->user();
        $model2=User::find($id);
        if($user->cant('update',$model2)){
            return redirect()->back();
        }
        return view('admin.users.edit_myprofile',['user'=>$model2]);
    }
    public function editPostMyProfile(editMyProfileRequest $request,$id){
        $user=User::find($id);
        $user->full_name = $request->full_name;
        $user->location = $request->location;
        $user->description = $request->description;
        $user->email_public = $request->public;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time()."_".$file->getClientOriginalName();
            $path = public_path('/images/icon');
            $file->move($path, $name);
            if($user->image!="user.png"){
                unlink($path.'/'.$user->image);
            }
            $user->image=$name;
        }
        $user->save();
        return redirect()->back()->with('sussces','susscess');
    }
}
