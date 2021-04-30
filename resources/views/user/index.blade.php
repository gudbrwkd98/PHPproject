@extends('layout.dashboard')
@section('title', "Users")
@section('content-title')
List of Users
@hasRole('admin')

<button class="btn btn-danger" data-toggle="modal" data-target="#adduser" >
    <i class="fas fa-user-plus"></i> Create User
</button>
@endhasRole

<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ alert for changes ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
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




@endsection
<!-- ~~~~~~~~~~~~~~~~~~~~ Create User ~~~~~~~~~~~~~~~~~~~~ -->

@section('content')     
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ data table: users ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark" id="courseTable" name="courseTable" width="100%" cellspacing="0">
                <thead>
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <th scope="col" style="color: black;">Name</th>
                        <th scope="col" style="color: black;">Email</th>
                        <th scope="col" style="color: black;">Status</th>
                        <th scope="col" style="color: black;">Roles</th>
                        <th scope="col" style="color: black;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    @foreach ($users as $user)       
                    <tr style="color: black;">
                        <td>
                            {{ implode(', ',$user->profiles()->get()->pluck('firstName')->toArray())}}
                            {{implode(', ',$user->profiles()->get()->pluck('middleName')->toArray())}}
                            {{implode(', ',$user->profiles()->get()->pluck('lastName')->toArray())}}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>                             
                        <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" style="text-decoration: none;">
                                <button type="button" class="btn btn-danger"><i class="fas fa-edit"></i> Edit Roles</button>
                            </a>
                        
                            <button class="btn btn-secondary zoom" data-id="{{$user->id}}" id="delete"><i class="fas fa-trash-alt"></i></button>

                        </td>
                    </tr>           
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ Create User modal ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="modal" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-size: medium; color: black;">
            <form method="POST" class ="user" action="{{ route('user.edit.adduser') }}" >
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white"><i class="fas fa-user-plus"></i> Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Email<span class="text-danger">*</span>
                            </th>
                            <td>
                                <input type="email" class="form-control" id="email" name="email" placeholder="" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Password<span class="text-danger">*</span>
                            </th>
                            <td>
                                <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Confirm Password<span class="text-danger">*</span>
                            </th>
                            <td>
                                <input id="password"-confirm type="password" class="form-control  @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Office<span class="text-danger">*</span>
                            </th>
                            
                            <td>
                                <select id="role" name="role" class="form-control" required>
                                    <option selected="" value="" disabled="">- - - - - - Select Office - - - - - -</option>
                                    @foreach($roles as $role)
                                        <option>{{$role->name}}</option>
                                    @endforeach
                                  
                                </select>
                            </td>
                        </tr>
                  
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ delete modal ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="deleteModalLabel">Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <div class="modal-body">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this user?</h5>
            </div>

            <div class="modal-footer">
                <form action="{{ route('admin.deleteUser',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="id3" id="id3" required hidden>

                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>





<script>
    $(function () {
        var data = {
            "_token": $('#token').val()
        };

        $(document).ready(function() {
            var table = $('#courseTable').DataTable();
        });


        $('#courseTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("/users/deleteusers"+id, function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(id);
          
            });
        });




    });
</script>
@endsection