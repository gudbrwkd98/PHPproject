@extends('layout.dashboard')
@section('title', "Work Experience Details")
@section('content-title')
    Work Experience Details
@endsection
@section('content')
    <table class="table table-borderless">
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th width="25%">
                Position
            </th>
            <td width="25%">
                <i class="text-danger"> sample text input</i>
            </td>
            <th width="25%">
                Terms / Status of Employment
            </th>
            <td width="25%">
                <i class="text-danger"> sample text input</i>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Date Start
            </th>
            <td>
                <i class="text-danger">mm/dd/yyy</i>
            </td>
            <th>
                Date End
            </th>
            <td>
                <i class="text-danger">mm/dd/yyy</i>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Company Name
            </th>
            <td>
                <i class="text-danger"> sample text input</i>
            </td>
            <th>
                Company Address
            </th>
            <td>
                <i class="text-danger"> sample text input</i>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Name and Designation of Immediate Supervisor
            </th>
            <td>
                <i class="text-danger">
                    Supervisor's Name
                    <br>
                    Supervisor's Designation
                </i>
            </td>
            <th>
                Reason(s) for moving on to the next job
            </th>
            <td>
                <i class="text-danger"> sample text input</i>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th colspan="1">
                Describe actual functions and responsibilities in position occupied
            </th>
            <td colspan="3" style="text-indent: 50px; text-align: justify;">
                <i class="text-danger">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </i>
            </td>
        </tr>
    </table>


<table class="table table-striped">
    <!-- --------------------  thead  -------------------- -->
    <thead>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Contact #</th>
            <th>Email</th>
        </tr>
    </thead>
    <!-- --------------------  tbody  -------------------- -->
    <tbody>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <td>
                name of reference person 1
            </td>
            <td>
                position of reference person 1
            </td>
            <td>
                phone # of reference person 1
            </td>
            <td>
                email address of reference person 1
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <td>
                name of reference person 2
            </td>
            <td>
                position of reference person 2
            </td>
            <td>
                phone # of reference person 2
            </td>
            <td>
                email address of reference person 2
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <td>
                name of reference person 3
            </td>
            <td>
                position of reference person 3
            </td>
            <td>
                phone # of reference person 3
            </td>
            <td>
                email address of reference person 3
            </td>
        </tr>
    </tbody>
</table>

<a href="">
    <button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>    
</a>
@endsection