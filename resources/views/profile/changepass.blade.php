@extends('layout.full')
@section('title', "Change Password")
@section('content')

@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-5">
        <div style="margin-top: 30%;">
            <center>
                <img src="{{asset('img/eteeap.jpg')}}" class="p-5">
            </center>
        </div>
    </div>
    <div class="col-md-7 bg-gray-300">
        <div class="p-3">
            <form class="form-horizontal" method="PATCH" action="{{ route('user.changepass.create') }}">
                {{ csrf_field() }}
                <table class="table-borderless table mt-1">
                    <thead>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th colspan="2">
                                <h5>
                                    <i class="fas fa-lock fa-sm fa-fw"></i>
                                    Change Password
                                </h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <tr>
                            <th>
                                Current Password <strong style="color: red;">*</strong>
                            </th>
                            <td>
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <input id="current-password" type="password" class="form-control" name="current-password" required >
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <tr>
                            <th>
                                New Password <strong style="color: red;">*</strong>
                            </th>
                            <td>
                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <input id="new-password" type="password" class="form-control" name="new-password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <tr>
                            <th>
                                Repeat Password <strong style="color: red;">*</strong>
                            </th>
                            <td>
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            </td>
                        </tr>
                        <!--  -->
                        <tr >
                            <td colspan="2" >
                                <button type="submit" class="btn btn-danger float-right mt-2"><i class="fas fa-save"></i> Save changes</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection