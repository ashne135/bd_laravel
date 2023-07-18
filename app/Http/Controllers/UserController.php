<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048', // règles de validation pour le champ de la photo
            // autres règles de validation pour les champs
        ]);
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public'); // Déplace la photo vers le dossier 'storage/app/public/photos' (assurez-vous que le lien symbolique est configuré correctement)
            $validatedData['photo'] = $photoPath;
        }

        User::create($validatedData);

        return redirect()->route('index')->with('success', 'Utilisateur ajouté avec succès');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            // autres règles de validation pour les champs
        ]);

        $user->update($validatedData);

        return redirect()->route('index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
