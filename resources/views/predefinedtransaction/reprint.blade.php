@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<form action="/reprintprint/{{$reprintData->label_name}}" method="POST" enctype='multipart/form-data'
    onsubmit="validateFieldAndSubmit(event)" id="transactionForm">
    @csrf
    <input type="hidden" name="transaction_id" value="{{$reprintData->id}}">
    <div class="container-fluid" style="padding-right:6%;padding-left:6%;">
        <h2 class="headingfont-bold"></h2>
        <div class="card" style="padding:17px; overflow-y: scroll; overflow-x: hidden;max-height: 560px;">
            <div class="headingfont form-row ">
                <div class="form-group col-md-3" style="">
                    <label>Label Name</label>
                    <span class="required-asterisk" style="color:red">*</span>
                    <input name="label_name" disabled required id="label_name"
                        class=" form-control validate required form-control-sm" value="{{$designlabel->label_name}}">
                </div>
                <div class="form-group col-md-3" style="">
                    <label>Product Type</label>
                    <input type="text" class=" form-control validate required form-control-sm" id="product_type"
                        value="{{$labelProductName->product_type}}" readonly>
                </div>
                <div class="form-group col-md-3" style="">
                    <label> Label Type</label>
                    <input type="text" class=" form-control validate required form-control-sm"
                        value="{{$labelProductName->label_type_name}}" id="label_type" readonly>
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
                    <!-- <select name="product_name" id="product_name" class="form-control validate required form-control-sm"
                        {{$config['product_name_mandatory'] == 'on' ? 'required' : ''}} disabled>
                        <option value="{{$product_data->product_name}}" selected disabled>{{$reprintData->product_name}}
                        </option>

                    </select> -->

                    <input type="varchar" maxlength="100" name="product_name" id="product_name" value="{{$product_data->product_name}}"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['product_name_mandatory'] == 'off' ? 'required' : ''}} readonly />
                </div>
                <div class="form-group col-md-3 {{$config['product_id_use'] == 'off' ? '' : 'hideField'}}">
                    <label>{{$config['product_id']}}
                        @if($config['product_id_mandatory'] == 'off')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="product_id" id="product_id" value="{{$product_data->product_id}}"
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
                        value="{{$product_data->static_field1}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field1_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field2']}}
                        @if($config['p_field2_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field2" id="p_static_field2"
                        value="{{$product_data->static_field2}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field2_mandatory'] == 'on' ? 'required' : ''}} readonly />

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
                        value="{{$product_data->static_field3}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field3_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>

                <div class="form-group col-md-3 {{$config['p_field4_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field4']}}
                        @if($config['p_field4_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field4" id="p_static_field4"
                        value="{{$product_data->static_field4}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field4_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field5_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field5']}}
                        @if($config['p_field5_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field5" id="p_static_field5"
                        value="{{$product_data->static_field5}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field5_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field6_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field6']}}
                        @if($config['p_field6_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field6" id="p_static_field6"
                        value="{{$product_data->static_field6}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field6_mandatory'] == 'on' ? 'required' : ''}} readonly />

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
                        value="{{$product_data->static_field7}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field7_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field8_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field8']}}
                        @if($config['p_field8_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field8" id="p_static_field8"
                        value="{{$product_data->static_field8}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field8_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field9_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field9']}}
                        @if($config['p_field9_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field9" id="p_static_field9"
                        value="{{$product_data->static_field9}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field9_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field10_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field10']}}
                        @if($config['p_field10_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="p_static_field10" id="p_static_field10"
                        value="{{$product_data->static_field10}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field10_mandatory'] == 'on' ? 'required' : ''}} readonly />
                </div>
            </div>
            <hr>
            <h6 style="margin-block:0rem !important"><b>Serialization :</b></h6>
            <br>
            <div class="headingfont form-row">
                @if($config['serialization'] == 'user-input' || ($config['serialization'] == 'running-serial-no' && $config['product'] == 'on') || ($config['product'] == 'off' && $header === null))
                <div class="form-group col-md-3">
                    <label>{{$config['serialno']}}</label>
                        <input type="varchar" maxlength="100" name="serialno" id="serialno"
                        class="required validate form-control form-control-sm" autocomplete="off" readonly/>
                </div>
                @endif


            </div>
            <hr>
            <h6 style="margin-block:0rem !important"><b>Batch Details :</b></h6>
            <div class="headingfont form-row">
                <div class="form-group col-md-3 {{$config['batch_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['batch_number']}}
                        @if($config['batch_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="batch_number" id="batch_number"
                        value="{{$reprintData->batch_number}}" class="required validate form-control form-control-sm"
                        autocomplete="off" readonly {{$config['batch_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['date_of_manufacturing_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['date_of_manufacturing']}}
                        @if($config['date_of_manufacturing_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <div class="input-row">
                        <input type="text" maxlength="100" name="date_of_manufacturing" id="date_of_manufacturing"
                            placeholder="{{$config['date_format']}}" readonly
                            class="restrict required validate input-large form-control form-control-sm"
                            autocomplete="off" value="{{$reprintData->date_of_manufacturing}}"
                            {{$config['date_of_manufacturing_mandatory'] == 'on' ? 'required' : ''}} />
                        <!-- <input type="{{$config['date_format'] == 'MMM-YYYY' ? 'month' : 'date'}}"
                        readonly  class=" form-control form-control-sm input-small" onChange="DateChange(this)"
                            max='<?= $config['date_format']=='MMM-YYYY' ? date('Y-m') :date('Y-m-d'); ?>' > -->
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
                            autocomplete="off" readonly placeholder="{{$config['date_format']}}"
                            value="{{$reprintData->date_of_expiry}}"
                            {{$config['date_of_expiry_mandatory'] == 'on' ? 'required' : ''}} />
                        <!-- <input type="{{$config['date_format'] == 'MMM-YYYY' ? 'month' : 'date'}}"
                        readonly   class=" form-control form-control-sm input-small"  onChange="DateChange(this)" > -->
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
                            value="{{$reprintData->date_of_retest}}"
                            class="restrict required validate input-large form-control form-control-sm"
                            autocomplete="off" placeholder="{{$config['date_format']}}" readonly
                            {{$config['date_of_retest_mandatory'] == 'on' ? 'required' : ''}} />
                        <!-- <input type="{{$config['date_format'] == 'MMM-YYYY' ? 'month' : 'date'}}"
                        readonly  class=" form-control form-control-sm input-small" onChange="DateChange(this)"  > -->
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
                        value="{{$reprintData->b_field1}}" readonly
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
                        value="{{$reprintData->b_field2}}" readonly
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
                        value="{{$reprintData->b_field3}}" readonly
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
                        value="{{$reprintData->b_field4}}" readonly
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
                        value="{{$reprintData->b_field5}}" readonly
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
                        value="{{$reprintData->gloabl_field1}}" readonly
                        {{$config['g_field1_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['g_field2_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config->global_fieldname2}}
                        @if($config['global_static_field2'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="varchar" maxlength="100" name="global_static_field2" id="global_static_field2"
                        class="required validate form-control form-control-sm" autocomplete="off" value="{{ $config->global_static_field2 }}"
                        value="{{$reprintData->gloabl_field2}}" readonly
                        {{$config['g_field2_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['no_of_container_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['no_of_container']}}
                        @if($config['no_of_container_mandatory'] == 'on')
                        <span class="required-asterisk" style="color:red">*</span>
                        @endif
                    </label>
                    <input type="number" maxlength="100" name="no_of_container" id="no_of_container"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        value="{{$reprintData->no_of_container}}" readonly
                        {{$config['no_of_container_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
            </div>
            <div class="headingfont form-row">
            @if($reprintData->freefield1 != null)
                <div style="" class="form-group col-md-3 " id="freeField1Group">
                    <label> {{$designlabel->Freefield1_label_value}}
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>

                    <input type="varchar" maxlength="100" name="freefield1" id="freefield1"
                        value="{{$reprintData->freefield1}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
                @endif
                <!-- @php(dump($reprintData->freefield2)) -->
                @if($reprintData->freefield2 != null)


                <div class="form-group col-md-3" id="freeField2Group">
                    <label>{{$designlabel->Freefield2_label_value}}
                        <span class="required-asterisk" style="color:red">*</span>
                    </label>
                        <input type="varchar" maxlength="100" name="freefield2" id="freefield2"
                        value="{{$reprintData->freefield2}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
                @endif
                @if($reprintData->freefield3 != null)
                <div style="" class="form-group col-md-3" id="freeField3Group">
                    <label>{{$designlabel->Freefield3_label_value}}
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield3" id="freefield3"
                        value="{{$reprintData->freefield3}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif
                @if($reprintData->freefield4 != null)
                <div class="form-group col-md-3" id="freeField4Group">
                    <label>{{$designlabel->Freefield4_label_value}}
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield4" id="freefield4"
                        value="{{$reprintData->freefield4}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif

                @if($reprintData->freefield5 != null)
                <div class="form-group col-md-3" id="freeField5Group">
                    <label>{{$designlabel->Freefield5_label_value}}
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield5" id="freefield5"
                        value="{{$reprintData->freefield5}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif

                @if($reprintData->freefield6 !=  null)
                <div class="form-group col-md-3" id="freeField6Group">
                    <label>{{$designlabel->Freefield6_label_value}}
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield6" id="freefield6"
                        value="{{$reprintData->freefield6}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif

            </div>
            <div class="container-fluid" style="margin-top:1%;">
        <table id="container_table" class=" table table-md table-bordered tablefix_mtop" style="width:100% !important;">
        @if($config->no_of_container_use == 'on')
            <thead class="nonheadingfont-bold stickyhead" style="width:100% !important;top:-3.5% !important">
                <tr>
                    <th><input type="checkbox" name="checkIdHead" value="" id="check_box_head"
                            onclick="selectAll(this)"></th>
                    <th>S.No</th>
                    <th class="{{$config['net_weight_use'] == 'on' ? '' : 'hideField'}}">{{$config['net_weight']}}</th>
                    <th class="{{$config['tare_weight_use'] == 'on' ? '' : 'hideField'}}">{{$config['tare_weight']}}
                    </th>
                    <th class="{{$config['gross_weight_use'] == 'on' ? '' : 'hideField'}}">{{$config['gross_weight']}}
                    </th>
                    <th class="{{$config['container_use'] == 'on' ? '' : 'hideField'}}">{{$config['container_no']}}</th>
                    <th class="{{$config['d_field1_use'] == 'on' ? '' : 'hideField'}}">{{$config['dynamic_field1']}}
                    </th>
                    <th class="{{$config['d_field2_use'] == 'on' ? '' : 'hideField'}}">{{$config['dynamic_field2']}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $key => $data)
                <tr id="{{$data->id}}">
                    <td><input type="checkbox" readonly class="check_box_body"
                            value="{{$data->id}}" id="check_box_{{$data->id}}"></td>
                    <td><input type="text" readonly value="{{$data->id}}"
                            id="s_no{{$data->id}}" hidden />{{$key+1}}</td>
                    <td><input type="text" readonly class="net_weight"
                            value="{{$data->net_weight}}" id="net_weight_{{$data->id}}" onChange="onInput(this)"
                            step="any"></td>
                    <td><input type="text" readonly class="tare_weight"
                            value="{{$data->tare_weight}}" id="tare_weight_{{$data->id}}" onChange="onInput(this)"
                            step="any"></td>
                    <td><input type="text" readonly class="gross_weight"
                            value="{{$data->gross_weight}}" id="gross_weight_{{$data->id}}" onChange="onInput(this)"
                            step="any"></td>
                    <td><input type="text" readonly class="container_no"
                            value="{{$data->container_no}}" id="container_no_{{$data->id}}" readonly></td>
                    <td><input type="text" readonly class="dynamic_field1"
                            value="{{$data->dynamic_field1}}" id="dynamic_field1_{{$data->id}}"></td>
                    <td><input type="text" readonly class="dynamic_field2"
                            value="{{$data->dynamic_field2}}" id="dynamic_field2_{{$data->id}}"></td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
        </div>


    </div>

    <div class="container-fluid" style="padding-right:6%;padding-left:6%;margin-top:2%">
        <input type="hidden" name="printValue" value="Reprint">
        <!-- <input type="submit" class="btn btn-update" style="float:right;margin-left:10px;" id="update" value="Update"> -->
        <input type="button" class="btn btn-primary" style="float:right;" id="print" onclick="submitForm()"
            value="Reprint ">
        <a href="/get-predefinedtransaction-list" class="btn btn-secondary"
            style="float:left; color:#fff !important">Back</a>
    </div>
    <!-- Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal header -->
                <!-- <div class="modal-header">
                    <center><h3 class="modal-title">Print Preview</h3></center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" data-dismiss="modal" >&times;</span>
                    </button>
                </div> -->
                <!-- Modal body -->
                <div class="modal-body row col-md-12">



                    <div class="col-md-4 p-1" style="margin-bottom:-50%;margin-left:4%;margin-top:8%">
                        <h3 class="headingfont-bold"
                            style="margin-bottom:10%;margin-top:-12%;font-size:22px !important;">Print Preview </h3>
                        <div class="form-group row ">

                            <div class="col-md-3 ">

                                <label class="p-1" class="p-1">Label Name :</label>

                            </div>

                            <div class="col-md-9">

                                <input type="text" id="labelname" class="form-control grnprop1 "
                                    value="{{$header->label_name}}" readonly>



                            </div>

                        </div>

                        <div class="form-group row ">

                            <div class="col-md-3 ">

                                <label class="p-1" class="p-1">Label Type :</label>

                            </div>

                            <div class="col-md-9">

                                <input type="text" id="ltype" class="form-control grnprop1 "
                                    value="{{$header->label_type}}" readonly>

                            </div>

                        </div>

                        <div class="form-group row ">

                            <div class="col-md-3">

                                <label class="p-1">Label Size:</label>

                            </div>

                            <div class="col-md-2">

                                <label class="p-1">Width : </label>

                            </div>

                            <div class="col-md-2">

                                <input type="text" class="form-control grnprop" id="lwidth"
                                    value="{{$designlabel->Label_Height}}" readonly>

                            </div>

                            <div class="col-md-2 ">

                                <label class="p-1">Height : </label>

                            </div>

                            <div class="col-md-2">

                                <input type="text" class="form-control grnprop " id="lheight"
                                    value="{{$designlabel->Label_Width}}" readonly>

                            </div>

                        </div>

                        <div class="form-group row ">

                            <div class="col-md-3 ">

                                <label class="p-1">Print Count :</label>

                            </div>

                            <div class="col-md-9">

                                <input type="text" id="printcount" style="margin-bottom: 25%;"
                                    class="form-control grnprop1 " value="{{$header->no_of_container}}" readonly>

                            </div>

                        </div>
                        <button type="button" onclick="location.reload();" class="btn btn-secondary"
                            style="float:left;">Back</button>

                        <button type="button" class="btn btn-primary print-button" style="float:right;" id="print"
                            onclick="print()">Print</button>










                    </div>
                    <div class="col-md-6 label-body">
                        <!-- <span>{{ $qrCode }}</span> -->
                    </div>
                </div>
                <!-- Modal footer -->

            </div>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    $("#printapplication").html("Print Application - Transaction Predefined Reprint");
    $('#bg').css("background-color", 'white');

    $('.check_box_body').on('click', function() {
        var row = $(this).closest('tr');
        checkBody(row);
    });

    var header = @json($reprintData);
    var serialno = header.serial_no;
    var suffix = header.suffix;
    var prefix = header.prefix;
    var formattedSerialNo = `${prefix  || ''}${serialno || ''}${suffix || ''}`;
    $('#serialno').val(formattedSerialNo);

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
//add row while the container no is exists
noOfContainer.addEventListener('change', () => {
    const numRowsToAdd = parseInt(noOfContainer.value, 10)
    tableTbody.innerHTML = '';
    // Validate the input
    if (isNaN(numRowsToAdd) || numRowsToAdd <= 0) {
        alert("Please enter a valid positive number.");
        return;
    }
    for (i = 1; i < numRowsToAdd + 1; i++) {
        const newRow = document.createElement('tr');
        newRow.id = i;
        newRow.innerHTML = `
            <td><input type="checkbox" name="checkId[${i}]" value="${i}" id="check_box_${i}"/></td>
            <td><input type="text" name="s_no[${i}]" value="${i}" id="s_no${i}" hidden/>${i}</td>
            <td class="${config.net_weight_use}== 'on' ? '' : 'hideField'"><input type="number" name="net_weight[${i}]" ${config.net_weight_mandatory== 'on' ? 'required' : ''} id="net_weight_${i}" onChange="onInput(this)" step="any" value=""/></td>
            <td class="${config.tare_weight_use}== 'on' ? '' : 'hideField'"><input type="number" name="tare_weight[${i}]" ${config.tare_weight_mandatory== 'on' ? 'required' : ''} id="tare_weight_${i}" onChange="onInput(this)" step="any"  value=""/></td>
            <td class="${config.gross_weight_use}== 'on' ? '' : 'hideField'"><input type="number" name="gross_weight[${i}]" ${config.gross_weight_mandatory== 'on' ? 'required' : ''}  id="gross_weight_${i}" onChange="onInput(this)" step="any"  value=""/></td>
            <td class="${config.container_use}== 'on' ? '' : 'hideField'"><input type="text" name="container_current_no[${i}]" ${config.container_mandatory== 'on' ? 'required' : ''}  id="container_current_no_${i}" readonly value="${i} ${config.container_count} ${numRowsToAdd}"/></td>
            <td class="${config.d_field1_use}== 'on' ? '' : 'hideField'"><input type="text" name="dynamic_field1[${i}]" ${config.d_field1_mandatory== 'on' ? 'required' : ''}  id="dynamic_field1"_${i} value=""/></td>
            <td class="${config.d_field2_use}== 'on' ? '' : 'hideField'"><input type="text" name="dynamic_field2[${i}]" ${config.d_field2_mandatory== 'on' ? 'required' : ''}  id="dynamic_field2_${i}" value=""/></td>
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
        }
    }
})

function onInput(event) {
    //to restrict decimal value
    let inputId = event.id;
    let value = parseFloat(event.value);
    if (Number.isNaN(value)) {
        document.getElementById(inputId).value = "";
    } else {
        document.getElementById(inputId).value = value.toFixed(config.decimal_count);
    }
    // to add net weight and tare weight
    trId = event.closest('td').parentElement;
    let netWeight = trId.querySelector('#net_weight_' + trId.id).value;
    let tareWeight = trId.querySelector('#tare_weight_' + trId.id).value;
    let grossWeight = trId.querySelector('#gross_weight_' + trId.id);
    grossWeight.value = (parseFloat(netWeight) + parseFloat(tareWeight)).toFixed(config.decimal_count);
}

function DateChange(event) {
    let date = event.value;
    let dateId = event.parentNode.querySelector("input").id;
    const DateId = document.getElementById(dateId);
    if (isNaN(date)) {
        var MMM_YYYY = moment(date).add(0, 'months').format('MMM-YYYY');
        var MM_DD_YYYY = moment(date).add(0, 'months').format('DD-MM-YYYY');
        var YYYY_MM_DD = moment(date).add(0, 'months').format('YYYY-MM-DD');
        DateId.value = config.date_format == 'MMM-YYYY' ? MMM_YYYY : (config.date_format == 'DD-MM-YYYY' ? MM_DD_YYYY :
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
    var config = @json($config);
    if (!$('.check_box_body').is(':checked') && config.no_of_container_use === 'on') {
        Swal.fire({
            html: '<span style="font-size:24px;font-weight:bold;">Please check at least one checkbox</span>',
            confirmButtonText: 'OK',

            customClass: 'swal-wide',confirmButtonColor: 'rgb(36 63 161)',
            background: 'rgb(105 126 157)',
        });
    } else {
        const form = document.getElementById("transactionForm");
        form.submit();
    }
}
$('.restrict').keydown(function(e) {
    e.preventDefault();
    return false;
});
// Get references to the button and modal
const modal = document.getElementById("myModal");
//monisha 17-11-23
function printPreview() {
    // Open the modal by adding the "show" class to it
    modal.classList.add("show");
    var label_name_value = $('#label_name').val();
    console.log(label_name_value);
    $('.label-body').load('/printpreview/' + label_name_value, function() {
        // console.log('testtttttttt');
        // Event delegation for the "Print" button click

    });
};

function printDiv() {
    // Redirect to another page when the "Print" button is clicked
    var label_name_value = $('#label_name').val();
    console.log(label_name_value);
    window.location.href = '/reprintprint/' + label_name_value;
}

// Close the modal when the close button or outside modal is clicked
modal.addEventListener("click", function(event) {
    if (event.target === modal || event.target.getAttribute("data-dismiss") === "modal") {
        modal.classList.remove("show");
    }
});

function selectAll(event) {
    $('.check_box_body').each(function(){
        if(event.checked) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
        var row = $(this).closest('tr');
        checkBody(row);
    })
}

function checkBody(row) {
        if (row.find('.check_box_body').is(':checked')) {
            row.find('.check_box_body').prop('name', 'checkId[]');
            row.find('.net_weight').prop('name', 'netweight[]');
            row.find('.tare_weight').prop('name', 'tareweight[]');
            row.find('.gross_weight').prop('name', 'grossweight[]');
            row.find('.container_no').prop('name', 'container_current_no[]');
            row.find('.dynamic_field1').prop('name', 'dynamic_field1[]');
            row.find('.dynamic_field2').prop('name', 'dynamic_field2[]');
        } else {
            row.find('.check_box_body').prop('name','');
            row.find('.net_weight').prop('name', '');
            row.find('.tare_weight').prop('name', '');
            row.find('.gross_weight').prop('name', '');
            row.find('.container_no').prop('name', '');
            row.find('.dynamic_field1').prop('name', '');
            row.find('.dynamic_field2').prop('name', '');
        }
    }
// $('.check_box_body').click(function(){
//     if($(this).is(':checked')){
//         console.log('ihh');
//     }

// });
</script>

<style>
body {
    zoom: 80% !important;
}

.form-control {
    border: 1px solid #899097 !important;
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
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    width: 278%;
    /* Full width */
    max-width: 348%;
    /* Ensure it doesn't exceed the viewport width */
    height: 250%;
    /* Full height */
    max-height: 250%;
    /* Ensure it doesn't exceed the viewport height */
    overflow: auto;
    /* Add scrolling if the content overflows */
    margin-left: -89%;
}

/* Show modal when it has the "show" class */
.modal.show {
    display: flex;
}

.label-body {
    height: 500px;
    background-color: #fff;
    /* overflow:scroll; */
    margin-left: 46%;
    width: 650px;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 1px 2px 8px rgb(103 71 13);
    /* Add a subtle box shadow */
}
</style>
@endsection
