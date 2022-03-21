@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <form action="{{route("admin.posts.update", $post->id)}}" method="POST">
    @csrf

    @method('PUT')

        <ul>
            <li>
                <div class="form-group">
                    <label for="title">Titolo blog</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo del tuo post" value="{{$post->title}}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <input type="content" class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" placeholder="Inserisci il contenuto" value="{{$post->content}}">
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label for="author">Autore del blog</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Autore" value="{{$post->author}}">
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option value="">Seleziona una categoria</option>
                        @foreach($categories as $element)
                            <option value="{{$element->id}}">{{$element->name}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </li>
            <li>
                <div class="form-check">
                    Allergeni:
                    <br>
                    @foreach($tags as $element)
                        <input class="form-check-input" type="checkbox" id="{{$element->slug}}" value="{{$element->id}}" name="tags[]" {{$post->tags->contains($element) ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{$element->slug}}">
                            {{$element->name}}
                        </label>
                        <br>
                        @error('tag_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endforeach
                </div>
            </li>
            <button type="submit" class="btn btn-primary">Crea</button>
        </ul>
    </form> 

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection