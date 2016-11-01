@extends( 'layouts.app' )

<!-- ============================================================ -->

@section( 'content' )

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 8 -->
        <div class="col-md-8 col-md-offset-2">

            <h3>
                Profil
            </h3>

            <!-- FLASH MESSAGE -->
            @include('flash::message')
            <!-- End ... FLASH MESSAGE -->

            <!-- FORM -->
            {!! Form::model( Auth::user(), [ 'route' => [ 'user_update', Auth::user()->id ], 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'profil', 'role' => 'search' ] ) !!}

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'email' ) ? ' has-error' : '' }}">

                    <label for="email" class="col-md-4 control-label">E-mail</label>

                    <!-- COL MD 8 -->
                    <div class="col-md-8">

                        <input id="email" type="text" class="form-control" name="email" value="{{ old( 'email' ) ?? Auth::user()->email }}" required autofocus>

                        <!-- ERROR -->
                        @if( $errors->has( 'email' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'email' ) }}</strong>
                            </span>

                        @endif
                        <!-- End ... ERROR -->

                    </div>
                    <!-- End ... COL MD 8 -->

                </div>
                <!-- End ... FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'password' ) ? ' has-error' : '' }}">

                    <label for="password" class="col-md-4 control-label">Nouveau mot de passe</label>

                    <!-- COL MD 8 -->
                    <div class="col-md-8">

                        <input id="password" type="password" class="form-control" name="password" value="" required autofocus>

                        <!-- ERROR -->
                        @if( $errors->has( 'password' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>

                        @endif
                        <!-- End ... ERROR -->

                    </div>
                    <!-- End ... COL MD 8 -->

                </div>
                <!-- End ... FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'password_confirmation' ) ? ' has-error' : '' }}">

                    <label for="password_confirmation" class="col-md-4 control-label">Confirmez le mot de passe</label>

                    <!-- COL MD 8 -->
                    <div class="col-md-8">

                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autofocus>

                        <!-- ERROR -->
                        @if( $errors->has( 'password_confirmation' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'password_confirmation' ) }}</strong>
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

                        <button class="ladda-button btn btn-primary spinner" id="add_paper" data-style="zoom-in">
                            <span class="fa fa-pencil"></span>&nbsp; Modifier
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
