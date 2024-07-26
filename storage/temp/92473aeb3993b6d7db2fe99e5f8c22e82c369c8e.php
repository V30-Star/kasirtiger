<?php $__env->startSection('content'); ?>

<section class="">
    <div class="content p-4">
        <div class="row pt-3">
            <div class="col-md-6">
                <h3 class=""><?php echo trans('lang.user_list');?></h3>
            </div>
            <div class="col-md-6 text-md-right pb-md-0 pb-3">
            <button type="button" data-toggle="modal" data-target="#add" class="btn btn-sm btn-fill btn-primary"><i class="fa fa-plus"></i> <?php echo trans('lang.add_data');?></button>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body ">
                    <div id="messagesuccess" style="display:none" class="alert alert-success"><?php echo trans('lang.data_added');?></div>
					<div id="messagedelete" style="display:none" class="alert alert-success"><?php echo trans('lang.data_deleted');?></div>
					<div id="messageupdate" style="display:none" class="alert alert-success"><?php echo trans('lang.data_updated');?></div>
                        <div class="table-responsive">
                            <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.fullname');?></th>
                                        <th><?php echo trans('lang.email');?></th>
                                        <th><?php echo trans('lang.phone');?></th>
                                        <th><?php echo trans('lang.role');?></th>
                                        <th><?php echo trans('lang.city');?></th>
                                        <th><?php echo trans('lang.status');?></th>
                                        <th><?php echo trans('lang.action');?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.fullname');?></th>
                                        <th><?php echo trans('lang.email');?></th>
                                        <th><?php echo trans('lang.phone');?></th>
                                        <th><?php echo trans('lang.role');?></th>
                                        <th><?php echo trans('lang.city');?></th>
                                        <th><?php echo trans('lang.status');?></th>
                                        <th><?php echo trans('lang.action');?></th>
                                    </tr>
                                </tfoot>
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
    <div id="add" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" id="formadd">
                    <div class="modal-header">
                       
                        <h5 class="modal-title"><?php echo trans('lang.add_data');?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <div  style="display:none" class="messageexist alert alert-success"><?php echo trans('lang.data_exist');?></div>
                        <div class="form-group">
                            <label><?php echo trans('lang.fullname');?></label>
                            <input name="fullname" type="text" id="fullname" class=" form-control" required placeholder="<?php echo trans('lang.fullname');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.email');?></label>
                            <input name="email" type="email" id="email" class=" form-control" required placeholder="<?php echo trans('lang.email');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.phone');?></label>
                            <input name="phone" type="text" id="phone" class=" form-control" required placeholder="<?php echo trans('lang.phone');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.status');?></label>
                            <select name="status" required class="form-control">
                                <option value=""><?php echo trans('lang.status');?></option>
                                <option value="1"><?php echo trans('lang.active');?></option>
                                <option value="2"><?php echo trans('lang.inactive');?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.role');?></label>
                            <select name="role" required class="form-control">
                                <option value=""><?php echo trans('lang.role');?></option>
                                <option value="1"><?php echo trans('lang.admin');?></option>
                                <option value="2"><?php echo trans('lang.user');?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.city');?></label>
                            <input name="city" type="text" id="city" class=" form-control" required placeholder="<?php echo trans('lang.city');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.password');?></label>
                            <input name="password" type="password" id="password" class=" form-control" required placeholder="<?php echo trans('lang.password');?>"/>
                        </div>
                        
                       
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            id="save"><?php echo trans('lang.save');?></button>
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo trans('lang.close');?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end add data-->

    <!--edit new data -->
    <div id="edit" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" id="formedit">
                    <div class="modal-header">
                       
                        <h5 class="modal-title"><?php echo trans('lang.edit_data');?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <div  style="display:none" class="messageexist alert alert-success"><?php echo trans('lang.data_exist');?></div>
                        <div class="form-group">
                            <label><?php echo trans('lang.fullname');?></label>
                            <input name="fullname" type="text" id="editfullname" class=" form-control" required placeholder="<?php echo trans('lang.fullname');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.email');?></label>
                            <input name="email" type="email" id="editemail" class=" form-control" required placeholder="<?php echo trans('lang.email');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.phone');?></label>
                            <input name="phone" type="text" id="editphone" class=" form-control" required placeholder="<?php echo trans('lang.phone');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.status');?></label>
                            <select name="status" id="editstatus" required class="form-control">
                                <option value=""><?php echo trans('lang.status');?></option>
                                <option value="1"><?php echo trans('lang.active');?></option>
                                <option value="2"><?php echo trans('lang.inactive');?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.role');?></label>
                            <select name="role" id="editrole" required class="form-control">
                                <option value=""><?php echo trans('lang.role');?></option>
                                <option value="1"><?php echo trans('lang.admin');?></option>
                                <option value="2"><?php echo trans('lang.user');?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.city');?></label>
                            <input name="city" type="text" id="editcity" class=" form-control" required placeholder="<?php echo trans('lang.city');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.password');?></label>
                            <input name="password" type="password" id="editpassword" class=" form-control"  placeholder="<?php echo trans('lang.password');?>"/>
                            <p class="text-help"><?php echo trans('lang.password_note');?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="editid"/>
                        <button type="submit" class="btn btn-primary"
                            id="saveedit"><?php echo trans('lang.save');?></button>
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo trans('lang.close');?></button>
                    </div>
                </form>
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
                    <h5 class="modal-title"><?php echo trans('lang.delete');?></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p><?php echo trans('lang.delete_confirm');?></p>
                    <input type="hidden" value="" name="id" id="iddelete"/>
            
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="delete"><?php echo trans('lang.delete');?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo trans('lang.close');?></button>
                </div>
            </form>   
        </div>
        </div>
    </div>
    <!--end delete data -->
