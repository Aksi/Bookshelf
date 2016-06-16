@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1 class="text-uppercase">{{ $author->name }}</h1>
        @if (Auth::user())
            @if ($author->isOwner(Auth::user()) or Auth::user()->isAdmin())
                <a class="btn btn-default" href="{{ url('/authors', [$author->id, 'edit']) }}">Изменить</a>
                {!! Form::model($author, ['method' => 'DELETE', 'action' => ['AuthorsController@destroy', $author->id], 'style' => 'display:inline-block']) !!}
                <button class="btn btn-danger" type="submit">Удалить</button>
            @endif
        @endif
        {!! Form::close() !!}
    </div>
    <ul class="list-group">
        <li class="list-group-item">Родился в {{ $author->born }}</li>
        @if ($author->died > 1)
            <li class="list-group-item">Умер в {{ $author->died }} </li>
        @endif
    </ul>
    <hr>
    <article>
        {{ $author->biography }}
    </article>
    <ul>
    @foreach($author->books as $book)
        <li>$book</li>
    @endforeach
    </ul>
@stop