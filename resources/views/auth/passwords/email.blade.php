@extends('layouts.app')

<!-- ====================================================== -->

<!-- Main Content -->
@section('content')

    <!-- ROW -->
    <div class="row">

        <!-- COL MD 8 -->
        <div class="col-md-8 col-md-offset-2">

            <!-- TITLE -->
            <h3>
                Réinitialiser votre mot de passe
            </h3>
            <!-- End ... TITLE -->

            <!-- SUCCESS MESSAGE -->
            @if (session('status'))

                <div class="alert alert-success">
                    {{ session( 'status' ) }}
                </div>

            @endif
            <!-- SUCCESS MESSAGE -->

            <!-- FORM -->
            <form class="form-horizontal" role="form" method="POST" action="{{ route( 'post_password_reset' ) }}">
                {{ csrf_field() }}

                <!-- FORM GROUP -->
                <div class="form-group{{ $errors->has( 'email' ) ? ' has-error' : '' }}">

                    <label for="email" class="col-md-4 control-label">Adresse e-mail</label>

                    <!-- COL MD 6 -->
                    <div class="col-md-6">

                        <input id="email" type="email" class="form-control" name="email" value="{{ old( 'email' ) }}" required>

                        <!-- ERROR -->
                        @if ($errors->has('email'))

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
                <div class="form-group">

                    <!-- COL MD 6 -->
                    <div class="col-md-6 col-md-offset-4">

                        <button type="submit" class="btn btn-primary">
                            Envoyer un nouveau mot de passe
                        </button>

                    </div>
                    <!-- End ... COL MD 6 -->

                </div>
                <!-- End ... FORM GROUP -->

            </form>
            <!-- End ... FORM -->

        </div>
        <!-- End ... COL MD 8 -->

    </div>
    <!-- End ... ROW -->

@stop
