@extends('layout.dashboard')
@section('title', "Programs")
@section('content-title')
Program

<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ alert for changes ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
@if(count($errors)>0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif


<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ?? unknown ?? ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
@if (session('error'))
<div class="alert alert-danger">
	{{ session('error') }}
</div>
@endif

<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ add course button ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<button type="button" class="btn btn-danger zoom" id="addBtn" data-toggle="modal" data-target="#addCourse">
	<i class="fas fa-plus"></i>
</button>

<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ add course modal  ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="POST"  action="{{ route('admin.course.store',$user = auth()->id()) }}" enctype="multipart/form-data">
				<div class="modal-header bg-danger">
					<h5 class="modal-title text-white" style="color: black;" id="exampleModalLabel">
						<i class="fas fa-fw fa-graduation-cap"></i>
						Program Information
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-white">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					@CSRF
					{{method_field('POST')}}	
					@method('POST')
					<table class="table table-borderless" style="color: black;  font-size: medium;">
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<tr>
							<th>
								Program Code
							</th>
							<td>
								<input style="color: black;" type="text" name="courseCode1" id="courseCode1" class="form-control" required="">
							</td>
						</tr>
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<tr>
							<th>
								School Code
							</th>
							<td>
								<select class="form-control" id="officeCode1" name="officeCode1" required="" style="color: black" required="">
                                            <option selected="" value="" disabled="">--- Please select School ---</option>
                                            @foreach($rolechoices as $roles2)             
                                            <option>{{$roles2->name}}</option>
                                            @endforeach
                                        </select>
							</td>
						</tr>
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<tr>
							<th>
								Name
							</th>
							<td>
								<textarea style="color: black;" type="text" name="courseName1" id="courseName1" class="form-control" required="" rows="3"></textarea>
								<input type="hidden" name="courseID" id="courseID" class="form-control" required="">
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


@endsection
@section('content')     
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ data table: course ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-dark" id="courseTable" width="100%" cellspacing="0">
				<thead>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<th scope="col" width="10%">Program Code</th>
						<th scope="col" width="10%">School Code</th>
						<th scope="col" width="70%">Name</th>
						<th scope="col" width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					@foreach($courses as $course)
					<tr>
						<td>{{$course->courseCode}}</td>
						<td>{{$course->officeCode}}</td>
						<td>{{$course->courseName}}</td>
						<td>
							<button class="btn btn-danger zoom" data-id="{{$course->id}}" id="edit"><i class="fas fa-edit"></i></button>
							<button class="btn btn-secondary zoom" data-id="{{$course->id}}" id="delete"><i class="fas fa-trash-alt"></i></button>
						</td>
					</tr>   
					@endforeach   
				</tbody>
			</table>

			<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
			<!-- ~~~~~~~~~~~~~~~~~~~~ edit modal ~~~~~~~~~~~~~~~~~~~~ -->
			<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
			<form id="userForm" name="userForm" method="POST"  action="{{ route('admin.course.create',$user = auth()->id()) }}" enctype="multipart/form-data">
			
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h5 class="modal-title text-white" id="modalHeading">
									<i class="fas fa-fw fa-graduation-cap"></i>
									Edit Program
								</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true" class="text-white">×</span>
								</button>
							</div>
							<div class="modal-body">
								<input type="hidden" name="id" id="id">
								<table class="table table-borderless" style="color: black;  font-size: medium;">
									<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
									<tr>
										<th>
											Program Code
										</th>
										<td>
											<input style="color: black;" type="text" name="courseCode" id="courseCode" class="form-control" required="" value="">
											<input style="color: black;" type="text" name="courseCodex" id="courseCodex" class="form-control" required="" value="" hidden="">
										</td>
									</tr>
									<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
									<tr>
										<th>
											School Code
										</th>
										<td>
											<select class="form-control" id="officeCode" name="officeCode" required="" style="color: black" required="">
                                            <option selected="" value="" disabled="">--- Please select School ---</option>
                                            @foreach($rolechoices as $roles2)             
                                            <option>{{$roles2->name}}</option>
                                            @endforeach
                                        </select>
										
										</td>
									</tr>
									<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
									<tr>
										<th>
											Name
										</th>
										<td>
											<textarea style="color: black;" type="text" name="courseName" id="courseName" class="form-control" required="" rows="3"></textarea>
										</td>
									</tr>
								</table>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-danger zoom" id="save"><i class="far fa-save"></i></button>
							</div>               	
						</div>
					</div>
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
                <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this item?</h5>
            </div>

            <div class="modal-footer">
                <form action="{{ route('admin.course.delete',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="id3" id="id3" required hidden>
                    <input type="text" name="course3" id="course3" required hidden>


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

		/* --------------- edit script --------------- */
		$('#courseTable').on('click', '#edit', function () {

			var id = $(this).attr('data-id');
			$.get("/course/edit/"+$(this).attr('data-id'), function (data) {
				$('#editModal').modal('show');
				$('input[id=id]').val(data.id);
				$('textarea[id=courseName]').val(data.courseName);
				$('input[id=courseCode]').val(data.courseCode);
				$('input[id=courseCodex]').val(data.courseName);
				 $('select[id=officeCode]').val(data.officeCode);



				$('#modalHeading').html("<i class='fas fa-fw fa-graduation-cap'></i>Edit Program");
			});
		});

		// /* --------------- save script --------------- */
		// $('body').on('click', '#save', function (e) {
		// 	e.preventDefault();

		// 	$.ajax({
		// 		data: $('#userForm').serialize(),
		// 		url: "course/create",
		// 		type: "POST",
		// 		dataType: 'json',
		// 		success: function (data) {

		// 			$('#userForm').trigger("reset");
		// 			$('#editModal').modal('hide');
		// 			alert('successfully updated');
		// 			window.location.reload();

		// 		},
		// 		error: function (data) {
		// 			alert('Error!');
		// 		}});
		// });

		// /* --------------- add script --------------- */
		// $('body').on('click', '#add', function () {
		// 	$('#editModal').modal('show');
		// 	$('input[id=id]').val('');
		// 	$('input[id=courseName]').val('');
		// 	$('input[id=courseCode]').val('');
		// 	$('#modalHeading').html("Add Program");
		// });

		/* --------------- delete script --------------- */
	$('#courseTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("/course/edit/"+$(this).attr('data-id'), function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(data.id);
                $('input[id=course3]').val(data.courseCode);

                $('#modalHeading').html("Edit Certificates");
            });
        });




	});


</script>
@endsection