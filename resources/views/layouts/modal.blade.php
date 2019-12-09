<!-- modal ask question -->

<div class="modal fade" id="ask_question">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#menu1">Ask a Question</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="menu1">
                        <div class="main_info">
                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Your question</label>
                                    <input type="text" name="title" class="form-control">
                                    @if( $errors->has('title') )
                                        <div class="alert alert-primary">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label >Category</label>
                                    <input type="text" name="categories" data-role="tagsinput" class="form-control">
                                    @if( $errors->has('categories') )
                                        <div class="alert alert-primary">{{ $errors->first('categories') }}</div>
                                    @endif
                                </div>
                                <div>
                                    <textarea name="content" id="ck_editor2" class="ck_editor"></textarea>
                                    @if( $errors->has('content') )
                                        <div class="alert alert-primary">{{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label >Tag (max 5 tag)</label>
                                    <input type="text" name="tags" data-role="tagsinput" class="form-control">
                                    @if($errors->has('tags'))
                                        <div class="alert alert-primary">{{ $errors->first('tags') }}</div>
                                    @endif
                                </div>
                                <div class="form-sent">
                                    <button type="submit">Submit question</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal dang nhap -->
<div class="modal fade" id="signin">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sign In</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('customer.login') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email1" class="form-control" >
                        @if( $errors->has('email1') )
                            <div class="alert alert-primary">{{ $errors->first('email1') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Password</label>
                        <div class="box-pass">
                            <input type="password" name="password1"  class="form-control" >
                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if( $errors->has('password1') )
                                <div class="alert alert-primary">{{ $errors->first('password1') }}</div>
                            @endif
                        </div>
                    </div>
                    @if(session('messager_login'))
                        <div class="alert alert-danger">{{ session('messager_login') }}</div>
                     @endif
                    <div class="box-btn">
                        <button type="submit">Sign in</button>
                        <p class="forgot" data-toggle="modal" data-target="#forgot" data-dismiss="modal">Forgot password</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal doi password -->
<div class="modal fade" id="forgot">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Forgot password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('customer.send.email') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="emailforget" class="form-control">
                        @if( session('messager_email') )
                            <div class="alert alert-danger">{{ session('messager_email') }}</div>
                         @endif
                    </div>
                    <div class="box-btn">
                        <button type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal đăng ký  -->
<div class="modal fade" id="register">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('customer.register') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-add-avatar">
                        <div class="box-img">
                            <img class="blah" src="{{ asset('images/icon/user.png') }}" alt="">
                        </div>

                        <div class="upload-avatar">
                            <input name="file" id="upload" type="file" onchange="readURL(this);">
                            <label for="upload">
                            <i class="fa fa-pencil"></i>
                            </label>
                        </div>
                        @if( $errors->has('file') )
                            {{ $errors->first('file') }}
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Full name <span>*</span></label>
                        <input name="name" type="text" class="form-control" id="name">
                        @if( $errors->has('name') )
                        <div class="alert alert-primary">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="address" class="form-control" id="location">
                        @if( $errors->has('address') )
                            <div class="alert alert-primary">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email <span>*</span></label>
                        <input type="email" class="form-control" name="email" >
                        @if( $errors->has('email') )
                            <div class="alert alert-primary">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="public"> Make this email public</label>
                    </div>
                    <div class="form-group">
                        <label >About me <span>*</span></label>
                        <textarea name="aboutme"  rows="5" class="form-control"></textarea>
                        @if( $errors->has('aboutme' ))
                            <div class="alert alert-primary">{{ $errors->first('aboutme') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="box-pass">
                            <input name="password" type="password"  class="form-control">
                            <span  class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if( $errors->has('password') )
                                <div class="alert alert-primary">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Retype Password</label>
                        <div class="box-pass">
                            <input type="password" name="repassword"  class="form-control">
                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if( $errors->has('repassword') )
                                <div class="alert alert-primary">{{ $errors->first('repassword') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="box-btn">
                        <button type="submit">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal edit info -->
@if(Auth::check())
    <div class="modal" id="edit-info">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('customer.editprofile') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-add-avatar">
                            <div class="box-img">
                                <img class="blah" src="{{ config('image.imgUser') . Auth::user()->image}} " alt="">
                            </div>
                            <div class="upload-avatar">
                                <input id="upload1" type="file" name="fileEdit" onchange="readURL(this);">

                                <label for="upload1">
                                <i class="fa fa-pencil"></i>
                                </label>
                            </div>
                            @if( $errors->has('fileEdit') )
                                <div class="alert alert-primary">{{ $errors->first('fileEdit') }}</div>
                            @endif
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active edit" data-toggle="tab" href="#edit-infomation">Edit infomation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link password"  data-toggle="tab" href="#change-pass">Change password</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active edit" id="edit-infomation">
                                <div class="form-group">
                                    <label >Full name <span>*</span></label>
                                    <input type="text" name="nameEdit" value="{{ Auth::user()->full_name }}" class="form-control" >
                                    @if( $errors->has('nameEdit') )
                                        <div class="alert alert-primary">{{ $errors->first('nameEdit') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label >Location</label>
                                    <input type="text" name="addressEdit" value="{{ Auth::user()->location}} " class="form-control" >
                                    @if( $errors->has('addressEdit') )
                                        <div class="alert alert-primary">{{ $errors->first('addressEdit') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label><input name="PublicEmailEidit" type="checkbox"> Make this email public</label>
                                </div>
                                <div class="form-group">
                                    <label >About me </label>
                                    <textarea name="aboutmeEdit" rows="5" class="form-control">{{ Auth::user()->description }}</textarea>
                                    @if( $errors->has('aboutmeEdit') )
                                        <div class="alert alert-primary">{{ $errors->first('aboutmeEdit') }}</div>
                                    @endif
                                </div>
                                <div class="box-btn">
                                    <button type="submit">Sign up</button>
                                </div>
                            </div>
                            <div class="tab-pane container fade password" id="change-pass">
                                <div class="form-group">
                                    <label >Old password</label>
                                    <div class="box-pass">
                                        <input type="password" name="passwordOld"  class="form-control" >
                                        @if( session('ReportChangePassword') )
                                            <div class="alert alert-primary">{{ session('ReportChangePassword') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label >New password</label>
                                    <div class="box-pass">
                                        <input type="password" name="passwordEdit"  class="form-control" >
                                        @if( $errors->has('passwordEdit') )
                                            <div class="alert alert-primary">{{ $errors->first('passwordEdit') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <div class="box-pass">
                                        <input type="password" name="repasswordEdit"  class="form-control" >
                                        @if( $errors->has('repasswordEdit') )
                                            <div class="alert alert-primary">{{ $errors->first('repasswordEdit') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="box-btn">
                                    <button type="submit">Change password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif