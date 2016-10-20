@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- FLASH MESSAGE -->
    @include('flash::message')
    <!-- End ... FLASH MESSAGE -->

	<!-- ROW -->
	<div class="row">

        <!-- COL MD 12 -->
		<div class="col-md-12 text-center" id="image_container" style="margin-bottom : 30px;">

            {{ $paper->description }} &nbsp;<span class="label label-info"><a href="{{ route( 'search_by_category', $paper->category->slug ) }}" style="text-decoration : none; color : white;"><span class="fa fa-folder"></span> &nbsp;{{ $paper->category->name }}</span></a>

            <div style="margin : 20px auto 0 auto; width : 500px; min-height : 200px; background : url(/img/circle-loader.gif) no-repeat center center;">
                <img src="https://s3-us-west-2.amazonaws.com/images.6ber6ou.com/{{ $paper->path }}" class="img-responsive" alt="Document">
            </div>

		</div>
        <!-- End ... COL MD 12 -->

        <!-- COL MD 12 -->
        <div class="col-md-12 text-center" style="margin-bottom : 30px;">

            <!-- FORM -->
            <form action="{{ route( 'delete_paper', $paper->id ) }}" method="POST">

                {{ csrf_field() }}

                <a type="button" class="btn btn-default" href="{{ URL::previous() }}">Retour</a>
                &nbsp; <a href="{{ route( 'update_paper', $paper->id ) }}" class="btn btn-primary edit">Modifier</a>
                &nbsp; <button type="button" class="btn btn-danger delete">Supprimer</button>
                &nbsp; <button type="button" class="btn btn-info delete_no hidden">Non</button>
                &nbsp; <button type="submit" class="btn btn-danger delete_yes hidden">Oui</button>

            </form>
            <!-- End ... FORM -->

        </div>
        <!-- End ... COL MD 12 -->

	</div>
	<!-- End ... ROW -->

@stop
