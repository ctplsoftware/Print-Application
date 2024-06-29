@extends('layouts.app')
@section('content')

<form action="/organizationcreate" method="post" id="formABC">
    @csrf
    <div class="container-fluid">
        <!-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>
            </div>
        @endif -->
        @if(session()->has('mess'))
    <div class="alert alert-danger">
        {{ session()->get('mess') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        @if(session()->has('catch'))
        <input type="hidden" name="" id="catch" value="{{session()->get('catch')}}">
        <script>
        $(document).ready(function() {
            if ($('#catch').val() != undefined) {
                Swal.fire({
                    html: $('#catch').val(),
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                    customClass: 'swal-wide',
                });
            }
        })
        </script>
        @endif
        @if(session()->has('error'))
        <input type="hidden" name="" id="error" value="{{session()->get('error')}}">
        <script>
        $(document).ready(function() {
            if ($('#error').val() != undefined) {
                Swal.fire({
                    html: $('#error').val(),
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                    customClass: 'swal-wide',
                });
            }
        })
        </script>
        @endif
        <!-- @if (count($errors) > 0)
        <script>
            var title = '';
        </script>
            @foreach ($errors->all() as $key => $error)
                @if($error == "The company name on label field is required.")

                    <script>
                        title += " Manufacturing Location field. <br> ";
                    </script>
                @endif
                @if($error == "The manufacturer import license no field is required.")

                    <script>
                        title += " Manufacturer import license no field. <br>";
                    </script>
                @endif
                @if($error == "The address field is required.")
                <script>
                        title += " Address field. <br> ";
                </script>
                @endif
                @if($error == "The gs1 code field is required.")

                    <script>
                        title += " GLN code field. <br> ";
                    </script>
                @endif
                @if($error == "The manufacturing location field is required.")

                    <script>
                        title += " Manufacturing location name (To be printed on the label ) field. <br> ";
                    </script>
                @endif
            @endforeach
            <script>
                Swal.fire({
                    html: '<b class="validation">Please check out the following fields:</b> <br>'+title,
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                    customClass: 'swal-wide',
                });
            </script>
        @endif  -->
        <div class="card">
            <div class="headingfont-bold card-header text-start bg-light"> Create Location</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Organization Name</label>
                        <input type="text" name="location_name" class="required form-control form-control-sm" maxlength="200"
                            value="{{$var1->organization_name}}" autocomplete="off" readonly />

                    </div>

                    

                   

                </div>
                <div class="form-row">
    <div class="form-group col-md-4">
        <label>Manufacturing Location Name</label><span style="color:red;"> <b>*</b></span>
        <input type="text" name="manufacturing_location" maxlength="100"
            class="required form-control form-control-sm"
            placeholder="Enter the Manufacturing Location Name" autocomplete="off" required />
    </div>

    <div class="form-group col-md-4">
        <label>Manufacturing Location Name (<i>To be printed on the label</i> )</label><span style="color:red;"> <b>*</b></span>
        <input placeholder="Enter the Manufacturing Location/Company Name to be printed on the label"
            type="text" maxlength="100" name="company_name_on_label"
            class="required form-control form-control-sm" id="company_name_on_label" required>
    </div>

    <div class="form-group col-md-4">
        <label>Manufacturer License Number</label><span style="color:red;"> <b>*</b></span>
        <input placeholder="Enter the Manufacturer License Number" type="text"
            name="manufacturer_import_license_no" maxlength="20" id="manufacturer_import_license_no-0"
            class="required form-control manufacturer_import_license_no form-control-sm"
            autocomplete="off" required />
    </div>
</div>

                    
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Address</label><span style="color:red;"> <b>*</b> <span>
                                <textarea placeholder="Enter the Address" type="text" name="address" id="address" maxlength="300"
                                    class="required form-control form-control-sm" autocomplete="off"
                                    style="height:80px;" required></textarea>
                    </div>
                </div>

                
<br><br>
                <div>
                    <a href="/organizationfetch" class="btn btn-md btn-secondary" style="color:white !important;"
                        type="button">Back</a>

                    <span class="btn btn-md btn-secondary" onclick="window.location.reload();">Clear</span>

                    <button type="submit" class="btn btn-md btn-primary" style="float:right;"
                        id="submit1">Submit</button>
                </div>

            </div>
        </div>
    </div>
</form>
<script>

function manufacturingLicNo(e) {
    var licno = $('#'+e).val();
    var licnoLength = $('.manufacturer_import_license_no').length;
    console.log(licno,e, "licno");
    for(var i=0; i <= licnoLength; i++)
    {
        if($('#'+e).val() != '')
        {
            if(e != ('manufacturer_import_license_no-'+i) )
            {
                if(($('#'+e).val().trim()).toLowerCase() == ($('#manufacturer_import_license_no-'+i).val().trim()).toLowerCase())
                {
                    $('#'+e).val('');
                    Swal.fire({
                        title: 'This manufacturer import license no is already exists.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                }
            }
        }

    }
}


$("#address").on('keyup change',function(e){
        var textareaValue = $('#address').val();
        var textarealength = $('#address').val().length;
        var hasLineBreaks = textareaValue.match(/(\r\n|\r|\n)/g);
        var numLineBreaks = hasLineBreaks ? hasLineBreaks.length : 0;
        var maxlength=$('#address').attr('maxlength');
        console.log(maxlength,  numLineBreaks,'numLineBreaks');
          if (numLineBreaks>0 && textarealength>=(301-(numLineBreaks))) {
            var newValue = textareaValue.slice(0, -1);
            $('#address').val(newValue);
            Swal.fire({
                    title: 'You cannot exceed 300 character for this field',
                     // showCancelButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                });
          }
         
    });    
// function manufacturingLicNo(e) {
//     var inputVal = $('#' + e).val().trim().toLowerCase();

//     if (inputVal === '') {
//         return;
//     }

//     $('.manufacturer_import_license_no').each(function (i) {
//         if (e !== 'manufacturer_import_license_no-' + i) {
//             var compareVal = $(this).val().trim().toLowerCase();
//             if (inputVal === compareVal) {
//                 $('#' + e).val('');
//                 Swal.fire({
//                     title: 'This manufacturer import license no is already exists.',
//                     confirmButtonText: 'OK',
//                     confirmButtonColor: 'rgb(36 63 161)',
//                     background: 'rgb(105 126 157)',
//                 });
//             }
//         }
//     });
// }

$(document).ready(function() {
    $(".alert").fadeOut(2000);

    $("#pharmtracqr").html("PharmTracQR - Location Master");

    // $('#submit1').on('click',function(e) {
    //     $("#formABC").attr('action','/organizationcreate');
    //     $("#formABC").submit();

    //     $(this).attr('disabled',true);
    // });

    $(function() {
        $("input[name='gs1_code']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });

    $("#formABC").submit(function(e) {

        //stop submitting the form to see the disabled button effect
        // e.preventDefault();
        //disable the submit button
        $("#submit1").attr("disabled", true);
        return true;
    });

    $('#glncode').on('change', function() {
        // console.log('test');
        var gln = $('#glncode').val();
        var gln_length = gln.length;
        var gln_1 = gln.padStart(5, "0");
        $('#glncode').val(gln_1);

        $.ajax({
            url: "{{url('/glnvalidations')}}",
            type: "Get",
            data: {
                gln_1: gln_1,
            },
            dataType: 'json',
            success: function(result) {
                console.log(result);
                if (result == "exist") {
                    Swal.fire({
                        title: 'This code is already used for other products',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                    $('#glncode').val('');
                } else {}
            }
        });
    });

    

    var Id = @json($var2);
    var firstdigit = Id.id + 1;
    console.log(firstdigit);
    var gs1codee = @json($var1);
    var gs1prefix = gs1codee.gs1code;
    var finalgs1prefix = gs1prefix.padEnd(11, '0');
    var five_digit_increament = '00001';
    var firstseventeendigit = firstdigit.toString() + finalgs1prefix.toString() + five_digit_increament
        .toString();
    var check = ((firstseventeendigit.charAt(0) * 3) + (
        firstseventeendigit.charAt(1) * 1) + (
        firstseventeendigit.charAt(2) * 3) + (
        firstseventeendigit.charAt(3) * 1) + (
        firstseventeendigit.charAt(4) * 3) + (
        firstseventeendigit.charAt(5) * 1) + (
        firstseventeendigit.charAt(6) * 3) + (
        firstseventeendigit.charAt(7) * 1) + (
        firstseventeendigit.charAt(8) * 3) + (
        firstseventeendigit.charAt(9) * 1) + (
        firstseventeendigit.charAt(10) * 3) + (
        firstseventeendigit.charAt(11) * 1) + (
        firstseventeendigit.charAt(12) * 3) + (
        firstseventeendigit.charAt(13) * 1) + (
        firstseventeendigit.charAt(14) * 3) + (
        firstseventeendigit.charAt(15) * 1) + (
        firstseventeendigit.charAt(16) * 3));

    if (check.toString().slice(-1) == '0') {
        console.log('0 in ');
        var finaleighteendigit = firstseventeendigit.toString() + '0';
        // var finaleighteendigitend = firstseventeendigitend.toString() + '0' ;
        // console.log(finaleighteendigit);
    } else {
        var checkdigit = (10 - parseInt(check.toString().slice(-1)));
        var finaleighteendigit = firstseventeendigit.toString() +
            checkdigit;
        // var finaleighteendigitend = firstseventeendigitend.toString() + checkdigit;
    }
    $('#Serial_Shipping_Container_code').val(finaleighteendigit);


});

$(document).ready(function() {
    var packty = document.getElementsByClassName('manufacturer_import_license_no');
    var counter = packty.length++;
    $("#addrow").on("click", function() {
        var newRow = $("<tr>");
        var cols = "";

        cols +=
        `<td class="col-sm-5"><input placeholder="Enter the Manufacturer License Number" type="text" name="manufacturer_import_license_no[]" maxlength="21"
            id="manufacturer_import_license_no-${counter}" onchange="manufacturingLicNo(this.id)" class="required form-control manufacturer_import_license_no form-control-sm" autocomplete="off" required /></td>`;

        cols +=
            '<td><i class="ibtnDel fa fa-trash " style="color:red;  margin-left:-23px; cursor:pointer;"></i> </td></tr>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        if ($('.manufacturer_import_license_no').length == 3) {
            $('#addrow').hide();
        }
        counter++;
    });

    $("table.order-list").on("click", ".ibtnDel", function(event) {
        $(this).closest("tr").remove();
        counter -= 1
        if ($('.manufacturer_import_license_no').length < 3) {
            $('#addrow').show();
        }
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

tbody,
td {
    background-color: #fff !important;
    border: 1px solid #fff !important;
    font-size: 14px;
}

/* .validation{
    font-size:22px;
    color:white;
} */
</style>
@endsection
