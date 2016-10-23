@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

	<!-- ROW -->
	<div class="row">

        <!-- COL MD 8 -->
		<div class="col-md-8 col-md-offset-2">

			<h3>
				Ajouter un papier
			</h3>

            <!-- FLASH MESSAGE -->
            @include('flash::message')
            <!-- End ... FLASH MESSAGE -->

            <!-- FORM -->
            <form class="form-horizontal" role="search" method="POST" action="{{ route( 'save_new_paper' ) }}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'description' ) ? ' has-error' : '' }}">

                    <label for="description" class="col-md-4 control-label">Description</label>

                    <!-- COL MD 8 -->
                    <div class="col-md-8">

                        <input id="description" type="text" class="form-control" name="description" value="{{ old( 'description' ) }}" required autofocus>

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

                        <input id="category" type="text" class="form-control" name="category" value="{{ old( 'category' ) }}" required autocomplete="off">

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
                <div class="form-group{{ $errors->has( 'file' ) ? ' has-error' : '' }}">

                    <label for="file" class="col-md-4 control-label">Fichier</label>

                    <!-- COL MD 8 -->
                    <div class="col-md-8">

                        <input id="file" type="file" class="form-control" name="file" value="{{ old( 'file' ) }}" required>

                        <!-- ERROR -->
                        @if( $errors->has( 'file' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'file' ) }}</strong>
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

                        <button class="ladda-button btn btn-primary spinner" data-style="zoom-in">
                            Ajouter
                        </button>

                    </div>
                    <!-- End ... COL MD 8 -->

                </div>
                <!-- FORM GROUP -->

			</form>
            <!-- End ... FORM -->

		</div>
        <!-- End ... COL MD 8 -->

	</div>
	<!-- End ... ROW -->

@stop



