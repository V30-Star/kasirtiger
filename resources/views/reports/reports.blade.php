@extends('main')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-11">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><?php echo trans('lang.all_reports'); ?></h4>
                            <hr>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-6" style="border-right: 1px solid #f0f0f0;">
                                    @if (Auth::check())
                                        <p class="text-primary"><i class="ti-angle-right"></i><a
                                                href="{{ URL::to('reports/componentactivity') }}"><?php echo trans('lang.componentactivity'); ?></a>
                                        </p>
                                        <hr>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <style>
            .disabled-link {
                pointer-events: none;
                color: grey;
                /* Change the color to indicate that the link is disabled */
                text-decoration: none;
                /* Remove underline */
            }
        </style>
@endsection
