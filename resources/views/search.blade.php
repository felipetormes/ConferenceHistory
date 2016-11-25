@extends('model')

@section('title', 'Search')

@section('content')

    <form   method="get">
        First name: <input type="text" name="fname"><br>
        <input type="submit" value="Submit">
    </form>

    {{$author}}

@endsection