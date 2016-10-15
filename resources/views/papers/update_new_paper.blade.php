@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

	<!-- ROW -->
	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<h3>
				Modifier un papier
			</h3>

            <!-- FLASH MESSAGE -->
            @include('flash::message')
            <!-- End ... FLASH MESSAGE -->

            <!-- FORM -->
            <form class="form-horizontal" role="search" method="POST" action="{{ route( 'post_update_paper' ) }}">

                {{ csrf_field() }}

                <input type="hidden" name="paper_id" id="paper_id" value="{{ $paper->id }}">

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'description' ) ? ' has-error' : '' }}">

                    <label for="description" class="col-md-4 control-label">Description</label>

                    <!-- COL MD 8 -->
                    <div class="col-md-8">

                        <input id="description" type="text" class="form-control" name="description" value="{{ $paper->description }}" required autofocus>

                        <!-- ERROR -->
                        @if( $errors->has( 'description' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'description' ) }}</strong>
                            </span>

                        @endif
                        <!-- End ... ERROR -->

                    </div>
                    <!-- End ... COL MD 8 -->

                </div>
                <!-- End ... FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'category' ) ? ' has-error' : '' }}">

                    <label for="category" class="col-md-4 control-label">Catégorie</label>

                    <!-- COL MD 8 -->
                    <div class="col-md-8">

                        <input id="category" type="text" class="form-control" name="category" value="{{ $paper->category->name }}" required autocomplete="off">

                        <!-- ERROR -->
                        @if( $errors->has( 'category' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'category' ) }}</strong>
                            </span>

                        @endif
                        <!-- End ... ERROR -->

                    </div>
                    <!-- End ... COL MD 8 -->

                </div>
                <!-- End ... FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group">

                    <!-- COL MD 8 -->
                    <div class="col-md-8 col-md-offset-4">

                        <a href="{{ route( 'home' ) }}" class="btn btn-default">
                            Annuler
                        </a>

                        &nbsp;&nbsp;

                        <button type="submit" class="btn btn-primary">
                            Modifier
                        </button>

                    </div>
                    <!-- End ... COL MD 8 -->

                </div>
                <!-- FORM GROUP -->

			</form>
            <!-- End ... FORM -->

		</div>

	</div>
	<!-- End ... ROW -->

@stop
