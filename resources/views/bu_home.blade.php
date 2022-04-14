@extends('layouts.app')
@push('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@push('footer')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Initialize Select2 Elements
            $(".select2bs4").select2({
                theme: "bootstrap4",
            });
        });
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">Start creating your amazing application!</div>
        <!-- /.card-body -->
        <div class="card-footer">Footer</div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    <x-modal id="modal-default">
        <x-slot name="title">
            Modal title
        </x-slot>
        <x-slot name="body">
            <p>One fine bod</p>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </x-slot>
    </x-modal>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
        Launch Default Modal
    </button>

    <button type="button" class="btn btn-success swalDefaultSuccess">
        Launch Success Toast
    </button>
    <button type="button" class="btn btn-success toastsDefaultSuccess">
        Launch Success Toast
    </button>

    <hr>
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label>Multiple (.select2-purple)</label>
            <div class="select2-purple">
                <select class="select2" multiple="multiple" data-placeholder="Select a State"
                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
        </div>
    </div>

    <select class="js-example-basic-single" name="state">
        <option value="AL">Alabama</option>
        ...
        <option value="WY">Wyoming</option>
    </select>
@endsection
