@extends('main')
@section('content')
    <section class="">
        <div class="content p-4">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card background-blue color-white">
                        <div class="content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <img width="42" src="<?php echo asset('images/icon-department.png'); ?>" />
                                    </div>
                                </div>
                                <div class="col-xs-7 home-detail">
                                    <div class="numbers">
                                        <p><?php echo trans('lang.totalstorage'); ?></p>
                                        <span class="totalhead totalstorage"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-angle-double-right color-white"></i> <span class="color-white"><a
                                            class="color-white" href="{{ url('storagelist') }}"><?php echo trans('lang.moreinfo'); ?></a>
                                        <span></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        //get total balance
        //generate product code
        $.ajax({
            type: "GET",
            url: "{{ url('home/totalbalance') }}",
            dataType: "JSON",
            success: function(html) {
                $(".totalstorage").html(html.totalstorage);
            }
        });
    </script>
@endsection
