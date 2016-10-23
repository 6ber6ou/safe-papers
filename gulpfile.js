const elixir = require( 'laravel-elixir' );
require( 'laravel-elixir-vue' );

// ------------------------------------------------------------

elixir( mix =>
	{

    mix.sass( 'app.scss' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    mix.styles(
    	[

    	'./public/css/app.css',
        './public/css/style.css',
        'font-awesome.css',
        'ladda-button/ladda-themeless.min.css',
        'image-viewer/imageviewer.css'

    	], 'public/css/all.css' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    // mix.webpack( 'app.js', 'public/js/app.js' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    mix.scripts(
        [

        'jquery/jquery.js',
        'bootstrap/bootstrap.js',
        'ladda-button/spin.min.js',
        'ladda-button/ladda.min.js',
        'init_ladda-button.js',
        'image-viewer/imageviewer.js',
        'init_imageviewer.js',
        'ie10-viewport-bug-workaround/ie10-viewport-bug-workaround.js',
        'fuzzy-autocomplete/fuzzy-autocomplete.js',
        'delete_paper.js',
        'init_fuzzy-autocomplete.js'

        ], 'public/js/all.js' );

	} );



