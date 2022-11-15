@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')  
    <!-- end page title --> 

    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-primary widget-icon"><i class="fas fa-newspaper"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Articles</h5>
                        <h3 class="mt-2">{{ $articles->count() }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-question-circle"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total FAQs</h5>
                        <h3 class="mt-2">{{ $faqs->count() }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-primary widget-icon"><i class="fab fa-youtube"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Videos</h5>
                        <h3 class="mt-2">{{ $videos->count() }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Emails</h5>
                        <h3 class="mt-2">{{ $contacts->count() }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div> <!-- container -->
<!-- End Content-->

@endsection