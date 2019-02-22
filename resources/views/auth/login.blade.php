<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        body, .btn-block {
            background: #3490dc;
        }

        .col-4 {
            background: white;
            margin-top: 100px;
            border-radius: 5px;
        }

        input {
            font-family: monospace;
            font-size: 25px;
        }

        input::-webkit-input-placeholder {
            font-size: 13px;
        }
        input::-moz-placeholder {
            font-size: 13px;
        }
        input::-ms-input-placeholder {
            font-size: 13px;
        }
        input::placeholder {
            font-size: 13px;
        }

        h2, a {
            color: #3490dc;
        }

        a:hover, a:visited, a:link, a:active
        {
            text-decoration: none;
        }

        .btn-block {
            color: white;
        }
    </style>
<body>
<div class="row">
    <div class="col-4 mx-auto">
        <div class="container">
            <form action="{{ url('login') }}" class="form-horizontal" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control-lg mt-5 form-control" name="email" placeholder="Enter Email"  required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                    @endif

                </div>
                <div class="form-group">
                    <input type="password" class="form-control-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter Password">

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
</body>
</html>
