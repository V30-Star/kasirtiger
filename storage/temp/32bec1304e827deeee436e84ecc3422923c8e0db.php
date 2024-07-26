<?php $__env->startSection('content'); ?>

<section class="">
    <div class="content p-4">
        <div class="row pt-3">
            <div class="col-md-8">
                <h3 class=""><?php echo trans('lang.componentdetail');?></h3>
            </div>
            <div class="col-md-4 text-md-right">
                                 
                                <a href="<?php echo e(url('componentlist')); ?>" id="btndetail"  class="btn btn-sm btn-fill btn-warning"><i
                                        class="ti-info"></i> <?php echo trans('lang.backtocomponent');?></a>
                           
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-9">
                                <input type="hidden" value="<?php echo e($componentid); ?>" name="componentid" id="componentid" />
                                <p class="title-detail font-bold"> <span class="componentname"></span> </p>
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="checkinsuccess" style="display:none" class="alert alert-success"><?php echo trans('lang.data_checkin_succeess');?></div>
                                <div >
                                    
                                    <div>
                                         <div class="table-responsive  pt-4">
                                         <table id="datacomponent" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.asset');?></th>
                                                        <th><?php echo trans('lang.quantity');?></th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.asset');?></th>
                                                        <th><?php echo trans('lang.quantity');?></th>
                                                        <th><?php echo trans('lang.date');?></th>
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
                </div>
            </div>
        </div>

        <!--add checkin -->
     <div id="checkin" class="modal fade" role="dialog" >
        <div class="modal-dialog ">
            <div class="modal-content">

                <form action="#" id="formcheckin" enctype="multipart/form-data" autocomplete="off">
                    <div class="modal-header">
                        
                        <h5 class="modal-title"><?php echo trans('lang.checkin');?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                         <div id="checkinfailed" style="display:none" class="alert alert-success"><?php echo trans('lang.data_checkin_failed_quantity');?></div>
                        <div class="form-row">
                           
                            <div class="form-group col-md-12">
                                <label><?php echo trans('lang.component');?></label>
                                <input name="assetname" type="text" readonly id="checkinname" class="componentname form-control" required placeholder="<?php echo trans('lang.component');?>"/>
                            </div>
                            
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label><?php echo trans('lang.quantity');?></label>
                                <input name="quantity" type="text" id="checkinquantity" class=" form-control" required placeholder="<?php echo trans('lang.quantity');?>"/>
                            </div>
                        </div>
                       
                        <div class="form-row">
                            <div class="form-group col-md-12" style="margin-bottom:0px;">
                                    <label for="checkindate" class="control-label"><?php echo trans('lang.checkindate');?></label>     
                                    <div class="input-group" style="margin-bottom:0px;">                       
                                    <input class="form-control setdate" required="" placeholder="<?php echo trans('lang.checkindate');?>" id="checkindate" name="checkindate" type="text">
                                    <span class="input-group-addon" id="date" style="border: 1px solid #cecece;"><i class="fa fa-calendar"></i></span>      
                                </div>
                                <label class="error" for="checkoutdate"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" name="historyid" id="historyid"/>
                    <input type="hidden" name="componentid" id="checkincomponentid"/>
                    <input type="hidden" name="assetid" id="checkinassetid"/> 

                        <button type="submit" class="btn btn-primary"
                            id="savecheckin"><?php echo trans('lang.save');?></button>
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo trans('lang.close');?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end checkin-->
       
    </div>
</section>

<script>
$(document).ready(function() {

    var componentid = $("#componentid").val();
    $.ajax({
        type: "POST",
        url: "<?php echo e(url('componentbyid')); ?>",
        data: {
            id: componentid
        },
        dataType: "JSON",
        success: function(data) {
            $(".componentname").html(data.message.componentname);
            $(".componentname").val(data.message.componentname);
        }
    });
    


    //component data
    $('#datacomponent').DataTable({

        processing: true,
        serverSide: true, 
        'lengthMenu': [
            [10, 25, 50, 100, -1],
            ['10', '25', '50', '100', '<?php echo trans('lang.overall ');?>'
            ]
        ],
        ajax: {
        url: "<?php echo e(url('historycomponentbyid')); ?>",
        type: "post",
        data: function (d) {
              d.id = componentid;
            }
        },
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
                data: 'assetname'
            },
           
            {
                data: 'quantity'
            },
            {
                data: 'date'
            },
            {
                data: 'action'
            },
           
           
        ],
        dom: "<'row'<'col-sm-9 text-left'B><'col-sm-3'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-2'l><'col-sm-5'i><'col-sm-5'p>>",
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.componentdetail ');?>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.componentdetail');?>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.componentdetail');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.componentdetail');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            }
        ]
    });

    //checkin
    $("#formcheckin").validate({
        rules: {
          quantity: {
            required: true,
            digits: true
          }
        },
        submitHandler: function(form) {
            $.ajax({
                method: "POST",
                url: "<?php echo e(url('savecheckincomponent')); ?>",
                data: $("#formcheckin").serialize(),
                dataType: "JSON",
                success: function(data) {
                    if(data.success=='0'){
                        $("#checkinfailed").css({'display':"block"});
                    }
                    if(data.success=='success'){
                        $("#checkinsuccess").css({'display':"block"});
                        $('#checkin').modal('hide');
                        window.setTimeout(function(){location.reload()},2000)
                    }
                }
            });
        }
    });

    //getdetail
    $('#checkin').on('show.bs.modal', function(e) {
        var $modal = $(this),
        id = $(e.relatedTarget).attr('customdata');
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('singlehistorycomponentbyid')); ?>",
            data: {id:id},
            dataType: "JSON",
            success: function(data) {
                $("#historyid").val(id);
                $("#checkincomponentid").val(data.message.componentid);
                $("#checkinassetid").val(data.message.assetid);
            }
        });
    });

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\massets\massets\resources\views/component/detail.blade.php ENDPATH**/ ?>