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
        <div class="col-12">
            <a href="{{ URL::route($url.'.index') }}" class="btn btn-info">Refresh</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                  <h4 class="header-title">{{ $title }}</h4>
                  
                  <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#list-tab" data-toggle="tab" aria-expanded="false" class="nav-link @if(!isset($data)) active @endif">
                            List
                        </a>
                    </li>
                    
                    @if(isset($data))
                    <li class="nav-item">
                        <a href="#edit-tab" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            Edit
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="#create-tab" data-toggle="tab" aria-expanded="false" class="nav-link">
                            Create
                        </a>
                    </li>
                    @endif
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane show @if(!isset($data)) active @endif" id="list-tab">

                      <!-- Data Table Start -->
                      <div class="table-responsive">
                        <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach( $rows as $key => $row )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{!! str_limit(strip_tags($row->title), 50, ' ...') !!}</td>
                                    <td>{{ $row->category->title }}</td>
                                    <td>
                                        @if( $row->status == 1 )
                                        <span class="badge badge-success badge-pill">Active</span>
                                        @else
                                        <span class="badge badge-danger badge-pill">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal-{{ $row->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <!-- Include Show modal -->
                                        @include('admin.'.$url.'.show')

                                        <a href="{{ URL::route($url.'.edit', [$row->id]) }}" class="btn btn-primary btn-sm">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <!-- Include Delete modal -->
                                        @include('admin.inc.delete')
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                      <!-- Data Table End -->

                    </div>
                    <div class="tab-pane" id="create-tab">
                        
                      <form class="needs-validation" novalidate action="{{ URL::route($url.'.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Form Start -->
                        <div class="form-group">
                            <label for="title">Article Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Article Title" required>

                            <div class="invalid-feedback">
                              Please Provide Article Title.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">Select Category</option>
                                @foreach( $categories as $category )
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              Please Select Article Category.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="details">Article Details</label>
                            <textarea class="form-control textMediaEditor" name="details" id="details" rows="8" required></textarea>

                            <div class="invalid-feedback">
                              Please Provide Article Details.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" class="form-control" name="file" id="file" placeholder="Upload File">

                            <div class="invalid-feedback">
                              Please Provide Artilce File.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="video_id">Youtube Video ID</label>
                            <input type="text" class="form-control" name="video_id" id="video_id" placeholder="Video ID">

                            <div class="invalid-feedback">
                              Please Provide Youtube Video ID.
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <!-- Form End -->
                      </form>

                    </div>
                    <div class="tab-pane @if(isset($data)) active @endif" id="edit-tab">
                        
                    @if(isset($data))
                      <form class="needs-validation" novalidate action="{{ URL::route($url.'.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Form Start -->
                        <div class="form-group">
                            <label for="title">Article Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}" placeholder="Article Title" required>

                            <div class="invalid-feedback">
                              Please Provide Article Title.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">Select Category</option>
                                @foreach( $categories as $category )
                                <option value="{{ $category->id }}" @if( $category->id == $data->category_id ) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              Please Select Article Category.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="details">Article Details</label>
                            <textarea class="form-control textMediaEditor" name="details" id="details" rows="8" required>{{ $data->description }}</textarea>

                            <div class="invalid-feedback">
                              Please Provide Article Details.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" class="form-control" name="file" id="file" placeholder="Upload File">

                            <div class="invalid-feedback">
                              Please Provide Artilce File.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="video_id">Youtube Video ID</label>
                            <input type="text" class="form-control" name="video_id" id="video_id" value="{{ $data->video_id }}" placeholder="Video ID">

                            <div class="invalid-feedback">
                              Please Provide Youtube Video ID.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Select Status</label>
                            <select class="wide" name="status" id="status" data-plugin="customselect">
                                <option value="1" @if( $data->status == 1 ) selected @endif>Active</option>
                                <option value="0" @if( $data->status == 0 ) selected @endif>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <!-- Form End -->
                      </form>
                    @endif

                    </div>
                  </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection