@extends('model')

@section('title', 'Search Papers')

@section('content')

    <div class="container">
        <div class="row">

            <form method="get">
                Paper Title: <input type="text" name="paper_title">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

<div class="container">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">List of Papers</div>

        <!-- Table -->
        <table class="table">
            <tr>
                <th>Paper Title</th>
                <th>Conference</th>
                <th>Edition</th>
                <th>Host City</th>
                <th>Host Country</th>
                <th>Year</th>
                <th>Authors</th>
            </tr>

            @foreach($papers as $paper)
            <tr>
                <td>{{ $paper->paper_title }}</td>
                <td>{{ $paper->conferences->first()->conference_name }}</td>
                <td>{{ $paper->conferences->first()->edition->first()->edition }}</td>
                <td>{{ $paper->conferences->first()->edition->first()->host_city }}</td>
                <td>{{ $paper->conferences->first()->edition->first()->host_country }}</td>
                <td>{{ $paper->conferences->first()->edition->first()->year }}</td>
                <td><a href="{{ url('/search/paper/' . $paper->id) }}" class="btn btn-default btn-xs"><span class="fa fa-search" aria-hidden="true"/></a></td>
            </tr>
            @endforeach
        </table>
    </div>

</div>

    @endsection