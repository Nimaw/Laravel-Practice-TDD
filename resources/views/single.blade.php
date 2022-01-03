@extends('layouts.layout')

@section('content')
    <h1>{{ $post->title }}</h1>


    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->description }}</li>
        @endforeach
    </ul>

@endsection
