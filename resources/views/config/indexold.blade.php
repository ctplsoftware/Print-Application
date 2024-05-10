@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

<form action="/configsave" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid" style="padding-left:80px;">
        @if(session()->has('mess'))
        <div class="alert alert-success">
            {{ session()->get('mess') }}
        </div>
        @endif
        <div class="container-fluid">
            <center>
                <div class="headingfont-bold" style="margin-bottom:20px; font-size:24px !important;">Configuration
                    <i class="fa fa-cogs" aria-hidden="true" style="margin-right:3px;color:grey"></i>
                </div>
            </center>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" style="margin-left:0px !important;" data-toggle="tab" href="#tab1">Work
                        Flow</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab2">Field Name</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text" data-toggle="tab" href="#tab3">Security</a>
                </li>

            </ul>

            <br>
            <div class="card p-2 tab-content color" style="border: 1px solid;">


                <div class="col-md-12 p-3 tab-pane fade show active " id="tab1">

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group form-row">
                                <div class="col-md-4">Organization Name</div>
                                <div class="col-md-4"><input type="text" name="organization_name" maxlength="200"
                                        id="organization_name" value="{{$config_data->organization_name}}"
                                        class="form-control form-control-sm" placeholder="Organization Name"
                                        maxlength="500" required>
                                </div>
                            </div>



                            <div class="form-group form-row">
                                <div class="col-md-4">Date Format</div>
                                <div class="col-md-4"><select type="text" id="date_sel"
                                        class="form-control form-control-sm freeze" name="date_format">
                                        @foreach($date_format as $key => $value)
                                        <option value="{{ $value }}"
                                            {{ ( $value == $config_data->date_format) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4" style="padding-top:10px" id="cur_date"><?=date('d-m-Y');?>
                                </div>
                            </div>
                            <div class="form-group form-row">
                                <div class="col-md-4">Container Count</div>
                                <div class="col-md-4 ">
                                    &nbsp;&nbsp;<select type="number" class="form-control-sm freeze" style="width:55px;"
                                        id="count_sel" name="container_count">

                                        @foreach($container_count as $key => $value)
                                        <option value="{{ $value }}"
                                            {{ ( $value == $config_data->container_count) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                        @endforeach

                                    </select>&nbsp;&nbsp;
                                </div>
                                <div class="col-md-4" style="padding-top:10px" id="container_val">100 / 200</div>
                            </div>
                            <div class="form-group form-row">
                                <div class="col-md-4">Decimal Count</div>
                                <div class="col-md-4 "> &nbsp;
                                    <select type="number" style="width:55px;" class="form-control-sm freeze"
                                        id="decimal_sel" name="decimal_count">
                                        @foreach($decimal_length as $key => $value)
                                        <option value="{{ $value }}"
                                            {{ ( $value == $config_data->decimal_count) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4" style="padding-top:10px" id="decimal_val"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 p-3 tab-pane fade" id="tab2">
                    <ul class="nav nav-tabs" id="myTab" style="margin-bottom:20px !important;" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fieldtab active" id="option1-tab" data-bs-toggle="tab"
                                data-bs-target="#option1" type="button" role="tab" aria-controls="option1"
                                aria-selected="true">Product Level</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fieldtab" id="option2-tab" data-bs-toggle="tab"
                                data-bs-target="#option2" type="button" role="tab" aria-controls="option2"
                                aria-selected="false">Batch
                                Level</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fieldtab" id="option3-tab" data-bs-toggle="tab"
                                data-bs-target="#option3" type="button" role="tab" aria-controls="option3"
                                aria-selected="false">Container
                                Level</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fieldtab" id="option4-tab" data-bs-toggle="tab"
                                data-bs-target="#option4" type="button" role="tab" aria-controls="option4"
                                aria-selected="false">Global
                                Level</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fieldtab" id="option5-tab" data-bs-toggle="tab"
                                data-bs-target="#option5" type="button" role="tab" aria-controls="option5"
                                aria-selected="false">Label
                                Level</button>
                        </li>
                    </ul>
                    <div class="tab-content card" id="myTabContent">
                        <div class="tab-pane fade show active" id="option1" role="tabpanel"
                            style="padding-left:3%;max-height: 450px;  overflow-y: scroll; overflow-x: hidden;"
                            aria-labelledby="option1-tab">
                            <br>
                            <span class="nonheadingfont-bold">Predefined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:12%;">User Defined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:26%;">Data Type</span>
                            <span class="nonheadingfont-bold" style="margin-left:13.5%;">Use</span>
                            <span class="nonheadingfont-bold" style="margin-left:8.5%;">Mandatory</span>
                            <div class="form-group" style="margin-top:1.5%;">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Product Name</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="productname"
                                            name="product_name" value="{{$config_data->product_name}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>

                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="p_name_use"
                                                name="p_name_use" disabled
                                                {{$config_data->product_name_use == 'on' ? 'checked' : ''}}
                                                {{$config_data->product_name_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>

                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="p_name_mandatory"
                                                name="p_name_mandatory"
                                                {{$config_data->product_name_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Product ID</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="productid"
                                            name="product_id" value="{{$config_data->product_id}}" required>
                                    </div>
                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Numeric</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">

                                            <input type="checkbox" class="form-check-input" disabled id="p_id_use"
                                                name="p_id_use"
                                                {{$config_data->product_id_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="p_id_mandatory"
                                                name="p_id_mandatory"
                                                {{$config_data->product_id_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static field 1</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="p_static_field_1" value="{{$config_data->p_static_field1}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field1_use"
                                                name="p_field1_use"
                                                {{$config_data->p_field1_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field1_mandatory" name="p_field1_mandatory"
                                                {{$config_data->p_field1_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field1_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Comments</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="comments"
                                            name="comments" value="{{$config_data->comments}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_comments_use"
                                                name="p_comments_use" disabled
                                                {{$config_data->comments_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="p_comments_mandatory"
                                                name="p_comments_mandatory"
                                                {{$config_data->comments_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 2</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="p_static_field_2" value="{{$config_data->p_static_field2}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field2_use"
                                                name="p_field2_use"
                                                {{$config_data->p_field2_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field2_mandatory" name="p_field2_mandatory"
                                                {{$config_data->p_field2_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field2_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 3</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="p_static_field_3" value="{{$config_data->p_static_field3}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field3_use"
                                                name="p_field3_use"
                                                {{$config_data->p_field3_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field3_mandatory" name="p_field3_mandatory"
                                                {{$config_data->p_field3_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field3_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 4</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="p_static_field_4" value="{{$config_data->p_static_field4}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field4_use"
                                                name="p_field4_use"
                                                {{$config_data->p_field4_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field4_mandatory" name="p_field4_mandatory"
                                                {{$config_data->p_field4_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field4_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 5</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="p_static_field_5" value="{{$config_data->p_static_field5}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field5_use"
                                                name="p_field5_use"
                                                {{$config_data->p_field5_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field5_mandatory" name="p_field5_mandatory"
                                                {{$config_data->p_field5_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field5_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 6</label>
                                    <div class="col-md-4">
                                        <input type="text" class="use form-control form-control-sm" id="product1"
                                            name="p_static_field_6" value="{{$config_data->p_static_field6}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field6_use"
                                                name="p_field6_use"
                                                {{$config_data->p_field6_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field6_mandatory" name="p_field6_mandatory"
                                                {{$config_data->p_field6_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field6_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 7</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="p_static_field_7"
                                            name="p_static_field_7" value="{{$config_data->p_static_field7}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class=" use form-check-input" id="p_field7_use"
                                                name="p_field7_use"
                                                {{$config_data->p_field7_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field7_mandatory" name="p_field7_mandatory"
                                                {{$config_data->p_field7_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field7_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 8</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="p_static_field_8" value="{{$config_data->p_static_field8}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field8_use"
                                                name="p_field8_use"
                                                {{$config_data->p_field8_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field8_mandatory" name="p_field8_mandatory"
                                                {{$config_data->p_field8_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field8_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 9</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="p_static_field_9"
                                            name="p_static_field_9" value="{{$config_data->p_static_field9}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field9_use"
                                                name="p_field9_use"
                                                {{$config_data->p_field9_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field9_mandatory" name="p_field9_mandatory"
                                                {{$config_data->p_field9_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field9_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 10</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="p_static_field_10" value="{{$config_data->p_static_field10}}"
                                            required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_field10_use"
                                                name="p_field10_use"
                                                {{$config_data->p_field10_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_field10_mandatory" name="p_field10_mandatory"
                                                {{$config_data->p_field10_mandatory == 'on' ? 'checked' : ''}}
                                                {{$config_data->p_field10_use == 'on' ? '' : 'disabled' }}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Product Image1</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="p_image_field1" value="{{$config_data->p_image_field1}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_image1_use"
                                                name="p_image1_use"
                                                {{$config_data->p_image1_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_image1_mandatory" name="p_image1_mandatory"
                                                {{$config_data->p_image1_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Product Image2</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="p_image_field2"
                                            name="p_image_field2" value="{{$config_data->p_image_field2}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="p_image2_use"
                                                name="p_image2_use"
                                                {{$config_data->p_image2_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="p_image2_mandatory" name="p_image2_mandatory"
                                                {{$config_data->p_image2_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="option2" role="tabpanel" aria-labelledby="option2-tab"
                            style="padding-left:3%;max-height: 450px;  overflow-y: scroll; overflow-x: hidden;">
                            <br>
                            <span class="nonheadingfont-bold">Predefined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:12%;">User Defined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:26%;">Data Type</span>
                            <span class="nonheadingfont-bold" style="margin-left:13.5%;">Use</span>
                            <span class="nonheadingfont-bold" style="margin-left:8.5%;">Mandatory</span>
                            <div class="form-group">
                                <div class="row" style="margin-top:1.5%;">
                                    <label for="product1" class="col-md-2 col-form-label">Batch #</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="batch_number" value="{{$config_data->batch_number}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Numeric</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="batch_use" disabled
                                                name="batch_use" {{$config_data->batch_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="batch_mandatory"
                                                {{$config_data->batch_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">No.of.containers</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="no_of_container" value="{{$config_data->no_of_container}}" required>
                                    </div>
                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Numeric</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="no_of_container_use"
                                                name="no_of_container_use" disabled
                                                {{$config_data->no_of_container_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="no_of_container_mandatory"
                                                {{$config_data->no_of_container_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Date of Manufacturing </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="date_of_manufacturing" value="{{$config_data->date_of_manufacturing}}"
                                            required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Date</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input"
                                                id="date_of_manufacturing_use" name="date_of_manufacturing_use" disabled
                                                {{$config_data->date_of_manufacturing_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="date_of_manufacturing_mandatory"
                                                {{$config_data->date_of_manufacturing_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Date of Expiry</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="date_of_expiry" value="{{$config_data->date_of_expiry}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Date</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="date_of_expiry_use"
                                                name="date_of_expiry_use" disabled
                                                {{$config_data->date_of_expiry_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="date_of_expiry_mandatory"
                                                {{$config_data->date_of_expiry_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Date of Retest</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="date_of_retest" value="{{$config_data->date_of_retest}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Date</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="date_of_retest_use"
                                                name="date_of_retest_use" disabled
                                                {{$config_data->date_of_retest_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="date_of_retest_mandatory"
                                                {{$config_data->date_of_retest_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 1</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="b_static_field1" value="{{$config_data->b_static_field1}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="b_field1_use"
                                                name="b_field1_use"
                                                {{$config_data->b_field1_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="b_field1_mandatory" name="b_field1_mandatory"
                                                {{$config_data->b_field1_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 2</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="b_static_field2" value="{{$config_data->b_static_field2}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="b_field2_use"
                                                name="b_field2_use"
                                                {{$config_data->b_field2_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="b_field2_mandatory" name="b_field2_mandatory"
                                                {{$config_data->b_field2_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 3</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="b_static_field3" value="{{$config_data->b_static_field3}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="b_field3_use"
                                                name="b_field3_use"
                                                {{$config_data->b_field3_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="b_field3_mandatory" name="b_field3_mandatory"
                                                {{$config_data->b_field3_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 4</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="b_static_field4" value="{{$config_data->b_static_field4}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="b_field4_use"
                                                name="b_field4_use"
                                                {{$config_data->b_field4_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="b_field4_mandatory" name="b_field4_mandatory"
                                                {{$config_data->b_field4_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Static Field 5</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="b_static_field5" value="{{$config_data->b_static_field5}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="b_field5_use"
                                                name="b_field5_use"
                                                {{$config_data->b_field5_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="b_field5_mandatory" name="b_field5_mandatory"
                                                {{$config_data->b_field5_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="option3" role="tabpanel" aria-labelledby="option3-tab"
                            style="padding-left:3%;max-height: 450px;  overflow-y: scroll; overflow-x: hidden;">
                            <br>
                            <span class="nonheadingfont-bold">Predefined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:12%;">User Defined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:26%;">Data Type</span>
                            <span class="nonheadingfont-bold" style="margin-left:13.5%;">Use</span>
                            <span class="nonheadingfont-bold" style="margin-left:8.5%;">Mandatory</span>
                            <div class="form-group">
                                <div class="row" style="margin-top:1.5%;">
                                    <label for="product1" class="col-md-2 col-form-label">Container #</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="container_no" value="{{$config_data->container_no}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="container_use"
                                                name="container_use" disabled
                                                {{$config_data->container_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="container_mandatory"
                                                {{$config_data->container_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Dynamic Field 1</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="dynamic_field1" value="{{$config_data->dynamic_field1}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="d_field1_use"
                                                name="d_field1_use"
                                                {{$config_data->d_field1_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="d_field1_mandatory" name="d_field1_mandatory"
                                                {{$config_data->d_field1_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Dynamic Field 2</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="dynamic_field2" value="{{$config_data->dynamic_field2}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="d_field2_use"
                                                name="d_field2_use"
                                                {{$config_data->d_field2_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="d_field2_mandatory" name="d_field2_mandatory"
                                                {{$config_data->d_field2_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Net weight</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="net_weight" value="{{$config_data->net_weight}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="net_weight_use"
                                                name="net_weight_use" disabled
                                                {{$config_data->net_weight_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="net_weight_mandatory"
                                                {{$config_data->net_weight_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Tare weight</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="tare_weight" value="{{$config_data->tare_weight}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="tare_weight_use"
                                                name="tare_weight_use" disabled
                                                {{$config_data->tare_weight_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="tare_weight_mandatory"
                                                {{$config_data->tare_weight_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Gross weight</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="gross_weight" value="{{$config_data->gross_weight}}" required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="form-check-input" id="gross_weight_use"
                                                name="gross_weight_use" disabled
                                                {{$config_data->gross_weight_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mandatoryCheckbox1"
                                                name="gross_weight_mandatory"
                                                {{$config_data->gross_weight_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="option4" role="tabpanel" aria-labelledby="option4-tab"
                            style="padding-left:3%;">
                            <br>
                            <span class="nonheadingfont-bold">Predefined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:12%;">User Defined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:26%;">Data Type</span>
                            <span class="nonheadingfont-bold" style="margin-left:13.5%;">Use</span>
                            <span class="nonheadingfont-bold" style="margin-left:8.5%;">Mandatory</span>
                            <div class="form-group">
                                <div class="row" style="margin-top:1.5%;">
                                    <label for="product1" class="col-md-2 col-form-label">Global Static Field 1</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="global_static_field1" value="{{$config_data->global_static_field1}}"
                                            required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="g_field1_use"
                                                name="g_field1_use"
                                                {{$config_data->g_field1_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="g_field1_mandatory" name="g_field1_mandatory"
                                                {{$config_data->g_field1_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Global Static Field 2</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="global_static_field2" value="{{$config_data->global_static_field2}}"
                                            required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="g_field2_use"
                                                name="g_field2_use"
                                                {{$config_data->g_field2_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="g_field2_mandatory" name="g_field2_mandatory"
                                                {{$config_data->g_field2_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Global image1</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="global_image1"
                                            name="global_image1" value="{{$config_data->global_image1}}" required>
                                    </div>

                                    <!-- <input type="file" class="col-md-2 input-group-prepend" name="g1_image" id="image"
                                    style="width:13.5%; margin-left:3.2%;height:25px;font-size:12px;border:1px solid #ccc;"> -->
                                    <!-- <input type="file" class="col-md-1 input-group-prepend file" id="image1"
                                        name="g1_image" value="{{asset('images/no-image.png')}}"><br>
                                    <img id="thumbnail-image1" src="{{ asset('images/no-image.png')}}" alt=""
                                        style="width:100px;height:100px" /> -->
                                 <div class="col-md-2">
                                    @if($config_data->g1_image == "null")
                                    <input type="file" class="   file" id="g1_image" name="g1_image">
                                    <input type="text" hidden class=" input-group-prepend file" id="file1"
                                        name="image1" value="{{ asset('images/no-image.png')  }}">
                                    <img id="thumbnail-detail" src="{{ asset('images/no-image.png') }}" alt=""
                                        style="width:100px;height:100px">
                                    @else
                                    <input type="file" class=" file" id="g1_image" name="g1_image">
                                    <input type="text" hidden class=" input-group-prepend file" id="file1"
                                        name="image1" value="{{ $config_data->image ? $config_data->image : '' }}">&nbsp <br>
                                    <img id="thumbnail-image" src="{{ asset('storage/'.$config_data->g1_image) }}"
                                        alt="Image " style="width:100px;height:100px" />
                                    @endif
                                    </div>

                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="g_image1_use"
                                                name="g_image1_use" onchange="toggleImage1(this)"
                                                {{$config_data->g_image1_use == 'on' ? 'checked' : ''}}  >
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="g_image1_mandatory" name="g_image1_mandatory"
                                                {{$config_data->g_image1_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Global image2</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="global_image2" value="{{$config_data->global_image2}}" required>
                                    </div>

                                  <div class="col-md-2">
                                    @if($config_data->g2_image == "null")
                                    <input type="file" class="  file" id="file" name="g2_image">
                                    <input type="text" hidden class=" input-group-prepend file" id="file2"
                                        name="image2" value="{{ asset('images/no-image.png')  }}">
                                    <img id="thumbnail-detail" src="{{ asset('images/no-image.png') }}" alt=""
                                        style="width:100px;height:100px">
                                    @else
                                    <input type="file" class="  file" id="file" name="g2_image">
                                    <input type="text" hidden class=" input-group-prepend file" id="file2"
                                        name="image2" value="{{ $config_data->g2_image ? $config_data->image : '' }}">&nbsp <br>
                                    <img id="thumbnail-image" src="{{ asset('storage/'.$config_data->g2_image) }}"
                                        alt="Image " style="width:100px;height:100px" />
                                    @endif
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="g_image2_use"
                                                name="g_image2_use"
                                                {{$config_data->g_image2_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="g_image2_mandatory" name="g_image2_mandatory"
                                                {{$config_data->g_image2_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="option5" role="tabpanel" aria-labelledby="option5-tab"
                            style="padding-left:3%;">
                            <br>
                            <span class="nonheadingfont-bold">Predefined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:12%;">User Defined Name</span>
                            <span class="nonheadingfont-bold" style="margin-left:26%;">Data Type</span>
                            <span class="nonheadingfont-bold" style="margin-left:13.5%;">Use</span>
                            <span class="nonheadingfont-bold" style="margin-left:8.5%;">Mandatory</span>
                            <div class="form-group">
                                <div class="row" style="margin-top:1.5%;">
                                    <label for="product1" class="col-md-2 col-form-label">Label Static Field 1</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="label_static_field1" value="{{$config_data->label_static_field1}}"
                                            required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="l_field1_use"
                                                name="l_field1_use"
                                                {{$config_data->l_field1_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="l_field1_mandatory" name="l_field1_mandatory"
                                                {{$config_data->l_field1_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="product1" class="col-md-2 col-form-label">Label Static Field 2</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="product1"
                                            name="label_static_field2" value="{{$config_data->label_static_field2}}"
                                            required>
                                    </div>

                                    <label class="col-md-2 input-group-prepend" for="dataType1"
                                        style="height:0.6%;padding-left:6%;">
                                        <span class="input-group-text">Alpha</span>
                                    </label>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check" style="margin-left:37%;">
                                            <input type="checkbox" class="use form-check-input" id="l_field2_use"
                                                name="l_field2_use"
                                                {{$config_data->l_field2_use == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="useCheckbox1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:0.5%;">
                                        <div class="form-check">
                                            <input type="checkbox" class="mandatory form-check-input"
                                                id="l_field2_mandatory" name="l_field2_mandatory"
                                                {{$config_data->l_field2_mandatory == 'on' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:1.5%;">
                                    <div class="row">
                                        <label for="product1" class="col-md-2 col-form-label">Image 1</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control form-control-sm" id="product1"
                                                name="image1" value="{{$config_data->image1}}" required>
                                        </div>

                                        <label class="col-md-2 input-group-prepend" for="dataType1"
                                            style="height:0.6%;padding-left:6%;">
                                            <span class="input-group-text">Alpha</span>
                                        </label>
                                        <div class="col-md-2" style="margin-top:0.5%;">
                                            <div class="form-check" style="margin-left:37%;">
                                                <input type="checkbox" class="use form-check-input" id="image1_use"
                                                    name="image1_use"
                                                    {{$config_data->image1_use == 'on' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="useCheckbox1"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top:0.5%;">
                                            <div class="form-check">
                                                <input type="checkbox" class="mandatory form-check-input"
                                                    id="image1_mandatory" name="image1_mandatory"
                                                    {{$config_data->image1_mandatory == 'on' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="product1" class="col-md-2 col-form-label">Image 2</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control form-control-sm" id="product1"
                                                name="image2" value="{{$config_data->image2}}" required>
                                        </div>

                                        <label class="col-md-2 input-group-prepend" for="dataType1"
                                            style="height:0.6%;padding-left:6%;">
                                            <span class="input-group-text">Alpha</span>
                                        </label>
                                        <div class="col-md-2" style="margin-top:0.5%;">
                                            <div class="form-check" style="margin-left:37%;">
                                                <input type="checkbox" class="use form-check-input" id="image2_use"
                                                    name="image2_use"
                                                    {{$config_data->image2_use == 'on' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="useCheckbox1"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top:0.5%;">
                                            <div class="form-check">
                                                <input type="checkbox" class="mandatory form-check-input"
                                                    id="image2_mandatory" name="image2_mandatory"
                                                    {{$config_data->image2_mandatory == 'on' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="mandatoryCheckbox1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class=" p-2 tab-pane fade" id="tab3">




                    <div class="col-md-12 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-row ">
                                    <div class="col-md-8">Minimum password length (characters)</div>
                                    <div class="col-sm-4 form-control-sm"><select type="text"
                                            style="height: 35px; width: 70px;" name="pwd_length" name="password_length">
                                            @for($i=6;$i<=12;$i++) <option value="{{$i}}"
                                                {{ ($i == $config_data->pwd_length) ? 'selected' : '' }}>{{$i}}
                                                </option>
                                                @endfor

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-md-8">Password validity (# of days)</div>
                                    <div class="col-sm-4 form-control-sm"><select type="text"
                                            style="height: 35px; width: 70px;" name="pwd_validity" class="permission"
                                            name="password_validity">
                                            @for($i=15;$i<=360;$i++) <option value="{{$i}}"
                                                {{ ( $i == $config_data->pwd_validity) ? 'selected' : '' }}>{{$i}}
                                                </option>
                                                <!-- <option value="{{$i}}">{{$i}}</option> -->
                                                @php($i = $i + 14)
                                                @endfor


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-md-8"># of failed attempts before locking</div>
                                    <div class="col-sm-4 form-control-sm"><select type="text"
                                            style="height: 35px; width: 70px;" style="width:75px" name="failed_attempt"
                                            class="permission">
                                            @for($i=1;$i<=5;$i++) <option value="{{$i}}"
                                                {{ ( $i == $config_data->failed_attempt) ? 'selected' : '' }}>
                                                {{$i}}
                                                </option>
                                                <!-- <option value="{{$i}}">{{$i}}</option> -->
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-md-8 ">Idle logout time (in minutes)</div>
                                    <div class="col-sm-4 form-control-sm"><select type="text"
                                            style="height: 35px; width: 70px;" name="logout_time" class="permission"
                                            name="logout_time">
                                            <option {{$config_data->logout_time == 5 ? 'selected' : ''}} value="5">
                                                5</option>
                                            <option {{$config_data->logout_time == 10 ? 'selected' : ''}} value="10">10
                                            </option>
                                            <option {{$config_data->logout_time == 15 ? 'selected' : ''}} value="15">15
                                            </option>
                                            <option {{$config_data->logout_time == 20 ? 'selected' : ''}} value="20">20
                                            </option>
                                            <option {{$config_data->logout_time == 30 ? 'selected' : ''}} value="30">30
                                            </option>
                                            <option {{$config_data->logout_time == 40 ? 'selected' : ''}} value="40">40
                                            </option>
                                            <option {{$config_data->logout_time == 50 ? 'selected' : ''}} value="50">50
                                            </option>
                                            <option {{$config_data->logout_time == 60 ? 'selected' : ''}} value="60">60
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div style=" margin-top:15px;">
                    <a href="/dashboard" style="color:#fff !important;margin-left:30px; margin-bottom:15px;"
                        class="btn btn-secondary">Back</a>
                    @if($configPermission['update'])

                    <button id="save" type="submit"
                        style="font-weight:600;float:right;margin-right:80px; color:#fff; background-color: #2a5d78 !important;width: 200px !important;height:37px !important;"
                        class="btn ">Update</button>
                    @endif
                </div>
            </div>

        </div>
    </div>


</form>
<script>

</script>
<style>
.btn-light {
    background-color: #d3d9df !important;
}

.toggle-handle {
    background-color: #fff !important;
}
</style>

<script>

    
$(document).ready(function() {

    // JavaScript to handle image upload and preview
    $('.file').change(function() {
        const inputId = $(this).attr('id');
        const thumbnailId = `thumbnail-${inputId}`; // Generate unique thumbnail ID based on input ID
        const file = this.files[0];
        const allowedExtensions = ['jpeg', 'jpg', 'png'];
        const maxFileSize = 1024 * 1024; // 1MB

        if (file) {
            const fileNameParts = file.name.split('.');
            const fileExtension = fileNameParts[fileNameParts.length - 1].toLowerCase();

            if (file.size > maxFileSize) {
                alertWarning('File size exceeds 1MB limit.');
                $(this).val('');
                $(`#${thumbnailId}`).attr('src', '{{ asset('images/no-image.png ')}}'); // Reset to the dummy image
            } else if (!allowedExtensions.includes(fileExtension)) {
                alertWarning('Unsupported file format. Only JPG, JPEG, and PNG are allowed.');
                $(this).val('');
                $(`#${thumbnailId}`).attr('src', '{{ asset('images/no-image.png ')}}'); // Reset to the dummy image
            } else {
                const reader = new FileReader();
                reader.onload = function() {
                    $(`#${thumbnailId}`).attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            }
        } else {
            // Reset to the dummy image if no file is selected
            $(`#${thumbnailId}`).attr('src', '{{ asset(' images/no-image.png ')}}');
        }
    });

    $('.alert').fadeOut(5000);

    //Product
    $('#p_name_use').attr('checked', true);
    $('#p_id_use').attr('checked', true);
    $('#p_comments_use').attr('checked', true);
    //batch
    $('#batch_use').attr('checked', true);
    $('#no_of_container_use').attr('checked', true);
    $('#date_of_manufacturing_use').attr('checked', true);
    $('#date_of_expiry_use').attr('checked', true);
    $('#date_of_retest_use').attr('checked', true);
    //container
    $('#container_use').attr('checked', true);
    $('#net_weight_use').attr('checked', true);
    $('#tare_weight_use').attr('checked', true);
    $('#gross_weight_use').attr('checked', true);

    if ($('#decimal_sel').val() == '2') {
        $('#decimal_val').text("999.99");
    } else if ($('#decimal_sel').val() == '3') {
        $('#decimal_val').text("999.999");
    } else if ($('#decimal_sel').val() == '1') {
        $('#decimal_val').text("999.9");
    }


    // Disable mandatory fields on load
    // $('.mandatory').prop('disabled', d);

    // Enable/disable mandatory fields based on "use" checkbox state
    $('#p_field1_use, #p_field2_use, #p_field3_use, #p_field4_use, #p_field5_use, #p_field6_use, #p_field7_use, #p_field8_use, #p_field9_use, #p_field10_use,#p_image1_use,#p_image2_use, #b_field1_use, #b_field2_use, #b_field3_use, #b_field4_use, #b_field5_use, #d_field1_use, #d_field2_use, #g_field1_use, #g_field2_use,#g_image1_use,#g_image2_use,#l_field1_use,#l_field2_use,#image1_use,#image2_use')
        .change(function() {
            var fields = ['p_field1', 'p_field2', 'p_field3', 'p_field4', 'p_field5', 'p_field6',
                'p_field7', 'p_field8', 'p_field9', 'p_field10', 'b_field1', 'b_field2', 'b_field3',
                'b_field4', 'b_field5', 'd_field1', 'd_field2', 'g_field1', 'g_field2', 'l_field1',
                'l_field2', 'image1', 'image2', 'p_image1', 'p_image2', 'g_image1', 'g_image2',
            ];
            // console.log(fields);
            fields.forEach(function(field) {
                // console.log(fields);
                var checkbox = $('#' + field + '_use');
                var input = $('#' + field + '_mandatory');
                console.log(checkbox, input);
                if (checkbox.is(':checked')) {
                    input.prop('disabled', false);
                } else {
                    input.prop('disabled', true);
                    input.prop('checked', false);
                }
            });
        });


    var ddate = new Date();
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const d = new Date();

    if ($('#date_sel').val() == 'DD-MM-YYYY') {
        $("#cur_date").text(("0" + ddate.getDate()).slice(-2) + '-' + ("0" + (ddate.getMonth() + 1)).slice(-2) +
            '-' + ddate.getFullYear());
    } else if ($('#date_sel').val() == 'YYYY-MM-DD') {
        $("#cur_date").text(ddate.getFullYear() + '-' + ("0" + (ddate.getMonth() + 1)).slice(-2) + '-' + ("0" +
            ddate.getDate()).slice(-2));
    } else {
        $("#cur_date").text(months[parseInt(ddate.getMonth())] + '-' + ddate.getFullYear());
    }




    $("#date_sel").on("change", function() {
        console.log('date');
        var ddate = new Date();
        console.log(ddate);
        const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
            "Dec"
        ];
        // const d = new Date();
        if ($('#date_sel').val() == 'DD-MM-YYYY') {
            $("#cur_date").text(("0" + ddate.getDate()).slice(-2) + '-' + ("0" + (ddate.getMonth() + 1))
                .slice(-2) +
                '-' + ddate.getFullYear());
        } else if ($('#date_sel').val() == 'YYYY-MM-DD') {
            $("#cur_date").text(ddate.getFullYear() + '-' + ("0" + (ddate.getMonth() + 1)).slice(-2) +
                '-' + ("0" +
                    ddate.getDate()).slice(-2));
        } else {
            $("#cur_date").text(months[parseInt(ddate.getMonth())] + '-' + ddate.getFullYear());
        }
    });
    $("#count_sel").on("change", function() {
        if ($(this).val() == '/') {
            $('#container_val').text("100 / 200");
        } else if ($(this).val() == 'of') {
            $('#container_val').text("100 of 200");
        }
    });
    $("#decimal_sel").change(function() {
        console.log('testttt');
        if ($('#decimal_sel').val() == '2') {
            $('#decimal_val').text("999.99");
        } else if ($('#decimal_sel').val() == '3') {
            $('#decimal_val').text("999.999");
        } else if ($('#decimal_sel').val() == '1') {
            $('#decimal_val').text("999.9");
        }
    });
   

    // $('#save').click(function() {
    //     // console.log('fewf');
    //     alert('Updated Sucessfully');
    // });
    // Automatically fade out the message after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        $('#messageAlert').fadeOut('slow');
    }, 1000);
});
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    // Your code here
});

// function toggleImage1(checkbox) {
//     const imageInput = document.getElementById('g1_image');
//     console.log(imageInput);
//     const thumbnailImage = document.getElementById('thumbnail-image1');

//     if (checkbox.checked) {
//         // Checkbox is checked, show the image input and image
//         imageInput.style.display = 'block';
//         thumbnailImage.style.display = 'block';
//     } else {
//         // Checkbox is unchecked, hide the image input and image, and reset the file input
//         imageInput.style.display = 'none';
//         thumbnailImage.style.display = 'none';
//         imageInput.value = ''; // Reset the file input
//     }
//     }
</script>
<style>
.swal-wide {
    width: 30%;
    font-size: 18px !important;
    color: white;
    text-align: center;

}

.validation {
    font-size: 22px;
    color: white;
}


.btn-primary {
    background-color: #2a5d78 !important;
    width: 60px !important;
    height: 33px !important;
    border-radius: 10px !important;

}

.toggle-on {
    position: absolute;
    top: 6px;
    bottom: 0;
    left: 3px;
    right: 50%;
    margin: 0;
    border: 0;

}

.toggle-off {
    position: absolute;
    top: 7px;
    bottom: 0;
    left: 50%;
    right: 0;
    margin: 0;
    border: 0;
    border-radius: 0;
    box-shadow: none;

}

.nav-link {
    /* background-color: white; */
    border: none;
    border-bottom: 2px solid #2a5d78 !important;

    /* color: #454443; */
    font-size: 16px;
    font-weight: bold;
    margin-left: 5px;


    margin-bottom: -2px;
    transition: border-bottom 0.3s;
    border: var(--bs-nav-tabs-border-width) solid #005e8159;
}



.nav-tabs .nav-link.active {
    background-color: #2a5d78;
    color: #fff !important;
    /* border-radius: 10px; */
}

.nav-tabs {
    border-bottom: 1px solid #94999e;
    border-radius: 10px;
}

body {
    zoom: 80% !important;
}

/* this body and navbar zoom is did for allignment bug issue purpose ,trust it does not affect any functionality in this page */
/* dev by navin on 28/6/23 */

.navbar {
    zoom: 100% !important;
}

.input-group-text {
    width: 100%;
    background-color: #fff;
}

.fieldtab {
    border: 2px solid #dee2e6 !important;

}

.form-check-input {
    font-size: 20px;
    margin-top: -2px;
    margin-left: 5% !important;
}

a.nav-link {
    color: #000 !important;
}

.nav-link {
    color: #000 !important;
}
</style>


@endsection