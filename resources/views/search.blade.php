@extends('layouts.master')
@section('title', 'Search')
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
              
              <h1>{{ __('search.result_title') }} <span>@if(isset($search)) {{ $search }} @endif</span></h1>
              
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a href="{{ URL('/') }}">{{ __('navbar.home') }}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('navbar.search') }}</li>
                </ol>
              </nav>
              
            </div>

            @php
                $page_article = \App\PageSetup::page('article');
            @endphp
            @if(isset($page_article))
            @if(count($articles) > 0)
            <div class="row">

              <div class="col-lg-12 col-md-12">
                <div class="section-title decor__center">
                  <h2>{{ __('pages.article_title') }}</h2>
                </div>
              </div>

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

              @foreach( $articles as $article )
              <div class="col-lg-4 col-md-6">
                <div class="article wow fadeIn">
                  <div class="article__icon">
                    <i class="far fa-edit"></i>
                  </div>

                  <h3 class="article__title"><a href="{{ URL('/article/'.$article->slug) }}">{!! str_limit(strip_tags($article->title), 70, ' ...') !!}</a></h3>
                  <div class="article__text">
                    <?php
                      $desc_clean = strip_tags($article->description);
                    ?>

                    {!! textShorten($desc_clean) !!}
                  </div>

                  <div class="article__btn"><a class="more" href="{{ URL('/article/'.$article->slug) }}">{{ __('pages.read_more') }}<i class="icon-arrow-right"></i></a></div>
                </div>
              </div>
              @endforeach

            </div>
            <nav class="wow fadeIn" aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                {{ $articles->appends(Request::only('search'))->links() }}
              </ul>
            </nav>
            @endif

            @if(count($articles) < 1)
              <p class="text-center d-block mx-auto">{{ __('search.no_result') }}</p>
            @endif
              
            @endif

          </div>
        </div>

      </section>
      <!-- ./ articles-->



      <!-- faq-->
      <section class="section section-faq" style="padding-top: 0px;">

        @php
            $page_faq = \App\PageSetup::page('faq');
        @endphp
        @if(isset($page_faq))
        @if(count($faqs) > 0)
        <div class="container wow fadeIn">
          <div class="section-title decor__center">
            <h2>{{ __('pages.faq_title') }}</h2>
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


                  @if(count($faqs) < 1)
                    <p class="text-center d-block mx-auto">{{ __('search.no_result') }}</p>
                  @endif

                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
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