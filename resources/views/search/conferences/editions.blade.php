@extends('model')

@section('title', 'Conference Editions')

@section('content')
    <div class="container">
        <div class="row">

            <form method="get">
                Conference Name: <input type="text" name="conference_name">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">List of Editions</div>

            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Conference Name</th>
                    <th>Edition Number</th>
                    <th>Host City</th>
                    <th>Host Country</th>
                    <th>Edition Year</th>
                    <th>Papers</th>
                </tr>

                @foreach($editions as $edition)
                    <tr>
                        <td>{{ $edition->conference->conference_name }}</td>
                        <td>{{ $edition->edition }}</td>
                        <td>{{ $edition->host_city }}</td>
                        <td>{{ $edition->host_country }}</td>
                        <td>{{ $edition->year }}</td>
                        <td><a href="{{ url('/search/conference/edition/' . $edition->id) }}" class="btn btn-default btn-xs"><span class="fa fa-search" aria-hidden="true"/></a></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@stop