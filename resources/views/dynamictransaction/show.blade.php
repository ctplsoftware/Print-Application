@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <table id="container_table" class=" table table-md table-bordered tablefix_mtop" style="width:100% !important;">
        <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;">
            <tr>
                <th>S.No</th>
                <th style="min-width:350px;max-width:350px;">Product Name</th>
                <th>No.Of label</th>
                @if (Auth::user()->role_id == 1)
                <th class="centerAlign">Manufacturing Location</th>
                @endif
                <th>Create Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dynamicData as $key => $data)
            <tr id="{{$data->id}}">
            <td>{{$key+1}}</td>
            <td>{{$data->product_name}}</td>
            <td>{{$data->no_of_label}}</td>
            @if (Auth::user()->role_id == 1)
            @php
                    $ctdtunit = DB::table('organization_master')->where('id', $data->unit_id)->first();
                @endphp

                <td>{{ $ctdtunit ? $ctdtunit->location_name : 'N/A' }}</td>
                @endif
            <td>{{$data->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($TransactionPermission['create'])
        <div class="pull-right"style="padding:2%">
            <a class="nonheadingfont btn btn-primary"  href="/dynamictransaction" style="color:white !important">
               Generate Print</a>
        </div>
        @endif


</div>
<script>
$(document).ready(function() {
     //alert timeout
    //  $('#messageAlert').hide();
     setTimeout(function() {
            $('#messageAlert').fadeOut('slow');
        }, 1000);
    console.log('log');

    $('#container_table').DataTable();
    $("#printapplication").html("Print Application - Dynamic Transaction List");
});
</script>
<style>
    body {
    zoom: 80% !important;
}

.form-control {
    border: 1px solid #899097 !important;
}

.form-row {
    padding-bottom: 10px !important;
}

.hideField {
    display: none;
}
/* breaks the large words */
td{
    word-break:break-word;
    }
 select option {
  width: 100px !important; /* Change this value as needed */
  white-space: nowrap; /* Prevent text wrapping */
  overflow: hidden; /* Hide overflow text */
  text-overflow: ellipsis; /* Show ellipsis for overflow text */
}
</style>
@endsection
