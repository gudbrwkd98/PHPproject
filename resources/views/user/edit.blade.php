
@extends('layout.dashboard')
@section('title', "Users")
@section('content-title')
    Manage Users Page
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage {{ $user->name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.users.update', ['user' => $user->id ]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input type="radio" id="roles" name="roles" value="{{ $role->id }}" {{ $user->hasAnyRole($role->name)? 'checked': '' }}>

                                <label>{{ $role->name }}</label>

                            </div>
                        @endforeach
                      
                        <button href="{{route('admin.users.index')}}" class="btn btn-secondary zoom mr-1"><i class="fas fa-backward"></i></button> 
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection








    
  
