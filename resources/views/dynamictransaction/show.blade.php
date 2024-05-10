@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <table id="container_table" class=" table table-md table-bordered tablefix_mtop" style="width:100% !important;">
        <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;">
            <tr>
                <th>S.No</th>
                <th style="min-width:350px;max-width:350px;">Product Name</th>
                <th>No.Of label</th>
                <th>Create Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dynamicData as $key => $data)
            <tr id="{{$data->id}}">
            <td>{{$key+1}}</td>
            <td>{{$data->product_name}}</td>
            <td>{{$data->no_of_label}}</td>
            <td>{{$data->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <div class="pull-right"style="padding:2%">
            <a class="nonheadingfont btn btn-primary"  href="/dynamictransaction" style="color:white !important">
               Generate Print</a> 
        </div>
       
      
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