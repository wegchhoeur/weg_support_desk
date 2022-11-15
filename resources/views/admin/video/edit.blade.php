    <!-- Edit modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ URL::route($url.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit {{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">Video Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" placeholder="Video Title" required>

                        <div class="invalid-feedback">
                          Please Provide Video Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Video Details</label>
                        <textarea class="form-control summernote" name="details" id="details" rows="8">{{ $row->description }}</textarea>

                        <div class="invalid-feedback">
                          Please Provide Video Details.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Video Thumbnail</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Video Thumbnail">

                        <div class="invalid-feedback">
                          Please Provide Thumbnail Image.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="video_id">Youtube Video ID</label>
                        <input type="text" class="form-control" name="video_id" id="video_id" value="{{ $row->video_id }}" placeholder="Video ID" required>

                        <div class="invalid-feedback">
                          Please Provide Youtube Video ID.
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-size="small" name="home_flag" id="home_flag_{{ $row->id }}" value="1" @if( $row->home_flag == 1 ) checked @endif>
                        <label for="home_flag_{{ $row->id }}">Show To Home</label>
                    </div>

                    <div class="form-group">
                        <label for="status">Select Status</label>
                        <select class="wide" name="status" id="status" data-plugin="customselect">
                            <option value="1" @if( $row->status == 1 ) selected @endif>Active</option>
                            <option value="0" @if( $row->status == 0 ) selected @endif>Inactive</option>
                        </select>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->