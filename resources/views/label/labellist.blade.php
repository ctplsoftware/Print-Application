@extends('layouts.app')
@section('content')
@if(session()->has('success'))
    <input type="hidden" name="" id="message" value="{{ session()->get('success') }}">
    <script>
        $(document).ready(function() {
            var message = $('#message').val();

            if (message === 'Form submitted successfully.') {
                Swal.fire({
                    html: 'Label created successfully',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                    customClass: 'swal-wide',
                });
            } else if (message === 'label sends approval.') {
                Swal.fire({
                    html: 'Label sent for approval',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                    customClass: 'swal-wide',
                });
            }
        });
    </script>
@endif

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid">
    @if(session()->has('catch'))
    <input type="hidden" name="" id="catch" value="{{session()->get('catch')}}">
    <script>
    $(document).ready(function() {
        if ($('#catch').val() != undefined) {
            Swal.fire({
                html: $('#catch').val(),
                showCancelButton: true,
                confirmButtonText: 'OK',
                confirmButtonColor: 'rgb(36 63 161)',
                background: 'rgb(105 126 157)',
                customClass: 'swal-wide',
            });
        }
    })
    </script>
    @endif



    @if($config->label_approval_flow == "on")
    <div class="col-md-12 ">
        <center>
            <div class="row">
                <div class="box col-md-4">
                    <div class="cards   mb-4 " id="approvedcard">
                        <div class="card-body " style="border-radius: 10px;">
                            <h5 class="card-title">
                                <span class="headingfont approved-text" id="app">
                                    Approved
                                </span>
                                <span class="approved-count" id="appcount">{{$approvedCount}}</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="box col-md-4 ">
                    <div class="cards   mb-4" id="waitingcard">
                        <div class="card-body " style="border-radius: 10px;">
                            <h5 class="card-title">
                                <span class="headingfont-bold pending-text" id="pen"> Waiting for approval</span>
                                <span class="pending-count" id="pencount">{{$waitingCount}}
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="box col-md-4">
                    <div class="cards   mb-4" id="rejectedcard">

                        <div class="card-body " style=" border-radius: 10px;">
                            <h5 class="card-title">
                                <span id="rej" class="headingfont-bold rejected-text"> Rejected</span>
                                <span class="rejected-count" id="rejcount">{{$rejectedCount}}
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
    <table id="approve" class=" table table-md table-bordered tablefix_mtop" style="width:100% !important;">
        <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;">
            <tr>
                <th style="max-width:40px !important;">S.No</th>
                <th class="centerAlign" style=" min-width: 200px !important; max-width: 200px !important;">
                    Label Name
                </th>
                <th class="centerAlign" style=" min-width: 150px !important; max-width: 150px !important;">
                    Size (mm)
                </th>
                <th class="centerAlign">Created By</th>
                <th class="centerAlign">Created Date</th>
                <th class="centerAlign">Approved By</th>
                <th class="centerAlign">Approved Date</th>
            </tr>
        </thead>
        <tbody class="nonheadingfont">
            @php
            $i = 1;
            @endphp
            @foreach($approved as $key=>$ship)
            <tr class="col-sm-12 tt">
                <td style="min-width:5px;">{{$i}}</td>
                <td style="min-width: 200px !important; max-width: 200px !important;"><a
                        href="labeledit/{{$ship->id}}">{{$ship->label_name}}</a>
                </td>
                <td>{{$ship->label_height}} mm x {{$ship->label_width}} mm</td>
                <td>{{$ship->usernamedata->username}}</td>
                <td>{{$ship->created_at}}</td>

                <td>
            @if ($ship->usernameapprove)
                {{ $ship->usernameapprove->username }}
            @else
                N/A
            @endif
        </td>
            <td>{{$ship->approve_reject_date}}</td>
            @php
            $i++
            @endphp
        </tr>

            @endforeach
        </tbody>
    </table>


    <table id="requested" class=" table table-md table-bordered tablefix_mtop" style="width:100% !important;">
        <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;">
            <tr>
                <th style="max-width:40px !important;">S.No</th>
                <th class="centerAlign" style=" min-width: 200px !important; max-width: 200px !important;">
                    Label Name
                </th>
                <th class="centerAlign" style=" min-width: 150px !important; max-width: 150px !important;">
                    Size (mm)
                </th>
                <th class="centerAlign">Created By</th>
                <th class="centerAlign">Created Date</th>
                <th class="centerAlign">Modified By</th>
                <th class="centerAlign">Modified Date</th>
            </tr>
        </thead>
        <tbody class="nonheadingfont">
            @php
            $i = 1;
            @endphp

            @foreach($requested as $key=>$ship)
            <tr class="col-sm-12 tt">
                <td style="min-width:5px;">{{$i}}</td>
                <td style="min-width: 200px !important; max-width: 200px !important;"><a
                        href="/labeledit/{{$ship->id}}">{{$ship->label_name}}</a>
                </td>
                <td>{{$ship->label_height}} mm x {{$ship->label_width}} mm</td>
                <td>{{$ship->usernamedata->username}}</td>
                <td>{{$ship->created_at}}</td>

                <td>
            @if ($ship->usernameapprove)
                {{ $ship->usernameapprove->username }}
            @else
                N/A
            @endif
        </td>
            <td>{{$ship->approve_reject_date}}</td>
                @php
                $i++
                @endphp
            </tr>
            @endforeach

        </tbody>
    </table>


    <table id="rejected" class=" table table-md table-bordered tablefix_mtop" style="width:100% !important;">
        <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;">
            <tr>
                <th style="max-width:40px !important;">S.No</th>
                <th class="centerAlign" style=" min-width: 200px !important; max-width: 200px !important;">
                    Label Name
                </th>
                <th class="centerAlign" style=" min-width: 150px !important; max-width: 150px !important;">
                    Size (mm)
                </th>
                <th class="centerAlign">Created By</th>
                <th class="centerAlign">Created Date</th>
                <th class="centerAlign">Rejected By</th>
                <th class="centerAlign">Rejected Date</th>

            </tr>
        </thead>
        <tbody class="nonheadingfont">
            @php
            $i = 1;
            @endphp

            @foreach($rejected as $key=>$ship)
            <tr class="col-sm-12 tt">
                <td style="min-width:5px;">{{$i}}</td>
                <td style="min-width: 200px !important; max-width: 200px !important;"><a
                        href="/labeledit/{{$ship->id}}">{{$ship->label_name}}</a>
                </td>
                <td>{{$ship->label_height}} mm x {{$ship->label_width}} mm</td>
                <td>{{$ship->usernamedata->username}}</td>
                <td>{{$ship->created_at}}</td>

                <td>
            @if ($ship->usernameapprove)
                {{ $ship->usernameapprove->username }}
            @else
                N/A
            @endif
        </td>
            <td>{{$ship->approve_reject_date}}</td>
                @php
                $i++
                @endphp
            </tr>
            @endforeach

        </tbody>
    </table>
    @if($labelPermission['create'])
     <div style="padding:2%;">
            <a class="btn btn-primary" style="float:right;margin-right:10px; color:#fff !important"
                href="/labeldesign">Create new label</a>
    </div>
    @endif
    @else
    <div class="col-md-12 ">
        <!-- <div class="form-row"> -->
        <!-- <h3 class="headingfont-bold" style="padding:5px">Label Master</h3> -->



        <table id="approvedcard_table" class="table table-md table-bordered">
            <thead class="nonheadingfont-bold tablehead">
                <tr>
                    <th>S.No</th>
                    <th class="centerAlign">Label name</th>
                    <!-- <th class="centerAlign">Product Type</th>
                    <th class="centerAlign">Label type</th> -->
                    <th class="centerAlign">Size (mm)</th>
                    <th class="centerAlign">Created by</th>
                    <th class="centerAlign">Created date</th>



                </tr>
            </thead>

            <tbody>
                @php($i=1)
                @foreach($labelCreate as $ship)
                <tr class="nonheadingfont">
                    <td>{{$i}}</td>
                    <td style="min-width:130px !important;max-width:130px !important;"><a
                            href="labeledit/{{$ship->id}}">{{$ship->label_name}}</a></td>

                    <!-- <td>Product Type</td>
                    <td>label Type</td> -->


                    <td>{{$ship->label_height}} mm x {{$ship->label_width}} mm</td>
                    <td>{{$ship->usernamedata->username}}</td>
                    <td>{{$ship->created_at}}</td>

                </tr>
                @php($i++)
                @endforeach
            </tbody>
        </table>


        <br>
        @if($labelPermission['create'])
        <div style="padding:2%;">
            <a class="btn btn-primary" style="float:right;margin-right:10px; color:#fff !important"
                href="/labeldesign">Create new label</a>
        </div>
        @endif
    </div>
