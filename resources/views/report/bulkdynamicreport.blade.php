@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- old excel script first 10 records only display -->
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<!-- new script for all records download -->
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<div class="container-fluid">
    <i id="exportButton" class="fa fa-file-excel-o"
        style="color:green;font-size:32px;margin-left:2.7%;margin-bottom:1%;cursor:pointer;" data-toggle="tooltip"
        data-placement="top" title="Export as Excel" aria-hidden="true"></i>
    <div class="col-md-12 scroll">
        <!-- <div style="overflow-x: auto;"> -->
        <table class="table table-md table-bordered tablefix_mtop" id="tabel">
            <thead class="nonheadingfont-bold thead-light" style="top:0% !important">
                <tr>
                    <th>S.No</th>
                    <!-- product level -->
                    <th class="centerAlign">Free Field1</th>
                    <th class="centerAlign">Free Field2</th>
                    <th class="centerAlign">Free Field3</th>
                    <th class="centerAlign">Free Field4</th>
                    <th class="centerAlign">Free Field5</th>
                    <th class="centerAlign">Free Field6</th>
                    <th class="centerAlign">Free Field7</th>
                    <th class="centerAlign">Free Field8</th>
                    <th class="centerAlign">Free Field9</th>
                    <th>No of Copies</th>
                    @if (Auth::user()->role_id == 1)

                    <th class="centerAlign">Manufacturing Location</th>
                    @endif
                    <th class="centerAlign">Printed By</th>
                    <th class="centerAlign">Printed Date</th>
                    <th class="centerAlign">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach($dynamicreport as $data)
                <tr class="nonheadingfont col-sm-12">
                    <td style="white-space: nowrap;">{{$i}}</td>
                    <td>{{ isset(explode(':',$data->Freefield1_value)[0]) && !empty(explode(':',$data->Freefield1_value)[0]) ? explode(':',$data->Freefield1_value)[0] : '-' }}</td>
                    <td>{{ isset(explode(':',$data->Freefield2_value)[0]) && !empty(explode(':',$data->Freefield2_value)[0]) ? explode(':',$data->Freefield2_value)[0] : '-' }}</td>
                    <td>{{ isset(explode(':',$data->Freefield3_value)[0]) && !empty(explode(':',$data->Freefield3_value)[0]) ? explode(':',$data->Freefield3_value)[0] : '-' }}</td>
                    <td>{{ isset(explode(':',$data->Freefield4_value)[0]) && !empty(explode(':',$data->Freefield4_value)[0]) ? explode(':',$data->Freefield4_value)[0] : '-' }}</td>
                    <td>{{ isset(explode(':',$data->Freefield5_value)[0]) && !empty(explode(':',$data->Freefield5_value)[0]) ? explode(':',$data->Freefield5_value)[0] : '-' }}</td>
                    <td>{{ isset(explode(':',$data->Freefield6_value)[0]) && !empty(explode(':',$data->Freefield6_value)[0]) ? explode(':',$data->Freefield6_value)[0] : '-' }}</td>
                    <td>{{ isset(explode(':',$data->Freefield7_value)[0]) && !empty(explode(':',$data->Freefield7_value)[0]) ? explode(':',$data->Freefield7_value)[0] : '-' }}</td>
                    <td>{{ isset(explode(':',$data->Freefield8_value)[0]) && !empty(explode(':',$data->Freefield8_value)[0]) ? explode(':',$data->Freefield8_value)[0] : '-' }}</td>
                    <td>{{ isset(explode(':',$data->Freefield9_value)[0]) && !empty(explode(':',$data->Freefield9_value)[0]) ? explode(':',$data->Freefield9_value)[0] : '-' }}</td>
                    <td>{{$data->no_of_copies}}</td>
                    @if (Auth::user()->role_id == 1)

                    @php
                    $ctdtunit = DB::table('organization_master')->where('id', $data->unit_id)->first();
                @endphp

                <td>{{ $ctdtunit ? $ctdtunit->location_name : 'N/A' }}</td>
                @endif
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->created_at}}</td>
                    <td><a href="/bulkdynamicreport/{{$data->bulktransaction_id}}"><button class="btn btn-sm btn-info">View</button></a></td>
                </tr>

                @php
                $i++
                @endphp
                @endforeach
            </tbody>
        </table>
        <!-- </div> -->
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
           max-width:auto !important;
           min-width:auto !important;
    }
</style>

@endsection
