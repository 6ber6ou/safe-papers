// ************
// UPLOAD IMAGE
// ************

$( document ).ready( function()
	{

	$( '.progress' ).hide();

	// ------------------------------------------------------------

	$( '#new_paper' ).ajaxForm(
		{

		beforeSend : function()
			{

			$( '.progress' ).show();

			},
		uploadProgress : function( event, position, total, percentComplete )
			{

			$( '.progress-bar' ).width( percentComplete + '%' );

			$( '.progress-bar-sr-only' ).html( percentComplete + '%' );

			},
		success : function( data )
			{

			window.location.href= '/afficher/papier/' + data;

			},
		complete : function( response )
			{
			}

		} );

	} );
