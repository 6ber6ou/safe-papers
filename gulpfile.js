const elixir = require( 'laravel-elixir' );
require( 'laravel-elixir-vue' );

// ------------------------------------------------------------

elixir( mix =>
	{

    mix.sass( 'app.scss' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    mix.webpack( 'app.js' );

	} );