</section>

<script>
$(document).ready(function() {
    $('#data').DataTable({

        processing: true,
        serverSide: true, 
        'lengthMenu': [
            [10, 25, 50, 100, -1],
            ['10', '25', '50', '100', '<?php echo trans('lang.overall ');?>'
            ]
        ],
        ajax: "<?php echo e(url('user')); ?>",
        "language": {
            "decimal": "",
            "emptyTable": "<?php echo trans('lang.demptyTable');?>",
            "info": "<?php echo trans('lang.dshowing');?> _START_ <?php echo trans('lang.dto');?> _END_ <?php echo trans('lang.dof');?> _TOTAL_ <?php echo trans('lang.dentries');?>",
            "infoEmpty": "<?php echo trans('lang.dinfoEmpty');?>",
            "infoFiltered": "(<?php echo trans('lang.dfilter');?> _MAX_ <?php echo trans('lang.total');?> <?php echo trans('lang.dentries');?>)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "<?php echo trans('lang.dshow');?> _MENU_ <?php echo trans('lang.dentries');?>",
            "loadingRecords": "<?php echo trans('lang.dloadingRecords');?>",
            "processing": "<?php echo trans('lang.dprocessing');?>",
            "search": "<?php echo trans('lang.dsearch');?>",
            "zeroRecords": "<?php echo trans('lang.dzeroRecords');?>",
            "paginate": {
                "first": "<?php echo trans('lang.dfirst');?>",
                "last": "<?php echo trans('lang.dlast');?>",
                "next": "<?php echo trans('lang.dnext');?>",
                "previous": "<?php echo trans('lang.dprevious');?>"
            }
        },
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },
           
            {
                data: 'fullname'
            },
           
            {
                data: 'email'
            },
            {
                data: 'phone'
            },
            {
                data: 'role'
            },
            {
                data: 'city'
            },
            {
                data: 'status'
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
                title: '<?php echo trans('lang.user_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5, 6]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.user_list');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5, 6]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.user_list');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5, 6]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.user_list');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5, 6]
                }
            }
        ]
    });
});



//add data
$("#formadd").validate({
    rules: {
      phone: {
        required: true,
        digits: true
      }
    },
    submitHandler: function(form) {
        $.ajax({
			method: "POST",
            url: "<?php echo e(url('saveuser')); ?>",
            data: $("#formadd").serialize(),
            dataType: "JSON",
            success: function(data) {
                if(data.message=='success'){
                    $("#messagesuccess").css({'display':"block"});
                    $('#add').modal('hide');
                    window.setTimeout(function(){location.reload()},2000);
                }
                if(data.message=='exist'){
                    $(".messageexist").css({'display':"block"});
                }
            }
		});
    }
});

//edit data
$("#formedit").validate({
    rules: {
      phone: {
        required: true,
        digits: true
      }
    },
    submitHandler: function(form) {
        $.ajax({
			method: "POST",
            url: "<?php echo e(url('updateuser')); ?>",
            data: $("#formedit").serialize(),
            dataType: "JSON",
            success: function(data) {
                
                if(data.message=='success'){
                    $("#messageupdate").css({'display':"block"});
                    $('#edit').modal('hide');
                    window.setTimeout(function(){location.reload()},2000);
                }
                if(data.message=='exist'){
                    $(".messageexist").css({'display':"block"});
                }

            }
		});
    }
});

//delete data
$("#formdelete").validate({
    submitHandler: function(form) {
        $.ajax({
			method: "POST",
            url: "<?php echo e(url('deleteuser')); ?>",
            data: $("#formdelete").serialize(),
            dataType: "JSON",
            success: function(data) {
                console.log(data);
				$("#messagedelete").css({'display':"block"});
				$('#delete').modal('hide');
				window.setTimeout(function(){location.reload()},2000)
            }
		});
    }
});

//show edit data
$('#edit').on('show.bs.modal', function(e) {
    var $modal = $(this),
    id = $(e.relatedTarget).attr('customdata');
	$.ajax({
		type: "POST",
		url: "<?php echo e(url('userbyid')); ?>",
		data: {id:id},
		dataType: "JSON",
		success: function(data) {
			$("#editid").val(id);
            $("#editfullname").val(data.message.fullname);
            $("#editemail").val(data.message.email);
            $("#editstatus").val(data.message.status);
            $("#editcity").val(data.message.city);
            $("#editphone").val(data.message.phone);
            $("#editrole").val(data.message.role);
		}   
	});
});

//show delete data

$('#delete').on('show.bs.modal', function(e) {
    var $modal = $(this),
    id = $(e.relatedTarget).attr('customdata');
    $("#iddelete").val(id);
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\massets\massets\resources\views/user/index.blade.php ENDPATH**/ ?>