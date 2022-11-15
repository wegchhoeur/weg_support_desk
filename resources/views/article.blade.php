@extends('layouts.master')

@php
    $header = \App\PageSetup::page('article');
@endphp
@if(isset($header))
    
    @section('title', $article->title)

    @section('top_meta_tags')
    @if(isset($article->description))
    <meta name="description" content="{!! str_limit(strip_tags($article->description), 160, ' ...') !!}">
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
    <meta property='og:title' content="{{ $article->title }}"/>
    <meta property='og:description' content="{!! str_limit(strip_tags($article->description), 160, ' ...') !!}"/>
    <meta property='og:url' content="{{ route('article.single', $article->slug) }}"/>
    <meta property='og:image' content="{{ asset('/uploads/setting/'.$setting->logo_path) }}"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
    <meta name="twitter:creator" content="@HiTechParks" />
    <meta name="twitter:url" content="{{ route('article.single', $article->slug) }}" />
    <meta name="twitter:title" content="{{ $article->title }}" />
    <meta name="twitter:description" content="{!! str_limit(strip_tags($article->description), 160, ' ...') !!}" />
    <meta name="twitter:image" content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
    @endif
@endsection

@section('content')

      <!-- articles-->
      <section class="section">
        <div class="preover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
        <div class="container wow fadeIn">
          
          <div class="row">
            <div class="col-lg-4">
              <div class="article-date">{{ date('d.m.y', strtotime($article->created_at)) }}</div>
            </div>
            <div class="col-lg-8">
              <div class="section-title mb-40">
                <h1>{{ $article->title }}</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL('/') }}">{{ __('navbar.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ URL('/articles') }}">{{ __('navbar.article') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ URL('/article/category/'.$article->category->slug) }}" title="">{{ $article->category->title }}</a></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          
          <div class="row justify-content-between">
            <div class="col-lg-8 order-lg-2">

              <div class="article-full">

                @if(!empty($article->video_id))
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $article->video_id }}?rel=0" allowfullscreen></iframe>
                </div>
                <br/>
                @endif

                @if(is_file('uploads/article/'.$article->file_path))
                <a href="{{ asset('uploads/article/'.$article->file_path) }}" class="btn btn-success" download>{{ __('pages.download_btn') }}</a>
                <br/>
                @endif

                {!! $article->description !!}

              </div>
              
            </div>

            <aside class="aside col-lg-3 order-lg-1">
              <ul class="nostyle categories-nav">
                @foreach( $article_categories as $article_category )
                <li>
                  <div class="categories-nav__icon">
                    <i class="fas fa-folder-plus"></i>
                  </div>
                  <a href="{{ URL('/article/category/'.$article_category->slug) }}">{{ $article_category->title }}</a>
                  <sup>{{ $article_category->articles->count() }}</sup>
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