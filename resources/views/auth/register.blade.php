@extends( 'layouts.app' )

<!-- ====================================================== -->

@section('content')

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 8 -->
        <div class="col-md-8 col-md-offset-2">

            <!-- TITLE -->
            <h3>
                Inscription
            </h3>
            <!-- End ... PANEL HEADING -->

            <!-- FORM -->
            <form class="form-horizontal" role="form" method="POST" action="{{ route( 'post_register' ) }}">

                {{ csrf_field() }}

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'email' ) ? ' has-error' : '' }}">

                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                    <!-- COL MD 6 -->
                    <div class="col-md-6">

                        <input id="email" type="email" class="form-control" name="email" value="{{ old( 'email' ) }}" required>

                        @if( $errors->has( 'email' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'email' ) }}</strong>
                            </span>

                        @endif

                    </div>
                    <!-- End ... COL MD 6 -->

                </div>
                <!-- FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'password' ) ? ' has-error' : '' }}">

                    <label for="password" class="col-md-4 control-label">Mot de passe</label>

                    <!-- COL MD 6 -->
                    <div class="col-md-6">

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if( $errors->has( 'password' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>

                        @endif

                    </div>
                    <!-- End ... COL MD 6 -->

                </div>
                <!-- End ... FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'password_confirmation' ) ? ' has-error' : '' }}">

                    <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe</label>

                    <!-- COL MD 6 -->
                    <div class="col-md-6">

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        @if( $errors->has( 'password_confirmation' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'password_confirmation' ) }}</strong>
                            </span>

                        @endif

                    </div>
                    <!-- End ... COL MD 6 -->

                </div>
                <!-- End ... FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group">

                    <!-- COL MD 6 -->
                    <div class="col-md-6 col-md-offset-4">

                        <button type="submit" class="btn btn-primary">
                            Valider
                        </button>

                    </div>
                    <!-- End ... COL MD 6 -->

                </div>
                <!-- End ... FORM-GROUP -->

            </form>
            <!-- End ... FORM -->

        </div>
        <!-- End ... COL MD 8 -->

    </div>
    <!-- End ... ROW -->

@stop
