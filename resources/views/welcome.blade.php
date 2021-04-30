@extends('layout.dashboard')
@section('title', "Welcome")
@section('content-title')
    Welcome Page
    <a href=""><input type="button" class="btn btn-primary" value="Create"></a>
@endsection
@section('content')

    <!-- -------------------------  Table  ------------------------- -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-danger">
                Table Name
            </h3>
            <p style="text-indent: 50px;" class="mb-0">
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>School Level</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <td>School Level</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection