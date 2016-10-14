<!-- ROW -->
<div class="row">

	<!-- COL MD 6 -->
	<div class="col-md-6 text-center" style="margin-top : 30px;">

		<h3>
			Derniers papiers uploadés
		</h3>

		@foreach( $latest_papers as $paper )

			<p id="paragraph_{{ $paper->id }}">

				<a href="#">{{ $paper->description }}</a>
				{{-- <img src="https://s3-us-west-2.amazonaws.com/images.6ber6ou.com/{{ $paper->path }}" alt="Document"> --}}
				<br>
				&nbsp; <button type="button" class="btn btn-primary btn-xs edit"><span class="fa fa-pencil"></span></button>
				&nbsp; <button type="button" class="btn btn-danger btn-xs delete"><span class="fa fa-close"></span></button>
				&nbsp; <button type="button" class="btn btn-info btn-xs delete_no hidden">Non</button>
				&nbsp; <button type="button" data-id="{{ $paper->id }}" class="btn btn-danger btn-xs delete_yes hidden">Oui</button>
				<br>
				{{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

			</p>

		@endforeach

	</div>
	<!-- End ... COL MD 6 -->

	<!-- COL MD 6 -->
	<div class="col-md-6 text-center" style="margin-top : 30px;">

		<h3>
			Derniers papiers consultés
		</h3>

	</div>
	<!-- End ... COL MD 6 -->

</div>
<!-- End ... ROW -->
