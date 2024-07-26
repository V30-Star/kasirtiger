<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo e(asset('upload/favicon.png')); ?>">
    <title>Assets Management System</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap/bootstrap.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('plugin/datatables2/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/datepicker.css')); ?>">
    
    <!-- Script -->
    <script src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/chart/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/chart/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/chart/utils.js')); ?>"></script>
    <script src="<?php echo e(asset ('plugin/jqueryvalidation/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/jqueryvalidation/additional-methods.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/datatables2/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/general.js')); ?>"></script>


</head>

<body>

    <div class="sidebar">
        <div class=" sidebar-wrapper">
            <div class="logo">
                <img class="logoimg" src="" style="width:200px" />
                </a>
            </div>
            <ul class="nav">

                <li class="<?php echo e(Request::is( 'home') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'home')); ?>">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-dashboard.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.dashboard');?>
                        </p>
                    </a>
                </li>

              
                <li class="<?php echo e(Request::is( 'assetlist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'assetlist')); ?>">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-asset.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.assetmenu');?>
                        </p>
                    </a>
                </li>
              
                <li class="<?php echo e(Request::is( 'componentlist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'componentlist')); ?>">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-component.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.componentmenu');?>
                        </p>
                    </a>
                </li>
              
                <li class="<?php echo e(Request::is( 'maintenancelist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'maintenancelist')); ?>">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-maintenance.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.maintenancemenu');?>
                        </p>
                    </a>
                </li>
              
                <li class="<?php echo e(Request::is( 'assettypelist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'assettypelist')); ?>">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-type.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.assettypemenu');?>
                        </p>
                    </a>
                </li>
             
                <li class="<?php echo e(Request::is( 'brandlist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'brandlist')); ?>">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-manufacturer.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.brandmenu');?>
                        </p>
                    </a>
                </li>
                
                <li class="<?php echo e(Request::is( 'supplierlist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'supplierlist')); ?>">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-supplier.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.suppliermenu');?>
                        </p>
                    </a>
                </li>

                <li class="<?php echo e(Request::is( 'locationlist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'locationlist')); ?>">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-location.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.locationmenu');?>
                        </p>
                    </a>
                </li>
                <li class="<?php echo e(Request::is( 'employeeslist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'employeeslist')); ?>">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-employee.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.employeemenu');?>
                        </p>
                    </a>
                </li>

                <li class="<?php echo e(Request::is( 'departmentlist') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'departmentlist')); ?>">
                        <p><img width="20"
                                src="<?php echo asset('images/icon-department.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.departmentmenu');?>
                        </p>
                    </a>
                </li>


                <li class="<?php echo e(Request::is( 'reports/allreports') ? 'active' : ''); ?>">
                    <a href="<?php echo e(URL::to( 'reports/allreports')); ?>">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-report.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.reportmenu');?>
                        </p>
                    </a>
                </li>


                <li>
                    <a data-toggle="collapse" href="#settings"
                        class="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? '' : 'collapsed'); ?>"
                        aria-expanded="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? 'true' : 'false'); ?>">
                        <i class="ti-settings"></i>
                        <p><img width="25"
                                src="<?php echo asset('images/icon-setting.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.settingmenu');?>
                        </p>
                    </a>
                    <div class="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? 'collapse in' : 'collapse'); ?>"
                        id="settings"
                        aria-expanded="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? 'true' : 'false'); ?>"
                        style="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? '' : 'height: 0px;'); ?>">
                        <ul class="nav">
                            
                            
                            <li class="<?php echo e(Request::is( 'userlist') ? 'active' : ''); ?>">
                                <a href="<?php echo e(URL::to( 'userlist')); ?>">
                                    <span class="sidebar-mini"><i class="fa fa-angle-right"></i></span>
                                    <span class="sidebar-normal"><?php echo trans('lang.usermenu');?></span>
                                </a>
                            </li>
                         
                            <li class="<?php echo e(Request::is( 'settinglist') ? 'active' : ''); ?>">
                                <a href="<?php echo e(URL::to( 'settinglist')); ?>">
                                    <span class="sidebar-mini"><i class="fa fa-angle-right"></i></span>
                                    <span class="sidebar-normal"><?php echo trans('lang.applicationmenu');?></span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-light bg-light pl-4 pr-4">

           
                <div class="col-md-6 ">
                <a class="navbar-brand company" href="#"></a>
                <button class="navbar-toggler nav-toggler-mobile" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu"
                    aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                </div>
                <div class="col-md-6 ">
                     <!--responsive-->
                        <div class="collapse" id="menu">
                        <ul class="nav navmobile" >
                            
                            <li class="<?php echo e(Request::is( 'home') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'home')); ?>">
                                        <p><?php echo trans('lang.dashboard');?>
                                        </p>
                                    </a>
                                </li>

                              
                                <li class="<?php echo e(Request::is( 'assetlist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'assetlist')); ?>">
                                        <p><?php echo trans('lang.assetmenu');?>
                                        </p>
                                    </a>
                                </li>
                              
                                <li class="<?php echo e(Request::is( 'componentlist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'componentlist')); ?>">
                                        <p><?php echo trans('lang.componentmenu');?>
                                        </p>
                                    </a>
                                </li>
                              
                                <li class="<?php echo e(Request::is( 'maintenancelist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'maintenancelist')); ?>">
                                        <p><?php echo trans('lang.maintenancemenu');?>
                                        </p>
                                    </a>
                                </li>
                              
                                <li class="<?php echo e(Request::is( 'assettypelist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'assettypelist')); ?>">
                                        <p><?php echo trans('lang.assettypemenu');?>
                                        </p>
                                    </a>
                                </li>
                             
                                <li class="<?php echo e(Request::is( 'brandlist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'brandlist')); ?>">
                                        <p><?php echo trans('lang.brandmenu');?>
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="<?php echo e(Request::is( 'supplierlist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'supplierlist')); ?>">
                                        <p><?php echo trans('lang.suppliermenu');?>
                                        </p>
                                    </a>
                                </li>

                                <li class="<?php echo e(Request::is( 'locationlist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'locationlist')); ?>">
                                        <p><?php echo trans('lang.locationmenu');?>
                                        </p>
                                    </a>
                                </li>
                                <li class="<?php echo e(Request::is( 'employeeslist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'employeeslist')); ?>">
                                        <p><?php echo trans('lang.employeemenu');?>
                                        </p>
                                    </a>
                                </li>

                                <li class="<?php echo e(Request::is( 'departmentlist') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'departmentlist')); ?>">
                                        <p><?php echo trans('lang.departmentmenu');?>
                                        </p>
                                    </a>
                                </li>


                                <li class="<?php echo e(Request::is( 'reports/allreports') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(URL::to( 'reports/allreports')); ?>">
                                        <p><?php echo trans('lang.reportmenu');?>
                                        </p>
                                    </a>
                                </li>


                                <li>
                                    <a data-toggle="collapse" href="#settingsmob"
                                        class="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? '' : 'collapsed'); ?>"
                                        aria-expanded="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? 'true' : 'false'); ?>">
                                        <i class="ti-settings"></i>
                                        <p><?php echo trans('lang.settingmenu');?>
                                        </p>
                                    </a>
                                    <div class="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? 'collapse in' : 'collapse'); ?>"
                                        id="settingsmob"
                                        aria-expanded="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? 'true' : 'false'); ?>"
                                        style="<?php echo e(Request::is( 'settings/profile') || Request::is( 'settings/allusers') || Request::is( 'settings/application') ? '' : 'height: 0px;'); ?>">
                                        <ul class="nav">
                                            
                                            
                                            <li class="<?php echo e(Request::is( 'userlist') ? 'active' : ''); ?>">
                                                <a href="<?php echo e(URL::to( 'userlist')); ?>">
                                                    <span class="sidebar-mini"><i class="fa fa-angle-right"></i></span>
                                                    <span class="sidebar-normal"><?php echo trans('lang.usermenu');?></span>
                                                </a>
                                            </li>
                                         
                                            <li class="<?php echo e(Request::is( 'settinglist') ? 'active' : ''); ?>">
                                                <a href="<?php echo e(URL::to( 'settinglist')); ?>">
                                                    <span class="sidebar-mini"><i class="fa fa-angle-right"></i></span>
                                                    <span class="sidebar-normal"><?php echo trans('lang.applicationmenu');?></span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                               
                            </ul>
                    </div>
                        <!--end responsive-->
                    <ul class="topmenu float-md-right float-sm-left">
                        <li>
                      
                                    <span class="sidebar-mini"><i class="fa fa-user"></i></span>
                                    <span class="sidebar-normal"><?php echo trans('lang.welcome');?>, <?php echo e(Auth::user()->fullname); ?> &nbsp;&nbsp;&nbsp;</span>
                              
                        </li>
                        <li>
                        <a href="<?php echo e(URL::to( 'logout')); ?>">
                                    <span class="sidebar-mini"><i class="fa fa-sign-out"></i></span>
                                    <span class="sidebar-normal"><?php echo trans('lang.logout');?></span>
                                </a>
                        </li>
                    </ul>
                </div>           
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
        <footer class="footer">
            <div class="container-fluid">

                <div class="copyright pull-right">
                    © 2021, made with <i class="fa fa-heart heart"></i> by <span class="company"></span></a>
                </div>
            </div>
        </footer>
    </div>

    <script>
    (function($) { 
    "use strict";

            //get app setting
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('settings')); ?>",
                dataType: "JSON",
                success: function(data) {
                    $("#id").val('1');
                    $(".company").html(data.data.company);
                    $(".setcurrency").html(data.data.currency);
                    $(".logoimg").attr("src", data.logo);
                }
            });
            //datepicker
            $('.setdate').datepicker({
                autoclose: true,
                dateFormat: "yy-mm-dd",
                todayHighlight: true
            }); 

    })(jQuery);
    </script>

</body>

</html><?php /**PATH C:\xampp2\htdocs\massets\massets\core\resources\views/main.blade.php ENDPATH**/ ?>