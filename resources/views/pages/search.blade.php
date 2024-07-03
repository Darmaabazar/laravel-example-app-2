@extends('app')

@section('content')
    <div class="container">
        <h1>Search Results for "{{$query}}"</h1>
        <ul>
            @foreach ($results as $result)
                <li>{{$result->title}}</li>
            @endforeach
        </ul>
    </div>
@endsection