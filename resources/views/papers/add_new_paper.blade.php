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
            <form action="{{ route( 'save_new_paper' ) }}" class="form-horizontal" role="search" id="new_paper" method="POST" enctype="multipart/form-data">

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

                        <input id="file" type="file" class="form-control" name="file" required>

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

                        <!-- PROGRESS BAR -->
                        <div class="progress">

                            <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span class="progress-bar-sr-only sr-only">0%</span>
                            </div>

                        </div>
                        <!-- End ... PROGRESS BAR -->

                    </div>
                    <!-- End ... COL MD 8 -->

                </div>
                <!-- FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group">

                    <!-- COL MD 8 -->
                    <div class="col-md-8 col-md-offset-4">

                        <a href="{{ route( 'home' ) }}" class="btn btn-default">
                            <span class="fa fa-home"></span>&nbsp; Annuler
                        </a>

                        &nbsp;&nbsp;

                        <button class="ladda-button btn btn-primary spinner" id="add_paper" data-style="zoom-in">
                            <span class="fa fa-plus"></span>&nbsp; Ajouter
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

<!-- ============================================================ -->

@section( 'scripts.footer' )

    <script>

        // ***********************
        // AUTOCOMPLETE CATEGORIES
        // ***********************

        var cat = categories;

        $( document ).ready( function()
            {

            $( '#category' ).autocomplete(
                {

                source : cat

                } );

            } );

    </script>

@stop
