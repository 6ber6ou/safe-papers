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
        './public/css/style.css'

    	], 'public/css/all.css' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    mix.webpack(
    		[

    		'app.js',
    		'ie10-viewport-bug-workaround/ie10-viewport-bug-workaround.js'

    		] );

	} );
