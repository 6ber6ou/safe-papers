@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

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

        <!-- COL LG 6 -->
        <div class="col-lg-6 text-center">

            <h4>
                <img src="{{ asset( 'img/icon-upload.png' ) }}" alt="Upload">
            </h4>

            <p>
                Uploadez de façon sécurisée tous vos documents scannés.
            </p>

            <h4>
                <img src="{{ asset( 'img/icon-search.png' ) }}" alt="Dossier">
            </h4>

            <p>
                Retrouvez facilement vos documents, par nom ou catégorie.
            </p>

        </div>
        <!-- End ... COL LG 6 -->

        <!-- COL LG 6 -->
        <div class="col-lg-6 text-center">

            <h4>
                <img src="{{ asset( 'img/icon-folder.png' ) }}" alt="Dossier">
            </h4>

            <p>
                Créez des catégories, et classez vos documents pour les retrouver plus rapidement.
            </p>


            <h4>
                <img src="{{ asset( 'img/icon-eye.png' ) }}" alt="Upload">
            </h4>

            <p>
                Consultez en ligne, de façon sécurisée, tous vos documents stockés.
            </p>

        </div>
        <!-- End ... COL LG 6 -->

    </div>
    <!-- End ... ROW -->

@stop
