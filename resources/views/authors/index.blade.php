<h1>Authors</h1>

<ul>
    @foreach($authors as $author)
        <li>{{ $author->first_name }}</li>
    @endforeach
</ul>