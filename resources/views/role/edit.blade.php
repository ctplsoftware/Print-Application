@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <div class="row mb-3 justify-content-center">
        <div class="col-lg-12 text-center">
            <h2 class="headingfont-bold">Edit Role</h2>
        </div>
    </div>

    {!! Form::open(['route' => ['roles.update', $role->id], 'method' => 'PATCH', 'autocomplete' => 'off']) !!}
    {{ csrf_field() }}

    <div class="row mb-3 justify-content-center">
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('name_old') ? ' has-error' : '' }}">
                <label for="name_old" class="font-weight-bold">Current Role Name:</label>
                <input id="name_old" type="text" class="form-control" name="name_old" value="{{ $role->old_name }}" readonly autofocus>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name_new" class="font-weight-bold">New Role Name:</label>
                <input id="name_new" type="text" class="form-control" name="name" value="{{ $role->name }}" required autofocus>
            </div>
        </div>
    </div>

    <div class="row mb-4 justify-content-center">
        <div class="col-lg-10">
            <h5 class="font-weight-bold mb-3 text-center">Permissions:</h5>
            <div class="row">
                @foreach(['Configuration', 'Product', 'Label', 'Transaction', 'User', 'Role', 'Report'] as $module)
                <div class="col-md-6 mb-4 module-section p-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="font-weight-bold text-center">{{ $module }}</h6>
                            <div class="form-check-list">
                                @foreach($permission_data->where('module_name', $module) as $data)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="permission-{{ $data->id }}" name="permissions[]" value="{{ $data->id }}" {{ $permission_data_select->contains('permission_id', $data->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="permission-{{ $data->id }}">{{ $data->permission_name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row mb-3 justify-content-end">
        <div class="col-md-6 d-flex justify-content-end">
            <a class="btn btn-secondary btn-back-custom w-auto mx-2" href="/roles/index">Back</a>
            <button id="submit" type="submit" class="btn btn-primary w-auto">Update</button>
        </div>
    </div>

    {!! Form::close() !!}

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

.form-check-label {
    font-size: 16px !important;
}

.form-check-input {
    margin-top: 5px;
}

.mb-3 {
    margin-bottom: 1.5rem !important;
}

.text-center {
    text-align: center !important;
}

.d-flex {
    display: flex !important;
}

.justify-content-end {
    justify-content: flex-end !important;
}

.w-auto {
    width: auto !important;
}

.module-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f9f9f9;
}

.module-section .card {
    width: 100%;
}

.module-section h6 {
    margin-bottom: 10px;
}

.form-check-list {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.form-check {
    margin-bottom: 5px;
}

.permissions-container {
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f1f1f1;
}
.btn-back-custom {
    color: white !important; /* Change text color */
    background-color: #6c757d !important; /* Change background color if needed */
    border-color: #6c757d !important; /* Change border color if needed */
}
</style>
@endsection
