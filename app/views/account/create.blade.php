@extends('account.index')

@section('content')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="module module-login span4 offset4">
                <form class="form-vertical" action="{{ URL::route('account-create-post') }}" method="POST">
                    {{-- CSRF Token --}}
                    {{ Form::token() }}

                    <div class="module-head">
                        <h3>Sign Up</h3>
                    </div>

                    <div class="module-body">
                        {{-- Username --}}
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" type="text" placeholder="Username" name="username" value="{{ Input::old('username') }}">
                                @if($errors->has('username'))
                                    <span class="text-error">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" type="password" name="password" placeholder="Password">
                                @if($errors->has('password'))
                                    <span class="text-error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" type="password" name="password_confirmation" placeholder="Confirm Password">
                                @if($errors->has('password_confirmation'))
                                    <span class="text-error">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <button type="submit" class="btn btn-info pull-right">Create Account</button>
                            </div>
                        </div>
                        <a href="{{ URL::route('account-sign-in') }}">Already a User?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

