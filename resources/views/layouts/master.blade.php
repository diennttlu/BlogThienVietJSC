<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>
      @hasSection('title')
          @yield('title')
      @else
          Index
      @endif
    </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <base href="{{ asset('') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tagsinput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <div class="Wrapper">
      @include('layouts.header')
        <main class="content-main">
          @include('layouts.banner')
          <section class="content-all"> 
            <div class="box-content-body">
              <div class="container">
                <div class="box-body-all">
                  @include('layouts.leftBar')
                  <div class="box-big">
                    <div class="box-content-mid">
                      @yield('content')
                    </div>
                  </div>
                  @include('layouts.rightBar')
                </div>
              </div>
            </div>
          </section>
        </main>
        @include('layouts.footer')      
    </div>
    @include('layouts.modal')

    <!-- back-to-top -->
    <div class="back-to-top"><a href="javascript:void(0)"><span class="fa fa-angle-up fa-2x"></span></a></div>
    <!-- javascript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="{{ asset('js/library.js') }}"></script>
    <script src="{{ asset('js/tagsinput.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    @include('layouts.show_active_modal_Errors')
    @yield('script')
  </body>
</html>