@extends('layouts.master')
@section('content')

    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
        <div class="kt-container  kt-container--fluid  kt-grid kt-grid--ver">

            <!-- begin:: Aside -->
            @include('layouts.aside-menu')
            <!-- end:: Aside -->

            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-subheader__main">
                            <h3 class="kt-subheader__title">
                                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                                Profile 1 </h3>
                            <span class="kt-subheader__separator kt-hidden"></span>
                            <div class="kt-subheader__breadcrumbs">
                                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                <a href="" class="kt-subheader__breadcrumbs-link">
                                    Applications </a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                <a href="" class="kt-subheader__breadcrumbs-link">
                                    Users </a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                <a href="" class="kt-subheader__breadcrumbs-link">
                                    Profile 1 </a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                <a href="" class="kt-subheader__breadcrumbs-link">
                                    Overview </a>

                                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                            </div>
                        </div>
                        <div class="kt-subheader__toolbar">
                            <div class="kt-subheader__wrapper">
                                <a href="#" class="btn kt-subheader__btn-primary">
                                    Actions &nbsp;

                                    <!--<i class="flaticon2-calendar-1"></i>-->
                                </a>
                                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"></path>
                                            </g>
                                        </svg>

                                        <!--<i class="flaticon2-plus"></i>-->
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                            <li class="kt-nav__head">
                                                Add anything or jump to:
                                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-drop"></i>
                                                    <span class="kt-nav__link-text">Order</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                                    <span class="kt-nav__link-text">Ticket</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                                    <span class="kt-nav__link-text">Goal</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                                    <span class="kt-nav__link-text">Support Case</span>
                                                    <span class="kt-nav__link-badge">
																		<span class="kt-badge kt-badge--success">5</span>
																	</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__foot">
                                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more...">Learn more</a>
                                            </li>
                                        </ul>

                                        <!--end::Nav-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end:: Subheader -->

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

                        <!--Begin:: App Aside Mobile Toggle-->
                        <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                            <i class="la la-close"></i>
                        </button>

                        <!--End:: App Aside Mobile Toggle-->

                        <!--Begin:: App Aside-->
                        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside" style="opacity: 1;">

                            <!--begin:: Widgets/Applications/User/Profile1-->
                            <div class="kt-portlet kt-portlet--height-fluid-">
                                <div class="kt-portlet__head  kt-portlet__head--noborder">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fit-y">

                                    <!--begin::Widget -->
                                    <div class="kt-widget kt-widget--user-profile-1">
                                        <div class="kt-widget__head">
                                            <div class="kt-widget__media">
                                                <img src="assets/media/users/100_1.jpg" alt="image">
                                            </div>
                                            <div class="kt-widget__content">
                                                <div class="kt-widget__section">
                                                    <a href="#" class="kt-widget__username">
                                                        Jason Muller
                                                        <i class="flaticon2-correct kt-font-success"></i>
                                                    </a>
                                                    <span class="kt-widget__subtitle">
                                                        Head of Development
                                                    </span>
                                                </div>
                                                <div class="kt-widget__action">
                                                    <button type="button" class="btn btn-info btn-sm">chat</button>&nbsp;
                                                    <button type="button" class="btn btn-success btn-sm">follow</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget__body">
                                            <div class="kt-widget__content">
                                                <div class="kt-widget__info">
                                                    <span class="kt-widget__label">Email:</span>
                                                    <a href="#" class="kt-widget__data">{{$user->email}}</a>
                                                </div>
                                                <div class="kt-widget__info">
                                                    <span class="kt-widget__label">Phone:</span>
                                                    <a href="#" class="kt-widget__data">{{$user->phone}}</a>
                                                </div>
                                                <div class="kt-widget__info">
                                                    <span class="kt-widget__label">Address:</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget__items">
                                                <ul class="nav nav-stacked" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#personal_information" class="kt-widget__item"  role="tab" data-toggle="tab">
                                                            <span class="kt-widget__section">
                                                                <span class="kt-widget__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                        </g>
                                                                    </svg> </span>
                                                                <span class="kt-widget__desc">
                                                                    Personal Information
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>

                                                    <li role="presentation">
                                                        <a href="#change_passwort" class="kt-widget__item" role="tab" data-toggle="tab">
                                                            <span class="kt-widget__section">
                                                                <span class="kt-widget__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                                            <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                                                            <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"></path>
                                                                            <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"></path>
                                                                        </g>
                                                                    </svg> </span>
                                                                <span class="kt-widget__desc">
                                                                    Change Passwort
                                                                </span>
                                                            </span>
                                                            <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder">5</span>
                                                        </a>
                                                    </li>

                                                    <li role="presentation">
                                                        <a href="#email_settings" class="kt-widget__item" role="tab" data-toggle="tab">
                                                            <span class="kt-widget__section">
                                                                <span class="kt-widget__icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
                                                                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
                                                                        </g>
                                                                    </svg> </span>
                                                                <span class="kt-widget__desc">
                                                                    Email settings
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Widget -->
                                </div>
                            </div>

                            <!--end:: Widgets/Applications/User/Profile1-->
                        </div>

                        <!--End:: App Aside-->

                        <!--Begin:: App Content-->
                        <div class="tab-content">
                            <div class="kt-grid__item kt-grid__item--fluid kt-app__content tab-pane active"  role="tabpanel" id="personal_information">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="kt-portlet">
                                            <div class="kt-portlet__head">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">Personal Information <small>update your personal informaiton</small></h3>
                                                </div>
                                                <div class="kt-portlet__head-toolbar">
                                                    <div class="kt-portlet__head-wrapper">
                                                        <div class="dropdown dropdown-inline">
                                                            <button type="button" class="btn btn-label-brand btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="flaticon2-gear"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="kt-nav">
                                                                    <li class="kt-nav__section kt-nav__section--first">
                                                                        <span class="kt-nav__section-text">Export Tools</span>
                                                                    </li>
                                                                    <li class="kt-nav__item">
                                                                        <a href="#" class="kt-nav__link">
                                                                            <i class="kt-nav__link-icon la la-print"></i>
                                                                            <span class="kt-nav__link-text">Print</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="kt-nav__item">
                                                                        <a href="#" class="kt-nav__link">
                                                                            <i class="kt-nav__link-icon la la-copy"></i>
                                                                            <span class="kt-nav__link-text">Copy</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="kt-nav__item">
                                                                        <a href="#" class="kt-nav__link">
                                                                            <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                                            <span class="kt-nav__link-text">Excel</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="kt-nav__item">
                                                                        <a href="#" class="kt-nav__link">
                                                                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                                            <span class="kt-nav__link-text">CSV</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="kt-nav__item">
                                                                        <a href="#" class="kt-nav__link">
                                                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                                            <span class="kt-nav__link-text">PDF</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="kt-form kt-form--label-right" action="{{route('user.edit.post.profile', Auth::id())}}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="kt-portlet__body">
                                                    <div class="kt-section kt-section--first row" style="display: flex">
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Avatar</label>
                                                            <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                                                                <div class="kt-avatar__holder" style="background-image: url({{--&quot;http://keenthemes.com/metronic/preview/default/custom/user/assets/media/users/100_1.jpg&quot;--}});"></div>
                                                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen"></i>
                                                                    <input type="file" name="profile_image" accept=".png, .jpg, .jpeg">
                                                                </label>
                                                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                                    <i class="fa fa-times"></i>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">First Name</label>
                                                            <input class="form-control" type="text" name="first_name" value="{{old('first_name', $user->first_name)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Last Name</label>
                                                            <input class="form-control" type="text" name="last_name" value="{{old('last_name', $user->last_name)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Username</label>
                                                            <input class="form-control" type="text" name="username" value="{{old('username', $user->username)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Email</label>
                                                            <input class="form-control" type="text" name="email" value="{{old('email', $user->email)}}">
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Address</label>
                                                            <input class="form-control" type="text" name="address" value="{{old('address', $user->address)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Company Name</label>
                                                            <input class="form-control" type="text" name="company_name" value="{{old('company_name', $user->company_name)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Phone Number</label>
                                                            <input class="form-control" type="text" name="phone" value="{{old('phone', $user->phone)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">City</label>
                                                            <select class="form-control" name="province_id" id="province">
                                                                @foreach($provinces as $key => $province)
                                                                    <option value="{{$province->id}}" {{$user->province_id == $province->id ? 'selected' : ''}}>{{$province->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">District</label>
                                                            <select class="form-control" name="district_id" id="district">
                                                                @foreach($districts as $key => $district)
                                                                    <option value="{{$district->id}}" {{$user->district_id == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Secondary Address</label>
                                                            <input class="form-control" type="text" name="secondary_email" value="{{old('secondary_email', $user->secondary_email)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Secondary Phone</label>
                                                            <input class="form-control" type="text" name="secondary_phone" value="{{old('secondary_phone', $user->secondary_phone)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Gender</label>
                                                            <select class="form-control" name="district_id" id="district">
                                                                @foreach(genders() as $key => $gender)
                                                                    <option value="{{$key}}" {{$user->gender == $key ? 'selected' : ''}}>{{$gender}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Skype</label>
                                                            <input class="form-control" type="text" name="skype" value="{{old('skype', $user->skype)}}">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Facebook</label>
                                                            <input class="form-control" type="text" name="facebook" value="{{old('facebook', $user->facebook)}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <div class="row">
                                                            <div class="col-md-5"></div>
                                                            <div class="col-md-7">
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="kt-grid__item kt-grid__item--fluid kt-app__content tab-pane" role="tabpanel" id="change_passwort">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__head">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">Change Password<small>change or reset your account password</small></h3>
                                                </div>
                                            </div>
                                            <form class="kt-form kt-form--label-right">
                                                <div class="kt-portlet__body">
                                                    <div class="kt-section kt-section--first">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <label class="col-xl-4 col-lg-3 col-form-label">New Password</label>
                                                                <div class="col-lg-9 col-xl-7">
                                                                    <input type="password" class="form-control" value="" placeholder="New password">
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-group-last row">
                                                                <label class="col-xl-4 col-lg-3 col-form-label">Verify Password</label>
                                                                <div class="col-lg-9 col-xl-7">
                                                                    <input type="password" class="form-control" value="" placeholder="Verify password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-xl-3">
                                                            </div>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <button type="reset" class="btn btn-brand btn-bold">Change Password</button>&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="kt-grid__item kt-grid__item--fluid kt-app__content tab-pane" role="tabpanel" id="email_settings">

                            </div>
                        </div>
                        <!--End:: App Content-->
                    </div>
                </div>
                <!-- end:: Content -->
            </div>
        </div>
    </div>

    <script src="{{asset('js/customer.js')}}"></script>

@endsection