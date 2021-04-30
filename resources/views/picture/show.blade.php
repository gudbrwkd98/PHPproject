@extends('layout.dashboard')
@section('title', "Pictures")
@section('content-title')
{{$profile2->firstName." ".$profile2->middleName." ".$profile2->lastName."'s"}}
{{'Pictures'}}

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
            <table class="table table-bordered" id="picturesTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($picture as $pic)       
                <tr>
                    <td>
                        <a href="{{ asset('uploads/pics/'.$pic->pics)}}"  target="blank"> 
                        <img src="{{ asset('uploads/pics/'.$pic->pics)}}"  class="rounded-circle" style="height: 7rem;width:7rem ;" alt="Image">
                        </a>
                    </td>
                    
                    
                    <td>
                         <button class="btn btn-light" data-id="{{$pic->picid}}" id="edit">View</button>
                            
                               

                                 
        @endforeach
        
    </tbody>
</table>
{{$picture->links()}}
</div>
</div>
</div>


<!-- Edit Modal-->
                                
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addImageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageLabel">
                        <i class="far fa-image"></i>
                        View Image
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    
                    <table class="table table-borderless text-dark" id="" style="font-size: medium;">
                        <input type="text" name="id" id="id" required hidden>
                        <input type="text" name="user_id" id="user_id" required hidden>
                        <input type="text" name="pic" id="pic" required hidden="">
                        <input type="file" id="picture" name="picture" hidden="">
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <tr>
                            <th>
                                Picture
                            </th>
                            <td>
                                <a href="" name="link" id="link" target="blank">
                                    <img src=""  class="rounded-circle" style="height: 7rem;width:7rem ;" alt="Image" id="Image" name="Image" >
                                </a>
                            </td>
                        </tr>
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <tr>
                            <th>
                                Company
                            </th>
                            <td>
                                <input type="text" name="company" id="company" class="form-control" required disabled="">
                            </td>
                        </tr>
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <tr>
                            <th>
                                Caption
                            </th>
                            <td>
                                <textarea rows="3" required name="caption" id="caption" class="form-control" disabled=""></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(function () {
        var data = {
            "_token": $('#token').val()
        };

        $(document).ready(function() {
            var table = $('#picturesTable').DataTable();
        });
            
         $('#picturesTable').on('click', '#edit', function () {
            
            var id = $(this).attr('data-id');
            $.get("/userpics/edit/"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id]').val(data.id);
                 $('input[id=user_id]').val(data.user_id);
                  $('input[id=pic]').val(data.pics);
                 $('#Image').attr('src', '/uploads/pics/'+data.pics);
                 $('#link').attr('href', '/uploads/pics/'+data.pics);
                // $('input[id=picture]').(data.pics);
                $('input[id=company]').val(data.company);
                 $('textarea[id=caption]').val(data.caption);
                $('#modalHeading').html("Edit Pictures");
            });
        });

        $('body').on('click', '#save', function (e) {
            e.preventDefault();
        
            $.ajax({
            data: $('#userForm').serialize(),
            url: "userpic/create/",
            type: "POST",
            dataType: 'json',
            success: function (data) {
        
                $('#userForm').trigger("reset");
                $('#editModal').modal('hide');
                alert('successfully updated');
                window.location.reload();
            
            },
            error: function (data) {
               alert('error; ' + eval(error));
            }});
        });

        $('body').on('click', '#add', function () {
            $('input[id=pics]').val('');
            $('input[id=company]').val('');
            $('textarea[id=caption]').val('');
        });

        $('#picturesTable').on('click', '#delete', function (e) {
            var c = confirm('are you sure?');
            if(c == true){
                e.preventDefault();
            
                $.ajax({
                data: $('#userForm').serialize(),
                url: "userpic/delete/"+$(this).attr('data-id'),
                type: "DELETE",
                dataType: 'json',
                success: function (data) {
                    alert('successfully deleted');
                    window.location.reload();
                },
                error: function (data) {
                    alert('Error');
                }});
            }
        });

        $('#default_file').change(function(){    
            //on change event  
            formdata = new FormData();
            if($(this).prop('files').length > 0)
            {
                file =$(this).prop('files')[0];
                formdata.append("pics", file);
            }
        });
        
    });
</script>
@endsection