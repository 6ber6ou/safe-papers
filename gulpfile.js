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
        'image-viewer/imageviewer.css',
        'jquery-ui/jquery-ui.css'

    	], 'public/css/all.css' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    // mix.webpack( 'app.js', 'public/js/app.js' );

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    mix.scripts(
        [

        'jquery/jquery.js',
        'jquery-ui/jquery-ui.js',
        'bootstrap/bootstrap.js',
        'upload-image/jquery.form.js',
        'upload-image/upload_image.js',
        'ladda-button/spin.min.js',
        'ladda-button/ladda.min.js',
        'init_ladda-button.js',
        'image-viewer/imageviewer.js',
        'init_imageviewer.js',
        'ie10-viewport-bug-workaround/ie10-viewport-bug-workaround.js',
        'delete_paper.js'

        ], 'public/js/all.js' );

	} );



