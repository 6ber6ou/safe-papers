@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- FLASH MESSAGE -->
    @include('flash::message')
    <!-- End ... FLASH MESSAGE -->

    <!-- JUMBOTRON -->
    <div class="jumbotron">

        <h1>
            Coffre fort à papiers
        </h1>

        <p class="lead">

            Ne perdez plus jamais vos papiers importants !
            <br>
            <br>
            Sauvegardez tous vos papiers de façon sécurisée, classez les et retrouvez les en un clin d'oeil.

        </p>

        <p>

            @if( ! Auth::check() )

                <a class="btn btn-lg btn-success" href="{{ route( 'login' ) }}" role="button">Connectez-vous</a>

            @else

                <a class="btn btn-lg btn-primary" href="{{ route( 'add_new_paper' ) }}" role="button">Ajouter un papier</a>

            @endif

        </p>

    </div>
    <!-- End ... JUMBOTRON -->

    <!-- ROW -->
    <div class="row marketing">

        @if( ! Auth::check() )

            @include( 'partials._description' )

        @else

            @include( 'partials._search' )

            @include( 'partials._last_papers' )

        @endif

    </div>
    <!-- End ... ROW -->

@stop
