    <!-- Show modal content -->
    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ $title }} Details View</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Details View Start -->
                    <h4><span class="text-highlight">Title:</span> {{ $row->title }}</h4>

                    @if(!empty($row->video_id))
                    <p><span class="text-highlight">Youtube Video:</span></p>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $row->video_id }}?rel=0" allowfullscreen></iframe>
                    </div>
                    <br/>
                    @endif

                    @if(is_file('uploads/'.$url.'/'.$row->image_path))
                    <p><span class="text-highlight">Video Thumbnail:</span></p>
                    <img src="{{ asset('uploads/'.$url.'/'.$row->image_path) }}" class="img-fluid" alt="Blog">
                    @endif

                    <hr/>
                    <p><span class="text-highlight">Details:</span> {!! $row->description !!}</p>
                    <p><span class="text-highlight">Show To Home:</span> 
                        @if( $row->home_flag == 1 )
                        <span class="badge badge-success">Yes</span>
                        @else
                        <span class="badge badge-danger">No</span>
                        @endif
                    </p>

                    <hr/>
                    <p><span class="text-highlight">Status:</span> 
                    @if( $row->status == 1 )
                    <span class="badge badge-success badge-pill">Active</span>
                    @else
                    <span class="badge badge-danger badge-pill">Inactive</span>
                    @endif
                    </p>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->