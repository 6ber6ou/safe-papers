@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 6 -->
        <div class="col-md-6">

            <h3 class="text-center">
                Tous les papiers
            </h3>

            @if( count( $papers ) > 0 )

            @foreach( $papers as $paper )

                <!-- PARAGARPH -->
                <p id="paragraph_{{ $paper->id }}">

                    <a href="{{ route( 'show_paper', $paper->id ) }}" data-tooltip title="<img src='https://s3-us-west-2.amazonaws.com/images.6ber6ou.com/{{ str_replace( 'safe-papers', 'safe-papers/thumbs', $paper->path ) }}?{{ rand() }}' alt=''>" alt="">{{ $paper->description }}</a>
                    <br>
                    <a href="{{ route( 'search_by_category', str_slug( $paper->category->name ) ) }}" style="text-decoration : none;"><span class="label label-info"><span class="fa fa-folder"></span> &nbsp;{{ $paper->category->name }}</span></a>
                    <br>
                    {{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

                </p>
                <!-- End ... PARAGARPH -->

            @endforeach

            {{ $papers->links() }}

            @else

                <p class="text-center">
                    Pas de document&nbsp; <span class="fa fa-exclamation"></span>
                </p>

            @endif

        </div>
        <!-- End ... COL MD 6 -->

        <!-- COL MD 6 -->
        <div class="col-md-6 text-center">

            @include( 'partials._search_by_category' )

        </div>
        <!-- End ... COL MD 6 -->

    </div>
    <!-- End ... ROW -->

@stop
