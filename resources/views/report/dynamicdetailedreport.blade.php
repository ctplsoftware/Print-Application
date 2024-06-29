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
            </div>

            <div class="headingfont form-row">
            @if($reprintData->free_field1 != null)
                <div style="" class="form-group col-md-3 " id="freeField1Group">
                    <label> {{$designlabel->Freefield1_label_value}}
                    </label>

                    <input type="varchar" maxlength="100" name="freefield1" id="freefield1"
                        value="{{$reprintData->free_field1}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
                @endif
                <!-- @php(dump($reprintData->freefield2)) -->
                @if($reprintData->free_field2 != null)


                <div class="form-group col-md-3" id="freeField2Group">
                    <label>{{$designlabel->Freefield2_label_value}}                    </label>
                        <input type="varchar" maxlength="100" name="freefield2" id="freefield2"
                        value="{{$reprintData->free_field2}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>
                @endif
                @if($reprintData->free_field3 != null)
                <div style="" class="form-group col-md-3" id="freeField3Group">
                    <label>{{$designlabel->Freefield3_label_value}}
                    </label>
                    <input type="varchar" maxlength="100" name="freefield3" id="freefield3"
                        value="{{$reprintData->free_field3}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif
                @if($reprintData->free_field4 != null)
                <div class="form-group col-md-3" id="freeField4Group">
                    <label>{{$designlabel->Freefield4_label_value}}
                    </label>
                    <input type="varchar" maxlength="100" name="freefield4" id="freefield4"
                        value="{{$reprintData->free_field4}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif

                @if($reprintData->free_field5 != null)
                <div class="form-group col-md-3" id="freeField5Group">
                    <label>{{$designlabel->Freefield5_label_value}}
                    </label>
                    <input type="varchar" maxlength="100" name="freefield5" id="freefield5"
                        value="{{$reprintData->free_field5}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif

                @if($reprintData->free_field6 !=  null)
                <div class="form-group col-md-3" id="freeField6Group">
                    <label>{{$designlabel->Freefield6_label_value}}
                    </label>
                    <input type="varchar" maxlength="100" name="freefield6" id="freefield6"
                        value="{{$reprintData->free_field6}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif
                @if($reprintData->free_field7 !=  null)
                <div class="form-group col-md-3" id="freeField7Group">
                    <label>{{$designlabel->Freefield7_label_value}}
                    </label>
                    <input type="varchar" maxlength="100" name="freefield7" id="freefield7"
                        value="{{$reprintData->free_field7}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif
                @if($reprintData->free_field8 !=  null)
                <div class="form-group col-md-3" id="freeField8Group">
                    <label>{{$designlabel->Freefield8_label_value}}
                    </label>
                    <input type="varchar" maxlength="100" name="freefield8" id="freefield8"
                        value="{{$reprintData->free_field8}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif
                @if($reprintData->free_field9 !=  null)
                <div class="form-group col-md-3" id="freeField9Group">
                    <label>{{$designlabel->Freefield9_label_value}}
                    </label>
                    <input type="varchar" maxlength="100" name="freefield9" id="freefield9"
                        value="{{$reprintData->free_field9}}" readonly
                        class="required validate form-control form-control-sm" autocomplete="off" />
                </div>

                @endif

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
