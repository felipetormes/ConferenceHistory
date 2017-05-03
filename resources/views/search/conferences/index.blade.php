@extends('layouts.app')

@section('title', 'Search Conferences')

@section('content')

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <div class="container">

        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>Paper Title</th>
                <th>Conference Edition</th>
            </tr>
            </thead>
            <tbody>
            @foreach($papers as $paper)
                <tr>
                    <td>{{ $paper->paper_title }}</td>
                    <td>{{ \App\Edition::find($paper->edition_id)->edition_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop