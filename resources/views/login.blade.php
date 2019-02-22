@extends('layouts.exp')

    @section('content')
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="container">
                    <form action="{{ url('login') }}" class="form-horizontal" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="email" class="form-control-lg mt-5 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" value="{{ old('email') }}" placeholder="Enter Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" placeholder="Enter Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="small" id="pwd">Forget password?</a>
                                @endif
                            </label>
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-info mb-3">Login</button>

                        <div class="form-group">
                            <label class="form-label float-right">
                                <p class="small">Not a Member?
                                    <a href="/register" >Register</a>
                                </p>
                            </label>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endsection
