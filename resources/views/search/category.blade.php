@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 6 -->
        <div class="col-md-6">

            <h3>
                Résultat : <span class="label label-primary"><span class="fa fa-folder-o"></span> &nbsp;{{ $category->name }}</span> <small>( {{ $papers->total() }} )</small>
            </h3>

            @foreach( $papers as $paper )

                <p>

                    <a href="{{ route( 'show_paper', $paper->id ) }}" data-tooltip title="<img src='{{ asset( 'papers/public/thumbs/' . $paper->path ) }}?{{ uniqid() }}' alt=''>">{{ $paper->description }}</a>
                    &nbsp; <span class="label label-primary"><span class="fa fa-folder-o"></span> &nbsp;{{ $paper->category->name }}</span>
                    <br>
                    {{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

                </p>

            @endforeach

            <p>
                {{ $papers->links() }}
            </p>

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
