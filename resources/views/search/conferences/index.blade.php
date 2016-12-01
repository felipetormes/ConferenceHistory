@extends('model')

@section('title', 'Conferences')

@section('content')
    <div class="container">
        <div class="row">

            <form method="get">
                First name: <input type="text" name="conference_name">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">List of Conferences</div>

            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Conference Name</th>
                    <th>Editions</th>
                </tr>

                @foreach($conferences as $conference)
                    <tr>
                        <td>{{ $conference->conference_name }}</td>
                        <td><a href="{{ url('/search/conference/' . $conference->id) }}" class="btn btn-default btn-xs"><span class="fa fa-search" aria-hidden="true"/></a></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@stop