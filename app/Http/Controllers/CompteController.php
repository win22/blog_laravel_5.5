<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function acceuil()
    {
        return view('mon-compte');
    }

    public function deconnexion()
    {
        auth()->logout();
        return redirect('/');
    }



    public function ModificationPassword(){


        request() -> validate([
           'password' => [' required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);
        /**
        $utilisateur = auth()->user();
        $utilisateur->mot_de_passe = bcrypt(request('password'));
        $utilisateur-> save();
         * */

        auth()->user()->update([
           'mot_de_passe' => bcrypt(request('password')),
        ]);

        flash('Votre mot de passe a bien été mise à jour')->success();
        return redirect('/mon-compte');
    }



}
