// ************
// AUTOCOMPLETE
// ************

$( document ).ready( function()
	{

	$( '#categoryList' ).hide();

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	$( '#category' ).on( 'keyup', function()
		{

		var query = $( this ).val();

		if( query != '' )
			{

			$.ajax(
				{

				url : '/search/autocomplete',
				method : 'POST',
				data : { query : query, _token : $( 'input[ name=_token ]' ).val() },
				success : function( data )
					{

					if( data != '<ul class="list-unstyled"></ul>' )
						{

						$( '#categoryList' ).show();
						$( '#categoryList' ).html( data );

						}
					else
						{

						$( '#categoryList' ).hide();

						}

					},

				} );

			}
		else
			{

			$( '#categoryList' ).hide();

			}

		} );

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	$( '#category' ).on( 'blur',function()
		{

		// $( '#categoryList' ).hide();

		} );

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	$( document ).on( 'click', 'li', function()
		{

		$( '#category' ).val( $( this ).text() );

		$( '#categoryList' ).hide();

		} );

	} );
