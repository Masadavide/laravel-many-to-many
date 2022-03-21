@extends('layouts.app')

@section('title','prodotto')

@section('content')
    <div>
        <ul>
            <li>Titolo: {{$post->title}}</li>
            <li>Contenuto: {{$post->content}}</li>
            <li>Autore: {{$post->author}}</li>
            <li>Slug: {{$post->published}}</li>
            <li>Categoria: {{$post->slug}}</li>
            <li>Tag:
                @foreach ($post->tags as $tag)
                    {{$tag->name ? $tag->name : '-'}}
                @endforeach
            </li>
        </ul>
    </div>
    <button>
        <a href="{{ route('admin.posts.index')}}">
            indietro
        </a>
    </button>
@endsection