@extends('layouts.app')
@section('content')
<div class="container-fluid" style="padding-left:8%;padding-right:9%;">

    <div class="row" style="margin-bottom:3%;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="headingfont-bold"></h2>
            </div>

        </div>
    </div>
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div style="margin-left:13%;">
            <h5 style="font-weight:600;">Role Name :</h5>
            <div>
            <input type="varchar" maxlength="100" name="role" class="form-control" autocomplete="off" required autofocus />
            </div>
        </div>
    </div>
</div>
<h5 style="font-weight:600;margin-left:4%;margin-bottom:-3%;margin-top:2%">Permissions :</h5>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-1"style="padding:5%">
        <h5 class="card-title">Product</h5>
        @foreach($permission_data->where('module_name','Product') as $data)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$data->id}}">
                <label class="form-check-label">{{$data->permission_name}}</label>
            </div>
        @endforeach
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2" style="padding:5%">
        <h5 class="card-title">Configuration</h5>
        @foreach($permission_data->where('module_name','Configuration') as $data)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$data->id}}">
                <label class="form-check-label">{{$data->permission_name}}</label>
            </div>
        @endforeach
    </div>

    <div class="col-xs-12 col-sm-12 col-md-1" style="padding:5%">
        <h5 class="card-title">Label</h5>
        @foreach($permission_data->where('module_name','Label') as $data)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$data->id}}">
                <label class="form-check-label">{{$data->permission_name}}</label>
            </div>
        @endforeach
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2" style="padding:5%">
        <h5 class="card-title">Transaction</h5>
        @foreach($permission_data->where('module_name','Transaction') as $data)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$data->id}}">
                <label class="form-check-label">{{$data->permission_name}}</label>
            </div>
        @endforeach
    </div>

    <div class="col-xs-12 col-sm-12 col-md-1" style="padding:5%">
        <h5 class="card-title">User</h5>
        @foreach($permission_data->where('module_name','User') as $data)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$data->id}}">
                <label class="form-check-label">{{$data->permission_name}}</label>
            </div>
        @endforeach
    </div>

    <div class="col-xs-12 col-sm-12 col-md-1"style="padding:5%">
        <h5 class="card-title">Role</h5>
        @foreach($permission_data->where('module_name','Role') as $data)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$data->id}}">
                <label class="form-check-label">{{$data->permission_name}}</label>
            </div>
        @endforeach
    </div>

    <div class="col-xs-12 col-sm-12 col-md-1"style="padding:5%">
        <h5 class="card-title">Report</h5>
        @foreach($permission_data->where('module_name','Report') as $data)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$data->id}}">
                <label class="form-check-label">{{$data->permission_name}}</label>
            </div>
        @endforeach
    </div>
</div>


</div>


            </div>
        </div>
    </div>
    <div class="container">
        <a class="btn btn-secondary" href="/roles/index" style="color:white  !important"> Back</a>
        <button type="submit" style="float:right;"class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}

    <script>
    $(document).ready(function() {
        $('.alert').fadeOut(2000);
        $("#printapplication").html("PharmTracQR - Role Create");
    });
    </script>
    <style>
    .swal-wide {
        width: 25%;
        font-size: 16px !important;
        color: white;
        text-align: center;
    }

    .form-check-label{
font-size: 16px !important;
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