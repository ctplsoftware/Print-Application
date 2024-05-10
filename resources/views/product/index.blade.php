@extends('layouts.app')
@section('content')
<div class="container-fluid">
<!-- @if(session()->has('mess'))
        <div class="alert alert-success"  id="messageAlert">
            {{ session()->get('mess') }}
        </div>
        @endif -->
        @php
        dump({{session()->get('message')}});
        @endphp
        @if(session()->has('message'))
<input type="hidden" name="" id="message" value="{{session()->get('message')}}">
<script>
$(document).ready(function() {

    if ($('#message').val() == 'Product created successfully') {
        console.log('check');

        Swal.fire({
                        html: 'product created successfully',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User created successfully');

    } 

});
</script>
@endif

    <div id="print">
        <table id="approve" class="nonheadingfont table table-bordered ">
            <thead class="bg-success">
                <tr class="nonheadingfont-bold">
                <th style="min-width:35px;max-width:35px;"class="text-center">S.No</th>
                    <th class="centerAlign">{{$config->product_name}}</th>
                    <th class="centerAlign">{{$config->product_id}}</th>
                    <!-- <th class="centerAlign">Static Field1</th>
                    <th class="centerAlign">Static Field2</th>
                    <th class="centerAlign">Static Field3</th> -->
                    <th class="centerAlign">Created By</th>
                    <th class="centerAlign">Created Date & Time</th>
                    <th style="min-width:80px; max-width:80px;">Action</th>
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
    <div>
        @if($productPermission['create'])
        <div class="pull-right">
            <a class="nonheadingfont btn btn-primary"  href="{{route('productmaster.create')}}" style="color:white !important">
                Create New  Product</a> 
        </div>
        @endif
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
   
    $('#approve').DataTable();
    $("#printapplication").html("Print Application - Product View");
});
</script>


@endsection