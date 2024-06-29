@extends('layouts.app')
@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container-fluid">
    <div class="col-md-12 ">
        
    @if(Session::has('errorMessage'))
        <div class="alert alert-danger">
            {{ Session::get('errorMessage') }}
        </div>
        @endif

        @if(session()->has('update'))
        <div class="alert alert-success">
            {{ session()->get('update') }}
        </div>
        @endif
       

        
        <div class="form-row">
            <!-- <h3 class="headingfont-bold">Location Master</h3> -->
            <div class="col-md-12">
        
            <div class="col-md-2 nonheadingfont" id="downloadpdf"style="float:left;margin-bottom:10px; ">

            <i class="fa fa-file-pdf-o" style="cursor:pointer; color:red;font-size:30px;padding-left:30px;" id="download"data-toggle="tooltip" data-placement="top" title="Download as PDF"></i>
            </div>
        
                <div>
                    <table class="table table-md table-bordered tablefix_mtop" id="approve" style="width:100%">
                        <thead class="nonheadingfont-bold thead-light nonheadingfont">
                            <tr>
                                <th>S.No</th>
                                <th class="centerAlign">Manufacturing Location</th>
                                <th class="centerAlign">Manufacturer License Number</th>
                                <th class="centerAlign">Address</th>
                                <th class="centerAlign">Status</th>                               
                                <th class="centerAlign">Creaetd By</th>                               
                                <th class="centerAlign">Updated By</th>                               
                                <th class="centerAlign">Creatd At</th>                               
                                <th class="centerAlign">Updated at</th>                               



                            </tr>
                        </thead>
                        <tbody>

                            @foreach($var as $key=> $data)
                            <tr class="nonheadingfont col-sm-12">
                                <td>{{$i}}</td>

                                <td>
                                    <a href="/organizationedit/{{$data->id}}">{{ $data->location_name }}</a>
                                  
                                </td>
                                <td>
                                {{unserialize($data->manufacturer_import_license_no)}}
                                    
                                </td>
                                <td>{{ $data->address}}
                                </td>
                                <td>{{ $data->Status}}</td>
                                <td>
                                @php($updtname = App\Models\User::find($data->created_by))

                                {{ $updtname ? $updtname->name : '' }}
                                </td>
                                @php($updtname = App\Models\User::find($data->updated_by))

                                <td>
                                {{ $updtname ? $updtname->name : '' }}
                                </td>
                                <td>
                                    {{$data->created_at}}
                                </td>
                                <td>
                                    {{$data->updated_at}}
                                </td>
                                
                            </tr>
                            @php($i++)
                            @endforeach


                        </tbody>
                    </table>
                    
                  
                    <a href="{{route('organization.index')}}" class="btn  btn-primary"
                    style="float:right; margin-top:20px; color:white !important">Add New</a>
                       
                   
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
//     
    $('#approve').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });  
});


$(document).ready(function() {
    $("#printapplication").html("Print Application - Organization List");
    $(".alert").fadeOut(6000);
    

    $('#download').click(function() {
        $("#approve").DataTable().destroy();
       
        $(".add_break_td .row").after("<br />");
        let doc = new jsPDF({
            orientation: 'landscape'
        });
        days = [ 'Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'];
        months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        var header_footer = function(data) {
            doc.setFontSize(11);
            doc.setTextColor(40);
            doc.setFontStyle('italic');
            currDate = new Date();
            
            prettyDate = days[currDate.getDay()] + ', ' + months[currDate.getMonth()] + ' ' 
                + currDate.getDate() + ' ' + currDate.getFullYear() + ' ' + ("0" + currDate.getHours()).slice(-2) 
                + ':' + ("0" + currDate.getMinutes()).slice(-2) + ':' + ("0" + currDate.getSeconds()).slice(-2);
            
            doc.text("Printed by: " + @json(Auth::user()->name) + "   Printed on: " + prettyDate, 
                doc.internal.pageSize.width / 2, doc.internal.pageSize.height - 8, 'center');
            // doc.text(data.pageNumber + " of " + data.pageCount, doc.internal.pageSize.width / 2, doc.internal.pageSize.height-12, 'center');
            
        };
        doc.autoTable({
            html: '#approve',
            columnStyles: {
                0: {cellWidth: 15},
                1: {cellWidth: 45},
                2: {cellWidth: 40},
                3: {cellWidth: 40},
                4: {cellWidth: 30},
                5: {cellWidth: 30},
                6: {cellWidth: 30},
                7: {cellWidth: 30},
                8: {cellWidth: 30},
            },
            didDrawPage: header_footer,
        });
        for (var i = 1; i <= doc.internal.getNumberOfPages(); i++) {
            doc.setPage(i);
            doc.setFontSize(11);
            doc.setTextColor(40);
            doc.setFontStyle('italic');
            doc.text(i + " of " + doc.internal.getNumberOfPages(), doc.internal.pageSize.width / 2, doc
                .internal.pageSize.height - 12, 'center');

        }
        
        doc.save('location_master.pdf');
        $('.add_break_td').find('br').remove();
        $("#approve").DataTable();



});



});




</script>
<style>
    td{
        word-break:break-word;
    }
    .swal-wide{
        width:25%;
        font-size: 16px !important;
        color:white;
        text-align:center;
    }   
   
    .my-custom-title-class {
  font-family: Arial, sans-serif !important;
  font-size: 20px !important; 
}

</style>
@endsection


