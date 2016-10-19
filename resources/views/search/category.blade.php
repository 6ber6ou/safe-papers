@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <h3>
                Catégorie "{{ $category->name }}" <small>( {{ $papers->count() }} document{{ $papers->count() > 1 ? 's' : '' }} )</small>
            </h3>

            @foreach( $papers as $paper )

                <p>

                    <a href="{{ route( 'show_paper', $paper->id ) }}">{{ $paper->description }}</a>
                    &nbsp; <span class="label label-info">{{ $paper->category->name }}</span>
                    <br>
                    {{ Jenssegers\Date\Date::parse( $paper->created_at )->diffForHumans() }}

                </p>

            @endforeach

        </div>

    </div>

@stop
