<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use App\Message;

class UtilisateursController extends Controller
{


    public function list(){

        $utilisateurs = Utilisateur::all();

        return view('utilisateurs', [
            'utilisateurs' => $utilisateurs,
        ]);
    }

    public function voir(){
        $email = request('email');
        /**Selection moi l'utilisateur que je passe en paramettre*/
        $utilisateur =  Utilisateur::where('email', $email)->firstOrFail();

        /**Je recupere tous les messages qui corresponde à mon id*/
        $messages = $utilisateur->messages;
        return view('utilisateur', [
            'utilisateur' => $utilisateur,
            'messages' => $messages
        ]);

    }
}
