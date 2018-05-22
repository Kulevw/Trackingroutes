@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="card rounded-0">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        {{-- LOGIN --}}
                        <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                            <label for="login" class="col-md-4 control-label">Login</label>

                            <div class="col">
                                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>

                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- CONFIRM PASSWORD --}}
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        {{-- LASTNAME --}}
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">lastname</label>

                            <div class="col">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- FIRSTNAME --}}
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">firstname</label>

                            <div class="col">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- MIDDLENAME --}}
                        <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                            <label for="middlename" class="col-md-4 control-label">middlename</label>

                            <div class="col">
                                <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}">

                                @if ($errors->has('middlename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- SERIES AND NUMBER --}}
                        <div class="form-group{{ $errors->has('series_number') ? ' has-error' : '' }}">
                            <label for="series_number" class="col-md-4 control-label">series_number</label>

                            <div class="col">
                                <input id="series_number" type="text" class="form-control" name="series_number" value="{{ old('series_number') }}" required>

                                @if ($errors->has('series_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('series_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- DATE ISSUED --}}
                        <div class="form-group{{ $errors->has('date_issued') ? ' has-error' : '' }}">
                            <label for="date_issued" class="col-md-4 control-label">date_issued</label>

                            <div class="col">
                                <input id="date_issued" type="date" class="form-control" name="date_issued" value="{{ old('date_issued') }}" required>

                                @if ($errors->has('date_issued'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_issued') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- ISSUED BY --}}
                        <div class="form-group{{ $errors->has('issued_by') ? ' has-error' : '' }}">
                            <label for="issued_by" class="col-md-4 control-label">issued_by</label>

                            <div class="col">
                                <input id="issued_by" class="form-control" name="issued_by" value="{{ old('issued_by') }}" required>
                                {{-- </textarea> --}}

                                @if ($errors->has('issued_by'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('issued_by') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- PHONE --}}
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">phone</label>

                            <div class="col">
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
