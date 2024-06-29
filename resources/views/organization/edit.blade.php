@extends('layouts.app')
@section('content')
<form action="/organizationsave" id="formid" method="post">

    @csrf
    <div class="container-fluid"  style="padding-right:4%;padding-left:4%;">
        @if(session()->has('mess'))
        <div class="alert-success">
            {{ session()->get('mess') }}
        </div>
        @endif
        @if(session('submess'))
    <script>
        Swal.fire({
            title: "{{ session('submess') }}",
            showCancelButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: 'rgb(36 63 161)',
            background: 'rgb(105 126 157)',
            customClass: {
    title: 'my-custom-title-class',
  },        });
    </script>
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
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
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
            <div class="headingfont-bold card-header text-start bg-light"> Edit Location</div>
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label>Organization Name</label>
                        <input type="text" name="location_name" class="required form-control form-control-sm" maxlength="200"
                            value="{{$var2->organization_name}}" autocomplete="off" readonly />

                    </div>
                    

                   

                </div>
                <div class="form-row">
                    <input type="text" name="id" value="{{$var1->id}}" hidden></input>
                    <div class="form-group col-md-4">
                        <label>Manufacturing Location</label><span style="color:red;"> <b>*</b> </span>
                        <input type="text" name="manufacturing_location" required
                            class="required form-control form-control-sm" maxlength="100" autocomplete="off"
                            value="{{$location_name}}" />

                    </div>

                    <!-- <div class="form-group col-md-4">
                        <label>Manufacturer License Number</label><span style="color:red;"> <b>*</b> </span>
                        <input placeholder="" type="text" required name="manufacturer_import_license_no" maxlength="50"
                            class="required form-control form-control-sm" autocomplete="off"
                            value="{{$var1->manufacturer_import_license_no}}" />

                    </div> -->
                    

                    <div class="form-group col-md-4">
                        <label>Manufacturing Location Name (<i>To be printed on the label</i>)</label><span
                            style="color:red;"> <b>*</b> <span>
                                <input
                                    placeholder="Enter the Manufacturing Location/Company Name to be printed on the label"
                                    type="text" name="company_name_on_label" value="{{$var1->company_name_on_label}}"
                                    maxlength="100" class="required form-control form-control-sm"
                                    id="company_name_on_label" required>
                    </div>
                    <div class="form-group col-md-4">
        <label>Manufacturer License Number</label><span style="color:red;"> <b>*</b></span>
        <input placeholder="Enter the Manufacturer License Number" type="text"  id="manufacturer_import_license_no"
                                            name="manufacturer_import_license_no" maxlength="20"  value="{{unserialize($var1->manufacturer_import_license_no)}}" 
                                            class="required form-control manufacturer_import_license_no form-control-sm"
                                            autocomplete="off" required readonly/>
    </div>
                </div>
                <div class="form-row">


                    <!-- <div class="form-group col-md-4">
                        <label>Serial Shipping Container code</label>
                        <input placeholder="" type="number" name="Serial_Shipping_Container_code" maxlength="301"
                            id="Serial_Shipping_Container_code" value="" class="required form-control form-control-sm"
                            autocomplete="off" readonly />
                    </div> -->

                    <div class="form-group col-md-12">
                        <label>Address</label><span style="color:red;"> <b>*</b> </span>
                        <textarea placeholder="" id="address" type="text" required name="address"
                            class="required form-control form-control-sm" style="height:80px;" maxlength="300"
                            autocomplete="off" value="{{$var1->address}}">{{$var1->address}}</textarea>

                    </div>
                    <textarea placeholder="" id="address_val" type="hidden" required hidden
                            class="required form-control form-control-sm" style="height:80px;" maxlength="300"
                            autocomplete="off" value="{{$var1->address}}">{{$var1->address}}</textarea>
                </div>

               
                    <div class="col-md-4" style="margin-top:15px;">
                        <label>Status</label>
                        <select id="status" type="text" name="Status" class="readonly validate form-control form-control-sm"
                            autocomplete="off" style="margin-top:13px;" required>
                            @foreach ($status as $dat)
                            <option value="{{$dat}}" {{ ( $dat == $var1->Status ) ? 'selected' : '' }}>
                                {{ $dat }}
                            </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="originalstatus" value="{{$var1->Status}}">

                    </div>
                    
                </div>

                <input type="hidden" name="old_address" value="{{$var1->address}}">
                <input type="hidden" name="old_manufacturing_location" value="{{$location_name}}">
                <input type="hidden" name="old_company_name_on_label" value="{{$var1->company_name_on_label}}">
                <input type="hidden" name="old_manufacturer_import_license_no" value="{{$var1->manufacturer_import_license_no}}">
                <input type="hidden" name="old_Status" value="{{$var1->Status}}">
                <div>

                    <a href="/organizationfetch" class="btn btn-md btn-secondary"
                        style="color:white !important;">Back</a>
                    <button type="submit" class="btn btn-md btn-primary" style="float:right;"
                        id="submit1">Update</button>

                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function manufacturingLicNo(e) {
        var licno = $('#'+e).val();
        var licnoLength = $('.manufacturer_import_license_no').length;
        console.log(licno,e,licnoLength, "licno");
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
$(document).ready(function() {
    $("#pharmtracqr").html("PharmTracQR - Location Master");
    $(".alert").fadeOut(4000);
    // $('#submit1').on('click',function(e) {
    //     $('#formid').submit();
    //     $(this).attr('disabled',true);
    // });
    $(function() {
        $("input[name='gs1_code']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });
    $('#status').on('change', function() {
        $("#Comments").val(null);
        $("#Comments").attr('readonly', false);


    });
    $('#company_name').on('change', function() {
        var thisval = $(this).val();
        var comp_from_config = ($var2->location_name);
        // console.log(gs1_from_config, gs1_from_config[comp_from_config.indexOf(thisval)]);
    });
});


$(document).ready(function() {
   

        
    $("table.order-list").on("click", ".ibtnDel", function(event) {
        $(this).closest("tr").remove();
        counter -= 1
        if ($('.manufacturer_import_license_no').length < 3) {
            $('#addrow').show();
        }
    });
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

    // var addr = @json($var1->address);





    $(document).on('change', '#address', function(){
         var val = "";
         val = $('#address_val').val();
         var addr = $('#address').val();
        console.log(val, 'val');
        console . log(addr, 'addr');


        if(addr === val){
            console.log("in");

        }
        else{
            Swal.fire({
                title: 'Changes made here might affect the label design where this address is used',
                confirmButtonText: 'OK',
                confirmButtonColor: 'rgb(36 63 161)',
                background: 'rgb(105 126 157)',
            });
        }

    })



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
.my-custom-title-class {
  font-family: Arial, sans-serif !important;
  font-size: 20px !important;
}
</style>
@endsection
