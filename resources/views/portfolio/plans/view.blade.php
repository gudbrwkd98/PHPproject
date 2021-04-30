@extends('layout.dashboard')
@section('title', "Application Details")
@section('content-title')
    ETEEAP Educational Plans
 
    @if (count($comm) < 1)
        <a href="{{ route('user.plans-form')}}">
            <button class="btn btn-danger zoom"><i class="fas fa-plus"></i></button>
        </a>
    @endif
    @if (count($check) < 1)
        @if (count($comm) >= 1)
            <a href="{{ route('user.edit-plans-form')}}">
                <button class="btn btn-danger zoom"><i class="fas fa-edit"></i></button>
            </a>
        @endif
    @endif
@endsection

@section('content')
    @if (count($comm) >= 1)
        @foreach($comm as $com)
            <table class="table ">
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        <img src="{{asset('img/core-values.png')}}" style="height: 10rem;">
                        <br>
                        In 300 words – explain how you were able to apply the Core Values of the University of Baguio to your current work.
                        <i class="text-danger">*</i>
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <p>
                           {{$com->coreValues}}
                        </p>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th rowspan="3" class="p-5">
                        Degree Program applied for:
                    </th>
                    <th style="text-align: right;">
                        1st Priority
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <i style="color: ;"> {{$com->priority1}}</i>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th style="text-align: right;">
                        2nd Priority
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <i style="color: ;"> {{$com->priority2}}</i>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th style="text-align: right;">
                        3rd Priority
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <i style="color: ;"> {{$com->priority3}}</i>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2" width="30%">
                        Statement of goals, objectives or purposes for applying for the degree
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <p>
                       {{$com->sgop}}
                        </p>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <p>
                          {{$com->timePlan}}
                        </p>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        For overseas applicants, describe how you plan to obtain accreditation / equivalency (e.g. when you plan to come to the Philippines) 
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <p>
                          {{$com->accreditationPlan}}
                        </p>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        How soon do you need to complete accreditation / equivalency?
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <i style="color: ;">
                            {{$com->plantoComplete}}
                        </i>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        To sum up please write an essay on how your attaining a degree contributes to your personal development, your community, your workplace, society, and country?
                    </th>
                    <td style="border: 1px solid black;" class="p-2">
                        <p >
                            {{$com->essay}}
                        </p>
                    </td>
                </tr>
            </table>
       @endforeach
    @else
        <h3><center> Please Add ETEEAP Plans!</center></h3>
    @endif
@endsection
