
<form action="{{ route('register') }}" method="post">
    @csrf
    <input type="text" name='name' placeholder="entre votre nom"><br> <br>
    <input type="number" name='age' placeholder="entre votre age"><br><br>
    <input type="email" name='email' placeholder="entre votre email"><br><br>
    <input type="password" name='password' placeholder="entre votre mots de passe">
    <input type="submit" value="enregistrer">
</form>

@foreach($users as $user)
   {{ $user->name}}
@endforeach 