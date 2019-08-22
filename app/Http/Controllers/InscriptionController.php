<?php

namespace App\Http\Controllers;


use App\Utilisateur;

class InscriptionController extends Controller
{
    public function formulaire()
    {
        return view('inscription');
    }


    //Pour envoyer les données à la base de données
    public function inscription()
    {
        request() -> validate([
            'email' => ['required', 'email', 'unique:utilisateurs,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ],
            [
                'password.min' => 'Pour des raisons de securité votre mot de passe doit faire au moins :min caracteres'
            ]
        );
        $utilisateur =  Utilisateur::create([
            'email' => request('email'),
            'mot_de_passe' => bcrypt(request('password')),
        ]);
        return 'Nous avons reçu votre email qui est:'.request('email');
    }
}
