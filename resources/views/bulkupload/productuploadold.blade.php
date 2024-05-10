@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<style>   
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.9);
        /* semi-transparent black color */
        filter: brightness(100%);
        /* reduce brightness by 50% */
        backdrop-filter: blur(5px);
        width: 200%;
        height: 200%;
    }

    .selected-color{
        background-color: rgb(253, 142, 142) !important;
    }
</style>
<div>
    <div class="row col-md-12">
        <div class="col-md-2 nonheadingfont-bold" style="margin-left:100px;">
            <span style="color:red">Note :</span> Please Validate before uploading
        </div>
        <div class="col-md-3 nonheadingfont-bold" style="margin-left:100px;">
            <span style="color:red">Note :</span> Date format - dd/mm/yyyy
        </div>
    </div><br>

    <div class="row col-md-12">
        <div class="col-md-3 " >
            <i class="fa fa-file-excel-o " aria-hidden="true" style="font-size: 35px; color:#15a671; float: left;  margin-left: 90px;" id="">
                <span style="font-size:14px;color:black; font-family :arial;"> Download sample excel</span>
                <a id="excel_icon" style="font-size:16px;color:blue;font-family:Arial;margin-bottom:20px !important;cursor:pointer;"><u>  here..</u></a>
            </i>
        </div>
        <div class="col-md-1 ">
            <input type="file" class="myinput " id="import_file" style=" float:left; cursor:pointer;">
        </div>        

        <div class="col-md-1">
            <button type="button" class="  btn btn-secondary btn-md" id="refresh-button" style="float:right;margin-right: -717px !important;"> Refresh</button>
        </div> 
        
        <div class="col-md-1" id="upload-msg">
            <button type="button" class="  btn btn-md" id="upload-button" style="background-color: #80d1da;float:right;margin-right:20px !important;"> upload</button>
        </div> 
    </div><br>
  
    <form action=""  method="">
    @csrf
        <div class="table-responsive div-responsive">
            <table class="table table bordered table-responsive div-responsive" id="grouptable">
                <thead>
                <tr>
                    <th>S.No</th>
                    <!-- product level -->
                    @if($config_data->product_name_mandatory == 'off')
                    <th class="centerAlign">{{$config_data->product_name}}</th>
                    @endif
                    @if($config_data->product_id_mandatory == 'off')
                    <th class="centerAlign">{{$config_data->product_id}}</th>
                    @endif
                    @if($config_data->p_comments_use == 'on')
                    <th class="centerAlign">{{$config_data->comments}}</th>
                    @endif
                    @if($config_data->p_field1_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field1}}</th>
                    @endif
                    @if($config_data->p_field2_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field2}}</th>
                    @endif
                    @if($config_data->p_field3_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field3}}</th>
                    @endif
                    @if($config_data->p_field4_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field4}}</th>
                    @endif
                    @if($config_data->p_field5_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field5}}</th>
                    @endif
                    @if($config_data->p_field6_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field6}}</th>
                    @endif
                    @if($config_data->p_field7_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field7}}</th>
                    @endif
                    @if($config_data->p_field8_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field8}}</th>
                    @endif
                    @if($config_data->p_field9_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field9}}</th>
                    @endif
                    @if($config_data->p_field10_use == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field10}}</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="product_name log_item"   maxlength='5' name='product_name' ></td>
                        <td class="product_id log_item" name="product_id"></td>
                        <td class="comments log_item" name="comments"></td>
                        <td class="static_field1 log_item" name="static_field1"></td>
                        <td class="static_field2 log_item" name="static_field2"></td>
                        <td class="static_field3 log_item" name="static_field3"></td>
                        <td class="static_field4 log_item" name="static_field4"></td>
                        <td class="static_field5 log_item" name="static_field5"></td>
                        <td class="static_field6 log_item" name="static_field6"></td>
                        <td class="static_field7 log_item" name="static_field7"></td>
                        <td class="static_field8 log_item" name="static_field8"></td>
                        <td class="static_field9 log_item" name="static_field9"></td>
                        <td class="static_field10 log_item" name="static_field10"></td>
                   
                    </tr>
                </tbody>
                <div id="dataContainer"></div>
                <div id="message-container"></div>
                <div id="c1_name-message" style="display: none;"></div>
            </table>
            <div class="row col-md-12">
                <div class="col-md-5">
                    <a href="/" class="homepage"data-toggle="tooltip" data-placement="top" title="Go to home page" style="color:black !important;float:left;" type="button">
                      <button class="btn btn-secondary">Back</button>
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>       


