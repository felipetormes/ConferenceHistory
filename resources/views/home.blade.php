@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="row">
        <div class="col-sm-4 col-md-3 col-xs-3 col-lg-3 sidebar">
            <div class="mini-submenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div class="list-group">
        <span href="#" class="list-group-item active">
            Choose your options
            <span class="pull-right" id="slide-submenu">
                <i class="fa fa-times"></i>
            </span>
        </span>
                <form action="POST">
                    <p class="list-group-item">
                        <b>Conference</b><br>
                        <input type="checkbox" value="NOMS"> NOMS<br>
                        <input type="checkbox" value="IM">  IM<br>
                    </p>
                    <p class="list-group-item">
                        Conference
                    </p>
                    <p class="list-group-item">
                        Institution
                    </p>
                </form>
            </div>
    </div>

        <div class="col-md-8 col-lg-8 col-xs-8">
            <h1>You are logged in!!</h1>
            <p>Select the data you are looking for.</p>
        </div>

    </div>
@endsection
