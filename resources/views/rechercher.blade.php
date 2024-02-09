<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres par Auteur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des Livres par Auteur</h2>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            
        @endif
        @if ($livres->isEmpty())
            <div class="alert alert-warning" role="alert">
                Aucun livre trouvé pour cet auteur.
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Année de Publication</th>
                        <th>Nombre de Pages</th>
                        <th>Auteur</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($livres as $livre)
                    <tr>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->annee_publication }}</td>
                        <td>{{ $livre->nombre_pages }}</td>
                        <td>{{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}</td>
                        <td>
                            <a href="{{ route('livre.editer', $livre->id) }}" class="btn btn-primary">Éditer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $livres->links() }}
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
