<?php $__env->startSection('content'); ?>

<section class="">
    <div class="content p-4">
        <div class="row pt-3">
            <div class="col-md-6">
                <h3 class=""><?php echo trans('lang.maintenance_list');?></h3>
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
                                        <th><?php echo trans('lang.assettag');?></th>
                                        <th><?php echo trans('lang.asset');?></th>
                                        <th><?php echo trans('lang.supplier');?></th>
                                        <th><?php echo trans('lang.type');?></th>
                                        <th><?php echo trans('lang.startdate');?></th>
                                        <th><?php echo trans('lang.enddate');?></th>
                                        <th><?php echo trans('lang.action');?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.assettag');?></th>
                                        <th><?php echo trans('lang.asset');?></th>
                                        <th><?php echo trans('lang.supplier');?></th>
                                        <th><?php echo trans('lang.type');?></th>
                                        <th><?php echo trans('lang.startdate');?></th>
                                        <th><?php echo trans('lang.enddate');?></th>
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
                <form action="#" id="formadd" autocomplete="off">
                    <div class="modal-header">
                       
                        <h5 class="modal-title"><?php echo trans('lang.add_data');?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" >
                            <label><?php echo trans('lang.asset');?></label>
                                <select name="assetid" id="assetid" required class="form-control">
                                    <option value=""><?php echo trans('lang.asset');?></option>
                                </select>
                        </div>
                        <div class="form-group" >
                            <label><?php echo trans('lang.supplier');?></label>
                                <select name="supplierid" id="supplierid" required class="form-control">
                                    <option value=""><?php echo trans('lang.supplier');?></option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.type');?></label>
                                <select name="type" id="type" required class="form-control">
                                    <option value=""><?php echo trans('lang.type');?></option>
                                    <option value="<?php echo trans('lang.Maintenance');?>"><?php echo trans('lang.Maintenance');?></option>
                                    <option value="<?php echo trans('lang.Repair');?>"><?php echo trans('lang.Repair');?></option>
                                    <option value="<?php echo trans('lang.Upgrade');?>"><?php echo trans('lang.Upgrade');?></option>
                                    <option value="<?php echo trans('lang.Testing');?>"><?php echo trans('lang.Testing');?></option>
                                    <option value="<?php echo trans('lang.Calibration');?>"><?php echo trans('lang.Calibration');?></option>
                                    <option value="<?php echo trans('lang.Softwaresupport');?>"><?php echo trans('lang.Softwaresupport');?></option>
                                    <option value="<?php echo trans('lang.Hardwaresupport');?>"><?php echo trans('lang.Hardwaresupport');?></option>
                                </select>
                        </div>
                        <div class="form-group " style="margin-bottom:0px;">
                                    <label for="startdate" class="control-label"><?php echo trans('lang.startdate');?></label>     
                                    <div class="input-group" style="margin-bottom:0px;">                       
									<input class="form-control setdate" required="" placeholder="<?php echo trans('lang.startdate');?>" id="startdate" name="startdate" type="text">
                                    <span class="input-group-addon" id="date" style="border: 1px solid #cecece;"><i class="fa fa-calendar"></i></span>      
                                </div>
                                <label class="error" for="startdate"></label>
                        </div>
                        <div class="form-group " style="margin-bottom:0px;">
                                    <label for="enddate" class="control-label"><?php echo trans('lang.enddate');?></label>     
                                    <div class="input-group" style="margin-bottom:0px;">                       
									<input class="form-control setdate" required="" placeholder="<?php echo trans('lang.enddate');?>" id="enddate" name="enddate" type="text">
                                    <span class="input-group-addon" id="date" style="border: 1px solid #cecece;"><i class="fa fa-calendar"></i></span>      
                                </div>
                                <label class="error" for="enddate"></label>
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
                    <div class="form-group" >
                            <label><?php echo trans('lang.asset');?></label>
                                <select name="assetid" id="editassetid" required class="form-control">
                                    <option value=""><?php echo trans('lang.asset');?></option>
                                </select>
                        </div>
                        <div class="form-group" >
                            <label><?php echo trans('lang.supplier');?></label>
                                <select name="supplierid" id="editsupplierid" required class="form-control">
                                    <option value=""><?php echo trans('lang.supplier');?></option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.type');?></label>
                                <select name="type" id="edittype" required class="form-control">
                                    <option value=""><?php echo trans('lang.type');?></option>
                                    <option value="<?php echo trans('lang.Maintenance');?>"><?php echo trans('lang.Maintenance');?></option>
                                    <option value="<?php echo trans('lang.Repair');?>"><?php echo trans('lang.Repair');?></option>
                                    <option value="<?php echo trans('lang.Upgrade');?>"><?php echo trans('lang.Upgrade');?></option>
                                    <option value="<?php echo trans('lang.Testing');?>"><?php echo trans('lang.Testing');?></option>
                                    <option value="<?php echo trans('lang.Calibration');?>"><?php echo trans('lang.Calibration');?></option>
                                    <option value="<?php echo trans('lang.Softwaresupport');?>"><?php echo trans('lang.Softwaresupport');?></option>
                                    <option value="<?php echo trans('lang.Hardwaresupport');?>"><?php echo trans('lang.Hardwaresupport');?></option>
                                </select>
                        </div>
                        <div class="form-group " style="margin-bottom:0px;">
                                    <label for="editstartdate" class="control-label"><?php echo trans('lang.startdate');?></label>     
                                    <div class="input-group" style="margin-bottom:0px;">                       
									<input class="form-control setdate" required="" placeholder="<?php echo trans('lang.startdate');?>" id="editstartdate" name="startdate" type="text">
                                    <span class="input-group-addon" id="date" style="border: 1px solid #cecece;"><i class="fa fa-calendar"></i></span>      
                                </div>
                                <label class="error" for="editstartdate"></label>
                        </div>
                        <div class="form-group " style="margin-bottom:0px;">
                                    <label for="editenddate" class="control-label"><?php echo trans('lang.enddate');?></label>     
                                    <div class="input-group" style="margin-bottom:0px;">                       
									<input class="form-control setdate" required="" placeholder="<?php echo trans('lang.enddate');?>" id="editenddate" name="enddate" type="text">
                                    <span class="input-group-addon" id="date" style="border: 1px solid #cecece;"><i class="fa fa-calendar"></i></span>      
                                </div>
                                <label class="error" for="editenddate"></label>
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


