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

                        <li role="presentation" class="active">
                            <a href="#">Accueil</a>
                        </li>

                        <li role="presentation">
                            <a href="#">Inscription</a>
                        </li>

                    </ul>

                </nav>
                <!-- End ... NAV -->

                <!-- LOGO -->
                <h3 class="text-muted" id="logo">
                    <a href="#"><img src="{{ asset( 'img/icon-safe.png' ) }}" alt="Coffre fort">{{ config('app.name', 'Safe Papers') }}</a>
                </h3>
                <!-- End ... LOGO -->

              </div>
            <!-- End ... HEADER -->

            <!-- CONTENT -->
            @yield('content')
            <!-- End ... CONTENT -->

            <!-- FOOTER -->
            <footer class="footer text-right">

                <p>
                    &copy; 2016 6ber6ou.
                </p>

            </footer>
            <!-- End ... FOOTER -->

        </div>
        <!-- End ... CONTAINER -->

        <!-- Scripts -->
        <script src="{{ asset( '/js/app.js' ) }}"></script>

    </body>

</html>
