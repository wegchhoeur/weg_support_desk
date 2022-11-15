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
                        <label for="title">Page Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" placeholder="Page Title" required>

                        <div class="invalid-feedback">
                          Please Provide Page Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $row->meta_title }}" placeholder="Meta Title" required>

                        <div class="invalid-feedback">
                          Please Provide Meta Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta Description: <span>Maximum length 160 characters</span></label>
                        <textarea class="form-control" name="meta_description" id="meta_description" rows="4">{!! $row->meta_description !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords: <span>Separate Every Keyword by Using (,) Symbol</span></label>
                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="4">{!! $row->meta_keywords !!}</textarea>
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