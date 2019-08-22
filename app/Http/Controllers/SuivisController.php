<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Http\Request;

class SuivisController extends Controller
{
    public function nouveau()
    {
        $utilisateurQuiVaSuivre = auth()->user();
        $utilisateurQuiVaEtreSuivis = Utilisateur::where('email', request('email'))->firstOrFail();

        $utilisateurQuiVaSuivre->suivis()->attach($utilisateurQuiVaEtreSuivis);

        flash("Vous suiviez maintenant {$utilisateurQuiVaEtreSuivis->email}.")->success();
        return back();
    }

    public function retirer()
    {
        $utilisateurQuiSuit = auth()->user();
        $utilisateurQuiVaEstSuivis = Utilisateur::where('email', request('email'))->firstOrFail();

        $utilisateurQuiSuit->suivis()->detach($utilisateurQuiVaEstSuivis);

        flash("Vous ne suiviez plus {$utilisateurQuiVaEstSuivis->email}.")->success();
        return back();
    }
}
