<!-- ROW -->
<div class="row">

	<!-- COL MD 6 -->
	<div class="col-md-6" style="margin-top : 30px;">

		<h3 class="text-center">
			Derniers papiers uploadés
		</h3>

		@foreach( $latest_papers as $paper )

			<!-- PARAGARPH -->
			<p id="paragraph_{{ $paper->id }}">

				<a href="{{ route( 'show_paper', $paper->id ) }}">{{ $paper->description }}</a>
				&nbsp; <span class="label label-info">{{ $paper->category->name }}</span>
				<br>
				{{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

			</p>
			<!-- End ... PARAGARPH -->

		@endforeach

	</div>
	<!-- End ... COL MD 6 -->

	<!-- COL MD 6 -->
	<div class="col-md-6 text-center" style="margin-top : 30px;">

		<h3>
			Recherche par catégorie
		</h3>

		<h4 style="line-height: 30px;">

			@foreach( $categories as $category )

				<a href="{{ route( 'search_by_category', str_slug( $category->name ) ) }}" style="text-decoration : none;"><span class="label label-info">{{ $category->name }} &nbsp;</span></a>

			@endforeach

		</h4>

	</div>
	<!-- End ... COL MD 6 -->

</div>
<!-- End ... ROW -->
