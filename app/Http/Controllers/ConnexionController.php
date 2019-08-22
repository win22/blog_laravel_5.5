<?php

namespace App\Http\Controllers;


use Illuminate\View\View;

class ConnexionController extends Controller
{
    public function formulaire(){
        return View('connexion');
    }

    public function Connexion(){
        request()-> validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
       $resulta = auth()->attempt([
           'email'=> request('email'),
           'password' => request('password')
        ]);

       if($resulta){
           flash('Vous vous etes connecté avec succés')->success();
           return redirect('/');
       }
        return back()->withInput()->withErrors([
            'email' => 'Vos  identifiants sont incorrects',

        ]);
    }


}
