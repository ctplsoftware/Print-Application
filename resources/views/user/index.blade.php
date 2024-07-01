@extends('layouts.app')
@section('content')
@if(session()->has('success'))
<input type="hidden" name="" id="message" value="{{session()->get('success')}}">
<script>
$(document).ready(function() {

    if ($('#message').val() == 'Form submitted successfully.') {
        console.log('check');

        Swal.fire({
                        html: 'User created successfully',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User created successfully');

    } else {

        Swal.fire({
                        html: 'User updated successfully',
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>


<div class="container-fluid">
  
    <div id="print">
        <table id="approve" class="nonheadingfont table table-bordered ">
            <thead class="bg-success">
                <tr class="nonheadingfont-bold">
                    <th style="min-width:50px; max-width:50px;" class="centerAlign">S.No</th>
                    <th class="centerAlign">Name</th>
                    <th class="centerAlign">User Name</th>
                    <th class="centerAlign">Email</th>
                    <th class="centerAlign">Role</th>
                    @if (Auth::user()->role_id == 1)

                    <th class="centerAlign">Manufacturing Location</th>
                    @endif
                    <th class="centerAlign">Created date & time</th>
                    <th style="min-width:80px; max-width:80px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)
                <tr class="nonheadingfont">
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{$user->username }} </td>
                    <td>{{ $user->email }}</td>
                    <td>{{$user->roleDetails->name}}</td>
                    @if (Auth::user()->role_id == 1)

                    @php
                    $ctdtunit = DB::table('organization_master')->where('id', $user->unit_id)->first();
                    @endphp            
                    <td>{{ $ctdtunit ? $ctdtunit->location_name : 'N/A' }}</td>
                    @endif
            
                    <td>{{$user->created_at}}</td>
                    
                    <td><a href="/users/{{$user->id}}/edit"><i style="font-size:20px;" class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br>
    <div>
        @if($userPermission['create'])
        <div class="pull-right">
            <a class="nonheadingfont btn btn-primary" href="{{ route('users.create') }}" style="color:white !important">
                Create New  User</a> 
        </div>
        @endif
    </div>
</div>
<script>
$(document).ready(function() {
    console.log('log');
    $(".alert").fadeOut(6000);
    $('#approve').DataTable();
    $("#printapplication").html("Print Application - User Management");
});
</script>


@endsection