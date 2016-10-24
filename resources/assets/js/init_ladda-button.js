// *****************
// INIT LADDA BUTTON
// *****************

$( document ).ready( function()
	{

	Ladda.bind( '.spinner',
		{

		callback : function ( instance )
			{

			$( 'button, a' ).not( '.spinner' ).attr( 'disabled', 'disabled' );

			$( 'button, a' ).not( '.spinner' ).on( 'click', function( e )
				{

				e.preventDefault();

				} );

			}

		} );

	} );
