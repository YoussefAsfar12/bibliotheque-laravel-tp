@extends('layouts.app')
@section('content')
    

    <div class="container mt-5">
        <h2>Auteurs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nombre de Livres</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($auteurs as $auteur)
                    <tr>
                        <td>{{ $auteur->nom }} {{ $auteur->prenom }}</td>
                        <td>{{ $auteur->livres->count() }}</td>
                        <td>
                            <a href="{{ route('livre.rechercher', $auteur->id) }}" class="btn btn-primary">Voir Livres</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $auteurs->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection