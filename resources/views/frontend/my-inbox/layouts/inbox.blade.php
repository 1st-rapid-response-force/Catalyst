@extends('frontend.layouts.master')

@yield('css-top')

@section('css-top')
    @yield('css-top-mail')
@endsection

@section('content')
    <? $user = \Auth::user()?>
    <div class="container">
        @if (Session::has('error_message'))
            <div class="alert alert-danger" role="alert">
                {!! Session::get('error_message') !!}
            </div>
            @endif
                    <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        My Inbox
                    </h1>
                    @yield('breadcrumbs')
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                        @yield('sidebar-mail')
                        @include('frontend.my-inbox.includes.sidebar')
                        </div><!-- /.col -->
                        <div class="col-md-9">
                            <div class="box box-primary">
                                @yield('content-mail')
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                            </div>
                        </div><!-- /. box -->
                    </div><!-- /.col -->
            </div><!-- /.row -->
            </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    </div>
@endsection

@section('js-bottom')
    @yield('js-bottom-mail')
@endsection
