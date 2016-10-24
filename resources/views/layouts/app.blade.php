<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="icon" href="{{ asset( 'favicon.ico' ) }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            {{ config('app.name', 'Safe Papers') }}
        </title>

        <!-- Styles -->
        <link href="{{ asset( '/css/all.css' ) }}" rel="stylesheet">

        <!-- Scripts -->
        <script>

            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

        </script>

    </head>

    <body>

        <!-- CONTAINER -->
        <div class="container">

            <!-- HEADER -->
              <div class="header clearfix">

                <!-- NAV -->
                <nav>

                    <ul class="nav nav-pills pull-right">

                        @if( ! Auth::check() )

                            <li role="presentation" class="{{ $page == 'home' ? 'active' : '' }}">
                                <a href="{{ route( 'home' ) }}">Accueil</a>
                            </li>

                            <li role="presentation" class="{{ $page == 'register' ? 'active' : '' }}">
                                <a href="{{ route( 'register' ) }}">Inscription</a>
                            </li>

                        @else

                            <li role="presentation" class="{{ $page == 'add_paper' ? 'active' : '' }}">
                                <a href="{{ route( 'add_new_paper' ) }}">Ajouter</a>
                            </li>

                            <li role="presentation">
                                <a href="{{ route( 'logout' ) }}">Déconnexion</a>
                            </li>

                        @endif

                    </ul>

                </nav>
                <!-- End ... NAV -->

                <!-- LOGO -->
                <h3 class="text-muted" id="logo">
                    <a href="{{ route( 'home' ) }}"><img src="{{ asset( 'img/icon-safe.png' ) }}" alt="Coffre fort">{{ config('app.name', 'Safe Papers') }}</a>
                </h3>
                <!-- End ... LOGO -->

              </div>
            <!-- End ... HEADER -->

            <!-- CONTENT -->
            @yield( 'content' )
            <!-- End ... CONTENT -->

            <!-- FOOTER -->
            <footer class="footer text-right">

                <p>
                    Copyright 2016 - {{ date( 'Y' ) }} &copy; 6ber6ou.
                </p>

            </footer>
            <!-- End ... FOOTER -->

        </div>
        <!-- End ... CONTAINER -->

        <!-- Scripts -->
        <script src="{{ asset( '/js/all.js' ) }}"></script>

        @include( 'layouts.footer' )

        @yield( 'scripts.footer' )

    </body>

</html>
