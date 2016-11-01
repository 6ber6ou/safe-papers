@extends( 'layouts.app' )

<!-- ====================================================== -->

@section( 'content' )

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 8 -->
        <div class="col-md-8 col-md-offset-2">

            <!-- TITLE -->
            <h3>
                Connexion
            </h3>

            <!-- FROM -->
            <form class="form-horizontal" role="form" method="POST" action="{{ route( 'login' ) }}">

                {{ csrf_field() }}

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'email' ) ? ' has-error' : '' }}">

                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                    <!-- COL MD 6 -->
                    <div class="col-md-6">

                        <input id="email" type="email" class="form-control" name="email" value="{{ old( 'email' ) }}" required autofocus>

                        <!-- ERROR -->
                        @if( $errors->has( 'email' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'email' ) }}</strong>
                            </span>

                        @endif
                        <!-- End ... ERROR -->

                    </div>
                    <!-- End ... COL MD 6 -->

                </div>
                <!-- End ... FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'password' ) ? ' has-error' : '' }}">

                    <label for="password" class="col-md-4 control-label">Mot de passe</label>

                    <!-- COL MD 6 -->
                    <div class="col-md-6">

                        <input id="password" type="password" class="form-control" name="password" required>

                        <!-- ERROR -->
                        @if( $errors->has( 'password' ) )

                            <span class="help-block">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>

                        @endif
                        <!-- End ... ERROR -->

                    </div>
                    <!-- End ... COL MD 6 -->

                </div>
                <!-- FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group">

                    <!-- COL MD 6 -->
                    <div class="col-md-6 col-md-offset-4">

                        <!-- REMEMBER ME -->
                        <div class="checkbox">

                            <label>
                                <input type="checkbox" name="remember"> Se souvenir de moi
                            </label>

                        </div>
                        <!-- End ... REMEMBER ME -->

                    </div>
                    <!-- COL MD 6 -->

                </div>
                <!-- FORM GROUP -->

                <!-- FORM GROUP -->
                <div class="form-group">

                    <!-- COL MD 8 -->
                    <div class="col-md-8 col-md-offset-4">

                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-sign-in"></span>&nbsp; Connexion
                        </button>

                        <a class="btn btn-link" href="{{ route( 'password_reset' ) }}">
                            Mot de passe oublié ?
                        </a>

                    </div>
                    <!-- End ... COL MD 8 -->

                </div>
                <!-- FORM GROUP -->

            </form>
            <!-- End ... FROM -->

        </div>
        <!-- End ... COL MD 8 -->

    </div>
    <!-- ROW -->

@stop
