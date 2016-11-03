@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 6 -->
        <div class="col-md-6">

            <h3 class="text-center">
                Tous les papiers &nbsp;<small>( {{ $papers->total() }} )</small>
            </h3>

            @if( count( $papers ) > 0 )

            @foreach( $papers as $paper )

                <!-- PARAGARPH -->
                <p id="paragraph_{{ $paper->id }}">

                    <a href="{{ route( 'show_paper', $paper->id ) }}" data-tooltip title="<img src='{{ asset( 'papers/public/thumbs/' . $paper->path ) }}?{{ uniqid() }}' alt=''>" alt="">{{ $paper->description }}</a>
                    <br>
                    <a href="{{ route( 'search_by_category', str_slug( $paper->category->name ) ) }}" style="text-decoration : none;"><span class="label label-info"><span class="fa fa-folder"></span> &nbsp;{{ $paper->category->name }}</span></a>
                    <br>
                    {{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

                </p>
                <!-- End ... PARAGARPH -->

            @endforeach

            {{ $papers->links() }}

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
