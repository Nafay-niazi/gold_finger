@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <p class="mb-0 text-white font-bold">Cutters <small>Detail</small></p>
@stop

@section('content')
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gold-500 text-white">
                    <p class="modal-title font-bold" id="exampleModalLabel">Update <small>Details</small></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">

                </div>
            </div>

        </div>
    </div>

    <div class="py-5 container ">
        <table class="table table-striped table-bordered dt-responsive nowrap no-footer " id="cutterTable">
            <thead>
                <tr>
                    <th>Sr. no</th>
                    <th>Cutter name</th>
                    <th>Email</th>
                    <th>Phone no</th>
                    <th>Address</th>
                    <th>Status</th>

                    <th class="text-center" width="12%">Action</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@stop


@section('css')
    <style>
        #cutterForm label.error {
            color: red;
        }

        .dataTables_wrapper .dataTables_length select {
            padding: 2px 18px;
        }

    </style>
@stop


@section('js')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('plugins.jqueryMaskPlugin', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Select2', true)

<script src="{{asset('assets/js/gold_finger_custom.js')}}"></script>

<script defer>
    $(document).ready(function() {
      //show user data in data table

       var listRoute =  "{{ route('cutter.list') }}";
       var userRole = "cutter";
       var tableId= $("#cutterTable");
       show_users_data(listRoute,userRole,tableId);

        //edit cutter

        $(document).on("click", ".edit_cutter", function() {
        var dataId = $(this).attr("data-id");
        var editRoute =  "{{ route('cutter.edit') }}";
       show_edit_data(dataId,editRoute,userRole)
        });

        // delete cutter
        $(document).on("click", ".delete_cutter", function() {

        var deleteRow = $(this).parents("tr");
        var dataId = $(this).attr("data-id");
        var deleteRoute =  "{{ route('cutter.delete') }}";
        delete_user_func(dataId,deleteRoute,deleteRow);

        });

// update cutter here
        $(document).on("click",".update_cutter_btn",function(){
            var button = $(this);
        var dataId = $(this).attr("data-id");
        var form = $(this).parents(".update_user_form");
        var formData = new FormData(form[0]);
        formData.append("id",dataId);
        var updateRoute =  "{{ route('cutter.update') }}";
        update_user_func(dataId,updateRoute,formData);

        });
    });
</script>
@stop
