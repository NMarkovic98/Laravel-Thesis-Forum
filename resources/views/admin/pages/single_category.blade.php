@extends('layouts.dashboard')

@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> Forum Categories</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                        <li><i class="fa fa-users"></i>Categories</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><i class="fa fa-flag-o red"></i><strong>Forum categories</strong></h2>
                            <div class="panel-actions">
                                <a href="/dashboard/home" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                                <a href="/dashboard/home" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                                <a href="/dashboard/home" class="btn-close"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8 offset-2 ">
                                    <!-- Card -->
                                    <div class="card">
                                        <!-- Card image -->
                                        <img class="card-img-left" src="{{asset('storage/images/categories/'.$category->image)}}" width="100" height="100" alt="Card image cap">
                                        <!-- Card content -->
                                        <div class="card-body">
                                        <!-- Title -->
                                        <h4 class="card-title"><a>{{$category->title}}</a></h4>
                                        <!-- Text -->
                                        <p class="card-text">{!!$category->desc!!}</p>
                                        <!-- Button -->
                                        {{-- <a href="#" class="btn btn-primary">Button</a> --}}
                                        </div>
                                    </div>
                                    <!-- Card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/col-->
        </section>
    </section>
    <!--main content end-->
@endsection