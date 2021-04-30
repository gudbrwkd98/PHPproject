<!DOCTYPE html>
<html lang="en">

@include('include.head')

<body class="bg-gray-700">
	<div class="container">
	    <!-- Outer Row -->
	    <div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
		        <div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('include.scripts')
</body>

</html>
