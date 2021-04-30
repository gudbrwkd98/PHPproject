@extends('layout.full')
@section('title', "Welcome")
@section('content-title')
    Welcome Page
    <a href=""><input type="button" class="btn btn-primary" value="Create"></a>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="my-5">
            <center>
                <img src="{{asset('img/eteeap.jpg')}}" class="p-5">
            </center>
        </div>
    </div>
    <div class="col-md-8 bg-gray-300 p-5">
       <form class="user" method="POST" action="{{ route('login') }}">
        @csrf
            <table class="table table-borderless text-dark">
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr>
                    <th style="text-align: center; font-size: large; color: black;">
                        Welcome!
                    </th>
                </tr>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr>
                    <td>
                       <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr>
                    <td>
                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                    </td>
                </tr>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr>
                    <td>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md--1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}

                                    </label>

                                </div>

                            </div>
                            

                    </td>
                </tr>

                <tr>
                    <td>
                       <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md--1">
                                <button  type="submit" class="btn btn-danger">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>
                            <a class="btn btn-link" href="{{ route('user.create.index') }}">
                                        {{ __('Create Account') }}
                                    </a>

                        </div>
                        </div>

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection