@extends('model')

        @section('title', 'Authors')

        @section('content')

                <div class="container">
                        <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">List of authors</div>

                                <!-- Table -->
                                <table class="table">
                                        <tr>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Author Country</th>
                                                <th>Papers</th>
                                        </tr>

                                        @foreach($authors as $author)
                                                <tr>
                                                        <td>{{ $author->first_name }}</td>
                                                        <td>{{ $author->middle_name }}</td>
                                                        <td>{{ $author->last_name }}</td>
                                                        <td>{{ $author->author_country }}</td>
                                                        <td><a href="{{ url('/authors/' . $author->id) }}" class="btn btn-default btn-xs"><span class="fa fa-search" aria-hidden="true"/></a></td>
                                                </tr>
                                        @endforeach
                                </table>
                        </div>

                </div>
        @endsection