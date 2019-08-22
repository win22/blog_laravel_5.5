<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesConroller extends Controller
{
    public function  nouveau()
    {

        request()->validate([
            'message' => ['required'],
        ]);

        auth()->user()->messages()->create([
            'contenu' => request('message') ,
        ]);

        flash("Votre Message a bien été publié")->success();
        return back();
    }
}
