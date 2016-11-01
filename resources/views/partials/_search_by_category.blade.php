<h3>
	Recherche par catégorie
</h3>

<h4>

	@if( count( $categories ) > 0 )

		@foreach( $categories as $category )

			@if( App\Paper::where( 'user_id', Auth::user()->id )->where( 'category_id', $category->id )->first() )

				&nbsp;<a href="{{ route( 'search_by_category', str_slug( $category->name ) ) }}" style="text-decoration : none;"><span class="label {{ $category->slug == $name ? 'label-primary' : 'label-info' }}"><span class="fa {{ $category->slug == $name ? 'fa-folder-o' : 'fa-folder' }}"></span> &nbsp;{{ $category->name }}</span></a>&nbsp;

			@endif

		@endforeach

	@else

		<p class="text-center" style="font-size: 0.75em;">
			Pas de document&nbsp; <span class="fa fa-exclamation"></span>
		</p>

	@endif

</h4>
