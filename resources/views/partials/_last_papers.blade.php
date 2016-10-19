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
				<br>
				<a href="{{ route( 'search_by_category', str_slug( $paper->category->name ) ) }}" style="text-decoration : none;"><span class="label label-info"><span class="fa fa-folder"></span> &nbsp;{{ $paper->category->name }}</span></a>
				<br>
				{{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

			</p>
			<!-- End ... PARAGARPH -->

		@endforeach

	</div>
	<!-- End ... COL MD 6 -->

	<!-- COL MD 6 -->
	<div class="col-md-6 text-center" style="margin-top : 30px;">

		@include( 'partials._search_by_category' )

	</div>
	<!-- End ... COL MD 6 -->

</div>
<!-- End ... ROW -->
