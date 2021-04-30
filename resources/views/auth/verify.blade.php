@extends('layout.full')
@section('title', "Email Verification")
@section('content-title')
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <table width="100%">
                <tr>
                    <td align="left" width="70%">
                        {{ __('Verify Your Email Address') }}
                    </td>
                    <td align="right">
                        <button class="btn btn-danger float-right" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                            Logout
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </td>
                </tr>
            </table>


        </div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </div>
    </div>
@endsection
