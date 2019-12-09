<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-header__brand " id="kt_header_brand">
            <div class="kt-header__brand-logo">
                <a href="{{ route('admin.dashbroad') }}">
                    <img alt="Logo" src="{{asset('assets/media/logos/logo-blog.png')}}" width="100"/>
                </a>
            </div>
        </div>
        <div class="kt-header__topbar">
            <div class="kt-header__topbar-item dropdown">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                    <span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i></span>
                    <span class="kt-badge kt-badge--danger">{{ $notifications->count() }}</span>
                </div>
                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                    <form>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                    @foreach ($notifications as $notification)
                                        <a href="{{ route('admin_posts.show', ['id' => $notification->data['id']]) }}" class="kt-notification__item btn_notificaiton_read" data-url="{{ route('admin.notification.read') }}" data-id="{{ $notification->noti_id }}">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-line-chart kt-font-success"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    New post has been created by {{ $notification->user($notification->data['user_id'])->full_name }}
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                    <span class="kt-header__topbar-username kt-visible-desktop">{{ Auth::guard('admin')->user()->full_name }}</span>
                    <img alt="Pic" class="rounded-circle " src="{{ URL::to('/') }}/images/icon/{{ Auth::guard('admin')->user()->image }}" width="50px" height="50px" />
                    <span class="kt-header__topbar-icon kt-bg-brand kt-hidden"><b>S</b></span>
                </div>
                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                    <div class="kt-notification">
                        <a href="{{ route('admin.account_profile') }}" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-calendar-3 kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Profile
                                </div>
                                <div class="kt-notification__item-time">
                                    Account settings and more
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('admin.account_list') }}" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon-users-1 kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    User
                                </div>
                                <div class="kt-notification__item-time">
                                    List Users
                                </div>
                            </div>
                        </a>
                        <div class="kt-notification__custom kt-space-between">
                            <a href="{{ route('admin.logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>