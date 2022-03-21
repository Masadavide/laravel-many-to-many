@extends('layouts.app')

@section('title','prodotto')

@section('content')
    <div>
        {{$post->title}}
        {{$post->content}}
        {{$post->author}}
        {{$post->published}}
        {{$post->slug}}
    </div>
    <button>
        <a href="{{ route('admin.posts.index')}}">
            indietro
        </a>
    </button>
@endsection