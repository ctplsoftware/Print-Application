@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
    <h2 class="headingfont-bold"></h2>
    <form action="/bulkuploaddynamicsave" method="post">
        @csrf
        <div class="headingfont form-row " style="padding-bottom:20px;padding-top:40px;">
            <div class="form-group col-md-3">
                <label>Label Name</label><span class="required-asterisk" style="color:red">*</span>
                <select name="label_id" required id="label_name" class="form-control validate required form-control-sm">
                    <option value="" selected>-SELECT-</option>
                    @foreach($labelName as $key => $value)
                    <option value="{{$value->id}}"
                        data-labelposition="{{$value->Freefield1_labelposition}}|{{$value->Freefield2_labelposition}}|{{$value->Freefield3_labelposition}}|{{$value->Freefield4_labelposition}}|{{$value->Freefield5_labelposition}}|{{$value->Freefield6_labelposition}}">
                        {{$value->label_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="excelupload">Choose File</label>
                <input type="file" accept=".xls,.xlsx" name="excelupload" id="excelupload" onchange="handleFile(event)">
            </div>

            <div class="headingfont form-row col-md-12" id="ff">

                <div style="" class="form-group col-md-3 " id="freeField1Group">
                    <label> <span id="freefield1name">Free Field 1</span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <select type="varchar" maxlength="100" name="freefield1" id="freefield1"
                        class="required validate form-control form-control-sm freeFieldsDropdown" autocomplete="off"
                        required />
                    <option value="">--select--</option>
                    </select>
                </div>
                <div class="form-group col-md-3" id="freeField2Group">
                    <label><span id="freefield2name">Free Field 2</span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <select type="varchar" maxlength="100" name="freefield2" id="freefield2"
                        class="required validate form-control form-control-sm freeFieldsDropdown" autocomplete="off"
                        required />
                    <option value="">--select--</option>
                    </select>
                </div>
                <div style="" class="form-group col-md-3" id="freeField3Group">
                    <label><span id="freefield3name">Free Field 3</span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <select type="varchar" maxlength="100" name="freefield3" id="freefield3"
                        class="required validate form-control form-control-sm freeFieldsDropdown" autocomplete="off"
                        required />
                    <option value="">--select--</option>
                    </select>
                </div>
                <div class="form-group col-md-3" id="freeField4Group">
                    <label><span id="freefield4name">Free Field 4</span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <select type="varchar" maxlength="100" name="freefield4" id="freefield4"
                        class="required validate form-control form-control-sm freeFieldsDropdown" autocomplete="off"
                        required />
                    <option value="">--select--</option>
                    </select>
                </div>
                <div class="form-group col-md-3" id="freeField5Group">
                    <label><span id="freefield5name">Free Field 5</span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <select type="varchar" maxlength="100" name="freefield5" id="freefield5"
                        class="required validate form-control form-control-sm freeFieldsDropdown" autocomplete="off"
                        required />
                    <option value="">--select--</option>
                    </select>
                </div>
                <div class="form-group col-md-3" id="freeField6Group">
                    <label><span id="freefield6name">Free Field 6</span>
                        <span class="required-asterisk" style="color:red">*</span>

                    </label>
                    <select type="varchar" maxlength="100" name="freefield6" id="freefield6"
                        class="required validate form-control form-control-sm freeFieldsDropdown" autocomplete="off"
                        required />
                    <option value="">--select--</option>
                    </select>
                </div>

            </div>

        </div>
        <div id="excelTable">

        </div>

        <div class="container-fluid" style="margin-top:3%;">
            <div class="row">
                <div class="col-md-3">
                    <a href="" class="btn btn-secondary" style="float:left; color:#fff !important">Back</a>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3" style="display:inline-flex">
                    <label for="duplicate_copies" style="white-space: nowrap;margin-top: 2%;padding: inherit;"><b>Duplicate copies :</b></label>
                    <input class="form-control" name="duplicate_copies" style="float:right;margin-right:10px" readonly value="1" id="duplicate_copies">
                </div>
                <div class="col-md-3" >

                    <input type="submit" class="btn btn-primary" style="float:right;" value="printpreview" name="printpreview" id="submit_user"
                    value="Print">
                    <input type="hidden" value="printpreview" name="printpreview">
                    <input class="btn btn-secondary" style="float:right;margin-right:10px" value="submit" id="excelvalues">
                </div>
            </div>



        </div>
    </form>
    <style>
    body {
        zoom: 80% !important;
    }

    .form-control {
        border: 1px solid #899097 !important;
        width: 90% !important;
    }

    .form-row {
        padding-bottom: 10px !important;
    }

    .hideField {
        display: none;
    }
    .btn{
        display: inline;
    }
    </style>
    <script>
    function handleFile(event) {
        var files = event.target.files;
        var f = files[0];
        var reader = new FileReader();
        var fieldname = [];
        var freefieldmeta = [];

        reader.onload = function(event) {
            var data = new Uint8Array(event.target.result);
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            // Get the range of the sheet

            workbook.SheetNames.forEach(function(sheetName) {
                var sheet = workbook.Sheets[sheetName];
                var range = XLSX.utils.decode_range(sheet['!ref']);

                // Iterate through each column in the first row and extract the key
                for (var C = range.s.c; C <= range.e.c; ++C) {
                    var cell_address = {
                        c: C,
                        r: range.s.r
                    };
                    var cell_ref = XLSX.utils.encode_cell(cell_address);
                    var cell = sheet[cell_ref];
                    freefieldmeta.push(cell ? cell.v : undefined);
                }
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook
                    .Sheets[
                        sheetName]);
                XL_row_object.forEach(function(row) {
                    for (var key in row) {
                            if (row.hasOwnProperty(key)) {
                                var newKey = key.trim().replace(/"/g, ''); // Trim the key and remove double quotes
                                if (key !== newKey) {
                                    row[newKey] = row[key]; // Assign the value to the new key
                                    delete row[key]; // Remove the old key
                                }
                            }
                    }
                });
                    // Now XL_row_object will contain the data with cleaned column names
                productList = JSON.parse(JSON.stringify(XL_row_object));
                var productListJSON_tolocalstorage = JSON.stringify(productList);

                // Store the JSON string in local storage
                localStorage.setItem('productList', productListJSON_tolocalstorage);
            })
            freeFieldsDropdown(freefieldmeta);

        };
        reader.readAsArrayBuffer(f);
    }

    function freeFieldsDropdown(freefieldmeta) {
        var options = '';
        $.each(freefieldmeta, function(key, value) {
            options += `<option value="${value}">${value}</option>`;
        })
        $(".freeFieldsDropdown").append(options)
        $("#excelvalues").prop('disabled',false);
    }
    function printDiv() {

            // Redirect to another page when the "Print" button is clicked
            var label_name_value = $('#label_name').val();
            window.location.href = '/printdynamic/' + label_name_value;
        }
    $(document).ready(function() {
        $("#printapplication").html("Print Application - Transaction Dynamic-Bulk Upload");
        // empty saved localstorage
        localStorage.removeItem('productList');
        $("#excelupload,.freeFieldsDropdown,#submit_user,#excelvalues").prop('disabled',true);
        var productList = '';



        $('#label_name').on('change', function() {
            var selectedLabel = $(this).find(':selected');
            var labelPosition = selectedLabel.data('labelposition') == undefined ?
                '0px_0px_0px_0px_0px' : selectedLabel.data('labelposition');
            var position_of_freefield = labelPosition.split('|');
            var freefield_inputs = ['freeField1Group', 'freeField2Group', 'freeField3Group',
                'freeField4Group', 'freeField5Group', 'freeField6Group'
            ];

            $("#ff").empty(); // Clear existing content

            $(position_of_freefield).each(function(key, value) {
                if (value !== '0px_0px_0px_0px_0px') {
                    var inputElement = $('<div class="form-group col-md-3"></div>');
                    inputElement.append('<label><span class="obtainedfreefields" id="freefield' + (key + 1) +
                        'name"></span>' +
                        '<span class="required-asterisk" style="color:red">*</span></label>'
                    );
                    inputElement.append(
                        '<select type="varchar" maxlength="100" name="freefield' + (key +
                            1) +
                        '" id="freefield' + (key + 1) +
                        '" class="required validate form-control form-control-sm freeFieldsDropdown " autocomplete="off" required />' +
                        '<option value="">--select--</option>' +
                        '</select>'
                    );

                    $("#ff").append(inputElement);


                }else{
                    $("#submit_user,#excelvalues").prop('disabled',true);
                    // $("#excelupload").prop('disabled',true);

                }

                $('#' + freefield_inputs[key]).toggle(value !== '0px_0px_0px_0px_0px');
                $("#excelupload").prop('disabled',false);
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
                        $('#freefield1name').text('Free field 1');
                        $('#freefield2name').text('Free field 2');
                        $('#freefield3name').text('Free field 3');
                        $('#freefield4name').text('Free field 4');
                        $('#freefield5name').text('Free field 5');
                        $('#freefield6name').text('Free field 6');
                    } else {

                    }
                }
            });
        });

        $('#excelvalues').click(function() {
            var freeFieldColumns = []; // Correct array declaration

            $(".obtainedfreefields").each(function(){
                var valueOfFreeField = $(this).text();
                console.log(valueOfFreeField,'valueOfFreeField');
                var substring = valueOfFreeField.split('Free field')[1];

                freeFieldColumns.push(substring.trim()); // Push the substring to the array
            });
            console.log(freeFieldColumns);
            $("#excelTable").empty();
            var columns = [];
            var productListJSON_fromlocalstorage = localStorage.getItem('productList');

            // Parse the JSON string to get back the productList object
            productListJSON_fromlocalstorage = JSON.parse(productListJSON_fromlocalstorage);

            var table = `<table class="nonheadingfont table table-bordered"> <thead>`;
            table += `<th><input id="checkall" name="checkall" value='True' type="checkbox"></th>`
            $(".freeFieldsDropdown").each(function() {
                columns.push($(this).val());
                table += `<th>${$(this).val()}</th>`
            });
            table += ` </thead><tbody>`
            $(productListJSON_fromlocalstorage).each(function(rowkey, rowvalue) {
                table +=
                    `<tr><td><input name="checked_transaction[]" value='${rowkey+1}' class="checkboxId" type="checkbox">`
                $(columns).each(function(key, value) {
                    table +=
                        `<td><input type="hidden" name="freefield_${freeFieldColumns[key]}[]" value='${rowvalue[value.trim()]==undefined?'':rowvalue[value.trim()]}'>${rowvalue[value.trim()]==undefined?'':rowvalue[value.trim()]}</td>`
                });
                table += `</tr>`
            })


            table += `</tr></tbody></table>`

            $("#excelTable").append(table);
            $("#excelvalues").hide();
            $("#duplicate_copies").prop('readonly',false);

        })
        $(document).on('change','#checkall',function(){
            $(this).is(":checked")==true?$(".checkboxId").prop('checked',true):$(".checkboxId").prop('checked',false);
        })
        $(document).on('change', '.checkboxId, #checkall', function() {
            var anyChecked = $('.checkboxId:checked').length > 0 || $('#checkall').is(":checked");
            $("#submit_user").prop('disabled', !anyChecked);
        });

        $(document).on('change','.checkboxId',function(){
            var checkedCondition = $('.checkboxId').length == $('.checkboxId:checked').length;
            $("#checkall").prop('checked', checkedCondition);
        })
        $(document).on('change','.freeFieldsDropdown',function(){
            $("#excelvalues").show();
            });
    });
    </script>

    @endsection
