@extends('layouts.master')

@php
    $header = \App\PageSetup::page('video');
@endphp
@if(isset($header))
    
    @section('title', $video->title)

    @section('top_meta_tags')
    @if(isset($video->description))
    <meta name="description" content="{!! str_limit(strip_tags($video->description), 160, ' ...') !!}">
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

@section('social_meta_tags')
    @if(isset($setting))
    <meta property="og:type" content="website">
    <meta property='og:site_name' content="{{ $setting->title }}"/>
    <meta property='og:title' content="{{ $video->title }}"/>
    <meta property='og:description' content="{!! str_limit(strip_tags($video->description), 160, ' ...') !!}"/>
    <meta property='og:url' content="{{ route('video.single', $video->slug) }}"/>
    <meta property='og:image' content="{{ asset('uploads/video/'.$video->image_path) }}"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
    <meta name="twitter:creator" content="@HiTechParks" />
    <meta name="twitter:url" content="{{ route('video.single', $video->slug) }}" />
    <meta name="twitter:title" content="{{ $video->title }}" />
    <meta name="twitter:description" content="{!! str_limit(strip_tags($video->description), 160, ' ...') !!}" />
    <meta name="twitter:image" content="{{ asset('uploads/video/'.$video->image_path) }}" />
    @endif
@endsection

@section('content')

      <!-- articles-->
      <section class="section wow">
        <div class="preover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
        <div class="container fadeIn">
          <div class="row">
            
            <div class="col-lg-4">
              <div class="article-date">{{ date('d.m.y', strtotime($video->created_at)) }}</div>
            </div>
            <div class="col-lg-8">
              <div class="section-title mb-40">
                <h1>{{ $video->title }}</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL('/') }}">{{ __('navbar.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ URL('/videos') }}">{{ __('navbar.videos') }}</a></li>
                  </ol>
                </nav>
              </div>
            </div>
            
          </div>
          <div class="row justify-content-between">
            <div class="col-lg-8 order-lg-2">

              <div class="article-full">
                <div class="video"><img src="{{ asset('uploads/video/'.$video->image_path) }}" alt=""><a class="video__play" href="https://www.youtube.com/watch?v={{ $video->video_id }}?rel=0" data-fancybox></a></div>
                
                {!! $video->description !!}
              </div>

            </div>
            <aside class="aside col-lg-3 order-lg-1">
              <ul class="nostyle video-nav">

                @foreach( $video_lists as $video_list )
                <li class="@if( $video_list->id == $video->id ) active @endif">
                  <div class="video-nav__icon">
                    <i class="fab fa-youtube"></i>
                  </div>
                  <a href="{{ URL('/video/'.$video_list->slug) }}">{!! str_limit(strip_tags($video_list->title), 50, ' ...') !!}</a>
                </li>
                @endforeach

              </ul>
            </aside>
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