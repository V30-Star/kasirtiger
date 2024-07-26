@extends('main')
@section('content')
    <section class="">
        <div class="content p-4">
            <div class="row pt-3">
                <div class="col-md-6">
                    <h3 class=""><?php echo trans('lang.storage_list'); ?></h3>
                </div>
                <div class="col-md-6 text-md-right pb-md-0 pb-3">
                    <button type="button" data-toggle="modal" data-target="#add" class="btn btn-sm btn-fill btn-primary"><i
                            class="fa fa-plus"></i> <?php echo trans('lang.add_data'); ?></button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <div id="messagesuccess" class="display-none alert alert-success"><?php echo trans('lang.data_added'); ?></div>
                            <div id="messagedelete" class="display-none alert alert-success"><?php echo trans('lang.data_deleted'); ?></div>
                            <div id="messageupdate" class="display-none alert alert-success"><?php echo trans('lang.data_updated'); ?></div>
                            <div class="table-responsive">
                                <table id="data" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th><?php echo trans('lang.name'); ?></th>
                                            <th><?php echo trans('lang.serial'); ?></th>
                                            <th><?php echo trans('lang.cost'); ?></th>
                                            <th><?php echo trans('lang.quantity'); ?></th>
                                            <th><?php echo trans('lang.description'); ?></th>
                                            <th><?php echo trans('lang.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--add new data -->
        <div id="add" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="#" id="formadd" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo trans('lang.add_data'); ?></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label><?php echo trans('lang.name'); ?></label>
                                        <input name="name" type="text" id="name" class=" form-control" required
                                            placeholder="<?php echo trans('lang.name'); ?>" />
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label><?php echo trans('lang.serial'); ?></label>
                                        <input class="form-control" name="serial" id="serial"
                                            placeholder="<?php echo trans('lang.serial'); ?>"></input>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group  col-md-12">
                                        <label><?php echo trans('lang.cost'); ?></label>
                                        <input name="cost" type="text" id="cost" class=" form-control" required
                                            placeholder="<?php echo trans('lang.cost'); ?>" />
                                    </div>

                                    <div class="form-group  col-md-12">
                                        <label><?php echo trans('lang.quantity'); ?></label>
                                        <input class="form-control" name="quantity" id="quantity"
                                            placeholder="<?php echo trans('lang.quantity'); ?>"></input>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label><?php echo trans('lang.description'); ?></label>
                                        <textarea class="form-control" name="description" id="description" placeholder="<?php echo trans('lang.description'); ?>"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="save"><?php echo trans('lang.save'); ?></button>
                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?php echo trans('lang.close'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end add data-->

        <!--edit new data -->
        <div id="edit" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="#" id="formedit">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo trans('lang.edit_data'); ?></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label><?php echo trans('lang.name'); ?></label>
                                        <input name="name" type="text" id="editname" class=" form-control" required
                                            placeholder="<?php echo trans('lang.name'); ?>" />
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label><?php echo trans('lang.serial'); ?></label>
                                        <input class="form-control" name="serial" id="editserial"
                                            placeholder="<?php echo trans('lang.serial'); ?>"></input>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group  col-md-12">
                                        <label><?php echo trans('lang.cost'); ?></label>
                                        <input name="cost" type="text" id="editcost" class=" form-control"
                                            required placeholder="<?php echo trans('lang.cost'); ?>" />
                                    </div>

                                    <div class="form-group  col-md-12">
                                        <label><?php echo trans('lang.quantity'); ?></label>
                                        <input class="form-control" name="quantity" id="editquantity"
                                            placeholder="<?php echo trans('lang.quantity'); ?>"></input>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label><?php echo trans('lang.description'); ?></label>
                                        <textarea class="form-control" name="description" id="editdescription" placeholder="<?php echo trans('lang.description'); ?>"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="editid" />
                                <button type="submit" class="btn btn-primary"
                                    id="saveedit"><?php echo trans('lang.save'); ?></button>
                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?php echo trans('lang.close'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end edit data-->

        <!--delete data -->
        <div class="modal fade" id="delete" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form action="#" id="formdelete">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo trans('lang.delete'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo trans('lang.delete_confirm'); ?></p>
                            <input type="hidden" value="" name="id" id="iddelete" />

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="delete"><?php echo trans('lang.delete'); ?></button>
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal"><?php echo trans('lang.close'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end delete data -->
    </section>

    <script>
        (function($) {
            "use strict";

            $(document).ready(function() {
                $('#data').DataTable({
                    ajax: "{{ url('storage') }}",
                    columns: [{
                            data: 'id',
                            orderable: false,
                            searchable: false,
                            visible: false
                        },

                        {
                            data: 'name'
                        },
                        {
                            data: 'serial'
                        },
                        {
                            data: 'cost'
                        },
                        {
                            data: 'quantity'
                        },
                        {
                            data: 'description'
                        },
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],

                    dom: "<'row'<'col-sm-9 text-left'B><'col-sm-3'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-2'l><'col-sm-5'i><'col-sm-5'p>>",

                    buttons: [{
                            extend: 'copy',
                            text: 'Copy <i class="fa fa-files-o"></i>',
                            className: 'btn btn-sm btn-fill btn-info ',
                            title: '<?php echo trans('lang.storage_list '); ?>',
                            exportOptions: {
                                columns: [1, 2]
                            }
                        },
                        {
                            extend: 'csv',
                            text: 'CSV <i class="fa fa-file-excel-o"></i>',
                            className: 'btn btn-sm btn-fill btn-info ',
                            title: '<?php echo trans('lang.storage_list'); ?>',
                            exportOptions: {
                                columns: [1, 2]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                            className: 'btn btn-sm btn-fill btn-info ',
                            title: '<?php echo trans('lang.storage'); ?>',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [1, 2]
                            },
                            customize: function(doc) {
                                doc.styles.tableHeader.alignment = 'left';
                                doc.content[1].table.widths = Array(doc.content[1].table.body[0]
                                        .length + 1)
                                    .join('*').split('');
                            }
                        },
                        {
                            extend: 'print',
                            title: '<?php echo trans('lang.storage_list'); ?>',
                            className: 'btn btn-sm btn-fill btn-info ',
                            text: 'Print <i class="fa fa-print"></i>',
                            exportOptions: {
                                columns: [1, 2]
                            }
                        }
                    ]
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Add data
            $("#formadd").validate({
                submitHandler: function(form) {
                    $.ajax({
                        method: "POST",
                        url: "{{ url('savestorage') }}",
                        data: $("#formadd").serialize(),
                        dataType: "JSON",
                        success: function(data) {
                            $("#messagesuccess").css({
                                'display': "block"
                            });
                            $('#add').modal('hide');
                            window.setTimeout(function() {
                                location.reload();
                            }, 2000);
                        },
                    });
                }
            });

            // Update data
            $("#formedit").validate({
                submitHandler: function(form) {
                    $.ajax({
                        method: "POST",
                        url: "{{ url('updatestorage') }}",
                        data: $("#formedit").serialize(),
                        dataType: "JSON",
                        success: function(data) {
                            $("#messageupdate").css({
                                'display': "block"
                            });
                            $('#edit').modal('hide');
                            window.setTimeout(function() {
                                location.reload();
                            }, 2000);
                        },
                    });
                }
            });

            // Delete data
            $("#formdelete").validate({
                submitHandler: function(form) {
                    $.ajax({
                        method: "POST",
                        url: "{{ url('deletestorage') }}",
                        data: $("#formdelete").serialize(),
                        dataType: "JSON",
                        success: function(data) {
                            $("#messagedelete").css({
                                'display': "block"
                            });
                            $('#delete').modal('hide');
                            window.setTimeout(function() {
                                location.reload();
                            }, 2000);
                        },
                    });
                }
            });

            //show edit data
            $('#edit').on('show.bs.modal', function(e) {
                var $modal = $(this),
                    id = $(e.relatedTarget).attr('customdata');
                $.ajax({
                    type: "POST",
                    url: "{{ url('storagebyid') }}",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $("#editid").val(id);
                        $("#editname").val(data.message.name);                        
                        $("#editserial").val(data.message.serial);                        
                        $("#editcost").val(data.message.cost);                        
                        $("#editquantity").val(data.message.quantity);                        
                        $("#editdescription").val(data.message.description);
                    }
                });
            });

            //show delete data
            $('#delete').on('show.bs.modal', function(e) {
                var $modal = $(this),
                    id = $(e.relatedTarget).attr('customdata');
                $("#iddelete").val(id);
            });
        })(jQuery);
    </script>
@endsection
