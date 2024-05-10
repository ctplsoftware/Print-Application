@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <form action="/predefinedtransaction_update" method="POST" enctype='multipart/form-data'
    onsubmit="validateFieldAndSubmit(event)" id="transactionForm">
        @if(isset($success))
        <script>
        $(document).ready(function() {
        Swal.fire({
                            html: 'Updated successfully',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            confirmButtonColor: 'rgb(36 63 161)',

                            background: 'rgb(105 126 157)',
                            customClass: 'swal-wide',
                        })
    });
    </script>
        @endif
        @php
        $centimeters = 100;
        $dpi = 96;

        // $heightInPixels = ($designlabel->Label_Height / 2.54) * $dpi;
        // $widthInPixels = ($designlabel->Label_Width / 2.54) * $dpi;
        @endphp
        @csrf
        <div class="container-fluid" style="padding-right:6%;padding-left:6%;">
            <h2 class="headingfont-bold"></h2>
            <div class="card" style="padding:17px; overflow-y: scroll; overflow-x: hidden;max-height:580px">
                <div class="headingfont form-row ">
                    <div class="form-group col-md-3">
                        <label>Label Name</label><span class="required-asterisk" style="color:red">*</span>
                        <select name="label_name" required id="label_name"
                            class="form-control validate required form-control-sm">
                            <option value="" selected disabled>-SELECT-</option>

                            @foreach($labelDesign as $key => $value)
                        <option value="{{$value->id}}"
                            data-labelposition="{{$value->Freefield1_labelposition}}|{{$value->Freefield2_labelposition}}|{{$value->Freefield3_labelposition}}|{{$value->Freefield4_labelposition}}|{{$value->Freefield5_labelposition}}|{{$value->Freefield6_labelposition}}">
                            {{$value->label_name}}</option>
                        @endforeach


                        </select>
                    </div>
                    <div class="form-group col-md-3" style="">
                        <label>Product Type</label><span class="required-asterisk" style="color:red"></span>

                        <input type="text" name="product_type" class=" form-control validate required form-control-sm"
                            id="product_type" readonly>
                    </div>
                    <div class="form-group col-md-3" style="">
                        <label> Label Type</label><span class="required-asterisk" style="color:red"></span>

                        <input type="text" name="label_type" class=" form-control validate required form-control-sm"
                            id="label_type" readonly>
                    </div>
                </div>
            <h6 style="margin-block:0rem !important"><b>Product Details :</b></h6>
            <hr>
            <div class="headingfont form-row ">
                <div class="form-group col-md-3 {{$config['product_name_use'] == 'off' ? '' : 'hideField'}}">
                    <label>{{$config['product_name']}}
                        @if($config['product_name_mandatory'] == 'off')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <select name="product_name" id="product_name" class="form-control validate required form-control-sm"
                        {{$config['product_name_mandatory'] == 'off' ? 'required' : ''}}>
                        <option value="" selected disabled>-SELECT-</option>
                        @foreach($product as $key => $value)
                        <option value="{{$value->product_name}}">{{$value->product_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3 {{$config['product_id_use'] == 'off' ? '' : 'hideField'}}">
                    <label>{{$config['product_id']}}
                        @if($config['product_id_mandatory'] == 'off')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="product_id" id="product_id"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['product_id_mandatory'] == 'off' ? 'required' : ''}} readonly />
                </div>
                <div class="form-group col-md-3 {{$config['p_field1_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field1']}}
                        @if($config['p_field1_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field1" id="p_static_field1"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field1_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field2_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field2']}}
                        @if($config['p_field2_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field2" id="p_static_field2"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field2_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <!-- </div> -->
                <!-- <div class="headingfont form-row "> -->

                <div class="form-group col-md-3 {{$config['p_field3_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field3']}}
                        @if($config['p_field3_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field3" id="p_static_field3"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field3_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>

                <div class="form-group col-md-3 {{$config['p_field4_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field4']}}
                        @if($config['p_field4_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field4" id="p_static_field4"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field4_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field5_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field5']}}
                        @if($config['p_field5_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field5" id="p_static_field5"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field5_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field6_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field6']}}
                        @if($config['p_field6_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field6" id="p_static_field6"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field6_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <!-- </div> -->
                <!-- <div class="headingfont form-row "> -->

                <div class="form-group col-md-3 {{$config['p_field7_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field7']}}
                        @if($config['p_field7_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field7" id="p_static_field7"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field7_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field8_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field8']}}
                        @if($config['p_field8_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field8" id="p_static_field8"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field8_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field9_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field9']}}
                        @if($config['p_field9_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field9" id="p_static_field9"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field9_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field10_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['p_static_field10']}}
                        @if($config['p_field10_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field10" id="p_static_field10"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['p_field10_mandatory'] == 'on' ? 'required' : ''}} readonly />
                </div>
            </div>
            <hr>
            <h6 style="margin-block:0rem !important"><b>Serialization :</b></h6>
            <br>
            <div class="headingfont form-row">
                @if($config['serialization'] == 'user-input' || $config['serialization'] == 'running-serial-no')
                <div class="form-group col-md-3">
                    <label>{{ 'Last Serial No' }}</label>
                    <input type="varchar" maxlength="100" name="last_serialno" id="last_serialno"
                            class="required validate form-control form-control-sm" autocomplete="off" disabled/>
                </div>
                @endif
                 @if($config['serialization'] == 'user-input' || ($config['serialization'] == 'running-serial-no' && $config['product'] == 'on') || ($config['product'] == 'off' && $header === null))
                <div id="prefix" class="form-group col-md-3">
                    <label>{{ 'Prefix' }}</label>
                        <input type="varchar" maxlength="100" name="prefix" id="prefix"
                        class="required validate form-control form-control-sm" autocomplete="off"/>
                </div>
                @endif
                @if($config['serialization'] == 'user-input' || ($config['serialization'] == 'running-serial-no' && $config['product'] == 'on') || ($config['product'] == 'off' && $header === null))
                <div id="suffix" class="form-group col-md-3">
                        <label>{{ 'Suffix' }}</label>
                        <input type="varchar" maxlength="100" name="suffix" id="suffix"
                        class="required validate form-control form-control-sm" autocomplete="off"/>
                </div>
                @endif
                 {{-- @if($config['serialization'] == 'user-input' || ($config['serialization'] == 'running-serial-no' && $config['product'] == 'on') || ($config['product'] == 'off' && $header === null))
                <div class="form-group col-md-3">
                    <label>{{$config['serialno']}}</label>
                        <input type="number" maxlength="100" name="serialno" id="serialno"
                        class="required validate form-control form-control-sm" autocomplete="off"/>
                </div>
                @endif --}}


            </div>


            <hr>
            <h6 style="margin-block:0rem !important"><b>Batch Details :</b></h6>
            <br>
            <div class="headingfont form-row">
                <div class="form-group col-md-3 {{$config['batch_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['batch_number']}}
                        @if($config['batch_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="batch_number" id="batch_number"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['batch_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['date_of_manufacturing_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['date_of_manufacturing']}}
                        @if($config['date_of_manufacturing_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <div class="input-row">
                        <input type="text" maxlength="100" name="date_of_manufacturing" id="date_of_manufacturing"
                            placeholder="{{$config['date_format']}}"
                            class="restrict required validate input-large form-control form-control-sm"
                            autocomplete="off" value=""
                            {{$config['date_of_manufacturing_mandatory'] == 'on' ? 'required' : ''}} />
                        <input type="{{$config['date_format'] == 'MMM-YYYY' ? 'month' : 'date'}}"
                            class=" form-control form-control-sm input-small" onChange="DateChange(this)" />
                    </div>
            </div>
            <div class="form-group col-md-3 {{$config['date_of_expiry_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['date_of_expiry']}}
                        @if($config['date_of_expiry_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <div class="input-row">
                        <input type="text" maxlength="100" name="date_of_expiry" id="date_of_expiry"
                            class="restrict required validate input-large form-control form-control-sm"
                            autocomplete="off" placeholder="{{$config['date_format']}}"
                            {{$config['date_of_expiry_mandatory'] == 'on' ? 'required' : ''}} />
                        <input type="{{$config['date_format'] == 'MMM-YYYY' ? 'month' : 'date'}}"
                            class=" form-control form-control-sm input-small" onChange="DateChange(this)" />
                    </div>
            </div>
                <div class="form-group col-md-3 {{$config['date_of_retest_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['date_of_retest']}}
                        @if($config['date_of_retest_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <div class="input-row">
                        <input type="text" maxlength="100" name="date_of_retest" id="date_of_retest"
                            class="restrict required validate input-large form-control form-control-sm"
                            autocomplete="off" placeholder="{{$config['date_format']}}"
                            {{$config['date_of_retest_mandatory'] == 'on' ? 'required' : ''}} />
                        <input type="{{$config['date_format'] == 'MMM-YYYY' ? 'month' : 'date'}}"
                            class=" form-control form-control-sm input-small" onChange="DateChange(this)" />
                    </div>
                </div>
                <!-- </div>
                <div class="headingfont form-row "> -->
                <div class="form-group col-md-3 {{$config['b_field1_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['b_static_field1']}}
                        @if($config['b_field1_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="b_static_field1" id="b_static_field1"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['b_field1_mandatory'] == 'on' ? 'required' : ''}} />
                </div>

                <div class="form-group col-md-3 {{$config['b_field2_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['b_static_field2']}}
                        @if($config['b_field2_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="b_static_field2" id="b_static_field2"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['b_field2_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['b_field3_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['b_static_field3']}}
                        @if($config['b_field3_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="b_static_field3" id="b_static_field3"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['b_field3_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['b_field4_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['b_static_field4']}}
                        @if($config['b_field4_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="b_static_field4" id="b_static_field4"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['b_field4_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <!-- </div>
                <div class="headingfont form-row "> -->
                <div class="form-group col-md-3 {{$config['b_field5_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['b_static_field5']}}
                        @if($config['b_field5_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="b_static_field5" id="b_static_field5"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['b_field5_mandatory'] == 'on' ? 'required' : ''}} />
                </div>

                <div class="form-group col-md-3 {{$config['g_field1_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config->global_fieldname1}}
                        @if($config['g_field1_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="global_static_field1" id="global_static_field1"
                        class="required validate form-control form-control-sm" autocomplete="off" value="{{ $config->global_static_field1 }}"
                        {{$config['g_field1_mandatory'] == 'on' ? 'required' : ''}} readonly />
                </div>
                <div class="form-group col-md-3 {{$config['g_field2_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config->global_fieldname2}}
                        @if($config['global_static_field2'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="global_static_field2" id="global_static_field2"
                        class="required validate form-control form-control-sm" autocomplete="off" value="{{ $config->global_static_field2 }}"
                        {{$config['g_field2_mandatory'] == 'on' ? 'required' : ''}} readonly />
                </div>
                <div class="form-group col-md-3 {{$config['no_of_container_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['no_of_container']}}
                        @if($config['no_of_container_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="number" maxlength="100" name="no_of_container" id="no_of_container"
                        class="required validate form-control form-control-sm" autocomplete="off" min='1'
                        {{$config['no_of_container_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['printcount_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config['print_count']}}
                        @if($config['printcount_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="number" maxlength="100" name="print_count" id="print_count"
                        class="required validate form-control form-control-sm" autocomplete="off" min='1' value="1"
                        {{$config['printcount_mandatory'] == 'on' ? 'required' : ''}}/>
                </div>
                @if($config['serialization'] == 'user-input' || ($config['serialization'] == 'running-serial-no' && $config['product'] == 'on') || ($config['product'] == 'off' && $header === null))
                <div class="form-group col-md-3">
                    <label>{{$config['serialno']}}</label>
                        <input type="number" maxlength="100" name="serialno" id="serialno"
                        class="required validate form-control form-control-sm" autocomplete="off" required/>
                </div>
                @endif
            </div>
            <h6 style="margin-block:0rem !important"><b>Free Fields:</b></h6>
            <br>

            <br>
            <div class="headingfont form-row">

                <div style="" class="form-group col-md-3 " id="freeField1Group">
                    <label> <span id="freefield1name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield1" id="freefield1"
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
                <div class="form-group col-md-3" id="freeField2Group">
                    <label><span id="freefield2name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield2" id="freefield2"
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                <div style="" class="form-group col-md-3" id="freeField3Group">
                    <label><span id="freefield3name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield3" id="freefield3"
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
                <div class="form-group col-md-3" id="freeField4Group">
                    <label><span id="freefield4name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield4" id="freefield4"
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
                <div class="form-group col-md-3" id="freeField5Group">
                    <label><span id="freefield5name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield5" id="freefield5"
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
                <div class="form-group col-md-3" id="freeField6Group">
                    <label><span id="freefield6name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield6" id="freefield6"
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
            </div>
            @if($config->no_of_container_use === 'on')
            <div class="col-md-4">Decimal Count</div>
                <div class="col-md-4 "> &nbsp;
                    <select type="number" style="width:55px;" class="form-control-sm freeze"
                        id="decimal_sel" name="decimal_count">
                        @foreach($decimal_length as $key => $value)
                        <option value="{{ $value }}"
                            {{ ( $value == $config->decimal_count) ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                        @endforeach

                    </select>
                </div>
                @endif
            <div class="container-fluid" style="margin-top:1%;">
            <table id="container_table" class=" table table-md table-bordered tablefix_mtop"
                style="width:100% !important;">
                @if($config->no_of_container_use == 'on')
                <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;top:-3.5% !important;">
                    <tr>
                        <!-- <th>checkbox</th> -->
                        <th>S.No</th>
                        <th class="{{$config['net_weight_use'] == 'on' ? '' : 'hideField'}}"><input type="checkbox"
                                id="netWeightCheckbox" onclick="selectAll(this)">{{$config['net_weight']}}</th>
                        <th class="{{$config['tare_weight_use'] == 'on' ? '' : 'hideField'}}"><input type="checkbox"
                                id="tareWeightCheckbox" onclick="selectAll(this)">{{$config['tare_weight']}}</th>
                        <th class="{{$config['gross_weight_use'] == 'on' ? '' : 'hideField'}}">
                            {{$config['gross_weight']}}
                        </th>
                        <th class="{{$config['container_use'] == 'on' ? '' : 'hideField'}}">{{$config['container_no']}}
                        </th>
                        <th class="{{$config['d_field1_use'] == 'on' ? '' : 'hideField'}}">{{$config['dynamic_field1']}}
                        </th>
                        <th class="{{$config['d_field2_use'] == 'on' ? '' : 'hideField'}}">{{$config['dynamic_field2']}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            @endif
        </div>
        </div>
        @if($config['print_preview'] === 'on')
        <div class="container-fluid" style="padding-right:6%;padding-left:6%; margin-top:1%;">
            <input type="hidden" name="print_status" value="print">
            <input type="submit" class="btn btn-update" style="float:right;margin-left:10px;" id="update"
                value="Update">
            <input type="button" class="btn btn-primary" style="float:right;" id="print1" onclick="printPreview()"
                value="Print Preview">
            <a href="/get-predefinedtransaction-list" class="btn btn-secondary"
                style="float:left; color:#fff !important">Back</a>
        </div>
        @endif
        <!-- Modal -->

        {{-- hidden fields for running serial no --}}
        @if($header !== null && $config['product'] == 'off')
        <input type="hidden" value="{{ $header->prefix }}" name="prefix">
        <input type="hidden" value="{{ $header->suffix }}" name="suffix">
        <input type="hidden" name="serialno" id="serialno_old">
        @endif
</form>
<script>
$(document).ready(function() {
    $("#printapplication").html("Print Application - Transaction Predefined");
    $('#bg').css("background-color", 'white');
    $('#print1').prop('disabled', true);


    

    //Pop up the last serial number
    var header = @json($header);
    var config = @json($config);
    var serialno = header.serial_no;
    var suffix = header.suffix || '';
    var prefix = header.prefix || '';
    var count = config.no_of_container_use == 'on' ? parseInt(header.no_of_container) : parseInt(header.print_count);
    var i = config.printcount_use == 'on' ? 0 : 1;

    if (serialno !== null && count != 1) {
        for (i; i < count - 1; i++) {
            serialno++;
        }
    }

    formattedSerialNo = `${prefix}${String(serialno).padStart(header.serial_no.length, '0')}${suffix}`;
    $('#last_serialno').val(formattedSerialNo);
    //auto increment serialno
    runningSerial = serialno + 1;
    $('#serialno_old').val(String(runningSerial).padStart(header.serial_no.length, '0'));

});
const noOfContainer = document.getElementById('no_of_container');
const productName = document.getElementById('product_name');
const productId = document.getElementById('product_id');
const productStaticOne = document.getElementById('p_static_field1');
const productStaticTwo = document.getElementById('p_static_field2');
const productStaticThree = document.getElementById('p_static_field3');
const productStaticFour = document.getElementById('p_static_field4');
const productStaticFive = document.getElementById('p_static_field5');
const productStaticSix = document.getElementById('p_static_field6');
const productStaticSeven = document.getElementById('p_static_field7');
const productStaticEight = document.getElementById('p_static_field8');
const productStaticNine = document.getElementById('p_static_field9');
const productStaticTen = document.getElementById('p_static_field10');
const tableTbody = document.querySelector('#container_table tbody');
const config = @json($config);
// console.log(config);
const NetWeightCheckbox = document.getElementById('netWeightCheckbox');
const TareWeightCheckbox = document.getElementById('tareWeightCheckbox');
// console.log(NetWeightCheckbox, TareWeightCheckbox);
var net = config.net_weight_use == 'on' ? '' : 'hideField';
var tare = config.tare_weight_use == 'on' ? '' : 'hideField';
var gross = config.gross_weight_use == 'on' ? '' : 'hideField';
var container = config.container_use == 'on' ? '' : 'hideField';
var dfield1 = config.d_field1_use == 'on' ? '' : 'hideField';
var dfield2 = config.d_field2_use == 'on' ? '' : 'hideField';
//add row while the container no is exists
noOfContainer.addEventListener('change', () => {
    const numRowsToAdd = parseInt(noOfContainer.value, 10)
    tableTbody.innerHTML = '';
    // Validate the input
    if (isNaN(numRowsToAdd) || numRowsToAdd <= 0) {

        Swal.fire({
                        html: '<span style="font-size:14px;font-weight:bold;"> Please enter a valid positive number</span>',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert("Please enter a valid positive number.");
        noOfContainer.value = '';
        return;

    }
    for (i = 1; i < numRowsToAdd + 1; i++) {
        const newRow = document.createElement('tr');
        newRow.id = i;
        newRow.innerHTML = `

            <td><input type="text" name="s_no[${i}]" value="${i}" id="s_no${i}" hidden/>${i}</td>
            <td class="${net}"><input type="number" name="net_weight[${i}]" ${config.net_weight_mandatory== 'on' ? 'required' : ''} id="net_weight_${i}" onChange="onInput(this)" step="any" value=""/></td>
            <td class="${tare}"><input type="number" name="tare_weight[${i}]" ${config.tare_weight_mandatory== 'on' ? 'required' : ''} id="tare_weight_${i}" onChange="onInput(this)" step="any"  value=""/></td>
            <td class="${gross}"><input type="number" name="gross_weight[${i}]" ${config.gross_weight_mandatory== 'on' ? 'required' : ''}  id="gross_weight_${i}" onChange="onInput(this)" step="any"  value=""/></td>
            <td class="${container}"><input type="text" name="container_current_no[${i}]" ${config.container_mandatory== 'on' ? 'required' : ''}  id="container_current_no_${i}" readonly value="${i} ${config.container_count} ${numRowsToAdd}"/></td>
            <td class="${dfield1}"><input type="text" name="dynamic_field1[${i}]" ${config.d_field1_mandatory== 'on' ? 'required' : ''}  id="dynamic_field1"_${i} value=""/></td>
            <td class="${dfield2}"><input type="text" name="dynamic_field2[${i}]" ${config.d_field2_mandatory== 'on' ? 'required' : ''}  id="dynamic_field2_${i}" value=""/></td>
        `;
        tableTbody.append(newRow);
    }
})

//fetch product details
productName.addEventListener('change', () => {
    const productNameValue = productName.value;
    ajaxData = {
        product_name: productNameValue,
    }
    let post = JSON.stringify(ajaxData)
    const url = "/getProductData"
    let xhr = new XMLHttpRequest()
    xhr.open('POST', url, true)
    xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
    xhr.setRequestHeader('X-CSRF-Token', '{{csrf_token()}}')
    xhr.send(post);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var result = JSON.parse(xhr.responseText);
            productId.value = result[0]['product_id']
            productStaticOne.value = result[0]['static_field1']
            productStaticTwo.value = result[0]['static_field2']
            productStaticThree.value = result[0]['static_field3']
            productStaticFour.value = result[0]['static_field4']
            productStaticFive.value = result[0]['static_field5']
            productStaticSix.value = result[0]['static_field6']
            productStaticSeven.value = result[0]['static_field7']
            productStaticEight.value = result[0]['static_field8']
            productStaticNine.value = result[0]['static_field9']
            productStaticTen.value = result[0]['static_field10']
            serial = result[0]['serial']
            //Product level created toggle
            $('#prefix').toggle(serial === 'prefix' || serial === 'both' || serial === null);
            $('#suffix').toggle(serial === 'suffix' || serial === 'both' || serial === null);
        }
    }
})

// Store initial values for each row
let initialNetWeightValues = [];
let initialTareWeightValues = [];

function selectAll(event) {
    const netWeightInputs = document.querySelectorAll('input[name^="net_weight"]');
    const tareWeightInputs = document.querySelectorAll('input[name^="tare_weight"]');
    const grossWeightInputs = document.querySelectorAll('input[name^="gross_weight"]');
    const decimalCount = parseInt(document.getElementById('decimal_sel').value);


    if (event.checked) {
        // Store initial values for each row
        initialNetWeightValues = Array.from(netWeightInputs).map(input => input.value);
        initialTareWeightValues = Array.from(tareWeightInputs).map(input => input.value);

        // Set the value of all net weight fields to the first net weight value
        netWeightInputs.forEach((input, index) => {
            input.value = parseFloat(netWeightInputs[0].value).toFixed(decimalCount);
        });

        // Set the value of all tare weight fields to the first tare weight value
        tareWeightInputs.forEach((input, index) => {
            input.value = parseFloat(tareWeightInputs[0].value).toFixed(decimalCount);
        });

        // Set the value of all gross weight fields to the sum of net weight and tare weight
        grossWeightInputs.forEach((input, index) => {
            input.value = (
                parseFloat(netWeightInputs[0].value) +
                parseFloat(tareWeightInputs[0].value)
            ).toFixed(decimalCount);
        });
    } else {
        // Restore initial values for each row if the checkbox is unchecked
        // console.log('indexxx');
         // Reset all rows to their initial values when the checkbox is unchecked
         netWeightInputs.forEach((input, index) => {
            input.value = (index === 0) ? '' : initialNetWeightValues[index] || '';
        });

        tareWeightInputs.forEach((input, index) => {
            input.value = (index === 0) ? '' : initialTareWeightValues[index] || '';
        });

        grossWeightInputs.forEach(input => {
            input.value = '';
        });
    }
}

function onInput(event) {
    const decimalCount = parseInt(document.getElementById('decimal_sel').value);
    //to restrict decimal value
    let inputId = event.id;
    let value = parseFloat(event.value);
    if (Number.isNaN(value)) {
        document.getElementById(inputId).value = "";
    } else {
        document.getElementById(inputId).value = value.toFixed(decimalCount);
    }
    // to add net weight and tare weight
    trId = event.closest('td').parentElement;
    // console.log(trId);
    let netWeight = trId.querySelector('#net_weight_' + trId.id).value;
    let tareWeight = trId.querySelector('#tare_weight_' + trId.id).value;
    let grossWeight = trId.querySelector('#gross_weight_' + trId.id);
    grossWeight.value = (parseFloat(netWeight) + parseFloat(tareWeight)).toFixed(decimalCount);
}

function DateChange(event) {
    console.log('testdate');
    let date = event.value;
    let dateId = event.parentNode.querySelector("input").id;
    const DateId = document.getElementById(dateId);
    if (isNaN(date)) {
        var MMM_YYYY = moment(date).add(0, 'months').format('MMM-YYYY');
        var MM_DD_YYYY = moment(date).add(0, 'months').format('DD-MM-YYYY');
        var YYYY_MM_DD = moment(date).add(0, 'months').format('YYYY-MM-DD');
        DateId.value = config.date_format == 'MMM-YYYY' ? MMM_YYYY : (config.date_format == 'DD-MM-YYYY' ?
            MM_DD_YYYY :
            YYYY_MM_DD)
    } else {
        DateId.value = '';
    }
}

function validateFieldAndSubmit(event) {
    event.preventDefault();
    const form = document.getElementById("transactionForm");
    // Check if the field is valid
    if (form.checkValidity()) {
        submitForm();
    } else {}
}

function submitForm() {
    const form = document.getElementById("transactionForm");
    const formData = new FormData(form);
    fetch('/predefinedtransaction_update', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data here
            console.log(data);
            if (data.success) {
                // Create a new div element for the success message
                const successMessageDiv = document.createElement('div');
                successMessageDiv.className = 'alert alert-success';
                successMessageDiv.textContent = data.success;
                // Use the success message from the response data
                $('#print1').prop('disabled', false);
                // Insert the success message before the form
                form.parentNode.insertBefore(successMessageDiv, form);
                // Automatically fade out the success message after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    successMessageDiv.style.opacity = 0;
                    setTimeout(function() {
                        successMessageDiv.parentNode.removeChild(successMessageDiv);
                    }, 1000); // Fade out duration (1000 milliseconds)
                }, 1000); // Message display duration (5000 milliseconds)
            }

        })
        .catch(error => {
            // Handle any errors that occurred during the fetch
        });
}
$('.restrict').keydown(function(e) {
    e.preventDefault();
    return false;
});
// Get references to the button and modal
const modal = document.getElementById("myModal");

function printPreview() {
    // Open the modal by adding the "show" class to it
    var label_name_value = $('#label_name').val();
    window.location.href = '/printpreview/' + label_name_value;

};

function printDiv() {
    // Redirect to another page when the "Print" button is clicked
    var label_name_value = $('#label_name').val();
    window.location.href = '/print/' + label_name_value;
}

</script>
<script>
// hide the free fields input box based on label design dev by navin on 26/10/23
$(document).ready(function() {

    var print_preview = @json($config->print_preview);
    if(print_preview === 'off'){
    $('#transactionForm').removeAttr('onsubmit');
    // $('#print_count').attr('readonly',true);
    $('#serialno').on('blur', function() {
        if ($('#serialno').val() === '') {
            Swal.fire({
                html: '<span style="font-size:24px;font-weight:bold;"> Please Enter Serial No.</span>',
                confirmButtonText: 'OK',
                confirmButtonColor: 'rgb(36 63 161)',
                background: 'rgb(105 126 157)',
                customClass: 'swal-wide',
            });
        }else{
            var label_name = $('#label_name').val();

            var actionUrl = $('#transactionForm').attr('action');

            var updatedActionUrl = actionUrl +'/'+ label_name;
            console.log(updatedActionUrl,'updatedActionUrl');

            $('#transactionForm').attr('action', updatedActionUrl);
            storeFormData();
            $('#transactionForm').submit();
        }
    });
    }
    function storeFormData() {
        let formDat = $('#transactionForm').serializeArray();
        formDat = formDat.reduce((p,c) => {
            p[c.name] = c.value
            return p;
        }, {});
        sessionStorage.setItem('predefined-transaction', JSON.stringify(formDat));
    }





    var lab = 'label_name';
    $('#' + lab).on('change', function() {
        var selectedLabel = $(this).find(':selected');
        // console.log(selectedLabel);
        var labelPosition = selectedLabel.data('labelposition');
        // console.log(labelPosition);
        var position_of_freefield = labelPosition.split('|');
        var freefield_inputs = ['freeField1Group', 'freeField2Group', 'freeField3Group',
            'freeField4Group', 'freeField5Group', 'freeField6Group'
        ]
        // console.log(position_of_freefield,'position_of_freefield');
        // $.each(position_of_freefield,function(key,value){
        $(position_of_freefield).each(function(key, value) {
            // console.log(position_of_freefield[key],'value');
            if (value === '0px_0px_0px_0px_0px') {
                $('#' + freefield_inputs[key]).hide();
            } else {
                $('#' + freefield_inputs[key]).show();
            }
        })

        $('#labelname').val($(this).val());
    });

    $('#batch_number').change(function() {
        const batchNumber = $('#batch_number').val();

        $.ajax({
            url: "{{ url('/batchNumberValidation') }}",
            type: "GET",
            data: {
                batchNumber: batchNumber,
            },
            success: function(result) {
                if (result.exists) {
                    Swal.fire({
                        html: 'This {{$config['batch_number']}} is already exists. Do you want to continue?',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancel',
                        confirmButtonColor: 'rgb(36 63 161)',
                        cancelButtonColor: '#d33',
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // User clicked "OK", set the input value to the existing batch number
                            $('#batch_number').val(batchNumber);
                        } else {
                            // User clicked "Cancel", clear the input
                            $('#batch_number').val('').focus();
                        }
                    });
                } else {
                    // Batch number does not exist, continue with your logic
                    // ...
                }
            }
        });
    });


    $('#label_name').change(function() {
        const labelName = $('#label_name').val();
        $.ajax({
            url: "{{ url('/labelnameagainstdata') }}",
            type: "GET",
            data: {
                labelName: labelName,
            },
            success: function(result) {
                if (result.success) {
                    console.log(result.success);

                    // Access labelProductName properties
                    $('#product_type').val(result.success.labelProductName.product_type);
                    $('#label_type').val(result.success.labelProductName.label_type_name);

                    // Access freefieldnames properties
                    $('#freefield1name').text(result.success.freefieldnames
                        .Freefield1_label_value);
                    $('#freefield2name').text(result.success.freefieldnames
                        .Freefield2_label_value);
                    $('#freefield3name').text(result.success.freefieldnames
                        .Freefield3_label_value);
                    $('#freefield4name').text(result.success.freefieldnames
                        .Freefield4_label_value);
                    $('#freefield5name').text(result.success.freefieldnames
                        .Freefield5_label_value);
                    $('#freefield6name').text(result.success.freefieldnames
                        .Freefield6_label_value);
                } else {

                }
            }
        });


    });

    // function populateFormFields() {
    //     //For the new url with empty data
    //     var currentURL = window.location.href;
    //     var parts = currentURL.split('/');
    //     var lastPart = parts.pop();
    //     if(lastPart === "new")return;

    //     //with old data
    //     let sessionStore = JSON.parse(sessionStorage.getItem('predefined-transaction'));
    //     console.log(sessionStore);
    //     if(sessionStore && sessionStore.length !== 0) {
    //         $('#label_name').val(sessionStore.label_name).trigger('change');
    //         // $('#serialno').val(sessionStore.serialno).trigger('change');
    //         $('#product_name').val(sessionStore.product_name);
    //         $('#freefield1').val(sessionStore.freefield1);
    //         $('#freefield2').val(sessionStore.freefield2);
    //         $('#freefield3').val(sessionStore.freefield3);
    //         $('#freefield4').val(sessionStore.freefield4);
    //         $('#freefield5').val(sessionStore.freefield5);
    //         $('#freefield6').val(sessionStore.freefield6);

    //         var labelNameElement = document.getElementById('product_name');
    //         var event = new Event('change');
    //         labelNameElement.dispatchEvent(event);
    //     }
    // }
            // populateFormFields();
});

</script>
<style>
body {
    zoom: 80% !important;
}

.form-control {
    border: 1px solid #899097 !important;
    margin-bottom: 0.5rem;
}

.form-row {
    padding-bottom: 5px !important;
}

.hideField {
    display: none;
}

.input-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* Vertically center the inputs */
}

.input-large {
    flex: 9;
    /* 80% width */
    margin-right: 10px;
    /* Add spacing between inputs */
}

.input-small {
    flex: 0.5;
    width: 34px;
    width: 5px
}

/* Custom styles for modal */
.modal {
    display: none;
    background-color: rgba(0, 0, 0, 0.5);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #efefef;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
}

/* Show modal when it has the "show" class */
.modal.show {
    display: flex;
}

.label-body {
    background-color: #fff;
    margin-left: 46%;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 1px 2px 8px rgb(103 71 13);
    /* Add a subtle box shadow */
}

.label_load {
    height: 100%;
    display: flex;
    align-items: center;
}
</style>
@endsection
