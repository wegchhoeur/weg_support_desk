@extends('layouts.master')

@php
    $header = \App\PageSetup::page('article');
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

      <!-- categories-->
      <section class="section">
        <div class="preover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
        <div class="container wow fadeIn">
          <div class="categories">
            <div class="section-title decor__center">
              <h1>{{ __('pages.article_title') }}</h1>
              <p>{{ __('pages.article_subtitle') }}</p>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a href="{{ URL('/') }}">{{ __('navbar.home') }}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('navbar.article') }}</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
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
            <nav class="wow fadeIn" aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                {{ $article_categories->links() }}
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
      <!-- ./ categories-->

@endsection