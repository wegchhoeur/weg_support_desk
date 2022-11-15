@extends('layouts.master')

@php
    $header = \App\PageSetup::page('faq');
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
      <section class="section section-faqs">
        <div class="preover">
          <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="120" viewBox="0 0 1920 120" preserveAspectRatio="xMidYMax meet">
          	<path fill="#fff" d="M0,0 L0,120 L1920,120 L1920,0 L745,120 L0,0 Z"/>
          </svg>
        </div>
        <div class="container wow fadeIn">
          <div class="row justify-content-end">
            <div class="col-lg-8">
              <div class="section-title mb-40">
                <h1>{{ __('pages.faq_title') }}</h1>
                <p>{{ __('pages.faq_subtitle') }}</p>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL('/') }}">{{ __('navbar.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('navbar.faqs') }}</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <div class="row justify-content-between">
            <div class="col-lg-8 order-lg-2">
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
              </div>

              <nav class="wow fadeIn" aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                  {{ $faqs->links() }}
                </ul>
              </nav>

            </div>
            <aside class="aside col-lg-3 order-lg-1">
              <ul class="nostyle faq-nav">

                @foreach( $faq_categories as $faq_category )
                <li class="">
                  <div class="faq-nav__icon">
                    <i class="fas fa-exclamation-circle"></i>
                  </div>
                  <a href="{{ URL('/faq/category/'.$faq_category->slug) }}">{{ $faq_category->title }}</a>
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