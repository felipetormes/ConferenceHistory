@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Conferences<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    @foreach($conferences as $conference)
                                        <li>
                                            <a href="conference/{{ $conference->id }}">{{ $conference->conference_title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
            </div>

            <div class="col-md-9 list">


                    <div class="container">
                        <h2>You are logged in, {{ Auth::user()->name }}!</h2>
                        <p>First, choose one or more conferences so that the data can be displayed.</p>
                    </div>


            </div>

    </div>

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/metisMenu.min.js" type="text/javascript"></script>
    <script src="js/sb-admin-2.min.js" type="text/javascript"></script>



@endsection
