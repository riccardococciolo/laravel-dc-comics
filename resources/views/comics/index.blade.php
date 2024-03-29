@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Lista dei Comics</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="text-end">
            <a class="btn btn-primary" href="{{ route('comics.create') }}">Aggiungi un Comic</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <th scope="row">{{ $comic->id }}</th>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>${{ $comic->price }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('comics.show', ['comic' => $comic->id]) }}">Dettagli</a>
                            <a class="btn btn-warning" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Modifica</a>
                            <button class="btn btn-danger" onclick="confirmDelete({{ $comic->id }})">Elimina</button>
                            <form id="{{ $comic->id }}" action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" class="d-inline-block" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(comicId) {
            if (confirm("Sei sicuro di voler eliminare questo comic?")) {
                document.getElementById(comicId).submit();
            }
        }
    </script>


@endsection