@endif
    <script>
    $(document).ready(function() {
        $("#printapplication").html("Print Application - Label Master");
        $(".alert").fadeOut(2000);
        $('#approvedcard_table').DataTable();
        $('#approve').DataTable();
    $("#approve").show();
    $('#approve_inactive').hide();
    $(".titletable").hide();
    $("#requested").hide();
    $("#rejected").hide();
    $('.card').css('opacity', '50%');
    $('#approvedcard').css('opacity', '100%');
    // changing the color of the cue card ui /ux by navin enhancement 12/5/23
    $('#rej,#rejcount,#pen,#pencount').css('background-color', '#808080');
    $('#app,#appcount').css('background-color', '#14b56a');
    $('#approvedcard').click(function() {
        var table = $('.table').DataTable();
        table.destroy();
        $('#product_status').show();
        $("#approve").show();
        $('#approve').DataTable();
        $("#requested").hide();
        $("#rejected").hide();
        $(".titletable").hide();
        $('#approve_inactive').hide();
        $('.card').css('opacity', '50%');
        $('#approvedcard').css('opacity', '100%');
        $('#rej,#rejcount,#pen,#pencount').css('background-color', '#808080');
        $('#app,#appcount').css('background-color', '#14b56a');
        $('.dt-buttons').css('margin-bottom', '-12px');
        $('#loading').hide();
        $('#hhh').text('Approved :');
        $("#downloadpdf").show();
    });

    $('#waitingcard').click(function() {
        var table = $('.table').DataTable();
        table.destroy();
        $("#approve").hide();
        $('#approve').hide();
        $('#approve_inactive').hide();
        $('#product_status').hide();
        $("#requested").show();
        $("#rejected").hide();
        $(".titletable").hide();
        $('#waitingcard_title').show();
        $('#requested').DataTable();
        $("#downloadpdf").hide();
        $('.card').css('opacity', '50%');
        $('#waitingcard').css('opacity', '100%');
        $('#rej,#rejcount,#app,#appcount').css('background-color', '#808080');
        $('#pen,#pencount').css('background-color', '#ffbb0a');

    });
    $('#rejectedcard').click(function() {
        var table = $('.table').DataTable();
        table.destroy();
        $('#approve').hide();
        $('#approve_inactive').hide();
        $('#product_status').hide();
        $("#approve").hide();
        $("#requested").hide();
        $("#rejected").show();
        $(".titletable").hide();
        $('#rejectedcard_title').show();
        $('#rejected').DataTable();
        $("#downloadpdf").hide();
        $('.card').css('opacity', '50%');
        $('#rejectedcard').css('opacity', '100%');
        $('#app,#appcount,#pen,#pencount').css('background-color', '#808080');
        $('#rej,#rejcount').css('background-color', '#ca1900');
    });

    });
    </script>



    <style>
    .swal-wide {
        width: 25%;
        font-size: 16px !important;
        color: white;
        text-align: center;
    }
    </style>
@endsection