//get all supplier
$.ajax({
        type: "GET",
		url: "<?php echo e(url('listsupplier')); ?>",
		dataType: "JSON",
		success: function(html) {
            var objs = html.message;
            jQuery.each(objs, function (index, record) {
                var id = decodeURIComponent(record.id);
                var name = decodeURIComponent(record.name);
                $("#supplierid").append($("<option></option>")
                    .attr("value",id)
                    .text(name)); 
                $("#editsupplierid").append($("<option></option>")
                    .attr("value",id)
                    .text(name));     
            });
		}   
    }); 


//get all asset
$.ajax({
        type: "GET",
		url: "<?php echo e(url('listasset')); ?>",
		dataType: "JSON",
		success: function(html) {
            var objs = html.message;
            jQuery.each(objs, function (index, record) {
                var id = decodeURIComponent(record.id);
                var name = decodeURIComponent(record.name);
                $("#assetid").append($("<option></option>")
                    .attr("value",id)
                    .text(name)); 
                $("#editassetid").append($("<option></option>")
                    .attr("value",id)
                    .text(name));     
            });
		}   
    }); 


    $('#data').DataTable({

        processing: true,
        serverSide: true, 
        'lengthMenu': [
            [10, 25, 50, 100, -1],
            ['10', '25', '50', '100', '<?php echo trans('lang.overall ');?>'
            ]
        ],
        ajax: "<?php echo e(url('maintenance')); ?>",
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
                data: 'assettag'
            },
            {
                data: 'asset'
            },
            {
                data: 'supplier'
            },
            {
                data: 'type'
            },
            {
                data: 'startdate'
            },
            {
                data: 'enddate'
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
                title: '<?php echo trans('lang.maintenance_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5,6]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.maintenance_list');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5,6]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.maintenance_list');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5,6]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.maintenance_list');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5,6]
                }
            }
        ]
    });
});


//add data
$("#formadd").validate({
    submitHandler: function(form) {
        $.ajax({
			method: "POST",
            url: "<?php echo e(url('savemaintenance')); ?>",
            data: $("#formadd").serialize(),
            dataType: "JSON",
            success: function(data) {
                console.log(data);
				$("#messagesuccess").css({'display':"block"});
				$('#add').modal('hide');
				window.setTimeout(function(){location.reload()},2000)
            }
		});
    }
});

//edit data
$("#formedit").validate({
    submitHandler: function(form) {
        $.ajax({
			method: "POST",
            url: "<?php echo e(url('updatemaintenance')); ?>",
            data: $("#formedit").serialize(),
            dataType: "JSON",
            success: function(data) {
                console.log(data);
				$("#messageupdate").css({'display':"block"});
				$('#edit').modal('hide');
				window.setTimeout(function(){location.reload()},2000)
            }
		});
    }
});

//delete data
$("#formdelete").validate({
    submitHandler: function(form) {
        $.ajax({
			method: "POST",
            url: "<?php echo e(url('deletemaintenance')); ?>",
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
		url: "<?php echo e(url('maintenancebyid')); ?>",
		data: {id:id},
		dataType: "JSON",
		success: function(data) {
			$("#editid").val(id);
            $("#editassetid").val(data.message.assetid);
            $("#editsupplierid").val(data.message.supplierid);
			$("#edittype").val(data.message.type);
            $("#editstartdate").val(data.message.startdate);
            $("#editenddate").val(data.message.enddate);
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
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\massets\massets\resources\views/maintenance/index.blade.php ENDPATH**/ ?>