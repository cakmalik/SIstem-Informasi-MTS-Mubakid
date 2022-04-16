<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            @if ($modalHeader == true)
                <div class="modal-header">
                    <h4 class="modal-title">{{ $title ?? '' }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="modal-body">
                {{ $body }}
            </div>
            <div class="modal-footer justify-content-between">
                {{ $footer ?? '' }}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
