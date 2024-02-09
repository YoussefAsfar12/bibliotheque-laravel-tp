

@extends('layouts.app')
@section('content')
    

    <div class="container mt-5">
        <h2>Editer Livre</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!$livre)
            <div class="alert alert-warning" role="alert">
                Aucun livre sélectionné.
            </div>
        @else

        <form method="POST" action="{{ route('livre.modifier', $livre->id) }}">
            @csrf
            <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $livre->titre) }}">
                @error('titre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="annee_publication">Année de Publication:</label>
                <input type="number" class="form-control" id="annee_publication" name="annee_publication" value="{{ old('annee_publication', $livre->annee_publication) }}">
                @error('annee_publication')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nombre_pages">Nombre de Pages:</label>
                <input type="number" class="form-control" id="nombre_pages" name="nombre_pages" value="{{ old('nombre_pages', $livre->nombre_pages) }}">
                @error('nombre_pages')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endif

@endsection