@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

	<!-- ROW -->
	<div class="row">

        <!-- COL MD 12 -->
		<div class="col-md-12 text-center" style="margin-bottom : 30px;">

            {{ $paper->description }} &nbsp;<span class="label label-info">{{ $paper->category->name }}</span>
            <br>
            <br>
            <img src="https://s3-us-west-2.amazonaws.com/images.6ber6ou.com/{{ $paper->path }}" class="img-responsive" alt="Document">

		</div>
        <!-- End ... COL MD 12 -->

        <!-- COL MD 12 -->
        <div class="col-md-12 text-center" style="margin-bottom : 30px;">
            <a type="button" class="btn btn-default" href="{{ route( 'home' ) }}">Retour</a>
        </div>
        <!-- End ... COL MD 12 -->

	</div>
	<!-- End ... ROW -->

@stop
