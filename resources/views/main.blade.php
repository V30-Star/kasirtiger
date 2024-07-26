    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png"
            href="{{ asset('upload/Screenshot_2024-07-25_093255-removebg-preview.png') }}">
        <title>Kasir Tiger</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('plugin/datatables2/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            type="text/css">

        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('plugin/chart/moment.min.js') }}"></script>
        <script src="{{ asset('plugin/chart/Chart.min.js') }}"></script>
        <script src="{{ asset('plugin/chart/utils.js') }}"></script>
        <script src="{{ asset('plugin/jqueryvalidation/jquery.validate.js') }}"></script>
        <script src="{{ asset('plugin/jqueryvalidation/additional-methods.js') }}"></script>
        <script src="{{ asset('plugin/datatables2/datatables.min.js') }}"></script>
        <script src="{{ asset('js/general.js') }}"></script>
    </head>

    <body>
        <div class="sidebar">
            <div class=" sidebar-wrapper">
                <div class="logo">
                    <img class="logoimg" src="" style="width:200px" />
                    </a>
                </div>
                <ul class="nav">

                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a href="{{ URL::to('home') }}">
                            <p><img width="22" src="<?php echo asset('images/icon-dashboard.png'); ?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.dashboard'); ?>
                            </p>
                        </a>
                    </li>

                    <li class="{{ Request::is('storagelist') ? 'active' : '' }}">
                        <a href="{{ URL::to('storagelist') }}">
                            <p><img width="20" src="<?php echo asset('images/icon-department.png'); ?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.storagemenu'); ?>
                            </p>
                        </a>
                    </li>

                    <li class="{{ Request::is('reports/allreports') ? 'active' : '' }}">
                        <a href="javascript:void(0);" style="pointer-events: none; color: gray;">
                            <p><?php echo trans('lang.reportmenu'); ?></p>
                        </a>
                    </li>


                    <li>
                        <a data-toggle="collapse" href="#settings"
                            class="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? '' : 'collapsed' }}"
                            aria-expanded="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? 'true' : 'false' }}">
                            <i class="ti-settings"></i>
                            <p><img width="25" src="<?php echo asset('images/icon-setting.png'); ?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.settingmenu'); ?>
                            </p>
                        </a>
                        <div class="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? 'collapse in' : 'collapse' }}"
                            id="settings"
                            aria-expanded="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? 'true' : 'false' }}"
                            style="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? '' : 'height: 0px;' }}">
                            <ul class="nav">


                                <li class="{{ Request::is('userlist') ? 'active' : '' }}">
                                    <a href="{{ URL::to('userlist') }}">
                                        <span class="sidebar-mini"><i class="fa fa-angle-right"></i></span>
                                        <span class="sidebar-normal"><?php echo trans('lang.usermenu'); ?></span>
                                    </a>
                                </li>

                                <li class="{{ Request::is('settinglist') ? 'active' : '' }}">
                                    <a href="{{ URL::to('settinglist') }}">
                                        <span class="sidebar-mini"><i class="fa fa-angle-right"></i></span>
                                        <span class="sidebar-normal"><?php echo trans('lang.applicationmenu'); ?></span>
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
                    <button class="navbar-toggler nav-toggler-mobile" type="button" data-toggle="collapse"
                        data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
                <div class="col-md-6 ">
                    <!--responsive-->
                    <div class="collapse" id="menu">
                        <ul class="nav navmobile">

                            <li class="{{ Request::is('home') ? 'active' : '' }}">
                                <a href="{{ URL::to('home') }}">
                                    <p><?php echo trans('lang.dashboard'); ?>
                                    </p>
                                </a>
                            </li>

                            <li class="{{ Request::is('storagelist') ? 'active' : '' }}">
                                <a href="{{ URL::to('storagelist') }}">
                                    <p><img width="20"
                                            src="<?php echo asset('images/icon-department.png'); ?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.storagemenu'); ?>
                                    </p>
                                </a>
                            </li>

                            <li class="{{ Request::is('reports/allreports') ? 'active' : '' }}">
                                <a href="{{ URL::to('reports/allreports') }}">
                                    <p><img width="25"
                                            src="<?php echo asset('images/icon-report.png'); ?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.reportmenu'); ?>
                                    </p>
                                </a>
                            </li>

                            <li>
                                <a data-toggle="collapse" href="#settingsmob"
                                    class="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? '' : 'collapsed' }}"
                                    aria-expanded="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? 'true' : 'false' }}">
                                    <i class="ti-settings"></i>
                                    <p><?php echo trans('lang.settingmenu'); ?>
                                    </p>
                                </a>
                                <div class="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? 'collapse in' : 'collapse' }}"
                                    id="settingsmob"
                                    aria-expanded="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? 'true' : 'false' }}"
                                    style="{{ Request::is('settings/profile') || Request::is('settings/allusers') || Request::is('settings/application') ? '' : 'height: 0px;' }}">
                                    <ul class="nav">


                                        <li class="{{ Request::is('userlist') ? 'active' : '' }}">
                                            <a href="{{ URL::to('userlist') }}">
                                                <span class="sidebar-mini"><i class="fa fa-angle-right"></i></span>
                                                <span class="sidebar-normal"><?php echo trans('lang.usermenu'); ?></span>
                                            </a>
                                        </li>

                                        <li class="{{ Request::is('settinglist') ? 'active' : '' }}">
                                            <a href="{{ URL::to('settinglist') }}">
                                                <span class="sidebar-mini"><i class="fa fa-angle-right"></i></span>
                                                <span class="sidebar-normal"><?php echo trans('lang.applicationmenu'); ?></span>
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
                            <span class="sidebar-normal"><?php echo trans('lang.welcome'); ?>, {{ Auth::user()->fullname }}
                                &nbsp;&nbsp;&nbsp;</span>

                        </li>
                        <li>
                            <a href="{{ URL::to('logout') }}">
                                <span class="sidebar-mini"><i class="fa fa-sign-out"></i></span>
                                <span class="sidebar-normal"><?php echo trans('lang.logout'); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')
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

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                //get app setting
                $.ajax({
                    type: "GET",
                    url: "{{ url('settings') }}",
                    dataType: "JSON",
                    success: function(response) {
                        $("#id").val('1');
                        $(".company").html(response.data.company);
                        $(".setcurrency").html(response.data.currency);
                        $(".logoimg").attr("src", response.logo);
                    }
                });
                //datepicker
                $('.setdate').datepicker({
                    autoclose: true,
                    dateFormat: "yy-mm-dd",
                    todayHighlight: true
                });

            })(jQuery);

            document.addEventListener('DOMContentLoaded', function() {
                // Check if we are on the category list page
                if (window.location.href.indexOf('categorylist') > -1) {
                    // Show the submenu if on the category page
                    document.getElementById('subcategory-menu').classList.add('show');
                }
            });
        </script>

    </body>

    </html>
