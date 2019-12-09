<div class="over-menu"></div>

<header class="header" id="header-sroll">
    <div class="container">
        <div class="desk-menu">
            <div class="logo">
                <h1 class="logo-adn">
                    <a href="{{ route('index') }}"><span>QA</span>ENGINE
                    </a>
                </h1>
            </div>
            <nav class="box-menu">
                <div class="menu-container">
                    <div class="menu-head">
                        @if( Auth::check() )
                            <span href="#" class="notification btn" id="list-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><i class="fa fa-bell" aria-hidden="true"></i>
                                </span>
                                <span class="badge">{{ count($notifications) }}</span>
                            </span>
                            <div class="manage-account">
                                <div class="box-btn-mb">
                                    <div class="box-img">
                                        <img src="{{ config('image.imgUser') . Auth::user()->image }}" alt="">
                                    </div>
                                    <h4 class="name-acc">{{ Auth::user()->full_name }}</h4>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                                <ul class="show-list">
                                    <li><a href="{{ route('customer.profile') }}">User profile</a></li>
                                    <li><a href="{{ route('customer.logout') }}">Log out</a></li>
                                </ul>
                            </div>
                            <div aria-labelledby="list-notification" class="dropdown-menu list-notification">
                                <div class="container-fluid">
                                    <input type="hidden" data-url="{{ route('notification.read') }}" class="btn_notification_read">
                                    @foreach ($notifications as $notification)
                                        @switch($notification->type)
                                            @case('App\Notifications\CreateFollow')
                                                <a href="{{ route('customer.detaiprofile', ['id' => $notification->data['user_id']]) }}" data-id="{{ $notification->noti_id }}" class="btn_notificaiton_read">
                                                @break
                                            @case('App\Notifications\CreateVote')
                                                <a href="{{ route('posts.show', ['id' => $notification->data['post_id']]) }}" data-id="{{ $notification->noti_id }}" class="btn_notificaiton_read">
                                                @break
                                            @case('App\Notifications\ActivePost')
                                                <a href="{{ route('posts.show', ['id' => $notification->data['id']]) }}" data-id="{{ $notification->noti_id }}" class="btn_notificaiton_read">
                                                @break
                                            @default
                                                <a href="{{ route('posts.show', ['id' => $notification->data['post_id']]) }}" data-id="{{ $notification->noti_id }}" class="btn_notificaiton_read">
                                        @endswitch
                                            <div class="row notification-item">
                                                <div class="col-sm-2 notification-item-icon" style="font-size: 20px; color:#1dc9b7;  padding-top: 10px;"> 
                                                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-sm-9 notification-item-details">
                                                    <div class="row notification-item-title">
                                                        <strong>
                                                            {{ isset($notification->data['user_id']) ? getUserNotification($notification->data['user_id'])->full_name : '' }}
                                                        </strong> &nbsp; &nbsp;
                                                        <span>
                                                            {{ $notification->data['title'] }}
                                                        </span>
                                                    </div>
                                                    <div class="row notification-item-time">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                         @else
                            <a href="#" id="login_form" class="client" data-toggle="modal" data-target="#signin">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <span>Login</span>
                            </a>
                            <a href="#" class="client" data-toggle="modal" data-target="#register">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                <span>Register</span>
                            </a>
                        @endif
                    </div>
                    <div class="menu-header-container">
                        <ul id="cd-primary-nav" class="menu">
                            <li class="menu-item active">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">About us</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('blogs.index') }}">Blog</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Term</a>
                            </li>
                            <li class="contact menu-item ">
                                <a href="{{ route('contact.new') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="menu-foot">
                        <div class="social">
                            <a href="#" target="_blank"><i class="fa fa-facebook-f"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                        <hr/>
                        <address>
                            <span class="tel"><i class="fa fa-phone"></i> +55 31 3333-3333</span>
                            <span class="email"><i class="fa fa-envelope-o"></i> email@email.com</span>
                            <span class="end"><i class="fa fa-map-marker"></i> Rua tal, 44, Lugar nenhum</span>
                        </address>
                    </div>
                </div>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </nav>
        </div>
    </div>
</header>