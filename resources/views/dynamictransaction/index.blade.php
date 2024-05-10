@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
    <h2 class="headingfont-bold"></h2>
    <form action="/dynamicsave" method="post">
        @csrf
        <div class="headingfont form-row " style="padding-bottom:20px;padding-top:40px;">


            <div class="form-group col-md-3">
                <label>Label Name</label><span class="required-asterisk" style="color:red">*</span>
                <select name="label_name" required id="label_name"
                    class="form-control validate required form-control-sm">
                    <option value="" selected>-SELECT-</option>
                    @foreach($labelName as $key => $value)
                    <option value="{{$value->id}}"
                        data-labelposition="{{$value->Freefield1_labelposition}}|{{$value->Freefield2_labelposition}}|{{$value->Freefield3_labelposition}}|{{$value->Freefield4_labelposition}}|{{$value->Freefield5_labelposition}}|{{$value->Freefield6_labelposition}}">
                        {{$value->label_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3 ">
                <label>
                    Label Type
                </label>
                <input type="text" maxlength="100" id="label_type" name="label_type"
                    class="required validate form-control form-control-sm " autocomplete="off" readonly />

            </div>
            <div class="form-group col-md-3 ">
                <label>
                    Product Type
                </label>
                <input type="text" maxlength="100" id="product_type" name="product_type"
                    class="required validate form-control form-control-sm " autocomplete="off" readonly />

            </div>
            <div class="form-group col-md-3">
                <label>
                  {{$config->product_name}}
                </label>
                <select id="status" name="product_name" class=" form-control validate required form-control-sm"
                    required>
                    <option value="" selected>-Select-</option>
                    @foreach($productName as $product)
                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="headingfont form-row col-md-12" id="ff">

                <div style="" class="form-group col-md-3 " id="freeField1Group">
                    <label> <span id="freefield1name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield1" id="freefield1"
                        class="required validate form-control form-control-sm" autocomplete="off" required />
                </div>
                <div class="form-group col-md-3" id="freeField2Group">
                    <label><span id="freefield2name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield2" id="freefield2"
                        class="required validate form-control form-control-sm" autocomplete="off" required />
                </div>
                <div style="" class="form-group col-md-3" id="freeField3Group">
                    <label><span id="freefield3name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield3" id="freefield3"
                        class="required validate form-control form-control-sm" autocomplete="off" required />
                </div>
                <div class="form-group col-md-3" id="freeField4Group">
                    <label><span id="freefield4name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield4" id="freefield4"
                        class="required validate form-control form-control-sm" autocomplete="off" required />
                </div>
                <div class="form-group col-md-3" id="freeField5Group">
                    <label><span id="freefield5name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield5" id="freefield5"
                        class="required validate form-control form-control-sm" autocomplete="off" required />
                </div>
                <div class="form-group col-md-3" id="freeField6Group">
                    <label><span id="freefield6name"></span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <input type="varchar" maxlength="100" name="freefield6" id="freefield6"
                        class="required validate form-control form-control-sm" autocomplete="off" required />
                </div>
                
            </div>
         </div>
          <div class="form-row">
            <div class="form-group col-md-3 ">
                    <label>
                        No of Label
                    </label>
                    <input type="number" maxlength="100" name="no_of_label" id="" min='0' name="no_of_label"
                        class="required validate form-control form-control-sm " autocomplete="off" required />

                </div>

        </div>
        <div class="container-fluid" style="margin-top:3%;">
            <input type="submit" class="btn btn-primary" style="float:right;" id="submit_user" onclick="printDiv()"
                value="Print">
            <a href="/dynamic" class="btn btn-secondary" style="float:left; color:#fff !important">Back</a>
        </div>
    </form>
    <style>
    body {
        zoom: 80% !important;
    }

    .form-control {
        border: 1px solid #899097 !important;
        width:90% !important;
    }

    .form-row {
        padding-bottom: 10px !important;
    }

    .hideField {
        display: none;
    }
    </style>
    <script>
    // function printDiv() {
    //     // Redirect to another page when the "Print" button is clicked
    //     var label_name_value = $('#label_name').val();
    //     console.log(label_name_value);
    //     window.location.href = '/printdynamic/' + label_name_value;
    // }
    $(document).ready(function() {
        $("#printapplication").html("Print Application - Transaction Dynamic");
        function printDiv() {
            // Redirect to another page when the "Print" button is clicked
            var label_name_value = $('#label_name').val();
            console.log(label_name_value);
            window.location.href = '/printdynamic/' + label_name_value;
        }
        var lab = 'label_name';
        $('#' + lab).on('change', function() {
            var selectedLabel = $(this).find(':selected');
            console.log(selectedLabel);
            var labelPosition = selectedLabel.data('labelposition');

            var position_of_freefield = labelPosition.split('|');
            var freefield_inputs = ['freeField1Group', 'freeField2Group', 'freeField3Group',
                'freeField4Group', 'freeField5Group', 'freeField6Group'
            ];

            $("#ff").empty(); // Clear existing content

            $(position_of_freefield).each(function(key, value) {
                if (value !== '0px_0px_0px_0px_0px') {
                    var inputElement = $('<div class="form-group col-md-3"></div>');
                    inputElement.append('<label><span id="freefield' + (key + 1) +
                        'name"></span>' +
                        '<span class="required-asterisk" style="color:red">*</span></label>'
                        );
                    inputElement.append(
                        '<input type="varchar" maxlength="100" name="freefield' + (key +
                        1) +
                        '" id="freefield' + (key + 1) +
                        '" class="required validate form-control form-control-sm" autocomplete="off" required />'
                        );

                    $("#ff").append(inputElement);
                }

                $('#' + freefield_inputs[key]).toggle(value !== '0px_0px_0px_0px_0px');
            });
        });


        $('#labelname').val($(this).val());
    });


    $('#label_name').change(function() {
        // console.log('label name');
        const labelName = $('#label_name').val();
        // console.log(labelName);
        $.ajax({
            url: "{{ url('/labelNameDynamic') }}",
            type: "GET",
            data: {
                labelName: labelName,
            },
            success: function(result) {
                if (result.success) {
                    // console.log(result.success);
                    $('#product_type').val(result.success.product_type);
                    $('#label_type').val(result.success.label_type_name);
                } else {

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
                $('#freefield1name').text(result.success.freefieldnames.Freefield1_label_value);
                $('#freefield2name').text(result.success.freefieldnames.Freefield2_label_value);
                $('#freefield3name').text(result.success.freefieldnames.Freefield3_label_value);
                $('#freefield4name').text(result.success.freefieldnames.Freefield4_label_value);
                $('#freefield5name').text(result.success.freefieldnames.Freefield5_label_value);
                $('#freefield6name').text(result.success.freefieldnames.Freefield6_label_value);
            } else {

            }
        }
    });


    });

    
    </script>

    @endsection