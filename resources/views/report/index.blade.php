@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- old excel script first 10 records only display -->
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<!-- new script for all records download -->
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
@if($ReportPermission['view'])
<div class="container-fluid">
    <i id="exportButton" class="fa fa-file-excel-o"
        style="color:green;font-size:32px;margin-left:2.7%;margin-bottom:1%;cursor:pointer;" data-toggle="tooltip"
        data-placement="top" title="Export as Excel" aria-hidden="true"></i>
    <div class="col-md-12 scroll">
        <div style="overflow-x: auto;">
        <table class="table table-md table-bordered tablefix_mtop" id="tabel">
            <thead class="nonheadingfont-bold thead-light" style="top:0% !important">
                <tr>
                    <th>S.No</th>
                    <!-- product level -->
                    @if($config_data->product_name_mandatory == 'off')
                    <th class="centerAlign" style="min-width:250px !important;max-width:250px !important;">{{$config_data->product_name}}</th>
                    @endif
                    @if($config_data->product_id_mandatory == 'off')
                    <th  style="min-width:80px !important;max-width:80px !important;">{{$config_data->product_id}}</th>
                    @endif
                    @if($config_data->batch_mandatory == 'on')
                    <th style="min-width:80px !important;max-width:80px !important;">{{$config_data->batch_number}}</th>
                    @endif
                    @if($config_data->no_of_container_mandatory == 'on')
                    <th style="min-width:80px !important;max-width:80px !important;">{{$config_data->no_of_container}}</th>
                    @endif
                    @if($config_data->no_of_container_mandatory == 'on')
                    <th style="min-width:80px !important;max-width:80px !important;">{{'Label Count'}}</th>
                    @endif
                    @if($config_data->date_of_manufacturing_mandatory == 'on')
                    <th style="min-width:80px !important;max-width:80px !important;">{{$config_data->date_of_manufacturing}}</th>
                    @endif
                    @if($config_data->date_of_expiry_mandatory == 'on')
                    <th style="min-width:80px !important;max-width:80px !important;">{{$config_data->date_of_expiry}}</th>
                    @endif
                    @if($config_data->date_of_retest_mandatory == 'on')
                    <th style="min-width:80px !important;max-width:80px !important;">{{$config_data->date_of_retest}}</th>
                    @endif
                    @if($config_data->p_comments_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->comments}}</th>
                    @endif
                    @if($config_data->p_field1_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field1}}</th>
                    @endif
                    @if($config_data->p_field2_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field2}}</th>
                    @endif
                    @if($config_data->p_field3_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field3}}</th>
                    @endif
                    @if($config_data->p_field4_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field4}}</th>
                    @endif
                    @if($config_data->p_field5_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field5}}</th>
                    @endif
                    @if($config_data->p_field6_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field6}}</th>
                    @endif
                    @if($config_data->p_field7_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field7}}</th>
                    @endif
                    @if($config_data->p_field8_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field8}}</th>
                    @endif
                    @if($config_data->p_field9_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field9}}</th>
                    @endif
                    @if($config_data->p_field10_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->p_static_field10}}</th>
                    @endif
                    <!-- batch level -->

                    @if($config_data->b_field1_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->b_static_field1}}</th>
                    @endif
                    @if($config_data->b_field2_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->b_static_field2}}</th>
                    @endif
                    @if($config_data->b_field3_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->b_static_field3}}</th>
                    @endif
                    @if($config_data->b_field4_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->b_static_field4}}</th>
                    @endif
                    @if($config_data->b_field5_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->b_static_field5}}</th>
                    @endif
                    <!-- global level -->
                    @if($config_data->g_field1_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->global_fieldname1}}</th>
                    @endif
                    @if($config_data->g_field2_mandatory == 'on')
                    <th class="centerAlign">{{$config_data->global_fieldname2}}</th>
                    @endif
                    @if (Auth::user()->role_id == 1)

                    <th class="centerAlign">Manufacturing Location</th>
                    @endif
                    <th style="min-width:100px !important;max-width:100px !important;">Created By</th>
                    <th style="min-width:120px !important;max-width:120px !important;">Created Date & Time</th>

                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach($reportDetail as $data)
                <tr class="nonheadingfont col-sm-12">
                    <td >{{$i}}</td>
                    <!-- Product level -->
                    @if($config_data->product_name_mandatory == 'off')
                    <td ><a href="/detailedreport-pr/{{ $data->id }}">{{$data->product_name}}</a></td>
                    @endif
                    @if($config_data->product_id_mandatory == 'off')
                    <td >{{$data->product_id}}</td>
                    @endif
                    @if($config_data->batch_mandatory == 'on')
                    <td >{{$data->batch_number}}</td>
                    @endif
                    @if($config_data->no_of_container_mandatory == 'on')
                    <td class="centerAlign">{{$data->no_of_container}}</td>
                    @endif
                    @if($config_data->no_of_container_mandatory == 'on')
                    <td class="centerAlign">{{$data->total_reprint_count + $data->no_of_container}}</td>
                    @endif
                    @if($config_data->date_of_manufacturing_mandatory == 'on')
                    <td >{{$data->date_of_manufacturing}}</td>
                    @endif
                    @if($config_data->date_of_expiry_mandatory == 'on')
                    <td >{{$data->date_of_expiry}}</td>
                    @endif
                    @if($config_data->date_of_retest_mandatory == 'on')
                    <td >{{$data->date_of_retest}}</td>
                    @endif
                    @if($config_data->p_comments_mandatory == 'on')
                    <td >{{$data->comments}}</td>
                    @endif
                    @if($config_data->p_field1_mandatory == 'on')
                    <td >{{$data->static_field1}}</td>
                    @endif
                    @if($config_data->p_field2_mandatory == 'on')
                    <td >{{$data->static_field2}}</td>
                    @endif
                    @if($config_data->p_field3_mandatory == 'on')
                    <td >{{$data->static_field3}}</td>
                    @endif
                    @if($config_data->p_field4_mandatory == 'on')
                    <td >{{$data->static_field4}}</td>
                    @endif
                    @if($config_data->p_field5_mandatory == 'on')
                    <td >{{$data->static_field5}}</td>
                    @endif
                    @if($config_data->p_field6_mandatory == 'on')
                    <td >{{$data->static_field6}}</td>
                    @endif
                    @if($config_data->p_field7_mandatory == 'on')
                    <td >{{$data->static_field7}}</td>
                    @endif
                    @if($config_data->p_field8_mandatory == 'on')
                    <td >{{$data->static_field8}}</td>
                    @endif
                    @if($config_data->p_field9_mandatory == 'on')
                    <td >{{$data->static_field9}}</td>
                    @endif
                    @if($config_data->p_field10_mandatory == 'on')
                    <td >{{$data->static_field10}}</td>
                    @endif
                    <!-- Batch level -->

                    @if($config_data->b_field1_mandatory == 'on')
                    <td >{{$data->b_field1}}</td>
                    @endif
                    @if($config_data->b_field2_mandatory == 'on')
                    <td >{{$data->b_field2}}</td>
                    @endif
                    @if($config_data->b_field3_mandatory == 'on')
                    <td >{{$data->b_field3}}</td>
                    @endif
                    @if($config_data->b_field4_mandatory == 'on')
                    <td >{{$data->b_field4}}</td>
                    @endif
                    @if($config_data->b_field5_mandatory == 'on')
                    <td >{{$data->b_field5}}</td>
                    @endif
                    <!-- Global level -->
                    @if($config_data->g_field1_mandatory == 'on')
                    <td >{{$config_data->global_static_field1}}</td>
                    @endif
                    @if($config_data->g_field2_mandatory == 'on')
                    <td >{{$config_data->global_static_field2}}</td>
                    @endif
                    @if (Auth::user()->role_id == 1)

                    @php
                    $ctdtunit = DB::table('organization_master')->where('id', $data->unit_id)->first();
                @endphp

                <td>{{ $ctdtunit ? $ctdtunit->location_name : 'N/A' }}</td>
                @endif
                    <td >{{$data->username}}</td>
                    <td >{{$data->created_at}}</td>


                </tr>
                @php
                $i++
                @endphp
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#tabel').DataTable();
    $("#printapplication").html("Print Application - Report");
    $("#exportButton").click(function() {
        var table = $("#tabel").DataTable();
        var newTable = $("<table>").addClass("table table-bordered table-striped table-hover");
        // Copy the header row to the new table
        var headerRow = table.columns().header();
        console.log(headerRow);
        var newHeaderRow = $("<tr>");
        headerRow.each(function(index, element) {
            var cell = $("<th>").html(index.textContent);
            newHeaderRow.append(cell);
        });
        newTable.append($("<thead>").append(newHeaderRow));
        // Copy the rest of the rows to the new table
        table.rows().every(function() {
            var row = $("<tr>");
            var rowData = this.data();
            rowData.forEach(function(cellData) {
                var cell = $("<td>").html(cellData);
                row.append(cell);
            });
            newTable.append(row);
        });
        // Convert the new table to an Excel file
        TableToExcel.convert(newTable.get(0), {
            name: "Reports.xlsx",
            sheet: {
                name: "Report"
            }
        });
    });
});
</script>
<style>
.swal-wide {
    width: 25%;
    font-size: 16px !important;
    color: white;
    text-align: center;
}
/* this code is used for break the long character words in the table to avoid big width */
td{
        word-break:break-word !important;
    }
    .centerAlign{
        max-width:250px !important;
        min-width:250px !important;
    }
</style>
@endif
@endsection
