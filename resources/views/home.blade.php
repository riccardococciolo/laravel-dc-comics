@extends('layouts.app')

@section('content')
    <h1>comics</h1>
    <div class="row row-cols-5 g-0">
        @foreach ($comics as $comic)
            <div class="col g-5">
                <div class="card h-100">
                    <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                    <div class="card-body d-flex flex-column justify-content-around">
                      <h5 class="card-title">{{ $comic->title }}</h5>
                      <p class="card-text">{{ $comic->series }}</p>
                      <p class="card-text">${{ $comic->price }}</p>
                      <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">Dettagli</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection