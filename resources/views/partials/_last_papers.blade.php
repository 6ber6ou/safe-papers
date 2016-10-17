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
				&nbsp; <a href="{{ route( 'update_paper', $paper->id ) }}" class="btn btn-primary btn-xs edit"><span class="fa fa-pencil"></span></a>
				&nbsp; <button type="button" class="btn btn-danger btn-xs delete"><span class="fa fa-close"></span></button>
				&nbsp; <button type="button" class="btn btn-info btn-xs delete_no hidden">Non</button>
				&nbsp; <button type="button" data-id="{{ $paper->id }}" class="btn btn-danger btn-xs delete_yes hidden">Oui</button>
				<br>
				{{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

			</p>
			<!-- End ... PARAGARPH -->

		@endforeach

	</div>
	<!-- End ... COL MD 6 -->

	<!-- COL MD 6 -->
	<div class="col-md-6" style="margin-top : 30px;">

		<h3 class="text-center">
			Derniers papiers consultés
		</h3>

	</div>
	<!-- End ... COL MD 6 -->

</div>
<!-- End ... ROW -->
