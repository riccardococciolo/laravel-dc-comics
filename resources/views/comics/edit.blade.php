@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Modifica comic: {{ $comic->title }}</h2>

        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{ $comic->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="thumb" class="form-label">URL dell'immagine</label>
                        <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="series" class="form-label">Serie</label>
                        <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
                    </div>

                    <div class="mb-3">
                        <label for="sale_date" class="form-label">Data di vendita</label>
                        <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <select id="type" class="form-select" name="type">
                            <option value="comic book" @if($comic->type === 'comic book') selected @endif>Comic Book</option>
                            <option value="graphic novel" @if($comic->type === 'graphic novel') selected @endif>Graphic Novel</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Salva</button>

                </form>
            </div>
        </div>
    </div>
@endsection
