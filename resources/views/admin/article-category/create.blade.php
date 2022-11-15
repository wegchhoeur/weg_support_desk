    <!-- Add modal content -->
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ URL::route($url.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add {{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">Category Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Category Title" required>

                        <div class="invalid-feedback">
                          Please Provide Category Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Category Details</label>
                        <textarea class="form-control summernote" name="details" id="details" rows="8"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-size="small" name="home_flag" id="home_flag" value="1" checked>
                        <label for="home_flag">Show To Home</label>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->