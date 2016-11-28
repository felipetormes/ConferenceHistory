@extends('model')

@section('title', 'Search')

@section('content')

    <div class="container">
        <div class="row">

            <form method="get">
                First name: <input type="text" name="fname">
                <input type="submit" value="Submit">
    </form>
            </div>

    @foreach($authors as $author)
        {{$author->first_name}}
    @endforeach

@endsection