<script>

    $(document).ready(function() {        

        // Implicit declarations

        $("#printapplication").html("Print Application -  Bulk upload"); 

        $('#upload-button').hide();

        document.getElementById('import_file').addEventListener('change', handleFileSelect, false);        

        // Upload flag to restrict multiple upload AJAX requests 
        let isUpload = true;

        // Event listeners
        $("#refresh-button").click(function() {
            location.reload();   
        });

        $("#excel_icon").click(function() {
            $(".log-tab").each(function() {
                var inputValue = $(this).val();
                $(this).after("<p>" + inputValue + "</p>");
                $(this).hide();
            });

            var table = document.getElementById("grouptable");
            var newTable = document.createElement("table");

            // Create the header row
            var headerRow = newTable.insertRow();
            for (var j = 0; j < table.rows[0].cells.length; j++) {
                if (j !== 90) {
                    var cell = headerRow.insertCell();
                    cell.innerHTML = table.rows[0].cells[j].innerHTML;
                }
            }

            // Create the sample values row
            var sampleRow = newTable.insertRow();

            var sampleValues = ["", "", "","dd/mm/yyyy","","","" ];

            for (var j = 0; j < table.rows[0].cells.length; j++) {
                if (j !== 90) {
                    var cell = sampleRow.insertCell();
                    // Set the sample values here
                    cell.innerHTML = sampleValues[j] || ""; 
                }
            }

            // Convert the new table to an Excel file
            TableToExcel.convert(newTable, {
                name: "productupload.xlsx",
                sheet: {
                name: "Sheet 1"
                }
            });

            $(".log-tab").remove();
            $(".log-tab").show();
        });

        $("#upload-button").click(function(e) {
            e.preventDefault(); 
            if (!isUpload) {
                return;
            }           
            $.ajax({
                type: "POST",
                url: "/product/upload",
                data: {
                    productList: productList,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('#modal-dialogsuccess').modal('show');
                    $('.modal-title').text('Uploaded Successfully.');
                    $('.modal-body p').text('Data uploaded successfully.');  
                    $('#upload-button').hide();
                    $('#upload-msg').html("Excel uploaded successfully!");
                    isUpload = false;                  
                },
                error: function(xhr, status, error) {
                    $('#modal-dialogwarning').modal('show');
                    $('.modal-title').text('Error.');
                    $('.modal-body p').text('Error uploading data. Please try again.');
                }
            });
        });

        // Helper functions
        function showMessage(message, type) {
            var messageContainer = document.getElementById("message-container");
            messageContainer.innerHTML = message;
            messageContainer.className = "alert alert-" + type; 
        }

        function handleFileSelect(evt) {
            var files = evt.target.files; // FileList object
            var xl2json = new ExcelToJSON();    
            xl2json.parseExcel(files[0]);
        }

        var ExcelToJSON = function() {
            this.parseExcel = function(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result;
                    var workbook = XLSX.read(data, {
                        type: 'binary'
                    });
                    workbook.SheetNames.forEach(function(sheetName) {
                    var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    productList = JSON.parse(JSON.stringify(XL_row_object));

                    // Insert empty values with empty string
                    var duplicateProductList = productList;
                    const tableHeader =getTableHeader();
                    productList = [];

                    duplicateProductList.forEach(function(dupProduct){
                        let product = {};
                        tableHeader.forEach(function(key) {
                            if(dupProduct[key] == undefined){
                                product[key] = "";    
                            } else {
                                product[key] = dupProduct[key];                          
                            }
                        });
                        productList.push(product);
                    })
                    document.getElementById('dataContainer').innerHTML = '';
                    var tableBody = document.getElementById('grouptable').getElementsByTagName('tbody')[0];
                    tableBody.innerHTML = '';
                    renderTableRows(productList, tableBody);
                    var hasDuplicates = highlightDuplicates();
                    if (hasDuplicates) {
                      showDuplicateValuesWarning();
                    } else {
                      showUploadButton();
                      checkColumnValidations(productList);
                    }
                    
                    });
                }
                reader.onerror = function(ex) {
                }
                reader.readAsBinaryString(file);
            }
        }

        function getTableHeader(){
            let tableHeader = [];
            tableHeader.push("{{$config_data->product_name}}");
            tableHeader.push("{{$config_data->product_id}}");
            tableHeader.push("{{$config_data->comments}}");
            tableHeader.push("{{$config_data->static_field1}}");
            tableHeader.push("{{$config_data->static_field2}}");
            tableHeader.push("{{$config_data->static_field3}}");
            tableHeader.push("{{$config_data->static_field4}}");
            tableHeader.push("{{$config_data->static_field5}}");
            tableHeader.push("{{$config_data->static_field6}}");
            tableHeader.push("{{$config_data->static_field7}}");
            tableHeader.push("{{$config_data->static_field8}}");
            tableHeader.push("{{$config_data->static_field9}}");
            tableHeader.push("{{$config_data->static_field10}}");

            return tableHeader;
        }

        function renderTableRows(productList, tableBody) {
            productList.forEach(function(product, index) {
                var rowData = Object.values(product);
                var row = tableBody.insertRow(index);
                rowData.forEach(function(value) {
                    var cell = row.insertCell();
                    cell.textContent = value;
                });
            });
        }

        function showDuplicateValuesWarning() {
            // Show warning modal for duplicate values
            $('#modal-dialogwarning').modal('show');
            $('.modal-title').text('Duplicate values found. Please upload with valid data.');
            $('#upload-button').hide();
        }

        function showUploadButton() {
            // Show the upload button
            $('#upload-button').show();
        }

        function checkColumnValidations(productList) {
            $.ajax({
                url: '/asset-master/validate-upload',
                type: 'POST',
                data: {
                    excelData: productList,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // console.log("AJAX response", response);
                    let status = response.status;
                    let data = response.data;
                    let errorMessage = "";
                    // Add column header as class to that column
                    let temp = $('thead tr th:nth-child(1)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(1)').addClass(temp);
                    temp = $('thead tr th:nth-child(2)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(2)').addClass(temp);   
                    temp = $('thead tr th:nth-child(3)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(3)').addClass(temp);
                    temp = $('thead tr th:nth-child(4)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(4)').addClass(temp);   
                    temp = $('thead tr th:nth-child(5)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(5)').addClass(temp);
                    temp = $('thead tr th:nth-child(6)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(6)').addClass(temp);
                    temp = $('thead tr th:nth-child(7)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(7)').addClass(temp);  
                    temp = $('thead tr th:nth-child(8)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(8)').addClass(temp); 
                    temp = $('thead tr th:nth-child(9)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(9)').addClass(temp); 
                    temp = $('thead tr th:nth-child(10)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(10)').addClass(temp); 
                    temp = $('thead tr th:nth-child(11)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(11)').addClass(temp); 
                    temp = $('thead tr th:nth-child(12)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(12)').addClass(temp); 
                    temp = $('thead tr th:nth-child(13)').text().trim().replace(/\s+/g, '');
                    $('tbody tr td:nth-child(13)').addClass(temp); 
                                      

                    switch (status) {
                        case "validationError":
                            var validationKeys = Object.keys(data);                    
                            validationKeys.forEach(key => {
                                let validationError = key.split(".");
                                let index = validationError[0];
                                let errorClass = validationError[1].trim().replace(/\s+/g, '');
                                let selectedElements = $(`.${errorClass}:eq(${index})`);
                                // console.log("3", key);
                                let errorMsg = data[key][0];
                                selectedElements.addClass('selected-color');
                                selectedElements.attr('title', errorMsg);
                                $('#modal-dialogwarning').modal('show');
                                $('.modal-title').text('Error');
                                $('.modal-body p').text("Please check all the data");
                            });
                            $("#upload-button").hide();
                        break;

                        case "validationSuccess":
                            $("#upload-button").show();
                            $('#modal-dialogwarning').modal('show');
                            $('.modal-title').text('success');
                            $('.modal-body p').text("Data validated successfuly. Proceed to upload.");
                        break;

                        default:
                            console.log("Unknown error which won't hit");
                        break;
                    }                    
                },
                error: function(xhr, status, error) {}
            });
        }

        function updateLogItems(productList) {
            var rows = $('#grouptable tbody');
            for (i = 0; i < productList.length; i++) {
                var columns = Object.values(productList[i]);
                $('.log_item').each(function() {
                    if ($(this).text() == columns[1]) {
                        if (productList[i]['c1_short_code'] == undefined || $(this).closest('tr').find('.c1_short_code').val() == productList[i]['c1_short_code']) {} else {
                            console.log(productList[i]['c1_short_code'], 'cvf');
                            $(this).closest('tr').find('.c1_short_code').css('background-color', '#a4f8a5');
                            $(this).closest('tr').find('.c1_short_code').val(productList[i]['c1_short_code']);
                        }
                        if (productList[i]['c1_name'] == undefined || $(this).closest('tr').find('.c1_name').val() == productList[i]['c1_name']) {} else {
                            $(this).closest('tr').find('.c1_name').css('background-color', '#a4f8a5');
                            $(this).closest('tr').find('.c1_name').val(productList[i]['c1_name']);
                        }
                        if (productList[i]['c1_description'] == undefined || $(this).closest('tr').find('.c1_description').val() == productList[i]['c1_description']) {} else {
                            $(this).closest('tr').find('.c1_description').css('background-color', '#a4f8a5');
                            $(this).closest('tr').find('.c1_description').val(productList[i]['c1_description']);
                        }
                    }
                });
            }
        }

        function highlightDuplicates() {
            const columnSelectors = [
                'tbody tr td:nth-child(1)',
               
            ];

            const cells = document.querySelectorAll(columnSelectors.join(','));
            const duplicates = {};
            let hasDuplicates = false;

            cells.forEach((cell) => {
                const column = cell.cellIndex + 1;
                const value = cell.textContent.trim();

                if (duplicates[column]) {
                    if (duplicates[column].values.has(value)) {
                        cell.style.backgroundColor = 'yellow';
                        cell.setAttribute('title', 'Duplicate entry');
                        hasDuplicates = true;
                    } else {
                        duplicates[column].values.add(value);
                    }
                } else {
                    duplicates[column] = {
                        values: new Set([value]),
                    }
                }
            });

            return hasDuplicates;
        }

    });

</script>

@endsection