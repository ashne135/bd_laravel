<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Modifier un utilisateur</title>
</head>
<body>
    <div class="container mt-4">
        <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{ $user->nom }}" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="{{ $user->prenom }}" required>
            </div>
            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance :</label>
                <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="{{ $user->date_naissance }}" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo :</label>
                <input type="file" class="form-control" name="photo" id="photo">
            </div>
            <!-- autres champs du formulaire -->
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>
