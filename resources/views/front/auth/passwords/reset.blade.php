@extends('front.layout.master')

@section('content')
    <section class="content-block default-bg ptb-50">
        <div class="container">
            <div class="section-title animated animated fadeInUp text-center">
                <h2>Réinitialiser le mot de passe</h2>
            </div>
            <div class="col-lg-12">
                @include('notification')
            </div>
            <div class="user-form-block animated animated login-area">
            <form class="form-horizontal col-lg-12" id="reset_password_form" role="form" method="POST"
                  action="{{ route('auth.reset') }}">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                    <div class="col-sm-6 mlr-25">
                        <label >E-Mail Address</label>
                        <input type="email" class=" required email" name="email"
                               value="{{ $email or old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-sm-6 mlr-25">
                        <label >Mot de passe:</label>
                        <input type="password" class=" required" name="password"
                               id="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="col-sm-6 mlr-25">
                        <label>Confirmer mot de passe</label>
                        <input type="password" class=" required"
                               name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 mlr-25">
                        <button type="submit" class="btn btn-clickee-default" id="reset_password">
                            ENREGISTRER
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
@section('after-scripts-end')
    {!! Html::script('js/frontend/login.js') !!}
@endsection

