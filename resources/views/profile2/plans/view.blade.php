@extends('layout.dashboard')
@section('title', "Application Details")
@section('content-title')
    ETEEAP Educational Plans
    <a href="/plans-form">
        <!-- button will show if user hasnt tried to create plans yet -->
        <!-- --------------------  Create plans  -------------------- -->
        <button class="btn btn-danger zoom"><i class="fas fa-plus"></i></button>
        
        <!-- will appear if plans have already been created BUT will hide when either plans havent been created yet OR if they have already submitted their application -->
        <!-- --------------------  Edit plans  -------------------- -->
        <button class="btn btn-danger zoom"><i class="fas fa-edit"></i></button>

    </a>

    @endsection
@section('content')

    <table class="table table-border">
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th colspan="2">
                <img src="{{asset('img/core-values.png')}}" style="height: 10rem;">
                <br>
            </th>
            <td>
                <strong>In 300 words – explain how you were able to apply the Core Values of the University of Baguio to your current work.
                <i class="text-danger">*</i></strong>
                <br>
                <br>
                
                <p style="color: red; text-indent: 50px; text-align: justify;">
                    Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum
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
            <td>
                <i style="color: red;">Lorem Ipsum</i>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th style="text-align: right;">
                2nd Priority
            </th>
            <td>
                <i style="color: red;">Lorem Ipsum</i>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th style="text-align: right;">
                3rd Priority
            </th>
            <td>
                <i style="color: red;">Lorem Ipsum</i>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th colspan="2" width="30%">
                Statment of goals, objectives or purposes for applying for the degree
            </th>
            <td>
                <p style="color: red; text-indent: 50px; text-align: justify;">
                    Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum
                </p>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th colspan="2">
                Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.
            </th>
            <td>
                <p style="color: red; text-indent: 50px; text-align: justify;">
                    Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum
                </p>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th colspan="2">
                For overseas applicants, describe how you plan to obtain accreditation / equivalency (e.g. when you plan to come to the Philippines) 
            </th>
            <td>
                <p style="color: red; text-indent: 50px; text-align: justify;">
                    Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum
                </p>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th colspan="2">
                How soon do you need to complete accreditation / equivalency?
            </th>
            <td>
                <i style="color: red;">Lorem Ipsum</i>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th colspan="2">
                To sum up please write an essay on how your attaining a degree contributes to your personal development, your community, your workplace, society, and country?
            </th>
            <td>
                <p style="color: red; text-indent: 50px; text-align: justify;">
                    Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum
                </p>
            </td>
        </tr>
    </table>
    @endsection