@extends('layout.full')
@section('title', "Create an Account")
@section('content-title')
    Register!
@endsection
@section('content')



<div class="row">
    <div class="col-md-5">
        <div style="margin-top: 30%;">
            <center>
                <img src="{{asset('img/eteeap.jpg')}}" class="p-5">
            </center>
        </div>
    </div>
    <div class="col-md-7 bg-gray-300">
        <div class="mx-2">


                    
            <form method="POST"  class ="user" action="{{ route('register') }}" >
                @CSRF
                        {{method_field('POST')}}    
                        @method('POST')
                             @if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
             
                <table class="table table-borderless text-dark p-5">
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <th colspan="2" style="text-align: center; font-size: large;">
                            Create Account!
                        </th>
                    </tr>
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <td colspan="2">
                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email">
                        </td>
                    </tr>
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <td colspan="2">
                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </td>
                    </tr>
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <td colspan="2">
                            <input id="password"-confirm type="password" class="form-control  form-control-user @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </td>
                    </tr>
                   
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-danger btn-user btn-block" name="" value="Create Account">
                        </td>
                    </tr>
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <td colspan="2">
                            <center>
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already have an account? Login') }}
                                </a>
                            </center>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection