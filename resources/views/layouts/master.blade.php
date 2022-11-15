<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(isset($setting))
    <!-- App Title -->
    <title>@yield('title') | {{ $setting->title }}</title>

    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}" type="image/x-icon">

    @yield('top_meta_tags')
    @endif

    @if(empty($setting))
    <!-- App Title -->
    <title>@yield('title')</title>
    @endif

    <!-- Social Meta Tags -->
    <link rel="canonical" href="{{ route('home') }}">
    @yield('social_meta_tags')

    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;#124;PT+Mono" rel="stylesheet">

    <!-- App CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/all.min.css') }}">
    @if($livechat->status == 0)
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/floating-wpp.min.css') }}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}">

    <!-- Custom Style -->
    @if(isset($setting->custom_css))
    <style type="text/css">
        {!! strip_tags($setting->custom_css) !!}
    </style>
    @endif
  </head>
  <body class="loading">
    <div class="arcelia">
      <!-- header-->
      <header class="header text-inverse wow fadeIn">
        <div class="sky"></div>
        <div class="container">

          <!-- Top navbar-->
          <div class="menu">

            @if(isset($setting))
            <!-- App Logo -->
            <a class="logo" href="{{ URL('/') }}">
              <span>
                <img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="logo">
              </span>
            </a>
            @endif

            <nav>
              <div class="menu__close"><a href="#" title="close"><i class="icon-cross"></i></a></div>
              <ul>
                @php
                    $page_home = \App\PageSetup::page('home');
                @endphp
                @if(isset($page_home))
                <li class="{{ Request::path() == '/' ? 'active' : '' }}">
                  <a href="{{ URL('/') }}">{{ $page_home->title }}</a>
                </li>
                @endif

                @php
                    $page_article = \App\PageSetup::page('article');
                @endphp
                @if(isset($page_article))
                <li class="{{ Request::is('article*') ? 'active' : '' }}">
                  <a href="{{ URL('/articles') }}">{{ $page_article->title }}</a>
                </li>
                @endif

                @php
                    $page_faq = \App\PageSetup::page('faq');
                @endphp
                @if(isset($page_faq))
                <li class="{{ Request::is('faq*')  ? 'active' : '' }}">
                  <a href="{{ URL('/faqs') }}">{{ $page_faq->title }}</a>
                </li>
                @endif

                @php
                    $page_video = \App\PageSetup::page('video');
                @endphp
                @if(isset($page_video))
                <li class="{{ Request::is('video*') ? 'active' : '' }}">
                  <a href="{{ URL('/videos') }}">{{ $page_video->title }}</a>
                </li>
                @endif

                @php
                    $page_contact = \App\PageSetup::page('contact');
                @endphp
                @if(isset($page_contact))
                <li class="{{ Request::path() == 'contact' ? 'active' : '' }}">
                  <a href="{{ URL('/contact') }}">{{ $page_contact->title }}</a>
                </li>
                @endif
              </ul>
            </nav><a class="menu__burger" href="#" title="Menu"><span></span><span></span><span></span></a>
          </div>

          <!-- search-->
          <div class="search">
            <h2 class="search__title">{{ __('search.title') }}</h2>
            <div class="search__form">
              <form action="{{ URL('/search') }}" method="get">
                <input class="search__input" type="text" name="search" placeholder="{{ __('search.placeholder') }}" value="@if(isset($search)){{ $search }}@endif">
                <div class="search__icon"><i class="fas fa-search"></i></div>
              </form>
            </div>
          </div>

        </div>
      </header>
      <!-- ./ header-->


      <!-- Content Start -->
      @yield('content')
      <!-- Content End -->


      @php
          $page_contact = \App\PageSetup::page('contact');
      @endphp
      @if(isset($page_contact))
      <!-- contactUs-->
      <section class="section section-contactUs text-inverse">
        <div class="container wow fadeIn">
          <div class="row align-items-center">
            <div class="col-lg-8 mb-40 text-lg-left text-center">
              <h2>{{ __('contact.banner_title') }}</h2>
              <div class="lead">{{ __('contact.banner_subtitle') }}</div>
            </div>
            <div class="col-lg-4 mb-40 text-center"><a class="btn btn-white" href="{{ url('/contact') }}">{{ __('contact.banner_button') }}</a>
            </div>
          </div>
        </div>
      </section>
      <!-- ./ contactUs-->
      @endif

      <!-- footer-->
      <footer class="footer">

        <div class="container">
          <div class="row">
            <div class="col-md-4 col-xs-12">
              <div class="social-links">
                <ul class="social-icon">
                    @if(isset($social->facebook))
                    <li><a href="{{ $social->facebook }}" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if(isset($social->twitter))
                    <li><a href="{{ $social->twitter }}" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a></li>
                    @endif
                    @if(isset($social->instagram))
                    <li><a href="{{ $social->instagram }}" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a></li>
                    @endif
                    @if(isset($social->linkedin))
                    <li><a href="{{ $social->linkedin }}" target="_blank" rel="nofollow"><i class="fab fa-linkedin-in"></i></a></li>
                    @endif
                    @if(isset($social->pinterest))
                    <li><a href="{{ $social->pinterest }}" target="_blank" rel="nofollow"><i class="fab fa-pinterest"></i></a></li>
                    @endif
                    @if(isset($social->youtube))
                    <li><a href="{{ $social->youtube }}" target="_blank" rel="nofollow"><i class="fab fa-youtube"></i></a></li>
                    @endif
                    @if(isset($social->skype))
                    <li><a href="skype:{{ $social->skype }}?chat" target="_blank" rel="nofollow"><i class="fab fa-skype"></i></a></li>
                    @endif
                    @if(isset($social->whatsapp))
                    <li><a href="https://wa.me/{{ str_replace(' ', '', $social->whatsapp) }}" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a></li>
                    @endif
                </ul>
              </div>
            </div>
            
            <div class="col-md-4 col-xs-12">
              <div class="copyright">
                @if(isset($setting))
                <div>&copy; {!! strip_tags($setting->footer_text, '<p><a><b><i><u><strong>') !!}</div>
                @endif
              </div>
            </div>
          </div>
        </div>

      </footer>
      <!-- ./ footer-->

    </div>

    <!-- preloader-->
    <div class="preloader">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <!-- ./ preloader-->

    <!-- App scripts-->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    @if($livechat->status == 0)
    <script src="{{ asset('frontend/js/floating-wpp.min.js') }}"></script>
    @endif

    <!-- Custom JS -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <!-- ./ App scripts-->


    @if($livechat->status == 0)
    <!--Div where the WhatsApp will be rendered-->
    <div id="whatspp_live"></div>

    <script type="text/javascript">
        (function($) {
        "use strict";
          $('#whatspp_live').floatingWhatsApp({
            phone: '{{ $livechat->whatsapp_no }}', //WhatsApp Business phone number International format
            headerTitle: '{{ $livechat->whatsapp_title }}', //Popup Title
            popupMessage: '{{ $livechat->whatsapp_greeting }}', //Popup Message
            showPopup: true, //Enables popup display
            buttonImage: '<img src="{{ asset('frontend/img/social/whatsapp.png') }}">', //Button Image
            headerColor: '{{ $livechat->whatsapp_color }}', //headerColor: 'crimson', //Custom header color
            backgroundColor: 'transparent', //backgroundColor: 'crimson', //Custom background button color
            position: "right"    
          });
        })(jQuery);
    </script>
    @endif


    @if($livechat->status == 1)
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script type="text/javascript">
        (function($) {
        "use strict";
            
            window.fbAsyncInit = function() {
              FB.init({
                xfbml            : true,
                version          : 'v8.0'
              });
            };

            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

        })(jQuery); 
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
        attribution=setup_tool
        page_id="{{ $livechat->facebook_id }}"
        theme_color="{{ $livechat->facebook_color }}"
        logged_in_greeting="{{ $livechat->facebook_greeting_in }}"
        logged_out_greeting="{{ $livechat->facebook_greeting_out }}">
    </div>
    @endif

  </body>
</html>