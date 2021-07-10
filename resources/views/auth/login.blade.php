@extends('layouts.app')

@section('content')
 

<div class="container register">
    <div class="row">
        <div class="col-md-6 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Login</h3>
                    <div class="register-form">
                        <div class="col-md-11">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input placeholder="Email *" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : '' }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <input placeholder="Password *" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('email') ? '' : '' }}" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> 
 
                                <button type="submit" class="btnRegister">
                                    {{ __('Login') }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 register-left">
            <img src="https://i.imgur.com/HJhMiE3.png" alt="employees" />
            <h3>Welcome to Axis</h3>
            <p>Employee Management System </p>
            <p>Laravel 7 - adminlte 3</p>
        </div>
    </div>
</div> 


<style>
    body {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        background: #f8f9fa;
    }

    .register { 
        padding-top: 3%;
        padding-right: 3%;
        /* height: 100vh; */
        width: 100%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
        margin-left: 10%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #EE82EE;
        font-weight: bold;
        color: #fff;
        margin-top: 15%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-left input:hover {
        background: #3931af;
    }

    .register-right {
        /* background: #f8f9fa; */
        background: -webkit-linear-gradient(left, #3931af, #EE82EE);
        border-bottom-right-radius: 25% 50%;
        border-top-left-radius: 25% 50%;
        padding-top: 5%;
    }

    .register-left img {
        margin-top: 20px;
        margin-bottom: 10px;
        width: 80%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter; 
    }

    .register-left p,
    h3 {
        color: #000;
    }

    .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        /* margin-top: 15%; */
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #3931af;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .btnRegister:hover {
        background: #EE82EE;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #fff;
    }

    .form-group a {
        color: #fff;
    }

    .form-group a:hover {
        color: #EE82EE;
    }

    .form-group label {
        color: #fff;
    }

    @media only screen and (max-width: 600px) {
        .register-left {
            display: none;
        }
    }
</style>
@endsection

