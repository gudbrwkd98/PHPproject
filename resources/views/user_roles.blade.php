@extends('layout.dashboard')
@section('title', "Users")
@section('content-title')
    Users Page
@endsection
@section('content')
 <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)       
                          <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                            <td>
                              <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                              </a>
                              
                              <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              </form>
                            </td>
                          </tr>           
                          @endforeach
                        </tbody>
                      </table>



@endsection






    
  
