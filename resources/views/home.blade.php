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

                <a class="btn btn-lg btn-success" href="{{ route( 'login' ) }}" role="button"><span class="fa fa-sign-in"></span>&nbsp; Connectez-vous</a>

            @else

                <a class="btn btn-lg btn-primary" href="{{ route( 'add_new_paper' ) }}" role="button"><span class="fa fa-plus">&nbsp; </span>Ajouter un papier</a>
                &nbsp; <a class="btn btn-lg btn-success" href="{{ route( 'show_all_papers' ) }}" role="button"><span class="fa fa-eye">&nbsp; </span>Voir tous les papiers</a>

            @endif

        </p>

    </div>
    <!-- End ... JUMBOTRON -->

    <!-- ROW -->
    <div class="row marketing" style="margin-bottom : -10px;">

        @if( ! Auth::check() )

            @include( 'partials._description' )

        @else

            @include( 'partials._search' )

            @include( 'partials._last_papers' )

        @endif

    </div>
    <!-- End ... ROW -->

@stop

<!-- ============================================================ -->

@section( 'scripts.footer' )

    <script>

        // *******************
        // AUTOCOMPLETE PAPERS
        // *******************

        var paper = papers;

        $( document ).ready( function()
            {

            $( '#search' ).autocomplete(
                {

                source : paper

                } );

            } );

    </script>

@stop
