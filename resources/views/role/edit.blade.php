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

    {!! Form::open(array('route' => ['roles.update',$role->id],'method'=>'PATCH','autocomplete'=>'off'))
    !!}
    {{ csrf_field() }}


    <div class="row col-md-12" style="margin-left:4%;">


        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
            <h5 style="font-weight:600;">Role Name Old :</h5>
            <div>
                <input id="name_old" type="text" class="form-control" name="name_old" value="{{$role->old_name}}" readonly autofocus>
            </div>
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"style="margin-left:2%;">
            <h5 style="font-weight:600;">Role Name New :</h5>
            <div>
                <input id="name_new" type="text" class="form-control" name="name" value="{{$role->name}}" required autofocus>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-left:3%;margin-top:2%">
            <h5 style="font-weight:600;margin-left:2%;margin-bottom:-1%">Permissions :</h5>
            <div>
                <div class="row">
                    @foreach(['Product', 'Configuration', 'Label', 'Transaction', 'User', 'Role','Report'] as $module)
                    <div style="padding:3%;">
                        <h5 class="card-title">{{ $module }}</h5>
                        @foreach($permission_data->where('module_name', $module) as $data)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $data->id }}"
                                {{ $permission_data_select->contains('permission_id', $data->id) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $data->permission_name }}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <a class="btn btn-secondary float-left" href="/roles/index" style="color:white !important;">
        Back</a>
    <button id="submit" type="submit" class="btn btn-primary float-right">Update</button>
</div>


{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('.alert').fadeOut(2000);
    $("#printapplication").html("PharmTracQR - Role Edit");
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

.form-check-label {
    font-size: 16px !important;
}
</style>
@endsection