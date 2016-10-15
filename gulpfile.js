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
        'font-awesome.css'

    	], 'public/css/all.css' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    // mix.webpack( 'app.js', 'public/js/app.js' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    mix.scripts(
        [

        'jquery/jquery.js',
        'bootstrap/bootstrap.js',
        'ie10-viewport-bug-workaround/ie10-viewport-bug-workaround.js',
        'fuzzy-autocomplete/fuzzy-autocomplete.js',
        'delete_paper.js',
        'init_fuzzy-autocomplete.js'

        ], 'public/js/all.js' );

	} );



