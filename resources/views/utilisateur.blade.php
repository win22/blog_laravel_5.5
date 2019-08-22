@extends('layout')

@section('contenu')
        <div class="section">
            <h1 class="title is-1 level">
            <div class="level-left">
                <div class="level-item">
                    {{ $utilisateur->email}}
                </div>
                @if (auth()->check()  AND auth()->user()->id != $utilisateur->id)
                <form class="level-item" method="post" action="/{{ $utilisateur->email }}">
                    {{ csrf_field() }}
                    @if (auth()->user()->suit($utilisateur))
                    {{ method_field('delete') }}
                    @endif
                    <button type="submit" class="button is-link" >
                        @if (auth()->user()->suit($utilisateur))
                        Ne plus suivre
                        @else
                        Suivre
                        @endif
                    </button>
                </form>
                @endif
            </div>

        </div>
            </h1>

        <!--Si la personne est connecté et que la personne qui est connecté
            son id est = $utilisateur->id de l'email qui est passé en paramettre
            alors je suis dans ma propre page
        -->
        @if (auth()->check()  AND auth()->user()->id === $utilisateur->id)
            <form action="/messages" method="post">
                {{ csrf_field() }}
                <div  class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea class="textarea" name="message" placeholder="Qu'avez vous à dire ?"></textarea>
                    </div>
                    @if($errors->has('message'))
                        <p class="help is-danger">
                            {{ $errors->first('message') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link" type="submit">Publier</button>
                    </div>
                </div>
            </form>
        @endif

        @foreach ($messages as $message)
            <hr>
            <p>
                <strong>{{ $message->created_at}}</strong><br>
                {{ $message -> contenu }}
            </p>
        @endforeach
@endsection