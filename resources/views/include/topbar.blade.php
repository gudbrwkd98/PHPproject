
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        @hasRole('user') 
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">{{$countnotif}}</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <form action="{{ route('user.userapplication')}}" method="POST">
                        @csrf
                        @method('GET')                      
                        @if($countnotif>=1)
                            <h6 class="dropdown-header bg-danger" style="border: 1px solid #e74a3b;" >
                                Alerts Center
                            </h6>
                            @foreach($notifications as $notif) 

                            <a class="dropdown-item d-flex align-items-center" href="{{ route('user.userapplication')}}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-danger">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div >
                                  
                                     <td>{{\Carbon\Carbon::parse($notif->created_at)->format('M d ,Y  h:i A')}}</td><br>
                                    <span class="font-weight-bold">{{$notif->notif}}</span>
                              
                                </div>
                            </a>
                            @endforeach
                        @endif
                    </form>
                </div>
            </li> 
      @else
               
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">{{$countnotif}} @if($countnotif>=5)+ @endif</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                     <form action=" " method="POST">
                     @if($countnotif>=1)
                    <h6 class="dropdown-header bg-danger" style="border: 1px solid #e74a3b;" >
                        Alerts Center
                    </h6>
                    @foreach($notifications as $notif) 
                       
                            @csrf
                            @method('GET')                      
                           
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('staff.viewApplication',  $notif->user_id) }}">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                       
                                        <td>{{\Carbon\Carbon::parse($notif->created_at)->format('M d ,Y  h:i A')}}</td><br>
                                        <span class="font-weight-bold">{{$notif->notif}}</span>
                                    
                                    </div>
                                </a>
                                 @endforeach
                            @endif
                        </form>
                   
                </div>
            </li>
        @endhasRole


        
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->email}}</span>
              
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#changePassModal">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>{{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Confirmation window</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>
            <div class="modal-body">Are ready to end your current session?</div>
            <div class="modal-footer">
                <a class="btn btn-danger"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ change password modal ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="changePassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <form class="form-horizontal" method="PATCH" action="{{ route('user.edit.create') }}">
                {{ csrf_field() }}
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" style="color:black;">
                        <i class="fas fa-lock fa-sm fa-fw"></i>
                        Change Password
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <tr>
                            <th>
                                Current Password <strong style="color: red;">*</strong>
                            </th>
                            <td>
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <input style="color:black;" id="current-password" type="password" class="form-control" name="current-password" required >
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
                                    <input style="color:black;" id="new-password" type="password" class="form-control" name="new-password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
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
                                <input style="color:black;" id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
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