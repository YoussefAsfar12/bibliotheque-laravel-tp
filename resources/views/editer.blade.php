<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Livre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
