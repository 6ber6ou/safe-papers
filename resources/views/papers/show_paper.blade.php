@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- FLASH MESSAGE -->
    @include('flash::message')
    <!-- End ... FLASH MESSAGE -->

	<!-- ROW -->
	<div class="row">

        <!-- COL MD 12 -->
		<div class="col-md-12 text-center" id="image_container" style="margin-bottom : 20px;">

            {{ $paper->description }} &nbsp;<span class="label label-info"><a href="{{ route( 'search_by_category', $paper->category->slug ) }}" style="text-decoration : none; color : white;"><span class="fa fa-folder"></span> &nbsp;{{ $paper->category->name }}</span></a>
            <br>
            {{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

            <p style="margin-top : 20px;">
                Naviguer parmis tous vos papiers.
            </p>

            <a type="button" class="btn btn-default" href="{{ route( 'show_paper_prev', $paper->id ) }}"><span class="fa fa-arrow-left"></span></a>
            &nbsp; <a type="button" class="btn btn-default" href="{{ route( 'show_paper_next', $paper->id ) }}"><span class="fa fa-arrow-right"></span></a>

            <div style="margin : 20px auto 0 auto; width : 700px; min-height : 50px; background : url(/img/circle-loader.gif) no-repeat center center;">
               <img src="{{ asset( 'papers/public/' . $paper->path ) }}?{{ uniqid() }}" class="img-responsive pannable-image" alt="Document">
            </div>

		</div>
        <!-- End ... COL MD 12 -->

        <!-- COL MD 12 -->
        <div class="col-md-12 text-center" id="image_container">

            <p>
                Zoomer sur la photo avec le bouton milieu (ou molette) de la souris, et déplacer la photo avec le bouton gauche de la souris.
            </p>

        </div>
        <!-- End ... COL MD 12 -->

        <!-- COL MD 12 -->
        <div class="col-md-12 text-center" style="margin-bottom : 15px;">

            <!-- FORM -->
            <form action="{{ route( 'delete_paper', $paper->id ) }}" method="POST">

                {{ csrf_field() }}

                <a type="button" class="btn btn-default" href="{{ route( 'home' ) }}"><span class="fa fa-home"></span>&nbsp; Accueil</a>
                &nbsp; <a type="button" class="ladda-button btn btn-success" data-style="zoom-in" href="{{ route( 'resize_paper', $paper->id ) }}"><span class="fa fa-crop"></span>&nbsp; Recadrer</a>
                &nbsp; <a type="button" class="ladda-button btn btn-info spinner" data-style="zoom-in" href="{{ route( 'rotate_paper', $paper->id ) }}"><span class="fa fa-rotate-right"></span></a>
                &nbsp; <a href="{{ route( 'update_paper', $paper->id ) }}" class="ladda-button btn btn-primary edit" data-style="zoom-in"><span class="fa fa-pencil"></span>&nbsp; Modifier</a>
                &nbsp; <button type="button" class="btn btn-danger delete"><span class="fa fa-times"></span>&nbsp; Supprimer</button>
                &nbsp; <button type="button" class="btn btn-info delete_no hidden">Non</button>
                &nbsp; <button type="submit" class="btn btn-danger delete_yes hidden spinner" data-style="zoom-in">Oui</button>

            </form>
            <!-- End ... FORM -->

        </div>
        <!-- End ... COL MD 12 -->

	</div>
	<!-- End ... ROW -->

@stop
