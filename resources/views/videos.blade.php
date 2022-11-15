@extends('layouts.master')

@php
    $header = \App\PageSetup::page('video');
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

      <!-- articles-->
      <section class="section section-articles">
        <div class="preover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
        <div class="container wow fadeIn">
          <div class="articles">
            <div class="section-title decor__center">
              <h1>{{ __('pages.video_title') }}</h1>
              <p>{{ __('pages.video_subtitle') }}</p>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a href="{{ URL('/') }}">{{ __('navbar.home') }}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('navbar.videos') }}</li>
                </ol>
              </nav>
            </div>
            <div class="row">

              <!-- ===  Text Shorten Code  ====  -->
              <?php
                // code for shortening the big content fetched from database
                 function textShorten($text, $limit = 200){
                    $text = $text." ";
                    $text = substr($text, 0, $limit);
                    $text = substr($text, 0, strrpos($text, " "));
                    $text = $text;
                    return $text;
                }
              ?> 
              <!-- ===  Text Shorten Code  ====  -->

              @foreach( $videos as $video )
              <div class="col-lg-4 col-md-6">
                <div class="article">
                  <div class="article__icon">
                    <i class="fab fa-youtube"></i>
                  </div>
                  <h3 class="article__title">
                    <a href="{{ URL('/video/'.$video->slug) }}">{!! str_limit(strip_tags($video->title), 70, ' ...') !!}</a>
                  </h3>

                  <div class="article__text">
                    <?php
                      $desc_clean = strip_tags($video->description);
                    ?>

                    {!! textShorten($desc_clean) !!}
                  </div>

                  <div class="article__btn">
                    <a class="more" href="{{ URL('/video/'.$video->slug) }}">{{ __('pages.read_more') }}<i class="icon-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
            <nav class="wow fadeIn" aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                {{ $videos->links() }}
              </ul>
            </nav>
          </div>
        </div>
        
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
      <!-- ./ articles-->
      
@endsection