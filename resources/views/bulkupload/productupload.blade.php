@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<div class="container-fluid" style="padding-left:5%;padding-right:5%;xcddffdddddddddddddddddddddddddddddddddddddddddddddddddddddddddffd ">
    <div class="w3-responsive">
        @if(Session::has('successMessage'))
        <div class="alert alert-success">
            {{ Session::get('successMessage') }}
        </div>
        @endif
        @if(Session::has('errorMessage'))
        <div class="alert alert-danger">
            {{ Session::get('errorMessage') }}
        </div>
        @endif
        {{-- <form action="/import" method="post" id="formid" enctype="multipart/form-data"> --}}
            <div class="row col-md-12">
           <div class="col-md-8"> <input type="file" name="file" accept=".xlsx" onchange="displayExcelData(this)">
            </div>
            <div class="col-md-4"> <span style="color:red">*</span> Special characters such as $, _, }, {, ], [, ; ?, <,>,",', | are not
                    allowed</div>
            </div>
            <div style="margin-top:1.5%;">
            <div class="nonheadingfont col-md-4" style="float:left;margin-top:6px;"> Download sample template
                <u><a href="/bulkuploadproduct" style="color:Blue !important; cursor:pointer;">click here</a></u>
                <!-- <span id="button-excel" style="color:Blue !important; cursor:pointer"><u>Here</u></span><br> -->

                    <!-- <a href="/fetch" class="headingfont btn btn-md btn-secondary"
                        style="float:right; color:white !important;">Back</a> -->
            </div>

            </div>
            @csrf
            <table id="tblItems" style="margin-top:5%;font-size:11px"
                class="table table-striped table-bordered table-hover text-center table-active:hover">
                <thead style="background-color:#f9be00">
                    <tr id="headtr">

                        <!-- product level -->
                        <th class="centerAlign">S.No</th>
                        @if($config_data->product_name_mandatory == "off")
                        <th class="centerAlign">{{$config_data->product_name}}</th>
                        @endif
                        @if($config_data->product_id_mandatory == "off")
                        <th class="centerAlign">{{$config_data->product_id}}</th>
                        @endif
                        @if($config_data->comments_use == "on")
                        <th class="centerAlign">{{$config_data->comments}}</th>
                        @endif
                        @if($config_data->serialization == 'user-input' && $config_data->product == 'on')
                        <th class="centerAlign">{{'Serial'}}</th>
                        @endif
                        @if($config_data->serialization == 'user-input' && $config_data->product == 'on')
                        <th class="centerAlign">{{'Increment/Decrement'}}</th>
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
                <tbody id="excelDataBody">
                    <tr>
                        <td colspan="15">No data available in table</td>
                    </tr>
                </tbody>
            </table>
            <div style="float: right">
                <button class="btn-primary" id="import-data" type="submit" disabled>Submit</button>
            </div>
        {{-- </form> --}}
        <div class="row">

        </div>
    </div>


</div>

<script>
    var config = @json($config_data);
    console.log(config);
      // Function to validate the form before submission
      function validateForm() {
        var fileInput = document.getElementById('file');
        console.log(fileInput);
        if (fileInput.files.length === 0) {
            alert('Please upload an Excel file.');
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
    // Function to initially display table header
    function displayTableHeader() {
        var tableHead = document.getElementById('headtr');
        tableHead.innerHTML = '';

        // Add your th elements based on $config_data

        // For example:
        tableHead.innerHTML += '<th>S.No</th>';
        if ('{{$config_data->product_name_mandatory}}' == 'off') {
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->product_name}}</th>';
        }
        if('{{$config_data->product_name_mandatory}}' == 'off'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->product_id}}</th>';
        }
        if('{{$config_data->comments_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->comments}}</th>';
        }
        if('{{$config_data->serialization}}' == 'user-input'  && '{{$config_data->product}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{'Serial'}}</th>';
        }
        if('{{$config_data->serialization}}' == 'user-input'  && '{{$config_data->product}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{'Increment/Decrement'}}</th>';
        }
        if('{{$config_data->p_field1_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field1}}</th>';
        }
        if('{{$config_data->p_field2_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field2}}</th>';
        }
        if('{{$config_data->p_field3_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field3}}</th>';
        }
        if('{{$config_data->p_field4_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field4}}</th>';
        }
        if('{{$config_data->p_field5_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field5}}</th>';
        }
        if('{{$config_data->p_field6_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field6}}</th>';
        }
        if('{{$config_data->p_field7_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field7}}</th>';
        }
        if('{{$config_data->p_field8_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field8}}</th>';
        }
        if('{{$config_data->p_field9_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field9}}</th>';
        }
        if('{{$config_data->p_field10_use}}' == 'on'){
            tableHead.innerHTML += '<th class="centerAlign">{{$config_data->p_static_field10}}</th>';
        }

        // Repeat the above for other fields
        // Display the table
        document.getElementById('tblItems').style.display = 'table';
    }

    // Function to display Excel data in the table body
    function displayExcelData(input) {
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, { type: 'binary' });
            var sheetName = workbook.SheetNames[0];
            var excelData = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName]);
            displayDataInTable(excelData);
            highlightDuplicates(excelData);
        };
        reader.readAsBinaryString(file);
    }

    // Function to display data in the table body
    function displayDataInTable(data) {
    var tableBody = document.getElementById('excelDataBody');
    tableBody.innerHTML = '';

    data.forEach(function (row, index) {
        var tr = document.createElement('tr');
        tr.id = `row-${index}`; // Set the ID of each row

        var serialNumberCell = document.createElement('td');
        serialNumberCell.appendChild(document.createTextNode(index + 1));
        tr.appendChild(serialNumberCell);

        for (var key in row) {
            if (key !== '__rowNum__') { // Ensure not to include any internal keys like '__rowNum__'
                var td = document.createElement('td');
                td.appendChild(document.createTextNode(row[key]));
                tr.appendChild(td);
            }
        }

        tableBody.appendChild(tr);
    });
}

    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    // Function to highlight duplicates
    function highlightDuplicates(data) {
        console.log(data, 'data');

        $.ajax({
            url: "{{ url('/validate-products') }}", // Replace with your actual endpoint
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({ products: data }),
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(responseData) {
                console.log(responseData,'responseData');
                highlightRows(responseData);
            },
        });
    }

    function highlightRows(validationResults) {
    let allDuplicates = true;
    validationResults.forEach((result, index) => {
        const row = document.getElementById(`row-${index}`);
        if (result.isDuplicateInRequest || result.existsInDatabase) {
            row.style.backgroundColor = '#ef8181';
            row.classList.add('red-row');
        } else {
            row.style.backgroundColor = '';
            row.classList.remove('red-row');
            allDuplicates = false;
        }
    });

    // Disable the import button if all rows are duplicates
    $('#import-data').prop('disabled', allDuplicates);
}



    // Call the function to display the table header on page load
    displayTableHeader();
    $("#feedback").fadeOut(2000);


    $(document).ready(function() {
    var config = @json($config_data);
    var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Assuming CSRF token is in a meta tag

    $('#import-data').click(function() {
        var allRows = [];

        // Get table headers
        var headers = [];
        $('#tblItems thead th').each(function(index, th) {
            headers.push($(th).text().trim());
        });

        $('#tblItems tbody tr').each(function() {
            if ($(this).hasClass('red-row')) {
                return true;
            }
            var rowData = {};
            $(this).find('td').each(function(index, td) {
                rowData[headers[index]] = $(td).text().trim();
            });

            allRows.push(rowData);
        });

        $.ajax({
            url: '/product-submit',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ rows: allRows }),
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                Swal.fire({
                    text: response.message,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
        });
    });
});


</script>
@endsection
