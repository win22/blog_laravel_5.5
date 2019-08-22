<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.css">
    
</head>
<body>
    <nav class="navbar is-dark">
        <div class="navbar-menu">
            <div class="navbar-start">
                @auth

                @include('partials.navbar-item', ['lien' => '/', 'texte' => 'Acceuil'])
                @include('partials.navbar-item', ['lien' => auth()->user()->email, 'texte' => auth()->user()->email])

                @endauth

            </div>
            <div class="navbar-end">
                @auth

                @include('partials.navbar-item', ['lien' => 'mon-compte', 'texte' => 'Profile'])
                @include('partials.navbar-item', ['lien' => 'deconnexion', 'texte' => 'Déconnexion'])

                @else

                @include('partials.navbar-item', ['lien' => 'connexion', 'texte' => 'Se connecter'])
                @include('partials.navbar-item', ['lien' => 'inscription', 'texte' => "S'inscrire"])
                @endauth

            </div>
        </div>
    </nav>

    <div class="container">
        @include('flash::message')
        @yield('contenu')

</div>
</body>
</html>
