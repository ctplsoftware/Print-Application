@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>


    <button id="download" style="margin-left: 100px; "><i class="fas fa-file-pdf mr-1"></i>download pdf</button>

    <div id="report" class="container-fluid" style="padding-right:6%;padding-left:6%;">
        <h2 class="headingfont-bold"></h2>
        <div class="card" style="padding:17px;">
            <div class="headingfont form-row ">
                <div class="form-group col-md-3" style="">
                    <label>Label Name</label>
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

                    <label>{{$config['product_name']}}</label>
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
                    <label>{{$config['product_id']}}</label>
                    <input type="varchar" maxlength="100" name="product_id" id="product_id" value="{{$product_data->product_id}}"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        {{$config['product_id_mandatory'] == 'off' ? 'required' : ''}} readonly />
                </div>
                <div class="form-group col-md-3 {{$config['p_field1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field1']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field1" id="p_static_field1"
                        value="{{$product_data->static_field1}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field1_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field2']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field2" id="p_static_field2"
                        value="{{$product_data->static_field2}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field2_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <!-- </div> -->
                <!-- <div class="headingfont form-row "> -->

                <div class="form-group col-md-3 {{$config['p_field3_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field3']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field3" id="p_static_field3"
                        value="{{$product_data->static_field3}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field3_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>

                <div class="form-group col-md-3 {{$config['p_field4_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field4']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field4" id="p_static_field4"
                        value="{{$product_data->static_field4}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field4_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field5_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field5']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field5" id="p_static_field5"
                        value="{{$product_data->static_field5}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field5_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field6_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field6']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field6" id="p_static_field6"
                        value="{{$product_data->static_field6}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field6_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <!-- </div> -->
                <!-- <div class="headingfont form-row "> -->

                <div class="form-group col-md-3 {{$config['p_field7_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field7']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field7" id="p_static_field7"
                        value="{{$product_data->static_field7}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field7_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field8_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field8']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field8" id="p_static_field8"
                        value="{{$product_data->static_field8}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field8_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field9_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field9']}}</label>
                    <input type="varchar" maxlength="100" name="p_static_field9" id="p_static_field9"
                        value="{{$product_data->static_field9}}" class="required validate form-control form-control-sm"
                        autocomplete="off" {{$config['p_field9_mandatory'] == 'on' ? 'required' : ''}} readonly />

                </div>
                <div class="form-group col-md-3 {{$config['p_field10_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field10']}}</label>
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
                        <input type="varchar" maxlength="100" name="serialno" id="serialno" value="{{ $reprintData->prefix}}{{ $reprintData->serial_no}}{{ $reprintData->suffix }}"
                        class="required validate form-control form-control-sm" autocomplete="off" disabled/>
                </div>
                @endif


            </div>
            <hr>
            <h6 style="margin-block:0rem !important"><b>Batch Details :</b></h6>
            <div class="headingfont form-row">
                <div class="form-group col-md-3 {{$config['batch_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['batch_number']}}</label>
                    <input type="varchar" maxlength="100" name="batch_number" id="batch_number"
                        value="{{$reprintData->batch_number}}" class="required validate form-control form-control-sm"
                        autocomplete="off" readonly {{$config['batch_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['date_of_manufacturing_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['date_of_manufacturing']}}</label>
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
                <label>{{$config['date_of_expiry']}}</label>
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
                <label>{{$config['date_of_retest']}}</label>
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
                <label>{{$config['b_static_field1']}}</label>
                    <input type="varchar" maxlength="100" name="b_static_field1" id="b_static_field1"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        value="{{$reprintData->b_field1}}" readonly
                        {{$config['b_field1_mandatory'] == 'on' ? 'required' : ''}} />
                </div>

                <div class="form-group col-md-3 {{$config['b_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['b_static_field2']}}</label>
                    <input type="varchar" maxlength="100" name="b_static_field2" id="b_static_field2"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        value="{{$reprintData->b_field2}}" readonly
                        {{$config['b_field2_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['b_field3_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['b_static_field3']}}</label>
                    <input type="varchar" maxlength="100" name="b_static_field3" id="b_static_field3"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        value="{{$reprintData->b_field3}}" readonly
                        {{$config['b_field3_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['b_field4_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['b_static_field4']}}</label>
                    <input type="varchar" maxlength="100" name="b_static_field4" id="b_static_field4"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        value="{{$reprintData->b_field4}}" readonly
                        {{$config['b_field4_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <!-- </div>
                <div class="headingfont form-row "> -->
                <div class="form-group col-md-3 {{$config['b_field5_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['b_static_field5']}}</label>
                    <input type="varchar" maxlength="100" name="b_static_field5" id="b_static_field5"
                        class="required validate form-control form-control-sm" autocomplete="off"
                        value="{{$reprintData->b_field5}}" readonly
                        {{$config['b_field5_mandatory'] == 'on' ? 'required' : ''}} />
                </div>

                <div class="form-group col-md-3 {{$config['g_field1_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config->global_fieldname1}}</label>
                    <input type="varchar" maxlength="100" name="global_static_field1" id="global_static_field1"
                        class="required validate form-control form-control-sm" autocomplete="off" value="{{ $config->global_static_field1 }}"
                        value="{{$reprintData->gloabl_field1}}" readonly
                        {{$config['g_field1_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['g_field2_use'] == 'on' ? '' : 'hideField'}}">
                    <label>{{$config->global_fieldname2}}</label>
                    <input type="varchar" maxlength="100" name="global_static_field2" id="global_static_field2"
                        class="required validate form-control form-control-sm" autocomplete="off" value="{{ $config->global_static_field2 }}"
                        value="{{$reprintData->gloabl_field2}}" readonly
                        {{$config['g_field2_mandatory'] == 'on' ? 'required' : ''}} />
                </div>
                <div class="form-group col-md-3 {{$config['no_of_container_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['no_of_container']}}</label>
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
        <a href="/report" class="btn btn-secondary"
            style="float:left; color:#fff !important">Back</a>
    </div>
    <script>
       window.onload = function () {
        document.getElementById("download").addEventListener("click", () => {
            const report = document.getElementById("report");

            const options = {
                margin: 1,
                filename: 'report.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, logging: true },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
            };

            html2pdf().set(options).from(report).save();
        });
    }
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
</style>
@endsection
