@extends('layout')

@section('contenu')

    <div class="section">
        <h1 class="title is-1">Mon compte</h1>
        <p>Vous etes connecté en tant que : {{ auth()->user()->email }} </p>


    </div>

    <form action="/modification-du-mot-de-passe" method="post" class="section">
        {{ csrf_field() }}


      <div class="field">
        <label class="label">Nouveau mot de passe</label>
        <div class="control">
            <input class="input is-primary" type="password" name="password"  placeholder="Password" >
        </div>
        @if($errors->has('password'))
        <p class="help is-danger"> {{$errors->first('password')}}</p>
          @endif
     </div>

     <div class="field">
        <label class="label">Mot de passe (Confirmation)</label>
        <div class="control">
            <input class="input is-primary" type="password" name="password_confirmation"  placeholder="Password_confirmation" >
        </div>
        @if($errors->has('password_confirmation'))
        <p class="help is-danger"> {{$errors->first('password_confirmation')}}</p>
        @endif
        </div>
        <div class="field">
        <div class="control">
            <button class="button is-primary" type="submit">Modifier le mot de passe</button>
            <div>
            </div>

    </form>
@endsection
