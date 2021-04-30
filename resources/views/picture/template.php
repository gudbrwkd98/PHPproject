@extends('layout.dashboard')
@section('title', "Pictures")
@section('content-title')
Pictures


@if(count($errors)>0)
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
</div>
@endif


<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addImage">
   Add Image
</button>

<!-- Modal -->
<div class="modal fade" id="addImage" tabindex="-1" role="dialog" aria-labelledby="addImageLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form method="POST"  action="{{ route('user.userpic.store',$user = auth()->id()) }}" enctype="multipart/form-data">
            <div class="modal-header">
               <h5 class="modal-title" id="addImageLabel">
                 <i class="far fa-image"></i>
                 Add Image
             </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          @CSRF
          {{method_field('POST')}}	
          @method('POST')
          <input type="text" name="user_email" value="{{Auth::user()->email}}" hidden>

          <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>

          <table class="table table-borderless text-dark" style="font-size: medium;">
              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
              <tr>
                 <th>
                    Picture
                </th>
                <td>
                    <input type="file" name="pics" id="pics" required>
                </td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
             <th>
                Company
            </th>
            <td>
                <input type="text" name="company" id="company" class="form-control" required>
            </td>
        </tr>
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <tr>
         <th>
            Caption
        </th>
        <td>

            <textarea rows="3" required name="caption" id="caption" class="form-control"></textarea>
        </td>
    </tr>
</table>
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

   <button type="submit" class="btn btn-primary">
    {{ __('Save Changes') }}
</button>
</div>
</form>
</div>
</div>
</div>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

                <th scope="col">Image</th>
                <th scope="col">Company</th>
                <th scope="col">Caption</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($picture as $pic)       
            <tr>

                <td width='100px;' height="100px;">
                    <a href="{{ asset('uploads/pics/'.$pic->pics)}}" target="_blank">
                        <img src="{{ asset('uploads/pics/'.$pic->pics)}}" class="img-thumbnail rounded-circle" width="100px;" height="100px;" alt="Image">
                    </a>
                </td>
                <td width='200px;'>{{$pic->company}}</td>
                <td width='200px;'>{{$pic->caption}}</td>
                <td width='50px;'>
                    <form action="{{ route('user.userpic.destroy',$pic->picid) }}" method="POST">
                      <a href="" download="{{$pic->pics}}"  style="text-decoration: none;">
                      <input type="button" class="btn btn-secondary btn-sm" name="" id="" value="View">
                  </a>

                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
          </td>
      </tr>           
      @endforeach

  </tbody>
</table>
</div>
</div>
</div>
@endsection