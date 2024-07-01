    @extends('layouts.app')
@section('content')
    <!-- Shipping label design view  2.O by navin on 16/10/2023 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" defer></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" defer></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@if(session('swal'))
    <script>
         Swal.fire({
                        html: 'Invalid Password !!',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',

                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    });
    </script>
@endif
    <form action="/labelupdate/{{ $shipper_print->id }}" id="formId" method ="Post" enctype="multipart/form-data">
        @csrf
        @if(session()->has('success'))
        <input type="hidden" name="" id="message" value="{{session()->get('success')}}">
        <script>
        $(document).ready(function() {

            if ($('#message').val() == 'Form updated successfully.') {
                console.log('check');

                Swal.fire({
                                html: 'Label Updated successfully',
                                showCancelButton: false,
                                confirmButtonText: 'OK',
                                confirmButtonColor: 'rgb(36 63 161)',

                                background: 'rgb(105 126 157)',
                                customClass: 'swal-wide',
                            })


            }
            else if ($('#message').val() == 'label sends approval.') {
        console.log('check');

        Swal.fire({
                        html: ' Label sent for an approval',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',

                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })

    }
        });
        </script>
        @endif
        <div class="container">
            @if (session()->has('mess'))
                <div class="alert alert-success">
                    {{ session()->get('mess') }}
                </div>
            @endif

            @if (session()->has('catch'))
                <input type="hidden" name="" id="catch" value="{{ session()->get('catch') }}">
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
            <div style="width:100%; text-align:left; height:100%;margin-top: -15px;">
                <input type="text" id="hiddentype" name="hiddentype" value="Shipping label" hidden>
                <input type="text" value="{{ $shipper_print->id }}" hidden>
                <table style="width:106%;min-height: 600px; border-radius:25px !important; text-align:left; height:100%; ">
                    <tr>
                        <td style="background-color:#F0F0F0;border-top-left-radius: 25px;border-top-right-radius: 25px; padding:10px;text-align:right;zoom:85%;"
                            colspan="2">
                                    @if($shipper_print->label_type_dynamic_predefined == 'predefined')
                                        <label style="color:#000;margin-right:15px;float:left;font-size: 18px !important;font-weight:bold;"><input type="radio"
                                        style="margin-right:5px;cursor:pointer;" class="predefined_dynamic"
                                        name="predefined_dynamic" value="predefined"
                                        {{ $shipper_print->label_type_dynamic_predefined == 'predefined' ? 'checked' : '' }}
                                        id="predefined-btn" style="">Predefined</label>
                                    @else
                                        <label style="color:#000;float:left;font-size: 18px !important;font-weight:bold;"><input type="radio"
                                        style="margin-right:5px;cursor:pointer" class="predefined_dynamic"
                                        name="predefined_dynamic" value="dynamic"
                                        {{ $shipper_print->label_type_dynamic_predefined == 'dynamic' ? 'checked' : '' }}
                                        id="dynamic-btn" style="">Dynamic</label>
                                    @endif


                            <div
                                style="float:right; display:inline-block; padding-inline: 5%;font-size: 16px !important;font-weight:bold;">
                                <span id="labelwidthIdentifer">{{ $shipper_print->label_width }}</span><span>mm</span>
                                <span>x</span>
                                <span id="labelheightIdentifer">{{ $shipper_print->label_height }}</span><span>mm</span></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#fff !important;border-top-left-radius: 25px; padding-bottom:15px;">
                            <!-- <h3 class="headingfont"> <b style="color:#000;"> shipper Label Config </b></h3> -->
                        </td>
                        <td rowspan="8" id="ruler_div"
                            style="background-color:#F0F0F0;border:1px solid #000;padding-left:31px;padding-top:39px">
                            <div style="position:relative;top: -56.3%;">
                                <div style="position:absolute;left: 8%;">
                                    <ul class="ruler-x">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>


                                    </ul>
                                </div>
                            </div>
                            <div style="position:relative;top: -50%;">
                                <div id="ruler_change" style="position:absolute;left: -19%;pointer-events:none;">


                                    <ul class="ruler-y">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                </div>
                                </ul>
                            </div>
                            <div id="ruler_body" style="position:relative;top: -50%;">
                                <div style="position:absolute;left: 0.9%;" id="containerdiv">
                                </div>
                                <span id="span_QRcode_nonstore" class="showqrcode" style="position:absolute; left:500px; top:50px;"></span>
                                @if($config_data->g_image1_use === 'on')
                                <span id="global_image1" class="global" style="position: absolute; left:600px; top:130px; display:none">
                                    <img src="{{ asset('storage/' . $config_data->g1_image) }}" class="global_image" id="global_image1_img" style="height: 100px; width: 100px"  alt="No Image">
                                </span>
                                @endif
                                @if($config_data->g_image1_use === 'on')
                                <span id="global_image2" class="global" style="position: absolute; left:600px;  top:180px; display:none">
                                    <img src="{{ asset('storage/' . $config_data->g2_image) }}" class="global_image" id="global_image2_img" style="height: 100px; width: 100px"  alt="No Image">
                                </span>
                                @endif
                                @if($config_data->image1_use == "on")
                                <span id="label_image1" class="global" style="position: absolute; left:600px;  top:230px; display:none;"></span>
                                @endif
                                @if($config_data->image2_use == "on")
                                <span id="label_image2" class="global" style="position: absolute; left:600px;  top:280px; display:none;"></span>
                                @endif

                            </div>



            </div>
            </td>
            </tr>
            <tr>
                <td style=" text-align:left; width:25%; background-color:fff;box-shadow: 0 3px 6px #73737380;">
                    <div style="white-space:nowrap;">
                        <span class="inactive active mouseup" style="margin-right:30px;" id="text_tab"><b>Text</b></span>
                        @if($shipper_print->code_type === 'QRcode' || $shipper_print->code_type === 'GS1' || $shipper_print->code_type === 'Barcode')
                        <span class="inactive mouseup" style="margin-right:30px;" id="QR_tab"><b>Barcode</b></span>
                        @else
                        <span class="inactive mouseup" style="margin-right:30px; display:none;" id="QR_tab"><b>Barcode</b></span>
                        @endif
                        <span class="inactive mouseup" style="margin-right:30px;" id="Label_tab"><b>Size</b></span>
                        <span class="inactive mouseup" id="Style_tab"><b>Style</b></span>
                    </div>

                    <table id="Text_content" class="content"
                        style="height:250px;overflow-y:scroll; display:block !important;">
                        <!-- <tr>
                                <td style="text-align:left; white-space:nowrap">
                                    <input type="checkbox"  name="Store_location_label" id="Store" style="margin-left:10px;margin-top:10px">
                                    &nbsp;Store Location Label
                                </td>
                            </tr> -->
                        <tr style="  position:sticky; top:-5px;">
                            <td style="text-align:left;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="selectall" name="selectall" class="nonstore_check viewpermission"
                                    style="margin-left:10px; ">&nbsp; <em style="font-weight:600; font-size:12px;">Select
                                    all</em>
                            </td>

                            <td style="text-align:left;z-index: 100;white-space:nowrap;">
                                &nbsp; <em style="font-weight:600; font-size:12px;">Print field
                                    name</em>
                            </td>


                        </tr>
                        <!-- <tr style="  position:sticky; top:35px;">
                                    <td colspan="2"
                                    style="text-align:left;z-index: 100;white-space:nowrap;background-color: #fff;font-size:13  px">
                                        <input type="checkbox"class="viewpermission nonstore"  id="addressofmfg" style="margin-left:10px; ">&nbsp;
                                         Name & address of MFG.
                                    </td>

                                </tr> -->
                        <!-- <tr style="  position:sticky; top:25px;">
                                    <td colspan="2"
                                        style="text-align:left;z-index: 100;white-space:nowrap;background-color: #fff;font-size:11px">
                                        <input type="checkbox" class="nonstore" id="nameofmfg" disabled
                                            style="margin-left:10px; ">&nbsp;
                                        <em style="font-weight:500;font-size:10px;">Name of Mfg.<input type="checkbox" class="nonstore"
                                                id="addressofmfg" disabled  style="margin-left:10px; ">&nbsp;Mfg.
                                            address<input type="checkbox" class="nonstore" id="licenceno"
                                                disabled style="margin-left:10px; ">&nbsp; Lic. no</em>
                                    </td>


                                </tr> -->

                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                                <input type="checkbox" class="nonstore viewpermission" id="organizationname"
                                    name="organizationname" style="margin-left:10px;">&nbsp; {{"Company Name" }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="organizationnamefn" name="organizationnamefn"
                                    class="fieldname_check viewpermission selectall " style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @if ($config_data->product_name_use == 'off')
                            <tr>
                                <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                                    <input type="checkbox" class="nonstore viewpermission" id="productname"
                                        name="productname" style="margin-left:10px;">&nbsp;
                                    {{ $config_data->product_name }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="productnamefn" name="productnamefn"
                                        class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                                </td>
                            </tr>
                        @endif
                        @if ($config_data->product_id_use == 'off')
                            <tr class="unwantedfordynamiclabel">
                                <td colspan="1" style="text-align:left;white-space:nowrap ">
                                    <input type="checkbox" class="nonstore viewpermission" id="productid"
                                        name="productid" style="margin-left:10px;">&nbsp; {{ $config_data->product_id }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="productidfn" name="productidfn"
                                        class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                                </td>
                            </tr>
                        @endif
                        @if ($config_data->comments_use == 'on')
                            <tr class="unwantedfordynamiclabel">
                                <td colspan="1" style="text-align:left;white-space:nowrap ">
                                    <input type="checkbox" class="nonstore viewpermission" id="productcomments"
                                        name="productcomments" style="margin-left:10px;">&nbsp;
                                    {{ $config_data->comments }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="productcommentsfn" name="productcommentsfn"
                                        class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                                </td>
                            </tr>
                        @endif
                        @if ($config_data->p_field1_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield1"
                                    name="productstaticfield1" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field1 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield1fn" name="productstaticfield1fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->p_field2_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield2"
                                    name="productstaticfield2" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field2 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield2fn" name="productstaticfield2fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif

                        @if ($config_data->p_field3_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield3"
                                    name="productstaticfield3" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field3 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield3fn" name="productstaticfield3fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif

                         @if ($config_data->p_field4_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield4"
                                    name="productstaticfield4" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field4 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield4fn" name="productstaticfield4fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif

                         @if ($config_data->p_field5_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield5"
                                    name="productstaticfield5" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field5 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield5fn" name="productstaticfield5fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->p_field6_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield6"
                                    name="productstaticfield6" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field6 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield6fn" name="productstaticfield6fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->p_field7_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield7"
                                    name="productstaticfield7" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field7 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield7fn" name="productstaticfield7fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->p_field8_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield8"
                                    name="productstaticfield8" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field8 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield8fn" name="productstaticfield8fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif

                        @if ($config_data->p_field9_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield9"
                                    name="productstaticfield9" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field9 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield9fn" name="productstaticfield9fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif


                        @if ($config_data->p_field10_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield10"
                                    name="productstaticfield10" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field10 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield10fn" name="productstaticfield10fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        <tr class="unwantedfordynamiclabel" style="color:#acacac;font-size: 13px;">
                            <td colspan="2" style="text-align:left; white-space:nowrap">
                                ------------------ Batch level ------------------
                            </td>
                        </tr>
                        {{-- @if ($config_data->serialization === 'user-input' || $config_data->serialization === 'running-serial-no') --}}
                        @if ($config_data->serialno_use == 'on')
                            <tr class="unwantedfordynamiclabel">
                                <td colspan="1" style="text-align:left; white-space:nowrap">
                                    <input type="checkbox" class="nonstore viewpermission" id="serialno" name="serialno"
                                        style="margin-left:10px;">&nbsp; {{ $config_data->serialno }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="serialnofn" name="serialnofn"
                                        class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                                </td>
                            </tr>
                        @endif
                        @if ($config_data->batch_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchno" name="batchno"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->batch_number }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchnofn" name="batchnofn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->date_of_manufacturing_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dateofmanufacture"
                                    name="dateofmanufacture" style="margin-left:10px;">&nbsp;
                                {{ $config_data->date_of_manufacturing }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dateofmanufacturefn" name="dateofmanufacturefn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->date_of_expiry_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dateofexp" name="dateofexp"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->date_of_expiry }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dateofexpfn" name="dateofexpfn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->date_of_retest_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dateofretest"
                                    name="dateofretest" style="margin-left:10px;">&nbsp;
                                {{ $config_data->date_of_retest }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dateofretestfn" name="dateofretestfn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->b_field1_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield1"
                                    name="batchstaticfield1" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field1 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield1fn" name="batchstaticfield1fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->b_field2_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield2"
                                    name="batchstaticfield2" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field2 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield2fn" name="batchstaticfield2fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->b_field3_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield3"
                                    name="batchstaticfield3" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field3 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield3fn" name="batchstaticfield3fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->b_field4_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield4"
                                    name="batchstaticfield4" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field4 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield4fn" name="batchstaticfield4fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->b_field5_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield5"
                                    name="batchstaticfield5" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field5 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield5fn" name="batchstaticfield5fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        <tr class="unwantedfordynamiclabel" style="color:#acacac;font-size: 13px;">
                            <td colspan="2" style="text-align:left; white-space:nowrap">
                                ------ Dynamic Field - Container level -------
                            </td>
                        </tr>
                        @if ($config_data->container_use == 'on')
                            <tr class="unwantedfordynamiclabel">
                                <td colspan="1" style="text-align:left; white-space:nowrap">
                                    <input type="checkbox" class="nonstore" id="containerno" name="containerno"
                                        style="margin-left:10px;">&nbsp; {{ $config_data->container_no }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="containernofn" name="containernofn"
                                        class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                                </td>
                            </tr>
                        @endif

                        @if ($config_data->d_field1_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dynamicfield1"
                                    name="dynamicfield1" style="margin-left:10px;">&nbsp;
                                {{ $config_data->dynamic_field1 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dynamicfield1fn" name="dynamicfield1fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->d_field2_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dynamicfield2"
                                    name="dynamicfield2" style="margin-left:10px;">&nbsp;
                                {{ $config_data->dynamic_field2 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dynamicfield2fn" name="dynamicfield2fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->net_weight_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="netweight" name="netweight"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->net_weight }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="netweightfn" name="netweightfn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif

                        @if ($config_data->gross_weight_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore innerlbl viewpermission" id="grossweight"
                                    name="grossweight" style="margin-left:10px;">&nbsp; {{ $config_data->gross_weight }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="grossweightfn" name="grossweightfn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->tare_weight_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore innerlbl" id="tareweight" name="tareweight"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->tare_weight }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="tareweightfn" name="tareweightfn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif

                        <tr class="unwantedfordynamiclabel" style="color:#acacac;font-size: 13px;">
                            <td colspan="2" style="text-align:left; white-space:nowrap">
                                -------------- Global Static Field ---------------
                            </td>
                        </tr>

                        @if ($config_data->g_field1_use == 'on')
                                <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="globalstaticfield1"
                                    name="globalstaticfield1" style="margin-left:10px;">&nbsp;
                                {{ $config_data->global_static_field1 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="globalstaticfield1fn" name="globalstaticfield1fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
                        @if ($config_data->g_field2_use == 'on')
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="globalstaticfield2"
                                    name="globalstaticfield2" style="margin-left:10px;">&nbsp;
                                {{ $config_data->global_static_field2 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="globalstaticfield2fn" name="globalstaticfield2fn"
                                    class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @endif
            </tr>
            <tr style="color:#acacac;font-size: 13px;">
                <td colspan="2" style="text-align:left; white-space:nowrap">
                    -------------- Label Static field ---------------
                </td>
            </tr>
            @if ($config_data->l_field1_use == 'on')
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="labelstaticfield1" onchange="toggleUploadOption()"
                        name="labelstaticfield1" style="margin-left:10px;" />&nbsp; <span
                        id="Staticfield_name">{{ $config_data->label_static_field1 }}
                    </span>
                    {{-- <input type="text" class="Staticfield1inputbox viewpermission" data-original-value="Static field"
                        id="Staticfield_name_input" name="Staticfield1_name_input"
                        placeholder="{{ $config_data->label_static_field1 }}"
                        value="{{ $config_data->label_static_field1 }}" style="display:none" maxlength="100" /> --}}
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="labelstaticfield1fn" name="labelstaticfield1fn"
                        class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                </td>
                @endif
                @if ($config_data->l_field2_use == 'on')
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="labelstaticfield2" onchange="toggleUploadOption()"
                        name="labelstaticfield2" style="margin-left:10px;" />&nbsp; <span
                        id="Staticfield2_name">{{ $config_data->label_static_field2 }}
                    </span>
                    {{-- <input type="text" class="Staticfield2inputbox viewpermission" data-original-value="Static field"
                        id="Staticfield2_name_input" name="Freefield1_name_input"
                        placeholder="{{ $config_data->label_static_field2 }}"
                        value="{{ $config_data->label_static_field2 }}" style="display:none" maxlength="100" /> --}}
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="labelstaticfield2fn" name="labelstaticfield2fn"
                        class="fieldname_check viewpermission selectall" style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            @endif
            {{-- <tr style="color:#acacac;font-size: 13px;">
            <td colspan="2" style="text-align:left; white-space:nowrap">
                ------------------ Image field ------------------
            </td>
        </tr> --}}
            <!--<tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Staticfield3" name="Staticfield3"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                        id="Staticfield3_name">{{ $config_data->p_image_field1 }}
                    </span><input type="text" class="Staticfield3inputbox viewpermission" data-original-value="Static field"
                        id="Staticfield3_name_input" name="Staticfield3_name_input" placeholder="Static field"
                        value="Static field" style="display:none" maxlength="100" />
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Staticfield4" name="Staticfield4"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                        id="Staticfield4_name">{{ $config_data->p_image_field2 }}
                    </span><input type="text" class="Staticfield4inputbox viewpermission" data-original-value="Static field"
                        id="Staticfield4_name_input" name="Staticfield4_name_input" placeholder="Static field"
                        value="Static field" style="display:none" maxlength="100" />
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Staticfield5" name="Staticfield5"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                        id="Staticfield5_name">{{ $config_data->global_image1 }}
                    </span><input type="text" class="Staticfield5inputbox viewpermission" data-original-value="Static field"
                        id="Staticfield5_name_input" name="Staticfield5_name_input" placeholder="Static field"
                        value="Static field" style="display:none" maxlength="100" />
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Staticfield6" name="Staticfield6"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                        id="Staticfield6_name">{{ $config_data->global_image2 }}
                    </span><input type="text" class="Staticfield6inputbox viewpermission" data-original-value="Static field"
                        id="Staticfield6_name_input" name="Staticfield6_name_input" placeholder="Static field"
                        value="Static field" style="display:none" maxlength="100" />
                </td>

            </tr>
            <tr>-->
            {{-- <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                <input type="checkbox" class="nonstore viewpermission" id="Staticfield7" name="Staticfield7"
                    style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                    id="Staticfield7_name"> {{$config_data->image1}}
                </span><input type="text" class="Staticfield7inputbox viewpermission" data-original-value="Static field"
                    id="Staticfield7_name_input" name="Staticfield7_name_input" placeholder="Static field"
                    value="Static field" style="display:none" maxlength="100" />
            </td>
            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                            <input type="checkbox" id="Staticfield7fn" name="Staticfield7fn"
                                class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                        </td>

        </tr> --}}
            <tr style="color:#acacac;font-size: 13px;">
                <td colspan="2" style="text-align:left; white-space:nowrap">
                    ------------------- Free fields -------------------
                </td>
            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield1" name="Freefield1"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield1_name">{{ $shipper_print->Freefield1_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 1" id="Freefield1_name_input" name="freefield1_name_input"
                        placeholder="Free field 1" value="{{ $shipper_print->Freefield1_label_value }}"  style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield1fn" name="Freefield1fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield2" name="Freefield2"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield2_name">{{ $shipper_print->Freefield2_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 2" id="Freefield2_name_input" name="freefield2_name_input"
                        placeholder="Free field 2" value="{{ $shipper_print->Freefield2_label_value }}" style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield2fn" name="Freefield2fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield3" name="Freefield3"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield3_name">{{ $shipper_print->Freefield3_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 3" id="Freefield3_name_input" name="freefield3_name_input"
                        placeholder="Free field 3" value="{{ $shipper_print->Freefield3_label_value }}"  style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield3fn" name="Freefield3fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield4" name="Freefield4"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield4_name">{{ $shipper_print->Freefield4_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 4" id="Freefield4_name_input" name="freefield4_name_input"
                        placeholder="Free field 4" value="{{ $shipper_print->Freefield4_label_value }}"  style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield4fn" name="Freefield4fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield5" name="Freefield5"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield5_name">{{ $shipper_print->Freefield5_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 5" id="Freefield5_name_input" name="freefield5_name_input"
                        placeholder="Free field 5" value="{{ $shipper_print->Freefield5_label_value }}"  style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield5fn" name="Freefield5fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield6" name="Freefield6"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield6_name">{{ $shipper_print->Freefield6_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 6" id="Freefield6_name_input" name="freefield6_name_input"
                        placeholder="Free field 6" value="{{ $shipper_print->Freefield6_label_value }}"  style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield6fn" name="Freefield6fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield7" name="Freefield7"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield7_name">{{ $shipper_print->Freefield7_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 7" id="Freefield7_name_input" name="freefield7_name_input"
                        placeholder="Free field 7" value="{{ $shipper_print->Freefield7_label_value }}"  style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield7fn" name="Freefield7fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield8" name="Freefield8"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield8_name">{{ $shipper_print->Freefield8_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 8" id="Freefield8_name_input" name="freefield8_name_input"
                        placeholder="Free field 8" value="{{ $shipper_print->Freefield8_label_value }}"  style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield8fn" name="Freefield8fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Freefield9" name="Freefield9"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Freefield9_name">{{ $shipper_print->Freefield9_label_value }}
                        </span><input type="text" class="freefieldinputbox viewpermission"
                        data-original-value="Free field 9" id="Freefield9_name_input" name="freefield9_name_input"
                        placeholder="Free field 9" value="{{ $shipper_print->Freefield9_label_value }}"  style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Freefield9fn" name="Freefield9fn" class="fieldname_check viewpermission selectall"
                        style="margin-left:10px; ">&nbsp;
                </td>

            </tr>

            @if($config_data->image1_use == "on" || $config_data->image2_use == "on" || $config_data->g_image1_use == "on" || $config_data->g_image2_use == "on")
                                <tr style="color:#acacac;font-size: 13px;">
                                    <td colspan="2" style="text-align:left; white-space:nowrap">
                                        ------------------ Image field ------------------
                                    </td>
                                </tr>

                                    @if($config_data->g_image1_use == "on")
                                            <tr>
                                                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                                                    <input type="checkbox" class="nonstore viewpermission" id="globalimage1" name="globalimage1"
                                                        style="margin-left:10px;" />&nbsp; <span id="globalimage1_name">{{$config_data->global_image1}}</span>
                                            </tr>
                                    @endif

                                    @if($config_data->g_image2_use == "on")
                                            <tr>
                                                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                                                    <input type="checkbox" class="nonstore viewpermission" id="globalimage2" name="globalimage2"
                                                        style="margin-left:10px;" />&nbsp; <span id="globalimage2_name">{{$config_data->global_image2}}</span>
                                            </tr>
                                    @endif

                                    @if($config_data->image1_use == "on")
                                        <tr>
                                            <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                                                <input type="checkbox" class="nonstore image viewpermission" id="labelimage1" name="labelimage1"
                                                    style="margin-left:10px;" />&nbsp; <span id="labelimage1_name">{{$config_data->image1}}</span>
                                        </tr>
                                    @endif

                                    @if($config_data->image2_use == "on")
                                        <tr>
                                            <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                                                <input type="checkbox" class="nonstore image viewpermission" id="labelimage2" name="labelimage2"
                                                    style="margin-left:10px;" />&nbsp; <span id="labelimage2_name">{{$config_data->image2}}</span>
                                        </tr>
                                    @endif
                                @endif


            </table>

            <table id="QR_content" class="content" style="height:250px;overflow-y:scroll;display:none">

                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrorganizationname"
                            name="organizationname" style="margin-left:10px;">&nbsp; {{ "Company  Name"  }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrorganizationnamefn" name="qrorganizationnamefn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                @if ($config_data->product_name_use == 'off')
                <tr>
                    <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductname" name="productname"
                            style="margin-left:10px;">&nbsp; {{ $config_data->product_name }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductnamefn" name="qrproductnamefn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                @if ($config_data->product_id_use == 'off')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left;white-space:nowrap ">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductid" name="productid"
                            style="margin-left:10px;">&nbsp; {{ $config_data->product_id }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductidfn" name="qrproductidfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                @if ($config_data->comments_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left;white-space:nowrap ">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductcomments"
                            name="productcomments" style="margin-left:10px;">&nbsp; {{ $config_data->comments }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductcommentsfn" name="qrproductcommentsfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field1_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield1"
                            name="productstaticfield1" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field1 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield1fn" name="qrproductstaticfield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field2_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield2"
                            name="productstaticfield2" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field2 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield2fn" name="qrproductstaticfield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field3_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield3"
                            name="productstaticfield3" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field3 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield3fn" name="qrproductstaticfield3fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field4_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield4"
                            name="productstaticfield4" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field4 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield4fn" name="qrproductstaticfield4fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field5_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield5"
                            name="productstaticfield5" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field5 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield5fn" name="qrproductstaticfield5fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field6_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield6"
                            name="productstaticfield6" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field6 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield6fn" name="qrproductstaticfield6fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field7_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield7"
                            name="productstaticfield7" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field7 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield7fn" name="qrproductstaticfield7fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field8_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield8"
                            name="productstaticfield8" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field8 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield8fn" name="qrproductstaticfield8fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field9_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield9"
                            name="productstaticfield9" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field9 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield9fn" name="qrproductstaticfield9fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->p_field10_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrproductstaticfield10"
                            name="productstaticfield10" style="margin-left:10px;">&nbsp;
                        {{ $config_data->p_static_field10 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrproductstaticfield10fn" name="qrproductstaticfield10fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                <tr class="unwantedfordynamiclabel" style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        ------------------ Batch level ------------------
                    </td>
                </tr>
                {{-- @if ($config_data->serialization === 'user-input' || $config_data->serialization === 'running-serial-no') --}}
                @if ($config_data->serialno_use == 'on')
                    <tr class="unwantedfordynamiclabel">
                        <td colspan="1" style="text-align:left; white-space:nowrap">
                            <input type="checkbox" class="nonstoreqr viewpermission" id="qrserialno" name="serialno"
                                style="margin-left:10px;">&nbsp; {{ $config_data->serialno}}
                        </td>
                        <td style="text-align:center;z-index: 100;white-space:nowrap;">
                            <input type="checkbox" id="qrserialnofn" name="qrserialnofn"
                                class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                        </td>
                    </tr>
                @endif
                @if ($config_data->batch_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrbatchno" name="batchno"
                            style="margin-left:10px;">&nbsp; {{ $config_data->batch_number }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrbatchnofn" name="qrbatchnofn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->date_of_manufacturing_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrdateofmanufacture"
                            name="dateofmanufacture" style="margin-left:10px;">&nbsp;
                        {{ $config_data->date_of_manufacturing }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrdateofmanufacturefn" name="qrdateofmanufacturefn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                @if ($config_data->date_of_expiry_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrdateofexp" name="dateofexp"
                            style="margin-left:10px;">&nbsp; {{ $config_data->date_of_expiry }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrdateofexpfn" name="qrdateofexpfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                @if ($config_data->date_of_retest_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrdateofretest" name="dateofretest"
                            style="margin-left:10px;">&nbsp; {{ $config_data->date_of_retest }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrdateofretestfn" name="qrdateofretestfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif


                @if ($config_data->b_field1_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrbatchstaticfield1"
                            name="batchstaticfield1" style="margin-left:10px;">&nbsp;
                        {{ $config_data->b_static_field1 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrbatchstaticfield1fn" name="qrbatchstaticfield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->b_field2_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrbatchstaticfield2"
                            name="batchstaticfield2" style="margin-left:10px;">&nbsp;
                        {{ $config_data->b_static_field2 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrbatchstaticfield2fn" name="qrbatchstaticfield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->b_field3_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrbatchstaticfield3"
                            name="batchstaticfield3" style="margin-left:10px;">&nbsp;
                        {{ $config_data->b_static_field3 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrbatchstaticfield3fn" name="qrbatchstaticfield3fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->b_field4_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrbatchstaticfield4"
                            name="batchstaticfield4" style="margin-left:10px;">&nbsp;
                        {{ $config_data->b_static_field4 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrbatchstaticfield4fn" name="qrbatchstaticfield4fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->b_field5_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrbatchstaticfield5"
                            name="batchstaticfield5" style="margin-left:10px;">&nbsp;
                        {{ $config_data->b_static_field5 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrbatchstaticfield5fn" name="qrbatchstaticfield5fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                <tr class="unwantedfordynamiclabel" style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        ------ Dynamic Field - Container level -------
                    </td>
                </tr>
                @if ($config_data->container_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr" id="qrcontainerno" name="containerno"
                            style="margin-left:10px;">&nbsp; {{ $config_data->container_no }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrcontainernofn" name="qrcontainernofn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->d_field1_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrdynamicfield1"
                            name="dynamicfield1" style="margin-left:10px;">&nbsp; {{ $config_data->dynamic_field1 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrdynamicfield1fn" name="qrdynamicfield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->d_field2_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrdynamicfield2"
                            name="dynamicfield2" style="margin-left:10px;">&nbsp; {{ $config_data->dynamic_field2 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrdynamicfield2fn" name="qrdynamicfield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->net_weight_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrnetweight" name="netweight"
                            style="margin-left:10px;">&nbsp; {{ $config_data->net_weight }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrnetweightfn" name="qrnetweightfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                @if ($config_data->gross_weight_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr innerlbl viewpermission" id="qrgrossweight"
                            name="grossweight" style="margin-left:10px;">&nbsp; {{ $config_data->gross_weight }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrgrossweightfn" name="qrgrossweightfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                @if ($config_data->tare_weight_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr innerlbl" id="qrtareweight" name="tareweight"
                            style="margin-left:10px;">&nbsp; {{ $config_data->tare_weight }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrtareweightfn" name="qrtareweightfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                <tr class="unwantedfordynamiclabel" style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        -------------- Global Static Field ---------------
                    </td>
                </tr>
                @if ($config_data->g_field1_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrglobalstaticfield1"
                            name="globalstaticfield1" style="margin-left:10px;">&nbsp;
                        {{ $config_data->global_static_field1 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrglobalstaticfield1fn" name="qrglobalstaticfield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->g_field2_use == 'on')
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrglobalstaticfield2"
                            name="globalstaticfield2" style="margin-left:10px;">&nbsp;
                        {{ $config_data->global_static_field2 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrglobalstaticfield2fn" name="qrglobalstaticfield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        -------------- Label Static field ---------------
                    </td>
                </tr>
                @if ($config_data->l_field1_use == 'on')
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrlabelstaticfield1"
                            name="qrlabelstaticfield1" style="margin-left:10px;" />&nbsp;
                        <span class="canDoubleClick">{{ $config_data->label_static_field1 }}
                        </span>
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrlabelstaticfield1fn" name="qrlabelstaticfield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif
                @if ($config_data->l_field2_use == 'on')
                <tr >
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrlabelstaticfield2"
                            name="qrlabelstaticfield2" style="margin-left:10px;" />&nbsp;
                        <span class="canDoubleClick"> {{ $config_data->label_static_field2 }}
                        </span>
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrlabelstaticfield2fn" name="qrlabelstaticfield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                @endif

                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        ------------------- Free fields -------------------
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield1" name="Freefield1"
                            style="margin-left:10px;" />&nbsp; Free field 1
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield1fn" name="qrfreefield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield2" name="Freefield2"
                            style="margin-left:10px;" />&nbsp; Free field 2
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield2fn" name="qrfreefield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>

                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield3" name="Freefield3"
                            style="margin-left:10px;" />&nbsp; Free field 3
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield3fn" name="qrfreefield3fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>

                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield4" name="Freefield4"
                            style="margin-left:10px;" />&nbsp; Free field 4
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield4fn" name="qrfreefield4fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield5" name="Freefield5"
                            style="margin-left:10px;" />&nbsp; Free field5
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield5fn" name="qrfreefield5fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield6" name="Freefield6"
                            style="margin-left:10px;" />&nbsp; Free field 6
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield6fn" name="qrfreefield6fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield7" name="Freefield7"
                            style="margin-left:10px;" />&nbsp; Free field 7
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield7fn" name="qrfreefield7fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield8" name="Freefield8"
                            style="margin-left:10px;" />&nbsp; Free field 8
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield8fn" name="qrfreefield8fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield9" name="Freefield9"
                            style="margin-left:10px;" />&nbsp; Free field 9
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield9fn" name="qrfreefield9fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>
            </table>

            <table id="Label_content" class="content" style=" height:250px;padding:30px !important; display:none">

                <tr>
                    <td colspan="1">
                        <label style="margin-top:5px;" for="width"><b>Width </b></label>
                    </td>
                    <td colspan="2"> <input type="number" style="width:130px;height:6% !important;font-size:12px;"
                            name="width" id="width" class="labelwh disabled_fields" data-original-value="200" max="210"
                            value={{ $shipper_print->label_width }} step="1"></td>
                </tr>
                <tr>
                    <td colspan="1">
                        <label style="margin-top:5px;" for="height"><b>Height </b></label>
                    </td>
                    <td colspan="2">
                        <input type="number" style="width:130px;height:6% !important;font-size:12px;" class="labelwh disabled_fields"
                            id="height" name="height" data-original-value="100" max="160" value={{ $shipper_print->label_height }}
                            step="1">
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="but1 disabled_fields" id="minus"
                            style="  width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;">
                            -</div>
                    </td>
                    <td style="text-align:center">
                        <center>

                            <select name="code_type" class="grnprop disabled_fields" readonly style="width:auto; padding:6px" id="code">
                                <option value="select" {{ $shipper_print->code_type === 'select' ? 'selected' : '' }}>NO Barcode</option>
                                <option value="Barcode" {{ $shipper_print->code_type === 'Barcode' ? 'selected' : '' }}> 1D Barcode</option>
                                <option value="QRcode" {{ $shipper_print->code_type === 'QRcode' ? 'selected' : '' }}>QR Code</option>
                                <option value="GS1" {{ $shipper_print->code_type === 'GS1' ? 'selected' : '' }}>GS1 Data Matrix</option>
                            </select>

                        </center>
                    </td>
                    <td>
                        <input type="text" value="60px_60px" id="num" name="code_size" hidden>
                        <div id="plus"
                            style="width: 30px !important; padding-top: 4px; cursor: pointer; height: 30px !important;"
                            class="but1 disabled_fields">+</div>
                    </td>

                </tr>
                @if($config_data->g_image1_use == "on" || $config_data->g_image2_use == "on" || $config_data->image1_use == "on" || $config_data->image2_use == "on")
                                <tr>
                                    <td>
                                        <div class="but1 disabled_fields" id="image_minus"
                                            style="  width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;">
                                            -</div>
                                    </td>
                                    <td style="text-align:center">
                                        <center>
                                        <select name="image_name" class="grnprop disabled_fields" readonly style="width:auto; padding:6px"
                                                id="image_name">
                                                @if($config_data->g_image1_use == "on")
                                                    <option value="{{$config_data->global_image1}}">{{$config_data->global_image1}}</option>
                                                @endif

                                                @if($config_data->g_image2_use == "on")
                                                    <option value="{{$config_data->global_image2}}">{{$config_data->global_image2}}</option>
                                                @endif

                                                @if($config_data->image1_use == "on")
                                                    <option value="{{$config_data->image1}}">{{$config_data->image1}}</option>
                                                @endif

                                                @if($config_data->image2_use == "on")
                                                    <option value="{{$config_data->image2}}">{{$config_data->image2}}</option>
                                                @endif


                                            </select>
                                        </center>
                                    </td>
                                    <td>
                                        <div id="image_plus"
                                            style="width: 30px !important; padding-top: 4px; cursor: pointer; height: 30px !important;"
                                            class="but1 disabled_fields">+</div>
                                    </td>

                                </tr>
                                @endif


                            </table>

            <table id="Style_content" class="content"
                style="height:250px;padding:10px 5px 0px 15px !important; display:none;font-size:10px;">

                <tr>
                    <td width="33%" colspan="1">
                        <abbr title="Bold"> <input type="button"
                                style="text-align:left;  float:left; font-weight:900; background-color: rgb(255, 255, 255); color:#000;"
                                id="bold" class="grnprop mouseup" value="B"></abbr>
                    </td>
                    <td>
                        <abbr title="Italic"> <input type="button"
                                style="  background-color: #fff; width:28px; font-weight:900; text-align:center; font-style: italic; color: #000;"
                                id="Italic" class="grnprop mouseup" value="i"></abbr>
                    </td>
                    <td>
                        <abbr title="Underline"> <input type="button"
                                style="text-align:left;  float:right; text-decoration: underline; font-weight:900; background-color: #fff; color: #000;"
                                id="Underline" class="grnprop mouseup" value="U"></abbr>
                    </td>
                </tr>
                <tr>
                    <td width="34%">
                        <abbr title="Left-align"><i class="align fa fa-align-left mouseup" id="leftalign"
                                style="font-size:26px; float:left; border:1px solid #000; padding:7px; border-radius:4px; margin-left:-3px"></i></abbr>

                    </td>
                    <td width="34%"> <abbr title="center-align"><i class="align fa fa-align-center mouseup"
                                id="centeralign"
                                style="font-size:26px;  border:1px solid #000;  border-radius:4px;  padding:7px; margin-left:-3px"></i></abbr>

                    </td>
                    <td width="34%"> <abbr title="right-align"><i class="align fa fa-align-right mouseup"
                                id="rightalign"
                                style="font-size:26px; float:right;  border:1px solid #000; border-radius:4px; padding:7px; margin-left:-3px"></i></abbr>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <select id="font_family" class="grnprop mouseup" style="float:left; padding:8px; ">
                            <option selected value="Arial">Arial</option>
                            <!-- <option value="Times">Times</option> -->
                            <option value="Roboto">Roboto</option>
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="Courier">Courier</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Tahoma">Tahoma</option>
                            <!-- <option value="Comic Sans MS">Comic Sans MS</option> -->
                            <option value="Avant Garde">Avant Garde</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Palatino">Palatino</option>
                            <option value="Celibri">Celibri</option>
                            <!-- <option value="Bookman">Bookman</option> -->
                            <option value="Garamond">Garamond</option>
                            <option value="Century Schoolbook">Century Schoolbook</option>
                            <!-- <option value="Andale_Mono">Andale Mono</option> -->
                        </select>
                    </td>
                    <td colspan="1">
                        <select id="Font-Size" class="grnprop mouseup" style="float:left; padding:8px; ">
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                            <option value="10">10</option>
                            <option selected value="12">12</option>
                            <option value="14">14</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                            <option value="20">20</option>
                            <option value="22">22</option>
                            <option value="24">24</option>
                            <option value="26">26</option>
                            <option value="28">28</option>
                            <option value="30">30</option>
                            <option value="32">32</option>
                            <option value="34">34</option>
                            <option value="36">36</option>
                            <option value="38">38</option>
                            <option value="40">40</option>
                            <option value="42">42</option>
                            <option value="44">44</option>
                            <option value="46">46</option>
                            <option value="48">48</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">Delimiter Alignment</td>
                </tr>
                <tr>
                    <td colspan="1">

                        <abbr title="delimiter-align"><button type="button" class="fa fa-align-justify"
                                id="delimiteralign"
                                style="font-size:26px; float:left;  border:1px solid #000; border-radius:4px; padding:7px; margin-left:25px"></button></abbr>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">Drop a Horizontal line</td>
                </tr>

                <tr>
                    <td colspan="1">

                        <abbr title="line"><button type="button" class="disabled_fields"
                                id="horizontal_line_append"
                                style="font-size:26px; float:left;  border:1px solid #000; border-radius:4px; padding:7px; margin-left:25px"></button>
                            </abbr>
                            <span id="horizontal_del" class="delete-icon" style="cursor: pointer; margin-right: 5px;">&#x274C;</span>

                    </td>
                </tr>

                {{-- <tr>
                    <td rowspan="2">Drop a Vertical line</td>
                </tr>

                <tr>
                    <td colspan="1">

                        <abbr title="line"><button type="button" class=""
                                id="vertical_line_append"
                                style="font-size:26px; float:left;  border:1px solid #000; border-radius:4px; padding:7px; margin-left:25px"></button></abbr>
                                <span id="vertical_del" class="delete-icon" style="cursor: pointer; margin-right: 5px;">&#x274C;</span>
                            </td>
                </tr> --}}

            </table>
        </div>
        </td>
        </tr>
        <tr>
            <td style="text-align:center !important ;background-color:#fff !important;box-shadow: 0 11px 6px #73737380;">
                <div style="margin-top:-1px">
                    <label for="producttype_input">
                        <b class="label" style="color:#000;font-size:12px;padding:4px;">Product Type </b>
                    </label><br>

                    <select type="text" name="producttype_input" id="producttype_input" maxlength="100"
                        class="viewpermission" placeholder="Product Type"
                        style="width:275px;height:28px;font-size:13px; border-radius:13px;">
                        @foreach ($productType as $data)
                            <option @if ($data->id == $productTypeValue) selected @endif value="{{ $data->id }}">{{ $data->product_type }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div style="margin-top:-10px">
                    <label for="labeltype_input"> <b class="label"
                            style="color:#000;font-size:12px;padding:4px; ">Label
                            Type </b></label><br>
                    <select type="text" name="labeltype_input" id="labeltype_input" maxlength="100"
                        class="viewpermission" placeholder="Label Type"
                        style="width:275px;height:28px;font-size:13px; border-radius:13px;">
                        @foreach ($label_type as $data)
                        <option @if ($data->id == $labelTypeValue) selected  @endif value="{{ $data->id }}">{{ $data->label_type_name }}</option>
                        @endforeach
                    </select>
                </div><br>
            <div id="scrollable-container" style="height: 150px; overflow-y: auto;">
                @if($config_data->image1_use === 'on')
                <div id="labelimage1_input" style="margin-top:-5px; display: {{ $shipper_print->labelimage1_labelposition !== '0px_0px_0px_0px' ? 'block' : 'none' }};">
                    <label for="labelimage">
                        <b class="label" style="color:#000;font-size:12px;padding:4px;">{{ $config_data->image1 }}</b>
                    </label><br>
                    <input type="file" name="labelimage1_upload" required id="labelimage1_upload" class="viewpermission"
                        style="width:90%;height:25px;font-size:12px;border:1px solid #ccc;">
                        <input type="hidden" name="old_labelimage1_upload_path" value="{{ $shipper_print->labelimage1_path }}">
                </div><br>
                @endif
                @if($config_data->image2_use === 'on')
                <div id="labelimage2_input" style="margin-top:-5px; display: {{ $shipper_print->labelimage2_labelposition !== '0px_0px_0px_0px' ? 'block' : 'none' }};">
                    <label for="labelimage2">
                        <b class="label2" style="color:#000;font-size:12px;padding:4px;">{{ $config_data->image2 }}</b>
                    </label><br>
                    <input type="file" name="labelimage2_upload" required id="labelimage2_upload" class="viewpermission"
                        style="width:90%;height:25px;font-size:12px;border:1px solid #ccc;">
                        <input type="hidden" name="old_labelimage2_upload_path" value="{{ $shipper_print->labelimage2_path }}">
                </div><br>
                @endif

                <div id="label1_text_container" style="margin-top:-2px; display:none;">
                    <label for="Staticfield_input"> <b class="label"
                            style="color:#000;font-size:12px;padding:4px; ">{{ $config_data->label_static_field1 }}</b></label><br>
                    <input type="text" name="labelstaticfield1_input" id="labelstaticfield1_input"
                        placeholder="{{ $config_data->label_static_field1 }}" value="{{ $shipper_print->labelstaticfield1_input}}" maxlength="100" class="viewpermission"
                        style="width:275px;height:28px;font-size:13px;border-radius:13px"/>
                </div><br>
                <div id="label2_text_container" style="margin-top:-5px; display:none;">
                    <label for="Staticfield_input2"> <b class="label"
                            style="color:#000;font-size:12px;padding:4px; ">{{ $config_data->label_static_field2 }}</b></label><br>
                    <input type="text" name="labelstaticfield2_input" id="labelstaticfield2_input"
                        placeholder="{{ $config_data->label_static_field2 }}" value="{{ $shipper_print->labelstaticfield2_input}}" maxlength="100" class="viewpermission"
                        style="width:275px;height:28px;font-size:13px;border-radius:13px" />
                </div>
            </div>
                <div style="margin-top:20px">
                    <label> <b class="label" style="color:#000;font-size:12px;padding:4px; ">Label Name
                        </b></label><br>
                    <input type="text" name="labelname" required id="labelname" class="grnprop viewpermission"
                    style="width:275px;height:30px;font-size:13px; border-radius:13px;" value="{{ $shipper_print->label_name }}"
                        placeholder="Enter a Label name" autocomplete="off" maxlength="100">

                </div>
            </td>

        </tr>


        <tr>
            <td
                style="text-align:center !important;  background-color:#fff;  border-bottom-left-radius: 20px; zoom:80%;   box-shadow: 0 3px 6px #73737380;">
                <center>

                    <a href="/labellist" class="btn btn-sm btn-secondary"
                        style="display:inline-block; border-radius:7px; margin-right:10px;width: 80px !important; height: 35px !important; color:white !important; padding: 7px;">Back</a>
                    <input type="button" value="Print" class="btn btn-sm btn-update " id="print"
                    onclick="printDiv()"
                    style=" width: 90px !important; height:35px !important; padding: 0px; padding-left: 13px;font-size:14px; padding-right: 13px;font-weight:600; border: 1px solid;">
                    @if($config_data->label_approval_flow == 'on' && ($shipper_print->request_status == 'Approved' || $shipper_print->request_status == 'Requested'))
                    @else
                    @if ($labelPermissionEdit['Edit'])
                    <input type="submit" class="btn btn-sm btn-update "
                        style="display:inline-block;  width: 80px !important;height: 35px !important; padding: 6px;"
                        id="Edit" value="Edit">
                    <input type="submit" value="Update" class="btn btn-sm but1 " id="save" disabled
                        style=" width: 90px !important; height:35px !important; padding: 0px; padding-left: 13px;font-size:14px; padding-right: 13px;font-weight:600; border: 1px solid;margin-left:8px;">
                    @endif
                    @endif
                </center>
            </td>
        </tr>
        </table>
        </div>
        </div>
        @if($config_data->label_approval_flow == 'on' && $shipper_print->request_status == 'Requested')
        @if ($labelPermission['Approve'])
        <div class="container-fluid" style="padding:2%;zoom:80%;">
    <input type="submit" class="btn btn-success" style="float:right;margin-left:1%;" id="approveButton" value="Approve">&nbsp;
    <input type="submit" class="btn btn-danger" style="float:right;" id="rejectButton" value="Reject">
</div>
        @endif


        @endif


        <!-- -----------------------------------------  hidden fields ----------------------------------------------- -->

        <!-- ================ Product level ======================= -->
        <input type="hidden" name="organizationname_label_style" id="organizationname_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="productname_label_style" id="productname_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="productid_label_style" id="productid_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="productcomments_label_style" id="productcomments_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="productstaticfield1_label_style" id="productstaticfield1_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="productstaticfield2_label_style" id="productstaticfield2_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="productstaticfield3_label_style" id="productstaticfield3_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="productstaticfield4_label_style" id="productstaticfield4_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="productstaticfield5_label_style" id="productstaticfield5_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="productstaticfield6_label_style" id="productstaticfield6_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="productstaticfield7_label_style" id="productstaticfield7_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="productstaticfield8_label_style" id="productstaticfield8_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="productstaticfield9_label_style" id="productstaticfield9_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="productstaticfield10_label_style" id="productstaticfield10_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="serialno_label_style" id="serialno_label_style"
        value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="batchno_label_style" id="batchno_label_style"
        value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="dateofmanufacture_label_style" id="dateofmanufacture_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="dateofexp_label_style" id="dateofexp_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="dateofretest_label_style" id="dateofretest_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="batchstaticfield1_label_style" id="batchstaticfield1_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="batchstaticfield2_label_style" id="batchstaticfield2_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="batchstaticfield3_label_style" id="batchstaticfield3_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="batchstaticfield4_label_style" id="batchstaticfield4_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="batchstaticfield5_label_style" id="batchstaticfield5_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- ================== dynamic and container level ====================== -->
        <input type="hidden" name="containerno_label_style" id="containerno_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="dynamicfield1_label_style" id="dynamicfield1_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="dynamicfield2_label_style" id="dynamicfield2_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="netweight_label_style" id="netweight_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="tareweight_label_style" id="tareweight_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="grossweight_label_style" id="grossweight_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="globalstaticfield1_label_style" id="globalstaticfield1_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="globalstaticfield2_label_style" id="globalstaticfield2_label_style"
            value="normal_normal_none_left_12_Arial">

        {{-- -------------------Label Static field------------------------------ --}}

        <input type="hidden" name="labelstaticfield1_label_style" id="labelstaticfield1_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="labelstaticfield2_label_style" id="labelstaticfield2_label_style"
            value="normal_normal_none_left_12_Arial">


        <!-- ================== Freefield Level ====================== -->

        <input type="hidden" name="Freefield1_label_style" id="Freefield1_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="Freefield2_label_style" id="Freefield2_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="Freefield3_label_style" id="Freefield3_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" name="Freefield4_label_style" id="Freefield4_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="Freefield5_label_style" id="Freefield5_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="Freefield6_label_style" id="Freefield6_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="Freefield7_label_style" id="Freefield7_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="Freefield8_label_style" id="Freefield8_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" name="Freefield9_label_style" id="Freefield9_label_style"
            value="normal_normal_none_left_12_Arial">
        <!-- ================== Staticfiled ====================== -->

        <input type="hidden" id="Staticfield3_labelbold" value="normal">
        <input type="hidden" id="Staticfield3_labelitalic" value="normal">
        <input type="hidden" id="Staticfield3_labelunderline" value="none">
        <input type="hidden" id="Staticfield3_labelalign" value="left">
        <input type="hidden" id="Staticfield3_labelsize" value="12">
        <input type="hidden" id="Staticfield3_labelfamily" value="Arial">
        <input type="hidden" name="Staticfield3_label_style" id="Staticfield3_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="Staticfield4_labelbold" value="normal">
        <input type="hidden" id="Staticfield4_labelitalic" value="normal">
        <input type="hidden" id="Staticfield4_labelunderline" value="none">
        <input type="hidden" id="Staticfield4_labelalign" value="left">
        <input type="hidden" id="Staticfield4_labelsize" value="12">
        <input type="hidden" id="Staticfield4_labelfamily" value="Arial">
        <input type="hidden" name="Staticfield4_label_style" id="Staticfield4_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="Staticfield5_labelbold" value="normal">
        <input type="hidden" id="Staticfield5_labelitalic" value="normal">
        <input type="hidden" id="Staticfield5_labelunderline" value="none">
        <input type="hidden" id="Staticfield5_labelalign" value="left">
        <input type="hidden" id="Staticfield5_labelsize" value="12">
        <input type="hidden" id="Staticfield5_labelfamily" value="Arial">
        <input type="hidden" name="Staticfield5_label_style" id="Staticfield5_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="Staticfield6_labelbold" value="normal">
        <input type="hidden" id="Staticfield6_labelitalic" value="normal">
        <input type="hidden" id="Staticfield6_labelunderline" value="none">
        <input type="hidden" id="Staticfield6_labelalign" value="left">
        <input type="hidden" id="Staticfield6_labelsize" value="12">
        <input type="hidden" id="Staticfield6_labelfamily" value="Arial">
        <input type="hidden" name="Staticfield6_label_style" id="Staticfield6_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="Staticfield7_labelbold" value="normal">
        <input type="hidden" id="Staticfield7_labelitalic" value="normal">
        <input type="hidden" id="Staticfield7_labelunderline" value="none">
        <input type="hidden" id="Staticfield7_labelalign" value="left">
        <input type="hidden" id="Staticfield7_labelsize" value="12">
        <input type="hidden" id="Staticfield7_labelfamily" value="Arial">
        <input type="hidden" name="Staticfield7_label_style" id="Staticfield7_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- ----------------- product level label positon--------------- -->

        <input type="hidden" name="organizationname_labelposition" class="organizationname_labelposition">
        <input type="hidden" name="productname_labelposition" class="productname_labelposition">
        <input type="hidden" name="productid_labelposition" class="productid_labelposition">
        <input type="hidden" name="productcomments_labelposition" class="productcomments_labelposition">
        <input type="hidden" name="productstaticfield1_labelposition" class="productstaticfield1_labelposition">
        <input type="hidden" name="productstaticfield2_labelposition" class="productstaticfield2_labelposition">
        <input type="hidden" name="productstaticfield3_labelposition" class="productstaticfield3_labelposition">
        <input type="hidden" name="productstaticfield4_labelposition" class="productstaticfield4_labelposition">
        <input type="hidden" name="productstaticfield5_labelposition" class="productstaticfield5_labelposition">
        <input type="hidden" name="productstaticfield6_labelposition" class="productstaticfield6_labelposition">
        <input type="hidden" name="productstaticfield7_labelposition" class="productstaticfield7_labelposition">
        <input type="hidden" name="productstaticfield8_labelposition" class="productstaticfield8_labelposition">
        <input type="hidden" name="productstaticfield9_labelposition" class="productstaticfield9_labelposition">
        <input type="hidden" name="productstaticfield10_labelposition" class="productstaticfield10_labelposition">

        <!-- ----------------- Batch level label positon--------------- -->

        <input type="hidden" name="serialno_labelposition" class="serialno_labelposition">
        <input type="hidden" name="batchno_labelposition" class="batchno_labelposition">
        <input type="hidden" name="dateofmanufacture_labelposition" class="dateofmanufacture_labelposition">
        <input type="hidden" name="dateofexp_labelposition" class="dateofexp_labelposition">
        <input type="hidden" name="dateofretest_labelposition" class="dateofretest_labelposition">
        <input type="hidden" name="batchstaticfield1_labelposition" class="batchstaticfield1_labelposition">
        <input type="hidden" name="batchstaticfield2_labelposition" class="batchstaticfield2_labelposition">
        <input type="hidden" name="batchstaticfield3_labelposition" class="batchstaticfield3_labelposition">
        <input type="hidden" name="batchstaticfield4_labelposition" class="batchstaticfield4_labelposition">
        <input type="hidden" name="batchstaticfield5_labelposition" class="batchstaticfield5_labelposition">

        {{-- ----------------------------------Dyanamic and Container Level-------------- --}}
        <input type="hidden" name="containerno_labelposition" class="containerno_labelposition">
        <input type="hidden" name="dynamicfield1_labelposition" class="dynamicfield1_labelposition">
        <input type="hidden" name="dynamicfield2_labelposition" class="dynamicfield2_labelposition">
        <input type="hidden" name="netweight_labelposition" class="netweight_labelposition">
        <input type="hidden" name="tareweight_labelposition" class="tareweight_labelposition">
        <input type="hidden" name="grossweight_labelposition" class="grossweight_labelposition">

        {{-- ----------------------------------Global Level-------------- --}}
        <input type="hidden" name="globalstaticfield1_labelposition" class="globalstaticfield1_labelposition">
        <input type="hidden" name="globalstaticfield2_labelposition" class="globalstaticfield2_labelposition">

        {{-- ----------------------------------Label Level-------------- --}}
        <input type="hidden" name="labelstaticfield1_labelposition" class="labelstaticfield1_labelposition">
        <input type="hidden" name="labelstaticfield2_labelposition" class="labelstaticfield2_labelposition">


        <input type="hidden" name="Freefield1_labelposition" class="Freefield1_labelposition">
        <input type="hidden" name="Freefield2_labelposition" class="Freefield2_labelposition">
        <input type="hidden" name="Freefield3_labelposition" class="Freefield3_labelposition">
        <input type="hidden" name="Freefield4_labelposition" class="Freefield4_labelposition">
        <input type="hidden" name="Freefield5_labelposition" class="Freefield5_labelposition">
        <input type="hidden" name="Freefield6_labelposition" class="Freefield6_labelposition">
        <input type="hidden" name="Freefield7_labelposition" class="Freefield7_labelposition">
        <input type="hidden" name="Freefield8_labelposition" class="Freefield8_labelposition">
        <input type="hidden" name="Freefield9_labelposition" class="Freefield9_labelposition">
        <input type="hidden" name="Customername_labelposition" class="Customername_labelposition">

        <input type="hidden" name="Staticfield3_labelposition" class="Staticfield3_labelposition">
        <input type="hidden" name="Staticfield4_labelposition" class="Staticfield4_labelposition">
        <input type="hidden" name="Staticfield5_labelposition" class="Staticfield5_labelposition">
        <input type="hidden" name="Staticfield6_labelposition" class="Staticfield6_labelposition">
        <input type="hidden" name="Staticfield7_labelposition" class="Staticfield7_labelposition">

        <input type="hidden" name="globalimage1_labelposition" class="globalimage1_labelposition">
        <input type="hidden" name="globalimage2_labelposition" class="globalimage2_labelposition">
        <input type="hidden" name="labelimage1_labelposition" class="labelimage1_labelposition">
        <input type="hidden" name="labelimage2_labelposition" class="labelimage2_labelposition">

        <input type="password" id="userPassword" name="userPassword" value="" hidden>


        <input type="hidden" name="code_position" value="sortable2_0"
            class="Qr_nonstore_labelposition barcode_nonstore_label">

        <input type="hidden" name="dataObj" class="dataObj" id="dataObj">
        <input type="hidden" name="linesData" class="linesData">


    </form>

    <script>
        $(document).ready(function() {

            //approve button
            $('#approveButton').on('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Please confirm.',
                    html: '<label><input type="password" style="width:376px;margin-left:13%" placeholder="Enter password" id="swal-input1" class="swal2-input"></label>' +
                        '<label style="margin-left:10%;color:#3ac859 !important;">Please enter approval comments to confirm<input id="swal-input2" style="width:89%"class="swal2-input"></label>',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                }).then(function(Confirm) {
                    if (Confirm.isConfirmed) {
                        if ($('#swal-input1').val() == '' || $('#swal-input2').val() ==
                            '') {
                            Swal.fire({
                                title: 'Please enter the required details',
                                confirmButtonText: 'OK',
                                confirmButtonColor: 'rgb(36 63 161)',
                                background: 'rgb(105 126 157)',
                            })
                        } else {
                            $('#userPassword').val($('#swal-input1').val());
                            $('#approval_rejection_comments').val($('#swal-input2').val());
                            $('#formId').attr('action', '/labelupdate/{{ $shipper_print->id }}');
                            $('#formId').attr('method', 'post');
                            $('<input>').attr({
                                type: 'hidden',
                                name: 'approvedata',
                                value: 'approve'
                            }).appendTo('#formId');
                            $('#formId').submit();
                            $('#approveButton').attr('disabled', true);


                        }
                    } else {
                        event.preventDefault();
                    }
                });

            });

            //reject button

            $('#rejectButton').on('click', function(e) {
                e.preventDefault();

                if ($('#Comments').val() == '') {
                    $('#Comments').css('background-color', '#ff909066');
                    Swal.fire({
                        title: 'Please add comments for rejection',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                } else {
                    Swal.fire({
                    title: 'Please confirm.',
                    html: '<label><input type="password" style="width:376px;margin-left:13%" placeholder="Enter password" id="swal-input1" class="swal2-input"></label>' +
                        '<label style="margin-left:10%;color:#e94944 !important;">Please enter rejection comments to confirm<input id="swal-input2" style="width:89%"class="swal2-input"></label>',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                    }).then(function(Confirm) {
                        if (Confirm.isConfirmed) {
                            if ($('#swal-input1').val() == '' || $('#swal-input2').val() ==
                                '') {
                                Swal.fire({
                                    title: 'Please enter the required details',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: 'rgb(36 63 161)',
                                    background: 'rgb(105 126 157)',
                                })
                            } else {
                                $('#userPassword').val($('#swal-input1').val());
                                $('#approval_rejection_comments').val($('#swal-input2').val());
                                $('#formABC').attr('action',
                                    '/labelupdate/{{ $shipper_print->id }}');
                                $('#formId').attr('method', 'post');
                                $('<input>').attr({
                                    type: 'hidden',
                                    name: 'rejectdata',
                                    value: 'reject'
                                }).appendTo('#formId');
                                $('#formId').submit();
                                $('#rejectButton').attr('disabled', true);
                            }

                        } else {
                            event.preventDefault();
                        }

                    });
                }
            });

        });

        label_id = "";
        // print button click function
        function printDiv() {
            var labelName = 'labelcontent';
            var divToPrint = document.getElementById(labelName);
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            var width = document.getElementById("width").value;
            var height = document.getElementById("height").value;
            var htmlContent = `
                <html>
                <body><center>
                <div id="sample_label" style="position:fixed; text-align:center; transform: rotate(315deg); font-size:36px; top:40%; left:30%; font-weight:600; z-index:99; color:#000000;">Sample label</div>
                ${divToPrint.innerHTML}
                </center></body>
                <style>
                @media print {
                    @page {
                        size: ${width}mm ${height}mm;
                        size: auto !important;
                        width: ${width};
                        height: ${height};
                        top: 0px;
                        margin: 0px 5px 5px 5px;
                    }
                }
                li {
                    text-decoration: none;
                    list-style-type: none;
                }
                ul {
                    padding-inline-start: 10px;
                    margin-block-end: 0rem;
                    margin-block-start: 0rem;
                }
                .delimiter {
                    color: black !important;
                }
                </style>
                </html>`;

            newWin.document.write(htmlContent);
            newWin.document.close();

            // Function to check if all images have loaded
            function allImagesLoaded() {
                var images = newWin.document.images;
                for (var i = 0; i < images.length; i++) {
                    if (!images[i].complete) {
                        return false;
                    }
                }
                return true;
            }

            // Poll to check if images are loaded
            var interval = setInterval(function() {
                if (allImagesLoaded()) {
                    clearInterval(interval);
                    var isPrinted = false;

                    // Add beforeprint event listener
                    newWin.addEventListener('beforeprint', function() {
                        console.log('Print dialog opened');
                    });

                    // Add afterprint event listener
                    newWin.addEventListener('afterprint', function() {
                        isPrinted = true;
                        newWin.close();
                    });

                    // Trigger print dialog
                    newWin.print();

                    // Check if print was canceled
                    setTimeout(function() {
                        if (!isPrinted) {
                            newWin.close();
                        }
                    }, 1000);
                }
            }, 100);
        }


        function setHeightWidth() {
            var labelToChange = 'labelcontent';

            labelHeight = $('#' + labelToChange).css('height');
            labelHeightmm = Math.ceil(parseFloat(labelHeight) * parseFloat(0.2645833333));

            // finalHeight = Math.ceil(labelHeightmm / 10) * 10;

            labelWidth = $('#' + labelToChange).css('width');
            labelWidthmm = Math.ceil(parseFloat(labelWidth) * parseFloat(0.2645833333));

            $('#height').val(labelHeightmm);
            $('#width').val(labelWidthmm);
            $('#labelheightIdentifer').text(labelHeightmm);
            $('#labelwidthIdentifer').text(labelWidthmm);
        }

        function fieldnamechecked() {
            currLabelName = 'labelcontent';
            var count = 0;
            $.map($('#labelcontent').find('.labelcontentfieldname'), function(el) {
                var currLabel = $(el).attr('id').split('_');
                var checkboxId = currLabel[0].split('rlabel');
                var checkBoxId = checkboxId[0].split("tent")[1];
                console.log(checkBoxId,'checkBoxId');

                if ($.trim($(el).text()).length > 0) {
                    console.log("false");
                    $('#' + checkBoxId + 'fn').prop('checked', true);
                } else {
                    $('#' + checkBoxId+ 'fn').prop('checked', false);
                }
                count++;
            });

        }

        function fieldnameselectall(){
            if($('#selectall').prop('checked') ==  true){
                $('.selectall').prop('checked',true);
            }else{
                $('.selectall').prop('checked',false);

            }
        }

        function po() {
            currLabelName = 'labelcontent';
            var count = 0;

            $('.nonstore').prop('checked', false);
            $.map($('#labelcontent').find('.textnonstore'), function(el) {
                var currLabel = $(el).attr('id').split('_');
                var checkboxId = currLabel[0].split('rlabel');
                var checkBoxId = checkboxId[0].split("tent")[1];
                $('#' + checkBoxId).prop('checked', true);
                count++;
            });

        }

        // function checkLabelName() {
        //     var text = $('#labelname').val();
        //     var type = $('.predefined_dynamic:checked').val();
        //     $.ajax({
        //         url: "{{ url('/labelname_shipper') }}",
        //         type: "GET",
        //         data: {
        //             text: text,
        //             type: type,
        //         },
        //         dataType: 'json',
        //         success: function(result) {
        //             if (result.message == true) {
        //                 Swal.fire({
        //                     title: 'This label name ' + text +
        //                         ' is already in use with an existing label',
        //                     confirmButtonText: 'OK',
        //                     confirmButtonColor: 'rgb(36 63 161)',
        //                     background: 'rgb(105 126 157)',
        //                 }).then(function(Confirm) {
        //                     $('#save').prop('disabled', true);
        //                     $('input[type=checkbox]').prop('disabled', true);
        //                     $('#labeltype').prop('disabled', true);
        //                     $('#selectall').prop('disabled', true);
        //                     $('.nonstore').prop('disabled', true);
        //                 });
        //             } else {
        //                 $('#save').prop('disabled', false);
        //                 $('#save').css('opacity', '100%');
        //                 $('#labeltype').prop('disabled', false);
        //                 $('input[type=checkbox]').prop('disabled', false);
        //             }
        //         }
        //     });
        // }

        function click() {
            var size = $('#' + label_id).css('font-size');
            var family = $('#' + label_id).css('font-family');
            var bold = $('#' + label_id).css('font-weight');
            var italic = $('#' + label_id).css('font-style');
            var underline = $('#' + label_id).css('text-decoration');
            var align = $('#' + label_id).css('text-align');
            var siz = size.replace(/px/g, "");


            if (size == '14.4px') {
                $('#Font-Size').val('14');
            } else {
                $('#Font-Size').val(siz);
            }
            if (family == 'Arial') {
                $('#font_family').val('Arial')

            } else {
                $('#font_family').val('Arial');
            }

            if (bold == '400') {
                $('#bold').css('background-color', 'rgb(255, 255, 255)');
                $('#bold').css('color', 'rgb(0, 0, 0)');
            } else {
                $('#bold').css('background-color', 'rgb(0, 0, 0)');
                $('#bold').css('color', 'rgb(255, 255, 255)');
            }
            if (italic == 'normal') {
                $('#Italic').css('background-color', 'rgb(255, 255, 255)');
                $('#Italic').css('color', 'rgb(0, 0, 0)');
            } else {
                $('#Italic').css('background-color', 'rgb(0, 0, 0)');
                $('#Italic').css('color', 'rgb(255, 255, 255)');
            }

            if (underline == 'none solid rgb(69, 69, 69)') {
                $('#Underline').css('background-color', 'rgb(255, 255, 255)');
                $('#Underline').css('color', 'rgb(0, 0, 0)');
            } else {
                $('#Underline').css('background-color', 'rgb(0, 0, 0)');
                $('#Underline').css('color', 'rgb(255, 255, 255)');
            }
            if (align == 'left') {
                $('#leftalign').css('background-color', 'rgb(255, 255, 255)');
                $('#leftalign').css('color', 'rgb(0, 0, 0)');
                $('#leftalign').css('color', 'rgb(0, 0, 0)');
            } else if (align == 'right') {
                $('#Underline').css('background-color', 'rgb(255, 255, 255)');
                $('#Underline').css('color', 'rgb(0, 0, 0)');
            } else {
                $('#Underline').css('background-color', 'rgb(255, 255, 255)');
                $('#Underline').css('color', 'rgb(0, 0, 0)');
            }
        }

        function error() {
            var width = $('#labelcontent').css('width');
            var widthbox = $('#width').val();
            var heightbox = $('#height').val();
            var height = $('#labelcontent').css('height');
            var label_height_mm = parseFloat(height) * parseFloat(0.2645833333);
            var label_width_mm = parseFloat(width) * parseFloat(0.2645833333);
            // $('.droptrue').css('background-color', '#000');



            if (label_width_mm > (parseInt(widthbox) + 13)) {
                var w = Math.ceil(label_width_mm / 10) * 10;
                // $("#width").val(w);
                // $("#width").css('border', '1px solid red');
                // $("#labelcontent").css('border', '1px solid red');
                // $("#tbody").css('border', '1px solid red');
                $("#print").prop('disabled', true);
                $("#print").attr('style',
                    'background-color: #322a2aba !important;  height: auto !important; padding:6px; padding-left:13px; padding-right:13px;'
                );
                // $("#Label_tab").css('color', 'black');

            } else {
                // $("#width").css('border', '1px solid #000');
                // $("#tbody").css('border', '1px solid #f2ecec');
                // $("#tbody").css('border-radius', '10px');
                $("#print").attr('style',
                    'background-color: #000 !important;  height: auto !important;  padding:6px; padding-left:13px; padding-right:13px;'
                );
                // $("#print").css('background-color', ' rgb(0 0 0) !important');
                // $("#Label_tab").css('color', '#000');
                $("#print").prop('disabled', false);
            }

            if (label_height_mm > heightbox) {
                var h = Math.ceil(label_height_mm / 10) * 10;
                // // $("#height").val(h);
                // $("#labelcontent").css('border', '1px solid red');
                // $("#height").css('border', '1px solid red');

                // $("#tbody").css('border', '1px solid red');
                // $("#Label_tab").css('color', 'red');
                $("#print").attr('style',
                    'background-color: #322a2aba !important;  height: auto !important;  padding:6px; padding-left:13px; padding-right:13px;'
                );
                // $("#print").attr('style', 'background-color: #322a2aba !important;  height: auto !important;');
                // $("#print").css('background-color', '#322a2aba !important');
                $("#print").prop('disabled', true);
            } else {
                // $("#labelcontent").css('border', '1px solid #f2ecec');
                // $("#height").css('border', '1px solid #000');

                // $("#tbody").css('border', '1px solid #f2ecec');
                $("#print").prop('disabled', false);
                $("#print").attr('style',
                    'background-color: #000 !important;  height: auto !important; padding:6px; padding-left:13px; padding-right:13px;'
                );
                $("#print").css('background-color', ' rgb(0 0 0) !important');
                // $("#Label_tab").css('color', '#000');
            }
        }

        function canDoubleClickKeyup(currId) {
            var currLabelName = "labelcontent";

            var check = $('#' + currId).text($('#' + currId + '_input').val());
            var nonstoreId = currId.split('_');
            $('#' + currLabelName + nonstoreId[0]).text($('#' + currId + '_input').val() + ' ');
        }

        function selectbox() {
            if (($(".nonstore:checked").length) == $(".nonstore").length) {
                $("#selectall").prop("checked", true);
            } else {
                $("#selectall").prop("checked", false);
            }
        }

        function setHeightWidth() {
            labelHeight = $('#labelcontent').css('height');
            labelHeightmm = Math.ceil(parseFloat(labelHeight) * parseFloat(0.2645833333));

            // finalHeight = Math.ceil(labelHeightmm / 10) * 10;

            labelWidth = $('#labelcontent').css('width');
            labelWidthmm = Math.ceil(parseFloat(labelWidth) * parseFloat(0.2645833333));

            // finalWidth = Math.ceil(labelWidthmm / 10) * 10;

            // $('#labelcontent').css('height', finalHeight + 'mm');
            // $('#labelcontent').css('width', finalWidth + 'mm');
            $('#height').val(labelHeightmm);
            $('#width').val(labelWidthmm);
        }

        function toggleUploadOption() {

            let label1 = document.getElementById('labelstaticfield1');
            let label2 = document.getElementById('labelstaticfield2');
            let labelField1 = document.getElementById('label1_text_container');
            let labelField2 = document.getElementById('label2_text_container');


            if (label1 != null) {
                labelField1.style.display = label1.checked ? 'block' : 'none';
            }
            if (label2 != null) {
                labelField2.style.display = label2.checked ? 'block' : 'none';
            }
        }

        // $('#labelname').change(function() {

        //     checkLabelName();
        // });

        $(document).ready(function() {
            if ($('#dynamic-btn').is(":checked") == true) {
                if ($(".nonstore:checked").length === 12) {
                    $("#selectall").prop('checked', true);
                } else {
                    $('#selectall').prop('checked', false);
                }

            }

            $('.predefined_dynamic').change(function() {
                setHeightWidth();
            });


        });
        //Document ready
        $(document).ready(function() {
            let linesData = [];
            function saveLinePosition(element){
                let position = {
                    top: $(element).position().top,
                    left: $(element).position().left,
                    height: $(element).outerHeight(),
                    width: $(element).outerWidth()
                };
                linesData.push(position);
            }
            let label_design = @json($shipper_print);
            $('body').attr('style',
                'zoom:100% !important;font-family: Arial !important; font-size: 14px !important;');
            $("#printapplication").html("Print Application - Label Design");
            $('.ui-state-default').css('border', '1px solid #fff !important');
            $('input[type="checkbox"]').prop('disabled', true);
            $('.disabled_fields').prop('disabled', true);
            $('.predefined_dynamic').prop('disabled', true);
            $('#producttype_input').prop('disabled',true);
            $('#labeltype_input').prop('disabled',true);
            $('#labelname').attr('readonly', true);
            $('#labelimage1_upload').prop('disabled',true);
            $('#labelimage2_upload').prop('disabled',true);
            $('#fieldname').prop('checked', true);
            $('#labelstaticfield1_input').prop('disabled',true);
            $('#labelstaticfield2_input').prop('disabled',true);
            $('#fieldname').trigger('change');
            $(".alert").fadeOut(2000);
            //Label static field show in view
            label_design.labelstaticfield1_labelposition != '0px_0px_0px_0px_0px' ? $('#label1_text_container').show() : $('#label1_text_container').hide();
            label_design.labelstaticfield2_labelposition != '0px_0px_0px_0px_0px' ? $('#label2_text_container').show() : $('#label2_text_container').hide();

            if(label_design.label_type_dynamic_predefined === 'dynamic'){
                $('.unwantedfordynamiclabel').hide();
            }
            var some = [];

            var addedLineIds = [];

            $("#horizontal_line_append").click(function(){
                idPrefix_Labeltype = "labelcontent";

                var lineId = 'horizontal_line_' + Date.now();

                $("#labelcontent").append(`
                    <span id="${lineId}" class="textnonstore lines" style="position: absolute; border-bottom: 2px solid black; width: 200px; height: 20px; display: inline-block">  </span>
                `);

                $(`#${lineId}`).draggable({
                    start: function(event, ui) {
                        $(".line-vertical, .line-horizontal").show();
                    },
                    drag: function(event, ui) {
                        var x = ui.position.left + ui.helper.width() / 2;
                        var y = ui.position.top + ui.helper.height() / 2;
                        $(".line-vertical").css("left", x + "px");
                        $(".line-horizontal").css("top", y + "px");
                    },
                    stop: function() {
                        $(".line-vertical, .line-horizontal").hide();
                    },
                    containment: `#${idPrefix_Labeltype}`,
                }).resizable({
                    containment: `#${idPrefix_Labeltype}`,
                });
                addedLineIds.push(lineId);
            });

            var addedVerticalLineIds = [];

            $("#vertical_line_append").click(function(){
                idPrefix_Labeltype = "labelcontent";

                var lineId = 'vertical_line_' + Date.now();

                $("#labelcontent").append(`
                    <span id="${lineId}" class="textnonstore lines" style="position: absolute; border-left: 2px solid black; width: 100px; height: 100px; display: inline-block">  </span>
                `);

                $(`#${lineId}`).draggable({
                    start: function(event, ui) {
                        $(".line-vertical, .line-horizontal").show();
                    },
                    drag: function(event, ui) {
                        var x = ui.position.left + ui.helper.width() / 2;
                        var y = ui.position.top + ui.helper.height() / 2;
                        $(".line-vertical").css("left", x + "px");
                        $(".line-horizontal").css("top", y + "px");
                    },
                    stop: function() {
                        $(".line-vertical, .line-horizontal").hide();
                    },
                    containment: `#${idPrefix_Labeltype}`,
                }).resizable({
                    containment: `#${idPrefix_Labeltype}`,
                });

                addedVerticalLineIds.push(lineId);
            });

            $('#vertical_del').click(function(){
                var lastVerticalLineId = addedVerticalLineIds.pop();
                $(`#${lastVerticalLineId}`).remove();
            });

            $('#horizontal_del').click(function(){
                var lastLineId = addedLineIds.pop();
                $(`#${lastLineId}`).remove();
            });

            $(".image").click(function(){
                console.log("image click");
                if($(this).is(":checked") == true){
                    $(`#${this.id}_input`).show();
                }
                else{
                    $(`#${this.id}_input`).hide();
                }
            });

            $("#labelimage1_upload").change(function(){
                var ImageInput = $("#labelimage1_upload")[0];
                var image = ImageInput.files[0];

                if(image){
                    var imageUrl = URL.createObjectURL(image);
                    var imgElement = $("<img>").attr({
                                            "src": imageUrl,
                                            "height": "100", // Set the desired height
                                            "width": "100"   // Set the desired width
                                        }).addClass("global_image").attr("id", "label_image1_img");

                    $("#label_image1").empty();
                    $("#label_image1").html(imgElement)
                    $("#label_image1").show();
                }
            });

            $("#labelimage2_upload").change(function(){
                var ImageInput = $("#labelimage2_upload")[0];
                var image = ImageInput.files[0];

                if(image){
                    var imageUrl = URL.createObjectURL(image);
                    var imgElement = $("<img>").attr({
                                            "src": imageUrl,
                                            "height": "100", // Set the desired height
                                            "width": "100"   // Set the desired width
                                        }).addClass("global_image").attr("id", "label_image2_img");

                    $("#label_image2").empty();
                    $("#label_image2").html(imgElement)
                    $("#label_image2").show();
                }
            });

            $('.canDoubleClick').dblclick(function() {
                $('#save').prop('disabled', true);
                currId = this.id;
                // console.log(currId);
                $('#' + currId).hide();
                $('#' + currId + '_input').show();
                $('#' + currId + '_input').focus();

                $('#' + currId + '_input').keyup(function() {
                    canDoubleClickKeyup(currId);
                });
            });

            $('.freefieldinputbox, .Staticfieldinputbox').blur(function() {
                currId = this.id;
                var nonstoreId = currId.split('_');
                $('#' + currId).hide();
                // console.log($('#' + currId).data("original-value"));
                if ($('#' + currId).val() == '') {
                    $('#' + nonstoreId[0] + '_' + nonstoreId[1]).text($('#' + currId).data(
                        "original-value"));
                    $('#' + currId).val($('#' + currId).data("original-value"));
                    $('#' + nonstoreId[0] + '_label .fieldname').text($('#' + currId).data(
                        "original-value"));
                }
                $('#' + nonstoreId[0] + '_' + nonstoreId[1]).show();
                $('#save').prop('disabled', false);
            });

            $('#labelstaticfield1_input').keyup(function() {
                $('#labelcontent').find('.labelstaticfield1').empty();
                var sVal = $('#labelstaticfield1_input').val();
                $('#labelcontent').find('.labelstaticfield1').append($('#labelstaticfield1fn').is(':checked') ? `<span class="delimiter">:</span> ${sVal}` : `${sVal}`);
            });

            $('#labelstaticfield2_input').keyup(function() {
            $('#labelcontent').find('.labelstaticfield2').empty();
            var sVal = $('#labelstaticfield2_input').val();
            $('#labelcontent').find('.labelstaticfield2').append($('#labelstaticfield2fn').is(':checked') ? `<span class="delimiter">:</span> ${sVal}` : `${sVal}`);
            });

            //--------------labeledit view --------
            po();
            fieldnamechecked();


            var config = @json($config_data);
            var lines = @json($lines);
            selectbox();
            var label = @json($shipper_print);
            console.log(label, "label");
            let labelstaticfield1 = label.labelstaticfield1_input;
            let labelstaticfield2 = label.labelstaticfield2_input;
            let num = label.code_size;
            let code_type = label.code_type;
            qrorganizationname = "{{ $config_data->organization_name }}";
            qrorganizationname_fieldname = "Company Name";
            qrproductname = "{{ $config_data->product_name }}";
            qrproductid = "{{ $config_data->product_id }}";
            qrproductcomments = "{{ $config_data->comments }}";
            qrproductstaticfield1 = "{{ $config_data->p_static_field1 }}";
            qrproductstaticfield2 = "{{ $config_data->p_static_field2 }}";
            qrproductstaticfield3 = "{{ $config_data->p_static_field3 }}";
            qrproductstaticfield4 = "{{ $config_data->p_static_field4 }}";
            qrproductstaticfield5 = "{{ $config_data->p_static_field5 }}";
            qrproductstaticfield6 = "{{ $config_data->p_static_field6 }}";
            qrproductstaticfield7 = "{{ $config_data->p_static_field7 }}";
            qrproductstaticfield8 = "{{ $config_data->p_static_field8 }}";
            qrproductstaticfield9 = "{{ $config_data->p_static_field9 }}";
            qrproductstaticfield10 = "{{ $config_data->p_static_field10 }}";
            qrserialno = "{{ $config_data->serialno }}";
            qrbatchno = "{{ $config_data->batch_number }}";
            qrdateofmanufacture = "{{ $config_data->date_of_manufacturing }}";
            qrbarcodedelimiter = "{{ $config_data->barcode_delimiter }}";
            qrdateofexp = "{{ $config_data->date_of_expiry }}";
            qrdateofretest = "{{ $config_data->date_of_retest }}";
            qrbatchstaticfield1 = "{{ $config_data->b_static_field1 }}";
            qrbatchstaticfield2 = "{{ $config_data->b_static_field2 }}";
            qrbatchstaticfield3 = "{{ $config_data->b_static_field3 }}";
            qrbatchstaticfield4 = "{{ $config_data->b_static_field4 }}";
            qrbatchstaticfield5 = "{{ $config_data->b_static_field5 }}";
            qrcontainerno = "{{ $config_data->container_no }}";
            qrdynamicfield1 = "{{ $config_data->dynamic_field1 }}";
            qrdynamicfield2 = "{{ $config_data->dynamic_field2 }}";
            qrnetweight = "{{ $config_data->net_weight }}";
            qrtareweight = "{{ $config_data->tare_weight }}";
            qrgrossweight = "{{ $config_data->gross_weight }}";
            qrglobalfieldname1 = "{{ $config_data->global_fieldname1 }}";
            qrglobalfieldname2 = "{{ $config_data->global_fieldname2 }}";
            qrglobalstaticfield1 = "{{ $config_data->global_static_field1 }}";
            qrglobalstaticfield2 = "{{ $config_data->global_static_field2 }}";
            qrlabelstaticfield1 = "{{ $config_data->label_static_field1 }}";
            qrlabelstaticfield2 = "{{ $config_data->label_static_field2 }}";
            qrfreefiedl1 = label.Freefield1_label_value;
            qrfreefiedl2 = label.Freefield2_label_value;
            qrfreefiedl3 = label.Freefield3_label_value;
            qrfreefiedl4 = label.Freefield4_label_value;
            qrfreefiedl5 = label.Freefield5_label_value;
            qrfreefiedl6 = label.Freefield6_label_value;
            qrfreefiedl7 = label.Freefield7_label_value;
            qrfreefiedl8 = label.Freefield8_label_value;
            qrfreefiedl9 = label.Freefield9_label_value;



            let qrData = label.qrdata;
            let jsonObject = JSON.parse(qrData);
            let text = "";

            var organisationName = jsonObject["organizationname"] == "yes" && jsonObject["organizationnamefn"] ==
                "yes" ? `${qrorganizationname_fieldname} : ${qrorganizationname}${qrbarcodedelimiter}` :
                jsonObject["organizationname"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : 'NA';
            //checkbox click as per the qrdata
            jsonObject["organizationname"] === "yes" ? $('#qrorganizationname').prop('checked', true) : null;
            jsonObject["organizationnamefn"] === "yes" ? $('#qrorganizationnamefn').prop('checked', true) : null;

            var productName = jsonObject["productname"] == "yes" && jsonObject["productnamefn"] == "yes" ?
                `${qrproductname} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productname"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productname"] === "yes" ? $('#qrproductname').prop('checked', true) : null;
            jsonObject["productnamefn"] === "yes" ? $('#qrproductnamefn').prop('checked', true) : null;

            var productId = jsonObject["productid"] == "yes" && jsonObject["productidfn"] == "yes" ?
                `${qrproductid} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productid"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productid"] === "yes" ? $('#qrproductid').prop('checked', true) : null;
            jsonObject["productidfn"] === "yes" ? $('#qrproductidfn').prop('checked', true) : null;

            var productComments = jsonObject["productcomments"] == "yes" && jsonObject["productcommentsfn"] ==
                "yes" ? `${qrproductcomments} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productcomments"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productcomments"] === "yes" ? $('#qrproductcomments').prop('checked', true) : null;
            jsonObject["productcommentsfn"] === "yes" ? $('#qrproductcommentsfn').prop('checked', true) : null;


            var productstaticfield1 = jsonObject["productstaticfield1"] == "yes" && jsonObject[
                    "productstaticfield1fn"] == "yes" ? `${qrproductstaticfield1} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield1"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield1"] === "yes" ? $('#qrproductstaticfield1').prop('checked', true) : null;
            jsonObject["productstaticfield1fn"] === "yes" ? $('#qrproductstaticfield1fn').prop('checked', true) : null;

            var productstaticfield2 = jsonObject["productstaticfield2"] == "yes" && jsonObject[
                    "productstaticfield2fn"] == "yes" ? `${qrproductstaticfield2} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield2"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield2"] === "yes" ? $('#qrproductstaticfield2').prop('checked', true) : null;
            jsonObject["productstaticfield2fn"] === "yes" ? $('#qrproductstaticfield2fn').prop('checked', true) : null;

            var productstaticfield3 = jsonObject["productstaticfield3"] == "yes" && jsonObject[
                    "productstaticfield3fn"] == "yes" ? `${qrproductstaticfield3} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield3"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield3"] === "yes" ? $('#qrproductstaticfield3').prop('checked', true) : null;
            jsonObject["productstaticfield3fn"] === "yes" ? $('#qrproductstaticfield3fn').prop('checked', true) : null;

            var productstaticfield4 = jsonObject["productstaticfield4"] == "yes" && jsonObject[
                    "productstaticfield4fn"] == "yes" ? `${qrproductstaticfield4} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield4"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield4"] === "yes" ? $('#qrproductstaticfield4').prop('checked', true) : null;
            jsonObject["productstaticfield4fn"] === "yes" ? $('#qrproductstaticfield4fn').prop('checked', true) : null;

            var productstaticfield5 = jsonObject["productstaticfield5"] == "yes" && jsonObject[
                    "productstaticfield5fn"] == "yes" ? `${qrproductstaticfield5} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield5"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield5"] === "yes" ? $('#qrproductstaticfield5').prop('checked', true) : null;
            jsonObject["productstaticfield5fn"] === "yes" ? $('#qrproductstaticfield5fn').prop('checked', true) : null;

            var productstaticfield6 = jsonObject["productstaticfield6"] == "yes" && jsonObject[
                    "productstaticfield6fn"] == "yes" ? `${qrproductstaticfield6} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield6"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield6"] === "yes" ? $('#qrproductstaticfield6').prop('checked', true) : null;
            jsonObject["productstaticfield6fn"] === "yes" ? $('#qrproductstaticfield6fn').prop('checked', true) : null;

            var productstaticfield7 = jsonObject["productstaticfield7"] == "yes" && jsonObject[
                    "productstaticfield7fn"] == "yes" ? `${qrproductstaticfield7} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield7"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield7"] === "yes" ? $('#qrproductstaticfield7').prop('checked', true) : null;
            jsonObject["productstaticfield7fn"] === "yes" ? $('#qrproductstaticfield7fn').prop('checked', true) : null;

            var productstaticfield8 = jsonObject["productstaticfield8"] == "yes" && jsonObject[
                    "productstaticfield8fn"] == "yes" ? `${qrproductstaticfield8} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield8"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield8"] === "yes" ? $('#qrproductstaticfield8').prop('checked', true) : null;
            jsonObject["productstaticfield8fn"] === "yes" ? $('#qrproductstaticfield8fn').prop('checked', true) : null;

            var productstaticfield9 = jsonObject["productstaticfield9"] == "yes" && jsonObject[
                    "productstaticfield9fn"] == "yes" ? `${qrproductstaticfield9} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield9"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield9"] === "yes" ? $('#qrproductstaticfield9').prop('checked', true) : null;
            jsonObject["productstaticfield9fn"] === "yes" ? $('#qrproductstaticfield9fn').prop('checked', true) : null;

            var productstaticfield10 = jsonObject["productstaticfield10"] == "yes" && jsonObject[
                    "productstaticfield10fn"] == "yes" ? `${qrproductstaticfield10} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["productstaticfield10"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["productstaticfield10"] === "yes" ? $('#qrproductstaticfield10').prop('checked', true) : null;
            jsonObject["productstaticfield10fn"] === "yes" ? $('#qrproductstaticfield10fn').prop('checked', true) : null;


            var serialno = jsonObject["serialno"] == "yes" && jsonObject["serialnofn"] == "yes" ?
                `${qrserialno} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["serialno"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["serialno"] === "yes" ? $('#qrserialno').prop('checked', true) : null;
            jsonObject["serialnofn"] === "yes" ? $('#qrserialnofn').prop('checked', true) : null;

            var batchno = jsonObject["batchno"] == "yes" && jsonObject["batchnofn"] == "yes" ?
                `${qrbatchno} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["batchno"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["batchno"] === "yes" ? $('#qrbatchno').prop('checked', true) : null;
            jsonObject["batchnofn"] === "yes" ? $('#qrbatchnofn').prop('checked', true) : null;

            var dateofmanufacture = jsonObject["dateofmanufacture"] == "yes" && jsonObject["dateofmanufacturefn"] ==
                "yes" ? `${qrdateofmanufacture} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["dateofmanufacture"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["dateofmanufacture"] === "yes" ? $('#qrdateofmanufacture').prop('checked', true) : null;
            jsonObject["dateofmanufacturefn"] === "yes" ? $('#qrdateofmanufacturefn').prop('checked', true) : null;

            var dateofexp = jsonObject["dateofexp"] == "yes" && jsonObject["dateofexpfn"] == "yes" ?
                `${qrdateofexp} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["dateofexp"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["dateofexp"] === "yes" ? $('#qrdateofexp').prop('checked', true) : null;
            jsonObject["dateofexpfn"] === "yes" ? $('#qrdateofexpfn').prop('checked', true) : null;

            var dateofretest = jsonObject["dateofretest"] == "yes" && jsonObject["dateofretestfn"] == "yes" ?
                `${qrdateofretest} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["dateofretest"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["dateofretest"] === "yes" ? $('#qrdateofretest').prop('checked', true) : null;
            jsonObject["dateofretestfn"] === "yes" ? $('#qrdateofretestfn').prop('checked', true) : null;

            var batchstaticfield1 = jsonObject["batchstaticfield1"] == "yes" && jsonObject["batchstaticfield1fn"] ==
                "yes" ? `${qrbatchstaticfield1} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield1"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["batchstaticfield1"] === "yes" ? $('#qrbatchstaticfield1').prop('checked', true) : null;
            jsonObject["batchstaticfield1fn"] === "yes" ? $('#qrbatchstaticfield1fn').prop('checked', true) : null;

            var batchstaticfield2 = jsonObject["batchstaticfield2"] == "yes" && jsonObject["batchstaticfield2fn"] ==
                "yes" ? `${qrbatchstaticfield2} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield2"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["batchstaticfield2"] === "yes" ? $('#qrbatchstaticfield2').prop('checked', true) : null;
            jsonObject["batchstaticfield2fn"] === "yes" ? $('#qrbatchstaticfield2fn').prop('checked', true) : null;

            var batchstaticfield3 = jsonObject["batchstaticfield3"] == "yes" && jsonObject["batchstaticfield3fn"] ==
                "yes" ? `${qrbatchstaticfield3} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield3"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["batchstaticfield3"] === "yes" ? $('#qrbatchstaticfield3').prop('checked', true) : null;
            jsonObject["batchstaticfield3fn"] === "yes" ? $('#qrbatchstaticfield3fn').prop('checked', true) : null;

            var batchstaticfield4 = jsonObject["batchstaticfield4"] == "yes" && jsonObject["batchstaticfield4fn"] ==
                "yes" ? `${qrbatchstaticfield4} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield4"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["batchstaticfield4"] === "yes" ? $('#qrbatchstaticfield4').prop('checked', true) : null;
            jsonObject["batchstaticfield4fn"] === "yes" ? $('#qrbatchstaticfield4fn').prop('checked', true) : null;

            var batchstaticfield5 = jsonObject["batchstaticfield5"] == "yes" && jsonObject["batchstaticfield5fn"] ==
                "yes" ? `${qrbatchstaticfield5} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield5"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["batchstaticfield5"] === "yes" ? $('#qrbatchstaticfield5').prop('checked', true) : null;
            jsonObject["batchstaticfield5fn"] === "yes" ? $('#qrbatchstaticfield5fn').prop('checked', true) : null;

            var containerno = jsonObject["containerno"] == "yes" && jsonObject["containernofn"] == "yes" ?
                `${qrcontainerno} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["containerno"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["containerno"] === "yes" ? $('#qrcontainerno').prop('checked', true) : null;
            jsonObject["containernofn"] === "yes" ? $('#qrcontainernofn').prop('checked', true) : null;

            var netweight = jsonObject["netweight"] == "yes" && jsonObject["netweightfn"] == "yes" ?
                `${qrnetweight} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["netweight"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["netweight"] === "yes" ? $('#qrnetweight').prop('checked', true) : null;
            jsonObject["netweightfn"] === "yes" ? $('#qrnetweightfn').prop('checked', true) : null;

            var tareweight = jsonObject["tareweight"] == "yes" && jsonObject["tareweightfn"] == "yes" ?
                `${qrtareweight} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["tareweight"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["tareweight"] === "yes" ? $('#qrtareweight').prop('checked', true) : null;
            jsonObject["tareweightfn"] === "yes" ? $('#qrtareweightfn').prop('checked', true) : null;

            var grossweight = jsonObject["grossweight"] == "yes" && jsonObject["grossweightfn"] == "yes" ?
                `${qrgrossweight} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["grossweight"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["grossweight"] === "yes" ? $('#qrgrossweight').prop('checked', true) : null;
            jsonObject["grossweightfn"] === "yes" ? $('#qrgrossweightfn').prop('checked', true) : null;

            var dynamicfield1 = jsonObject["dynamicfield1"] == "yes" && jsonObject["dynamicfield1fn"] == "yes" ?
                `${qrdynamicfield1} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["dynamicfield1"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["dynamicfield1"] === "yes" ? $('#qrdynamicfield1').prop('checked', true) : null;
            jsonObject["dynamicfield1fn"] === "yes" ? $('#qrdynamicfield1fn').prop('checked', true) : null;

            var dynamicfield2 = jsonObject["dynamicfield2"] == "yes" && jsonObject["dynamicfield2fn"] == "yes" ?
                `${qrdynamicfield2} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["dynamicfield2"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["dynamicfield2"] === "yes" ? $('#qrdynamicfield2').prop('checked', true) : null;
            jsonObject["dynamicfield2fn"] === "yes" ? $('#qrdynamicfield2fn').prop('checked', true) : null;

            var globalstaticfield1 = jsonObject["globalstaticfield1"] == "yes" && jsonObject[
                "globalstaticfield1fn"] == "yes" ? `${qrglobalstaticfield1} : ${qrglobalfieldname1}${qrbarcodedelimiter}` :
                jsonObject["globalstaticfield1"] == "yes" ? `${qrglobalfieldname1}${qrbarcodedelimiter}` : '';
            jsonObject["globalstaticfield1"] === "yes" ? $('#qrglobalstaticfield1').prop('checked', true) : null;
            jsonObject["globalstaticfield1fn"] === "yes" ? $('#qrglobalstaticfield1fn').prop('checked', true) : null;

            var globalstaticfield2 = jsonObject["globalstaticfield2"] == "yes" && jsonObject[
                "globalstaticfield2fn"] == "yes" ? `${qrglobalstaticfield2} : ${qrglobalfieldname2}${qrbarcodedelimiter}` :
                jsonObject["globalstaticfield2"] == "yes" ? `${qrglobalfieldname2}${qrbarcodedelimiter}` : '';
            jsonObject["globalstaticfield2"] === "yes" ? $('#qrglobalstaticfield2').prop('checked', true) : null;
            jsonObject["globalstaticfield2fn"] === "yes" ? $('#qrglobalstaticfield2fn').prop('checked', true) : null;

            var label_labelstaticfield1 = jsonObject["labelstaticfield1"] == "yes" && jsonObject[
                    "labelstaticfield1fn"] == "yes" ? `${qrlabelstaticfield1} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["labelstaticfield1"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["labelstaticfield1"] === "yes" ? $('#qrlabelstaticfield1').prop('checked', true) : null;
            jsonObject["labelstaticfield1fn"] === "yes" ? $('#qrlabelstaticfield1fn').prop('checked', true) : null;

            var label_labelstaticfield2 = jsonObject["labelstaticfield2"] == "yes" && jsonObject[
                    "labelstaticfield2fn"] == "yes" ? `${qrlabelstaticfield2} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["labelstaticfield2"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["labelstaticfield2"] === "yes" ? $('#qrlabelstaticfield2').prop('checked', true) : null;
            jsonObject["labelstaticfield2fn"] === "yes" ? $('#qrlabelstaticfield2fn').prop('checked', true) : null;

            var freefield1 = jsonObject["freefield1"] == "yes" && jsonObject["freefield1fn"] == "yes" ?
                `${qrfreefiedl1} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield1"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield1"] === "yes" ? $('#qrFreefield1').prop('checked', true) : null;
            jsonObject["freefield1fn"] === "yes" ? $('#qrfreefield1fn').prop('checked', true) : null;

            var freefield2 = jsonObject["freefield2"] == "yes" && jsonObject["freefield2fn"] == "yes" ?
                `${qrfreefiedl2} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield2"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield2"] === "yes" ? $('#qrFreefield2').prop('checked', true) : null;
            jsonObject["freefield2fn"] === "yes" ? $('#qrfreefield2fn').prop('checked', true) : null;

            var freefield3 = jsonObject["freefield3"] == "yes" && jsonObject["freefield3fn"] == "yes" ?
                `${qrfreefiedl3} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield3"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield3"] === "yes" ? $('#qrFreefield3').prop('checked', true) : null;
            jsonObject["freefield3fn"] === "yes" ? $('#qrfreefield3fn').prop('checked', true) : null;

            var freefield4 = jsonObject["freefield4"] == "yes" && jsonObject["freefield4fn"] == "yes" ?
                `${qrfreefiedl4} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield4"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield4"] === "yes" ? $('#qrFreefield4').prop('checked', true) : null;
            jsonObject["freefield4fn"] === "yes" ? $('#qrfreefield4fn').prop('checked', true) : null;

            var freefield5 = jsonObject["freefield5"] == "yes" && jsonObject["freefield5fn"] == "yes" ?
                `${qrfreefiedl5} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield5"] == "yes" ? `XXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield5"] === "yes" ? $('#qrFreefield5').prop('checked', true) : null;
            jsonObject["freefield5fn"] === "yes" ? $('#qrfreefield5fn').prop('checked', true) : null;

            var freefield6 = jsonObject["freefield6"] == "yes" && jsonObject["freefield6fn"] == "yes" ?
                `${qrfreefiedl6} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield6"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield6"] === "yes" ? $('#qrFreefield6').prop('checked', true) : null;
            jsonObject["freefield6fn"] === "yes" ? $('#qrfreefield6fn').prop('checked', true) : null;

            var freefield7 = jsonObject["freefield7"] == "yes" && jsonObject["freefield7fn"] == "yes" ?
                `${qrfreefiedl7} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield7"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield7"] === "yes" ? $('#qrFreefield7').prop('checked', true) : null;
            jsonObject["freefield7fn"] === "yes" ? $('#qrfreefield7fn').prop('checked', true) : null;

            var freefield8 = jsonObject["freefield8"] == "yes" && jsonObject["freefield8fn"] == "yes" ?
                `${qrfreefiedl8} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield8"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield8"] === "yes" ? $('#qrFreefield8').prop('checked', true) : null;
            jsonObject["freefield8fn"] === "yes" ? $('#qrfreefield8fn').prop('checked', true) : null;

            var freefield9 = jsonObject["freefield9"] == "yes" && jsonObject["freefield9fn"] == "yes" ?
                `${qrfreefiedl9} : XXXXX${qrbarcodedelimiter}` :
                jsonObject["freefield9"] == "yes" ? `XXXXX${qrbarcodedelimiter}` : '';
            jsonObject["freefield9"] === "yes" ? $('#qrFreefield9').prop('checked', true) : null;
            jsonObject["freefield9fn"] === "yes" ? $('#qrfreefield9fn').prop('checked', true) : null;


            text = organisationName + productName + productId + productComments + productstaticfield1 +
                productstaticfield2 + productstaticfield3 + productstaticfield4 + productstaticfield5 +
                productstaticfield6 + productstaticfield7 + productstaticfield8 + productstaticfield9 +
                productstaticfield10 + serialno +
                batchno + dateofmanufacture + dateofexp + dateofretest + batchstaticfield1 + batchstaticfield2 +
                batchstaticfield3 + batchstaticfield4 + batchstaticfield5 + containerno +
                netweight + tareweight + grossweight + dynamicfield1 + dynamicfield2 + globalstaticfield1 +
                globalstaticfield2 + label_labelstaticfield1 + label_labelstaticfield2 + freefield1 + freefield2 +
                freefield3 + freefield4 + freefield5 + freefield6 + freefield7 + freefield8 + freefield9;


            var idPrefix_Labeltype = 'labelcontent';
            var displaynone = '';
            var currLabelName = 'labelcontent';

            var organizationname_label_style = label.organizationname_label_style.split('_');
            var productname_label_style = label.productname_label_style.split('_');
            var productid_label_style = label.productid_label_style.split('_');
            var productcomments_label_style = label.productcomments_label_style.split('_');
            var productstaticfield1_label_style = label.productstaticfield1_label_style.split('_');
            var productstaticfield2_label_style = label.productstaticfield2_label_style.split('_');
            var productstaticfield3_label_style = label.productstaticfield3_label_style.split('_');
            var productstaticfield4_label_style = label.productstaticfield4_label_style.split('_');
            var productstaticfield5_label_style = label.productstaticfield5_label_style.split('_');
            var productstaticfield6_label_style = label.productstaticfield6_label_style.split('_');
            var productstaticfield7_label_style = label.productstaticfield7_label_style.split('_');
            var productstaticfield8_label_style = label.productstaticfield8_label_style.split('_');
            var productstaticfield9_label_style = label.productstaticfield9_label_style.split('_');
            var productstaticfield10_label_style = label.productstaticfield10_label_style.split('_');
            var serialno_label_style = label.serialno_label_style.split('_');
            var batchno_label_style = label.batchno_label_style.split('_');
            var dateofmanufacture_label_style = label.dateofmanufacture_label_style.split('_');
            var dateofexp_label_style = label.dateofexp_label_style.split('_');
            var dateofretest_label_style = label.dateofretest_label_style.split('_');
            var batchstaticfield1_label_style = label.batchstaticfield1_label_style.split('_');
            var batchstaticfield2_label_style = label.batchstaticfield2_label_style.split('_');
            var batchstaticfield3_label_style = label.batchstaticfield3_label_style.split('_');
            var batchstaticfield4_label_style = label.batchstaticfield4_label_style.split('_');
            var batchstaticfield5_label_style = label.batchstaticfield5_label_style.split('_');
            var netweight_label_style = label.netweight_label_style.split('_');
            if (label.grossweight_label_style != null) {
                var grossweight_label_style = label.grossweight_label_style.split('_');
                var tareweight_label_style = label.tareweight_label_style.split('_');
            }
            var containerno_label_style = label.containerno_label_style.split('_');
            var dynamicfield1_label_style = label.dynamicfield1_label_style.split('_');
            var dynamicfield2_label_style = label.dynamicfield2_label_style.split('_');
            var globalstaticfield1_label_style = label.globalstaticfield1_label_style.split('_');
            var globalstaticfield2_label_style = label.globalstaticfield2_label_style.split('_');

            var labelstaticfield1_label_style = label.labelstaticfield1_label_style.split('_');
            var labelstaticfield2_label_style = label.labelstaticfield2_label_style.split('_');
            var Freefield1_label_style = label.Freefield1_label_style.split('_');
            var Freefield2_label_style = label.Freefield2_label_style.split('_');
            var Freefield3_label_style = label.Freefield3_label_style.split('_');
            var Freefield4_label_style = label.Freefield4_label_style.split('_');
            var Freefield5_label_style = label.Freefield5_label_style.split('_');
            var Freefield6_label_style = label.Freefield6_label_style.split('_');
            var Freefield7_label_style = label.Freefield7_label_style.split('_');
            var Freefield8_label_style = label.Freefield8_label_style.split('_');
            var Freefield9_label_style = label.Freefield9_label_style.split('_');


            var Freefield1_label_value = label.Freefield1_label_value;
            var Freefield2_label_value = label.Freefield2_label_value;
            var Freefield3_label_value = label.Freefield3_label_value;
            var Freefield4_label_value = label.Freefield4_label_value;
            var Freefield5_label_value = label.Freefield5_label_value;
            var Freefield6_label_value = label.Freefield6_label_value;
            var Freefield7_label_value = label.Freefield7_label_value;
            var Freefield8_label_value = label.Freefield8_label_value;
            var Freefield9_label_value = label.Freefield9_label_value;


            var organizationname_labelposition = label.organizationname_labelposition;
            var organizationname_pos = label.organizationname_labelposition.split('_');

            var productname_labelposition = label.productname_labelposition;
            var productname_pos = label.productname_labelposition.split('_');

            var productid_labelposition = label.productid_labelposition;
            var productid_pos = label.productid_labelposition.split('_');

            var productcomments_labelposition = label.productcomments_labelposition;
            var productcomments_pos = label.productcomments_labelposition.split('_');

            var productstaticfield1_labelposition = label.productstaticfield1_labelposition;
            var productstaticfield1_pos = label.productstaticfield1_labelposition.split('_');

            var productstaticfield2_labelposition = label.productstaticfield2_labelposition;
            var productstaticfield2_pos = label.productstaticfield2_labelposition.split('_');

            var productstaticfield3_labelposition = label.productstaticfield3_labelposition;
            var productstaticfield3_pos = label.productstaticfield3_labelposition.split('_');

            var productstaticfield4_labelposition = label.productstaticfield4_labelposition;
            var productstaticfield4_pos = label.productstaticfield4_labelposition.split('_');

            var productstaticfield5_labelposition = label.productstaticfield5_labelposition;
            var productstaticfield5_pos = label.productstaticfield5_labelposition.split('_');

            var productstaticfield6_labelposition = label.productstaticfield6_labelposition;
            var productstaticfield6_pos = label.productstaticfield6_labelposition.split('_');

            var productstaticfield7_labelposition = label.productstaticfield7_labelposition;
            var productstaticfield7_pos = label.productstaticfield7_labelposition.split('_');

            var productstaticfield8_labelposition = label.productstaticfield8_labelposition;
            var productstaticfield8_pos = label.productstaticfield8_labelposition.split('_');

            var productstaticfield9_labelposition = label.productstaticfield9_labelposition;
            var productstaticfield9_pos = label.productstaticfield9_labelposition.split('_');

            var productstaticfield10_labelposition = label.productstaticfield10_labelposition;
            var productstaticfield10_pos = label.productstaticfield10_labelposition.split('_');

            var serialno_labelposition = label.serialno_labelposition;
            var serialno_pos = label.serialno_labelposition.split('_');

            var batchno_labelposition = label.batchno_labelposition;
            var batchno_pos = label.batchno_labelposition.split('_');

            var dateofmanufacture_labelposition = label.dateofmanufacture_labelposition;
            var dateofmanufacture_pos = label.dateofmanufacture_labelposition.split('_');

            var dateofexp_labelposition = label.dateofexp_labelposition;
            var dateofexp_pos = label.dateofexp_labelposition.split('_');

            var dateofretest_labelposition = label.dateofretest_labelposition;
            var dateofretest_pos = label.dateofretest_labelposition.split('_');

            var batchstaticfield1_labelposition = label.batchstaticfield1_labelposition;
            var batchstaticfield1_pos = label.batchstaticfield1_labelposition.split('_');

            var batchstaticfield2_labelposition = label.batchstaticfield2_labelposition;
            var batchstaticfield2_pos = label.batchstaticfield2_labelposition.split('_');

            var batchstaticfield3_labelposition = label.batchstaticfield3_labelposition;
            var batchstaticfield3_pos = label.batchstaticfield3_labelposition.split('_');

            var batchstaticfield4_labelposition = label.batchstaticfield4_labelposition;
            var batchstaticfield4_pos = label.batchstaticfield4_labelposition.split('_');

            var batchstaticfield5_labelposition = label.batchstaticfield5_labelposition;
            var batchstaticfield5_pos = label.batchstaticfield5_labelposition.split('_');

            var netweight_labelposition = label.netweight_labelposition;
            var netweight_pos = label.netweight_labelposition.split('_');

            var grossweight_labelposition = label.grossweight_labelposition;
            var grossweight_pos = label.grossweight_labelposition.split('_');

            var tareweight_labelposition = label.tareweight_labelposition;
            var tareweight_pos = label.tareweight_labelposition.split('_');

            var dynamicfield1_labelposition = label.dynamicfield1_labelposition;
            var dynamicfield1_pos = label.dynamicfield1_labelposition.split('_');

            var containerno_labelposition = label.containerno_labelposition;
            var containerno_pos = label.containerno_labelposition.split('_');

            var dynamicfield2_labelposition = label.dynamicfield2_labelposition;
            var dynamicfield2_pos = label.dynamicfield2_labelposition.split('_');

            var globalstaticfield1_labelposition = label.globalstaticfield1_labelposition;
            var globalstaticfield1_pos = label.globalstaticfield1_labelposition.split('_');

            var globalstaticfield2_labelposition = label.globalstaticfield2_labelposition;
            var globalstaticfield2_pos = label.globalstaticfield2_labelposition.split('_');

            var labelstaticfield1_labelposition = label.labelstaticfield1_labelposition;
            var labelstaticfield1_pos = label.labelstaticfield1_labelposition.split('_');

            var labelstaticfield2_labelposition = label.labelstaticfield2_labelposition;
            var labelstaticfield2_pos = label.labelstaticfield2_labelposition.split('_');

            var Freefield1_labelposition = label.Freefield1_labelposition;
            var Freefield1_pos = label.Freefield1_labelposition.split('_');
            var Freefield2_labelposition = label.Freefield2_labelposition;
            var Freefield2_pos = label.Freefield2_labelposition.split('_');
            var Freefield3_labelposition = label.Freefield3_labelposition;
            var Freefield3_pos = label.Freefield3_labelposition.split('_');
            var Freefield4_labelposition = label.Freefield4_labelposition;
            var Freefield4_pos = label.Freefield4_labelposition.split('_');
            var Freefield5_labelposition = label.Freefield5_labelposition;
            var Freefield5_pos = label.Freefield5_labelposition.split('_');
            var Freefield6_labelposition = label.Freefield6_labelposition;
            var Freefield6_pos = label.Freefield6_labelposition.split('_');
            var Freefield7_labelposition = label.Freefield7_labelposition;
            var Freefield7_pos = label.Freefield7_labelposition.split('_');
            var Freefield8_labelposition = label.Freefield8_labelposition;
            var Freefield8_pos = label.Freefield8_labelposition.split('_');
            var Freefield9_labelposition = label.Freefield9_labelposition;
            var Freefield9_pos = label.Freefield9_labelposition.split('_');


            var globalimage1_labelposition = label.globalimage1_labelposition
            var globalimage1_pos = globalimage1_labelposition.split("_");

            var globalimage2_labelposition = label.globalimage2_labelposition
            var globalimage2_pos = globalimage2_labelposition.split("_");

            var labelimage1_labelposition = label.labelimage1_labelposition
            var labelimage1_pos = labelimage1_labelposition.split("_");

            var labelimage2_labelposition = label.labelimage2_labelposition
            var labelimage2_pos = labelimage2_labelposition.split("_");

            var code_pos = label.code_position.split('_');

            var Freefield1_label_value = label.Freefield1_label_value;
            var Freefield2_label_value = label.Freefield2_label_value;
            var Freefield3_label_value = label.Freefield3_label_value;
            var Freefield4_label_value = label.Freefield4_label_value;
            var Freefield5_label_value = label.Freefield5_label_value;
            var Freefield6_label_value = label.Freefield6_label_value;
            var Freefield7_label_value = label.Freefield7_label_value;
            var Freefield8_label_value = label.Freefield8_label_value;
            var Freefield9_label_value = label.Freefield9_label_value;
            var labelstaticfield1_input = label.labelstaticfield1_input;
            var labelstaticfield2_input = label.labelstaticfield1_input;

            // var staticfield_input = label.Staticfield_input;
            // var labelstaticfield_input = label.labelstaticfield_input;
            var output = "";




            if (organizationname_labelposition != null && organizationname_labelposition != '0px_0px_0px_0px_0px') {
                if (organizationname_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}organizationname_label" class="textnonstore ui-state-default"  style='font-weight:${organizationname_label_style[0]}; font-style:${organizationname_label_style[1]}; text-decoration:${organizationname_label_style[2]}; text-align:${organizationname_label_style[3]}; font-size:${organizationname_label_style[4]}; font-family:${organizationname_label_style[5]}; position:absolute;  top: ${organizationname_pos[0]}; left: ${organizationname_pos[1]}; height:${organizationname_pos[2]}; width: ${organizationname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}organizationname"style="width: ${organizationname_pos[4]}; text-decoration:${organizationname_label_style[2]}; white-space: nowrap; display:inline-block">Company Name</span><span  class="organizationname" style="color:#ff5454"><span class="delimiter"> :</span> {{ $config_data->organization_name }}</span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}organizationname_label" class="textnonstore ui-state-default"  style='font-weight:${organizationname_label_style[0]}; font-style:${organizationname_label_style[1]}; text-decoration:${organizationname_label_style[2]}; text-align:${organizationname_label_style[3]}; font-size:${organizationname_label_style[4]}; font-family:${organizationname_label_style[5]}; position:absolute;  top: ${organizationname_pos[0]}; left: ${organizationname_pos[1]}; height:${organizationname_pos[2]}; width: ${organizationname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}organizationname"style="width: ${organizationname_pos[4]}; text-decoration:${organizationname_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="delimiter"></span><span  class="organizationname" style="color:#ff5454"> {{ $config_data->organization_name }}</span></span>`
                        );
                }
            }

            if (productname_labelposition != null && productname_labelposition != '0px_0px_0px_0px_0px') {
                if (productname_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}productname_label" class="textnonstore ui-state-default"  style='font-weight:${productname_label_style[0]}; font-style:${productname_label_style[1]}; text-decoration:${productname_label_style[2]}; text-align:${productname_label_style[3]}; font-size:${productname_label_style[4]}; font-family:${productname_label_style[5]}; position:absolute;  top: ${productname_pos[0]}; left: ${productname_pos[1]}; height:${productname_pos[2]}; width: ${productname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}productname"style="width: ${productname_pos[4]}; text-decoration:${productname_label_style[2]}; white-space: nowrap; display:inline-block">{{ $config_data->product_name }}</span><span style="color:#ff5454" class="productname"><span class="delimiter"> :</span> XXXXXXX</span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productname_label" class="textnonstore ui-state-default"  style='font-weight:${productname_label_style[0]}; font-style:${productname_label_style[1]}; text-decoration:${productname_label_style[2]}; text-align:${productname_label_style[3]}; font-size:${productname_label_style[4]}; font-family:${productname_label_style[5]}; position:absolute;  top: ${productname_pos[0]}; left: ${productname_pos[1]}; height:${productname_pos[2]}; width: ${productname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}productname"style="width: ${productname_pos[4]}; text-decoration:${productname_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="delimiter"></span><span class="productname" style="color:#ff5454"> XXXXXXX</span></span>`
                        );
                }
            }

            if (productid_labelposition != null && productid_labelposition != '0px_0px_0px_0px_0px') {
                if (productid_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}productid_label" class="textnonstore ui-state-default" style='font-weight:${productid_label_style[0]}; font-style:${productid_label_style[1]}; text-decoration:${productid_label_style[2]}; text-align:${productid_label_style[3]}; font-size:${ productid_label_style[4]}; font-family:${ productid_label_style[5]}; position:absolute; top:${productid_pos[0]}; left:${productid_pos[1]}; height:${productid_pos[2]}; width:${productid_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}productid" style="width: ${productid_pos[4]}; text-decoration:${productid_label_style[2]}; white-space: nowrap; display:inline-block">{{ $config_data->product_id }} </span><span style="color:#ff5454"; class="productid"><span class="delimiter"> :</span> XXXXX </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productid_label" class="textnonstore ui-state-default" style='font-weight:${productid_label_style[0]}; font-style:${productid_label_style[1]}; text-decoration:${productid_label_style[2]}; text-align:${productid_label_style[3]}; font-size:${ productid_label_style[4]}; font-family:${ productid_label_style[5]}; position:absolute; top:${productid_pos[0]}; left:${productid_pos[1]}; height:${productid_pos[2]}; width:${productid_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}productid" style="width: ${productid_pos[4]}; text-decoration:${productid_label_style[2]}; white-space: nowrap; display:inline-block"></span><span style="color:#ff5454";class="productid"> XXXXX </span></span>`
                        );
                }
            }

            if (productcomments_labelposition != null && productcomments_labelposition != '0px_0px_0px_0px_0px') {
                if (productcomments_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}productcomments_label" class="textnonstore ui-state-default" style='font-weight:${productcomments_label_style[0]}; font-style:${productcomments_label_style[1]}; text-decoration:${productcomments_label_style[2]}; text-align:${productcomments_label_style[3]}; font-size:${productcomments_label_style[4]}; font-family:${productcomments_label_style[5]}; position:absolute; top: ${productcomments_pos[0]}; left:${productcomments_pos[1]}; height:${productcomments_pos[2]}; width:${productcomments_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}productcomments" style="width: ${productcomments_pos[4]}; text-decoration:${productcomments_label_style[2]}; white-space: nowrap; display:inline-block">{{ $config_data->comments }}</span> <span class="productcomments" style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productcomments_label" class="textnonstore ui-state-default" style='font-weight:${productcomments_label_style[0]}; font-style:${productcomments_label_style[1]}; text-decoration:${productcomments_label_style[2]}; text-align:${productcomments_label_style[3]}; font-size:${productcomments_label_style[4]}; font-family:${productcomments_label_style[5]}; position:absolute; top: ${productcomments_pos[0]}; left:${productcomments_pos[1]}; height:${productcomments_pos[2]}; width:${productcomments_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}productcomments" style="width: ${productcomments_pos[4]}; text-decoration:${productcomments_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="productcomments" style="color:#ff5454"> XXXXX </span></span>`
                        );
                }
            }

            if (productstaticfield1_labelposition != null && productstaticfield1_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield1_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}productstaticfield1_label" class="textnonstore ui-state-default" style='font-weight:${productstaticfield1_label_style[0]}; font-style:${productstaticfield1_label_style[1]}; text-decoration:${productstaticfield1_label_style[2]}; text-align:${productstaticfield1_label_style[3]}; font-size:${productstaticfield1_label_style[4]}; font-family:${productstaticfield1_label_style[5]}; position:absolute; top:${productstaticfield1_pos[0]}; left:${productstaticfield1_pos[1]}; height:${productstaticfield1_pos[2]}; width:${productstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield1" style="width:${productstaticfield1_pos[4]}; text-decoration:${productstaticfield1_label_style[2]}; display: inline-block; white-space: nowrap;">{{ $config_data->p_static_field1 }}</span><span class="productstaticfield1" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield1_label" class="textnonstore ui-state-default" style='font-weight:${productstaticfield1_label_style[0]}; font-style:${productstaticfield1_label_style[1]}; text-decoration:${productstaticfield1_label_style[2]}; text-align:${productstaticfield1_label_style[3]}; font-size:${productstaticfield1_label_style[4]}; font-family:${productstaticfield1_label_style[5]}; position:absolute; top:${productstaticfield1_pos[0]}; left:${productstaticfield1_pos[1]}; height:${productstaticfield1_pos[2]}; width:${productstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield1" style="width:${productstaticfield1_pos[4]}; text-decoration:${productstaticfield1_label_style[2]}; display: inline-block; white-space: nowrap;"></span><span class="productstaticfield1" style="color:#ff5454">  XXXXX </span></span>`
                        );
                }
            }

            if (productstaticfield2_labelposition != null && productstaticfield2_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield2_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}productstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield2_label_style[0]}; font-style:${productstaticfield2_label_style[1]}; text-decoration:${productstaticfield2_label_style[2]}; text-align:${productstaticfield2_label_style[3]}; font-size:${productstaticfield2_label_style[4]}; font-family:${productstaticfield2_label_style[5]}; position:absolute; top:${productstaticfield2_pos[0]}; left:${productstaticfield2_pos[1]}; height:${productstaticfield2_pos[2]}; width:${productstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield2" style="width:${productstaticfield2_pos[4]}; text-decoration:${productstaticfield2_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->p_static_field2 }} </span><span class="productstaticfield2" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield2_label_style[0]}; font-style:${productstaticfield2_label_style[1]}; text-decoration:${productstaticfield2_label_style[2]}; text-align:${productstaticfield2_label_style[3]}; font-size:${productstaticfield2_label_style[4]}; font-family:${productstaticfield2_label_style[5]}; position:absolute; top:${productstaticfield2_pos[0]}; left:${productstaticfield2_pos[1]}; height:${productstaticfield2_pos[2]}; width:${productstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield2" style="width:${productstaticfield2_pos[4]}; text-decoration:${productstaticfield2_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield2" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (productstaticfield3_labelposition != null && productstaticfield3_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield3_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}productstaticfield3_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield3_label_style[0]}; font-style:${productstaticfield3_label_style[1]}; text-decoration:${productstaticfield3_label_style[2]}; text-align:${productstaticfield3_label_style[3]}; font-size:${productstaticfield3_label_style[4]}; font-family:${productstaticfield3_label_style[5]}; position:absolute; top:${productstaticfield3_pos[0]}; left:${productstaticfield3_pos[1]}; height:${productstaticfield3_pos[2]}; width:${productstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield3" style="width:${productstaticfield3_pos[4]}; text-decoration:${productstaticfield3_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->p_static_field3 }} </span> <span class="productstaticfield3" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield3_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield3_label_style[0]}; font-style:${productstaticfield3_label_style[1]}; text-decoration:${productstaticfield3_label_style[2]}; text-align:${productstaticfield3_label_style[3]}; font-size:${productstaticfield3_label_style[4]}; font-family:${productstaticfield3_label_style[5]}; position:absolute; top:${productstaticfield3_pos[0]}; left:${productstaticfield3_pos[1]}; height:${productstaticfield3_pos[2]}; width:${productstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield3" style="width:${productstaticfield3_pos[4]}; text-decoration:${productstaticfield3_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield3" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (productstaticfield4_labelposition != null && productstaticfield4_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield4_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}productstaticfield4_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield4_label_style[0]}; font-style:${productstaticfield4_label_style[1]}; text-decoration:${productstaticfield4_label_style[2]}; text-align:${productstaticfield4_label_style[3]}; font-size:${productstaticfield4_label_style[4]}; font-family:${productstaticfield4_label_style[5]}; position:absolute; top:${productstaticfield4_pos[0]}; left:${productstaticfield4_pos[1]}; height:${productstaticfield4_pos[2]}; width:${productstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield4" style="width:${productstaticfield4_pos[4]}; text-decoration:${productstaticfield4_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->p_static_field4 }} </span> <span class="productstaticfield4" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield4_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield4_label_style[0]}; font-style:${productstaticfield4_label_style[1]}; text-decoration:${productstaticfield4_label_style[2]}; text-align:${productstaticfield4_label_style[3]}; font-size:${productstaticfield4_label_style[4]}; font-family:${productstaticfield4_label_style[5]}; position:absolute; top:${productstaticfield4_pos[0]}; left:${productstaticfield4_pos[1]}; height:${productstaticfield4_pos[2]}; width:${productstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield4" style="width:${productstaticfield4_pos[4]}; text-decoration:${productstaticfield4_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield4" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (productstaticfield5_labelposition != null && productstaticfield5_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield5_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}productstaticfield5_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield5_label_style[0]}; font-style:${productstaticfield5_label_style[1]}; text-decoration:${productstaticfield5_label_style[2]}; text-align:${productstaticfield5_label_style[3]}; font-size:${productstaticfield5_label_style[4]}; font-family:${productstaticfield5_label_style[5]}; position:absolute; top:${productstaticfield5_pos[0]}; left:${productstaticfield5_pos[1]}; height:${productstaticfield5_pos[2]}; width:${productstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield5" style="width:${productstaticfield5_pos[4]}; text-decoration:${productstaticfield5_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->p_static_field5 }} </span> <span class="productstaticfield5" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield5_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield5_label_style[0]}; font-style:${productstaticfield5_label_style[1]}; text-decoration:${productstaticfield5_label_style[2]}; text-align:${productstaticfield5_label_style[3]}; font-size:${productstaticfield5_label_style[4]}; font-family:${productstaticfield5_label_style[5]}; position:absolute; top:${productstaticfield5_pos[0]}; left:${productstaticfield5_pos[1]}; height:${productstaticfield5_pos[2]}; width:${productstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield5" style="width:${productstaticfield5_pos[4]}; text-decoration:${productstaticfield5_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield5" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (productstaticfield6_labelposition != null && productstaticfield6_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield6_label_style[6] === 'on') {
                    //     console.log(productstaticfield6_pos,productstaticfield6_labelposition,style.productnamefn,'productstaticfield6_labelposition');
                    output += (
                        `<span id="${currLabelName}productstaticfield6_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield6_label_style[0]}; font-style:${productstaticfield6_label_style[1]}; text-decoration:${productstaticfield6_label_style[2]}; text-align:${productstaticfield6_label_style[3]}; font-size:${productstaticfield6_label_style[4]}; font-family:${productstaticfield6_label_style[5]}; position:absolute; top:${productstaticfield6_pos[0]}; left:${productstaticfield6_pos[1]}; height:${productstaticfield6_pos[2]}; width:${productstaticfield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield6" style="width:${productstaticfield6_pos[4]}; text-decoration:${productstaticfield6_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->p_static_field6 }} </span> <span class="productstaticfield6" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield6_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield6_label_style[0]}; font-style:${productstaticfield6_label_style[1]}; text-decoration:${productstaticfield6_label_style[2]}; text-align:${productstaticfield6_label_style[3]}; font-size:${productstaticfield6_label_style[4]}; font-family:${productstaticfield6_label_style[5]}; position:absolute; top:${productstaticfield6_pos[0]}; left:${productstaticfield6_pos[1]}; height:${productstaticfield6_pos[2]}; width:${productstaticfield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield6" style="width:${productstaticfield6_pos[4]}; text-decoration:${productstaticfield6_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield6" style="color:#ff5454">XXXXX </span>  </span>`
                        );
                }
            }

            if (productstaticfield7_labelposition != null && productstaticfield7_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield7_label_style[6] === 'on') {
                    //     console.log(productstaticfield7_pos,productstaticfield7_labelposition,style.productnamefn,'productstaticfield7_labelposition');
                    output += (
                        `<span id="${currLabelName}productstaticfield7_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield7_label_style[0]}; font-style:${productstaticfield7_label_style[1]}; text-decoration:${productstaticfield7_label_style[2]}; text-align:${productstaticfield7_label_style[3]}; font-size:${productstaticfield7_label_style[4]}; font-family:${productstaticfield7_label_style[5]}; position:absolute; top:${productstaticfield7_pos[0]}; left:${productstaticfield7_pos[1]}; height:${productstaticfield7_pos[2]}; width:${productstaticfield7_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield7" style="width:${productstaticfield7_pos[4]}; text-decoration:${productstaticfield7_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->p_static_field7 }} </span> <span class="productstaticfield7" style="color:#ff5454"><span class="delimiter"> : </span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield7_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield7_label_style[0]}; font-style:${productstaticfield7_label_style[1]}; text-decoration:${productstaticfield7_label_style[2]}; text-align:${productstaticfield7_label_style[3]}; font-size:${productstaticfield7_label_style[4]}; font-family:${productstaticfield7_label_style[5]}; position:absolute; top:${productstaticfield7_pos[0]}; left:${productstaticfield7_pos[1]}; height:${productstaticfield7_pos[2]}; width:${productstaticfield7_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield7" style="width:${productstaticfield7_pos[4]}; text-decoration:${productstaticfield7_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield7" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (productstaticfield8_labelposition != null && productstaticfield8_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield8_label_style[6] === 'on') {
                    //     console.log(productstaticfield8_pos,productstaticfield8_labelposition,style.productnamefn,'productstaticfield8_labelposition');
                    output += (
                        `<span id="${currLabelName}productstaticfield8_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield8_label_style[0]}; font-style:${productstaticfield8_label_style[1]}; text-decoration:${productstaticfield8_label_style[2]}; text-align:${productstaticfield8_label_style[3]}; font-size:${productstaticfield8_label_style[4]}; font-family:${productstaticfield8_label_style[5]}; position:absolute; top:${productstaticfield8_pos[0]}; left:${productstaticfield8_pos[1]}; height:${productstaticfield8_pos[2]}; width:${productstaticfield8_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield8" style="width:${productstaticfield8_pos[4]}; text-decoration:${productstaticfield8_label_style[2]}; display:inline-block;white-space:nowrap;"> {{ $config_data->p_static_field8 }} </span> <span class="productstaticfield8" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield8_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield8_label_style[0]}; font-style:${productstaticfield8_label_style[1]}; text-decoration:${productstaticfield8_label_style[2]}; text-align:${productstaticfield8_label_style[3]}; font-size:${productstaticfield8_label_style[4]}; font-family:${productstaticfield8_label_style[5]}; position:absolute; top:${productstaticfield8_pos[0]}; left:${productstaticfield8_pos[1]}; height:${productstaticfield8_pos[2]}; width:${productstaticfield8_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield8" style="width:${productstaticfield8_pos[4]}; text-decoration:${productstaticfield8_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield8" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (productstaticfield9_labelposition != null && productstaticfield9_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield9_label_style[6] === 'on') {
                    //     console.log(productstaticfield9_pos,productstaticfield9_labelposition,style.productnamefn,'productstaticfield9_labelposition');
                    output += (
                        `<span id="${currLabelName}productstaticfield9_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield9_label_style[0]}; font-style:${productstaticfield9_label_style[1]}; text-decoration:${productstaticfield9_label_style[2]}; text-align:${productstaticfield9_label_style[3]}; font-size:${productstaticfield9_label_style[4]}; font-family:${productstaticfield9_label_style[5]}; position:absolute; top:${productstaticfield9_pos[0]}; left:${productstaticfield9_pos[1]}; height:${productstaticfield9_pos[2]}; width:${productstaticfield9_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield9" style="width:${productstaticfield9_pos[4]}; text-decoration:${productstaticfield9_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->p_static_field9 }} </span> <span class="productstaticfield9" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield9_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield9_label_style[0]}; font-style:${productstaticfield9_label_style[1]}; text-decoration:${productstaticfield9_label_style[2]}; text-align:${productstaticfield9_label_style[3]}; font-size:${productstaticfield9_label_style[4]}; font-family:${productstaticfield9_label_style[5]}; position:absolute; top:${productstaticfield9_pos[0]}; left:${productstaticfield9_pos[1]}; height:${productstaticfield9_pos[2]}; width:${productstaticfield9_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield9" style="width:${productstaticfield9_pos[4]}; text-decoration:${productstaticfield9_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield9" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (productstaticfield10_labelposition != null && productstaticfield10_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (productstaticfield10_label_style[6] === 'on') {
                    //     console.log(productstaticfield10_pos,productstaticfield10_labelposition,style.productnamefn,'productstaticfield10_labelposition');
                    output += (
                        `<span id="${currLabelName}productstaticfield10_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield10_label_style[0]}; font-style:${productstaticfield10_label_style[1]}; text-decoration:${productstaticfield10_label_style[2]}; text-align:${productstaticfield10_label_style[3]}; font-size:${productstaticfield10_label_style[4]}; font-family:${productstaticfield10_label_style[5]}; position:absolute; top:${productstaticfield10_pos[0]}; left:${productstaticfield10_pos[1]}; height:${productstaticfield10_pos[2]}; width:${productstaticfield10_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield10" style="width:${productstaticfield10_pos[4]}; text-decoration:${productstaticfield10_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->p_static_field10 }} </span> <span class="productstaticfield10" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}productstaticfield10_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield10_label_style[0]}; font-style:${productstaticfield10_label_style[1]}; text-decoration:${productstaticfield10_label_style[2]}; text-align:${productstaticfield10_label_style[3]}; font-size:${productstaticfield10_label_style[4]}; font-family:${productstaticfield10_label_style[5]}; position:absolute; top:${productstaticfield10_pos[0]}; left:${productstaticfield10_pos[1]}; height:${productstaticfield10_pos[2]}; width:${productstaticfield10_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}productstaticfield10" style="width:${productstaticfield10_pos[4]}; text-decoration:${productstaticfield10_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="productstaticfield10" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }
            if (serialno_labelposition != null && serialno_labelposition != '0px_0px_0px_0px_0px') {
                if (serialno_label_style[6] === 'on') {
                    //     console.log(batchstaticfield1_pos,batchstaticfield1_labelposition,style.productnamefn,'batchstaticfield1_labelposition');
                    output += (
                        `<span id="${currLabelName}serialno_label" class="textnonstore ui-state-default"  style='font-weight:${serialno_label_style[0]}; font-style:${serialno_label_style[1]}; text-decoration:${serialno_label_style[2]}; text-align:${serialno_label_style[3]}; font-size:${serialno_label_style[4]}; font-family:${serialno_label_style[5]}; position:absolute; top:${serialno_pos[0]}; left:${serialno_pos[1]}; height:${serialno_pos[2]}; width:${serialno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}serialno" style="width:${serialno_pos[4]}; text-decoration:${serialno_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->serialno }} </span> <span class="batchno" style="color:#ff5454"><span class="delimiter"> :  </span>  XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}serialno_label" class="textnonstore ui-state-default"  style='font-weight:${serialno_label_style[0]}; font-style:${serialno_label_style[1]}; text-decoration:${serialno_label_style[2]}; text-align:${serialno_label_style[3]}; font-size:${serialno_label_style[4]}; font-family:${serialno_label_style[5]}; position:absolute; top:${serialno_pos[0]}; left:${serialno_pos[1]}; height:${serialno_pos[2]}; width:${serialno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}serialno" style="width:${serialno_pos[4]}; text-decoration:${serialno_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="serialno" style="color:#ff5454">XXXXX </span>  </span>`
                        );
                }
            }


            if (batchno_labelposition != null && batchno_labelposition != '0px_0px_0px_0px_0px') {
                if (batchno_label_style[6] === 'on') {
                    //     console.log(batchstaticfield1_pos,batchstaticfield1_labelposition,style.productnamefn,'batchstaticfield1_labelposition');
                    output += (
                        `<span id="${currLabelName}batchno_label" class="textnonstore ui-state-default"  style='font-weight:${batchno_label_style[0]}; font-style:${batchno_label_style[1]}; text-decoration:${batchno_label_style[2]}; text-align:${batchno_label_style[3]}; font-size:${batchno_label_style[4]}; font-family:${batchno_label_style[5]}; position:absolute; top:${batchno_pos[0]}; left:${batchno_pos[1]}; height:${batchno_pos[2]}; width:${batchno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchno" style="width:${batchno_pos[4]}; text-decoration:${batchno_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->batch_number }} </span> <span class="batchno" style="color:#ff5454"><span class="delimiter"> :  </span>  XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}batchno_label" class="textnonstore ui-state-default"  style='font-weight:${batchno_label_style[0]}; font-style:${batchno_label_style[1]}; text-decoration:${batchno_label_style[2]}; text-align:${batchno_label_style[3]}; font-size:${batchno_label_style[4]}; font-family:${batchno_label_style[5]}; position:absolute; top:${batchno_pos[0]}; left:${batchno_pos[1]}; height:${batchno_pos[2]}; width:${batchno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchno" style="width:${batchno_pos[4]}; text-decoration:${batchno_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="batchno" style="color:#ff5454">XXXXX </span>  </span>`
                        );
                }
            }

            if (dateofmanufacture_labelposition != null && dateofmanufacture_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (dateofmanufacture_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}dateofmanufacture_label" class="textnonstore ui-state-default"  style='font-weight:${dateofmanufacture_label_style[0]}; font-style:${dateofmanufacture_label_style[1]}; text-decoration:${dateofmanufacture_label_style[2]}; text-align:${dateofmanufacture_label_style[3]}; font-size:${dateofmanufacture_label_style[4]}; font-family:${dateofmanufacture_label_style[5]}; position:absolute; top:${dateofmanufacture_pos[0]}; left:${dateofmanufacture_pos[1]}; height:${dateofmanufacture_pos[2]}; width:${dateofmanufacture_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dateofmanufacture" style="width:${dateofmanufacture_pos[4]}; text-decoration:${dateofmanufacture_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->date_of_manufacturing }} </span> <span class="dateofmanufacture" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}dateofmanufacture_label" class="textnonstore ui-state-default"  style='font-weight:${dateofmanufacture_label_style[0]}; font-style:${dateofmanufacture_label_style[1]}; text-decoration:${dateofmanufacture_label_style[2]}; text-align:${dateofmanufacture_label_style[3]}; font-size:${dateofmanufacture_label_style[4]}; font-family:${dateofmanufacture_label_style[5]}; position:absolute; top:${dateofmanufacture_pos[0]}; left:${dateofmanufacture_pos[1]}; height:${dateofmanufacture_pos[2]}; width:${dateofmanufacture_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dateofmanufacture" style="width:${dateofmanufacture_pos[4]}; text-decoration:${dateofmanufacture_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="dateofmanufacture" style="color:#ff5454">XXXXX </span>  </span>`
                        );
                }
            }

            if (dateofexp_labelposition != null && dateofexp_labelposition != '0px_0px_0px_0px_0px') {
                if (dateofexp_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}dateofexp_label" class="textnonstore ui-state-default"  style='font-weight:${dateofexp_label_style[0]}; font-style:${dateofexp_label_style[1]}; text-decoration:${dateofexp_label_style[2]}; text-align:${dateofexp_label_style[3]}; font-size:${dateofexp_label_style[4]}; font-family:${dateofexp_label_style[5]}; position:absolute; top:${dateofexp_pos[0]}; left:${dateofexp_pos[1]}; height:${dateofexp_pos[2]}; width:${dateofexp_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dateofexp" style="width:${dateofexp_pos[4]}; text-decoration:${dateofexp_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->date_of_expiry }} </span> <span class="dateofexp" style="color:#ff5454"><span class="delimiter"> :  </span>  XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}dateofexp_label" class="textnonstore ui-state-default"  style='font-weight:${dateofexp_label_style[0]}; font-style:${dateofexp_label_style[1]}; text-decoration:${dateofexp_label_style[2]}; text-align:${dateofexp_label_style[3]}; font-size:${dateofexp_label_style[4]}; font-family:${dateofexp_label_style[5]}; position:absolute; top:${dateofexp_pos[0]}; left:${dateofexp_pos[1]}; height:${dateofexp_pos[2]}; width:${dateofexp_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dateofexp" style="width:${dateofexp_pos[4]}; text-decoration:${dateofexp_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="dateofexp" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (dateofretest_labelposition != null && dateofretest_labelposition != '0px_0px_0px_0px_0px') {
                if (dateofretest_label_style[6] === 'on') {
                    //     console.log(batchstaticfield4_pos,batchstaticfield4_labelposition,style.productnamefn,'batchstaticfield4_labelposition');
                    output += (
                        `<span id="${currLabelName}dateofretest_label" class="textnonstore ui-state-default"  style='font-weight:${dateofretest_label_style[0]}; font-style:${dateofretest_label_style[1]}; text-decoration:${dateofretest_label_style[2]}; text-align:${dateofretest_label_style[3]}; font-size:${dateofretest_label_style[4]}; font-family:${dateofretest_label_style[5]}; position:absolute; top:${dateofretest_pos[0]}; left:${dateofretest_pos[1]}; height:${dateofretest_pos[2]}; width:${dateofretest_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dateofretest" style="width:${dateofretest_pos[4]}; text-decoration:${dateofretest_label_style[2]}; display:inline-block;white-space:nowrap;"> {{ $config_data->date_of_retest }} </span> <span class="dateofretest" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}dateofretest_label" class="textnonstore ui-state-default"  style='font-weight:${dateofretest_label_style[0]}; font-style:${dateofretest_label_style[1]}; text-decoration:${dateofretest_label_style[2]}; text-align:${dateofretest_label_style[3]}; font-size:${dateofretest_label_style[4]}; font-family:${dateofretest_label_style[5]}; position:absolute; top:${dateofretest_pos[0]}; left:${dateofretest_pos[1]}; height:${dateofretest_pos[2]}; width:${dateofretest_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dateofretest" style="width:${dateofretest_pos[4]}; text-decoration:${dateofretest_label_style[2]}; display:inline-block;white-space:nowrap;"></span> <span class="dateofretest" style="color:#ff5454">  XXXXX </span>  </span>`
                        );
                }
            }

            if (batchstaticfield1_labelposition != null && batchstaticfield1_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (batchstaticfield1_label_style[6] === 'on') {
                    //     console.log(batchstaticfield5_pos,batchstaticfield5_labelposition,style.productnamefn,'batchstaticfield5_labelposition');
                    output += (
                        `<span id="${currLabelName}batchstaticfield1_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield1_label_style[0]}; font-style:${batchstaticfield1_label_style[1]}; text-decoration:${batchstaticfield1_label_style[2]}; text-align:${batchstaticfield1_label_style[3]}; font-size:${batchstaticfield1_label_style[4]}; font-family:${batchstaticfield1_label_style[5]}; position:absolute; top:${batchstaticfield1_pos[0]}; left:${batchstaticfield1_pos[1]}; height:${batchstaticfield1_pos[2]}; width:${batchstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield1" style="width:${batchstaticfield1_pos[4]}; text-decoration:${batchstaticfield1_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->b_static_field1 }} </span> <span class="batchstaticfield1" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}batchstaticfield1_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield1_label_style[0]}; font-style:${batchstaticfield1_label_style[1]}; text-decoration:${batchstaticfield1_label_style[2]}; text-align:${batchstaticfield1_label_style[3]}; font-size:${batchstaticfield1_label_style[4]}; font-family:${batchstaticfield1_label_style[5]}; position:absolute; top:${batchstaticfield1_pos[0]}; left:${batchstaticfield1_pos[1]}; height:${batchstaticfield1_pos[2]}; width:${batchstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield1" style="width:${batchstaticfield1_pos[4]}; text-decoration:${batchstaticfield1_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="batchstaticfield1" style="color:#ff5454">XXXXX </span>  </span>`
                        );
                }
            }

            if (batchstaticfield2_labelposition != null && batchstaticfield2_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (batchstaticfield2_label_style[6] === 'on') {
                    //     console.log(dynamicfield1_pos,dynamicfield1_labelposition,style.productnamefn,'dynamicfield1_labelposition');
                    output += (
                        `<span id="${currLabelName}batchstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield2_label_style[0]}; font-style:${batchstaticfield2_label_style[1]}; text-decoration:${batchstaticfield2_label_style[2]}; text-align:${batchstaticfield2_label_style[3]}; font-size:${batchstaticfield2_label_style[4]}; font-family:${batchstaticfield2_label_style[5]}; position:absolute; top:${batchstaticfield2_pos[0]}; left:${batchstaticfield2_pos[1]}; height:${batchstaticfield2_pos[2]}; width:${batchstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield2" style="width:${batchstaticfield2_pos[4]}; text-decoration:${batchstaticfield2_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->b_static_field2 }} </span> <span class="batchstaticfield2" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}batchstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield2_label_style[0]}; font-style:${batchstaticfield2_label_style[1]}; text-decoration:${batchstaticfield2_label_style[2]}; text-align:${batchstaticfield2_label_style[3]}; font-size:${batchstaticfield2_label_style[4]}; font-family:${batchstaticfield2_label_style[5]}; position:absolute; top:${batchstaticfield2_pos[0]}; left:${batchstaticfield2_pos[1]}; height:${batchstaticfield2_pos[2]}; width:${batchstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield2" style="width:${batchstaticfield2_pos[4]}; text-decoration:${batchstaticfield2_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="batchstaticfield2" style="color:#ff5454">  XXXXX </span>  </span>`
                        );
                }
            }

            if (batchstaticfield3_labelposition != null && batchstaticfield3_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (batchstaticfield3_label_style[6] === 'on') {
                    //     console.log(dynamicfield2_pos,dynamicfield2_labelposition,style.productnamefn,'dynamicfield2_labelposition');
                    output += (
                        `<span id="${currLabelName}batchstaticfield3_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield3_label_style[0]}; font-style:${batchstaticfield3_label_style[1]}; text-decoration:${batchstaticfield3_label_style[2]}; text-align:${batchstaticfield3_label_style[3]}; font-size:${batchstaticfield3_label_style[4]}; font-family:${batchstaticfield3_label_style[5]}; position:absolute; top:${batchstaticfield3_pos[0]}; left:${batchstaticfield3_pos[1]}; height:${batchstaticfield3_pos[2]}; width:${batchstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield3" style="width:${batchstaticfield3_pos[4]}; text-decoration:${batchstaticfield3_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->b_static_field3 }} </span> <span class="batchstaticfield3" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}batchstaticfield3_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield3_label_style[0]}; font-style:${batchstaticfield3_label_style[1]}; text-decoration:${batchstaticfield3_label_style[2]}; text-align:${batchstaticfield3_label_style[3]}; font-size:${batchstaticfield3_label_style[4]}; font-family:${batchstaticfield3_label_style[5]}; position:absolute; top:${batchstaticfield3_pos[0]}; left:${batchstaticfield3_pos[1]}; height:${batchstaticfield3_pos[2]}; width:${batchstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield3" style="width:${batchstaticfield3_pos[4]}; text-decoration:${batchstaticfield3_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="batchstaticfield3" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (batchstaticfield4_labelposition != null && batchstaticfield4_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (batchstaticfield4_label_style[6] === 'on') {
                    //     console.log(globalstaticfield1_pos,globalstaticfield1_labelposition,style.productnamefn,'globalstaticfield1_labelposition');
                    output += (
                        `<span id="${currLabelName}batchstaticfield4_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield4_label_style[0]}; font-style:${batchstaticfield4_label_style[1]}; text-decoration:${batchstaticfield4_label_style[2]}; text-align:${batchstaticfield4_label_style[3]}; font-size:${batchstaticfield4_label_style[4]}; font-family:${batchstaticfield4_label_style[5]}; position:absolute; top:${batchstaticfield4_pos[0]}; left:${batchstaticfield4_pos[1]}; height:${batchstaticfield4_pos[2]}; width:${batchstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield4" style="width:${batchstaticfield4_pos[4]}; text-decoration:${batchstaticfield4_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->b_static_field4 }} </span> <span class="batchstaticfield4" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}batchstaticfield4_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield4_label_style[0]}; font-style:${batchstaticfield4_label_style[1]}; text-decoration:${batchstaticfield4_label_style[2]}; text-align:${batchstaticfield4_label_style[3]}; font-size:${batchstaticfield4_label_style[4]}; font-family:${batchstaticfield4_label_style[5]}; position:absolute; top:${batchstaticfield4_pos[0]}; left:${batchstaticfield4_pos[1]}; height:${batchstaticfield4_pos[2]}; width:${batchstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield4" style="width:${batchstaticfield4_pos[4]}; text-decoration:${batchstaticfield4_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="batchstaticfield4" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (batchstaticfield5_labelposition != null && batchstaticfield5_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (batchstaticfield5_label_style[6] === 'on') {
                    //     console.log(globalstaticfield2_pos,globalstaticfield2_labelposition,style.productnamefn,'globalstaticfield2_labelposition');
                    output += (
                        `<span id="${currLabelName}batchstaticfield5_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield5_label_style[0]}; font-style:${batchstaticfield5_label_style[1]}; text-decoration:${batchstaticfield5_label_style[2]}; text-align:${batchstaticfield5_label_style[3]}; font-size:${batchstaticfield5_label_style[4]}; font-family:${batchstaticfield5_label_style[5]}; position:absolute; top:${batchstaticfield5_pos[0]}; left:${batchstaticfield5_pos[1]}; height:${batchstaticfield5_pos[2]}; width:${batchstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield5" style="width:${batchstaticfield5_pos[4]}; text-decoration:${batchstaticfield5_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->b_static_field5 }} </span> <span class="batchstaticfield5" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}batchstaticfield5_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield5_label_style[0]}; font-style:${batchstaticfield5_label_style[1]}; text-decoration:${batchstaticfield5_label_style[2]}; text-align:${batchstaticfield5_label_style[3]}; font-size:${batchstaticfield5_label_style[4]}; font-family:${batchstaticfield5_label_style[5]}; position:absolute; top:${batchstaticfield5_pos[0]}; left:${batchstaticfield5_pos[1]}; height:${batchstaticfield5_pos[2]}; width:${batchstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}batchstaticfield5" style="width:${batchstaticfield5_pos[4]}; text-decoration:${batchstaticfield5_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="batchstaticfield5" style="color:#ff5454">XXXXX </span>  </span>`
                        );
                }
            }

            if (netweight_labelposition != null && netweight_labelposition != '0px_0px_0px_0px_0px') {
                if (netweight_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}netweight_label" class="textnonstore ui-state-default" style='font-weight:${netweight_label_style[0]}; font-style: ${netweight_label_style[1]}; text-decoration: ${netweight_label_style[2]}; text-align: ${netweight_label_style[3]}; font-size:${netweight_label_style[4]}; font-family:${netweight_label_style[5]}; position:absolute; top: ${netweight_pos[0]}; left:${netweight_pos[1]}; height:${netweight_pos[2]}; width:${netweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}netweight" style="width: ${netweight_pos[4]}; text-decoration: ${netweight_label_style[2]}; white-space: nowrap; display:inline-block">{{ $config_data->net_weight }}</span> <span class="decimalnetwt" style="color:#ff5454"> <span class="delimiter"> :</span> XXX  </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}netweight_label" class="textnonstore ui-state-default" style='font-weight:${netweight_label_style[0]}; font-style: ${netweight_label_style[1]}; text-decoration: ${netweight_label_style[2]}; text-align: ${netweight_label_style[3]}; font-size:${netweight_label_style[4]}; font-family:${netweight_label_style[5]}; position:absolute; top: ${netweight_pos[0]}; left:${netweight_pos[1]}; height:${netweight_pos[2]}; width:${netweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}netweight" style="width: ${netweight_pos[4]}; text-decoration: ${netweight_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="decimalnetwt" style="color:#ff5454">XXX  </span></span>`
                        );
                }
            }

            if (grossweight_labelposition != null && grossweight_labelposition != '0px_0px_0px_0px_0px') {
                if (grossweight_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}grossweight_label" class="textnonstore ui-state-default  " style='font-weight:${grossweight_label_style[0]}; font-style: ${grossweight_label_style[1]}; text-decoration: ${grossweight_label_style[2]}; text-align: ${grossweight_label_style[3]}; font-size:${grossweight_label_style[4]}; font-family:${grossweight_label_style[5]};position:absolute; top:${grossweight_pos[0]}; left:${grossweight_pos[1]}; height:${grossweight_pos[2]}; width: ${grossweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}grossweight" style="width: ${grossweight_pos[4]}; text-decoration: ${grossweight_label_style[2]}; white-space: nowrap; display:inline-block">{{ $config_data->gross_weight }}</span><span class="decimalgrosswt" style="color:#ff5454"> <span class="delimiter"> :</span> XXX </span> </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}grossweight_label" class="textnonstore ui-state-default  " style='font-weight:${grossweight_label_style[0]}; font-style: ${grossweight_label_style[1]}; text-decoration: ${grossweight_label_style[2]}; text-align: ${grossweight_label_style[3]}; font-size:${grossweight_label_style[4]}; font-family:${grossweight_label_style[5]};position:absolute; top:${grossweight_pos[0]}; left:${grossweight_pos[1]}; height:${grossweight_pos[2]}; width: ${grossweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}grossweight" style="width: ${grossweight_pos[4]}; text-decoration: ${grossweight_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="decimalgrosswt" style="color:#ff5454"> XXX </span> </span>`
                        );
                }
            }

            if (tareweight_labelposition != null && tareweight_labelposition != '0px_0px_0px_0px_0px') {
                if (tareweight_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}tareweight_label" class="textnonstore ui-state-default" style='font-weight:${tareweight_label_style[0]}; font-style:${tareweight_label_style[1]}; text-decoration: ${tareweight_label_style[2]}; text-align: ${tareweight_label_style[3]}; font-size: ${tareweight_label_style[4]}; font-family:${tareweight_label_style[5]};position:absolute; top:${tareweight_pos[0]}; left:${tareweight_pos[1]}; height:${tareweight_pos[2]}; width: ${tareweight_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}tareweight" style="width: ${tareweight_pos[4]}; text-decoration: ${tareweight_label_style[2]}; white-space: nowrap; display:inline-block">{{ $config_data->tare_weight }}</span> <span class="decimaltarewt" style="color:#ff5454"> <span class="delimiter"> :</span> XXX </span> </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}tareweight_label" class="textnonstore ui-state-default" style='font-weight:${tareweight_label_style[0]}; font-style:${tareweight_label_style[1]}; text-decoration: ${tareweight_label_style[2]}; text-align: ${tareweight_label_style[3]}; font-size: ${tareweight_label_style[4]}; font-family:${tareweight_label_style[5]};position:absolute; top:${tareweight_pos[0]}; left:${tareweight_pos[1]}; height:${tareweight_pos[2]}; width: ${tareweight_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}tareweight" style="width: ${tareweight_pos[4]}; text-decoration: ${tareweight_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="decimaltarewt" style="color:#ff5454">XXX </span> </span>`
                        );
                }
            }

            if (containerno_labelposition != null && containerno_labelposition != '0px_0px_0px_0px_0px') {
                if (containerno_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}containerno_label" class="textnonstore ui-state-default" style='font-weight:${containerno_label_style[0]}; font-style:${containerno_label_style[1]}; text-decoration:${containerno_label_style[2]}; text-align:${containerno_label_style[3]}; font-size: ${containerno_label_style[4]}; font-family:${containerno_label_style[5]}; position:absolute; top:${containerno_pos[0]}; left:${containerno_pos[1]}; height:${containerno_pos[2]}; width:${containerno_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}containerno" style="width: ${containerno_pos[4]}; text-decoration:${containerno_label_style[2]}; white-space: nowrap; display:inline-block"> {{ $config_data->container_no }}</span><span class="containerno" style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}containerno_label" class="textnonstore ui-state-default" style='font-weight:${containerno_label_style[0]}; font-style:${containerno_label_style[1]}; text-decoration:${containerno_label_style[2]}; text-align:${containerno_label_style[3]}; font-size: ${containerno_label_style[4]}; font-family:${containerno_label_style[5]}; position:absolute; top:${containerno_pos[0]}; left:${containerno_pos[1]}; height:${containerno_pos[2]}; width:${containerno_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}containerno" style="width: ${containerno_pos[4]}; text-decoration:${containerno_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="containerno" style="color:#ff5454">XXXXX </span></span>`
                        );
                }
            }

            if (dynamicfield1_labelposition != null && dynamicfield1_labelposition != '0px_0px_0px_0px_0px') {
                if (dynamicfield1_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}dynamicfield1_label" class="textnonstore ui-state-default" style='font-weight:${dynamicfield1_label_style[0]}; font-style:${dynamicfield1_label_style[1]}; text-decoration:${dynamicfield1_label_style[2]}; text-align:${dynamicfield1_label_style[3]}; font-size: ${dynamicfield1_label_style[4]}; font-family:${dynamicfield1_label_style[5]}; position:absolute; top:${dynamicfield1_pos[0]}; left:${dynamicfield1_pos[1]}; height:${dynamicfield1_pos[2]}; width:${dynamicfield1_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield1" style="width: ${dynamicfield1_pos[4]}; text-decoration:${dynamicfield1_label_style[2]}; white-space: nowrap; display:inline-block"> {{ $config_data->dynamic_field1 }}</span><span class="dynamicfield1" style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}dynamicfield1_label" class="textnonstore ui-state-default" style='font-weight:${dynamicfield1_label_style[0]}; font-style:${dynamicfield1_label_style[1]}; text-decoration:${dynamicfield1_label_style[2]}; text-align:${dynamicfield1_label_style[3]}; font-size: ${dynamicfield1_label_style[4]}; font-family:${dynamicfield1_label_style[5]}; position:absolute; top:${dynamicfield1_pos[0]}; left:${dynamicfield1_pos[1]}; height:${dynamicfield1_pos[2]}; width:${dynamicfield1_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield1" style="width: ${dynamicfield1_pos[4]}; text-decoration:${dynamicfield1_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="dynamicfield1" style="color:#ff5454">XXXXX </span></span>`
                        );
                }
            }

            if (dynamicfield2_labelposition != null && dynamicfield2_labelposition != '0px_0px_0px_0px_0px') {
                if (dynamicfield2_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}dynamicfield2_label" class="textnonstore ui-state-default"  style='font-weight:${dynamicfield2_label_style[0]}; font-style:${dynamicfield2_label_style[1]}; text-decoration:${dynamicfield2_label_style[2]}; text-align:${dynamicfield2_label_style[3]}; font-size:${dynamicfield2_label_style[4]}; font-family:${dynamicfield2_label_style[5]}; position:absolute; top:${dynamicfield2_pos[0]}; left: ${dynamicfield2_pos[1]}; height:${dynamicfield2_pos[2]}; width:${dynamicfield2_pos[3]};'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield2" style="width: ${dynamicfield2_pos[4]}; text-decoration:${dynamicfield2_label_style[2]}; white-space: nowrap; display:inline-block">{{ $config_data->dynamic_field2 }}</span><span class="dynamicfield2" style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span> </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}dynamicfield2_label" class="textnonstore ui-state-default"  style='font-weight:${dynamicfield2_label_style[0]}; font-style:${dynamicfield2_label_style[1]}; text-decoration:${dynamicfield2_label_style[2]}; text-align:${dynamicfield2_label_style[3]}; font-size:${dynamicfield2_label_style[4]}; font-family:${dynamicfield2_label_style[5]}; position:absolute; top:${dynamicfield2_pos[0]}; left: ${dynamicfield2_pos[1]}; height:${dynamicfield2_pos[2]}; width:${dynamicfield2_pos[3]};'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield2" style="width: ${dynamicfield2_pos[4]}; text-decoration:${dynamicfield2_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="dynamicfield2" style="color:#ff5454">XXXXX </span> </span>`
                        );
                }
            }

            if (globalstaticfield1_labelposition != null && globalstaticfield1_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (globalstaticfield1_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}globalstaticfield1_label" class="textnonstore ui-state-default" style='font-weight:${globalstaticfield1_label_style[0]}; font-style:${globalstaticfield1_label_style[1]}; text-decoration:${globalstaticfield1_label_style[2]}; text-align:${globalstaticfield1_label_style[3]}; font-size:${globalstaticfield1_label_style[4]}; font-family:${globalstaticfield1_label_style[5]}; position:absolute; top:${globalstaticfield1_pos[0]}; left:${globalstaticfield1_pos[1]}; height:${globalstaticfield1_pos[2]}; width:${globalstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield1" style="width: ${globalstaticfield1_pos[4]}; text-decoration:${globalstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block">{{ $config_data->global_static_field1 }}</span><span class="globalstaticfield1" style="color:#ff5454"><span class="delimiter"> :</span> {{ $config_data->global_fieldname1 }} </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}globalstaticfield1_label" class="textnonstore ui-state-default" style='font-weight:${globalstaticfield1_label_style[0]}; font-style:${globalstaticfield1_label_style[1]}; text-decoration:${globalstaticfield1_label_style[2]}; text-align:${globalstaticfield1_label_style[3]}; font-size:${globalstaticfield1_label_style[4]}; font-family:${globalstaticfield1_label_style[5]}; position:absolute; top:${globalstaticfield1_pos[0]}; left:${globalstaticfield1_pos[1]}; height:${globalstaticfield1_pos[2]}; width:${globalstaticfield1_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield1" style="width: ${globalstaticfield1_pos[4]}; text-decoration:${globalstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="globalstaticfield1" style="color:#ff5454">{{ $config_data->global_fieldname1 }} </span></span>`
                        );
                }
            }

            if (globalstaticfield2_labelposition != null && globalstaticfield2_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (globalstaticfield2_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}globalstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${globalstaticfield2_label_style[0]}; font-style:${globalstaticfield2_label_style[1]}; text-decoration:${globalstaticfield2_label_style[2]}; text-align:${globalstaticfield2_label_style[3]}; font-size:${globalstaticfield2_label_style[4]}; font-family:${globalstaticfield2_label_style[5]}; position:absolute; top:${globalstaticfield2_pos[0]}; left:${globalstaticfield2_pos[1]}; height:${globalstaticfield2_pos[2]}; width:${globalstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield2" style="width:${globalstaticfield2_pos[4]}; text-decoration:${globalstaticfield2_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->global_static_field2 }}</span><span class="globalstaticfield2" style="color:#ff5454"><span class="delimiter"> :</span> {{ $config_data->global_fieldname2 }}</span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}globalstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${globalstaticfield2_label_style[0]}; font-style:${globalstaticfield2_label_style[1]}; text-decoration:${globalstaticfield2_label_style[2]}; text-align:${globalstaticfield2_label_style[3]}; font-size:${globalstaticfield2_label_style[4]}; font-family:${globalstaticfield2_label_style[5]}; position:absolute; top:${globalstaticfield2_pos[0]}; left:${globalstaticfield2_pos[1]}; height:${globalstaticfield2_pos[2]}; width:${globalstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield2" style="width:${globalstaticfield2_pos[4]}; text-decoration:${globalstaticfield2_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="globalstaticfield2" style="color:#ff5454"> </span> {{ $config_data->global_fieldname2 }}   </span>`
                        );
                }
            }

            if (labelstaticfield1_labelposition != null && labelstaticfield1_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (labelstaticfield1_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}labelstaticfield1_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield1_label_style[0]}; font-style:${labelstaticfield1_label_style[1]}; text-decoration:${labelstaticfield1_label_style[2]}; text-align:${labelstaticfield1_label_style[3]}; font-size:${labelstaticfield1_label_style[4]}; font-family:${labelstaticfield1_label_style[5]}; white-space: nowrap; position:absolute; top:${labelstaticfield1_pos[0]}; left:${labelstaticfield1_pos[1]}; height:${labelstaticfield1_pos[2]}; width:${labelstaticfield1_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}labelstaticfield1" style="width:${labelstaticfield1_pos[4]}; text-decoration:${labelstaticfield1_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->label_static_field1 }} </span><span class="labelstaticfield1" style="white-space: pre-line;" ><span class="delimiter"> :</span> ${labelstaticfield1}  </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}labelstaticfield1_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield1_label_style[0]}; font-style:${labelstaticfield1_label_style[1]}; text-decoration:${labelstaticfield1_label_style[2]}; text-align:${labelstaticfield1_label_style[3]}; font-size:${labelstaticfield1_label_style[4]}; font-family:${labelstaticfield1_label_style[5]}; white-space: nowrap; position:absolute; top:${labelstaticfield1_pos[0]}; left:${labelstaticfield1_pos[1]}; height:${labelstaticfield1_pos[2]}; width:${labelstaticfield1_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}labelstaticfield1" style="width:${labelstaticfield1_pos[4]}; text-decoration:${labelstaticfield1_label_style[2]}; display:inline-block; white-space:nowrap;"></span><span class="labelstaticfield1" style="white-space: pre-line;"> ${labelstaticfield1} </span></span>`
                        );
                }
            }

            if (labelstaticfield2_labelposition != null && labelstaticfield2_labelposition !=
                '0px_0px_0px_0px_0px') {
                if (labelstaticfield2_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}labelstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield2_label_style[0]}; font-style:${labelstaticfield2_label_style[1]}; text-decoration:${labelstaticfield2_label_style[2]}; text-align:${labelstaticfield2_label_style[3]}; font-size:${labelstaticfield2_label_style[4]}; font-family:${labelstaticfield2_label_style[5]}; white-space: nowrap; position:absolute; top:${labelstaticfield2_pos[0]}; left:${labelstaticfield1_pos[1]}; height:${labelstaticfield2_pos[2]}; width:${labelstaticfield2_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}labelstaticfield2" style="width:${labelstaticfield2_pos[4]}; text-decoration:${labelstaticfield2_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->label_static_field2 }} </span><span class="labelstaticfield2" style="white-space: pre-line;"><span class="delimiter"> :</span> ${labelstaticfield2} </span></span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}labelstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield2_label_style[0]}; font-style:${labelstaticfield2_label_style[1]}; text-decoration:${labelstaticfield2_label_style[2]}; text-align:${labelstaticfield2_label_style[3]}; font-size:${labelstaticfield2_label_style[4]}; font-family:${labelstaticfield2_label_style[5]}; white-space: nowrap; position:absolute; top:${labelstaticfield2_pos[0]}; left:${labelstaticfield1_pos[1]}; height:${labelstaticfield2_pos[2]}; width:${labelstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}labelstaticfield2" style="width:${labelstaticfield2_pos[4]}; text-decoration:${labelstaticfield2_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="labelstaticfield2" style="white-space: pre-line;"> </span> ${labelstaticfield2} </span>`
                        );
                }
            }

            if (Freefield1_labelposition != null && Freefield1_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield1_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield1_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield1" style="text-decoration:${Freefield1_label_style[2]};"> ${Freefield1_label_value}</span><span class="Freefield1" style="color:#ff5454"><span class="delimiter">:</span> XXXXX </span> </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield1_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield1" style="text-decoration:${Freefield1_label_style[2]};"></span> <span class="Freefield1" style="color:#ff5454"> XXXXX </span> </span>`
                        );
                }
            }

            if (Freefield2_labelposition != null && Freefield2_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield2_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="text-decoration:${Freefield2_label_style[2]};"> ${Freefield2_label_value}</span><span class="Freefield2" style="color:#ff5454"><span class="delimiter">:</span> XXXXX  </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="text-decoration:${Freefield2_label_style[2]};"></span> <span class="Freefield2" style="color:#ff5454">  XXXXX  </span>  </span>`
                        );
                }
            }

            if (Freefield3_labelposition != null && Freefield3_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield3_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="text-decoration:${Freefield3_label_style[2]};"> ${Freefield3_label_value}</span><span class="Freefield3" style="color:#ff5454"><span class="delimiter">:</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="text-decoration:${Freefield3_label_style[2]};"></span> <span class="Freefield3" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (Freefield4_labelposition != null && Freefield4_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield4_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="text-decoration:${Freefield4_label_style[2]};"> ${Freefield4_label_value}</span><span class="Freefield4" style="color:#ff5454"><span class="delimiter">:</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="text-decoration:${Freefield4_label_style[2]};"></span> <span class="Freefield4" style="color:#ff5454"> XXXXX </span>  </span>`
                        );
                }
            }

            if (Freefield5_labelposition != null && Freefield5_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield5_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield5" style="text-decoration:${Freefield5_label_style[2]};"> ${Freefield5_label_value}</span><span class="Freefield5" style="color:#ff5454"><span class="delimiter">:</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield5" style="text-decoration:${Freefield5_label_style[2]};"></span> <span class="Freefield5" style="color:#ff5454">  XXXXX </span>  </span>`
                        );
                }
            }

            if (Freefield6_labelposition != null && Freefield6_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield6_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="text-decoration:${Freefield6_label_style[2]};"> ${Freefield6_label_value}</span><span class="Freefield6" style="color:#ff5454"><span class="delimiter">:</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="text-decoration:${Freefield6_label_style[2]};"></span> <span class="Freefield6" style="color:#ff5454">  XXXXX </span>  </span>`
                        );
                }
            }

            if (Freefield7_labelposition != null && Freefield7_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield7_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield7_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield7_label_style[0]}; font-style:${Freefield7_label_style[1]}; text-decoration:${Freefield7_label_style[2]}; text-align:${Freefield7_label_style[3]}; font-size:${Freefield7_label_style[4]}; font-family:${Freefield7_label_style[5]}; position:absolute; top:${Freefield7_pos[0]}; left:${Freefield7_pos[1]}; height:${Freefield7_pos[2]}; width:${Freefield7_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield7" style="text-decoration:${Freefield7_label_style[2]};"> ${Freefield7_label_value}</span><span class="Freefield7" style="color:#ff5454"><span class="delimiter">:</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield7_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield7_label_style[0]}; font-style:${Freefield7_label_style[1]}; text-decoration:${Freefield7_label_style[2]}; text-align:${Freefield7_label_style[3]}; font-size:${Freefield7_label_style[4]}; font-family:${Freefield7_label_style[5]}; position:absolute; top:${Freefield7_pos[0]}; left:${Freefield7_pos[1]}; height:${Freefield7_pos[2]}; width:${Freefield7_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield7" style="text-decoration:${Freefield7_label_style[2]};"></span> <span class="Freefield7" style="color:#ff5454">  XXXXX </span>  </span>`
                        );
                }
            }
            if (Freefield8_labelposition != null && Freefield8_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield8_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield8_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield8_label_style[0]}; font-style:${Freefield8_label_style[1]}; text-decoration:${Freefield8_label_style[2]}; text-align:${Freefield8_label_style[3]}; font-size:${Freefield8_label_style[4]}; font-family:${Freefield8_label_style[5]}; position:absolute; top:${Freefield8_pos[0]}; left:${Freefield8_pos[1]}; height:${Freefield8_pos[2]}; width:${Freefield8_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield8" style="text-decoration:${Freefield8_label_style[2]};"> ${Freefield8_label_value}</span><span class="Freefield8" style="color:#ff5454"><span class="delimiter">:</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield8_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield8_label_style[0]}; font-style:${Freefield8_label_style[1]}; text-decoration:${Freefield8_label_style[2]}; text-align:${Freefield8_label_style[3]}; font-size:${Freefield8_label_style[4]}; font-family:${Freefield8_label_style[5]}; position:absolute; top:${Freefield8_pos[0]}; left:${Freefield8_pos[1]}; height:${Freefield8_pos[2]}; width:${Freefield8_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield8" style="text-decoration:${Freefield8_label_style[2]};"></span> <span class="Freefield8" style="color:#ff5454">  XXXXX </span>  </span>`
                        );
                }
            }
            if (Freefield9_labelposition != null && Freefield9_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield9_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}Freefield9_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield9_label_style[0]}; font-style:${Freefield9_label_style[1]}; text-decoration:${Freefield9_label_style[2]}; text-align:${Freefield9_label_style[3]}; font-size:${Freefield9_label_style[4]}; font-family:${Freefield9_label_style[5]}; position:absolute; top:${Freefield9_pos[0]}; left:${Freefield9_pos[1]}; height:${Freefield9_pos[2]}; width:${Freefield9_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield9" style="text-decoration:${Freefield9_label_style[2]};"> ${Freefield9_label_value}</span><span class="Freefield9" style="color:#ff5454"><span class="delimiter">:</span> XXXXX </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}Freefield9_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield9_label_style[0]}; font-style:${Freefield9_label_style[1]}; text-decoration:${Freefield9_label_style[2]}; text-align:${Freefield9_label_style[3]}; font-size:${Freefield9_label_style[4]}; font-family:${Freefield9_label_style[5]}; position:absolute; top:${Freefield9_pos[0]}; left:${Freefield9_pos[1]}; height:${Freefield9_pos[2]}; width:${Freefield9_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield9" style="text-decoration:${Freefield9_label_style[2]};"></span> <span class="Freefield9" style="color:#ff5454">  XXXXX </span>  </span>`
                        );
                }
            }

            if(globalimage1_labelposition != "0px_0px_0px_0px"){
                output += `<span id="global_image1" class="global" style="position: absolute; top: ${globalimage1_pos[0]}; left: ${globalimage1_pos[1]};"> <img src="{{ asset('storage/' . $config_data->g1_image) }}" class="global_image" id="global_image1_img" style="height: ${globalimage1_pos[2]}; width: ${globalimage1_pos[3]}"  alt="No Image"> </span>`
            }

            if(globalimage2_labelposition != "0px_0px_0px_0px"){
                output += `<span id="global_image2" class="global" style="position: absolute; top: ${globalimage2_pos[0]}; left: ${globalimage2_pos[1]};"> <img src="{{ asset('storage/' . $config_data->g2_image) }}" class="global_image" id="global_image2_img" style="height: ${globalimage2_pos[2]}; width: ${globalimage2_pos[3]}"  alt="No Image"> </span>`
            }

            if(labelimage1_labelposition != "0px_0px_0px_0px"){
                output += `<span id="label_image1" class="global" style="position: absolute; top: ${labelimage1_pos[0]}; left: ${labelimage1_pos[1]};"> <img src="{{ asset('storage/' . $shipper_print->labelimage1_path) }}" class="global_image" id="label_image1_img" style="height: ${labelimage1_pos[2]}; width: ${labelimage1_pos[3]}"  alt="No Image"> </span>`
            }

            if(labelimage2_labelposition != "0px_0px_0px_0px"){
                output += `<span id="label_image2" class="global" style="position: absolute; top: ${labelimage2_pos[0]}; left: ${labelimage2_pos[1]};"> <img src="{{ asset('storage/' . $shipper_print->labelimage2_path) }}" class="global_image" id="label_image2_img" style="height: ${labelimage2_pos[2]}; width: ${labelimage2_pos[3]}"  alt="No Image"> </span>`
            }
            if(code_type === 'QRcode'){
                var code_size = num.split("_");
                console.log(code_size,'code_size');
                output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
                    <img id="codeName" style="height:${code_size[0]}; width:${code_size[1]}" alt='QR Code Generator'
                    src='https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(text)}'/> </span>`
            }
            if(code_type == 'GS1'){
                var code_size = num.split("_");
                output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
                <img id="codeName" style="height:${code_size[0]}; width:${code_size[1]}" alt='Barcode Generator TEC-IT'
                        src='https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(text)}&code=GS1DigitalLink_DataMatrix&dataattributekey_2=&dataattributeval_2=&dataattributekey_3=&dataattributeval_3=&dataattributekey_4=&dataattributeval_4=&dataattributekey_5=&dataattributeval_5=&digitallink=&dataattributeval_1=&showhrt=no&eclevel=L&dmsize=Default'/></span>`

            }
            if(code_type == 'Barcode'){
            var code_size = num.split("_");
            output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
            <img id="codeName" style="height:${code_size[0]}; width:${code_size[1]}" alt='Barcode Generator TEC-IT'
            src='https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(text)}&code=Code128&multiplebarcodes=true&translate-esc=on&imagetype=Jpg&showhrt=no&eclevel=L'/></span>`
            }


            $('#containerdiv').append(`
                    <center>

                    <div id="${idPrefix_Labeltype}" style="box-shadow: 1px 2px 8px rgb(103 71 13); font-family:Arial;background-color:#fff !important;width:${label.label_width}mm; height:${label.label_height}mm; position:relative; ${displaynone}"  >
                    <div class="line-vertical"></div>
                    <div class="line-horizontal"></div>

                        ${output}
                        </div>

                    </center>



            <style>
            #nonstore_label td{
                padding: 0px !important;
            }
            #inner-nonstore_label td{
                padding: 0px !important;
            }
            ul{
                padding-inline-start: 10px;
                margin-block-end: 0rem;
                margin-block-start: 0rem
            }
            </style>
        `);
            // dateFormat();
            po();
            fieldnamechecked();
            //Image checkbox
            if (label.labelimage1_labelposition != '0px_0px_0px_0px') {
                $('#labelimage1').prop('checked', true);
            }if(label.labelimage2_labelposition != '0px_0px_0px_0px'){
                $('#labelimage2').prop('checked', true);
            }if(label.globalimage1_labelposition != '0px_0px_0px_0px'){
                $('#globalimage1').prop('checked', true);
            }if(label.globalimage2_labelposition != '0px_0px_0px_0px'){
                $('#globalimage2').prop('checked', true);
            }



        $(".line-vertical, .line-horizontal").hide();

        //QR CODE VIEW
        $(`#qrorganizationname,#qrorganizationnamefn,#qrproductname,#qrproductnamefn,#qrproductid,#qrproductidfn,#qrproductcomments,#qrproductcommentsfn,#qrproductstaticfield1,#qrproductstaticfield1fn,
          #qrproductstaticfield2,#qrproductstaticfield2fn,#qrproductstaticfield3,#qrproductstaticfield3fn,#qrproductstaticfield4,#qrproductstaticfield4fn,#qrproductstaticfield5,#qrproductstaticfield5fn,
          #qrproductstaticfield6,#qrproductstaticfield6fn,#qrproductstaticfield7,#qrproductstaticfield7fn,#qrproductstaticfield8,#qrproductstaticfield8fn,#qrproductstaticfield9,#qrproductstaticfield9fn,
          #qrproductstaticfield10,#qrproductstaticfield10fn,#qrserialno,#qrserialnofn,#qrbatchno,#qrbatchnofn,#qrdateofmanufacture,#qrdateofmanufacturefn,#qrdateofexp,#qrdateofexpfn,#qrdateofretest,#qrdateofretestfn,#qrbatchstaticfield1,#qrbatchstaticfield1fn,
          #qrbatchstaticfield2,#qrbatchstaticfield2fn,#qrbatchstaticfield3,#qrbatchstaticfield3fn,#qrbatchstaticfield4,#qrbatchstaticfield4fn,#qrbatchstaticfield5,#qrbatchstaticfield5fn,#qrcontainerno,#qrcontainernofn,
          #qrdynamicfield1,#qrdynamicfield1fn,#qrdynamicfield2,#qrdynamicfield2fn,#qrglobalstaticfield1,#qrglobalstaticfield1fn,#qrglobalstaticfield2,#qrglobalstaticfield2fn,#qrnetweight,#qrnetweightfn,#qrtareweight,#qrtareweightfn,
          #qrgrossweight,#qrgrossweightfn,#qrlabelstaticfield1,#qrlabelstaticfield1fn,#qrlabelstaticfield2,#qrlabelstaticfield2fn,#qrFreefield1,#qrfreefield1fn,#qrFreefield2,#qrfreefield2fn,#qrFreefield3,#qrfreefield3fn,#qrFreefield4,#qrfreefield4fn,#qrFreefield5,#qrfreefield5fn,#qrFreefield6,#qrfreefield6fn,#qrFreefield7,#qrfreefield7fn,#qrFreefield8,#qrfreefield8fn,#qrFreefield9,#qrfreefield9fn,#labelstaticfield1_input,#labelstaticfield2_input`)
            .change(updateQRCode);
        updateQRCode();

         // Keyup event handler for labelstaticfield1_input
         $('#labelstaticfield1_input').keyup(function() {
            $('#labelcontainer').find('.labelstaticfield1').empty();
            var sVal1 = $(this).val();
            $('#labelcontainer').find('.labelstaticfield1').append($('#labelstaticfield1fn').is(':checked') ? `<span class="delimiter">:</span> ${sVal1}` : `${sVal1}`);
            updateQRCode(); // Call updateQRCode on keyup to reflect changes
        });
        $('#labelstaticfield2_input').keyup(function() {
            $('#labelcontainer').find('.labelstaticfield2').empty();
            var sVal2 = $(this).val();
            $('#labelcontainer').find('.labelstaticfield2').append($('#labelstaticfield2fn').is(':checked') ? `<span class="delimiter">:</span> ${sVal2}` : `${sVal2}`);
            updateQRCode(); // Call updateQRCode on keyup to reflect changes
        });

        function updateQRCode() {
            qrorganizationname = "{{ $config_data->organization_name }}";
            qrorganizationname_fieldname = "Company  Name";
            qrproductname = "{{ $config_data->product_name }}";
            qrproductid = "{{ $config_data->product_id }}";
            qrproductcomments = "{{ $config_data->comments }}";
            qrproductstaticfield1 = "{{ $config_data->p_static_field1 }}";
            qrproductstaticfield2 = "{{ $config_data->p_static_field2 }}";
            qrproductstaticfield3 = "{{ $config_data->p_static_field3 }}";
            qrproductstaticfield4 = "{{ $config_data->p_static_field4 }}";
            qrproductstaticfield5 = "{{ $config_data->p_static_field5 }}";
            qrproductstaticfield6 = "{{ $config_data->p_static_field6 }}";
            qrproductstaticfield7 = "{{ $config_data->p_static_field7 }}";
            qrproductstaticfield8 = "{{ $config_data->p_static_field8 }}";
            qrproductstaticfield9 = "{{ $config_data->p_static_field9 }}";
            qrproductstaticfield10 = "{{ $config_data->p_static_field10 }}";
            qrserialno = "{{ $config_data->serialno }}";
            qrbatchno = "{{ $config_data->batch_number }}";
            qrdateofmanufacture = "{{ $config_data->date_of_manufacturing }}";
            qrbarcodedelimiter = "{{ $config_data->barcode_delimiter }}";
            qrdateofexp = "{{ $config_data->date_of_expiry }}";
            qrdateofretest = "{{ $config_data->date_of_retest }}";
            qrbatchstaticfield1 = "{{ $config_data->b_static_field1 }}";
            qrbatchstaticfield2 = "{{ $config_data->b_static_field2 }}";
            qrbatchstaticfield3 = "{{ $config_data->b_static_field3 }}";
            qrbatchstaticfield4 = "{{ $config_data->b_static_field4 }}";
            qrbatchstaticfield5 = "{{ $config_data->b_static_field5 }}";
            qrcontainerno = "{{ $config_data->container_no }}";
            qrdynamicfield1 = "{{ $config_data->dynamic_field1 }}";
            qrdynamicfield2 = "{{ $config_data->dynamic_field2 }}";
            qrnetweight = "{{ $config_data->net_weight }}";
            qrtareweight = "{{ $config_data->tare_weight }}";
            qrgrossweight = "{{ $config_data->gross_weight }}";
            qrglobalfieldname1 = "{{ $config_data->global_fieldname1 }}";
            qrglobalfieldname2 = "{{ $config_data->global_fieldname2 }}";
            qrglobalfieldname1 = "{{ $config_data->global_fieldname1 }}";
            qrglobalfieldname2 = "{{ $config_data->global_fieldname2 }}";
            qrglobalstaticfield1 = "{{ $config_data->global_static_field1 }}";
            qrglobalstaticfield2 = "{{ $config_data->global_static_field2 }}";
            qrlabelstaticfield1 = "{{ $config_data->label_static_field1 }}";
            qrlabelstaticfield2 = "{{ $config_data->label_static_field2 }}";




            let qrorganizationnamefn = $('#qrorganizationnamefn').prop('checked') ? 'yes' : 'no';
            let qrproductnamefn = $('#qrproductnamefn').prop('checked') ? 'yes' : 'no';
            let qrproductidfn = $('#qrproductidfn').prop('checked') ? 'yes' : 'no';
            let qrproductcommentsfn = $('#qrproductcommentsfn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield1fn = $('#qrproductstaticfield1fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield2fn = $('#qrproductstaticfield2fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield3fn = $('#qrproductstaticfield3fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield4fn = $('#qrproductstaticfield4fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield5fn = $('#qrproductstaticfield5fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield6fn = $('#qrproductstaticfield6fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield7fn = $('#qrproductstaticfield7fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield8fn = $('#qrproductstaticfield8fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield9fn = $('#qrproductstaticfield9fn').prop('checked') ? 'yes' : 'no';
            let qrproductstaticfield10fn = $('#qrproductstaticfield10fn').prop('checked') ? 'yes' : 'no';
            let qrserialnofn = $('#qrserialnofn').prop('checked') ? 'yes' : 'no';
            let qrbatchnofn = $('#qrbatchnofn').prop('checked') ? 'yes' : 'no';
            let qrdateofmanufacturefn = $('#qrdateofmanufacturefn').prop('checked') ? 'yes' : 'no';
            let qrdateofexpfn = $('#qrdateofexpfn').prop('checked') ? 'yes' : 'no';
            let qrdateofretestfn = $('#qrdateofretestfn').prop('checked') ? 'yes' : 'no';
            let qrbatchstaticfield1fn = $('#qrbatchstaticfield1fn').prop('checked') ? 'yes' : 'no';
            let qrbatchstaticfield2fn = $('#qrbatchstaticfield2fn').prop('checked') ? 'yes' : 'no';
            let qrbatchstaticfield3fn = $('#qrbatchstaticfield3fn').prop('checked') ? 'yes' : 'no';
            let qrbatchstaticfield4fn = $('#qrbatchstaticfield4fn').prop('checked') ? 'yes' : 'no';
            let qrbatchstaticfield5fn = $('#qrbatchstaticfield5fn').prop('checked') ? 'yes' : 'no';
            let qrcontainernofn = $('#qrcontainernofn').prop('checked') ? 'yes' : 'no';
            let qrdynamicfield1fn = $('#qrdynamicfield1fn').prop('checked') ? 'yes' : 'no';
            let qrdynamicfield2fn = $('#qrdynamicfield2fn').prop('checked') ? 'yes' : 'no';
            let qrglobalstaticfield1fn = $('#qrglobalstaticfield1fn').prop('checked') ? 'yes' : 'no';
            let qrglobalstaticfield2fn = $('#qrglobalstaticfield2fn').prop('checked') ? 'yes' : 'no';
            let qrnetweightfn = $('#qrnetweightfn').prop('checked') ? 'yes' : 'no';
            let qrtareweightfn = $('#qrtareweightfn').prop('checked') ? 'yes' : 'no';
            let qrgrossweightfn = $('#qrgrossweightfn').prop('checked') ? 'yes' : 'no';
            let qrlabelstaticfield1fn = $('#qrlabelstaticfield1fn').prop('checked') ? 'yes' : 'no';
            let qrlabelstaticfield2fn = $('#qrlabelstaticfield2fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield1fn = $('#qrfreefield1fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield2fn = $('#qrfreefield2fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield3fn = $('#qrfreefield3fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield4fn = $('#qrfreefield4fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield5fn = $('#qrfreefield5fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield6fn = $('#qrfreefield6fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield7fn = $('#qrfreefield7fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield8fn = $('#qrfreefield8fn').prop('checked') ? 'yes' : 'no';
            let qrfreefield9fn = $('#qrfreefield9fn').prop('checked') ? 'yes' : 'no';
            var sVal1 = $('#labelstaticfield1_input').val();
            var sVal2 = $('#labelstaticfield2_input').val();






            qrorganizationnamechecked = ($('#qrorganizationname').prop('checked') && $('#qrorganizationnamefn').prop(
                    'checked')) ? `${qrorganizationname_fieldname} : ${qrorganizationname}${qrbarcodedelimiter}` :
                ($('#qrorganizationname').prop('checked') ? `${qrorganizationname}${qrbarcodedelimiter}` : '');
            let qrorganizationnameValue = qrorganizationnamechecked != "" ? 'yes' : 'no';

            qrproductnamechecked = ($('#qrproductname').prop('checked') && $('#qrproductnamefn').prop('checked')) ?
                `${qrproductname} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductname').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductnameValue = qrproductnamechecked != "" ? 'yes' : 'no';

            qrproductidchecked = ($('#qrproductid').prop('checked') && $('#qrproductidfn').prop('checked')) ?
                `${qrproductid} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductid').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductidValue = qrproductidchecked != "" ? 'yes' : 'no';

            qrproductcommentschecked = ($('#qrproductcomments').prop('checked') && $('#qrproductcommentsfn').prop(
                    'checked')) ? `${qrproductcomments} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductcomments').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductcommentsValue = qrproductcommentschecked != "" ? 'yes' : 'no';

            qrproductstaticfield1checked = ($('#qrproductstaticfield1').prop('checked') && $('#qrproductstaticfield1fn')
                    .prop('checked')) ? `${qrproductstaticfield1} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield1').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield1Value = qrproductstaticfield1checked != "" ? 'yes' : 'no';

            qrproductstaticfield2checked = ($('#qrproductstaticfield2').prop('checked') && $('#qrproductstaticfield2fn')
                    .prop('checked')) ? `${qrproductstaticfield2} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield2').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield2Value = qrproductstaticfield2checked != "" ? 'yes' : 'no';

            qrproductstaticfield3checked = ($('#qrproductstaticfield3').prop('checked') && $('#qrproductstaticfield3fn')
                    .prop('checked')) ? `${qrproductstaticfield3} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield3').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield3Value = qrproductstaticfield3checked != "" ? 'yes' : 'no';

            qrproductstaticfield4checked = ($('#qrproductstaticfield4').prop('checked') && $('#qrproductstaticfield4fn')
                    .prop('checked')) ? `${qrproductstaticfield4} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield4').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield4Value = qrproductstaticfield4checked != "" ? 'yes' : 'no';

            qrproductstaticfield5checked = ($('#qrproductstaticfield5').prop('checked') && $('#qrproductstaticfield5fn')
                    .prop('checked')) ? `${qrproductstaticfield5} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield5').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield5Value = qrproductstaticfield5checked != "" ? 'yes' : 'no';

            qrproductstaticfield6checked = ($('#qrproductstaticfield6').prop('checked') && $('#qrproductstaticfield6fn')
                    .prop('checked')) ? `${qrproductstaticfield6} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield6').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield6Value = qrproductstaticfield6checked != "" ? 'yes' : 'no';

            qrproductstaticfield7checked = ($('#qrproductstaticfield7').prop('checked') && $('#qrproductstaticfield7fn')
                    .prop('checked')) ? `${qrproductstaticfield7} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield7').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield7Value = qrproductstaticfield7checked != "" ? 'yes' : 'no';

            qrproductstaticfield8checked = ($('#qrproductstaticfield8').prop('checked') && $('#qrproductstaticfield8fn')
                    .prop('checked')) ? `${qrproductstaticfield8} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield8').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield8Value = qrproductstaticfield8checked != "" ? 'yes' : 'no';

            qrproductstaticfield9checked = ($('#qrproductstaticfield9').prop('checked') && $('#qrproductstaticfield9fn')
                    .prop('checked')) ? `${qrproductstaticfield9} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield9').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield9Value = qrproductstaticfield9checked != "" ? 'yes' : 'no';

            qrproductstaticfield10checked = ($('#qrproductstaticfield10').prop('checked') && $('#qrproductstaticfield10fn')
                    .prop('checked')) ? `${qrproductstaticfield10} :XXXX${qrbarcodedelimiter}` :
                ($('#qrproductstaticfield10').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrproductstaticfield10Value = qrproductstaticfield10checked != "" ? 'yes' : 'no';

            qrserialnochecked = ($('#qrserialno').prop('checked') && $('#qrserialnofn').prop('checked')) ?
                `${qrserialno} :XXXX${qrbarcodedelimiter}` :
                ($('#qrserialno').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrserialnoValue = qrserialnochecked != "" ? 'yes' : 'no';

            qrbatchnochecked = ($('#qrbatchno').prop('checked') && $('#qrbatchnofn').prop('checked')) ?
                `${qrbatchno} :XXXX${qrbarcodedelimiter}` :
                ($('#qrbatchno').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrbatchnoValue = qrbatchnochecked != "" ? 'yes' : 'no';

            qrdateofmanufacturingchecked = ($('#qrdateofmanufacture').prop('checked') && $('#qrdateofmanufacturefn').prop(
                    'checked')) ? `${qrdateofmanufacture} :XXXX${qrbarcodedelimiter}` :
                ($('#qrdateofmanufacture').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrdateofmanufacturingValue = qrdateofmanufacturingchecked != "" ? 'yes' : 'no';

            qrdateofexpchecked = ($('#qrdateofexp').prop('checked') && $('#qrdateofexpfn').prop('checked')) ?
                `${qrdateofexp} :XXXX${qrbarcodedelimiter}` :
                ($('#qrdateofexp').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrdateofexpValue = qrdateofexpchecked != "" ? 'yes' : 'no';

            qrdateofretestchecked = ($('#qrdateofretest').prop('checked') && $('#qrdateofretestfn').prop('checked')) ?
                `${qrdateofretest} :XXXX${qrbarcodedelimiter}` :
                ($('#qrdateofretest').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrdateofretestValue = qrdateofretestchecked != "" ? 'yes' : 'no';

            qrbatchstaticfield1checked = ($('#qrbatchstaticfield1').prop('checked') && $('#qrbatchstaticfield1fn').prop(
                    'checked')) ? `${qrbatchstaticfield1} :XXXX${qrbarcodedelimiter}` :
                ($('#qrbatchstaticfield1').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrbatchstaticfield1Value = qrbatchstaticfield1checked != "" ? 'yes' : 'no';

            qrbatchstaticfield2checked = ($('#qrbatchstaticfield2').prop('checked') && $('#qrbatchstaticfield2fn').prop(
                    'checked')) ? `${qrbatchstaticfield2} :XXXX${qrbarcodedelimiter}` :
                ($('#qrbatchstaticfield2').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrbatchstaticfield2Value = qrbatchstaticfield2checked != "" ? 'yes' : 'no';

            qrbatchstaticfield3checked = ($('#qrbatchstaticfield3').prop('checked') && $('#qrbatchstaticfield3fn').prop(
                    'checked')) ? `${qrbatchstaticfield3} :XXXX${qrbarcodedelimiter}` :
                ($('#qrbatchstaticfield3').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrbatchstaticfield3Value = qrbatchstaticfield3checked != "" ? 'yes' : 'no';

            qrbatchstaticfield4checked = ($('#qrbatchstaticfield4').prop('checked') && $('#qrbatchstaticfield4fn').prop(
                    'checked')) ? `${qrbatchstaticfield4} :XXXX${qrbarcodedelimiter}` :
                ($('#qrbatchstaticfield4').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrbatchstaticfield4Value = qrbatchstaticfield4checked != "" ? 'yes' : 'no';

            qrbatchstaticfield5checked = ($('#qrbatchstaticfield5').prop('checked') && $('#qrbatchstaticfield5fn').prop(
                    'checked')) ? `${qrbatchstaticfield5} :XXXX${qrbarcodedelimiter}` :
                ($('#qrbatchstaticfield5').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrbatchstaticfield5Value = qrbatchstaticfield5checked != "" ? 'yes' : 'no';

            qrcontainernochecked = ($('#qrcontainerno').prop('checked') && $('#qrcontainernofn').prop('checked')) ?
                `${qrcontainerno} :XXXX${qrbarcodedelimiter}` :
                ($('#qrcontainerno').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrcontainernoValue = qrcontainernochecked != "" ? 'yes' : 'no';

            qrdynamicfield1checked = ($('#qrdynamicfield1').prop('checked') && $('#qrdynamicfield1fn').prop('checked')) ?
                `${qrdynamicfield1} :XXXX${qrbarcodedelimiter}` :
                ($('#qrdynamicfield1').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrdynamicfield1Value = qrdynamicfield1checked != "" ? 'yes' : 'no';

            qrdynamicfield2checked = ($('#qrdynamicfield2').prop('checked') && $('#qrdynamicfield2fn').prop('checked')) ?
                `${qrdynamicfield2} :XXXX${qrbarcodedelimiter}` :
                ($('#qrdynamicfield2').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrdynamicfield2Value = qrdynamicfield2checked != "" ? 'yes' : 'no';

            qrnetweightchecked = ($('#qrnetweight').prop('checked') && $('#qrnetweightfn').prop('checked')) ?
                `${qrnetweight} :XXXX${qrbarcodedelimiter}` :
                ($('#qrnetweight').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrnetweightValue = qrnetweightchecked != "" ? 'yes' : 'no';

            qrtareweightchecked = ($('#qrtareweight').prop('checked') && $('#qrtareweightfn').prop('checked')) ?
                `${qrtareweight} :XXXX${qrbarcodedelimiter}` :
                ($('#qrtareweight').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrtareweightValue = qrtareweightchecked != "" ? 'yes' : 'no';

            qrgrossweightchecked = ($('#qrgrossweight').prop('checked') && $('#qrgrossweightfn').prop('checked')) ?
                `${qrgrossweight} :XXXX${qrbarcodedelimiter}` :
                ($('#qrgrossweight').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrgrossweightValue = qrgrossweightchecked != "" ? 'yes' : 'no';

            qrglobalstaticfield1checked = ($('#qrglobalstaticfield1').prop('checked') && $('#qrglobalstaticfield1fn').prop(
                    'checked')) ? `${qrglobalstaticfield1} :${qrglobalfieldname1}${qrbarcodedelimiter}` :
                ($('#qrglobalstaticfield1').prop('checked') ? `${qrglobalfieldname1}${qrbarcodedelimiter}` : '');
            let qrglobalstaticfield1Value = qrglobalstaticfield1checked != "" ? 'yes' : 'no';

            qrglobalstaticfield2checked = ($('#qrglobalstaticfield2').prop('checked') && $('#qrglobalstaticfield2fn').prop(
                    'checked')) ? `${qrglobalstaticfield2} :${qrglobalfieldname2}${qrbarcodedelimiter}` :
                ($('#qrglobalstaticfield2').prop('checked') ? `${qrglobalfieldname2}${qrbarcodedelimiter}` : '');
            let qrglobalstaticfield2Value = qrglobalstaticfield2checked != "" ? 'yes' : 'no';

            qrlabelstaticfield1checked = ($('#qrlabelstaticfield1').prop('checked') && $('#qrlabelstaticfield1fn').prop(
                'checked')) ? `${qrlabelstaticfield1} :${sVal1 || 'XXXX'}${qrbarcodedelimiter}` :
                 ($('#qrlabelstaticfield1').prop('checked') ? `${sVal1 || 'XXXX'}${qrbarcodedelimiter}` : '');
            let qrlabelstaticfield1Value = qrlabelstaticfield1checked != "" ? 'yes' : 'no';

            qrlabelstaticfield2checked = ($('#qrlabelstaticfield2').prop('checked') && $('#qrlabelstaticfield2fn').prop(
                'checked')) ? `${qrlabelstaticfield2} :${sVal2 || 'XXXX'}${qrbarcodedelimiter}` :
                 ($('#qrlabelstaticfield2').prop('checked') ? `${sVal2 || 'XXXX'}${qrbarcodedelimiter}` : '');
            let qrlabelstaticfield2Value = qrlabelstaticfield2checked != "" ? 'yes' : 'no';

            qrfreefield1checked = ($('#qrFreefield1').prop('checked') && $('#qrfreefield1fn').prop('checked')) ?
                `Free field1 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield1').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield1Value = qrfreefield1checked != "" ? 'yes' : 'no';

            qrfreefield2checked = ($('#qrFreefield2').prop('checked') && $('#qrfreefield2fn').prop('checked')) ?
                `Free field2 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield2').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield2Value = qrfreefield2checked != "" ? 'yes' : 'no';

            qrfreefield3checked = ($('#qrFreefield3').prop('checked') && $('#qrfreefield3fn').prop('checked')) ?
                `Free field3 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield3').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield3Value = qrfreefield3checked != "" ? 'yes' : 'no';

            qrfreefield4checked = ($('#qrFreefield4').prop('checked') && $('#qrfreefield4fn').prop('checked')) ?
                `Free field4 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield4').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield4Value = qrfreefield4checked != "" ? 'yes' : 'no';

            qrfreefield5checked = ($('#qrFreefield5').prop('checked') && $('#qrfreefield5fn').prop('checked')) ?
                `Free field5 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield5').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield5Value = qrfreefield5checked != "" ? 'yes' : 'no';

            qrfreefield6checked = ($('#qrFreefield6').prop('checked') && $('#qrfreefield6fn').prop('checked')) ?
                `Free field6 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield6').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield6Value = qrfreefield6checked != "" ? 'yes' : 'no';

            qrfreefield7checked = ($('#qrFreefield7').prop('checked') && $('#qrfreefield7fn').prop('checked')) ?
                `Free field7 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield7').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield7Value = qrfreefield7checked != "" ? 'yes' : 'no';

            qrfreefield8checked = ($('#qrFreefield8').prop('checked') && $('#qrfreefield8fn').prop('checked')) ?
                `Free field8 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield8').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield8Value = qrfreefield8checked != "" ? 'yes' : 'no';

            qrfreefield9checked = ($('#qrFreefield9').prop('checked') && $('#qrfreefield9fn').prop('checked')) ?
                `Free field9 :XXXX${qrbarcodedelimiter}` :
                ($('#qrFreefield9').prop('checked') ? `XXXX${qrbarcodedelimiter}` : '');
            let qrfreefield9Value = qrfreefield9checked != "" ? 'yes' : 'no';



            // Encoding--> the data into QR code format
            qrCodeData = encodeQRCodeData(qrorganizationnamechecked, qrproductnamechecked, qrproductidchecked,
                qrproductcommentschecked, qrproductstaticfield1checked, qrproductstaticfield2checked,
                qrproductstaticfield3checked,
                qrproductstaticfield4checked, qrproductstaticfield5checked, qrproductstaticfield6checked,
                qrproductstaticfield7checked,
                qrproductstaticfield8checked, qrproductstaticfield9checked, qrproductstaticfield10checked,
                qrserialnochecked,qrbatchnochecked,
                qrdateofmanufacturingchecked, qrdateofexpchecked, qrdateofretestchecked,
                qrbatchstaticfield1checked, qrbatchstaticfield2checked, qrbatchstaticfield3checked,
                qrbatchstaticfield4checked, qrbatchstaticfield5checked,
                qrcontainernochecked, qrdynamicfield1checked, qrdynamicfield2checked, qrnetweightchecked,
                qrtareweightchecked, qrgrossweightchecked,
                qrglobalstaticfield1checked, qrglobalstaticfield2checked, qrlabelstaticfield1checked,
                qrlabelstaticfield2checked, qrfreefield1checked, qrfreefield2checked, qrfreefield3checked,
                qrfreefield4checked, qrfreefield5checked, qrfreefield6checked, qrfreefield7checked, qrfreefield8checked, qrfreefield9checked);

                if (qrCodeData.length > 1) {
                    qrCodeData = qrCodeData.trim();

                    if (qrCodeData.endsWith(qrbarcodedelimiter)) {
                        qrCodeData = qrCodeData.slice(0, -1);
                    }
                }

            let qrCodeDataval = encodeQRCodeDataval(qrorganizationnameValue, qrproductnameValue, qrproductidValue,
                qrproductcommentsValue, qrproductstaticfield1Value,
                qrproductstaticfield2Value, qrproductstaticfield3Value, qrproductstaticfield4Value,
                qrproductstaticfield5Value, qrproductstaticfield6Value,
                qrproductstaticfield7Value, qrproductstaticfield8Value, qrproductstaticfield9Value,
                qrproductstaticfield10Value, qrserialnoValue, qrbatchnoValue,
                qrdateofmanufacturingValue, qrdateofexpValue, qrdateofretestValue, qrbatchstaticfield1Value,
                qrbatchstaticfield2Value, qrbatchstaticfield3Value, qrbatchstaticfield4Value,
                qrbatchstaticfield5Value, qrcontainernoValue, qrdynamicfield1Value, qrdynamicfield2Value,
                qrnetweightValue, qrtareweightValue, qrgrossweightValue,
                qrglobalstaticfield1Value, qrglobalstaticfield2Value, qrlabelstaticfield1Value,
                qrlabelstaticfield2Value, qrfreefield1Value, qrfreefield2Value, qrfreefield3Value, qrfreefield4Value,
                qrfreefield5Value, qrfreefield6Value, qrfreefield7Value, qrfreefield8Value, qrfreefield9Value,
                qrorganizationnamefn, qrproductnamefn, qrproductidfn, qrproductcommentsfn, qrproductstaticfield1fn,
                qrproductstaticfield2fn, qrproductstaticfield3fn, qrproductstaticfield4fn, qrproductstaticfield5fn,
                qrproductstaticfield6fn, qrproductstaticfield7fn, qrproductstaticfield8fn,
                qrproductstaticfield9fn, qrproductstaticfield10fn, qrserialnofn,qrbatchnofn, qrdateofmanufacturefn, qrdateofexpfn,
                qrdateofretestfn, qrbatchstaticfield1fn, qrbatchstaticfield2fn,
                qrbatchstaticfield3fn, qrbatchstaticfield4fn, qrbatchstaticfield5fn, qrcontainernofn, qrdynamicfield1fn,
                qrdynamicfield2fn, qrglobalstaticfield1fn, qrglobalstaticfield2fn, qrnetweightfn, qrtareweightfn,
                qrgrossweightfn, qrlabelstaticfield1fn, qrlabelstaticfield2fn,
                qrfreefield1fn, qrfreefield2fn, qrfreefield3fn, qrfreefield4fn, qrfreefield5fn, qrfreefield6fn, qrfreefield7fn, qrfreefield8fn, qrfreefield9fn);

            var height = $("#codeName").css("height");
            var width = $("#codeName").css("width");
            var top = $("span_QRcode_nonstore").css("top");
            var left = $("span_QRcode_nonstore").css("left");
            $("#span_QRcode_nonstore").empty();
            $("#span_QRcode_nonstore").css("top", top);
            $("#span_QRcode_nonstore").css("left", left);

            // document.getElementById('span_QRcode_nonstore').innerHTML = `
            //     <img id="codeName" style="height:${height}; width:${width}" alt='QR Code Generator'
            //         src='https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(qrCodeData)}'/>`;
           // Display--> QR Code and DATA Matrix
           if($('#code').val() === 'QRcode'){
                $("#span_QRcode_nonstore").empty();
                console.log("CODe");
                document.getElementById('span_QRcode_nonstore').innerHTML = `
                <img id="codeName" style="height: ${height}; width:${width}" alt='QR Code Generator'
                    src='https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(qrCodeData)}'/>`;
            }else if($('#code').val() === 'GS1'){
                $("#span_QRcode_nonstore").empty();
                document.getElementById('span_QRcode_nonstore').innerHTML = `
                <img id="codeName" style="height: ${height}; width:${width}" alt='Barcode Generator TEC-IT'
                    src='https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(qrCodeData)}&code=GS1DigitalLink_DataMatrix&dataattributekey_2=&dataattributeval_2=&dataattributekey_3=&dataattributeval_3=&dataattributekey_4=&dataattributeval_4=&dataattributekey_5=&dataattributeval_5=&digitallink=&dataattributeval_1=&showhrt=no&eclevel=L&dmsize=Default'/>`
            }else if($('#code').val() === 'Barcode'){
                $("#span_QRcode_nonstore").empty();
                document.getElementById('span_QRcode_nonstore').innerHTML = `
                <img id="codeName" style="height: ${height}; width:${width}" alt='Barcode Generator TEC-IT'
                src='https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(qrCodeData)}&showhrt=no'/>`
            }


        }
        // Function--> to encode data into QR code format
        function encodeQRCodeData(qrorganizationnamechecked, qrproductnamechecked, qrproductidchecked,
            qrproductcommentschecked, qrproductstaticfield1checked, qrproductstaticfield2checked,
            qrproductstaticfield3checked,
            qrproductstaticfield4checked, qrproductstaticfield5checked, qrproductstaticfield6checked,
            qrproductstaticfield7checked,
            qrproductstaticfield8checked, qrproductstaticfield9checked, qrproductstaticfield10checked, qrserialnochecked,qrbatchnochecked,
            qrdateofmanufacturingchecked, qrdateofexpchecked, qrdateofretestchecked,
            qrbatchstaticfield1checked, qrbatchstaticfield2checked, qrbatchstaticfield3checked, qrbatchstaticfield4checked,
            qrbatchstaticfield5checked,
            qrcontainernochecked, qrdynamicfield1checked, qrdynamicfield2checked, qrnetweightchecked, qrtareweightchecked,
            qrgrossweightchecked,
            qrglobalstaticfield1checked, qrglobalstaticfield2checked, qrlabelstaticfield1checked,
            qrlabelstaticfield2checked, qrfreefield1checked, qrfreefield2checked, qrfreefield3checked, qrfreefield4checked,
            qrfreefield5checked, qrfreefield6checked, qrfreefield7checked, qrfreefield8checked, qrfreefield9checked) {
            return `${qrorganizationnamechecked}${qrproductnamechecked}${qrproductidchecked}${qrproductcommentschecked}${qrproductstaticfield1checked}${qrproductstaticfield2checked}${qrproductstaticfield3checked}${qrproductstaticfield4checked}${qrproductstaticfield5checked}${qrproductstaticfield6checked}${qrproductstaticfield7checked}${qrproductstaticfield8checked}${qrproductstaticfield9checked}${qrproductstaticfield10checked}${qrbatchnochecked}${qrserialnochecked}${qrdateofmanufacturingchecked} ${qrdateofexpchecked}${qrdateofretestchecked}${qrbatchstaticfield1checked}${qrbatchstaticfield2checked}${qrbatchstaticfield3checked}${qrbatchstaticfield4checked}${qrbatchstaticfield5checked}${qrcontainernochecked}${qrdynamicfield1checked}${qrdynamicfield2checked}${qrnetweightchecked}${qrtareweightchecked}${qrgrossweightchecked}${qrglobalstaticfield1checked}${qrglobalstaticfield2checked}${qrlabelstaticfield1checked}${qrlabelstaticfield2checked}${qrfreefield1checked}${qrfreefield2checked}${qrfreefield3checked}${qrfreefield4checked}${qrfreefield5checked}${qrfreefield6checked}${qrfreefield7checked}${qrfreefield8checked}${qrfreefield9checked}`;
        }

        function encodeQRCodeDataval(qrorganizationnameValue, qrproductnameValue, qrproductidValue, qrproductcommentsValue,
            qrproductstaticfield1Value,
            qrproductstaticfield2Value, qrproductstaticfield3Value, qrproductstaticfield4Value, qrproductstaticfield5Value,
            qrproductstaticfield6Value,
            qrproductstaticfield7Value, qrproductstaticfield8Value, qrproductstaticfield9Value, qrproductstaticfield10Value,
            qrserialnoValue,qrbatchnoValue,
            qrdateofmanufacturingValue, qrdateofexpValue, qrdateofretestValue, qrbatchstaticfield1Value,
            qrbatchstaticfield2Value, qrbatchstaticfield3Value, qrbatchstaticfield4Value,
            qrbatchstaticfield5Value, qrcontainernoValue, qrdynamicfield1Value, qrdynamicfield2Value, qrnetweightValue,
            qrtareweightValue, qrgrossweightValue,
            qrglobalstaticfield1Value, qrglobalstaticfield2Value, qrlabelstaticfield1Value, qrlabelstaticfield2Value,
            qrfreefield1Value, qrfreefield2Value, qrfreefield3Value, qrfreefield4Value, qrfreefield5Value,
            qrfreefield6Value,qrfreefield7Value,qrfreefield8Value,qrfreefield9Value,
            qrorganizationnamefn, qrproductnamefn, qrproductidfn, qrproductcommentsfn, qrproductstaticfield1fn,
            qrproductstaticfield2fn, qrproductstaticfield3fn, qrproductstaticfield4fn, qrproductstaticfield5fn,
            qrproductstaticfield6fn, qrproductstaticfield7fn, qrproductstaticfield8fn,
            qrproductstaticfield9fn, qrproductstaticfield10fn, qrserialnofn,qrbatchnofn, qrdateofmanufacturefn, qrdateofexpfn,
            qrdateofretestfn, qrbatchstaticfield1fn, qrbatchstaticfield2fn,
            qrbatchstaticfield3fn, qrbatchstaticfield4fn, qrbatchstaticfield5fn, qrcontainernofn, qrdynamicfield1fn,
            qrdynamicfield2fn, qrglobalstaticfield1fn, qrglobalstaticfield2fn, qrnetweightfn, qrtareweightfn,
            qrgrossweightfn, qrlabelstaticfield1fn, qrlabelstaticfield2fn,
            qrfreefield1fn, qrfreefield2fn, qrfreefield3fn, qrfreefield4fn, qrfreefield5fn, qrfreefield7fn, qrfreefield8fn, qrfreefield9fn) {
            let dataObj = {
                organizationname: qrorganizationnameValue,
                productname: qrproductnameValue,
                productid: qrproductidValue,
                productcomments: qrproductcommentsValue,
                productstaticfield1: qrproductstaticfield1Value,
                productstaticfield2: qrproductstaticfield2Value,
                productstaticfield3: qrproductstaticfield3Value,
                productstaticfield4: qrproductstaticfield4Value,
                productstaticfield5: qrproductstaticfield5Value,
                productstaticfield6: qrproductstaticfield6Value,
                productstaticfield7: qrproductstaticfield7Value,
                productstaticfield8: qrproductstaticfield8Value,
                productstaticfield9: qrproductstaticfield9Value,
                productstaticfield10: qrproductstaticfield10Value,
                serialno: qrserialnoValue,
                batchno: qrbatchnoValue,
                dateofexp: qrdateofexpValue,
                dateofretest: qrdateofretestValue,
                dateofmanufacture: qrdateofmanufacturingValue,
                batchstaticfield1: qrbatchstaticfield1Value,
                batchstaticfield2: qrbatchstaticfield2Value,
                batchstaticfield3: qrbatchstaticfield3Value,
                batchstaticfield4: qrbatchstaticfield4Value,
                batchstaticfield5: qrbatchstaticfield5Value,
                containerno: qrcontainernoValue,
                dynamicfield1: qrdynamicfield1Value,
                dynamicfield2: qrdynamicfield2Value,
                netweight: qrnetweightValue,
                tareweight: qrtareweightValue,
                grossweight: qrgrossweightValue,
                globalstaticfield1: qrglobalstaticfield1Value,
                globalstaticfield2: qrglobalstaticfield2Value,
                labelstaticfield1: qrlabelstaticfield1Value,
                labelstaticfield2: qrlabelstaticfield2Value,
                freefield1: qrfreefield1Value,
                freefield2: qrfreefield2Value,
                freefield3: qrfreefield3Value,
                freefield4: qrfreefield4Value,
                freefield5: qrfreefield5Value,
                freefield6: qrfreefield6Value,
                freefield7: qrfreefield7Value,
                freefield8: qrfreefield8Value,
                freefield9: qrfreefield9Value,
                organizationnamefn: qrorganizationnamefn,
                productnamefn: qrproductnamefn,
                productidfn: qrproductidfn,
                productcommentsfn: qrproductcommentsfn,
                productstaticfield1fn: qrproductstaticfield1fn,
                productstaticfield2fn: qrproductstaticfield2fn,
                productstaticfield3fn: qrproductstaticfield3fn,
                productstaticfield4fn: qrproductstaticfield4fn,
                productstaticfield5fn: qrproductstaticfield5fn,
                productstaticfield6fn: qrproductstaticfield6fn,
                productstaticfield7fn: qrproductstaticfield7fn,
                productstaticfield8fn: qrproductstaticfield8fn,
                productstaticfield9fn: qrproductstaticfield9fn,
                productstaticfield10fn: qrproductstaticfield10fn,
                serialnofn: qrserialnofn,
                batchnofn: qrbatchnofn,
                dateofmanufacturefn: qrdateofmanufacturefn,
                dateofexpfn: qrdateofexpfn,
                dateofretestfn: qrdateofretestfn,
                batchstaticfield1fn: qrbatchstaticfield1fn,
                batchstaticfield2fn: qrbatchstaticfield2fn,
                batchstaticfield3fn: qrbatchstaticfield3fn,
                batchstaticfield4fn: qrbatchstaticfield4fn,
                batchstaticfield5fn: qrbatchstaticfield5fn,
                containernofn: qrcontainernofn,
                dynamicfield1fn: qrdynamicfield1fn,
                dynamicfield2fn: qrdynamicfield2fn,
                globalstaticfield1fn: qrglobalstaticfield1fn,
                globalstaticfield2fn: qrglobalstaticfield2fn,
                netweightfn: qrnetweightfn,
                tareweightfn: qrtareweightfn,
                grossweightfn: qrgrossweightfn,
                labelstaticfield1fn: qrlabelstaticfield1fn,
                labelstaticfield2fn: qrlabelstaticfield2fn,
                freefield1fn: qrfreefield1fn,
                freefield2fn: qrfreefield2fn,
                freefield3fn: qrfreefield3fn,
                freefield4fn: qrfreefield4fn,
                freefield5fn: qrfreefield5fn,
                freefield6fn: qrfreefield6fn,
                freefield7fn: qrfreefield7fn,
                freefield8fn: qrfreefield8fn,
                freefield9fn: qrfreefield9fn,

            }
            let jsonData = JSON.stringify(dataObj);
            $('#dataObj').val(jsonData);

        }
        if(lines !== null){
            for(var count = 0; count < lines.length; count++){
                var position = lines[count].position.split("_");
                console.log(position, 'positon');
                $(`#${idPrefix_Labeltype}`).append(`<span class="textnonstore lines" style='position: absolute; border-bottom: 2px solid black ; width:${position[3]}px; height: ${position[2]}px; top: ${position[0]}px; left: ${position[1]}px;'> </span>`);
        }
        }


        //Predefined and dynamic onchange
        $(document).on('change', '.predefined_dynamic', function() {
            if ($(this).val() == 'dynamic') {
                $('.unwantedfordynamiclabel').hide();
                $('.nonstore').prop("checked", false);
                $("#selectall").prop('checked', false);
                $('.textnonstore').remove();
                $("#span_QRcode_nonstore").hide();
                $('#QR_tab').hide();
                $('#code').val('select');
                $('#labelstaticfield1_input').val('');
                $('#labelstaticfield2_input').val('');
                $('#label1_text_container').hide();
                $('#label2_text_container').hide();
                $('#image1UploadOptionContainer').hide();
                $('#image2UploadOptionContainer').hide();
                $('#labelimage1_input').hide();
                $('#labelimage2_input').hide();
                $('.nonstoreqr').prop('checked', false);
                $('.fieldname_check').prop('checked', false);
                $("#label_image1").hide();
                $("#label_image2").hide();
                $("#global_image1").hide();
                $("#global_image2").hide();
                $('#labelimage1_upload').val('');
                $('#labelimage2_upload').val('');
                $('#label_image1_img').remove();
                $('#label_image2_img').remove();
                updateQRCode();
            } else {
                $('.unwantedfordynamiclabel').show();
                $('.nonstore').prop("checked", false);
                $("#selectall").prop('checked', false);
                $('.textnonstore').remove();
                $("#span_QRcode_nonstore").hide();
                $('#QR_tab').hide();
                $('#code').val('select');
                $('#labelstaticfield1_input').val('');
                $('#labelstaticfield2_input').val('');
                $('#label1_text_container').hide();
                $('#label2_text_container').hide();
                $('.nonstoreqr').prop('checked', false);
                $('.fieldname_check').prop('checked', false);
                $('#labelimage1_input').hide();
                $('#labelimage2_input').hide();
                $("#label_image1").hide();
                $("#label_image2").hide();
                $("#global_image1").hide();
                $("#global_image2").hide();
                $('#labelimage1_upload').val('');
                $('#labelimage2_upload').val('');
                $('#label_image1_img').remove();
                $('#label_image2_img').remove();
                updateQRCode();
            }
            po();
            // checkLabelName();
        });

         //          QR Content select restritiion
         $(document).on('click', '.nonstoreqr', function() {

            if ($('.nonstoreqr:checked').length > 10) {
                Swal.fire({
                    title: 'Please limit your selection to less than 10 fields!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                });
                $(this).prop('checked', false);
            }
            if ($('.nonstoreqr:checked').length > 1 && ($('#code').val() == 'Barcode'))   {
                    Swal.fire({
                        title: 'Cannot add more than one Barcode values',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                    $(this).prop('checked', false);
            }

        });
            // ------------------ save ------------
        $('#save').click(function(e) {
            event.preventDefault();

            var config = @json($config_data);
            let message;
            if(config.label_approval_flow == 'on'){
            message = "Are you sure you want to send this label for approval?"
            }else{
                message = "Are you sure want to update this label design?"
                }

            var organizationnamefn = $('#organizationnamefn').prop('checked') == true ? 'on' : 'off';
                var productnamefn = $('#productnamefn').prop('checked') == true ? 'on' : 'off';
                var productidfn = $('#productidfn').prop('checked') == true ? 'on' : 'off';
                var productcommentsfn = $('#productcommentsfn').prop('checked') == true ? 'on' : 'off';
                var productstaticfield1 = $('#productstaticfield1fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield2 = $('#productstaticfield2fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield3 = $('#productstaticfield3fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield4 = $('#productstaticfield4fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield5 = $('#productstaticfield5fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield6 = $('#productstaticfield6fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield7 = $('#productstaticfield7fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield8 = $('#productstaticfield8fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield9 = $('#productstaticfield9fn').prop('checked') == true ? 'on' :
                'off';
                var productstaticfield10 = $('#productstaticfield10fn').prop('checked') == true ? 'on' :
                    'off';
                var serialnofn = $('#serialnofn').prop('checked') == true ? 'on' : 'off';
                var batchnofn = $('#batchnofn').prop('checked') == true ? 'on' : 'off';
                var dateofmanufacturefn = $('#dateofmanufacturefn').prop('checked') == true ? 'on' : 'off';
                var dateofexpfn = $('#dateofexpfn').prop('checked') == true ? 'on' : 'off';
                var dateofretestfn = $('#dateofretestfn').prop('checked') == true ? 'on' : 'off';
                var batchstaticfield1 = $('#batchstaticfield1fn').prop('checked') == true ? 'on' : 'off';
                var batchstaticfield2 = $('#batchstaticfield2fn').prop('checked') == true ? 'on' : 'off';
                var batchstaticfield3 = $('#batchstaticfield3fn').prop('checked') == true ? 'on' : 'off';
                var batchstaticfield4 = $('#batchstaticfield4fn').prop('checked') == true ? 'on' : 'off';
                var batchstaticfield5 = $('#batchstaticfield5fn').prop('checked') == true ? 'on' : 'off';
                var containernofn = $('#containernofn').prop('checked') == true ? 'on' : 'off';
                var dynamicfield1 = $('#dynamicfield1fn').prop('checked') == true ? 'on' : 'off';
                var dynamicfield2 = $('#dynamicfield2fn').prop('checked') == true ? 'on' : 'off';
                var netweightfn = $('#netweightfn').prop('checked') == true ? 'on' : 'off';
                var tareweightfn = $('#tareweightfn').prop('checked') == true ? 'on' : 'off';
                var grossweightfn = $('#grossweightfn').prop('checked') == true ? 'on' : 'off';
                var globalstaticfield1 = $('#globalstaticfield1fn').prop('checked') == true ? 'on' : 'off';
                var globalstaticfield2 = $('#globalstaticfield2fn').prop('checked') == true ? 'on' : 'off';
                var labelstaticfield1 = $('#labelstaticfield1fn').prop('checked') == true ? 'on' : 'off';
                var labelstaticfield2 = $('#labelstaticfield2fn').prop('checked') == true ? 'on' : 'off';
                var freefield1 = $('#Freefield1fn').prop('checked') == true ? 'on' : 'off';
                var freefield2 = $('#Freefield2fn').prop('checked') == true ? 'on' : 'off';
                var freefield3 = $('#Freefield3fn').prop('checked') == true ? 'on' : 'off';
                var freefield4 = $('#Freefield4fn').prop('checked') == true ? 'on' : 'off';
                var freefield5 = $('#Freefield5fn').prop('checked') == true ? 'on' : 'off';
                var freefield6 = $('#Freefield6fn').prop('checked') == true ? 'on' : 'off';
                var freefield7 = $('#Freefield7fn').prop('checked') == true ? 'on' : 'off';
                var freefield8 = $('#Freefield8fn').prop('checked') == true ? 'on' : 'off';
                var freefield9 = $('#Freefield9fn').prop('checked') == true ? 'on' : 'off';


                // if ($('#Freefield1fn').is(':checked') == false) {
                //     $('#Freefield1_name_input').val('');
                // }if ($('#Freefield2fn').is(':checked') == false) {
                //     $('#Freefield2_name_input').val('');
                // }if ($('#Freefield3fn').is(':checked') == false) {
                //     $('#Freefield3_name_input').val('');
                // }if ($('#Freefield4fn').is(':checked') == false) {
                //     $('#Freefield4_name_input').val('');
                // }if ($('#Freefield5fn').is(':checked') == false) {
                //     $('#Freefield5_name_input').val('');
                // }if ($('#Freefield6fn').is(':checked') == false) {
                //     $('#Freefield6_name_input').val('');
                // }

                if ($('#labelstaticfield1').is(":checked") == true && $("#labelstaticfield1_input").val() ==
                    "") {
                    Swal.fire({
                        title: 'Please enter the value of static field',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',

                    });

                } else if ($('#labelstaticfield2').is(":checked") == true && $("#labelstaticfield2_input")
                    .val() ==
                    "") {
                    Swal.fire({
                        title: 'Please enter the value of static field',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',

                    });

                } else if ($('#labelname').val() == "") {
                    Swal.fire({
                        title: 'Please enter the Label Name',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                }else if ($('#labelimage1').prop('checked') && $('#label_image1').find('img').length == 0) {
                        Swal.fire({
                            title: 'Image 1 need to add!',
                            confirmButtonText: 'OK',
                            confirmButtonColor: 'rgb(36 63 161)',
                            background: 'rgb(105 126 157)',
                        });
                } else if ($('#labelimage2').prop('checked') && $('#label_image2').find('img').length == 0) {
                    Swal.fire({
                        title: 'Image 2 need to add!',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                }else if ($('#globalimage1').prop('checked') && $('#global_image1').find('img').length == 0) {
                    Swal.fire({
                        title: 'Global image1 need to add!',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                } else if ($('#globalimage2').prop('checked') && $('#global_image2').find('img').length == 0) {
                    Swal.fire({
                        title: 'Global image2 need to add!',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                }else if ($('.nonstore:checked').length == 0 && $('.nonstoreqr:checked').length == 0 )  {
                    Swal.fire({
                        title: 'Cannot save an empty label!',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                }else if ($('.nonstoreqr:checked').length == 0 && ($('#code').val() == 'QRcode' || $('#code').val() == 'GS1' || $('#code').val() == 'Barcode'))   {
                    Swal.fire({
                        title: 'Unable to save a Barcode without any values',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                } else {
                Swal.fire({
                    title: `${message}`,
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                }).then(function(Confirm) {
                    if (Confirm.isConfirmed) {

                            if ($('#labelcontentorganizationname_label').length != 0) {
                                $('#organizationname_label_style').val($('#labelcontentorganizationname_label')
                                    .css(
                                        'font-weight') + '_' + $(
                                        '#labelcontentorganizationname_label')
                                    .css('font-style') + '_' + $(
                                        '#labelcontentorganizationname_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentorganizationname_label').css('text-align') +
                                    '_' +
                                    $('#labelcontentorganizationname_label').css('font-size') +
                                    '_' + $(
                                        '#labelcontentorganizationname_label').css('font-family') +
                                    '_' + organizationnamefn);
                            }
                            if ($('#labelcontentorganizationname_label').length === 0) {
                                $('.organizationname_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.organizationname_labelposition').val($(
                                        '#labelcontentorganizationname_label').css(
                                        'top') + '_' + $('#labelcontentorganizationname_label')
                                    .css(
                                        'left') + '_' + $('#labelcontentorganizationname_label')
                                    .css(
                                        'height') + '_' + $('#labelcontentorganizationname_label')
                                    .css(
                                        'width') + '_' + $('#labelcontentorganizationname').css(
                                        'width'));
                            }

                            if ($('#labelcontentbatchno_label').length != 0) {
                                $('#batchno_label_style').val($('#labelcontentbatchno_label')
                                    .css(
                                        'font-weight') + '_' + $(
                                        '#labelcontentbatchno_label')
                                    .css('font-style') + '_' + $(
                                        '#labelcontentbatchno_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentbatchno_label').css('text-align') +
                                    '_' +
                                    $('#labelcontentbatchno_label').css('font-size') +
                                    '_' + $(
                                        '#labelcontentbatchno_label').css('font-family') +
                                    '_' + batchnofn);
                            }
                            if ($('#labelcontentbatchno_label').length === 0) {
                                $('.batchno_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.batchno_labelposition').val($(
                                        '#labelcontentbatchno_label').css(
                                        'top') + '_' + $('#labelcontentbatchno_label')
                                    .css(
                                        'left') + '_' + $('#labelcontentbatchno_label')
                                    .css(
                                        'height') + '_' + $('#labelcontentbatchno_label')
                                    .css(
                                        'width') + '_' + $('#labelcontentbatchno').css(
                                        'width'));
                            }

                            if ($('#labelcontentserialno_label').length != 0) {
                                $('#serialno_label_style').val($('#labelcontentserialno_label')
                                    .css(
                                        'font-weight') + '_' + $(
                                        '#labelcontentserialno_label')
                                    .css('font-style') + '_' + $(
                                        '#labelcontentserialno_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentserialno_label').css('text-align') +
                                    '_' +
                                    $('#labelcontentserialno_label').css('font-size') +
                                    '_' + $(
                                        '#labelcontentserialno_label').css('font-family') +
                                    '_' + serialnofn);
                            }
                            if ($('#labelcontentserialno_label').length === 0) {
                                $('.serialno_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.serialno_labelposition').val($(
                                        '#labelcontentserialno_label').css(
                                        'top') + '_' + $('#labelcontentserialno_label')
                                    .css(
                                        'left') + '_' + $('#labelcontentserialno_label')
                                    .css(
                                        'height') + '_' + $('#labelcontentserialno_label')
                                    .css(
                                        'width') + '_' + $('#labelcontentserialno').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductname_label').length != 0) {
                                $('#productname_label_style').val($(
                                        '#labelcontentproductname_label').css(
                                        'font-weight') +
                                    '_' + $('#labelcontentproductname_label').css(
                                        'font-style') + '_' + $(
                                        '#labelcontentproductname_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentproductname_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductname_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductname').css('font-family') +
                                    '_' + productnamefn);
                            }
                            if ($('#labelcontentproductname_label').length === 0) {
                                $('.productname_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.productname_labelposition').val($(
                                        '#labelcontentproductname_label').css('top') +
                                    '_' + $(
                                        '#labelcontentproductname_label').css('left') +
                                    '_' + $(
                                        '#labelcontentproductname_label').css('height') +
                                    '_' +
                                    $('#labelcontentproductname_label').css('width') +
                                    '_' + $(
                                        '#labelcontentproductname').css('width'));
                            }

                            if ($('#labelcontentproductcomments_label').length != 0) {
                                $('#productcomments_label_style').val($(
                                        '#labelcontentproductcomments_label').css(
                                        'font-weight') +
                                    '_' + $('#labelcontentproductcomments_label').css(
                                        'font-style') + '_' + $(
                                        '#labelcontentproductcomments_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentproductcomments_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductcomments_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductcomments_label').css(
                                        'font-family') +
                                    '_' + productcommentsfn);
                            }
                            if ($('#labelcontentproductcomments_label').length === 0) {
                                $('.productcomments_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.productcomments_labelposition').val($(
                                        '#labelcontentproductcomments_label').css('top') +
                                    '_' +
                                    $(
                                        '#labelcontentproductcomments_label').css(
                                        'left') +
                                    '_' + $(
                                        '#labelcontentproductcomments_label').css(
                                        'height') +
                                    '_' +
                                    $('#labelcontentproductcomments_label').css('width') +
                                    '_' +
                                    $(
                                        '#labelcontentproductcomments').css('width'));
                            }

                            if ($('#labelcontentnetweight_label').length != 0) {
                                $('#netweight_label_style').val($(
                                        '#labelcontentnetweight_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentnetweight_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentnetweight_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentnetweight_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentnetweight_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentnetweight_label').css(
                                        'font-family') +'_' + netweightfn);
                            }
                            if ($('#labelcontentnetweight_label').length === 0) {
                                $('.netweight_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.netweight_labelposition').val($(
                                        '#labelcontentnetweight_label')
                                    .css('top') + '_' + $('#labelcontentnetweight_label')
                                    .css(
                                        'left') + '_' + $('#labelcontentnetweight_label')
                                    .css(
                                        'height') + '_' + $(
                                        '#labelcontentnetweight_label').css(
                                        'width') + '_' + $('#labelcontentnetweight').css(
                                        'width'));
                            }
                            if ($('#labelcontentgrossweight_label').length != 0) {
                                $('#grossweight_label_style').val($(
                                        '#labelcontentgrossweight_label').css(
                                        'font-weight') +
                                    '_' + $('#labelcontentgrossweight_label').css(
                                        'font-style') + '_' + $(
                                        '#labelcontentgrossweight_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentgrossweight_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentgrossweight_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentgrossweight_label').css(
                                        'font-family') +
                                    '_' + grossweightfn);
                            }
                            if ($('#labelcontentgrossweight_label').length === 0) {
                                $('.grossweight_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.grossweight_labelposition').val($(
                                        '#labelcontentgrossweight_label').css('top') +
                                    '_' + $(
                                        '#labelcontentgrossweight_label').css('left') +
                                    '_' + $(
                                        '#labelcontentgrossweight_label').css('height') +
                                    '_' +
                                    $('#labelcontentgrossweight_label').css('width') +
                                    '_' + $(
                                        '#labelcontentgrossweight').css('width'));
                            }
                            if ($('#labelcontentproductstaticfield1_label').length != 0) {
                                $('#productstaticfield1_label_style').val($(
                                        '#labelcontentproductstaticfield1_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield1_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield1_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield1_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield1_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield1_label').css(
                                        'font-family') + '_' + productstaticfield1);
                            }
                            if ($('#labelcontentproductstaticfield1_label').length === 0) {
                                $('.productstaticfield1_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield1_labelposition').val($(
                                        '#labelcontentproductstaticfield1_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield1_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield1_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield1_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield1').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield2_label').length != 0) {
                                $('#productstaticfield2_label_style').val($(
                                        '#labelcontentproductstaticfield2_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield2_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield2_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield2_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield2_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield2_label').css(
                                        'font-family') +
                                    '_' + productstaticfield2);
                            }
                            if ($('#labelcontentproductstaticfield2_label').length === 0) {
                                $('.productstaticfield2_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield2_labelposition').val($(
                                        '#labelcontentproductstaticfield2_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield2_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield2_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield2_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield2').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield3_label').length != 0) {
                                $('#productstaticfield3_label_style').val($(
                                        '#labelcontentproductstaticfield3_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield3_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield3_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield3_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield3_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield3_label').css(
                                        'font-family') +
                                    '_' + productstaticfield3);
                            }
                            if ($('#labelcontentproductstaticfield3_label').length === 0) {
                                $('.productstaticfield3_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield3_labelposition').val($(
                                        '#labelcontentproductstaticfield3_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield3_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield3_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield3_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield3').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield4_label').length != 0) {
                                $('#productstaticfield4_label_style').val($(
                                        '#labelcontentproductstaticfield4_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield4_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield4_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield4_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield4_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield4_label').css(
                                        'font-family') +
                                    '_' + productstaticfield4);
                            }
                            if ($('#labelcontentproductstaticfield4_label').length === 0) {
                                $('.productstaticfield4_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield4_labelposition').val($(
                                        '#labelcontentproductstaticfield4_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield4_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield4_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield4_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield4').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield5_label').length != 0) {
                                $('#productstaticfield5_label_style').val($(
                                        '#labelcontentproductstaticfield5_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield5_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield5_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield5_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield5_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield5_label').css(
                                        'font-family') +
                                    '_' + productstaticfield5);
                            }
                            if ($('#labelcontentproductstaticfield5_label').length === 0) {
                                $('.productstaticfield5_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield5_labelposition').val($(
                                        '#labelcontentproductstaticfield5_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield5_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield5_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield5_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield5').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield6_label').length != 0) {
                                $('#productstaticfield6_label_style').val($(
                                        '#labelcontentproductstaticfield6_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield6_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield6_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield6_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield6_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield6_label').css(
                                        'font-family') +
                                    '_' + productstaticfield6);
                            }
                            if ($('#labelcontentproductstaticfield6_label').length === 0) {
                                $('.productstaticfield6_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield6_labelposition').val($(
                                        '#labelcontentproductstaticfield6_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield6_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield6_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield6_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield6').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield7_label').length != 0) {
                                $('#productstaticfield7_label_style').val($(
                                        '#labelcontentproductstaticfield7_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield7_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield7_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield7_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield7_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield7_label').css(
                                        'font-family') +
                                    '_' + productstaticfield7);
                            }
                            if ($('#labelcontentproductstaticfield7_label').length === 0) {
                                $('.productstaticfield7_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield7_labelposition').val($(
                                        '#labelcontentproductstaticfield7_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield7_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield7_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield7_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield7').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield8_label').length != 0) {
                                $('#productstaticfield8_label_style').val($(
                                        '#labelcontentproductstaticfield8_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield8_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield8_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield8_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield8_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield8_label').css(
                                        'font-family') +
                                    '_' + productstaticfield8);
                            }
                            if ($('#labelcontentproductstaticfield8_label').length === 0) {
                                $('.productstaticfield8_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield8_labelposition').val($(
                                        '#labelcontentproductstaticfield8_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield8_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield8_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield8_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield8').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield9_label').length != 0) {
                                $('#productstaticfield9_label_style').val($(
                                        '#labelcontentproductstaticfield9_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield9_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield9_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield9_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield9_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductstaticfield9_label').css(
                                        'font-family') +
                                    '_' + productstaticfield9);
                            }
                            if ($('#labelcontentproductstaticfield9_label').length === 0) {
                                $('.productstaticfield9_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield9_labelposition').val($(
                                        '#labelcontentproductstaticfield9_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield9_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield9_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield9_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield9').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductstaticfield10_label').length != 0) {
                                $('#productstaticfield10_label_style').val($(
                                        '#labelcontentproductstaticfield10_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductstaticfield10_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentproductstaticfield10_label')
                                    .css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductstaticfield10_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentproductstaticfield10_label')
                                    .css('font-size') +
                                    '_' + $('#labelcontentproductstaticfield10_label')
                                    .css('font-family') +
                                    '_' + productstaticfield10);
                            }
                            if ($('#labelcontentproductstaticfield10_label').length === 0) {
                                $('.productstaticfield10_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.productstaticfield10_labelposition').val($(
                                        '#labelcontentproductstaticfield10_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentproductstaticfield10_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentproductstaticfield10_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentproductstaticfield10_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentproductstaticfield10').css(
                                        'width'));
                            }

                            if ($('#labelcontentbatchstaticfield1_label').length != 0) {
                                $('#batchstaticfield1_label_style').val($(
                                        '#labelcontentbatchstaticfield1_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentbatchstaticfield1_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentbatchstaticfield1_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentbatchstaticfield1_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentbatchstaticfield1_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentbatchstaticfield1_label').css(
                                        'font-family') +
                                    '_' + batchstaticfield1);
                            }
                            if ($('#labelcontentbatchstaticfield1_label').length === 0) {
                                $('.batchstaticfield1_labelposition').val(
                                '0px_0px_0px_0px_0px');
                            } else {
                                $('.batchstaticfield1_labelposition').val($(
                                        '#labelcontentbatchstaticfield1_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentbatchstaticfield1_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentbatchstaticfield1_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentbatchstaticfield1_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentbatchstaticfield1').css(
                                        'width'));
                            }

                            if ($('#labelcontentbatchstaticfield2_label').length != 0) {
                                $('#batchstaticfield2_label_style').val($(
                                        '#labelcontentbatchstaticfield2_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentbatchstaticfield2_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentbatchstaticfield2_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentbatchstaticfield2_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentbatchstaticfield2_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentbatchstaticfield2_label').css(
                                        'font-family') +
                                    '_' + batchstaticfield2);
                            }
                            if ($('#labelcontentbatchstaticfield2_label').length === 0) {
                                $('.batchstaticfield2_labelposition').val(
                                '0px_0px_0px_0px_0px');
                            } else {
                                $('.batchstaticfield2_labelposition').val($(
                                        '#labelcontentbatchstaticfield2_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentbatchstaticfield2_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentbatchstaticfield2_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentbatchstaticfield2_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentbatchstaticfield2').css(
                                        'width'));
                            }

                            if ($('#labelcontentbatchstaticfield3_label').length != 0) {
                                $('#batchstaticfield3_label_style').val($(
                                        '#labelcontentbatchstaticfield3_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentbatchstaticfield3_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentbatchstaticfield3_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentbatchstaticfield3_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentbatchstaticfield3_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentbatchstaticfield3_label').css(
                                        'font-family') +
                                    '_' + batchstaticfield3);
                            }
                            if ($('#labelcontentbatchstaticfield3_label').length === 0) {
                                $('.batchstaticfield3_labelposition').val(
                                '0px_0px_0px_0px_0px');
                            } else {
                                $('.batchstaticfield3_labelposition').val($(
                                        '#labelcontentbatchstaticfield3_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentbatchstaticfield3_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentbatchstaticfield3_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentbatchstaticfield3_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentbatchstaticfield3').css(
                                        'width'));
                            }

                            if ($('#labelcontentbatchstaticfield4_label').length != 0) {
                                $('#batchstaticfield4_label_style').val($(
                                        '#labelcontentbatchstaticfield4_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentbatchstaticfield4_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentbatchstaticfield4_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentbatchstaticfield4_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentbatchstaticfield4_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentbatchstaticfield4_label').css(
                                        'font-family') +
                                    '_' + batchstaticfield4);
                            }
                            if ($('#labelcontentbatchstaticfield4_label').length === 0) {
                                $('.batchstaticfield4_labelposition').val(
                                '0px_0px_0px_0px_0px');
                            } else {
                                $('.batchstaticfield4_labelposition').val($(
                                        '#labelcontentbatchstaticfield4_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentbatchstaticfield4_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentbatchstaticfield4_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentbatchstaticfield4_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentbatchstaticfield4').css(
                                        'width'));
                            }

                            if ($('#labelcontentbatchstaticfield5_label').length != 0) {
                                $('#batchstaticfield5_label_style').val($(
                                        '#labelcontentbatchstaticfield5_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentbatchstaticfield5_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentbatchstaticfield5_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentbatchstaticfield5_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentbatchstaticfield5_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentbatchstaticfield5_label').css(
                                        'font-family') +
                                    '_' + batchstaticfield5);
                            }
                            if ($('#labelcontentbatchstaticfield5_label').length === 0) {
                                $('.batchstaticfield5_labelposition').val(
                                '0px_0px_0px_0px_0px');
                            } else {
                                $('.batchstaticfield5_labelposition').val($(
                                        '#labelcontentbatchstaticfield5_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentbatchstaticfield5_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentbatchstaticfield5_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentbatchstaticfield5_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentbatchstaticfield5').css(
                                        'width'));
                            }

                            if ($('#labelcontentdynamicfield1_label').length != 0) {
                                $('#dynamicfield1_label_style').val($(
                                        '#labelcontentdynamicfield1_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentdynamicfield1_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentdynamicfield1_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentdynamicfield1_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentdynamicfield1_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentdynamicfield1_label').css(
                                        'font-family') +
                                    '_' + dynamicfield1);
                            }
                            if ($('#labelcontentdynamicfield1_label').length === 0) {
                                $('.dynamicfield1_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.dynamicfield1_labelposition').val($(
                                        '#labelcontentdynamicfield1_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentdynamicfield1_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentdynamicfield1_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentdynamicfield1_label').css(
                                        'width') + '_' + $('#labelcontentdynamicfield1')
                                    .css(
                                        'width'));
                            }

                            if ($('#labelcontentdynamicfield2_label').length != 0) {
                                $('#dynamicfield2_label_style').val($(
                                        '#labelcontentdynamicfield2_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentdynamicfield2_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentdynamicfield2_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentdynamicfield2_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentdynamicfield2_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentdynamicfield2_label').css(
                                        'font-family') +
                                    '_' + dynamicfield1);
                            }
                            if ($('#labelcontentdynamicfield2_label').length === 0) {
                                $('.dynamicfield2_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.dynamicfield2_labelposition').val($(
                                        '#labelcontentdynamicfield2_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentdynamicfield2_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentdynamicfield2_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentdynamicfield2_label').css(
                                        'width') + '_' + $('#labelcontentdynamicfield2')
                                    .css(
                                        'width'));
                            }

                            if ($('#labelcontentglobalstaticfield1_label').length != 0) {
                                $('#globalstaticfield1_label_style').val($(
                                        '#labelcontentglobalstaticfield1_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentglobalstaticfield1_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentglobalstaticfield1_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentglobalstaticfield1_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentglobalstaticfield1_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentglobalstaticfield1_label').css(
                                        'font-family') +
                                    '_' + globalstaticfield1);
                            }
                            if ($('#labelcontentglobalstaticfield1_label').length === 0) {
                                $('.globalstaticfield1_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.globalstaticfield1_labelposition').val($(
                                        '#labelcontentglobalstaticfield1_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentglobalstaticfield1_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentglobalstaticfield1_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentglobalstaticfield1_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentglobalstaticfield1').css(
                                        'width'));
                            }

                            if ($('#labelcontentglobalstaticfield2_label').length != 0) {
                                $('#globalstaticfield2_label_style').val($(
                                        '#labelcontentglobalstaticfield2_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentglobalstaticfield2_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentglobalstaticfield2_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentglobalstaticfield2_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentglobalstaticfield2_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentglobalstaticfield2_label').css(
                                        'font-family') +
                                    '_' + globalstaticfield2);
                            }
                            if ($('#labelcontentglobalstaticfield2_label').length === 0) {
                                $('.globalstaticfield2_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.globalstaticfield2_labelposition').val($(
                                        '#labelcontentglobalstaticfield2_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentglobalstaticfield2_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentglobalstaticfield2_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentglobalstaticfield2_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentglobalstaticfield2').css(
                                        'width'));
                            }

                            if ($('#labelcontentdateofmanufacture_label').length != 0) {
                                $('#dateofmanufacture_label_style').val($(
                                        '#labelcontentdateofmanufacture_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentdateofmanufacture_label').css(
                                        'font-style') +
                                    '_' + $('#labelcontentdateofmanufacture_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentdateofmanufacture_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentdateofmanufacture_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentdateofmanufacture_label').css(
                                        'font-family') +
                                    '_' + dateofmanufacturefn);
                            }
                            if ($('#labelcontentdateofmanufacture_label').length === 0) {
                                $('.dateofmanufacture_labelposition').val(
                                '0px_0px_0px_0px_0px');
                            } else {
                                $('.dateofmanufacture_labelposition').val($(
                                        '#labelcontentdateofmanufacture_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentdateofmanufacture_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentdateofmanufacture_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentdateofmanufacture_label').css(
                                        'width') + '_' + $(
                                        '#labelcontentdateofmanufacture').css(
                                        'width'));
                            }

                            if ($('#labelcontentdateofexp_label').length != 0) {
                                $('#dateofexp_label_style').val($(
                                        '#labelcontentdateofexp_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentdateofexp_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentdateofexp_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentdateofexp_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentdateofexp_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentdateofexp_label').css(
                                        'font-family') +
                                    '_' + dateofexpfn);
                            }
                            if ($('#labelcontentdateofexp_label').length === 0) {
                                $('.dateofexp_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.dateofexp_labelposition').val($(
                                        '#labelcontentdateofexp_label')
                                    .css('top') + '_' + $('#labelcontentdateofexp_label')
                                    .css(
                                        'left') + '_' + $('#labelcontentdateofexp_label')
                                    .css(
                                        'height') + '_' + $(
                                        '#labelcontentdateofexp_label').css(
                                        'width') + '_' + $('#labelcontentdateofexp').css(
                                        'width'));
                            }

                            if ($('#labelcontentproductid_label').length != 0) {
                                $('#productid_label_style').val($(
                                        '#labelcontentproductid_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentproductid_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentproductid_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentproductid_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentproductid_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentproductid_label').css(
                                        'font-family') +
                                    '_' + productidfn);
                            }
                            if ($('#labelcontentproductid_label').length === 0) {
                                $('.productid_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.productid_labelposition').val($(
                                        '#labelcontentproductid_label')
                                    .css('top') + '_' + $('#labelcontentproductid_label')
                                    .css(
                                        'left') + '_' + $('#labelcontentproductid_label')
                                    .css(
                                        'height') + '_' + $(
                                        '#labelcontentproductid_label').css(
                                        'width') + '_' + $('#labelcontentproductid').css(
                                        'width'));
                            }

                            if ($('#labelcontenttareweight_label').length != 0) {
                                $('#tareweight_label_style').val($(
                                        '#labelcontenttareweight_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontenttareweight_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontenttareweight_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontenttareweight_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontenttareweight_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontenttareweight_label').css(
                                        'font-family') +
                                    '_' + tareweightfn);
                            }
                            if ($('#labelcontenttareweight_label').length === 0) {
                                $('.tareweight_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.tareweight_labelposition').val($(
                                        '#labelcontenttareweight_label').css('top') +
                                    '_' + $(
                                        '#labelcontenttareweight_label').css('left') +
                                    '_' + $(
                                        '#labelcontenttareweight_label').css('height') +
                                    '_' +
                                    $('#labelcontenttareweight_label').css('width') +
                                    '_' + $(
                                        '#labelcontenttareweight').css('width'));
                            }

                            if ($('#labelcontentdateofretest_label').length != 0) {
                                $('#dateofretest_label_style').val($(
                                        '#labelcontentdateofretest_label').css(
                                        'font-weight') +
                                    '_' + $('#labelcontentdateofretest_label').css(
                                        'font-style') + '_' + $(
                                        '#labelcontentdateofretest_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentdateofretest_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentdateofretest_label').css(
                                        'font-size') + '_' + $(
                                        '#labelcontentdateofretest_label')
                                    .css('font-family') +
                                    '_' + dateofretestfn);
                            }
                            if ($('#labelcontentdateofretest_label').length === 0) {
                                $('.dateofretest_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.dateofretest_labelposition').val($(
                                        '#labelcontentdateofretest_label').css('top') +
                                    '_' + $(
                                        '#labelcontentdateofretest_label').css('left') +
                                    '_' +
                                    $('#labelcontentdateofretest_label').css('height') +
                                    '_' +
                                    $('#labelcontentdateofretest_label').css('width') +
                                    '_' + $(
                                        '#labelcontentdateofretest').css('width'));
                            }

                            if ($('#labelcontentcontainerno_label').length != 0) {
                                $('#containerno_label_style').val($(
                                        '#labelcontentcontainerno_label').css(
                                        'font-weight') + '_' + $(
                                        '#labelcontentcontainerno_label')
                                    .css('font-style') + '_' + $(
                                        '#labelcontentcontainerno_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentcontainerno_label').css(
                                        'text-align') + '_' +
                                    $('#labelcontentcontainerno_label').css('font-size') +
                                    '_' + $(
                                        '#labelcontentcontainerno_label').css(
                                        'font-family') +
                                    '_' + containernofn);
                            }
                            if ($('#labelcontentcontainerno_label').length === 0) {
                                $('.containerno_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.containerno_labelposition').val($(
                                        '#labelcontentcontainerno_label')
                                    .css('top') + '_' + $(
                                        '#labelcontentcontainerno_label').css(
                                        'left') + '_' + $(
                                        '#labelcontentcontainerno_label').css(
                                        'height') + '_' + $(
                                        '#labelcontentcontainerno_label').css(
                                        'width') + '_' + $('#labelcontentcontainerno')
                                    .css('width')
                                );
                            }

                            if ($('#labelcontentFreefield1_label').length != 0) {
                                $('#Freefield1_label_style').val($(
                                        '#labelcontentFreefield1_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield1_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield1_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield1_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield1_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield1_label').css(
                                        'font-family') +
                                    '_' + freefield1);
                            }
                            if ($('#labelcontentFreefield1_label').length === 0) {
                                $('.Freefield1_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield1_labelposition').val($(
                                        '#labelcontentFreefield1_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield1_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield1_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield1_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield1').css('width'));
                            }

                            if ($('#labelcontentFreefield2_label').length != 0) {
                                $('#Freefield2_label_style').val($(
                                        '#labelcontentFreefield2_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield2_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield2_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield2_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield2_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield2_label').css(
                                        'font-family') +
                                    '_' + freefield2);
                            }
                            if ($('#labelcontentFreefield2_label').length === 0) {
                                $('.Freefield2_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield2_labelposition').val($(
                                        '#labelcontentFreefield2_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield2_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield2_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield2_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield2').css('width'));
                            }

                            if ($('#labelcontentFreefield3_label').length != 0) {
                                $('#Freefield3_label_style').val($(
                                        '#labelcontentFreefield3_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield3_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield3_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield3_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield3_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield3_label').css(
                                        'font-family') +
                                    '_' + freefield3);
                            }
                            if ($('#labelcontentFreefield3_label').length === 0) {
                                $('.Freefield3_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield3_labelposition').val($(
                                        '#labelcontentFreefield3_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield3_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield3_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield3_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield3').css('width'));
                            }

                            if ($('#labelcontentFreefield4_label').length != 0) {
                                $('#Freefield4_label_style').val($(
                                        '#labelcontentFreefield4_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield4_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield4_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield4_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield4_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield4_label').css(
                                        'font-family') +
                                    '_' + freefield4);
                            }
                            if ($('#labelcontentFreefield4_label').length === 0) {
                                $('.Freefield4_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield4_labelposition').val($(
                                        '#labelcontentFreefield4_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield4_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield4_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield4_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield4').css('width'));
                            }

                            if ($('#labelcontentFreefield5_label').length != 0) {
                                $('#Freefield5_label_style').val($(
                                        '#labelcontentFreefield5_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield5_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield5_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield5_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield5_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield5_label').css(
                                        'font-family') +
                                    '_' + freefield5);
                            }
                            if ($('#labelcontentFreefield5_label').length === 0) {
                                $('.Freefield5_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield5_labelposition').val($(
                                        '#labelcontentFreefield5_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield5_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield5_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield5_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield5').css('width'));
                            }

                            if ($('#labelcontentFreefield6_label').length != 0) {
                                $('#Freefield6_label_style').val($(
                                        '#labelcontentFreefield6_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield6_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield6_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield6_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield6_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield6_label').css(
                                        'font-family') +
                                    '_' + freefield6);
                            }
                            if ($('#labelcontentFreefield6_label').length === 0) {
                                $('.Freefield6_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield6_labelposition').val($(
                                        '#labelcontentFreefield6_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield6_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield6_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield6_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield6').css('width'));
                            }

                            if ($('#labelcontentFreefield7_label').length != 0) {
                                $('#Freefield7_label_style').val($(
                                        '#labelcontentFreefield7_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield7_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield7_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield7_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield7_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield7_label').css(
                                        'font-family') +
                                    '_' + freefield7);
                            }
                            if ($('#labelcontentFreefield7_label').length === 0) {
                                $('.Freefield7_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield7_labelposition').val($(
                                        '#labelcontentFreefield7_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield7_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield7_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield7_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield7').css('width'));
                            }

                            if ($('#labelcontentFreefield8_label').length != 0) {
                                $('#Freefield8_label_style').val($(
                                        '#labelcontentFreefield8_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield8_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield8_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield8_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield8_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield8_label').css(
                                        'font-family') +
                                    '_' + freefield8);
                            }
                            if ($('#labelcontentFreefield8_label').length === 0) {
                                $('.Freefield8_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield8_labelposition').val($(
                                        '#labelcontentFreefield8_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield8_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield8_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield8_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield8').css('width'));
                            }
                            if ($('#labelcontentFreefield9_label').length != 0) {
                                $('#Freefield9_label_style').val($(
                                        '#labelcontentFreefield9_label')
                                    .css('font-weight') + '_' + $(
                                        '#labelcontentFreefield9_label').css(
                                    'font-style') +
                                    '_' + $('#labelcontentFreefield9_label').css(
                                        'text-decoration') + '_' + $(
                                        '#labelcontentFreefield9_label').css(
                                    'text-align') +
                                    '_' + $('#labelcontentFreefield9_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentFreefield9_label').css(
                                        'font-family') +
                                    '_' + freefield9);
                            }
                            if ($('#labelcontentFreefield9_label').length === 0) {
                                $('.Freefield9_labelposition').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.Freefield9_labelposition').val($(
                                        '#labelcontentFreefield9_label').css('top') +
                                    '_' + $(
                                        '#labelcontentFreefield9_label').css('left') +
                                    '_' + $(
                                        '#labelcontentFreefield9_label').css('height') +
                                    '_' +
                                    $('#labelcontentFreefield9_label').css('width') +
                                    '_' + $(
                                        '#labelcontentFreefield9').css('width'));
                            }



                            if ($('#labelcontentlabelstaticfield1_label').length != 0) {
                                $('#labelstaticfield1_label_style').val($(
                                        '#labelcontentlabelstaticfield1_label').css(
                                        'font-weight') +
                                    '_' + $('#labelcontentlabelstaticfield1_label').css(
                                        'font-style') + '_' + $(
                                        '#labelcontentlabelstaticfield1_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentlabelstaticfield1_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentlabelstaticfield1_label').css(
                                        'font-size') +
                                    '_' + $('#labelcontentlabelstaticfield1_label').css(
                                        'font-family') +
                                    '_' + labelstaticfield1
                                );
                            }
                            if ($('#labelcontentlabelstaticfield1_label').length === 0) {
                                $('.labelstaticfield1_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.labelstaticfield1_labelposition').val($(
                                        '#labelcontentlabelstaticfield1_label').css(
                                        'top') + '_' +
                                    $(
                                        '#labelcontentlabelstaticfield1_label').css(
                                        'left') +
                                    '_' + $(
                                        '#labelcontentlabelstaticfield1_label').css(
                                        'height') +
                                    '_' +
                                    $('#labelcontentlabelstaticfield1_label').css(
                                        'width') + '_' +
                                    $(
                                        '#labelcontentlabelstaticfield1').css('width'));
                            }

                            if ($('#labelcontentlabelstaticfield2_label').length != 0) {
                                $('#labelstaticfield2_label_style').val($(
                                        '#labelcontentlabelstaticfield2_label').css(
                                        'font-weight') +
                                    '_' + $('#labelcontentlabelstaticfield2_label').css(
                                        'font-style') + '_' + $(
                                        '#labelcontentlabelstaticfield2_label')
                                    .css('text-decoration') + '_' + $(
                                        '#labelcontentlabelstaticfield2_label').css(
                                        'text-align') +
                                    '_' + $('#labelcontentlabelstaticfield2_label').css(
                                        'font-size') + '_' + $(
                                        '#labelcontentlabelstaticfield2_label')
                                    .css('font-family') +
                                    '_' + labelstaticfield2);
                            }
                            if ($('#labelcontentlabelstaticfield2_label').length === 0) {
                                $('.labelstaticfield2_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                            } else {
                                $('.labelstaticfield2_labelposition').val($(
                                        '#labelcontentlabelstaticfield2_label').css(
                                        'top') +
                                    '_' + $(
                                        '#labelcontentlabelstaticfield2_label').css(
                                        'left') +
                                    '_' +
                                    $('#labelcontentlabelstaticfield2_label').css(
                                        'height') +
                                    '_' +
                                    $('#labelcontentlabelstaticfield2_label').css(
                                        'width') +
                                    '_' + $(
                                        '#labelcontentlabelstaticfield2').css('width'));
                            }
                            if ($('#code_position_label').length != 0) {
                                $('#code_position_label').val($('#code_position_label')
                                    .css('font-weight') + '_' + $(
                                        '#code_position_label').css('font-style') +
                                    '_' + $('#code_position_label').css(
                                        'text-decoration') + '_' + $(
                                        '#code_position_label').css('text-align') +
                                    '_' + $('#code_position_label').css('font-size') +
                                    '_' + $('#code_position').css('font-family'));
                            }
                            if ($('#code_position_label').length === 0) {
                                $('.code_position').val('0px_0px_0px_0px_0px');
                            } else {
                                $('.code_position').val($('#code_position_label')
                                    .css('top') + '_' + $('#code_position_label').css(
                                        'left') + '_' + $('#code_position_label').css(
                                        'height') + '_' + $('#code_position_label').css(
                                        'width') + '_' + $('#code_position').css(
                                        'width'));
                            }
                            $('.Qr_nonstore_labelposition').val($('#span_QRcode_nonstore').css(
                                'top') + '_' + $('#span_QRcode_nonstore').css('left'));

                            $("#num").val($("#codeName").css("height") + "_" + $("#codeName").css("width"));
                            $('.inner-Qr_nonstore_labelposition').val($(
                                '#inner-span_QRcode_nonstore').css('top') + '_' + $(
                                '#inner-span_QRcode_nonstore').css('left'));

                            if($("#global_image1").length != 0 && $("#global_image1").is(":visible") == true){
                            $(".globalimage1_labelposition").val($("#global_image1").css("top") + "_" + $("#global_image1").css("left") + "_" + $("#global_image1_img").css("height") + "_" + $("#global_image1_img").css("width"));
                            }
                            else{
                                $(".globalimage1_labelposition").val("0px_0px_0px_0px");
                            }

                            if($("#global_image2").length != 0 && $("#global_image2").is(":visible") == true){
                                $(".globalimage2_labelposition").val($("#global_image2").css("top") + "_" + $("#global_image2").css("left") + "_" + $("#global_image2_img").css("height") + "_" + $("#global_image2_img").css("width"));
                            }
                            else{
                                $(".globalimage2_labelposition").val("0px_0px_0px_0px");
                            }

                            if($("#label_image1").length != 0 && $("#label_image1").is(":visible") == true){
                                $(".labelimage1_labelposition").val($("#label_image1").css("top") + "_" + $("#label_image1").css("left") + "_" + $("#label_image1_img").css("height") + "_" + $("#label_image1_img").css("width"));
                            }
                            else{
                                $(".labelimage1_labelposition").val("0px_0px_0px_0px");
                            }

                            if($("#label_image2").length != 0 && $("#label_image2").is(":visible") == true){
                                $(".labelimage2_labelposition").val($("#label_image2").css("top") + "_" + $("#label_image2").css("left") + "_" + $("#label_image2_img").css("height") + "_" + $("#label_image2_img").css("width"));
                            }
                            else{
                                $(".labelimage2_labelposition").val("0px_0px_0px_0px");
                            }
                            let lineElements = $('.textnonstore.lines');
                            lineElements.each(function() {
                                        saveLinePosition(this);
                                    });
                            let jsonData = JSON.stringify(linesData);

                            $('.linesData').val(jsonData);

                        $('#formId').attr('action', '/labelupdate/{{ $shipper_print->id }}');
                        $('#formId').attr('method', 'post');
                        $('#formId').submit();
                    }
                });


            }
        });

        var metalabel = @json($config_data);
                // -------------- non-store ------------
        $('.nonstore').click(function() {
                $('#save').prop('disabled', false);
                var idPrefix_Labeltype = 'labelcontent';
                if ($('#' + this.id).is(':checked') == true) {
                    var count = 1;
                    $.map($('#' + idPrefix_Labeltype).find('.textnonstore'), function(el) {
                        count++;
                    });
                    if (count === $('.nonstore').length) {
                        $('#selectall').prop('checked', true);
                    } else {
                        $('#selectall').prop('checked', false);
                    }

                    if (this.id == 'productname') {

                        if (!$('#productnamefn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 36.9922px; top: 80.9922px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productname"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXXXX</span>
                            </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 36.9922px; top: 80.9922px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productname" style="display:inline-block ; white-space: nowrap;">${metalabel.product_name}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXXXX</span>
                            </span>`);
                        }
                        } else if (this.id == 'productcomments') {

                            if (!$('#productcommentsfn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 40.9981px; top: 107.996px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productcomments"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX</span>
                            </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 40.9981px; top: 107.996px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productcomments" style="display:inline-block ; white-space: nowrap;">${metalabel.comments}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                            </span>`);
                            }
                            } else if (this.id == 'organizationname') {

                            if (!$('#organizationnamefn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:43px; top:134px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}organizationname"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>${metalabel.organization_name}</span>
                                </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:43px; top:134px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}organizationname" style="display:inline-block ; white-space: nowrap;">Company Name</span><span style="color:#ff5454"><span class="delimiter"> :</span> ${metalabel.organization_name}</span>
                                </span>`);
                            }
                            } else if (this.id == 'batchno') {

                            if (!$('#batchnofn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:197px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchno"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span> XXXXX</span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:197px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchno" style="display:inline-block ; white-space: nowrap;">${metalabel.batch_number}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                </span>`);
                            }
                            }else if (this.id == 'serialno') {

                            if (!$('#serialnofn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:336px; top:130px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}serialno"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span> XXXXX</span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:336px; top:130px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}serialno" style="display:inline-block ; white-space: nowrap;">${metalabel.serialno}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                </span>`);
                            }
                            } else if (this.id == 'netweight') {

                            if (!$('#netweightfn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:358px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}netweight"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span> XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:358px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}netweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.net_weight}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                </span>`);
                            }
                            } else if (this.id == 'productid') {

                            if (!$('#productidfn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:166px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productid"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span> XXXXX</span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:166px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productid" style="display:inline-block ; white-space: nowrap;"> ${metalabel.product_id}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX</span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield1') {

                            if (!$('#productstaticfield1fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield1"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field1}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield2') {

                            if (!$('#productstaticfield2fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield2"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field2}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield3') {

                            if (!$('#productstaticfield3fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:184px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield3"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:184px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield3" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field3}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield4') {

                            if (!$('#productstaticfield4fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:204px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield4"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:204px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield4" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field4}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield5') {

                            if (!$('#productstaticfield5fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:224px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield5"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:224px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield5" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field5}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield6') {

                            if (!$('#productstaticfield6fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:244px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:244px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field6}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield7') {

                            if (!$('#productstaticfield7fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:264px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield7"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:264px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield7" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field7}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield8') {

                            if (!$('#productstaticfield8fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:284px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield8"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:284px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield8" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field8}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield9') {

                            if (!$('#productstaticfield9fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:304px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield9"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:304px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield9" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field9}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'productstaticfield10') {

                            if (!$('#productstaticfield10fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:324px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield10"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:324px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield10" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field10}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'batchstaticfield1') {

                            if (!$('#batchstaticfield1fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:344px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield1"  style="display:inline-block; white-space: nowrap;"></span> <span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:344px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field1}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'batchstaticfield2') {

                            if (!$('#batchstaticfield2fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:364px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield2"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:364px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field2}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'batchstaticfield3') {

                            if (!$('#batchstaticfield3fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:384px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield3"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:384px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield3" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field3}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'batchstaticfield4') {

                            if (!$('#batchstaticfield4fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:404px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield4"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:404px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield4" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field4}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'batchstaticfield5') {

                            if (!$('#batchstaticfield5fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:424px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield5"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:424px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield5" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field5}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'dynamicfield1') {

                            if (!$('#dynamicfield1fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:444px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield1"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:444px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.dynamic_field1}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'dynamicfield2') {

                            if (!$('#dynamicfield2fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:464px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield2"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:464px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.dynamic_field2}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'globalstaticfield1') {

                            if (!$('#globalstaticfield1fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:left:337px; top:414px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield1"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>${metalabel.global_fieldname1} </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:414px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.global_static_field1}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> ${metalabel.global_fieldname1} </span>
                                </span>`);
                            }
                            } else if (this.id == 'globalstaticfield2') {

                            if (!$('#globalstaticfield2fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:440px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield2"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>${metalabel.global_fieldname2} </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:440px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.global_static_field2}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> ${metalabel.global_fieldname2} </span>
                                </span>`);
                            }
                            } else if (this.id == 'grossweight') {

                            if (!$('#grossweightfn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:326px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}grossweight"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX</span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:326px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}grossweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.gross_weight}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXX</span>
                                </span>`);
                            }
                            } else if (this.id == 'tareweight') {

                            if (!$('#tareweightfn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:387px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}tareweight"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX</span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:387px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}tareweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.tare_weight}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'dateofretest') {

                            if (!$('#dateofretestfn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:225px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofretest"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX  </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:225px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofretest" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_retest}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'dateofmanufacture') {

                            if (!$('#dateofmanufacturefn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:256px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofmanufacture"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX</span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:256px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofmanufacture" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_manufacturing}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX</span>
                                </span>`);
                            }
                            } else if (this.id == 'dateofexp') {

                            if (!$('#dateofexpfn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:292px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofexp"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:292px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofexp" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_expiry}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX</span>
                                </span>`);
                            }
                            } else if (this.id == 'containerno') {

                            if (!$('#containernofn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:191px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}containerno"  style="display:inline-block; white-space: nowrap;"></span><span style="color:#ff5454"> <span class="delimiter"></span>XXXXX </span>
                                </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:191px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}containerno" style="display:inline-block ; white-space: nowrap;"> ${metalabel.container_no}</span><span style="color:#ff5454"> <span class="delimiter"> :</span> XXXXX</span>
                                </span>`);
                            }
                            } else if (this.id == 'labelstaticfield1') {

                            var val = $('#labelstaticfield1_input').val();
                            var fieldValue = $('#Staticfield_name_input')
                                .val(); // Get the value of the element with id "Staticfield_name_input"
                            if (!$('#labelstaticfield1fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: nowrap;left:46px; top:416px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield1"  style="display:inline-block;white-space: nowrap;"></span> <span class="labelstaticfield1 fieldvalue" style="white-space: pre-line;">  </span>
                            </span>`);

                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: nowrap;left:46px; top:416px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield1"  style="display:inline-block;white-space: nowrap;"> {{ $config_data->label_static_field1 }}</span> <span class="labelstaticfield1 fieldvalue" style="white-space: pre-line;"><span class="delimiter"> :</span> ${val}</span>
                            </span>`
                                );
                            }

                            $('#labelstaticfield1_label .fieldvalue').text($('#labelstaticfield1_input').val());
                            }
                             else if (this.id == 'labelstaticfield2') {

                            var val2 = $('#labelstaticfield2_input').val();
                            var fieldValue = $('#Staticfield2_name_input')
                                .val(); // Get the value of the element with id "Staticfield2_name_input"
                            if (!$('#labelstaticfield2fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: nowrap;left:46px; top:450px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield2"  style="display:inline-block;white-space: nowrap;"></span> <span class="labelstaticfield2 fieldvalue" style="white-space: pre-line;"></span>
                            </span>`
                                );
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: nowrap;left:46px; top:450px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield2"  style="display:inline-block;white-space: nowrap;">{{ $config_data->label_static_field2 }}</span> <span class="labelstaticfield2 fieldvalue" style="white-space: pre-line;"><span class="delimiter"> :</span> ${val2}</span>
                            </span>`
                                );
                            }
                            $('#labelstaticfield2_label .fieldvalue').text($('#labelstaticfield2_input').val());
                            } else if (this.id == 'Staticfield7') {
                            var fieldValue = $('#Staticfield7_name_input').val();
                            var imageSrc = "/images/image2.jpeg"; // path image

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield7_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:502px; top:18px; position:absolute;">
                                    <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield7" style="display:inline-block;"></span>
                                    <span id="Staticfield7_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
                                        <img src="" alt="Image1" style="width: 0.7in; height: 0.7in;" />
                                    </span>
                                </span>`
                            )
                            $('#labelimage').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    var imageSrc = e.target.result;
                                    $('#' + idPrefix_Labeltype + 'Staticfield7_label img').attr(
                                        'src', imageSrc);
                                }

                                reader.readAsDataURL(file);

                            });
                            } else if (this.id == 'Staticfield8') {
                            var fieldValue = $('#Staticfield8_name_input').val();
                            var imageSrc = "/images/image2.jpeg"; // path image

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield8_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:502px; top:58px; position:absolute;">
                                    <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield8" style="display:inline-block;"></span>
                                    <span id="Staticfield8_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
                                        <img src="" alt="Image2" style="width: 0.7in; height: 0.7in;" />
                                    </span>
                                </span>`
                            );
                            $('#labelimage2').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    var imageSrc = e.target.result;
                                    $('#' + idPrefix_Labeltype + 'Staticfield8_label img').attr(
                                        'src', imageSrc);
                                }

                                reader.readAsDataURL(file);

                            });

                            } else if (this.id == 'Freefield1') {

                            var field1Value = $('#Freefield1_name_input')
                                .val();
                            if (!$('#Freefield1fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:219px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield1"  style="display:inline-block; white-space:nowrap;"></span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:219px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield1"  style="display:inline-block; white-space:nowrap;">${field1Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            }

                            } else if (this.id == 'Freefield2') {

                            var field2Value = $('#Freefield2_name_input')
                                .val(); // Get the value of the element with id Freefield1_name_input
                            if (!$('#Freefield2fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:251px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield2"  style="display:inline-block; white-space:nowrap;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                                </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:251px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield2"  style="display:inline-block; white-space:nowrap;">${field2Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                                </span>`);
                            }
                            } else if (this.id == 'Freefield3') {
                            var field3Value = $('#Freefield3_name_input').val();

                            if (!$('#Freefield3fn').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:289px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield3"  style="display:inline-block; white-space:nowrap;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                                </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:289px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield3"  style="display:inline-block; white-space:nowrap;">${field3Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                                </span>`);
                            }

                            } else if (this.id == 'Freefield4') {
                            var field4Value = $('#Freefield4_name_input').val();
                            if (!$('#Freefield4fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:323px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield4"  style="display:inline-block; white-space:nowrap;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX  </span>
                                </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:323px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield4"  style="display:inline-block; white-space:nowrap;">${field4Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX  </span>
                                </span>`);
                            }
                            } else if (this.id == 'Freefield5') {

                            var field5Value = $('#Freefield5_name_input').val();
                            if (!$('#Freefield5fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:356px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield5"  style="display:inline-block; white-space:nowrap;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:356px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield5"  style="display:inline-block; white-space:nowrap;">${field5Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            }

                            } else if (this.id == 'Freefield6') {

                            var field6Value = $('#Freefield6_name_input').val();
                            if (!$('#Freefield6fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:383px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield6"  style="display:inline-block; white-space:nowrap;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:383px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield6"  style="display:inline-block; white-space:nowrap;">${field6Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            }
                            }
                            else if (this.id == 'Freefield7') {

                            var field7Value = $('#Freefield7_name_input').val();
                            if (!$('#Freefield7fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:48px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield7"  style="display:inline-block; white-space:nowrap;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:48px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield7"  style="display:inline-block; white-space:nowrap;">${field7Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            }
                            }
                            else if (this.id == 'Freefield8') {

                            var field8Value = $('#Freefield8_name_input').val();
                            if (!$('#Freefield8fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:75px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield8"  style="display:inline-block; white-space:nowrap;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:75px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield8"  style="display:inline-block; white-space:nowrap;">${field8Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            }
                            }
                            else if (this.id == 'Freefield9') {

                            var field9Value = $('#Freefield9_name_input').val();
                            if (!$('#Freefield9fn').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:102px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield9"  style="display:inline-block; white-space:nowrap;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            } else {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:102px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield9"  style="display:inline-block; white-space:nowrap;">${field9Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                            </span>`);
                            }
                            }
                            else if(this.id == 'globalimage1'){
                                $("#global_image1").show();
                            }

                            else if(this.id == 'globalimage2'){
                                $("#global_image2").show();
                            }

                            else if(this.id == 'labelimage1'){
                                $("#label_image1").show();
                            }

                            else if(this.id == 'labelimage2'){
                                $("#label_image2").show();
                            }

                            $('.fieldname_check').each(function() {
                            var idPrefix_Labeltype = 'labelcontainer';

                            var checkboxId = $(this).attr('id'); // Get the ID of the clicked checkbox
                            var metalabelId = checkboxId.replace('fn',
                                ''); // Construct the metalabel ID

                            if ($(this).is(':checked')) {
                                $('#' + idPrefix_Labeltype + metalabelId).show();
                            } else {
                                if ($('#' + idPrefix_Labeltype + this.id + '_label') !=
                                    '#span_QRcode_nonstore' && $('#' + idPrefix_Labeltype + this.id +
                                        '_label') != '#inner-span_QRcode_nonstore') {
                                    $('#' + idPrefix_Labeltype + this.id + '_label')
                                        .remove();
                                }
                                // Checkbox is unchecked, hide the metalabel content
                                $('#' + idPrefix_Labeltype + metalabelId).hide();
                            }
                            });

                            } else {

                            $('#' + idPrefix_Labeltype + this.id + '_label').remove();
                            $('#selectall').prop('checked', false);
                            $('#Store_label').css('display', 'block');
                            $('#Store').prop('checked', false);
                            $('#Store').prop('disabled', false);
                            $('#' + this.id + '_label').remove();

                            if(this.id == 'globalimage1'){
                            $("#global_image1").hide();
                            }

                            else if(this.id == 'globalimage2'){
                                $("#global_image2").hide();
                            }

                            else if(this.id == 'labelimage1'){
                                $("#label_image1").hide();
                            }

                            else if(this.id == 'labelimage2'){
                                $("#label_image2").hide();
                            }
                            }
                            // checkLabelName();

                            error();
                            });

            $('#code').change(function() {
            if ($('#code').val() == 'QRcode' || $('#code').val() == 'GS1' || $('#code').val() == 'Barcode') {
                // console.log("CODE");
                // updateQRCode();

                if ($('#code').val() == 'Barcode' && $('#predefined-btn').prop('checked')) {
                    $('.nonstoreqr').prop('checked', false);
                    $('#qrproductid').prop('checked', true);
                    updateQRCode();
                }else{
                    $('#qrproductid').prop('checked', false);
                    updateQRCode();
                }

                $('#span_QRcode_store').css('display', 'block');
                $('#span_QRcode_nonstore').css('display', 'block');
                $('#QR_tab').show();
                $('#plus').prop('disabled', false);
                $('#plus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;'
                );
                $('#minus').prop('disabled', false);
                $('#minus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer;  height: 30px !important;'
                );
            } else {
                $('#span_QRcode_store').css('display', 'none');
                $('#span_QRcode_nonstore').css('display', 'none');
                $('#QR_tab').hide();
                $('#plus').prop('disabled', true);
                $('#plus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;'
                );
                $('#minus').prop('disabled', true);
                $('#minus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer;  height: 30px !important;'
                );
            }
            error();
        });


        $("#width").change(function() {
            var width = $("#width").val();
            if (width > 210) {
                $("#width").val('210');
            }
            var labelToChange = 'labelcontent';
            var width = $("#width").val();
            $('#' + labelToChange).css('width', width + 'mm');
            setHeightWidth();
            error();
        });

        $("#height").change(function() {

            var h = $('#height').val();
            if (h > 150) {
                $("#height").val('150');
            }
            var labelToChange = 'labelcontent';
            var height = $("#height").val();
            $('#' + labelToChange).css('height', height + 'mm');
            setHeightWidth();
            error();
        });

        $("#text_tab").click(function() {
            // tab();
            $(".inactive").removeClass("active");
            $(this).addClass("active");
            $('.content').css('display', 'none')
            $('#Text_content').css('display', 'block')
        });

        $("#QR_tab").click(function() {
            $(".inactive").removeClass("active");
            $(this).addClass("active");
            $('.content').css('display', 'none')
            $('#QR_content').css('display', 'block')
        });

        $("#Label_tab").click(function() {
            $(".inactive").removeClass("active");
            $(this).addClass("active");
            $('.content').css('display', 'none')
            $('#Label_content').css('display', 'block')

        });

        $("#Style_tab").click(function() {
            $(".inactive").removeClass("active");
            $(this).addClass("active");
            $('.content').css('display', 'none')
            $('#Style_content').css('display', 'block')

        });

        $("#textareabox").keyup(function() {
            var text = $('#textareabox').val();
            var num = $('#num').val();
            $('#Storetext').text(text);

            $.ajax({
                url: "{{ url('/labelsize') }}",
                type: "POST",
                data: {
                    num: num,
                    text: text,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    // //console.log(result);
                    $("#span_QRcode_store").html(result);
                    $("#span_QRcode_nonstore").html(result);
                }
            });


        });

        $("#labeltype").change(function() {
            if ($('#labeltype').val() == 'Inner Label') {

                $(".containerbtn").prop("disabled", false)
                $('#innerlabel').show();
                $('#labelcontent').hide();
                $('#labelcontent_ul1').hide();
                $('#innerlabel_ul1').show();
                $('.innerlabel').removeClass("nonstore_lable_ul1");
                $('.labelcontent').addClass("nonstore_lable_ul1");
                $("#grossweight_label").hide();
                $("#tareweight_label").hide();
                $("#containerno_label").hide();



                // $('.containerbtn').hide();
            } else {

                $('#labelcontent').show();
                $('#innerlabel').hide();
                $('#labelcontent_ul1').show();
                $('#innerlabel_ul1').hide();
                $('.innerlabel').removeClass("nonstore_lable_ul1");
                $('.labelcontent').addClass("nonstore_lable_ul1");
                $(".containerbtn").prop("disabled", true)
                $("#grossweight_label").show();
                $("#tareweight_label").show();
                $("#containerno_label").show();
            }
            // //console.log('con');

            if ($('#labeltype').val() == 'Inner Label') {
                $(".innerlbl").attr("disabled", true);
            } else {
                $(".innerlbl").attr("disabled", false);
            }
        });

    $("#image_plus").click(function () {
        var imageID = "";
        var spanID = "";
        var increment = 10.0;
        var label_image = @json($config_data);

        if ($("#image_name").val() == label_image.global_image1) {
            imageID = "global_image1_img";
            spanID = "global_image1";
        } else if ($("#image_name").val() == label_image.global_image2) {
            imageID = "global_image2_img";
            spanID = "global_image2";
        } else if ($("#image_name").val() == label_image.image1) {
            imageID = "label_image1_img";
            spanID = "label_image1";
        } else if ($("#image_name").val() == label_image.image2) {
            imageID = "label_image2_img";
            spanID = "label_image2";
        }

        var height = $(`#${imageID}`).css("height");
        var width = $(`#${imageID}`).css("width");
        $('#image_minus').attr('style', 'background-color: #000000 !important; width: 30px !important; padding-top: 4px; height: 30px !important;');


        if (parseFloat(height.split("px")[0]) < 100.0 && parseFloat(width.split("px")[0]) < 100.0) {
            var increaseH = parseFloat(height.split("px")[0]) + increment;
            var increaseW = parseFloat(width.split("px")[0]) + increment;

            $(`#${imageID}`).css({ "height": `${increaseH}px`, "width": `${increaseW}px` });
            $(`#${spanID}`).css({ "height": `${increaseH}px`, "width": `${increaseW}px` });
            $(`#${spanID}`).find(".ui-wrapper").css({ "height": `${increaseH}px`, "width": `${increaseW}px` });
        } else {
            $('#image_plus').prop('disabled', true);
            $('#image_plus').attr('style', 'background-color: #322a2aba !important; width: 30px !important; padding-top: 4px; height: 30px !important;');
        }
        });

    $("#image_minus").click(function () {
        var imageID = "";
        var spanID = "";
        var decrement = 10.0;
        var label_image = @json($config_data);

        if ($("#image_name").val() == label_image.global_image1) {
            imageID = "global_image1_img";
            spanID = "global_image1";
        } else if ($("#image_name").val() == label_image.global_image2) {
            imageID = "global_image2_img";
            spanID = "global_image2";
        } else if ($("#image_name").val() == label_image.image1) {
            imageID = "label_image1_img";
            spanID = "label_image1";
        } else if ($("#image_name").val() == label_image.image2) {
            imageID = "label_image2_img";
            spanID = "label_image2";
        }

        var height = $(`#${imageID}`).css("height");
        var width = $(`#${imageID}`).css("width");
        $('#image_plus').attr('style', 'background-color: #000000 !important; width: 30px !important; padding-top: 4px; height: 30px !important;');


        if (parseFloat(height.split("px")[0]) > 30.0 && parseFloat(width.split("px")[0]) > 30.0) {
            var decreaseH = parseFloat(height.split("px")[0]) - decrement;
            var decreaseW = parseFloat(width.split("px")[0]) - decrement;

            $(`#${imageID}`).css({ "height": `${decreaseH}px`, "width": `${decreaseW}px` });
            $(`#${spanID}`).css({ "height": `${decreaseH}px`, "width": `${decreaseW}px` });
            $(`#${spanID}`).find(".ui-wrapper").css({ "height": `${decreaseH}px`, "width": `${decreaseW}px` });
        } else {
            $('#image_minus').prop('disabled', true);
            $('#image_minus').attr('style', 'background-color: #322a2aba !important; width: 30px !important; padding-top: 4px; height: 30px !important;');
        }
    });

        $("#plus").click(function() {

            if ($('#plus').attr('disabled', true)[0].disabled) {} else {
                var height = $("#codeName").height();
                var width = $("#codeName").width();
                if(height != 100){
                    var increaseH = height + 10;
                    var increaseW = width + 10;
                    $("#codeName").css("height", increaseH + "px");
                    $("#codeName").css("width", increaseW + "px");
                    $("#num").val($("#codeName").css("height") + "_" + $("#codeName").css("width"));
                    $('#minus').prop('disabled', false);
                    $('#minus').attr('style',
                        'background-color: rgb(0, 0, 0) !important;    width: 30px !important; padding-top: 4px; height: 30px !important;'
                    );
                }else{
                    $('#plus').prop('disabled', true);
                    $('#plus').attr('style',
                        'background-color: #322a2aba !important;    width: 30px !important; padding-top: 4px; height: 30px !important;'
                    );

                }
            }
            error();
            });

        $("#minus").click(function() {
                if ($('#minus').attr('disabled', true)[0].disabled) {} else {
                    var height = $("#codeName").height();
                    var width = $("#codeName").width();
                    if(height != 10){
                        var increaseH = height - 10;
                        var increaseW = width - 10;
                        $("#codeName").css("height", increaseH + "px");
                        $("#codeName").css("width", increaseW + "px");
                        $("#num").val($("#codeName").css("height") + "_" + $("#codeName").css("width"));
                        $('#plus').prop('disabled', false);
                        $('#plus').attr('style',
                            'background-color: rgb(0, 0, 0) !important;    width: 30px !important; padding-top: 4px; height: 30px !important;'
                        );
                    }else{
                        $('#minus').prop('disabled', true);
                        $('#minus').attr('style',
                            'background-color: #322a2aba !important;    width: 30px !important; padding-top: 4px; height: 30px !important;'
                        );

                    }
                }
                error();
            });


        $(".selectfield").change(function() {
            if ($(".selectfield").val() != "Select") {
                $(".nonstore").prop('disabled', false);
                $(".nonstore_check").prop('disabled', false);
                $("#labelname").prop('readonly', false);
            } else {
                $(".nonstore").prop('disabled', true);
                $(".nonstore_check").prop('disabled', true);
                // $("#labelname").prop('readonly', true);

            }

        });

        $('#labelname').keyup(function() {
            $('#saveselect').prop("disabled", false);
            $('input[type="checkbox"]').prop('disabled', false);
            $('.predefined_dynamic').prop('disabled', false);
        })

        $('.mouseup').click(function() {
            var currLabelName = 'labelcontent';

            if (($(this).attr("class") == "mouseup") || ($(this).attr("class") ==
                    "inactive mouseup active")) {} else if ($(this).attr("class") ==
                "align fa fa-align-right mouseup") {


                if ($('#' + this.id).css('background-color') == 'rgb(0, 0, 0)') {
                    $(".labeltext").css("text-align", "center");
                    $("#Storealign").val('center');
                    if (label_id != '') {
                        $('.focus').css("text-align", "center");
                    }
                    $('#' + this.id).css('background-color', 'rgb(255, 255, 255)');
                    $('#' + this.id).css('color', 'rgb(0, 0, 0)');
                    // //console.log("right 1");
                } else {
                    $('.align').css('background-color', 'rgb(255, 255, 255)');
                    $("#Storealign").val('right');
                    $('.align').css('color', 'rgb(0, 0, 0)');
                    $(".labeltext").css("text-align", "right");
                    if (label_id != '') {

                        $('.focus').css("text-align", "right");
                    }
                    $('#' + this.id).css('background-color', 'rgb(0, 0, 0)');
                    $('#' + this.id).css('color', 'rgb(255, 255, 255)');
                }
            } else if ($(this).attr("class") == "align fa fa-align-left mouseup") {
                if ($('#' + this.id).css('background-color') == 'rgb(0, 0, 0)') {
                    $("#Storealign").val('center');
                    $(".labeltext").css("text-align", "center");
                    if (label_id != '') {
                        $('.focus').css("text-align", "center");
                    }
                    $('#' + this.id).css('background-color', 'rgb(255, 255, 255)');
                    $('#' + this.id).css('color', 'rgb(0, 0, 0)');
                } else {
                    $('.align').css('background-color', 'rgb(255, 255, 255)');
                    $('.align').css('color', 'rgb(0, 0, 0)');
                    $("#Storealign").val('left');
                    $(".labeltext").css("text-align", "left");
                    if (label_id != '') {
                        $('.focus').css("text-align", "left");
                    }
                    $('#' + this.id).css('background-color', 'rgb(0, 0, 0)');
                    $('#' + this.id).css('color', 'rgb(255, 255, 255)');
                }
                // //console.log("left");
            } else if ($(this).attr("class") == "align fa fa-align-center mouseup") {
                if ($('#' + this.id).css('background-color') == 'rgb(0, 0, 0)') {
                    $("#Storealign").val('center');
                    $(".labeltext").css("text-align", "center");
                    if (label_id != '') {
                        $('.focus').css("text-align", "center");
                    }
                    $('#' + this.id).css('background-color', 'rgb(255, 255, 255)');
                    $('#' + this.id).css('color', 'rgb(0, 0, 0)');
                } else {
                    $('.align').css('background-color', 'rgb(255, 255, 255)');
                    $('.align').css('color', 'rgb(0, 0, 0)');
                    $("#Storealign").val('center');
                    $(".labeltext").css("text-align", "center");
                    if (label_id != '') {
                        $('.focus').css("text-align", "center");
                    }
                    $('#' + this.id).css('background-color', 'rgb(0, 0, 0)');
                    $('#' + this.id).css('color', 'rgb(255, 255, 255)');
                }

                // //console.log("center");
            } else if ($(this).attr("class") == "grnprop mouseup") {
                if (this.id == "bold") {

                    if ($('#' + this.id).css('background-color') == 'rgb(0, 0, 0)') {
                        $("#Storebold").val('normal');
                        $(".labeltext").css("font-weight", "normal");
                        if (label_id != '') {
                            $('.focus').css("font-weight", "normal");
                        }
                        $('#' + this.id).css('background-color', 'rgb(255, 255, 255)');
                        $('#' + this.id).css('color', 'rgb(0, 0, 0)');
                    } else {
                        if (label_id != '') {
                            // console.log(label_id,'asdf');
                            $('.focus').css("font-weight", "bold");
                            for (var one = 0; one < some.length; one++) {
                                var id = [];
                                var idFieldName = [];
                                var widthFieldName = [];

                                $.map($('#' + currLabelName).find('.focus'), function(el) {
                                    id.push($(el).attr('id'));
                                });

                                for (i = 0; i < id.length; i++) {
                                    $.map($('#' + id[i]).find('.' + currLabelName + 'fieldname'),
                                        function(
                                            el) {
                                            idFieldName.push($(el).attr('id'));
                                        });
                                }

                                for (i = 0; i < idFieldName.length; i++) {
                                    $('#' + idFieldName[i]).css('width', 'auto');
                                }

                            }
                        }
                        $('#' + this.id).css('background-color', 'rgb(0, 0, 0)');
                        $('#' + this.id).css('color', 'rgb(255, 255, 255)');
                    }
                } else if (this.id == "Italic") {
                    if ($('#' + this.id).css('background-color') == 'rgb(0, 0, 0)') {
                        $("#Storeitalic").val('normal');
                        $(".labeltext").css("font-style", "normal");
                        if (label_id != '') {
                            $('.focus').css("font-style", "normal");
                        }
                        $('#' + this.id).css('background-color', 'rgb(255, 255, 255)');
                        $('#' + this.id).css('color', 'rgb(0, 0, 0)');
                    } else {
                        $(".labeltext").css("font-style", "italic");
                        $("#Storeitalic").val('italic');
                        if (label_id != '') {
                            $('.focus').css("font-style", "italic");
                        }
                        $('#' + this.id).css('background-color', 'rgb(0, 0, 0)');
                        $('#' + this.id).css('color', 'rgb(255, 255, 255)');
                    }
                } else if (this.id == "Underline") {
                    if ($('#' + this.id).css('background-color') == 'rgb(0, 0, 0)') {
                        $(".labeltext").css("text-decoration", "none");
                        $("#Storeunderline").val('none');
                        if (label_id != '') {
                            $('.focus').css("text-decoration", "none");
                            for (var one = 0; one < some.length; one++) {
                                $('#' + currLabelName + some[one].split('_')[0]).css('text-decoration',
                                    'none');
                            }
                        }
                        $('#' + this.id).css('background-color', 'rgb(255, 255, 255)');
                        $('#' + this.id).css('color', 'rgb(0, 0, 0)');
                    } else {
                        $(".labeltext").css("text-decoration", "underline");
                        $("#Storeunderline").val('underline');
                        if (label_id != '') {
                            $('.focus').css("text-decoration", "underline");
                            for (var one = 0; one < some.length; one++) {
                                $('#' + currLabelName + some[one].split('_')[0]).css('text-decoration',
                                    'underline');
                            }

                        }
                        $('#' + this.id).css('background-color', 'rgb(0, 0, 0)');
                        $('#' + this.id).css('color', 'rgb(255, 255, 255)');
                    }
                } else if (this.id == "font_family") {
                    $('#' + this.id).change(function() {
                        var family = $('#' + this.id).val();
                        $(".labeltext").css("font-family", family);
                        if (label_id != '') {
                            $('.focus').css("font-family", family);
                            for (var one = 0; one < some.length; one++) {
                                var id = [];
                                var idFieldName = [];
                                var widthFieldName = [];

                                $.map($('#' + currLabelName).find('.focus'), function(el) {
                                    id.push($(el).attr('id'));
                                });

                                for (i = 0; i < id.length; i++) {
                                    $.map($('#' + id[i]).find('.' + currLabelName +
                                        'fieldname'),
                                        function(el) {
                                            idFieldName.push($(el).attr('id'));
                                        });
                                }

                                for (i = 0; i < idFieldName.length; i++) {
                                    $('#' + idFieldName[i]).css('width', 'auto');
                                }
                            }
                        }
                    });
                } else {
                    $('#' + this.id).change(function() {
                        var size = $('#' + this.id).val();
                        // //console.log(size);
                        $("#Storesize").val(size);
                        $(".labeltext").css("font-size", size + "px");
                        if (label_id != '') {
                            $('.focus').css("font-size", size + "px");
                            for (var one = 0; one < some.length; one++) {
                                var id = [];
                                var idFieldName = [];
                                var widthFieldName = [];

                                $.map($('#' + currLabelName).find('.focus'), function(el) {
                                    id.push($(el).attr('id'));
                                });

                                for (i = 0; i < id.length; i++) {
                                    $.map($('#' + id[i]).find('.' + currLabelName +
                                        'fieldname'),
                                        function(el) {
                                            idFieldName.push($(el).attr('id'));
                                        });
                                }

                                for (i = 0; i < idFieldName.length; i++) {
                                    $('#' + idFieldName[i]).css('width', 'auto');
                                }

                            }
                        }
                    });
                }
            } else {
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $(".labeltext").removeClass("focus");
                    if (label_id != '') {
                        $("#" + label_id).removeClass("focus");
                    }
                }
            }
            error();
        });

        var some = [];
        $(document).on('click', '.textnonstore', function(e) {
            label_id_nonstore = this.id.split('labelcontent')[1];
            label_id = this.id;
            // console.log(label_id_nonstore);

            if (!e.ctrlKey) {
                if (($('#' + this.id).attr('class') ==
                        'textnonstore ui-state-default ui-draggable ui-draggable-handle ui-resizable'
                        )) {
                    $('.textnonstore').removeClass("focus");
                    some.splice(0, 50);
                    some.push(label_id_nonstore);
                    $('#' + label_id).addClass("focus");
                } else {
                    $('.textnonstore').removeClass("focus");
                    some.splice($.inArray(label_id_nonstore, some), 1);

                }
            } else if (($.inArray(label_id_nonstore, some) == -1) && (e.ctrlKey)) {
                some.push(label_id_nonstore);
                $('#' + label_id).addClass("focus");
            } else {
                some.splice($.inArray(label_id_nonstore, some), 1);
                $('#' + label_id).removeClass("focus");
            }
            click();
        });

        $(document).mouseup(function(e) {
            var className = $(this).attr("class");
            var container = $(this.id);
            // //console.log(container);

            $('.droptrue').css('background-color', '#fff');
            $('#draggable').css('background-color', '#fff');
            $('#draggable1').css('background-color', '#fff');
            $('#draggable2').css('background-color', '#fff');
            $('#draggable3').css('background-color', '#fff');
            $('#draggable4').css('background-color', '#fff');


            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.labeltext').css('border-style', 'none');
                $('.labeltext').css('padding', '0px');
                $('.labeltext').css('cursor', 'default');
            }

            // if the target of the click isn't the container nor a descendant of the container


        });

        });

        $('#delimiteralign').click(function() {
            var idPrefix_Labeltype = 'labelcontent';
            var id = [];
            var height = [];
            var width = [];
            var left = [];
            var idFieldName = [];
            var count = 0;
            var widthCheck = [];
            var widthFieldName = [];
            var counter = 0;

            $.map($('#' + idPrefix_Labeltype).find('.focus'), function(el) {
                id.push($(el).attr('id'));
                counter++;
            });

            if (counter == 1) {
                Swal.fire({
                    title: 'Please select more than one field to align!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'rgb(36 63 161)',
                    background: 'rgb(105 126 157)',
                });

            } else {

                for (i = 0; i < id.length; i++) {
                    $.map($('#' + id[i]).find('.' + idPrefix_Labeltype + 'fieldname'), function(el) {
                        idFieldName.push($(el).attr('id'));
                    });
                }

                for (i = 0; i < idFieldName.length; i++) {
                    if ($('#' + idFieldName[i]).text() === '') {
                        count = count + 1;
                    }
                }

                for (i = 0; i < id.length; i++) {
                    height.push(parseInt($('#' + id[i]).css('height')));
                    width.push(parseInt($('#' + id[i]).css('width')));
                    left.push(parseInt($('#' + id[i]).css('left')));

                }

                for (i = 0; i < idFieldName.length; i++) {
                    widthCheck.push($('#' + idFieldName[i]).width());
                }

                if (count > 0) {
                    Swal.fire({
                        title: 'Fields without metadata cannot be aligned based on delimiter! Please select fields with metadata!',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                } else {
                    const allEqual = arr => arr.every(val => val === arr[0]);
                    var valWidthFieldName = allEqual(widthCheck);
                    var valWidth = allEqual(height);
                    var valHeight = allEqual(width);
                    console.log(allEqual,valWidthFieldName,valWidth,valHeight);

                    if (valWidthFieldName === true && valWidth === true && valHeight === true) {
                        Swal.fire({
                            title: 'Selected fields are already aligned based on the delimiter!',
                            confirmButtonText: 'OK',
                            confirmButtonColor: 'rgb(36 63 161)',
                            background: 'rgb(105 126 157)',
                        });
                    } else {

                        var maxHeight = parseInt(Math.max.apply(Math, height)) + 2;
                        var maxWidth = parseInt(Math.max.apply(Math, width)) + 2;
                        var minLeft = Math.min.apply(Math, left);

                        for (i = 0; i < id.length; i++) {
                            $('#' + id[i]).css('height', maxHeight + 'px');
                            $('#' + id[i]).css('width', maxWidth + 'px');
                            $('#' + id[i]).css('left', minLeft + 'px');
                        }
                        for (i = 0; i < idFieldName.length; i++) {
                            widthFieldName.push(parseInt($('#' + idFieldName[i]).css('width')));
                        }

                        var maxWidthFieldName = Math.max.apply(Math, widthFieldName);
                        maxWidthFieldName = parseInt(maxWidthFieldName);
                        maxWidthFieldName = maxWidthFieldName + 2;


                        for (i = 0; i < idFieldName.length; i++) {
                            $('#' + idFieldName[i]).css('width', maxWidthFieldName + 'px');
                        }

                        var pos = [];
                        var id_one = [];


                        for (i = 0; i < id.length; i++) {
                            id_one.push(`${id[i].split('rlabel')[1]}position`);
                            pos.push($('#' + id[i]).css('top') + '_' + $('#' + id[i]).css('left') + '_' + $('#' +
                                    id[i])
                                .css('height') + '_' + $('#' + id[i]).css('width') + '_' + $('#' + idFieldName[
                                    i])
                                .css('width'));
                        }

                        for (i = 0; i < id.length; i++) {
                            if (idPrefix_Labeltype === 'labelcontent') {
                                $('.' + id_one[i]).val(pos[i]);
                            } else {
                                $('.inner-' + id_one[i]).val(pos[i]);
                            }
                        }
                    }
                }
            }
        });

        var previousOption;
        $('select[name=saveselect] option').each(function() {
            if (this.text == previousOption) $(this).remove();
            previousOption = this.text;
        });

        $('#Edit').click(function(e) {
            event.preventDefault();
            //Fields were displaying as per the selected predfined or dynamic
            let predefined_dynamic = @json($shipper_print->label_type_dynamic_predefined)

            // if (predefined_dynamic == 'dynamic') {
            //     $('.unwantedfordynamiclabel').hide();
            // } else {
            //     $('.unwantedfordynamiclabel').show();
            // }

            $('#producttype_input').prop('disabled',false);
            $('#labeltype_input').prop('disabled',false);
            $('#Comments').attr('readonly', true);
            $('.predefined_dynamic').prop('disabled', false);
            $('.fieldname_check').prop('disabled', false)
            $('.nonstore').prop('disabled', false);
            $('#Edit').prop('disabled', true);
            $('.disabled_fields').prop('disabled', false);
            $('#save').prop('disabled', false);
            $('.nonstore').css('pointer-events', 'all');
            $('.nonstoreqr').prop('disabled',false)
            $('#statuslabel').css('pointer-events', 'all');
            $('#Commentstatus').css('pointer-events', 'all');
            $('#Commentstatus').prop('disabled', false);
            $('#statuslabel').prop('disabled', false);
            $('#Edit').css('display', 'none');
            $('#saveas').css('display', 'none');
            $('#print').css('display', 'inline-block');
            $('#addressofmfg').prop('disabled', false);
            $('#selectall').prop('disabled', false);
            $('#labelstaticfield1_input').prop('disabled',false);
            $('#labelstaticfield2_input').prop('disabled',false);
            if ($('#labelstaticfield').is(":checked") === true) {
                $('#Staticfield_input').prop('disabled', false);
            }
            $('#text_tab').css('pointer-events', 'all');
            $('#Label_tab').css('pointer-events', 'all');
            $('#labelcontent').css('pointer-events', 'all');
            $('#innerlabel').css('pointer-events', 'all');
            $('#Style_tab').css('pointer-events', 'all');
            $('#containerdiv').css('pointer-events', 'all');
            $('#labelimage1_upload').prop('disabled',false);
            $('#labelimage2_upload').prop('disabled',false);


            var idPrefix_Labeltype = 'labelcontent';
            const lineVertical = document.querySelector('.line-vertical');
            const lineHorizontal = document.querySelector('.line-horizontal');

            $('.textnonstore').draggable({
                start: function(event, ui) {
                    $(".line-vertical, .line-horizontal").show();
                },
                drag: function(event, ui) {
                    var x = ui.position.left + ui.helper.width() / 2;
                    var y = ui.position.top + ui.helper.height() / 2;
                    $(".line-vertical").css("left", x + "px");
                    $(".line-horizontal").css("top", y + "px");
                },
                stop: function() {
                    $(".line-vertical, .line-horizontal").hide();
                },
                containment: `#${idPrefix_Labeltype}`,
            });

            $('.textnonstore').resizable({
                containment: `#${idPrefix_Labeltype}`,
            });

            $('#span_BARcodeBig_nonstore').draggable({
                containment: `#${idPrefix_Labeltype}`,
            });

            $('#span_BARcode_nonstore').draggable({
                containment: `#${idPrefix_Labeltype}`,
            });
            $('.global_image').resizable({
                containment: `#${idPrefix_Labeltype}`,
                maxHeight: 100,
                maxWidth: 100,
            });

            $('.global').draggable({
                start: function(event, ui) {
                    $(".line-vertical, .line-horizontal").show();
                },
                drag: function(event, ui) {
                    var x = ui.position.left + ui.helper.width() / 2;
                    var y = ui.position.top + ui.helper.height() / 2;
                    $(".line-vertical").css("left", x + "px");
                    $(".line-horizontal").css("top", y + "px");
                },
                stop: function() {
                    $(".line-vertical, .line-horizontal").hide();
                },
                containment: `#${idPrefix_Labeltype}`,
            });



            $('.textnonstore').draggable({
                start: function(event, ui) {
                    $(".line-vertical, .line-horizontal").show();
                },
                drag: function(event, ui) {
                    var x = ui.position.left + ui.helper.width() / 2;
                    var y = ui.position.top + ui.helper.height() / 2;
                    $(".line-vertical").css("left", x + "px");
                    $(".line-horizontal").css("top", y + "px");
                },
                stop: function() {
                    $(".line-vertical, .line-horizontal").hide();
                },
                containment: `#${idPrefix_Labeltype}`,
            });

            $('.textnonstore').resizable({
                containment: `#${idPrefix_Labeltype}`,
            });
            var paddingValue = 10;
            $('#span_QRcode_nonstore').draggable({
                start: function(event, ui) {
                    $(".line-vertical, .line-horizontal").show();
                },
                drag: function(event, ui) {
                    var x = ui.position.left + ui.helper.width() / 2;
                    var y = ui.position.top + ui.helper.height() / 2;
                    //   console.log(x,y,'=====');

                    $(".line-vertical").css("left", x + "px");
                    $(".line-horizontal").css("top", y + "px");
                },
                stop: function() {
                    $(".line-vertical, .line-horizontal").hide();
                },
                containment: [
                    $(`#${idPrefix_Labeltype}`).offset().left + paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().top + paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().left + $(`#${idPrefix_Labeltype}`).width() -
                    80 - paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().top + $(`#${idPrefix_Labeltype}`).height() -
                    50 - paddingValue
                ],
            });

            $('#span_datamatrix_nonstore').draggable({
                start: function(event, ui) {
                    $(".line-vertical, .line-horizontal").show();
                },
                drag: function(event, ui) {
                    var x = ui.position.left + ui.helper.width() / 2;
                    var y = ui.position.top + ui.helper.height() / 2;
                    //   console.log(x,y,'=====');

                    $(".line-vertical").css("left", x + "px");
                    $(".line-horizontal").css("top", y + "px");
                },
                stop: function() {
                    $(".line-vertical, .line-horizontal").hide();
                },
                containment: [
                    $(`#${idPrefix_Labeltype}`).offset().left + paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().top + paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().left + $(`#${idPrefix_Labeltype}`).width() -
                    80 - paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().top + $(`#${idPrefix_Labeltype}`).height() -
                    80 - paddingValue
                ],
            });


            $('#inner-span_QRcode_nonstore').draggable({
                start: function(event, ui) {
                    $(".line-vertical, .line-horizontal").show();
                },
                drag: function(event, ui) {
                    var x = ui.position.left + ui.helper.width() / 2;
                    var y = ui.position.top + ui.helper.height() / 2;

                    $(".line-vertical").css("left", x + "px");
                    $(".line-horizontal").css("top", y + "px");
                },
                stop: function() {
                    $(".line-vertical, .line-horizontal").hide();
                },
                containment: [
                    $(`#${idPrefix_Labeltype}`).offset().left + paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().top + paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().left + $(`#${idPrefix_Labeltype}`).width() -
                    80 - paddingValue,
                    $(`#${idPrefix_Labeltype}`).offset().top + $(`#${idPrefix_Labeltype}`).height() -
                    80 - paddingValue
                ],
            });

        });

        $("#selectall").on("click", function() {
            fieldnameselectall();
            var idPrefix_Labeltype = 'labelcontent';

            var metalabel = @json($config_data);
            var label_metadata_master = @json($config_data);

            // productchange();
            error();
            // console.log($('#selectall').is(":checked"));
        if ($(this).is(":checked")) {
                $('#' + idPrefix_Labeltype).css('display', 'block');
                $('.nonstore').prop("checked", true);
                $('#save').prop('disabled', false);
                @if ($config_data->l_field1_use === 'on')
                    $('#label1_text_container').css('display', 'block');
                @endif
                @if ($config_data->l_field2_use === 'on')
                    $('#label2_text_container').css('display', 'block');
                @endif
                @if ($config_data->image1_use === 'on')
                        $('#labelimage1_input').css('display', 'block');
                @endif
                @if ($config_data->image2_use === 'on')
                    $('#labelimage2_input').css('display', 'block');
                @endif
                if ($('.predefined_dynamic:checked').val() == 'predefined') {
                    if ($('#' + idPrefix_Labeltype + 'organizationname_label').length == 0) {
                        if ($('#organizationname').is(':checked')) {


                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}organizationname_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:43px; top:134px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}organizationname" style="display:inline-block ; white-space: nowrap;">Company Name</span><span style="color:#ff5454"><span class="delimiter"> :</span> ${metalabel.organization_name}</span>
                                    </span>`);

                        }
                    }

                    @if ($config_data->product_name_use === 'off')

                        if ($('#' + idPrefix_Labeltype + "productname_label").length == 0) {

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productname_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 36.9922px; top: 80.9922px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productname" style="display:inline-block ; white-space: nowrap;">${metalabel.product_name}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXXXX </span>
                            </span>`);

                        }
                    @endif

                    @if ($config_data->product_id_use === 'off')

                        if ($('#' + idPrefix_Labeltype + 'productid_label').length == 0) {
                            if ($('#productid').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productid_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:166px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productid" style="display:inline-block ; white-space: nowrap;"> ${metalabel.product_id}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                        </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->comments_use === 'on')

                        if ($('#' + idPrefix_Labeltype + "productcomments_label").length == 0) {

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productcomments_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 40.9981px; top: 107.996px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productcomments" style="display:inline-block ; white-space: nowrap;">${metalabel.comments}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>
                        </span>`);

                        }
                    @endif

                    @if ($config_data->p_field1_use === 'on')
                        if ($('#' + idPrefix_Labeltype + 'productstaticfield1_label').length == 0) {
                            if ($('#productstaticfield1').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field1}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                        </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field2_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'productstaticfield2_label').length == 0) {
                            if ($('#productstaticfield2').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field2}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field3_use === 'on')
                        if ($('#' + idPrefix_Labeltype + 'productstaticfield3_label').length == 0) {
                            if ($('#productstaticfield3').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield3_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:184px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield3" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field3}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field4_use === 'on')
                        if ($('#' + idPrefix_Labeltype + 'productstaticfield4_label').length == 0) {
                            if ($('#productstaticfield4').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield4_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:204px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield4" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field4}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field5_use === 'on')
                        if ($('#' + idPrefix_Labeltype + 'productstaticfield5_label').length == 0) {
                            if ($('#productstaticfield5').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield5_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:224px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield5" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field5}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field6_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'productstaticfield6_label').length == 0) {
                            if ($('#productstaticfield6').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield6_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:244px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field6}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field7_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'productstaticfield7_label').length == 0) {
                            if ($('#productstaticfield7').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield7_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:264px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield7" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field7}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field8_use === 'on')
                        if ($('#' + idPrefix_Labeltype + 'productstaticfield8_label').length == 0) {
                            if ($('#productstaticfield8').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield8_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:284px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield8" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field8}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field9_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'productstaticfield9_label').length == 0) {
                            if ($('#productstaticfield9').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield9_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:304px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield9" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field9}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->p_field10_use === 'on')
                        if ($('#' + idPrefix_Labeltype + 'productstaticfield10_label').length == 0) {
                            if ($('#productstaticfield10').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield10_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:324px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield10" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field10}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    if ($('#' + idPrefix_Labeltype + 'batchno_label').length == 0) {
                        if ($('#batchno').is(':checked')) {

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchno_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:197px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchno" style="display:inline-block ; white-space: nowrap;">${metalabel.batch_number} </span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                        }
                    }
                    if ($('#' + idPrefix_Labeltype + 'serialno_label').length == 0) {
                        if ($('#serialno').is(':checked')) {

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}serialno_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:336px; top:130px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}serialno" style="display:inline-block ; white-space: nowrap;">${metalabel.serialno} </span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                        }
                    }

                    @if ($config_data->date_of_manufacturing_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'dateofmanufacture_label').length == 0) {
                            if ($('#dateofmanufacture').is(':checked')) {


                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dateofmanufacture_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:256px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofmanufacture" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_manufacturing}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->date_of_expiry_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'dateofexp_label').length == 0) {
                            if ($('#dateofexp').is(':checked')) {


                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dateofexp_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:292px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofexp" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_expiry}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->date_of_retest_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'dateofretest_label').length == 0) {
                            if ($('#dateofretest').is(':checked')) {


                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dateofretest_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:225px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofretest" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_retest}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->b_field1_use === 'on')
                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield1_label').length == 0) {
                            if ($('#batchstaticfield1').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:344px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field1}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                        </span>`);
                            }
                        }
                    @endif

                    @if ($config_data->b_field2_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield2_label').length == 0) {
                            if ($('#batchstaticfield2').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:364px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field2}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->b_field3_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield3_label').length == 0) {
                            if ($('#batchstaticfield3').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield3_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:384px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield3" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field3}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->b_field4_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield4_label').length == 0) {
                            if ($('#batchstaticfield4').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield4_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:404px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield4" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field4}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->b_field5_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield5_label').length == 0) {
                            if ($('#batchstaticfield5').is(':checked')) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield5_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:424px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield5" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field5}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                    </span>`);

                            }
                        }
                    @endif

                    @if ($config_data->no_of_container_use === 'on')

                        if ($('.predefined_dynamic:checked').val() == 'predefined') {

                            if ($('#' + idPrefix_Labeltype + 'containerno_label').length == 0) {
                                if ($('#containerno').is(':checked')) {



                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}containerno_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:191px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}containerno" style="display:inline-block ; white-space: nowrap;"> ${metalabel.container_no}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                            </span>`);


                                }
                            }
                        }
                    @endif

                    @if ($config_data->d_field1_use === 'on')

                            if ($('#' + idPrefix_Labeltype + 'dynamicfield1_label').length == 0) {
                                if ($('#dynamicfield1').is(':checked')) {

                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dynamicfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:444px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.dynamic_field1}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                        </span>`);

                                }
                            }
                    @endif

                        @if ($config_data->d_field2_use === 'on')

                            if ($('#' + idPrefix_Labeltype + 'dynamicfield2_label').length == 0) {
                                if ($('#dynamicfield2').is(':checked')) {

                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dynamicfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:464px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.dynamic_field2}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX</span>
                                        </span>`);

                                }
                            }
                        @endif

                        if ($('#' + idPrefix_Labeltype + 'netweight_label').length == 0) {
                            if ($('#netweight').is(':checked')) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}netweight_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:358px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}netweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.net_weight} </span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXX </span>
                                    </span>`);

                            }
                        }

                        @if ($config_data->tare_weight_use === 'on')
                            if ($('#' + idPrefix_Labeltype + 'tareweight_label').length == 0) {
                                if ($('#tareweight').is(':checked')) {

                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}tareweight_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:387px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}tareweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.tare_weight}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXX</span>
                                        </span>`);

                                }
                            }
                        @endif

                        @if ($config_data->gross_weight_use === 'on')

                            if ($('#' + idPrefix_Labeltype + 'grossweight_label').length == 0) {
                                if ($('#grossweight').is(':checked')) {

                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}grossweight_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:326px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}grossweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.gross_weight}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXX </span>
                                </span>`);

                                }
                            }
                        @endif

                        @if ($config_data->g_field2_use === 'on')

                            if ($('#' + idPrefix_Labeltype + 'globalstaticfield2_label').length == 0) {
                                if ($('#globalstaticfield2').is(':checked')) {

                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}globalstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:440px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.global_static_field2}</span><span style="color:#ff5454"><span class="delimiter"> :</span> ${metalabel.global_fieldname2}</span>
                                    </span>`);

                                }
                            }
                        @endif

                        @if ($config_data->g_field1_use === 'on')

                            if ($('#' + idPrefix_Labeltype + 'globalstaticfield1_label').length == 0) {
                                if ($('#globalstaticfield1').is(':checked')) {

                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}globalstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:414px;position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.global_static_field1}</span><span style="color:#ff5454"><span class="delimiter"> :</span> ${metalabel.global_fieldname1}</span>
                                    </span>`);

                                }
                            }
                        @endif

                        @if ($config_data->l_field1_use === 'on')
                            if ($('#' + idPrefix_Labeltype + 'labelstaticfield1_label').length == 0) {
                                if ($('#labelstaticfield1').is(':checked')) {

                                    if ($('#labelstaticfield1fn').is(':checked')) {
                                        var val = $('#labelstaticfield1_input').val();
                                        var fieldValue = $('#Staticfield_name_input')
                                            .val(); // Get the value of the element with id "Staticfield_name_input"

                                        $('#' + idPrefix_Labeltype).append(
                                            `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: nowrap;left:46px; top:416px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield1"  style="display:inline-block;">{{ $config_data->label_static_field1 }}</span> <span class="labelstaticfield1 fieldvalue" style="white-space:pre-line;"><span class="delimiter"> :</span>${val}</span>
                                           </span>`);
                                    }
                                }
                            }
                        @endif

                        @if ($config_data->l_field2_use === 'on')

                            if ($('#' + idPrefix_Labeltype + 'labelstaticfield2_label').length == 0) {
                                if ($('#labelstaticfield2').is(':checked')) {


                                    if ($('#labelstaticfield2fn').is(':checked')) {
                                        var val2 = $('#labelstaticfield2_input').val();
                                        var fieldValue = $('#Staticfield2_name_input')
                                            .val(); // Get the value of the element with id "Staticfield2_name_input"
                                        $('#' + idPrefix_Labeltype).append(
                                            `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: nowrap;left:46px; top:450px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield2"  style="display:inline-block;">{{ $config_data->label_static_field2 }}</span> <span class="labelstaticfield2 fieldvalue" style="white-space:pre-line;"><span class="delimiter"> :</span>${val2}</span>
                        </span>`);
                                    }
                                }
                            }
                        @endif

                        if ($('#' + idPrefix_Labeltype + 'Staticfield7_label').length == 0) {
                            if ($('#Staticfield7').is(':checked')) {
                                var fieldValue = $('#Staticfield7_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield7_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:502px; top:18px; position:absolute;">
                            <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield7" style="display:inline-block;"> </span>
                            <span id="Staticfield7_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
                                <img src="" alt="Image1" style="width: 0.7in; height: 0.7in;" />
                            </span>
                        </span>`
                                );

                                $('#labelimage').on('change', function() {
                                    var file = this.files[0];
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        var imageSrc = e.target.result;
                                        $('#' + idPrefix_Labeltype + 'Staticfield7_label img').attr(
                                            'src',
                                            imageSrc);
                                    }

                                    reader.readAsDataURL(file);
                                });
                            }
                        }

                        if ($('#' + idPrefix_Labeltype + 'Staticfield8_label').length == 0) {
                            if ($('#Staticfield8').is(':checked')) {
                                var fieldValue = $('#Staticfield8_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield8_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:502px; top:58px; position:absolute;">
                        <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield8" style="display:inline-block;"> </span>
                        <span id="Staticfield8_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
                            <img src="" alt="Image2" style="width: 0.7in; height: 0.7in;" />
                        </span>
                        </span>`
                                );

                                $('#labelimage2').on('change', function() {
                                    var file = this.files[0];
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        var imageSrc = e.target.result;
                                        $('#' + idPrefix_Labeltype + 'Staticfield8_label img').attr(
                                            'src',
                                            imageSrc);
                                    }

                                    reader.readAsDataURL(file);
                                });
                            }
                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield1_label').length == 0) {

                            var field1Value = $('#Freefield1_name_input')
                                .val(); // Get the value of the element with id "Freefield1_name_input"
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:219px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter"  id="${idPrefix_Labeltype}Freefield1" style="display:inline-block; white-space:nowrap;"> ${field1Value} : </span>  <span class="fieldname" style="color:#ff5454"> XXXXX </span>
                        </span>`);

                            var parameter_canDoubleClickKeyup = this.id + '_name';
                            canDoubleClickKeyup(parameter_canDoubleClickKeyup);
                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield2_label').length == 0) {
                            if ($('#Freefield2').is(':checked')) {

                                var field2Value = $('#Freefield2_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:251px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield2"  style="display:inline-block; white-space:nowrap;">${field2Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);

                            }
                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield3_label').length == 0) {

                            var field3Value = $('#Freefield3_name_input').val();
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield3_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:289px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield3"  style="display:inline-block; white-space:nowrap;">${field3Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield4_label').length == 0) {
                            if ($('#Freefield4').is(':checked')) {

                                var field4Value = $('#Freefield4_name_input').val();
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield4_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:323px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield4"  style="display:inline-block; white-space:nowrap;">${field4Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield5_label').length == 0) {
                            if ($('#Freefield5').is(':checked')) {

                                var field5Value = $('#Freefield5_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield5_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:356px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield5"  style="display:inline-block; white-space:nowrap;">${field5Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield6_label').length == 0) {
                            if ($('#Freefield6').is(':checked')) {

                                var field6Value = $('#Freefield6_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield6_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:388px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield6"  style="display:inline-block; white-space:nowrap;">${field6Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield7_label').length == 0) {
                            if ($('#Freefield7').is(':checked')) {

                                var field7Value = $('#Freefield7_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield7_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:48px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield7"  style="display:inline-block; white-space:nowrap;">${field7Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield8_label').length == 0) {
                            if ($('#Freefield8').is(':checked')) {

                                var field8Value = $('#Freefield8_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield8_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:75px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield8"  style="display:inline-block; white-space:nowrap;">${field8Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield9_label').length == 0) {
                            if ($('#Freefield9').is(':checked')) {

                                var field9Value = $('#Freefield9_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield9_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:102px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield9"  style="display:inline-block; white-space:nowrap;">${field9Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }
                        if ($('#' + idPrefix_Labeltype + 'global_image1').length == 0) {
                            $("#global_image1").show();
                        }
                        if ($('#' + idPrefix_Labeltype + 'global_image2').length == 0) {
                            $("#global_image2").show();
                        }
                        if ($('#' + idPrefix_Labeltype + 'label_image1').length == 0) {
                            $("#label_image1").show();
                        }
                        if ($('#' + idPrefix_Labeltype + 'label_image2').length == 0) {
                            $("#label_image2").show();
                        }

                        //         if ($('#' + idPrefix_Labeltype + 'Staticfield3_label').length == 0) {
                        //             if ($('#Staticfield3').is(':checked')) {
                        //                 var fieldValue = $('#Staticfield3_name_input')
                        //                     .val(); // Get the value of the element with id "Staticfield3_name_input"
                        //                 var imageSrc1 = "/images/image1.jpeg"; // path image

                        //                 $('#' + idPrefix_Labeltype).append(
                        //                     `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield3_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:33px; position:absolute;">
                    //                 <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield3" style="display:inline-block;"> </span>
                    //                 <span id="Staticfield3_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
                    //                     <img src="${imageSrc1}" alt="Image1" style="width: 0.8in; height: 0.7in;" />
                    //                 </span>
                    //             </span>`
                        //                 );
                        //             }
                        //         }

                        // if ($('#' + idPrefix_Labeltype + 'Staticfield4_label').length == 0) {
                        //     if ($('#Staticfield4').is(':checked')) {
                        //         var fieldValue = $('#Staticfield4_name_input')
                        //             .val(); // Get the value of the element with id "Staticfield4_name_input"
                        //         var imageSrc2 = "/images/image2.jpeg"; // path image

                        //         $('#' + idPrefix_Labeltype).append(
                        //             `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield4_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:176px; top:33px; position:absolute;">
                    //     <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield4" style="display:inline-block;">  </span>
                    //     <span id="Staticfield4_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
                    //         <img src="${imageSrc2}" alt="Image1" style="width: 0.7in; height: 0.7in;" />
                    //     </span>
                    //    </span>`
                        //         );
                        //     }
                        // }

                        //         if ($('#' + idPrefix_Labeltype + 'Staticfield5_label').length == 0) {
                        //     if ($('#Staticfield5').is(':checked')) {
                        //         var fieldValue = $('#Staticfield5_name_input').val(); // Get the value of the element with id "Staticfield5_name_input"

                        //         var newElement = $(`
                    //             <span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield5_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:313px; top:33px; position:absolute;">
                    //                 <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield5" style="display:inline-block;">  </span>
                    //                 <span id="Staticfield5_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
                    //                     <img src="" alt="Image1" style="width: 0.7in; height: 0.7in;" />
                    //                 </span>
                    //             </span>
                    //         `);

                        //         $('#' + idPrefix_Labeltype).append(newElement);
                        // //image uploading from the choose file//
                        //         $('#globalimage1').on('change', function() {
                        //             var file = this.files[0];
                        //             var reader = new FileReader();

                        //             reader.onload = function(e) {
                        //                 var imageSrc = e.target.result;
                        //                 newElement.find('img').attr('src', imageSrc);
                        //             }

                        //             reader.readAsDataURL(file);
                        //         });
                        //     }
                        // }


                        // if ($('#' + idPrefix_Labeltype + 'Staticfield6_label').length == 0) {
                        //     if ($('#Staticfield6').is(':checked')) {
                        //         var fieldValue = $('#Staticfield6_name_input').val();

                        //         $('#' + idPrefix_Labeltype).append(
                        //             `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield6_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:454px; top:33px; position:absolute;">
                    //                 <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield6" style="display:inline-block;">  </span>
                    //                 <span id="Staticfield6_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
                    //                     <img src="" alt="Image1" style="width: 0.7in; height: 0.7in;" />
                    //                 </span>
                    //             </span>`
                        //         );

                        //         $('#globalimage2').on('change', function() {
                        //             var file = this.files[0];
                        //             var reader = new FileReader();

                        //             reader.onload = function(e) {
                        //                 var imageSrc = e.target.result;
                        //                 $('#' + idPrefix_Labeltype + 'Staticfield6_label img').attr('src', imageSrc);
                        //             }

                        //             reader.readAsDataURL(file);
                        //         });
                        //     }
                        // }

                    // }


                    $('.fieldname_check').each(function() {
                        var idPrefix_Labeltype = 'labelcontainer';
                        // if ($("#dynamic-btn").is(":checked") == true) {
                        //     idPrefix_Labeltype = "innerlabel";

                        // }
                        var checkboxId = $(this).attr('id'); // Get the ID of the clicked checkbox
                        var metalabelId = checkboxId.replace('fn', ''); // Construct the metalabel ID

                        if ($(this).is(':checked')) {
                            // Checkbox is checked, show the metalabel content
                            $('#' + idPrefix_Labeltype + metalabelId).show();

                        } else {
                            // Checkbox is unchecked, hide the metalabel content
                            $('#' + idPrefix_Labeltype + metalabelId).hide();
                        }
                    });

                } else if ($('.predefined_dynamic:checked').val() == 'dynamic') {

                    @if ($config_data->product_name_use === 'off')

                        if ($('#' + idPrefix_Labeltype + "productname_label").length == 0) {

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productname_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 36.9922px; top: 80.9922px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productname" style="display:inline-block ; white-space: nowrap;">${metalabel.product_name}</span><span style="color:#ff5454"><span class="delimiter"> :</span> XXXXXXX </span>
                            </span>`);

                        }
                    @endif

                    @if ($config_data->l_field1_use === 'on')
                        if ($('#' + idPrefix_Labeltype + 'labelstaticfield1_label').length == 0) {
                            if ($('#labelstaticfield1').is(':checked')) {



                                if ($('#labelstaticfield1fn').is(':checked')) {
                                    var val = $('#labelstaticfield1_input').val();
                                    var fieldValue = $('#Staticfield_name_input')
                                        .val(); // Get the value of the element with id "Staticfield_name_input"

                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: nowrap;left:46px; top:416px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield1"  style="display:inline-block;">{{ $config_data->label_static_field1 }}</span> <span class="labelstaticfield1 fieldvalue" style="white-space: pre-line;"><span class="delimiter"> :</span>${val}</span>
                        </span>`);
                                }
                            }
                        }
                    @endif

                    @if ($config_data->l_field2_use === 'on')

                        if ($('#' + idPrefix_Labeltype + 'labelstaticfield2_label').length == 0) {
                            if ($('#labelstaticfield2').is(':checked')) {


                                if ($('#labelstaticfield2fn').is(':checked')) {
                                    var val = $('#labelstaticfield2_input').val();
                                    var fieldValue = $('#Staticfield2_name_input')
                                        .val(); // Get the value of the element with id "Staticfield2_name_input"
                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: nowrap;left:46px; top:450px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield2"  style="display:inline-block;">{{ $config_data->label_static_field2 }}</span> <span class="labelstaticfield2 fieldvalue" style="white-space: pre-line;"><span class="delimiter"> :</span>${val}</span>
                        </span>`);
                                }
                            }
                        }
                    @endif

                    if ($('#' + idPrefix_Labeltype + 'Freefield1_label').length == 0) {

                        var field1Value = $('#Freefield1_name_input')
                            .val(); // Get the value of the element with id "Freefield1_name_input"
                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:219px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter"  id="${idPrefix_Labeltype}Freefield1" style="display:inline-block;"> ${field1Value} : </span>  <span class="fieldname" style="color:#ff5454"> XXXXX </span>
                        </span>`);

                        var parameter_canDoubleClickKeyup = this.id + '_name';
                        canDoubleClickKeyup(parameter_canDoubleClickKeyup);
                    }

                    if ($('#' + idPrefix_Labeltype + 'Freefield2_label').length == 0) {
                        if ($('#Freefield2').is(':checked')) {

                            var field2Value = $('#Freefield2_name_input').val();

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:251px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield2"  style="display:inline-block;">${field2Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);

                        }
                    }

                    if ($('#' + idPrefix_Labeltype + 'Freefield3_label').length == 0) {

                        var field3Value = $('#Freefield3_name_input').val();
                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield3_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:289px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield3"  style="display:inline-block;">${field3Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                    }

                    if ($('#' + idPrefix_Labeltype + 'Freefield4_label').length == 0) {
                        if ($('#Freefield4').is(':checked')) {

                            var field4Value = $('#Freefield4_name_input').val();
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield4_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:323px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield4"  style="display:inline-block;">${field4Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                        }

                    }

                    if ($('#' + idPrefix_Labeltype + 'Freefield5_label').length == 0) {
                        if ($('#Freefield5').is(':checked')) {

                            var field5Value = $('#Freefield5_name_input').val();

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield5_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:356px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield5"  style="display:inline-block;">${field5Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                        }

                    }

                    if ($('#' + idPrefix_Labeltype + 'Freefield6_label').length == 0) {
                        if ($('#Freefield6').is(':checked')) {

                            var field6Value = $('#Freefield6_name_input').val();

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield6_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:388px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield6"  style="display:inline-block;">${field6Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                        }

                    }
                    if ($('#' + idPrefix_Labeltype + 'Freefield7_label').length == 0) {
                            if ($('#Freefield7').is(':checked')) {

                                var field7Value = $('#Freefield7_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield7_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:48px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield7"  style="display:inline-block; white-space:nowrap;">${field7Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield8_label').length == 0) {
                            if ($('#Freefield8').is(':checked')) {

                                var field8Value = $('#Freefield8_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield8_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:75px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield8"  style="display:inline-block; white-space:nowrap;">${field8Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }

                        if ($('#' + idPrefix_Labeltype + 'Freefield9_label').length == 0) {
                            if ($('#Freefield9').is(':checked')) {

                                var field9Value = $('#Freefield9_name_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Freefield9_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:102px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname delimiter" id="${idPrefix_Labeltype}Freefield9"  style="display:inline-block; white-space:nowrap;">${field9Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXX </span>
                        </span>`);
                            }

                        }
                    if ($('#' + idPrefix_Labeltype + 'global_image1').length == 0) {
                            $("#global_image1").show();
                        }
                    if ($('#' + idPrefix_Labeltype + 'global_image2').length == 0) {
                        $("#global_image2").show();
                    }
                    if ($('#' + idPrefix_Labeltype + 'label_image1').length == 0) {
                            $("#label_image1").show();
                        }
                        if ($('#' + idPrefix_Labeltype + 'label_image2').length == 0) {
                            $("#label_image2").show();
                        }
                } else {
                    console.log("else remove");
                }
            } else {
                $.map($('#' + idPrefix_Labeltype).find('.textnonstore'), function(el) {
                    $('#' + $(el).attr('id')).remove();
                });
                $('.nonstore').prop("checked", false);
                setHeightWidth();
                $('#labelimage1_input').css('display', 'none');
                $('#labelimage2_input').css('display', 'none');
                $('#label1_text_container').css('display', 'none');
                $('#label2_text_container').css('display', 'none');
                $('#global_image1').css('display', 'none');
                $('#global_image2').css('display', 'none');
                $('#label_image1').css('display', 'none');
                $('#label_image2').css('display', 'none');
            }

        });

        $(".line-vertical, .line-horizontal").hide();

        $(document).on('change', function() {
            var idPrefix_Labeltype = 'labelcontent';
            const lineVertical = document.querySelector('.line-vertical');
            const lineHorizontal = document.querySelector('.line-horizontal');

            $('.textnonstore').draggable({
                start: function(event, ui) {
                    $(".line-vertical, .line-horizontal").show();
                },
                drag: function(event, ui) {
                    var x = ui.position.left + ui.helper.width() / 2;
                    var y = ui.position.top + ui.helper.height() / 2;
                    $(".line-vertical").css("left", x + "px");
                    $(".line-horizontal").css("top", y + "px");
                },
                stop: function() {
                    $(".line-vertical, .line-horizontal").hide();
                },
                containment: `#${idPrefix_Labeltype}`,
            });

            $('.textnonstore').resizable({
                containment: `#${idPrefix_Labeltype}`,
            });

            $('#span_BARcodeBig_nonstore').draggable({
                containment: `#${idPrefix_Labeltype}`,
            });

            $('#span_BARcode_nonstore').draggable({
                containment: `#${idPrefix_Labeltype}`,
            });

        });

        $(document).on('click', '#selectall', function() {
            var idPrefix_Labeltype = 'labelcontent';
            if ($('#selectall').is(':checked') === true) {
                var id = [];
                var height = [];
                var width = [];
                $.map($('#' + idPrefix_Labeltype).find('.textnonstore'), function(el) {
                    id.push($(el).attr('id'));
                    height.push($('#' + $(el).attr('id')).height() + 10);
                    width.push($('#' + $(el).attr('id')).width() + 10);
                });
                for (i = 0; i < id.length; i++) {
                    $('#' + id[i]).css('height', height[i] + 'px');
                    $('#' + id[i]).css('width', width[i] + 'px');
                }
                $('#Staticfield_input').prop('disabled', false);

            } else {
                var id = [];
                var height = [];
                var width = [];
                $.map($('#' + idPrefix_Labeltype).find('.textnonstore'), function(el) {
                    id.push($(el).attr('id'));
                    height.push($('#' + $(el).attr('id')).height() - 10);
                    width.push($('#' + $(el).attr('id')).width() - 10);
                });
                for (i = 0; i < id.length; i++) {
                    $('#' + id[i]).css('height', height[i] + 'px');
                    $('#' + id[i]).css('width', width[i] + 'px');
                }
                $('#Staticfield_input').prop('disabled', true);


            }
        });

        $(document).on('click', '.nonstore', function() {
            var idPrefix_Labeltype = 'labelcontent';
            if ($('#' + this.id).is(":checked")) {
                var width = $('#' + idPrefix_Labeltype + this.id + '_label').width() + 10;
                var height = $('#' + idPrefix_Labeltype + this.id + '_label').height() + 10;

                $('#' + idPrefix_Labeltype + this.id + '_label').css('height', height + 'px');
                $('#' + idPrefix_Labeltype + this.id + '_label').css('width', width + 'px');
            } else {
                var width = $('#' + idPrefix_Labeltype + this.id + '_label').width() - 10;
                var height = $('#' + idPrefix_Labeltype + this.id + '_label').height() - 10;

                $('#' + idPrefix_Labeltype + this.id + '_label').css('height', height + 'px');
                $('#' + idPrefix_Labeltype + this.id + '_label').css('width', width + 'px');
            }
            selectbox();
        });

        // $('#organizationname').change(function(){
        //     if($('#organizationname').is(':checked') ===  true){
        //         $('#organizationnamefn').prop('checked',true);
        //     }else{
        //         $('#organizationnamefn').prop('checked',false);
        //     }
        // });


        $(document).ready(function() {
            // Attach change event handler to all checkboxes with class "fieldname_check"
            $('.fieldname_check').change(function() {
                var idPrefix_Labeltype = 'labelcontent';
                let metaData = @json($config_data);

                var checkboxId = $(this).attr('id'); // Get the ID of the clicked checkbox
                var metalabelId = checkboxId.replace('fn', ''); // Construct the metalabel ID
                if ($(this).is(':checked')) {
                    $('#' + idPrefix_Labeltype + metalabelId).append(function() {
                        if (checkboxId === 'organizationnamefn') {
                            return 'Company Name'
                        } else if(checkboxId === 'productnamefn') {
                            return metaData.product_name
                        }else if(checkboxId === 'productidfn') {
                            return metaData.product_id
                        }else if(checkboxId === 'productcommentsfn') {
                            return metaData.comments
                        }else if(checkboxId === 'productstaticfield1fn') {
                            return metaData.p_static_field1
                        }else if(checkboxId === 'productstaticfield2fn') {
                            return metaData.p_static_field2
                        }else if(checkboxId === 'productstaticfield3fn') {
                            return metaData.p_static_field3
                        }else if(checkboxId === 'productstaticfield4fn') {
                            return metaData.p_static_field4
                        }else if(checkboxId === 'productstaticfield5fn') {
                            return metaData.p_static_field5
                        }else if(checkboxId === 'productstaticfield6fn') {
                            return metaData.p_static_field6
                        }else if(checkboxId === 'productstaticfield7fn') {
                            return metaData.p_static_field7
                        }else if(checkboxId === 'productstaticfield8fn') {
                            return metaData.p_static_field8
                        }else if(checkboxId === 'productstaticfield9fn') {
                            return metaData.p_static_field9
                        }else if(checkboxId === 'productstaticfield10fn') {
                            return metaData.p_static_field10
                        }else if(checkboxId === 'batchstaticfield1fn') {
                            return metaData.b_static_field1
                        }else if(checkboxId === 'batchstaticfield2fn') {
                            return metaData.b_static_field2
                        }else if(checkboxId === 'batchstaticfield3fn') {
                            return metaData.b_static_field3
                        }else if(checkboxId === 'batchstaticfield4fn') {
                            return metaData.b_static_field4
                        }else if(checkboxId === 'batchstaticfield5fn') {
                            return metaData.b_static_field5
                        }else if(checkboxId === 'serialnofn') {
                            return metaData.serialno
                        }else if(checkboxId === 'batchnofn') {
                            return metaData.batch_number
                        }else if(checkboxId === 'dateofmanufacturefn') {
                            return metaData.date_of_manufacturing
                        }else if(checkboxId === 'dateofexpfn') {
                            return metaData.date_of_expiry
                        }else if(checkboxId === 'dateofretestfn') {
                            return metaData.date_of_retest
                        }else if(checkboxId === 'containernofn') {
                            return metaData.container_no
                        }else if(checkboxId === 'dynamicfield1fn') {
                            return metaData.dynamic_field1
                        }else if(checkboxId === 'dynamicfield2fn') {
                            return metaData.dynamic_field2
                        }else if(checkboxId === 'netweightfn') {
                            return metaData.net_weight
                        }else if(checkboxId === 'tareweightfn') {
                            return metaData.tare_weight
                        }else if(checkboxId === 'grossweightfn') {
                            return metaData.gross_weight
                        }else if(checkboxId === 'globalstaticfield1fn') {
                            return metaData.global_static_field1
                        }else if(checkboxId === 'globalstaticfield2fn') {
                            return metaData.global_static_field2
                        }else if(checkboxId === 'labelstaticfield1fn') {
                            return metaData.label_static_field1
                        }else if(checkboxId === 'labelstaticfield2fn') {
                            return metaData.label_static_field2
                        }else if(checkboxId === 'Freefield1fn') {
                            return $('#Freefield1_name_input').val();
                        }else if(checkboxId === 'Freefield2fn') {
                            return $('#Freefield2_name_input').val();
                        }else if(checkboxId === 'Freefield3fn') {
                            return $('#Freefield3_name_input').val();
                        }else if(checkboxId === 'Freefield4fn') {
                            return $('#Freefield4_name_input').val();
                        }else if(checkboxId === 'Freefield5fn') {
                            return $('#Freefield5_name_input').val();
                        }else if(checkboxId === 'Freefield6fn') {
                            return $('#Freefield6_name_input').val();
                        }else if(checkboxId === 'Freefield7fn') {
                            return $('#Freefield7_name_input').val();
                        }else if(checkboxId === 'Freefield8fn') {
                            return $('#Freefield8_name_input').val();
                        }else if(checkboxId === 'Freefield9fn') {
                            return $('#Freefield9_name_input').val();
                        }
                    });

                    $('#' + idPrefix_Labeltype + metalabelId +'_label').find('.delimiter').append(" :");
                } else {
                    // Checkbox is unchecked, empty the metalabel content
                    $('#' + idPrefix_Labeltype + metalabelId).empty();
                    $('#' + idPrefix_Labeltype + metalabelId +'_label').find('.delimiter').empty();
                }


            });
            var idPrefix_Labeltype = 'labelcontent';

            var checkboxId = $(this).attr('id'); // Get the ID of the clicked checkbox
            // var metalabelId = checkboxId.replace('fn', ''); // Construct the metalabel ID
            if (this.checked) {
                $('#' + checkboxId).prop('disabled', true);
            } else {
                $('#' + checkboxId).prop('disabled', false);
            }




        });
    </script>


    <script>
        // Get all the ul elements
        var ulElements = document.querySelectorAll("ul.droptrue");

        // Add click event listener to each ul element
        ulElements.forEach(function(ulElement) {
            ulElement.addEventListener("click", function() {
                // Remove focus class from all ul elements
                ulElements.forEach(function(ul) {
                    ul.classList.remove("focus");
                });

                // Add focus class to the clicked ul element
                ulElement.classList.add("focus");
            });
        });

        $('.textnonstore').each(function() {
            label_id = this.id;
            var sotable_id = $('#' + label_id).closest('ul').attr('id');
            var ul_index = $('#' + label_id).index();
            $('.' + label_id + 'position').val(sotable_id + '_' + ul_index);
            $('#' + label_id + 'bold').val($('#' + label_id).css('font-weight'));
            $('#' + label_id + 'italic').val($('#' + label_id).css('font-style'));
            $('#' + label_id + 'underline').val($('#' + label_id).css('text-decoration'));
            $('#' + label_id + 'align').val($('#' + label_id).css('text-align'));
            // $('#'+label_id+'size').val($('#' + label_id).css('font-size').slice(0, -2));
            $('#' + label_id + 'family').val($('#' + label_id).css('font-family'));
        });

        $('input:checkbox').attr('disabled', true);
        $('#containerdiv').css('pointer-events', 'all');

        $('#edit').click(function() {
            $('input').attr('readonly', false);
            $('input:checkbox').attr('disabled', false);
            $('#containerdiv').css('pointer-events', 'all');
            $('#save').show();
            $("#save").attr('disabled', false);
        });

        //ended

    </script>

    <style>
        .dragging li.ui-state-hover {
            min-width: auto !important;
            width: auto !important;
        }

        .textnonstore:hover {
            cursor: grab;
        }

        .unwantedfordynamiclabel {
            font-size: 12px;
        }

        .focus {
            border: 2px dashed #515151 !important;
            cursor: all-scroll !important;
        }



        /* #draggable
    {
        width: 100px;
        height: 100px;
        padding: 0.5em;
        margin: 10px 10px 10px 0;
    }
      */

        .dragging .ui-state-hover a {
            color: green !important;
            font-weight: bold;
        }

        .connectedSortable tr,
        .ui-sortable-helper {
            cursor: move;
        }

        .connectedSortable tr:first-child {
            cursor: default;
        }

        /* .ui-sortable-placeholder {
        background: yellow;
    } */

        td {
            padding: 5px;
            text-align: center;
            background-color: white;
        }

        .focus {
            border: 2px dashed #000;
            padding: 2px;
            cursor: all-scroll;
        }

        table {
            border-radius: 0px 10px 10px 10px !important;
        }




        .active {
            /* background-color: #D6EDFF !important; */
            /* box-shadow: 0px 0px 1px 0px; */
            color: #000 !important;
            font-size: 14px;
            cursor: pointer;

        }

        .inactive {
            /* background-color: #6a6a6a */
            color: #838383;
            width: 50px;
            padding: 10px;
            border-radius: 5px 5px 2px 2px;
            border-bottom: 1px solid;
            /* box-shadow: 0 0px 3px rgba(0, 0, 0, 0.3); */
            cursor: pointer;
            font-size: 14px;
        }

        .inactive:hover {

            color: #000;
            width: 3px;
            cursor: pointer;
            border-radius: 3px;
        }

        .ui-state-default {
            background: none !important;
            border: none !important;
        }

        .ui-state-default:hover {
            border: 1px solid #bcb7b7 !important;
        }

        .ui-icon {
            background-image: none !important;
        }



        li {
            text-decoration: none !important;
            list-style-type: none !important;
        }

        /* li:hover {
        cursor: move;
    } */

        ul {
            min-height: 50px;
            min-width: 50px;
            width: 150px;
            height: auto;
        }

        .but1 {
            background-color: rgb(0, 0, 0) !important;
            border-radius: 5px !important;
            color: #fff !important;
            font-weight: 500;
        }

        /* -------- */
        tr:hover {
            color: #000;
            background-color: white;

        }

        .label {
            color: #fff;
            font-size: 17px;
        }

        .swal-wide {
            width: 25%;
            font-size: 16px !important;
            color: white;
            text-align: center;
        }

        .ui-state-default:hover {
            border: 1px solid #bcb7b7 !important;
        }

        .ui-state-default {
            background: none !important;
            border: none !important;
        }

        .focus {
            border: 2px dashed #515151 !important;
            cursor: all-scroll !important;
        }

        .textnonstore {
            display: inline-block !important;
        }

        #span_BARcode_nonstore:hover {
            cursor: grab;
            border: 0.5px dashed rgb(0 0 0);
        }

        #span_BARcodeBig_nonstore:hover {
            cursor: grab;
            border: 0.5px dashed rgb(0 0 0);
        }

        .content {
            background-color: #fff !important;
            padding: 5px 0px 0px 5px;
            margin-top: 8px;
            width: 300px !important;
            margin-left: 0px !important;
            border: 1px solid #F0F0F0;

        }

        body {
            background-color: #F0F0F0 !important;
            overflow-x: hidden; /* Prevent horizontal scrolling */
            overflow-y: auto;            /* cursor:pointer; */
        }

        .but1:disabled {
            color: #fff;
            background-color: #aeb7c1 !important;
            border-color: #aeb7c1 !important;
        }

        .delimiter {
            color: black !important;
        }



        .swal2-popup {
            zoom: 75% !important;

        }
        .swal2-input{
            background-color:#fff;
            color:#000;
        }


        /* new method */
        .draggable {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            line-height: 50px;
            cursor: grab;
        }

        .line-vertical,
        .line-horizontal {
            position: absolute;
            background-color: #3498db;
            z-index: 1;
        }

        .line-vertical {
            width: 2px;
            height: 100%;
            left: 0%;
            transform: translateX(-50%);
        }

        .line-horizontal {
            width: 100%;
            height: 2px;
            top: 0%;
            transform: translateY(-50%);
        }


        #ruler_div {
            --ruler-num-c: #000;
            --ruler-num-fz: 10px;
            --ruler-num-pi: 0.75ch;
            --ruler-unit: 0.75px;
            --ruler-x: 1;
            --ruler-y: 1;

            --ruler1-bdw: 1px;
            --ruler1-c: #000;
            --ruler1-h: 8px;
            --ruler1-space: 5;

            --ruler2-bdw: 1px;
            --ruler2-c: #000;
            --ruler2-h: 20px;
            --ruler2-space: 50;

            /* background-attachment: fixed; */
            background-image:
                linear-gradient(90deg, var(--ruler1-c) 0 var(--ruler1-bdw), transparent 0),
                linear-gradient(90deg, var(--ruler2-c) 0 var(--ruler2-bdw), transparent 0),
                linear-gradient(0deg, var(--ruler1-c) 0 var(--ruler1-bdw), transparent 0),
                linear-gradient(0deg, var(--ruler2-c) 0 var(--ruler2-bdw), transparent 0);
            background-position: 0 0;
            background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
            background-size:
                calc(var(--ruler-unit) * var(--ruler1-space) * var(--ruler-x)) var(--ruler1-h),
                calc(var(--ruler-unit) * var(--ruler2-space) * var(--ruler-x)) var(--ruler2-h),
                var(--ruler1-h) calc(var(--ruler-unit) * var(--ruler1-space) * var(--ruler-y)),
                var(--ruler2-h) calc(var(--ruler-unit) * var(--ruler2-space) * var(--ruler-y));
        }

        /* Ruler Numbers */
        .ruler-x,
        .ruler-y {
            color: var(--ruler-num-c);
            counter-reset: d 0;
            display: flex;
            font-size: var(--ruler-num-fz);
            /* line-height: 1; */
            list-style: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }

        .ruler-x {
            /* margin-top: -11%; */
            height: var(--ruler2-h);
            inset-block-start: 0;
            inset-inline-start: calc(var(--ruler-unit) * var(--ruler2-space));
            opacity: var(--ruler-x);
            width: 86%;
            margin-left: -9.8%;
            margin-top: -1%;
            position: relative;
            /* margin: 7% 26%; */
        }

        .ruler-y {
            flex-direction: column;
            height: 82%;
            inset-block-start: calc(var(--ruler-unit) * var(--ruler2-space));
            inset-inline-start: 0;
            /* opacity: var(--ruler-y); */
            /* width: 100% !important; */
            position: relative;
            /* margin: 6% 28%; */

        }

        .ruler-x li {
            align-self: flex-end;
        }

        .ruler-x li,
        .ruler-y li {
            counter-increment: d;
            flex: 0 0 calc(var(--ruler-unit) * var(--ruler2-space));
        }

        .ruler-x li::after {
            content: counter(d)"";
            line-height: 1;
            padding-inline-start: 4ch;
        }

        .ruler-y li::after {
            content: counter(d)"";
            display: block;
            padding-inline-start: 2.25ch;
            transform: rotate(-90deg) translateY(-13px);
            transform-origin: 100% 0%;
            text-align: end;
            width: 100%;
        }

        /* DEMO, EDITOR */
        /* Styles for 200% browser zoom */
        @media (min-resolution: 192dpi) {

            /* Adjustments for 200% browser zoom */
            .ruler-x {
                /* ... your adjusted styles for 200% zoom ... */
            }

            .ruler-y {
                /* ... your adjusted styles for 200% zoom ... */
            }
        }

        .navbar {
            zoom: 80% !important;
        }
        #span_QRcode_nonstore:hover {
            cursor: grab;
            border: 0.5px dashed rgb(0 0 0);
        }
        .global:hover {
            border: 2px solid #bcb7b7 !important;
            cursor: grab;
        }



    </style>
@endsection

