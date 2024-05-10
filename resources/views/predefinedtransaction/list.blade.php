@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <table id="container_table" class=" table table-md table-bordered tablefix_mtop" style="width:100% !important;">
        <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;">
            <tr>
                <th style="min-width:25px !important; max-width:25px !important;">S.No</th>
                <th style=" min-width: 320px !important; max-width: 320px !important;">{{$config->product_name}}</th>
                <th>Product Type</th>
                <th>Label Type</th>
                <th>{{$config->batch_number}}</th>
                @if($config->no_of_container_use == "on")
                <th>{{$config->no_of_container}}</th>
                @else
                <th>{{$config->print_count}}</th>
                @endif
                <th>Create Date</th>

            </tr>
        </thead>
        <tbody>
            @foreach($list as $key => $data)
            <tr id="{{$data->id}}">
            <td>{{$key+1}}</td>
            <td><a href="/reprint/{{$data->id}}" style="color:#c56363 !important">{{$data->product_name}}</a></td>
            <td>{{$data->product_type}}</td>
            <td>{{$data->label_type}}</td>
            <td>{{$data->batch_number}}</td>
            <td class="{{ $config->no_of_container_use == 'on' ? 'no-of-container-class' : 'print-count-class' }}">
                    {{$config->no_of_container_use == 'on' ? $data->no_of_container : $data->print_count}}
                </td>
            <td>{{$data->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($TransactionPermission['create'])
        <div class="pull-right" style="padding:2%">
            <a class="nonheadingfont btn btn-primary"  href="/predefinedtransaction" style="color:white !important">
               Generate Print</a>
        </div>
        @endif

        <!-- <a class="nonheadingfont btn btn-primary"  href="/tranasctionbulkuploadview" style="color:white !important">
              Bulk Upload</a>  -->

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
    $("#printapplication").html("Print Application - Predefined Transaction List");
});
</script>
<style>

td{
        word-break:break-word;
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
</style>
@endsection
