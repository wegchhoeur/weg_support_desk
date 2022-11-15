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
                    <h4><span class="text-highlight">Subject:</span> {{ $row->subject }}</h4>
                    <p><span class="text-highlight">Name:</span> {{ $row->name }}</p>
                    <p><span class="text-highlight">Email:</span> {{ $row->email }}</p>
                    @if(isset($row->phone))
                    <p><span class="text-highlight">Phone:</span> {{ $row->phone }}</p>
                    @endif
                    <hr/>
                    <p><span class="text-highlight">Message:</span> {!! strip_tags($row->message, '<p><a><b><i><u><strong><br><ul><ol><li><del><ins><sup><sub><pre>') !!}</p>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->