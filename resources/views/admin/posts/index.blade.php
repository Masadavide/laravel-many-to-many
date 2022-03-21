@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <button type="submit" class="btn btn-primary">
        <a style="color:white" href="{{ route('admin.posts.create')}}">
            Crea il tuo post
        </a>
    </button>
    @foreach ($posts as $element)
        <ul>
            <li>Titolo: {{$element->title}}</li>
            <li>Contenuto: {{$element->content}}</li>
            <li>Autore: {{$element->author}}</li>
            <li>Slug: {{$element->slug}}</li>
            <li>Categoria: {{$element->category? $element->category->name: '-'}}</li>
            <li>Tag:
                @foreach ($element->tags as $tag)
                    {{$tag->name ? $tag->name : '-'}}
                @endforeach
            </li>
        </ul>
        <button>
            <a href="{{ route('admin.posts.show', $element->id)}}">
                Visualizza prodotto {{$element->title}}
            </a>
        </button>
        <button>
            <a href="{{ route('admin.posts.edit', $element->id)}}">
                Modifica
            </a>
        </button>
        <form method="post" action="{{route('admin.posts.destroy', $element->id)}}">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    @endforeach
@endsection


