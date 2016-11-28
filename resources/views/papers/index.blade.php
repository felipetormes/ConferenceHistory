@extends('model')

@section('title', 'papers')

@section('content')

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
            </tr>

            <tr>
                <td>{{ $author->papers->first()->paper_title }}</td>
                <td>{{ $author->papers->first()->conferences->first()->conference_name }}</td>
                <td>{{ $author->papers->first()->conferences->first()->edition->first()->year }}</td>
            </tr>
        </table>
    </div>

</div>

    @endsection