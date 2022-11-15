@extends('layouts.master')

@php
    $header = \App\PageSetup::page('home');
@endphp
@if(isset($header))

    @section('title', $header->meta_title)

    @section('top_meta_tags')
    @if(isset($header->meta_description))
    <meta name="description" content="{!! str_limit(strip_tags($header->meta_description), 160, ' ...') !!}">
    @else
    <meta name="description" content="{!! str_limit(strip_tags($setting->description), 160, ' ...') !!}">
    @endif

    @if(isset($header->meta_keywords))
    <meta name="keywords" content="{!! strip_tags($header->meta_keywords) !!}">
    @else
    <meta name="keywords" content="{!! strip_tags($setting->keywords) !!}">
    @endif
    @endsection

@endif

@section('content')

      <!-- features-->
      <section class="section section-features">
        <div class="preover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
        <div class="container wow fadeIn">
          <div class="row justify-content-center">

            @php
                $page_faq = \App\PageSetup::page('faq');
            @endphp
            @if(isset($page_faq))
            <div class="col-lg-4 col-md-6 mb-80 text-center">
              <div class="features wow fadeIn" data-wow-delay=".1s">
                <div class="features__icon">
                  <i class="fas fa-question-circle"></i>
                </div>
                <h3 class="features__title">{{ __('pages.faq_title') }}</h3>
                <div class="features__text">{{ __('pages.faq_subtitle') }}</div>
                <div class="features__btn"><a class="btn btn-sm btn-accent" href="{{ URL('/faqs') }}">{{ __('pages.faq_button') }}</a></div>
              </div>
            </div>
            @endif

            @php
                $page_article = \App\PageSetup::page('article');
            @endphp
            @if(isset($page_article))
            <div class="col-lg-4 col-md-6 mb-80 text-center">
              <div class="features wow fadeIn" data-wow-delay=".2s">
                <div class="features__icon">
                  <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="features__title">{{ __('pages.article_title') }}</h3>
                <div class="features__text">{{ __('pages.article_subtitle') }}</div>
                <div class="features__btn"><a class="btn btn-sm btn-accent" href="{{ URL('/articles') }}">{{ __('pages.article_button') }}</a></div>
              </div>
            </div>
            @endif

            @php
                $page_video = \App\PageSetup::page('video');
            @endphp
            @if(isset($page_video))
            <div class="col-lg-4 col-md-6 mb-80 text-center">
              <div class="features wow fadeIn" data-wow-delay=".3s">
                <div class="features__icon">
                  <i class="fas fa-play-circle"></i>
                </div>
                <h3 class="features__title">{{ __('pages.video_title') }}</h3>
                <div class="features__text">{{ __('pages.video_subtitle') }}</div>
                <div class="features__btn"><a class="btn btn-sm btn-accent" href="{{ URL('/videos') }}">{{ __('pages.video_button') }}</a></div>
              </div>
            </div>
            @endif

          </div>
        </div>
        <div class="postover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
      </section>
      <!-- ./ features-->


      @php
          $page_article = \App\PageSetup::page('article');
      @endphp
      @if(isset($page_article))
      <!-- categories-->
      <section class="section section-categories">
        <div class="container wow fadeIn">
          <div class="categories">
            <div class="row">

              <div class="col-lg-12 col-md-12">
                <div class="section-title decor__center">
                  <h2>{{ __('pages.article_title') }}</h2>
                  <p>{{ __('pages.article_subtitle') }}</p>
                </div>
              </div>

              @foreach( $article_categories as $article_category )
              <div class="col-lg-4 col-md-6">
                <div class="category wow fadeIn">
                  <div class="category__icon">
                    <i class="fas fa-folder-plus"></i>
                  </div>

                  <h3 class="category__title">
                    <a href="{{ URL('/article/category/'.$article_category->slug) }}">{{ $article_category->title }}</a><sup>{{ $article_category->articles->where('status', 1)->count() }}</sup>
                  </h3>

                  <?php $article_count = 0; ?>
                  <ul class="category__list bullet-line">
                    @foreach( $articles as $article )
                      @if( $article_category->id == $article->category_id )
                        <?php $article_count++; ?>
                        @if($article_count <= 5)
                          <li><a href="{{ URL('/article/'.$article->slug) }}">{!! str_limit(strip_tags($article->title), 70, ' ...') !!}</a></li>
                        @endif
                      @endif
                    @endforeach
                  </ul>
                  <div class="category__btn">
                    <a class="more" href="{{ URL('/article/category/'.$article_category->slug) }}">{{ __('pages.more_article') }}<i class="icon-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
            <div class="categories__btn text-center"><a class="btn btn-accent" href="{{ URL('/articles') }}">{{ __('pages.article_button') }}</a></div>
          </div>
        </div>
      </section>
      <!-- ./ categories-->
      @endif


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
            <div class="col-lg-4 mb-40 text-center"><a class="btn btn-white" href="{{ URL('/contact') }}">{{ __('contact.banner_button') }}</a>
            </div>
          </div>
        </div>
      </section>
      <!-- ./ contactUs-->
      @endif


      @php
          $page_video = \App\PageSetup::page('video');
      @endphp
      @if(isset($page_video))
      <!-- video-->
      <section class="section section-video">
        <div class="container wow fadeIn">
          <div class="row justify-content-lg-between justify-content-end">
            <div class="col-lg-6 mb-40">

              @foreach( $videos as $key => $video )
                @if($key == 0)
                <div class="video">
                  <img src="{{ asset('uploads/video/'.$video->image_path) }}" alt="Thumbnail"><a class="video__play" href="https://www.youtube.com/watch?v={{ $video->video_id }}?rel=0" data-fancybox></a>
                </div>
                @endif
              @endforeach

            </div>
            <div class="col-lg-5 col-sm-10 mb-40">
              <div class="section-title decor__left">
                <h2>{{ __('pages.video_title') }}</h2>
                <p>{{ __('pages.video_subtitle') }}</p>
              </div>
              <div class="video-list">
                <ul>

                  @foreach( $videos as $video )
                  <li>
                    <div class="video-list__icon"><i class="fab fa-youtube"></i>
                    </div><a href="{{ URL('/video/'.$video->slug) }}">{!! str_limit(strip_tags($video->title), 70, ' ...') !!}</a>
                  </li>
                  @endforeach

                </ul>
                <div class="video-list__btn"><a class="more" href="{{ URL('/videos') }}">{{ __('pages.video_button') }}<i class="icon-arrow-right"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ./ video-->
      @endif


      @php
          $page_faq = \App\PageSetup::page('faq');
      @endphp
      @if(isset($page_faq))
      <!-- faq-->
      <section class="section section-faq">
        <div class="preover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
        <div class="container wow fadeIn">
          <div class="section-title decor__center">
            <h2>{{ __('pages.faq_title') }}</h2>
            <p>{{ __('pages.faq_subtitle') }}</p>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="faq">
                <div class="faq__list">

                  @foreach( $faqs as $faq )
                  <div class="faq__item">
                    <div class="faq__item-icon"></div>
                    <div class="faq__item-title">{{ $faq->title }}</div>
                    <div class="faq__item-body">{!! $faq->description !!}</div>
                  </div>
                  @endforeach

                </div>
                <div class="faq__btn"><a class="btn btn-accent" href="{{ URL('/faqs') }}">{{ __('pages.faq_button') }}</a></div>
              </div>
            </div>
          </div>
        </div>
        @endif


        @php
            $page_contact = \App\PageSetup::page('contact');
        @endphp
        @if(isset($page_contact))
        <div class="postover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
        @endif
      </section>
      <!-- ./ faq-->

@endsection