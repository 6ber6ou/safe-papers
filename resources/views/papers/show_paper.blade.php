@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- FLASH MESSAGE -->
    @include('flash::message')
    <!-- End ... FLASH MESSAGE -->

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
            &nbsp; <a href="{{ route( 'update_paper', $paper->id ) }}" class="btn btn-primary edit">Modifier</a>
            &nbsp; <button type="button" class="btn btn-danger btn-xs delete"><span class="fa fa-close"></span></button>
            &nbsp; <button type="button" class="btn btn-info btn-xs delete_no hidden">Non</button>
            &nbsp; <button type="button" data-id="{{ $paper->id }}" class="btn btn-danger btn-xs delete_yes hidden">Oui</button>

        </div>
        <!-- End ... COL MD 12 -->

	</div>
	<!-- End ... ROW -->

@stop
