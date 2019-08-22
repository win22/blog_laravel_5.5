<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable  ;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable ;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model implements Authenticatable {
    use BasicAuthenticatable;
    protected $table = "utilisateurs";


    /**cette variable permet de specifier les champs qui seront utilisé*/
    protected $fillable=['email', 'mot_de_passe'];

    public function messages()
    {
        return $this->hasMany(Message::class)->latest();
    }

    public function suivis()
    {
        return $this->belongsToMany(Utilisateur::class,
            'suivis', 'suiveur_id', 'suivis_id');
    }

    public function suit($utilisateur)
    {
       return $this->suivis()->where('suivis_id', $utilisateur->id)->exists();

    }
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }
}
