@extends('model')

@section('title', 'Search Institutions')

@section('content')
    <div class="container">
        <div class="row">

            <form method="get">
                Institution Name: <input type="text" name="institution_name">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">List of Institutions</div>

            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Institution Name</th>
                    <th>Institution Country</th>
                    <th>Authors</th>
                    <th>Papers</th>
                </tr>

                @foreach($institutions as $institution)
                    <tr>
                        <td>{{ $institution->institution_name }}</td>
                        <td>{{ $institution->institution_country }}</td>
                        <td><a href="{{ url('/search/institution/authors/' . $institution->id) }}" class="btn btn-default btn-xs"><span class="fa fa-search" aria-hidden="true"/></a></td>
                        <td><a href="{{ url('/search/institution/papers/' . $institution->id) }}" class="btn btn-default btn-xs"><span class="fa fa-search" aria-hidden="true"/></a></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@stop