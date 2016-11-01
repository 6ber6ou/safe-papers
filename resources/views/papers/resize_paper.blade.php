@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- FLASH MESSAGE -->
    @include('flash::message')
    <!-- End ... FLASH MESSAGE -->

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 8 -->
        <div class="col-md-8 col-md-offset-2">

            <h3>
                Recadrer le papier
            </h3>

        </div>
        <!-- End ... COL MD 8 -->

    </div>
    <!-- End ... ROW -->

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 12 -->
        <div class="col-md-12 text-center" id="image_container" style="margin-bottom : 20px;">

            {{ $paper->description }} &nbsp;<span class="label label-info"><a href="{{ route( 'search_by_category', $paper->category->slug ) }}" style="text-decoration : none; color : white;"><span class="fa fa-folder"></span> &nbsp;{{ $paper->category->name }}</span></a>

            <div style="margin : 20px auto 0 auto !important; text-align : center; width : 700px; min-height : 50px; background : url(/img/circle-loader.gif) no-repeat center center;">
                <img src="https://s3-us-west-2.amazonaws.com/images.6ber6ou.com/{{ $paper->path }}?{{ round( 1, 99999 ) }}" style="margin : 0 auto;" class="img-responsive resize_jcrop" alt="Document">
            </div>

        </div>
        <!-- End ... COL MD 12 -->

        <!-- COL MD 12 -->
        <div class="col-md-12 text-center" id="image_container">

            <p>
                Sélectionnez une zone de l'image à recadrer.
            </p>

        </div>
        <!-- End ... COL MD 12 -->

        <!-- COL MD 12 -->
        <div class="col-md-12 text-center" style="margin-bottom : 30px;">

            <!-- FORM -->
            <form action="{{ route( 'post_resize_paper', $paper->id ) }}" method="POST">

                {{ csrf_field() }}

                <input type="hidden" name="cx" id="cx" value="">
                <input type="hidden" name="cy" id="cy" value="">
                <input type="hidden" name="cw" id="cw" value="">
                <input type="hidden" name="ch" id="ch" value="">
                <input type="hidden" name="fact" id="fact" value="{{ $width_img > 700 ? $width_img / 700 : 1 }}">

                <a type="button" class="btn btn-default" href="{{ route( 'home' ) }}">Accueil</a>
                &nbsp; <button type="submit" class="ladda-button btn btn-primary spinner edit" data-style="zoom-in">
                            Valider
                        </button>

            </form>
            <!-- End ... FORM -->

        </div>
        <!-- End ... COL MD 12 -->

    </div>
    <!-- End ... ROW -->


@stop

<!-- ============================================================ -->

@section( 'scripts.footer' )

    <script>

        $( function()
            {

            $( '.resize_jcrop' ).Jcrop(
                {

                onSelect : function( c )
                    {

                    var fact = $( '#fact' ).val();

                    $( '#cx' ).val( Math.ceil( c.x * fact ) );
                    $( '#cy' ).val( Math.ceil( c.y * fact ) );
                    $( '#cw' ).val( Math.ceil( c.w * fact ) );
                    $( '#ch' ).val( Math.ceil( c.h * fact ) );

                    }

                } );

            } );

    </script>

@stop
