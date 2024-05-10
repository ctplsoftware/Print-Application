@extends('layouts.app')
@section('content')

@if(session()->has('success'))
<input type="hidden" name="" id="message" value="{{session()->get('success')}}">
<script>
$(document).ready(function() {

    if ($('#message').val() == 'Product created successfully.') {
        console.log('check');

        Swal.fire({
                        html: 'Product created successfully',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User created successfully');

    } 
    else if ($('#message').val() == 'Product sends approval.') {
        console.log('check');

        Swal.fire({
                        html: ' Product sent for an approval',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User created successfully');

    } 
    else if ($('#message').val() == 'Product approved.') {
        console.log('check');

        Swal.fire({
                        html: 'Product approved.',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User created successfully');

    }
    else if ($('#message').val() == 'Product rejected.') {
        console.log('check');

        Swal.fire({
                        html: 'Product rejected.',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User created successfully');

    }
    else {

        Swal.fire({
                        html: 'Product updated successfully',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                    
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User updated successfully');
    }

});
</script>
@endif
<div class=" col-md-12 row">
    <!-- <label style="float:right">status : <span style="float:right">
           
            <mark style="background-color:#ffff0082">
                Waiting For approval</mark>
          
            <mark style="background-color:#64ff64b3">
                Approved</mark>
          
            <mark style="background-color:#ff1717cf; color:#fff !important;">
                Rejected</mark>
         
        </span>
    </label> -->
</div>
<br>
@if($config->product_approval_flow == "on")
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
<div class="container-fluid" style="padding:2%;">
<table id="approve" class=" table table-md table-bordered tablefix_mtop" style="width:100% !important;">
    <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;">
        <tr>
            <th style="max-width:40px !important;">S.No</th>
            <th class="centerAlign" style=" min-width: 200px !important; max-width: 200px !important;">
                {{$config->product_name}}
            </th>
            <th class="centerAlign" style=" min-width: 150px !important; max-width: 150px !important;">
                {{$config->product_id}}
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
        @foreach($productApprove as $key=>$data)
        <tr class="col-sm-12 tt">
            <td style="min-width:5px;">{{$i}}</td>
            <td style="min-width: 200px !important; max-width: 200px !important;"><a
                    href="/approved/{{$data->id}}">{{$data->product_name}}</a>
            </td>
            <td>{{$data->product_id}}</td>
            <td>{{$data->usernamedata->username}}</td>
            <td>{{$data->created_at}}</td>
            <!-- <td>{{$data->usernamedata->username}}</td> -->
            <td>
            @if ($data->usernameapprove)
                {{ $data->usernameapprove->username }}
            @else
                N/A
            @endif
        </td>
            <td>{{$data->approved_date}}</td>
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
                {{$config->product_name}}
            </th>
            <th class="centerAlign" style=" min-width: 150px !important; max-width: 150px !important;">
                {{$config->product_id}}
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
        @foreach($productRequest as $key=>$data)
        <tr class="col-sm-12 tt">
            <td style="min-width:5px;">{{$i}}</td>
            <td style="min-width: 200px !important; max-width: 200px !important;"><a
                    href="/pendingapproval/{{$data->id}}">{{$data->product_name}}</a>
            </td>
            <td>{{$data->product_id}}</td>
            <td>{{$data->usernamedata->username}}</td>
            <td>{{$data->created_at}}</td>
            <td>
            @if ($data->usernameapprove)
                {{ $data->usernamedata->username }}
            @else
                N/A
            @endif
        </td>
            <td>{{$data->updated_at}}</td>
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
                {{$config->product_name}}
            </th>
            <th class="centerAlign" style=" min-width: 150px !important; max-width: 150px !important;">
                {{$config->product_id}}
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
        @foreach($productReject as $key=>$data)
        <tr class="col-sm-12 tt">
            <td style="min-width:5px;">{{$i}}</td>
            <td style="min-width: 200px !important; max-width: 200px !important;"><a
                    href="/rejectpending/{{$data->id}}">{{$data->product_name}}</a>
            </td>
            <td>{{$data->product_id}}</td>
            <td>{{$data->usernamedata->username}}</td>
            <td>{{$data->created_at}}</td>
            <!-- <td>{{$data->usernamedata->username}}</td> -->
            <td>
            @if ($data->usernameapprove)
                {{ $data->usernameapprove->username }}
            @else
                N/A
            @endif
        </td>
            <td>{{$data->approved_date}}</td>
            @php
            $i++
            @endphp
        </tr>
        @endforeach
    </tbody>
</table>
@else

<div class="container-fluid">
@if(session()->has('mess'))
        <div class="alert alert-success"  id="messageAlert">
            {{ session()->get('mess') }}
        </div>
        @endif
    <div id="print">
        <table id="tabel" class="nonheadingfont table table-bordered ">
            <thead class="bg-success">
                <tr class="nonheadingfont-bold">
                <th style="min-width:25px;max-width:25px;"class="text-center">S.No</th>
                    <th class="centerAlign" style=" min-width: 300px !important; max-width: 300px !important;">{{$config->product_name}}</th>
                    <th class="centerAlign" style=" min-width: 100px !important; max-width: 100px !important;">{{$config->product_id}}</th>
                    <!-- <th class="centerAlign">Static Field1</th>
                    <th class="centerAlign">Static Field2</th>
                    <th class="centerAlign">Static Field3</th> -->
                    <th class="centerAlign">Created By</th>
                    <th class="centerAlign">Created Date & Time</th>
                    <th class="centerAlign">Updated Date & Time</th>
                    <th class="centerAlign">Status</th>
                    <th style="min-width:40px; max-width:40px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="nonheadingfont">
                @php
                $i = 1;
                @endphp
                    @foreach($product_detail as $data)
                    <td>{{$i}}</td>
                    <td>{{ $data->product_name }}</td>
                    <td>{{$data->product_id}} </td>
                    <!-- <td>{{ $data->static_field1 }}</td>
                    <td>{{$data->static_field2}}</td>
                    <td>{{$data->static_field3}}</td> -->
                    <td>{{$data->usernamedata->username}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>{{$data->updated_at}}</td>
                    <td>{{$data->status}}</td>
                    <td><a href="{{route('productmaster.edit', $data->id)}}"><i style="font-size:20px;" class="fa fa-pencil"></i></a>
                    </td>
                    @php
                    $i++
                    @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br>
    <!-- <div>
        @if($productPermission['create'])
        <div class="pull-right">
            <a class="nonheadingfont btn btn-primary"  href="{{route('productmaster.create')}}" style="color:white !important">
                Create New  Product</a> 
        </div>
       
        @endif
    </div> -->
</div>

@endif
@if($productPermission['create'])
<div class="pull-right" style="padding:2%;">
    <a class="nonheadingfont btn btn-primary" href="{{route('productmaster.create')}}" style="color:white !important;">
        Create New Product</a>
</div>
@endif
</div>

<script>
  
$(document).ready(function() {
    $("#printapplication").html("Print Application - Product Master");
    $('#tabel').DataTable();
   console.log('ertfgyu');
console.log($('#tabel').DataTable());
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
     td{
        word-break:break-word;
    }
</style>

@endsection