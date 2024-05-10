@extends('layouts.app')
@section('content')
@if(session()->has('success'))
<input type="hidden" name="" id="message" value="{{session()->get('success')}}">
<script>
$(document).ready(function() {

    if ($('#message').val() == 'Form submitted successfully.') {
        console.log('check');
        alertSuccess('User created successfully');

    } else {
        alertSuccess('User updated successfully');
    }

});
</script>
@endif
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>


<div class="container-fluid">
  
    <div id="print">
        <table id="approve" class="nonheadingfont table table-bordered ">
            <thead class="bg-success">
                <tr class="nonheadingfont-bold">
                    <th style="min-width:50px; max-width:50px;" class="centerAlign">S.No</th>
                    <th class="centerAlign">Role Name</th>
                    <th class="centerAlign">Created date & time</th>
                    <th style="min-width:80px; max-width:80px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $role)
                <tr class="nonheadingfont">
                    <td>{{ ++$i }}</td>
                    <td>{{$role->name }}</td>
                    <td>{{$role->created_at}}</td>
                    <td><a href="/roles/{{$role->id}}/edit"><i style="font-size:20px;" class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br>
    <div>
        <div class="pull-right">
            <a class="nonheadingfont btn btn-primary" href="{{ route('roles.create') }}" style="color:white !important">
                Create New  Role</a> 
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    console.log('log');
    $(".alert").fadeOut(6000);
    $('#approve').DataTable();
    $("#printapplication").html("Print Application - Role Management");
});
</script>


@endsection