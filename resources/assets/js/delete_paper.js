/* ************ */
/* DELETE PAPER */
/* ************ */

$( document ).ready( function()
	{

	$( '.delete' ).on( 'click', function()
		{

		$( this ).next().removeClass( 'hidden' );
		$( this ).next().next().removeClass( 'hidden' );

		$( this ).hide();

		} );

	// ------------------------------------------------------------

	$( '.delete_no' ).on( 'click', function()
		{

		$( this ).addClass( 'hidden' );
		$( this ).next().addClass( 'hidden' );

		$( this ).prev().show();

		} );

	// ------------------------------------------------------------

	$( '.delete_yes' ).on( 'click', function()
		{

		$.ajax(
			{

			url : '/effacer/papier',
			type : 'get',
			data : { id : $( this ).data( 'id' ) },
			success : function( data )
				{

				$( '#paragraph_' + data ).hide();

				}

			} );

		} );

	} );
