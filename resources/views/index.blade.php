<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <div class="container mt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Se déconnecter</button>
        </form>

        <div class="alert alert-success">
            @foreach($users as $user)
                {{ $user->name }}
            @endforeach
        </div>

        <h1>Liste des utilisateurs</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->date_naissance }}</td>
                        <td>
                            @if ($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo" class="img-thumbnail" width="100">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('users.create') }}" class="btn btn-success">Ajouter un utilisateur</a>
    </div>
</body>
</html>
