@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.js" defer></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" defer></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
        integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"
        integrity="sha512-NFUcDlm4V+a2sjPX7gREIXgCSFja9cHtKPOL1zj6QhnE0vcY695MODehqkaGYTLyL2wxe/wtr4Z49SvqXq12UQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.rawgit.com/tecnickcom/tfpdf/0a64487c/tcpdf.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form action="/savelabeldesign" method="POST" id="formId" enctype="multipart/form-data">
        @csrf
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
                <table style="width:106%;min-height: 600px; border-radius:25px !important; text-align:left; height:100%; ">
                    <tr>
                        <td style="background-color:#F0F0F0; border-top-left-radius: 25px;border-top-right-radius: 25px; padding:10px;text-align:right;zoom:85%;"
                            colspan="2">
                            <label
                                style="color:#000;margin-right:15px;float:left;font-size: 18px !important;font-weight:bold;"><input
                                    type="radio" style="margin-right:5px;cursor:pointer;" class="predefined_dynamic"
                                    name="predefined_dynamic" value="predefined" id="predefined-btn" style=""
                                    checked>Predefined</label>
                            <label style="color:#000;float:left;font-size: 18px !important;font-weight:bold;"><input
                                    type="radio" style="margin-right:5px;cursor:pointer;" class="predefined_dynamic"
                                    name="predefined_dynamic" value="dynamic" id="dynamic-btn"
                                    style="">Dynamic</label>

                            <div
                                style="float:right; display:inline-block; padding-inline: 5%;font-size: 16px !important;font-weight:bold;">
                                <span id="labelwidthIdentifer">200</span><span>mm</span>
                                <span>x</span>
                                <span id="labelheightIdentifer">130</span><span>mm</span></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#fff !important;border-top-left-radius: 25px; padding-bottom:15px;">
                            <!-- <h3 class="headingfont"> <b style="color:#000;"> shipper Label Config </b></h3> -->
                        </td>
                        <td rowspan="8" id="ruler_div"
                            style="background-color:#F0F0F0;border:1px solid #000;padding-left:31px;padding-top:39px">
                            <div style="position:relative;top: -57.5%;">
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
                                <div style="position:absolute;left: 0.9%;">


                                    <div class="lab clone containertbody container"
                                        style="box-shadow: 0px 2px 8px rgb(103 71 13); padding:0;font-family:Arial;background-color:#fff !important;width:200mm; height:130mm;margin-top:1%; position:relative"
                                        id="shipperlabel">
                                        <div class="line-vertical"></div>
                                        <div class="line-horizontal"></div>

                                        <span id="span_QRcode_nonstore" class="showqrcode"
                                            style="position:absolute; left:605px; top:65px;"></span>
                                        <span id="span_datamatrix_nonstore"
                                            class="showmatrixcode"style="position:absolute; left:605px; top:65px;"></span>

                                        {{-- @if ($config_data->g_image1_use === 'on' && $config_data->g1_image)
                                        <img src="{{ asset('images/' . $config_data->g1_image) }}" alt="" style="position:absolute; left:600px; top:150px; width: 0.7in; height: 0.7in;">
                                    @endif
                                    @if ($config_data->g_image2_use === 'on' && $config_data->g2_image)
                                        <img src="{{ asset('images/' . $config_data->g2_image) }}" alt="" style="position:absolute; left:600px; top:250px; width: 0.7in; height: 0.7in;">
                                    @endif --}}


                                    </div>
                                    <div class="lab clone1 tbody container"
                                        style="box-shadow: 0px 2px 8px rgb(103 71 13); padding:0;font-family:Arial;background-color:#fff !important;display:none !important; width:200mm; height:130mm; position:relative"
                                        id="innerlabel">
                                        <div class="line-vertical"></div>
                                        <div class="line-horizontal"></div>
                                        <span class="showqrcode"id="inner-span_QRcode_nonstore"
                                            style="position:absolute; left:605px; top:65px;">{!! QrCode::size(80)->generate(
                                                $config_data->product_name .
                                                    ' :XXXXXXXXXXXXXXX , ' .
                                                    $config_data->product_id .
                                                    ' : XXXXXXXX , ' .
                                                    $config_data->batch_number .
                                                    ' : XXXXXXXXX , ' .
                                                    $config_data->net_weight .
                                                    ' : XXX , ' .
                                                    $config_data->gross_weight .
                                                    ' : XXX ,' .
                                                    $config_data->tare_weight .
                                                    ' : XXX',
                                            ) !!}
                                        </span>
                                        <span class="showmatrixcode"id="inner-span_datamatrix_nonstore"
                                            style="position:absolute; left:605px; top:65px;"></span>

                                    </div>
                                </div>
                            </div>
            </div>
            </td>
            </tr>
            <tr>
                <td style=" text-align:left; width:25%; background-color:fff;box-shadow: 0 3px 6px #73737380;">
                    <div style="white-space:nowrap;">
                        <span class="inactive active mouseup" style="margin-right:30px;" id="text_tab"><b>Text</b></span>
                        <span class="inactive mouseup" style="margin-right:30px;" id="QR_tab"><b>QR</b></span>
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
                                <input type="checkbox" id="selectall" name="selectall"
                                    class="nonstore_check viewpermission" style="margin-left:10px;cursor:pointer; ">&nbsp;
                                <em style="font-weight:600; font-size:12px;">Select
                                    all</em>
                            </td>

                            <td style="text-align:left;z-index: 100;white-space:nowrap;">
                                &nbsp; <em style="font-weight:600; font-size:12px;">Print field
                                    name</em>
                            </td>


                        </tr>
                        <tr>
                            <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                                <input type="checkbox" class="nonstore viewpermission" id="organisationname"
                                    name="organisationname" style="margin-left:10px;">&nbsp; Organization Name
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="organisationnamefn" name="organisationnamefn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        @if ($config_data->product_name_use == 'on')
                            <tr>
                                <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                                    <input type="checkbox" class="nonstore viewpermission" id="productname"
                                        name="productname" style="margin-left:10px;">&nbsp;
                                    {{ $config_data->product_name }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="productnamefn" name="productnamefn"
                                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                                </td>
                            </tr>
                        @endif
                        @if ($config_data->product_id_use == 'on')
                            <tr class="unwantedfordynamiclabel">
                                <td colspan="1" style="text-align:left;white-space:nowrap ">
                                    <input type="checkbox" class="nonstore viewpermission" id="productid"
                                        name="productid" style="margin-left:10px;">&nbsp; {{ $config_data->product_id }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="productidfn" name="productidfn"
                                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                                </td>
                            </tr>
                        @endif

                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productcomments"
                                    name="productcomments" style="margin-left:10px;">&nbsp; {{ $config_data->comments }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productcommentsfn" name="productcommentsfn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>


                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field1_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>

                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield1"
                                    name="productstaticfield1" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field1 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield1fn" name="productstaticfield1fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>


                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field2_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield2"
                                    name="productstaticfield2" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field2 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield2fn" name="productstaticfield2fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field3_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield3"
                                    name="productstaticfield3" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field3 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield3fn" name="productstaticfield3fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field4_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield4"
                                    name="productstaticfield4" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field4 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield4fn" name="productstaticfield4fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field5_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield5"
                                    name="productstaticfield5" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field5 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield5fn" name="productstaticfield5fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field6_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield6"
                                    name="productstaticfield6" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field6 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield6fn" name="productstaticfield6fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field7_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield7"
                                    name="productstaticfield7" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field7 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield7fn" name="productstaticfield7fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field8_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield8"
                                    name="productstaticfield8" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field8 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield8fn" name="productstaticfield8fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field9_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield9"
                                    name="productstaticfield9" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field9 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield9fn" name="productstaticfield9fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->p_field10_use == 'off') style="display: none;"
            @else
        style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="productstaticfield10"
                                    name="productstaticfield10" style="margin-left:10px;">&nbsp;
                                {{ $config_data->p_static_field10 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="productstaticfield10fn" name="productstaticfield10fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr style="color:#acacac;font-size: 13px;">
                            <td colspan="2" style="text-align:left; white-space:nowrap">
                                ------------------ Batch level ------------------
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchno" name="batchno"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->batch_number }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchnofn" name="batchnofn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dateofmanufacture"
                                    name="dateofmanufacture" style="margin-left:10px;">&nbsp;
                                {{ $config_data->date_of_manufacturing }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dateofmanufacturefn" name="dateofmanufacturefn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dateofexp" name="dateofexp"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->date_of_expiry }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dateofexpfn" name="dateofexpfn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dateofretest"
                                    name="dateofretest" style="margin-left:10px;">&nbsp;
                                {{ $config_data->date_of_retest }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dateofretestfn" name="dateofretestfn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->b_field1_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield1"
                                    name="batchstaticfield1" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field1 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield1fn" name="batchstaticfield1fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->b_field2_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield2"
                                    name="batchstaticfield2" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field2 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield2fn" name="batchstaticfield2fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->b_field3_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield3"
                                    name="batchstaticfield3" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field3 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield3fn" name="batchstaticfield3fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->b_field4_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield4"
                                    name="batchstaticfield4" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field4 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield4fn" name="batchstaticfield4fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel"
                            @if ($config_data->b_field5_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="batchstaticfield5"
                                    name="batchstaticfield5" style="margin-left:10px;">&nbsp;
                                {{ $config_data->b_static_field5 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="batchstaticfield5fn" name="batchstaticfield5fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr style="color:#acacac;font-size: 13px;">
                            <td colspan="2" style="text-align:left; white-space:nowrap">
                                ------Container level -------
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore" id="containerno" name="containerno"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->container_no }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="containernofn" name="containernofn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="netweight" name="netweight"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->net_weight }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="netweightfn" name="netweightfn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore innerlbl viewpermission" id="grossweight"
                                    name="grossweight" style="margin-left:10px;">&nbsp; {{ $config_data->gross_weight }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="grossweightfn" name="grossweightfn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        <tr class="unwantedfordynamiclabel">
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore innerlbl" id="tareweight" name="tareweight"
                                    style="margin-left:10px;">&nbsp; {{ $config_data->tare_weight }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="tareweightfn" name="tareweightfn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr style="color:#acacac;font-size: 13px;">
                            <td colspan="2" style="text-align:left; white-space:nowrap">
                                ------ Dynamic Field - Container level -------
                            </td>
                        </tr>
                        <tr
                            class="unwantedfordynamiclabel"@if ($config_data->d_field1_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dynamicfield1"
                                    name="dynamicfield1" style="margin-left:10px;">&nbsp;
                                {{ $config_data->dynamic_field1 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dynamicfield1fn" name="dynamicfield1fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr
                            class="unwantedfordynamiclabel"@if ($config_data->d_field2_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="dynamicfield2"
                                    name="dynamicfield2" style="margin-left:10px;">&nbsp;
                                {{ $config_data->dynamic_field2 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="dynamicfield2fn" name="dynamicfield2fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr style="color:#acacac;font-size: 13px;">
                            <td colspan="2" style="text-align:left; white-space:nowrap">
                                -------------- Global Static Field ---------------
                            </td>
                        </tr>

                        <tr
                            class="unwantedfordynamiclabel"@if ($config_data->g_field1_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="globalstaticfield1"
                                    name="globalstaticfield1" style="margin-left:10px;">&nbsp;
                                {{ $config_data->global_static_field1 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="globalstaticfield1fn" name="globalstaticfield1fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>

                        <tr
                            class="unwantedfordynamiclabel"@if ($config_data->g_field2_use == 'off') style="display: none;"
                @else
            style="display: table-row;" @endif>
                            <td colspan="1" style="text-align:left; white-space:nowrap">
                                <input type="checkbox" class="nonstore viewpermission" id="globalstaticfield2"
                                    name="globalstaticfield2" style="margin-left:10px;">&nbsp;
                                {{ $config_data->global_static_field2 }}
                            </td>
                            <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                <input type="checkbox" id="globalstaticfield2fn" name="globalstaticfield2fn"
                                    class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                            </td>
                        </tr>
                        {{-- globale image --}}
                        @if ($config_data->g_image1_use == 'on')
                            <tr class="unwantedfordynamiclabel">
                                <td colspan="1" style="text-align:left; white-space:nowrap">
                                    <input type="checkbox" class="nonstore viewpermission" id="global_gimage1"
                                        name="global_gimage1" style="margin-left:10px;" checked>&nbsp;
                                    {{ $config_data->global_image1 }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="global_gimage1fn" name="global_gimage1fn"
                                        class="fieldname_check viewpermission" style="margin-left:10px;">&nbsp;
                                </td>
                            </tr>
                        @endif

                        @if ($config_data->g_image2_use == 'on')
                            <tr class="unwantedfordynamiclabel">
                                <td colspan="1" style="text-align:left; white-space:nowrap">
                                    <input type="checkbox" class="nonstore viewpermission" id="global_gimage2"
                                        name="global_gimage2" style="margin-left:10px;" checked>&nbsp;
                                    {{ $config_data->global_image2 }}
                                </td>
                                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                                    <input type="checkbox" id="global_gimage2fn" name="global_gimage2fn"
                                        class="fieldname_check viewpermission" style="margin-left:10px;">&nbsp;
                                </td>
                            </tr>
                        @endif
            </tr>

            <tr style="color:#acacac;font-size: 13px;">
                <td colspan="2" style="text-align:left; white-space:nowrap">
                    -------------- Label Static field ---------------
                </td>
            </tr>
            <tr
                @if ($config_data->l_field1_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" onchange="toggleUploadOption()"
                        id="labelstaticfield1" name="labelstaticfield1" style="margin-left:10px;" />&nbsp; <span
                        class="" id="Staticfield_name">{{ $config_data->label_static_field1 }}
                    </span>
                    <!-- <input type="text" class="Staticfield1inputbox viewpermission" data-original-value="Static field"
                            id="Staticfield_name_input" name="Staticfield1_name_input" placeholder="{{ $config_data->label_static_field1 }}"
                            value="{{ $config_data->label_static_field1 }}" style="display:none" maxlength="100" /> -->
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="labelstaticfield1fn" name="labelstaticfield1fn"
                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                </td>




            <tr
                @if ($config_data->l_field2_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" onchange="toggleUploadOption()"
                        id="labelstaticfield2" name="labelstaticfield2" style="margin-left:10px;" />&nbsp; <span
                        class="" id="Staticfield2_name">{{ $config_data->label_static_field2 }}
                    </span>
                    <!-- <input type="text" class="Staticfield2inputbox viewpermission"
                            data-original-value="Static field" id="Staticfield2_name_input" name="Freefield1_name_input"
                            placeholder="{{ $config_data->label_static_field2 }}" value="{{ $config_data->label_static_field2 }}" style="display:none" maxlength="100" /> -->
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="labelstaticfield2fn" name="labelstaticfield2fn"
                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            <tr style="color:#acacac;font-size: 13px;">
                <td colspan="2" style="text-align:left; white-space:nowrap">
                    ------------------ Image field ------------------
                </td>
            </tr>

            @if ($config_data->image1_use === 'on')
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstore viewpermission" id="label_limage1" name="label_limage1"
                            style="margin-left:10px;"/>&nbsp;
                        <span class="canDoubleClick" id="Staticfield7_name">{{ $config_data->image1 }}</span>
                        <input type="text" class="Staticfield7inputbox viewpermission"
                            data-original-value="Static field" id="label_limage1_input" name="label_limage1_input"
                            placeholder="Static field" value="Static field" style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="label_limage1fn" name="label_limage1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
            @endif

            @if ($config_data->image2_use === 'on')
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstore viewpermission" id="label_limage2"
                            onchange="toggleUploadOption()" name="label_limage2" style="margin-left:10px" />&nbsp; <span
                            class="canDoubleClick" id="Staticfield8_name">{{ $config_data->image2 }}
                        </span><input type="text" class="Staticfield8inputbox viewpermission"
                            data-original-value="Static field" id="label_limage2_input" name="label_limage2_input"
                            placeholder="Static field" value="Static field" style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="label_limage2fn" name="label_limage2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>
            @endif
            <tr style="color:#acacac;font-size: 13px;">
                <td colspan="2" style="text-align:left; white-space:nowrap">
                    -------------------Free fields-------------------
                </td>
            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Sfreefield1" name="Sfreefield1"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="Sfreefield1_name">Free field
                        1</span>
                    <input type="text" class="freefieldinputbox viewpermission" data-original-value="Free field 1"
                        id="Sfreefield1_input" name="Sfreefield1_input" placeholder="Free field 1"
                        value="Free field 1" style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Sfreefield1fn" name="Sfreefield1fn"
                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Sfreefield2" name="Sfreefield2"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="freefield_s2_name">Free field
                        2</span>
                    <input type="text" class="freefieldinputbox viewpermission" data-original-value="Free field 2"
                        id="Sfreefield2_input" name="Sfreefield2_input" placeholder="Free field 2"
                        value="Free field 2" style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Sfreefield2fn" name="Sfreefield2fn"
                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Sfreefield3" name="Sfreefield3"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="freefield_s3_name">Free field
                        3</span>
                    <input type="text" class="freefieldinputbox viewpermission" data-original-value="Free field 3"
                        id="Sfreefield3_input" name="Sfreefield3_input" placeholder="Free field 3"
                        value="Free field 3" style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Sfreefield3fn" name="Sfreefield3fn"
                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                </td>

            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Sfreefield4" name="Sfreefield4"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="freefield_s4_name">Free field
                        4</span>
                    <input type="text" class="freefieldinputbox viewpermission" data-original-value="Free field 4"
                        id="Sfreefield4_input" name="Sfreefield4_input" placeholder="Free field 4"
                        value="Free field 4" style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Sfreefield4fn" name="Sfreefield4fn"
                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Sfreefield5" name="Sfreefield5"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="freefield_s5_name">Free field
                        5</span>
                    <input type="text" class="freefieldinputbox viewpermission" data-original-value="Free field 5"
                        id="Sfreefield5_input" name="Sfreefield5_input" placeholder="Free field 5"
                        value="Free field 5" style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Sfreefield5fn" name="Sfreefield5fn"
                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                    <input type="checkbox" class="nonstore viewpermission" id="Sfreefield6" name="Sfreefield6"
                        style="margin-left:10px;" />&nbsp; <span class="canDoubleClick" id="freefield_s5_name">Free field
                        6</span>
                    <input type="text" class="freefieldinputbox viewpermission" data-original-value="Free field 6"
                        id="Sfreefield6_input" name="Sfreefield6_input" placeholder="Free field 6"
                        value="Free field 6" style="display:none" maxlength="100" />
                </td>
                <td style="text-align:center;z-index: 100;white-space:nowrap;">
                    <input type="checkbox" id="Sfreefield6fn" name="Sfreefield6fn"
                        class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                </td>
            </tr>
            </table>
            <table id="QR_content" class="content" style="height:250px;overflow-y:scroll;display:none">
                <tr>
                    <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                        <input type="checkbox" class="nonstore_check viewpermission" id="showqr" name="showqr"
                            style="margin-left:10px;">&nbsp; Show QR Code
                    </td>

                    <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                        <input type="checkbox" class="nonstore_check viewpermission" id="showdatamatrix"
                            name="showdatamatrix" style="margin-left:10px;">&nbsp; Show Datamatrix
                    </td>

                </tr>
                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        ----Select the fields to show in QR----
                    </td>
                </tr>
                <tr style="  position:sticky; top:-5px;">
                    <td style="text-align:left;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="selectallqr" name="selectallqr" class="nonstore_check viewpermission"
                            style="margin-left:10px;cursor:pointer; ">&nbsp; <em
                            style="font-weight:600; font-size:12px;">Select
                            all</em>
                    </td>

                    <td style="text-align:left;z-index: 100;white-space:nowrap;">
                        &nbsp; <em style="font-weight:600; font-size:12px;">Print field
                            name</em>
                    </td>


                </tr>
                <tr>
                    <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrCompanyName" name="CompanyName"
                            style="margin-left:10px;">&nbsp; Organization Name
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrCompanyNamefn" name="CompanyNamefn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="text-align:left;white-space:nowrap;font-size:12px; ">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrProductName" name="ProductName"
                            style="margin-left:10px;">&nbsp; {{ $config_data->product_name }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrProductNamefn" name="ProductNamefn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left;white-space:nowrap ">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrbrandname" name="brandname"
                            style="margin-left:10px;">&nbsp; {{ $config_data->product_id }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrbrandnamefn" name="brandnamefn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrBatchNo" name="BatchNo"
                            style="margin-left:10px;">&nbsp; {{ $config_data->batch_number }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrBatchNofn" name="BatchNofn" class="fieldname_check viewpermission"
                            style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrNetweight" name="Netweight"
                            style="margin-left:10px;">&nbsp; {{ $config_data->net_weight }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrNetweightfn" name="Netweightfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr innerlbl viewpermission" id="qrGrossWeight"
                            name="GrossWeight" style="margin-left:10px;">&nbsp; {{ $config_data->gross_weight }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrGrossWeightfn" name="GrossWeightfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr innerlbl" id="qrtareWeight" name="tareWeight"
                            style="margin-left:10px;">&nbsp; {{ $config_data->tare_weight }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrtareWeightfn" name="tareWeightfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrDateofMFG" name="DateofMFG"
                            style="margin-left:10px;">&nbsp; {{ $config_data->date_of_manufacturing }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrDateofMFGfn" name="DateofMFGfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrDateofExp" name="DateofExp"
                            style="margin-left:10px;">&nbsp; {{ $config_data->date_of_expiry }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrDateofExpfn" name="DateofExpfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrDateofRetest" name="DateofRetest"
                            style="margin-left:10px;">&nbsp; {{ $config_data->date_of_retest }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrDateofRetestfn" name="DateofRetestfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel">
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr" id="qrAdlfield" name="Adlfield"
                            style="margin-left:10px;">&nbsp; {{ $config_data->container_no }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrAdlfieldfn" name="Adlfieldfn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field1_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>

                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrBatchsize" name="Batchsize"
                            style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field1 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrBatchsizefn" name="Batchsizefn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>


                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field2_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields2"
                            name="Staticfields2" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field2 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields2fn" name="Staticfields2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field3_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields3"
                            name="Staticfields3" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field3 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields3fn" name="Staticfields3fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field4_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields4"
                            name="Staticfields4" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field4 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields4fn" name="Staticfields4fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field5_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields5"
                            name="Staticfields5" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field5 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields5fn" name="Staticfields5fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field6_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields6"
                            name="Staticfields6" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field6 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields6fn" name="Staticfields6fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field7_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields7"
                            name="Staticfields7" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field7 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields7fn" name="Staticfields7fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field8_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields8"
                            name="Staticfields8" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field8 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields8fn" name="Staticfields8fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field9_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields9"
                            name="Staticfields9" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field9 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields9fn" name="Staticfields9fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->p_field10_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields10"
                            name="Staticfields10" style="margin-left:10px;">&nbsp; {{ $config_data->p_static_field10 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields10fn" name="Staticfields10fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        ------------------ Batch level ------------------
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->b_field1_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields11"
                            name="Staticfields11" style="margin-left:10px;">&nbsp; {{ $config_data->b_static_field1 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields11fn" name="Staticfields11fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->b_field2_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields12"
                            name="Staticfields12" style="margin-left:10px;">&nbsp; {{ $config_data->b_static_field2 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields12fn" name="Staticfields12fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->b_field3_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields13"
                            name="Staticfields13" style="margin-left:10px;">&nbsp; {{ $config_data->b_static_field3 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields13fn" name="Staticfields13fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->b_field4_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields14"
                            name="Staticfields14" style="margin-left:10px;">&nbsp; {{ $config_data->b_static_field4 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields14fn" name="Staticfields14fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr class="unwantedfordynamiclabel"
                    @if ($config_data->b_field5_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfields15"
                            name="Staticfields15" style="margin-left:10px;">&nbsp; {{ $config_data->b_static_field5 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfields15fn" name="Staticfields15fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        ------ Dynamic Field - Container level -------
                    </td>
                </tr>
                <tr
                    class="unwantedfordynamiclabel"@if ($config_data->d_field1_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrdynamicfield1"
                            name="dynamicfield1" style="margin-left:10px;">&nbsp; {{ $config_data->dynamic_field1 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrdynamicfield1fn" name="dynamicfield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr
                    class="unwantedfordynamiclabel"@if ($config_data->d_field2_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrdynamicfield2"
                            name="dynamicfield2" style="margin-left:10px;">&nbsp; {{ $config_data->dynamic_field2 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrdynamicfield2fn" name="dynamicfield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        -------------- Global Static Field ---------------
                    </td>
                </tr>

                <tr
                    class="unwantedfordynamiclabel"@if ($config_data->g_field1_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrglobalstaticfield1"
                            name="globalstaticfield1" style="margin-left:10px;">&nbsp;
                        {{ $config_data->global_static_field1 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrglobalstaticfield1fn" name="globalstaticfield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>

                <tr
                    class="unwantedfordynamiclabel"@if ($config_data->g_field2_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrglobalstaticfield2"
                            name="globalstaticfield2" style="margin-left:10px;">&nbsp;
                        {{ $config_data->global_static_field2 }}
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrglobalstaticfield2fn" name="globalstaticfield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                </tr>
                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        -------------- Label Static field ---------------
                    </td>
                </tr>
                <tr
                    @if ($config_data->l_field1_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfield"
                            name="Staticfield" style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrStaticfield_name">{{ $config_data->label_static_field1 }}
                        </span>
                        <input type="text" class="Staticfield1inputbox viewpermission"
                            data-original-value="Static field" id="qrStaticfield_name_input"
                            name="Staticfield1_name_input" placeholder="{{ $config_data->label_static_field1 }}"
                            value="{{ $config_data->label_static_field1 }}" style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrlabelstaticfield1fn" name="labelstaticfield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                <tr
                    @if ($config_data->l_field2_use == 'off') style="display: none;"
                            @else
                        style="display: table-row;" @endif>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfield2"
                            name="Staticfield2" style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrStaticfield2_name">{{ $config_data->label_static_field2 }}
                        </span>
                        <input type="text" class="Staticfield2inputbox viewpermission"
                            data-original-value="Static field" id="qrStaticfield2_name_input"
                            name="Freefield1_name_input" placeholder="{{ $config_data->label_static_field2 }}"
                            value="{{ $config_data->label_static_field2 }}" style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrlabelstaticfield2fn" name="labelstaticfield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        ------------------ Image field ------------------
                    </td>
                </tr>
                <!--   <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfield3" name="Staticfield3"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrStaticfield3_name">{{ $config_data->p_image_field1 }}
                        </span><input type="text" class="Staticfield3inputbox viewpermission" data-original-value="Static field"
                            id="qrStaticfield3_name_input" name="Staticfield3_name_input" placeholder="Static field"
                            value="Static field" style="display:none" maxlength="100" />
                    </td>

                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfield4" name="Staticfield4"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrStaticfield4_name">{{ $config_data->p_image_field2 }}
                        </span><input type="text" class="Staticfield4inputbox viewpermission" data-original-value="Static field"
                            id="qrStaticfield4_name_input" name="Staticfield4_name_input" placeholder="Static field"
                            value="Static field" style="display:none" maxlength="100" />
                    </td>

                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfield5" name="Staticfield5"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrStaticfield5_name">{{ $config_data->global_image1 }}
                        </span><input type="text" class="Staticfield5inputbox viewpermission" data-original-value="Static field"
                            id="qrStaticfield5_name_input" name="Staticfield5_name_input" placeholder="Static field"
                            value="Static field" style="display:none" maxlength="100" />
                    </td>

                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfield6" name="Staticfield6"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrStaticfield6_name">{{ $config_data->global_image2 }}
                        </span><input type="text" class="Staticfield6inputbox viewpermission" data-original-value="Static field"
                            id="qrStaticfield6_name_input" name="Staticfield6_name_input" placeholder="Static field"
                            value="Static field" style="display:none" maxlength="100" />
                    </td>

                </tr>-->
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrStaticfield7"
                            name="Staticfield7" style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrStaticfield7_name">{{ $config_data->image1 }}
                        </span><input type="text" class="Staticfield7inputbox viewpermission"
                            data-original-value="Static field" id="qrStaticfield7_name_input"
                            name="Staticfield7_name_input" placeholder="Static field" value="Static field"
                            style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrStaticfield7fn" name="Staticfield7fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>
                <tr style="color:#acacac;font-size: 13px;">
                    <td colspan="2" style="text-align:left; white-space:nowrap">
                        ------------------- Free fields -------------------
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield1" name="Freefield1"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrFreefield1_name">Free field
                            1</span><input type="text" class="freefieldinputbox viewpermission"
                            data-original-value="Free field 1" id="qrFreefield1_name_input"
                            name="Freefield1_name_input" placeholder="Free field 1" value="Free field 1"
                            style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield1fn" name="freefield1fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield2" name="Freefield2"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrFreefield2_name">Free field
                            2</span><input type="text" class="freefieldinputbox viewpermission"
                            data-original-value="Free field 2" id="qrFreefield2_name_input"
                            name="Freefield2_name_input" placeholder="Free field 2" value="Free field 2"
                            style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield2fn" name="freefield2fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield3" name="Freefield3"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrFreefield3_name">Free field
                            3</span><input type="text" class="freefieldinputbox viewpermission"
                            data-original-value="Free field 3" id="qrFreefield3_name_input"
                            name="Freefield3_name_input" placeholder="Free field 3" value="Free field 3"
                            style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield3fn" name="freefield3fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>

                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield4" name="Freefield4"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrFreefield4_name">Free field
                            4</span><input type="text" class="freefieldinputbox viewpermission"
                            data-original-value="Free field 4" id="qrFreefield4_name_input"
                            name="Freefield4_name_input" placeholder="Free field 4" value="Free field 4"
                            style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield4fn" name="freefield4fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield5" name="Freefield5"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrFreefield5_name">Free field
                            5</span><input type="text" class="freefieldinputbox viewpermission"
                            data-original-value="Free field 5" id="qrFreefield5_name_input"
                            name="Freefield5_name_input" placeholder="Free field 5" value="Free field 5"
                            style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield5fn" name="freefield5fn"
                            class="fieldname_check viewpermission" style="margin-left:10px; ">&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="text-align:left; white-space:nowrap;font-size:12px;">
                        <input type="checkbox" class="nonstoreqr viewpermission" id="qrFreefield6" name="Freefield6"
                            style="margin-left:10px;" />&nbsp; <span class="canDoubleClick"
                            id="qrFreefield6_name">Free field
                            6</span><input type="text" class="freefieldinputbox viewpermission"
                            data-original-value="Free field 6" id="qrFreefield6_name_input"
                            name="Freefield6_name_input" placeholder="Free field 6" value="Free field 6"
                            style="display:none" maxlength="100" />
                    </td>
                    <td style="text-align:center;z-index: 100;white-space:nowrap;">
                        <input type="checkbox" id="qrfreefield6fn" name="freefield6fn"
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
                            name="width" id="width" class="labelwh" data-original-value="200" max="210"
                            value="200" step="1"></td>
                </tr>
                <tr>
                    <td colspan="1">
                        <label style="margin-top:5px;" for="height"><b>Height </b></label>
                    </td>
                    <td colspan="2">
                        <input type="number" style="width:130px;height:6% !important;font-size:12px;" class="labelwh"
                            id="height" name="height" data-original-value="100" max="160" value="130"
                            step="1">
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="but1" id="minus"
                            style="  width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;">
                            -</div>
                    </td>
                    <td style="text-align:center">
                        <center>

                            <select name="code" class="grnprop" readonly style="width:auto; padding:6px"
                                id="code">
                                <option value="QRcode">QR Code</option>
                                {{-- <option value="GS1"> GS1 Data Matrix</option> --}}
                            </select>
                        </center>
                    </td>
                    <td>
                        <input type="text" value="60" id="num" name="num" hidden>
                        <div id="plus"
                            style="width: 30px !important; padding-top: 4px; cursor: pointer; height: 30px !important;"
                            class="but1">+</div>
                    </td>
                </tr>
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
            </table>


        </div>

        </td>

        </tr>



        <tr>

            <td style="text-align:center !important ;background-color:#fff !important;box-shadow: 0 11px 6px #73737380;">
                <div style="margin-top:5px">
                    <label for="producttype_input"> <b class="label"
                            style="color:#000;font-size:12px;padding:4px; ">Product
                            Type </b></label><br>
                    <select type="text" name="producttype_input" id="producttype_input" maxlength="100"
                        class="viewpermission" required placeholder="Product Type"
                        style="width:275px;height:25px;font-size:12px;">
                        <option value="">--select--</option>
                        @foreach ($product_type as $data)
                            <option value="{{ $data->id }}">{{ $data->product_type }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div style="margin-top:5px">
                    <label for="labeltype_input"> <b class="label"
                            style="color:#000;font-size:12px;padding:4px; ">Label
                            Type </b></label><br>
                    <select type="text" name="labeltype_input" required id="labeltype_input" maxlength="100"
                        class="viewpermission" placeholder="Label Type"
                        style="width:275px;height:25px;font-size:12px;">
                        <option value="">--select--</option>
                        @foreach ($label_type as $data)
                            <option value="{{ $data->id }}">{{ $data->label_type_name }}</option>
                        @endforeach
                    </select>
                </div><br>

                <div id="image1UploadOptionContainer"
                    style="margin-top:5px; display: none;>
                <label for="labelimage">
                    <b class="label" style="color:#000;font-size:12px;padding:4px;">{{ $config_data->image1 }}</b>
                    </label><br>
                    <input type="file" name="labelimage" required id="labelimage" class="viewpermission"
                        style="width:90%;height:25px;font-size:12px;border:1px solid #ccc;">
                </div><br>



                <div id="image2UploadOptionContainer"
                    style="margin-top:5px; display: none;>
                <label for="labelimage2">
                    <b class="label2" style="color:#000;font-size:12px;padding:4px;">{{ $config_data->image2 }}</b>
                    </label><br>
                    <input type="file" name="labelimage2" required id="labelimage2" class="viewpermission"
                        style="width:90%;height:25px;font-size:12px;border:1px solid #ccc;">
                </div><br>

                <div id="label1_text_container" style="margin-top:5px; display: none;">
                    <label for="Staticfield_input"> <b class="label"
                            style="color:#000;font-size:12px;padding:4px; ">{{ $config_data->label_static_field1 }}</b></label><br>
                    <input type="text" name="labelstaticfield1_input" id="labelstaticfield1_input"
                        placeholder="{{ $config_data->label_static_field1 }}" maxlength="100" class="viewpermission"
                        style="width:275px;height:25px;font-size:12px;" />
                </div><br>
                <div id="label2_text_container" style="margin-top:5px; display: none;">
                    <label for="Staticfield_input2"> <b class="label"
                            style="color:#000;font-size:12px;padding:4px; ">{{ $config_data->label_static_field2 }}</b></label><br>
                    <input type="text" name="labelstaticfield2_input" id="labelstaticfield2_input"
                        placeholder="{{ $config_data->label_static_field2 }}" maxlength="100" class="viewpermission"
                        style="width:275px;height:25px;font-size:12px;" />
                </div>
                <div style="margin-top:20px">
                    <label> <b class="label" style="color:#000;font-size:12px;padding:4px; ">Label Name
                        </b></label><br>
                    <input type="text" name="labelname" required id="labelname" class="grnprop viewpermission"
                        style="width:275px;height:25px; font-size:12px;" value=""
                        placeholder="Enter a Label name" autocomplete="off" maxlength="100">

                </div>
            </td>

        </tr>


        <tr>
            <td
                style="text-align:center !important;  background-color:#fff;  border-bottom-left-radius: 20px; zoom:80%;   box-shadow: 0 3px 6px #73737380;">
                <center>
                    <!-- <input type="button" value="Print" class="but1 print" id="print" onclick='printDiv();'
                                    style="display:block; width: 90px !important; height: auto !important; padding: 6px; padding-left: 13px; padding-right: 13px;"> -->
                    <a href="/labellist" class="btn btn-sm btn-secondary"
                        style="display:inline-block; border-radius:7px; margin-right:10px;width: 80px !important; height: 35px !important; color:white !important; padding: 7px;">Back</a>
                    <input type="button" value="Print" class="btn btn-sm btn-update " id="print"
                        onclick="printDiv()"
                        style=" width: 90px !important; height:35px !important; padding: 0px; padding-left: 13px;font-size:14px; padding-right: 13px;font-weight:600; border: 1px solid;">
                    <input type="submit" value="Save" class="btn btn-sm but1 " id="save" disabled
                        style=" width: 90px !important; height:35px !important; padding: 0px; padding-left: 13px;font-size:14px; padding-right: 13px;font-weight:600; border: 1px solid;margin-left:8px;">

                </center>
            </td>
        </tr>
        </table>
        </div>
        </div>

        <!-- -----------------------------------------  hidden fields ----------------------------------------------- -->

        <input type="text" id="organisationname" name="organisationname" value="Checked" hidden>
        <!-- ================ gr ======================= -->
        <input type="hidden" id="productname_labelbold" value="normal">
        <input type="hidden" id="productname_labelitalic" value="normal">
        <input type="hidden" id="productname_labelunderline" value="none">
        <input type="hidden" id="productname_labelalign" value="left">
        <input type="hidden" id="productname_labelsize" value="12">
        <input type="hidden" id="productname_labelfamily" value="Arial">




        <input type="hidden" name="productname_label_style" id="productname_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="text" id="organisationname" name="organisationname" value="Checked" hidden>
        <!-- ================ gr ======================= -->
        <input type="hidden" id="productid_labelbold" value="normal">
        <input type="hidden" id="productid_labelitalic" value="normal">
        <input type="hidden" id="productid_labelunderline" value="none">
        <input type="hidden" id="productid_labelalign" value="left">
        <input type="hidden" id="productid_labelsize" value="12">
        <input type="hidden" id="productid_labelfamily" value="Arial">

        <input type="hidden" name="productid_label_style" id="productid_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="organisationname_labelbold" value="normal">
        <input type="hidden" id="organisationname_labelitalic" value="normal">
        <input type="hidden" id="organisationname_labelunderline" value="none">
        <input type="hidden" id="organisationname_labelalign" value="left">
        <input type="hidden" id="organisationname_labelsize" value="12">
        <input type="hidden" id="organisationname_labelfamily" value="Arial">

        <input type="hidden" name="organisationname_label_style" id="organisationname_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productcomments_labelbold" value="normal">
        <input type="hidden" id="productcomments_labelitalic" value="normal">
        <input type="hidden" id="productcomments_labelunderline" value="none">
        <input type="hidden" id="productcomments_labelalign" value="left">
        <input type="hidden" id="productcomments_labelsize" value="12">
        <input type="hidden" id="productcomments_labelfamily" value="Arial">

        <input type="hidden" name="productcomments_label_style" id="productcomments_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" id="productstaticfield1_labelbold" value="normal">
        <input type="hidden" id="productstaticfield1_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield1_labelunderline" value="none">
        <input type="hidden" id="productstaticfield1_labelalign" value="left">
        <input type="hidden" id="productstaticfield1_labelsize" value="12">
        <input type="hidden" id="productstaticfield1_labelfamily" value="Arial">
        <input type="hidden" id="productstaticfield1_labelfamily" value="Arial">
        <input type="hidden" id="productstaticfield1_labelfamily" value="Arial">
        <input type="hidden" id="productstaticfield1_labelfamily" value="Arial">
        <input type="hidden" id="productstaticfield1_labelfamily" value="Arial">

        <input type="hidden" name="productstaticfield1_label_style" id="productstaticfield1_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield2_labelbold" value="normal">
        <input type="hidden" id="productstaticfield2_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield2_labelunderline" value="none">
        <input type="hidden" id="productstaticfield2_labelalign" value="left">
        <input type="hidden" id="productstaticfield2_labelsize" value="12">
        <input type="hidden" id="productstaticfield2_labelfamily" value="Arial">


        <input type="hidden" name="productstaticfield2_label_style" id="productstaticfield2_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield3_labelbold" value="normal">
        <input type="hidden" id="productstaticfield3_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield3_labelunderline" value="none">
        <input type="hidden" id="productstaticfield3_labelalign" value="left">
        <input type="hidden" id="productstaticfield3_labelsize" value="12">
        <input type="hidden" id="productstaticfield3_labelfamily" value="Arial">


        <input type="hidden" name="productstaticfield3_label_style" id="productstaticfield3_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield4_labelbold" value="normal">
        <input type="hidden" id="productstaticfield4_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield4_labelunderline" value="none">
        <input type="hidden" id="productstaticfield4_labelalign" value="left">
        <input type="hidden" id="productstaticfield4_labelsize" value="12">
        <input type="hidden" id="productstaticfield4_labelfamily" value="Arial">


        <input type="hidden" name="productstaticfield4_label_style" id="productstaticfield4_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield5_labelbold" value="normal">
        <input type="hidden" id="productstaticfield5_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield5_labelunderline" value="none">
        <input type="hidden" id="productstaticfield5_labelalign" value="left">
        <input type="hidden" id="productstaticfield5_labelsize" value="12">
        <input type="hidden" id="productstaticfield5_labelfamily" value="Arial">


        <input type="hidden" name="productstaticfield5_label_style" id="productstaticfield5_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield6_labelbold" value="normal">
        <input type="hidden" id="productstaticfield6_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield6_labelunderline" value="none">
        <input type="hidden" id="productstaticfield6_labelalign" value="left">
        <input type="hidden" id="productstaticfield6_labelsize" value="12">
        <input type="hidden" id="productstaticfield6_labelfamily" value="Arial">

        <input type="hidden" name="productstaticfield6_label_style" id="productstaticfield5_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield7_labelbold" value="normal">
        <input type="hidden" id="productstaticfield7_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield7_labelunderline" value="none">
        <input type="hidden" id="productstaticfield7_labelalign" value="left">
        <input type="hidden" id="productstaticfield7_labelsize" value="12">
        <input type="hidden" id="productstaticfield7_labelfamily" value="Arial">

        <input type="hidden" name="productstaticfield7_label_style" id="productstaticfield7_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield8_labelbold" value="normal">
        <input type="hidden" id="productstaticfield8_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield8_labelunderline" value="none">
        <input type="hidden" id="productstaticfield8_labelalign" value="left">
        <input type="hidden" id="Staticfields8_labelsize" value="12">
        <input type="hidden" id="productstaticfield8_labelfamily" value="Arial">


        <input type="hidden" name="productstaticfield8_label_style" id="productstaticfield8_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield9_labelbold" value="normal">
        <input type="hidden" id="productstaticfield9_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield9_labelunderline" value="none">
        <input type="hidden" id="productstaticfield9_labelalign" value="left">
        <input type="hidden" id="productstaticfield9_labelsize" value="12">
        <input type="hidden" id="productstaticfield9_labelfamily" value="Arial">


        <input type="hidden" name="productstaticfield9_label_style" id="productstaticfield9_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="productstaticfield10_labelbold" value="normal">
        <input type="hidden" id="productstaticfield10_labelitalic" value="normal">
        <input type="hidden" id="productstaticfield10_labelunderline" value="none">
        <input type="hidden" id="productstaticfield10_labelalign" value="left">
        <input type="hidden" id="productstaticfield10_labelsize" value="12">
        <input type="hidden" id="productstaticfield10_labelfamily" value="Arial">


        <input type="hidden" name="productstaticfield10_label_style" id="productstaticfield10_label_style"
            value="normal_normal_none_left_12_Arial">


        <!-- ================== bacth level ====================== -->

        <input type="hidden" id="batchno_labelbold" value="normal">
        <input type="hidden" id="batchno_labelitalic" value="normal">
        <input type="hidden" id="batchno_labelunderline" value="none">
        <input type="hidden" id="batchno_labelalign" value="left">
        <input type="hidden" id="batchno_labelsize" value="12">
        <input type="hidden" id="batchno_labelfamily" value="Arial">


        <input type="hidden" name="batchno_label_style" id="batchno_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="dateofmanufacture_labelbold" value="normal">
        <input type="hidden" id="dateofmanufacture_labelitalic" value="normal">
        <input type="hidden" id="dateofmanufacture_labelunderline" value="none">
        <input type="hidden" id="dateofmanufacture_labelalign" value="left">
        <input type="hidden" id="dateofmanufacture_labelsize" value="12">
        <input type="hidden" id="dateofmanufacture_labelfamily" value="Arial">


        <input type="hidden" name="dateofmanufacture_label_style" id="dateofmanufacture_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="dateofexp_labelbold" value="normal">
        <input type="hidden" id="dateofexp_labelitalic" value="normal">
        <input type="hidden" id="dateofexp_labelunderline" value="none">
        <input type="hidden" id="dateofexp_labelalign" value="left">
        <input type="hidden" id="dateofexp_labelsize" value="12">
        <input type="hidden" id="dateofexp_labelfamily" value="Arial">


        <input type="hidden" name="dateofexp_label_style" id="dateofexp_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="dateofretest_labelbold" value="normal">
        <input type="hidden" id="dateofretest_labelitalic" value="normal">
        <input type="hidden" id="dateofretest_labelunderline" value="none">
        <input type="hidden" id="dateofretest_labelalign" value="left">
        <input type="hidden" id="dateofretest_labelsize" value="12">
        <input type="hidden" id="dateofretest_labelfamily" value="Arial">


        <input type="hidden" name="dateofretest_label_style" id="dateofretest_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="batchstaticfield1_labelbold" value="normal">
        <input type="hidden" id="batchstaticfield1_labelitalic" value="normal">
        <input type="hidden" id="batchstaticfield1_labelunderline" value="none">
        <input type="hidden" id="batchstaticfield1_labelalign" value="left">
        <input type="hidden" id="batchstaticfield1_labelsize" value="12">
        <input type="hidden" id="batchstaticfield1_labelfamily" value="Arial">


        <input type="hidden" name="batchstaticfield1_label_style" id="batchstaticfield1_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="batchstaticfield2_labelbold" value="normal">
        <input type="hidden" id="batchstaticfield1_labelitalic" value="normal">
        <input type="hidden" id="batchstaticfield1_labelunderline" value="none">
        <input type="hidden" id="batchstaticfield1_labelalign" value="left">
        <input type="hidden" id="batchstaticfield1_labelsize" value="12">
        <input type="hidden" id="batchstaticfield1_labelfamily" value="Arial">


        <input type="hidden" name="batchstaticfield1_label_style" id="batchstaticfield1_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="batchstaticfield3_labelbold" value="normal">
        <input type="hidden" id="batchstaticfield3_labelitalic" value="normal">
        <input type="hidden" id="batchstaticfield3_labelunderline" value="none">
        <input type="hidden" id="batchstaticfield3_labelalign" value="left">
        <input type="hidden" id="batchstaticfield3_labelsize" value="12">
        <input type="hidden" id="batchstaticfield3_labelfamily" value="Arial">


        <input type="hidden" name="batchstaticfield3_label_style" id="batchstaticfield3_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="batchstaticfield4_labelbold" value="normal">
        <input type="hidden" id="batchstaticfield4_labelitalic" value="normal">
        <input type="hidden" id="batchstaticfield4_labelunderline" value="none">
        <input type="hidden" id="batchstaticfield4_labelalign" value="left">
        <input type="hidden" id="batchstaticfield4_labelsize" value="12">
        <input type="hidden" id="batchstaticfield4_labelfamily" value="Arial">


        <input type="hidden" name="batchstaticfield4_label_style" id="batchstaticfield4_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="batchstaticfield5_labelbold" value="normal">
        <input type="hidden" id="batchstaticfield5_labelitalic" value="normal">
        <input type="hidden" id="batchstaticfield5_labelunderline" value="none">
        <input type="hidden" id="batchstaticfield5_labelalign" value="left">
        <input type="hidden" id="batchstaticfield5_labelsize" value="12">
        <input type="hidden" id="batchstaticfield5_labelfamily" value="Arial">


        <input type="hidden" name="batchstaticfield5_label_style" id="batchstaticfield5_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- ==================  =======Container Level=============== -->

        <input type="hidden" id="containerno_labelbold" value="normal">
        <input type="hidden" id="containerno_labelitalic" value="normal">
        <input type="hidden" id="containerno_labelunderline" value="none">
        <input type="hidden" id="containerno_labelalign" value="left">
        <input type="hidden" id="containerno_labelsize" value="12">
        <input type="hidden" id="containerno_labelfamily" value="Arial">

        <input type="hidden" name="containerno_label_style" id="containerno_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" id="netweight_labelbold" value="normal">
        <input type="hidden" id="netweight_labelitalic" value="normal">
        <input type="hidden" id="netweight_labelunderline" value="none">
        <input type="hidden" id="netweight_labelalign" value="left">
        <input type="hidden" id="netweight_labelsize" value="12">
        <input type="hidden" id="netweight_labelfamily" value="Arial">

        <input type="hidden" name="netweight_label_style" id="netweight_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" id="grossweight_labelbold" value="normal">
        <input type="hidden" id="grossweight_labelitalic" value="normal">
        <input type="hidden" id="grossweight_labelunderline" value="none">
        <input type="hidden" id="grossweight_labelalign" value="left">
        <input type="hidden" id="grossweight_labelsize" value="12">
        <input type="hidden" id="grossweight_labelfamily" value="Arial">


        <input type="hidden" name="grossweight_label_style" id="GrossWeight_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="tareweight_labelbold" value="normal">
        <input type="hidden" id="tareweight_labelitalic" value="normal">
        <input type="hidden" id="tareweight_labelunderline" value="none">
        <input type="hidden" id="tareweight_labelalign" value="left">
        <input type="hidden" id="tareweight_labelsize" value="12">
        <input type="hidden" id="tareweight_labelfamily" value="Arial">


        <input type="hidden" name="tareweight_label_style" id="tareweight_label_style"
            value="normal_normal_none_left_12_Arial">

        {{-- =========Dyanmaic level========= --}}

        <input type="hidden" id="dynamicfield1_labelbold" value="normal">
        <input type="hidden" id="dynamicfield1_labelitalic" value="normal">
        <input type="hidden" id="dynamicfield1_labelunderline" value="none">
        <input type="hidden" id="dynamicfield1_labelalign" value="left">
        <input type="hidden" id="dynamicfield1_labelsize" value="12">
        <input type="hidden" id="dynamicfield1_labelfamily" value="Arial">


        <input type="hidden" name="dynamicfield1_label_style" id="dynamicfield1_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="dynamicfield2_labelbold" value="normal">
        <input type="hidden" id="dynamicfield2_labelitalic" value="normal">
        <input type="hidden" id="dynamicfield2_labelunderline" value="none">
        <input type="hidden" id="dynamicfield2_labelalign" value="left">
        <input type="hidden" id="dynamicfield2_labelsize" value="12">
        <input type="hidden" id="dynamicfield2_labelfamily" value="Arial">


        <input type="hidden" name="dynamicfield2_label_style" id="dynamicfield2_label_style"
            value="normal_normal_none_left_12_Arial">

        {{-- =========GLobal level========== --}}

        <input type="hidden" id="globalstaticfield1_labelbold" value="normal">
        <input type="hidden" id="globalstaticfield1_labelitalic" value="normal">
        <input type="hidden" id="globalstaticfield1_labelunderline" value="none">
        <input type="hidden" id="globalstaticfield1_labelalign" value="left">
        <input type="hidden" id="globalstaticfield1_labelsize" value="12">
        <input type="hidden" id="globalstaticfield1_labelfamily" value="Arial">


        <input type="hidden" name="globalstaticfield1_label_style" id="globalstaticfield1_label_style"
            value="normal_normal_none_left_12_Arial">

        <input type="hidden" id="globalstaticfield2_labelbold" value="normal">
        <input type="hidden" id="globalstaticfield2_labelitalic" value="normal">
        <input type="hidden" id="globalstaticfield2_labelunderline" value="none">
        <input type="hidden" id="globalstaticfield2_labelalign" value="left">
        <input type="hidden" id="globalstaticfield2_labelsize" value="12">
        <input type="hidden" id="globalstaticfield2_labelfamily" value="Arial">


        <input type="hidden" name="globalstaticfield2_label_style" id="globalstaticfield2_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- ================== Label level ====================== -->

        <input type="hidden" id="labelstaticfield1_labelbold" value="normal">
        <input type="hidden" id="labelstaticfield1_labelitalic" value="normal">
        <input type="hidden" id="labelstaticfield1_labelunderline" value="none">
        <input type="hidden" id="labelstaticfield1_labelalign" value="left">
        <input type="hidden" id="labelstaticfield1_labelsize" value="12">
        <input type="hidden" id="labelstaticfield1_labelfamily" value="Arial">


        <input type="hidden" name="labelstaticfield1_label_style" id="labelstaticfield1_label_style"
            value="normal_normal_none_left_12_Arial">


        <input type="hidden" id="labelstaticfield2_labelbold" value="normal">
        <input type="hidden" id="labelstaticfield2_labelitalic" value="normal">
        <input type="hidden" id="labelstaticfield2_labelunderline" value="none">
        <input type="hidden" id="labelstaticfield2_labelalign" value="left">
        <input type="hidden" id="labelstaticfield2_labelsize" value="12">
        <input type="hidden" id="labelstaticfield2_labelfamily" value="Arial">


        <input type="hidden" name="labelstaticfield2_label_style" id="labelstaticfield2_label_style"
            value="normal_normal_none_left_12_Arial">


        <!-- ================== Freefield1 ====================== -->

        <input type="hidden" id="Sfreefield1_labelbold" value="normal">
        <input type="hidden" id="Sfreefield1_labelitalic" value="normal">
        <input type="hidden" id="Sfreefield1_labelunderline" value="none">
        <input type="hidden" id="Sfreefield1_labelalign" value="left">
        <input type="hidden" id="Sfreefield1_labelsize" value="12">
        <input type="hidden" id="Sfreefield1_labelfamily" value="Arial">


        <input type="hidden" name="Sfreefield1_label_style" id="Sfreefield1_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- --------------------------------------------------------------------------------------------------------- -->

        <!-- ================== Freefield2 ====================== -->

        <input type="hidden" id="Sfreefield2_labelbold" value="normal">
        <input type="hidden" id="Sfreefield2_labelitalic" value="normal">
        <input type="hidden" id="Sfreefield2_labelunderline" value="none">
        <input type="hidden" id="Sfreefield2_labelalign" value="left">
        <input type="hidden" id="Sfreefield2_labelsize" value="12">
        <input type="hidden" id="Sfreefield2_labelfamily" value="Arial">


        <input type="hidden" name="Sfreefield2_label_style" id="Sfreefield2_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- --------------------------------------------------------------------------------------------------------- -->

        <!-- ================== Freefield3 ====================== -->

        <input type="hidden" id="Sfreefield3_labelbold" value="normal">
        <input type="hidden" id="Sfreefield3_labelitalic" value="normal">
        <input type="hidden" id="Sfreefield3_labelunderline" value="none">
        <input type="hidden" id="Sfreefield3_labelalign" value="left">
        <input type="hidden" id="Sfreefield3_labelsize" value="12">
        <input type="hidden" id="Sfreefield3_labelfamily" value="Arial">


        <input type="hidden" name="Sfreefield3_label_style" id="Sfreefield3_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- --------------------------------------------------------------------------------------------------------- -->

        <!-- ================== Freefield4 ====================== -->

        <input type="hidden" id="Sfreefield4_labelbold" value="normal">
        <input type="hidden" id="Sfreefield4_labelitalic" value="normal">
        <input type="hidden" id="Sfreefield4_labelunderline" value="none">
        <input type="hidden" id="Sfreefield4_labelalign" value="left">
        <input type="hidden" id="Sfreefield4_labelsize" value="12">
        <input type="hidden" id="Sfreefield4_labelfamily" value="Arial">


        <input type="hidden" name="Sfreefield4_label_style" id="Sfreefield4_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- --------------------------------------------------------------------------------------------------------- -->

        <!-- ================== Freefield5 ====================== -->

        <input type="hidden" id="Sfreefield5_labelbold" value="normal">
        <input type="hidden" id="Sfreefield5_labelitalic" value="normal">
        <input type="hidden" id="Sfreefield5_labelunderline" value="none">
        <input type="hidden" id="Sfreefield5_labelalign" value="left">
        <input type="hidden" id="Sfreefield5_labelsize" value="12">
        <input type="hidden" id="Sfreefield5_labelfamily" value="Arial">


        <input type="hidden" name="Sfreefield5_label_style" id="Sfreefield5_label_style"
            value="normal_normal_none_left_12_Arial">

        <!-- --------------------------------------------------------------------------------------------------------- -->

        <!-- ================== Freefield6 ====================== -->

        <input type="hidden" id="Sfreefield6_labelbold" value="normal">
        <input type="hidden" id="Sfreefield6_labelitalic" value="normal">
        <input type="hidden" id="Sfreefield6_labelunderline" value="none">
        <input type="hidden" id="Sfreefield6_labelalign" value="left">
        <input type="hidden" id="Sfreefield6_labelsize" value="12">
        <input type="hidden" id="Sfreefield6_labelfamily" value="Arial">


        <input type="hidden" name="Sfreefield6_label_style" id="Sfreefield6_label_style"
            value="normal_normal_none_left_12_Arial">
        <!-- --------------------------------------------------------------------------------------------------------- -->

        <!-- ----------------- positon container label---------------- -->
        <input type="hidden" name="organisationname_labelposition" class="organisationname_labelposition">
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
        <input type="hidden" name="productstaticfield10_labelposition"
            class="productstaticfield10_labelposition">
        <input type="hidden" name="batchno_labelposition" class="batchno_labelposition">
        <input type="hidden" name="dateofmanufacture_labelposition" class="dateofmanufacture_labelposition">
        <input type="hidden" name="dateofexp_labelposition" class="dateofexp_labelposition">
        <input type="hidden" name="dateofretest_labelposition" class="dateofretest_labelposition">
        <input type="hidden" name="batchstaticfield1_labelposition" class="batchstaticfield1_labelposition">
        <input type="hidden" name="batchstaticfield2_labelposition" class="batchstaticfield2_labelposition">
        <input type="hidden" name="batchstaticfield3_labelposition" class="batchstaticfield3_labelposition">
        <input type="hidden" name="batchstaticfield4_labelposition" class="batchstaticfield4_labelposition">
        <input type="hidden" name="batchstaticfield5_labelposition" class="batchstaticfield5_labelposition">
        <input type="hidden" name="containerno_labelposition" class="containerno_labelposition">
        <input type="hidden" name="netweight_labelposition" class="netweight_labelposition">
        <input type="hidden" name="grossweight_labelposition" class="grossweight_labelposition">
        <input type="hidden" name="tareweight_labelposition" class="tareweight_labelposition">
        <input type="hidden" name="dynamicfield1_labelposition" class="dynamicfield1_labelposition">
        <input type="hidden" name="dynamicfield2_labelposition" class="dynamicfield2_labelposition">

        <input type="hidden" name="globalstaticfield1_labelposition" class="globalstaticfield1_labelposition">
        <input type="hidden" name="globalstaticfield2_labelposition" class="globalstaticfield2_labelposition">
        <input type="hidden" name="labelstaticfield1_labelposition" class="labelstaticfield1_labelposition">
        <input type="hidden" name="labelstaticfield2_labelposition" class="labelstaticfield2_labelposition">
        <input type="hidden" name="Sfreefield1_labelposition" class="Sfreefield1_labelposition">
        <input type="hidden" name="Sfreefield2_labelposition" class="Sfreefield2_labelposition">
        <input type="hidden" name="Sfreefield3_labelposition" class="Sfreefield3_labelposition">
        <input type="hidden" name="Sfreefield4_labelposition" class="Sfreefield4_labelposition">
        <input type="hidden" name="Sfreefield5_labelposition" class="Sfreefield5_labelposition">
        <input type="hidden" name="Sfreefield6_labelposition" class="Sfreefield6_labelposition">

        <input type="hidden" name="code_position" value="sortable2_0"
            class="Qr_nonstore_labelposition barcode_nonstore_label">

    </form>

    <script>
        // print button click function
        function printDiv() {
            if ($("#predefined-btn").is(":checked") == true) {
                var labelName = 'shipperlabel';
            } else {
                var labelName = 'innerlabel';
            }

            var divToPrint = document.getElementById(labelName);
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            var width = document.getElementById("width").value;
            var height = document.getElementById("height").value;
            newWin.document.write(
                `<html>
    <body onload="printPage()"><center>
    <div id="sample_label" style=" position:fixed; text-align:center; transform: rotate(315deg); font-size:36px; top:40%; left:30%; font-weight:600; z-index:99; color:#000000;">Sample label</div>
   ` +
                divToPrint.innerHTML + `</center></body>
    <style>
    @media print {
        @page {
            size: ` + width + `mm ` + height + `mm;
            size: auto !important;
            width: ` + width + `;
            height: ` + height + `;
            top: 0px;
            margin: 0px 5px 5px 5px;
        }
    }
    li {
            text-decoration: none;
            list-style-type: none;
        }
    ul{

        padding-inline-start: 10px;
        margin-block-end: 0rem;
        margin-block-start: 0rem
    }
    .delimiter{
        color: black !important;
    }
    </style>
    </html>`);

            newWin.document.close();
            setTimeout(function() {
                newWin.print();
                newWin.onafterprint = function() {
                    newWin.close();
                };
            }, 100);
        }

        function printPage() {
            window.print();

        }
        label_id = "";

        function setHeightWidth() {
            var labelToChange = '';
            if ($('.predefined_dynamic:checked').val() == 'predefined') {
                labelToChange = 'shipperlabel';
            } else {
                labelToChange = 'innerlabel';
            }

            labelHeight = $('#' + labelToChange).css('height');
            labelHeightmm = Math.ceil(parseFloat(labelHeight) * parseFloat(0.2645833333));

            // finalHeight = Math.ceil(labelHeightmm / 10) * 10;

            labelWidth = $('#' + labelToChange).css('width');
            labelWidthmm = Math.ceil(parseFloat(labelWidth) * parseFloat(0.2645833333));

            // finalWidth = Math.ceil(labelWidthmm / 10) * 10;

            // console.log(finalHeight, finalWidth);
            // $('#shipperlabel').css('height', finalHeight + 'mm');
            // $('#shipperlabel').css('width', finalWidth + 'mm');
            $('#height').val(labelHeightmm);
            $('#width').val(labelWidthmm);
            $('#labelheightIdentifer').text(labelHeightmm);
            $('#labelwidthIdentifer').text(labelWidthmm);
        }

        function po() {
            currLabelName = 'shipperlabel';
            if ($('#dynamic-btn').is(":checked") === true) {
                currLabelName = 'innerLabel';
            }
            if (currLabelName === 'shipperlabel') {
                $('.nonstore').prop('checked', false);
                $.map($('#shipperlabel').find('.textnonstore'), function(el) {
                    var currLabel = $(el).attr('id').split('_');
                    var checkboxId = currLabel[0].split('rlabel');
                    $('#' + checkboxId[1]).prop('checked', true);
                });

                if (($(".nonstore:checked")).length == (($(".nonstore").length))) {
                    $("#selectall").prop('checked', true);
                } else {
                    $('#selectall').prop('checked', false);
                }
            } else {
                $('.nonstore').prop('checked', false);
                $.map($('#innerlabel').find('.textnonstore'), function(el) {
                    var currLabel = $(el).attr('id').split('_');
                    var checkboxId = currLabel[0].split('rlabel');
                    $('#' + checkboxId[1]).prop('checked', true);
                });

                if (($(".nonstore:checked")).length == 12) {
                    $("#selectall").prop('checked', true);
                } else {
                    $('#selectall').prop('checked', false);
                }
            }

        }

        function checkLabelName() {
            var text = $('#labelname').val();
            var type = $('.predefined_dynamic:checked').val();
            // console.log(text, 'text', type, 'type');
            $.ajax({
                url: "{{ url('/labelnameValidation') }}",
                type: "GET",
                data: {
                    text: text,
                    type: type,
                },
                dataType: 'json',
                success: function(result) {
                    // console.log(result, 'RESULT', type, result.message);
                    if (result.exist == true || result.exist2 == true) {
                        Swal.fire({
                            title: 'This label name ' + text +
                                ' is already in use with an existing label',
                            confirmButtonText: 'OK',
                            confirmButtonColor: 'rgb(36 63 161)',
                            background: 'rgb(105 126 157)',
                        }).then(function(Confirm) {
                            $('#labelname').val('');
                            $('#save').prop('disabled', true);
                            $('input[type=checkbox]').prop('disabled', true);
                            $('#labeltype').prop('disabled', true);
                            $('#selectall').prop('disabled', true);
                            $('.nonstore').prop('disabled', true);
                        });
                    } else if (result.message == true) {
                        Swal.fire({
                            title: 'This label name ' + text +
                                ' is already in use with an existing label',
                            confirmButtonText: 'OK',
                            confirmButtonColor: 'rgb(36 63 161)',
                            background: 'rgb(105 126 157)',
                        }).then(function(Confirm) {
                            $('#labelname').val('');
                            $('#save').prop('disabled', true);
                            $('input[type=checkbox]').prop('disabled', true);
                            $('#labeltype').prop('disabled', true);
                            $('#selectall').prop('disabled', true);
                            $('.nonstore').prop('disabled', true);
                        });
                        // alert('Label name already exists');
                    } else {
                        // console.log('RESULT is false');
                        $('#save').prop('disabled', false);
                        $('#save').css('opacity', '100%');
                        $('#labeltype').prop('disabled', false);
                        $('input[type=checkbox]').prop('disabled', false);
                    }
                }
            });
        }

        $(document).on('change', '.predefined_dynamic', function() {
            // $('#Customername_input').val("");
            $('#labelstaticfield1_inpu1').val("");
            $('#labelstaticfield1_inpu1').val("");
            if ($(this).val() == 'dynamic') {
                $('.unwantedfordynamiclabel input:checkbox').prop('checked', false);
                $('.unwantedfordynamiclabel input:checkbox').prop('disabled', true);
                $(".unwantedfordynamiclabel").each(function() {
                    // console.log($(this).children().children().attr('id'), 'popo');
                })
                $('.unwantedfordynamiclabel').hide();
                $('#sortable1').empty();
                $('#sortable2').empty();
                $('.nonstore').prop("checked", false);
                $("#selectall").prop('checked', false);
                po();
                checkLabelName();

            } else {

                $('.unwantedfordynamiclabel input:checkbox').prop('disabled', true);
            }
            $('.unwantedfordynamiclabel').show();
            $('.nonstore').prop("checked", false);
            $("#selectall").prop('checked', false);
            po();
            checkLabelName();
        });


        $(document).ready(function() {
            $("#span_datamatrix_nonstore").hide();
            $('.fieldname_check').prop('checked', true);

            if ($('#dynamic-btn').is(":checked") == true) {
                // console.log('ppoipoi');
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
        $(document).ready(function() {
            $("#span_datamatrix_nonstore").hide();
            $('.fieldname_check').prop('checked', true);

            if ($('#dynamic-btn').is(":checked") == true) {
                // console.log('ppoipoi');
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

        function click() {
            // //console.log("jj");
            var size = $('#' + label_id).css('font-size');
            var family = $('#' + label_id).css('font-family');
            var bold = $('#' + label_id).css('font-weight');
            var italic = $('#' + label_id).css('font-style');
            var underline = $('#' + label_id).css('text-decoration');
            var align = $('#' + label_id).css('text-align');
            // //console.log(size, bold, italic, underline);
            var siz = size.replace(/px/g, "");


            // //console.log(align);
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
            var width = $('#shipperlabel').css('width');
            var widthbox = $('#width').val();
            var heightbox = $('#height').val();
            var height = $('#shipperlabel').css('height');
            var label_height_mm = parseFloat(height) * parseFloat(0.2645833333);
            var label_width_mm = parseFloat(width) * parseFloat(0.2645833333);
            // //console.log(label_height_mm, heightbox);
            // $('.droptrue').css('background-color', '#000');



            if (label_width_mm > (parseInt(widthbox) + 13)) {
                var w = Math.ceil(label_width_mm / 10) * 10;
                // //console.log("width if");
                // $("#width").val(w);
                // $("#width").css('border', '1px solid red');
                // $("#shipperlabel").css('border', '1px solid red');
                // $("#tbody").css('border', '1px solid red');
                $("#print").prop('disabled', true);
                $("#print").attr('style',
                    'background-color: #322a2aba !important; width: 90px !important;  height: auto !important; padding:6px; padding-left:13px; padding-right:13px;'
                );
                // $("#Label_tab").css('color', 'black');

            } else {
                // //console.log("width else");
                // $("#width").css('border', '1px solid #000');
                // $("#tbody").css('border', '1px solid #f2ecec');
                // $("#tbody").css('border-radius', '10px');
                $("#print").attr('style',
                    'background-color: #000 !important; width: 90px !important;  height: auto !important;  padding:6px; padding-left:13px; padding-right:13px;'
                );
                // $("#print").css('background-color', ' rgb(0 0 0) !important');
                // $("#Label_tab").css('color', '#000');
                $("#print").prop('disabled', false);
            }

            if (label_height_mm > heightbox) {
                // //console.log("height if");
                var h = Math.ceil(label_height_mm / 10) * 10;
                // // $("#height").val(h);
                // $("#shipperlabel").css('border', '1px solid red');
                // $("#height").css('border', '1px solid red');

                // $("#tbody").css('border', '1px solid red');
                // $("#Label_tab").css('color', 'red');
                $("#print").attr('style',
                    'background-color: #322a2aba !important; width: 90px !important;  height: auto !important;  padding:6px; padding-left:13px; padding-right:13px;'
                );
                // $("#print").attr('style', 'background-color: #322a2aba !important; width: 90px !important;  height: auto !important;');
                // $("#print").css('background-color', '#322a2aba !important');
                $("#print").prop('disabled', true);
            } else {
                // //console.log("height else");
                // $("#shipperlabel").css('border', '1px solid #f2ecec');
                // $("#height").css('border', '1px solid #000');

                // $("#tbody").css('border', '1px solid #f2ecec');
                $("#print").prop('disabled', false);
                $("#print").attr('style',
                    'background-color: #000 !important; width: 90px !important;  height: auto !important; padding:6px; padding-left:13px; padding-right:13px;'
                );
                $("#print").css('background-color', ' rgb(0 0 0) !important');
                // $("#Label_tab").css('color', '#000');
            }
        }

        function canDoubleClickKeyup(currId) {
            var currLabelName = "shipperlabel";
            if ($("#dynamic-btn").is(":checked") == true) {
                currLabelName = "innerlabel"
            }
            // console.log($('#' + currId + '_input').val(), 'l', currId);
            $('#' + currId).text($('#' + currId + '_input').val());
            // $('#Freefield1_name' + currId +"_input").val($('#' + currId + '_input').val());
            var nonstoreId = currId.split('_');
            // console.log(nonstoreId);
            $('#' + currLabelName + nonstoreId[0]).text($('#' + currId + '_input').val() + ' : ');
        }
        var metalabel = @json($config_data);

        $(document).ready(function() {
            $('body').attr('style',
                'zoom:100% !important;font-family: Arial !important; font-size: 14px !important;');

            $("#printapplication").html("Print Application -  Label Design");
            $('.ui-state-default').css('border', '1px solid #fff !important');
            $('input[type="checkbox"]').prop('disabled', true);
            $('.predefined_dynamic').prop('disabled', true);
            $('#labelname').focus();
            $('#fieldname').prop('checked', true);
            $('#fieldname').trigger('change');
            $(".alert").fadeOut(2000);
            var some = [];

            $('.canDoubleClick').dblclick(function() {
                $('#save').prop('disabled', true);
                currId = this.id;
                // console.log(currId);
                $('#' + currId).hide();
                $('#' + currId + '_input').show();
                $('#' + currId + '_input').focus();

                $('#' + currId + '_input').keyup(function() {
                    // console.log(currId, 'currId');
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

            // $('#Customername_input').keyup(function() {
            //     // console.log("inside customer input");
            //     $('#shipperlabel,#innerlabel').find('#Customername_label').empty();
            //     var val = $('#Customername_input').val();
            //     // console.log($('#Customername_label'));
            //     $('#shipperlabel,#innerlabel').find('#Customername_label').append(
            //         `<span class="delimiter"> : </span> ${val}`);
            // });

            $('#labelstaticfield1_input').keyup(function() {
                $('#shipperlabel,#innerlabel').find('#labelstaticfield1').empty();
                var sVal = $('#Staticfield_input').val();
                $('#shipperlabel,#innerlabel').find('#labelstaticfield1').append(`${sVal}`);
            });

            $('#labelstaticfield2_input').keyup(function() {
                $('#shipperlabel,#innerlabel').find('#labelstaticfield2').empty();
                var sVal = $('#Staticfield_input2').val();
                $('#shipperlabel,#innerlabel').find('#labelstaticfield2').append(`${sVal}`);
            });

            $("#code").change(function() {
                var idPrefix_Labeltype = 'shipperlabel';
                if ($("#dynamic-btn").is(":checked") == true) {
                    idPrefix_Labeltype = 'innerlabel';
                }
                if ($(this).val() === "QRcode") {
                    $("#span_QRcode_nonstore").show();
                    $("#span_datamatrix_nonstore").hide();
                    $('#plus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;'
                    );$('#minus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;'
                    );
                    $("#num").val(60);

                } else if ($(this).val() === "GS1") {
                    $("#span_QRcode_nonstore").hide();
                    $("#span_datamatrix_nonstore").show();
                    $('#plus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;'
                    );$('#minus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;'
                    );
                    $('#num').val('40px_40px');

                }
            });
            $("#width").change(function() {
                var width = $("#width").val();
                if (width > 210) {
                    $("#width").val('210');
                }
                var labelToChange = '';
                if ($('.predefined_dynamic:checked').val() == 'predefined') {
                    labelToChange = 'shipperlabel';
                } else {
                    labelToChange = 'innerlabel';
                }
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
                var labelToChange = '';
                if ($('.predefined_dynamic:checked').val() == 'predefined') {
                    labelToChange = 'shipperlabel';
                } else {
                    labelToChange = 'innerlabel';
                }
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
                // tab();
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

            //Plus
            $("#plus").click(function() {
                let seletedCode=$('#code').val();
                console.log(seletedCode);
                // console.log($('#plus').attr('disabled', true)[0]);
                if(seletedCode == "QRcode"){

                    if ($('#plus').attr('disabled', true)[0].disabled) {}
                    else {
                        if ($('#Store').is(":checked")) {
                            var num = $('#num').val();
                            var text = $('#textareabox').val();
                        } else {
                            var num = $('#num').val();
                            // console.log(num);
                            var text =
                                '"Product Name :XXXXXXXXXXXX XXX, Unique product code : 08912678294012,Batch no : 4 ,Serial Shipping Container Code :112345600000000705, Packing quantity :10kg,XXX : 8kg,Gross weight : 8.2kg, StorageCondition : stored at room temperature, Caution statement : Could melt if store in heating condition,Batch size : 6 kg, Date of manufacturing : 20/06/2022, Date of expiry : 20/06/2025, Brand name : NA,  Date of retest : 20/06/2024, Tare weight : 0.12kg, Adl Field : NA"';
                        }

                        var width = $('#width').val();
                        var height = $('#height').val();

                        var sum = parseInt(width);
                        var num1 = parseInt(num) + 10;
                        console.log(num1);
                        if (num1 >= 100) {
                            num2 = 100;
                            $('#plus').prop('disabled', true);
                            // $('#plus').css('background-color', '#322a2aba !important');
                            $('#plus').attr('style',
                                'background-color: #322a2aba !important;    width: 30px !important; padding-top: 4px; height: 30px !important;'
                            );

                        } else {
                            num2 = num1;
                                $('#minus').prop('disabled', false);
                                $('#minus').attr('style',
                                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer;  height: 30px !important;'
                                );
                        }
                        $('#num').val(num2);

                        $.ajax({
                            url: "{{ url('/labelsize') }}",
                            type: "GET",
                            data: {
                                num: num2,
                                text: text,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(result) {
                                if(seletedCode == 'QRcode'){
                                    $("#span_QRcode_nonstore").html(result);
                                }

                            }
                        });
                    }
                }


                    if(seletedCode === 'GS1'){
                        if($('#codeName_gs1').height() < 100 && $('#codeName_gs1').width() < 100){
                            var height = $('#codeName_gs1').height() + 10;
                            var width = $('#codeName_gs1').width() + 10;
                            console.log(height,width);
                            $('#codeName_gs1').css('height', height + 'px');
                            $('#codeName_gs1').css('width', width + 'px');
                            $('#num').val($('#codeName_gs1').css('height') + '_' + $('#codeName_gs1').css('width'));
                            $('#minus').prop('disabled', false);
                            $('#minus').attr('style',
                            'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer;  height: 30px !important;'
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

            //Minus
            $("#minus").click(function() {
                let seletedCode=$('#code').val();
                // console.log($('#minus').attr('disabled', true)[0].disabled);
                if(seletedCode == "QRcode"){
                    if ($('#minus').attr('disabled', true)[0].disabled) {} else {
                    if ($('#Store').is(":checked")) {
                        var num = $('#num').val();
                        var text = $('#textareabox').val();
                        var num1 = parseInt(num) - 10;
                    } else {
                        //console.log('if');

                        var num = $('#num').val();
                        var text =
                            '"Product Name :XXXXXXXXXXXXXXX, Unique product code : 08912678294012,Batch no : 4 ,Serial Shipping Container Code :112345600000000705, Packing quantity :10kg,XXX : 8kg,Gross weight : 8.2kg, Storage condition : stored at room temperature, Batch size : 6 kg, Date of manufacturing : 20/06/2022, Date of expiry : 20/06/2025, Brand name : NA,  Date of retest : 20/06/2024, Caution statement : Could melt if store in heating condition,Tare weight : 0.12kg, Adl Field : NA"';
                        var num1 = parseInt(num) - 10;
                        console.log(num1);
                    }
                    //console.log(num1);
                    if (num1 < 60) {
                        num2 = 60;
                        $('#minus').prop('disabled', true);
                        // $('#plus').css('background-color', '#322a2aba !important');
                        $('#minus').attr('style',
                            'background-color: #322a2aba !important;   padding-top: 4px; width: 30px !important;  height: 30px !important;'
                        );

                    } else {
                        num2 = num1;
                        $('#plus').prop('disabled', false);
                        $('#plus').attr('style',
                            'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;'
                        );
                    }

                    $('#num').val(num2);

                    if(seletedCode === 'GS1'){

            }
                    $.ajax({
                        url: "{{ url('/labelsize') }}",
                        type: "GET",
                        data: {
                            num: num2,
                            text: text,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            if(seletedCode == 'QRcode'){
                                $("#span_QRcode_nonstore").html(result);
                            }else{
                                // $("#span_datamatrix_nonstore").html(result);
                            }

                        }
                    });
                    }
                }
                if(seletedCode === 'GS1'){
                if($('#codeName_gs1').height() > 60 && $('#codeName_gs1').width() > 60){
                    var height = $('#codeName_gs1').height() - 10;
                    var width = $('#codeName_gs1').width() - 10;
                    console.log(height,width);
                    $('#codeName_gs1').css('height', height + 'px');
                    $('#codeName_gs1').css('width', width + 'px');
                    $('#num').val($('#codeName_gs1').css('height') + '_' + $('#codeName_gs1').css('width'));
                    $('#plus').prop('disabled', false);
                    $('#plus').attr('style',
                    'background-color: #000 !important;    width: 30px !important; padding-top: 4px; cursor:pointer; height: 30px !important;'
                    );
                }else{
                    $('#minus').prop('disabled', true);
                        // $('#plus').css('background-color', '#322a2aba !important');
                        $('#minus').attr('style',
                            'background-color: #322a2aba !important;   padding-top: 4px; width: 30px !important;  height: 30px !important;'
                        );

                }
            }


                    error();

            });




            $('#labelname').keyup(function() {
                $('#saveselect').prop("disabled", false);
                $('input[type="checkbox"]').prop('disabled', false);
                $('.predefined_dynamic').prop('disabled', false);
            });

            $('.mouseup').click(function() {
                var currLabelName = 'shipperlabel';
                if ($("#dynamic-btn").is(":checked") == true) {
                    currLabelName = "innerlabel";
                }

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
                label_id_nonstore = this.id.split('shipperlabel')[1];
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




                // //console.log(className == 'mouseup');


                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('.labeltext').css('border-style', 'none');
                    $('.labeltext').css('padding', '0px');
                    $('.labeltext').css('cursor', 'default');
                }

                // if the target of the click isn't the container nor a descendant of the container


            });

            //Delimeter
            $('#delimiteralign').click(function() {
            var idPrefix_Labeltype = 'shipperlabel';
            if ($("#dynamic-btn").is(":checked") == true) {
                idPrefix_Labeltype = 'innerlabel'
            }
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
                            if (idPrefix_Labeltype === 'containerlabel') {
                                $('.' + id_one[i]).val(pos[i]);
                            } else {
                                $('.inner-' + id_one[i]).val(pos[i]);
                            }
                        }
                    }
                }
            }
        });


            // ------------------ save ------------
            $('#save').click(function(e) {
                event.preventDefault();

                if ($('#labelstaticfield1').is(":checked") == true && $("#labelstaticfield1_input")
                    .val() == "") {
                    Swal.fire({
                        title: 'Please enter the value of static field',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',

                    });


                } else if ($('#labelstaticfield2').is(":checked") == true && $(
                        "#labelstaticfield2_input").val() ==
                    "") {
                    Swal.fire({
                        title: 'Please enter the value of static field',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',

                    });
                } else if ($('#labelname').val() == "") {
                    Swal.fire({
                        title: 'Please enter the Label Name!',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                } else if ($('#producttype_input').val() == "") {
                    Swal.fire({
                        title: 'Product Type Should not be empty!',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                } else if ($('#labeltype_input').val() == "") {
                    Swal.fire({
                        title: 'Label Type Shoule not be empty',
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    });
                } else {
                    Swal.fire({
                        title: 'Are you sure want to save this label design?',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',
                        background: 'rgb(105 126 157)',
                    }).then(function(Confirm) {
                        if (Confirm.isConfirmed) {
                            if ($("#predefined-btn").is(":checked")) {
                                // -----------Start from this-------//
                                //organisation style and position
                                if ($('#shipperlabelorganisationname_label').length != 0) {
                                    $('#organisationname_label_style').val($(
                                            '#shipperlabelorganisationname_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelorganisationname_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelorganisationname_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelorganisationname_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelorganisationname_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelorganisationname_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelorganisationname_label').length === 0) {
                                    $('.organisationname_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                                } else {
                                    $('.organisationname_labelposition').val($(
                                            '#shipperlabelorganisationname_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabelorganisationname_label').css(
                                        'left') +
                                        '_' + $(
                                            '#shipperlabelorganisationname_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelorganisationname_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabelorganisationname').css('width'));
                                }
                                //Product name style and position
                                if ($('#shipperlabelproductname_label').length != 0) {
                                    $('#productname_label_style').val($(
                                            '#shipperlabelproductname_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductname_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductname_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductname_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductname_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductname_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductname_label').length === 0) {
                                    $('.productname_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.productname_labelposition').val($(
                                            '#shipperlabelproductname_label').css('top') + '_' +
                                        $(
                                            '#shipperlabelproductname_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelproductname_label').css('height') +
                                        '_' +
                                        $('#shipperlabelproductname_label').css('width') + '_' +
                                        $(
                                            '#shipperlabelproductname').css('width'));
                                }
                                //Product id style and position
                                if ($('#shipperlabelproductid_label').length != 0) {
                                    $('#productid_label_style').val($(
                                            '#shipperlabelproductid_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductid_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductid_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductid_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductid_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductid_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductid_label').length === 0) {
                                    $('.productid_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.productid_labelposition').val($(
                                            '#shipperlabelproductid_label').css('top') + '_' +
                                        $(
                                            '#shipperlabelproductid_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelproductid_label').css('height') +
                                        '_' +
                                        $('#shipperlabelproductid_label').css('width') + '_' +
                                        $(
                                            '#shipperlabelproductid').css('width'));
                                }
                                //Product comments style and position
                                if ($('#shipperlabelproductcomments_label').length != 0) {
                                    $('#productcomments_label_style').val($(
                                            '#shipperlabelproductcomments_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductcomments_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductcomments_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductcomments_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductcomments_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductcomments_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductcomments_label').length === 0) {
                                    $('.productcomments_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.productcomments_labelposition').val($(
                                            '#shipperlabelproductcomments_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabelproductcomments_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelproductcomments_label').css(
                                        'height') +
                                        '_' +
                                        $('#shipperlabelproductcomments_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabelproductcomments').css('width'));
                                }
                                //P1 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield1_label').length != 0) {
                                    $('#productstaticfield1_label_style').val($(
                                            '#shipperlabelproductstaticfield1_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield1_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield1_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield1_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield1_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield1_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield1_label').length === 0) {
                                    $('.productstaticfield1_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield1_labelposition').val($(
                                            '#shipperlabelproductstaticfield1_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield1_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield1_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield1_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield1').css('width'));
                                }
                                //P2 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield2_label').length != 0) {
                                    $('#productstaticfield2_label_style').val($(
                                            '#shipperlabelproductstaticfield2_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield2_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield2_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield2_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield2_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield2_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield2_label').length === 0) {
                                    $('.productstaticfield2_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield2_labelposition').val($(
                                            '#shipperlabelproductstaticfield2_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield2_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield2_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield2_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield2').css('width'));
                                }
                                //P3 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield3_label').length != 0) {
                                    $('#productstaticfield3_label_style').val($(
                                            '#shipperlabelproductstaticfield3_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield3_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield3_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield3_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield3_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield3_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield3_label').length === 0) {
                                    $('.productstaticfield3_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield3_labelposition').val($(
                                            '#shipperlabelproductstaticfield3_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield3_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield3_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield3_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield3').css('width'));
                                }
                                //P4 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield4_label').length != 0) {
                                    $('#productstaticfield4_label_style').val($(
                                            '#shipperlabelproductstaticfield4_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield4_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield4_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield4_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield4_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield4_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield4_label').length === 0) {
                                    $('.productstaticfield4_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield4_labelposition').val($(
                                            '#shipperlabelproductstaticfield4_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield4_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield4_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield4_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield4').css('width'));
                                }
                                //P5 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield5_label').length != 0) {
                                    $('#productstaticfield5_label_style').val($(
                                            '#shipperlabelproductstaticfield5_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield5_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield5_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield5_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield5_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield5_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield5_label').length === 0) {
                                    $('.productstaticfield5_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield5_labelposition').val($(
                                            '#shipperlabelproductstaticfield5_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield5_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield5_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield5_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield5').css('width'));
                                }
                                //P6 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield6_label').length != 0) {
                                    $('#productstaticfield6_label_style').val($(
                                            '#shipperlabelproductstaticfield6_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield6_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield6_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield6_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield6_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield6_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield6_label').length === 0) {
                                    $('.productstaticfield6_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield6_labelposition').val($(
                                            '#shipperlabelproductstaticfield6_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield6_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield6_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield6_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield6').css('width'));
                                }
                                //P7 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield7_label').length != 0) {
                                    $('#productstaticfield7_label_style').val($(
                                            '#shipperlabelproductstaticfield7_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield7_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield7_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield7_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield7_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield7_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield7_label').length === 0) {
                                    $('.productstaticfield7_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield7_labelposition').val($(
                                            '#shipperlabelproductstaticfield7_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield7_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield7_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield7_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield7').css('width'));
                                }
                                //P8 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield8_label').length != 0) {
                                    $('#productstaticfield8_label_style').val($(
                                            '#shipperlabelproductstaticfield8_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield8_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield8_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield8_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield8_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield8_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield8_label').length === 0) {
                                    $('.productstaticfield8_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield8_labelposition').val($(
                                            '#shipperlabelproductstaticfield8_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield8_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield8_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield8_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield8').css('width'));
                                }
                                //P8 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield9_label').length != 0) {
                                    $('#productstaticfield9_label_style').val($(
                                            '#shipperlabelproductstaticfield9_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield9_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield9_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield9_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield9_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield9_label').css(
                                            'font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield9_label').length === 0) {
                                    $('.productstaticfield9_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield9_labelposition').val($(
                                            '#shipperlabelproductstaticfield9_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield9_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield9_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield9_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield9').css('width'));
                                }
                                //P10 Staticfield style and position
                                if ($('#shipperlabelproductstaticfield10_label').length != 0) {
                                    $('#productstaticfield10_label_style').val($(
                                            '#shipperlabelproductstaticfield10_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelproductstaticfield10_label')
                                        .css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelproductstaticfield10_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelproductstaticfield10_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelproductstaticfield10_label')
                                        .css(
                                            'font-size') +
                                        '_' + $('#shipperlabelproductstaticfield10_label')
                                        .css('font-family'));
                                }


                                if ($('#shipperlabelproductstaticfield10_label').length === 0) {
                                    $('.productstaticfield10_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.productstaticfield10_labelposition').val($(
                                            '#shipperlabelproductstaticfield10_label').css(
                                            'top') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield10_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelproductstaticfield10_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelproductstaticfield10_label').css(
                                            'width') + '_' +
                                        $(
                                            '#shipperlabelproductstaticfield10').css('width'));
                                }
                                //Batch no style and position
                                if ($('#shipperlabelbatchno_label').length != 0) {
                                    $('#batchno_label_style').val($(
                                            '#shipperlabelbatchno_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelbatchno_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelbatchno_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelbatchno_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelbatchno_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelbatchno_label').css('font-family')
                                        );
                                }


                                if ($('#shipperlabelbatchno_label').length === 0) {
                                    $('.batchno_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.batchno_labelposition').val($(
                                            '#shipperlabelbatchno_label').css('top') + '_' +
                                        $(
                                            '#shipperlabelbatchno_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelbatchno_label').css('height') +
                                        '_' +
                                        $('#shipperlabelbatchno_label').css('width') + '_' +
                                        $(
                                            '#shipperlabelbatchno').css('width'));
                                }
                                //Date of manufacture style and position
                                if ($('#shipperlabeldateofmanufacture_label').length != 0) {
                                    $('#dateofmanufacture_label_style').val($(
                                            '#shipperlabeldateofmanufacture_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabeldateofmanufacture_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabeldateofmanufacture_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabeldateofmanufacture_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabeldateofmanufacture_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabeldateofmanufacture_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabeldateofmanufacture_label').length === 0) {
                                    $('.dateofmanufacture_labelposition').val(
                                    '0px_0px_0px_0px_0px');
                                } else {
                                    $('.dateofmanufacture_labelposition').val($(
                                            '#shipperlabeldateofmanufacture_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabeldateofmanufacture_label').css(
                                        'left') +
                                        '_' + $(
                                            '#shipperlabeldateofmanufacture_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabeldateofmanufacture_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabeldateofmanufacture').css('width'));
                                }
                                //Date of exp style and position
                                if ($('#shipperlabeldateofexp_label').length != 0) {
                                    $('#dateofexp_label_style').val($(
                                            '#shipperlabeldateofexp_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabeldateofexp_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabeldateofexp_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabeldateofexp_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabeldateofexp_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabeldateofexp_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabeldateofexp_label').length === 0) {
                                    $('.dateofexp_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.dateofexp_labelposition').val($(
                                            '#shipperlabeldateofexp_label').css('top') + '_' +
                                        $(
                                            '#shipperlabeldateofexp_label').css('left') +
                                        '_' + $(
                                            '#shipperlabeldateofexp_label').css('height') +
                                        '_' +
                                        $('#shipperlabeldateofexp_label').css('width') + '_' +
                                        $(
                                            '#shipperlabeldateofexp').css('width'));
                                }
                                //Date of retest style and position
                                if ($('#shipperlabeldateofretest_label').length != 0) {
                                    $('#dateofexp_label_style').val($(
                                            '#shipperlabeldateofretest_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabeldateofretest_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabeldateofretest_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabeldateofretest_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabeldateofretest_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabeldateofretest_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabeldateofretest_label').length === 0) {
                                    $('.dateofexp_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.dateofexp_labelposition').val($(
                                            '#shipperlabeldateofretest_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabeldateofretest_label').css('left') +
                                        '_' + $(
                                            '#shipperlabeldateofretest_label').css('height') +
                                        '_' +
                                        $('#shipperlabeldateofretest').css('width') + '_' +
                                        $(
                                            '#shipperlabeldateofexp').css('width'));
                                }
                                //B1 static field style and position
                                if ($('#shipperlabelbatchstaticfield1_label').length != 0) {
                                    $('#batchstaticfield1_label_style').val($(
                                            '#shipperlabelbatchstaticfield1_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelbatchstaticfield1_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelbatchstaticfield1_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelbatchstaticfield1_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelbatchstaticfield1_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelbatchstaticfield1_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelbatchstaticfield1_label').length === 0) {
                                    $('.batchstaticfield1_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.batchstaticfield1_labelposition').val($(
                                            '#shipperlabelbatchstaticfield1_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield1_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelbatchstaticfield1_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelbatchstaticfield1_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield1').css('width'));
                                }
                                //B2 static field style and position
                                if ($('#shipperlabelbatchstaticfield2_label').length != 0) {
                                    $('#batchstaticfield2_label_style').val($(
                                            '#shipperlabelbatchstaticfield2_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelbatchstaticfield2_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelbatchstaticfield2_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelbatchstaticfield2_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelbatchstaticfield2_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelbatchstaticfield2_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelbatchstaticfield2_label').length === 0) {
                                    $('.batchstaticfield2_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.batchstaticfield2_labelposition').val($(
                                            '#shipperlabelbatchstaticfield2_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield2_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelbatchstaticfield2_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelbatchstaticfield2_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield2').css('width'));
                                }
                                //B3 static field style and position
                                if ($('#shipperlabelbatchstaticfield3_label').length != 0) {
                                    $('#batchstaticfield3_label_style').val($(
                                            '#shipperlabelbatchstaticfield3_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelbatchstaticfield3_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelbatchstaticfield3_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelbatchstaticfield3_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelbatchstaticfield3_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelbatchstaticfield3_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelbatchstaticfield3_label').length === 0) {
                                    $('.batchstaticfield3_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.batchstaticfield3_labelposition').val($(
                                            '#shipperlabelbatchstaticfield3_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield3_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelbatchstaticfield3_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelbatchstaticfield3_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield3').css('width'));
                                }
                                //B4 static field style and position
                                if ($('#shipperlabelbatchstaticfield4_label').length != 0) {
                                    $('#batchstaticfield4_label_style').val($(
                                            '#shipperlabelbatchstaticfield4_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelbatchstaticfield4_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelbatchstaticfield4_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelbatchstaticfield4_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelbatchstaticfield4_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelbatchstaticfield4_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelbatchstaticfield4_label').length === 0) {
                                    $('.batchstaticfield4_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.batchstaticfield4_labelposition').val($(
                                            '#shipperlabelbatchstaticfield4_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield4_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelbatchstaticfield4_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelbatchstaticfield4_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield4').css('width'));
                                }
                                //B5 static field style and position
                                if ($('#shipperlabelbatchstaticfield5_label').length != 0) {
                                    $('#batchstaticfield5_label_style').val($(
                                            '#shipperlabelbatchstaticfield5_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelbatchstaticfield5_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelbatchstaticfield5_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelbatchstaticfield5_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelbatchstaticfield5_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelbatchstaticfield5_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelbatchstaticfield5_label').length === 0) {
                                    $('.batchstaticfield5_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.batchstaticfield5_labelposition').val($(
                                            '#shipperlabelbatchstaticfield5_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield5_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabelbatchstaticfield5_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelbatchstaticfield5_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabelbatchstaticfield5').css('width'));
                                }
                                //netweight style and position
                                if ($('#shipperlabelnetweight_label').length != 0) {
                                    $('#netweight_label_style').val($(
                                            '#shipperlabelnetweight_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelnetweight_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelnetweight_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelnetweight_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelnetweight_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelnetweight_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelnetweight_label').length === 0) {
                                    $('.netweight_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.netweight_labelposition').val($(
                                            '#shipperlabelnetweight_label').css('top') + '_' +
                                        $(
                                            '#shipperlabelnetweight_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelnetweight_label').css('height') +
                                        '_' +
                                        $('#shipperlabelnetweight_label').css('width') + '_' +
                                        $(
                                            '#shipperlabelnetweight').css('width'));
                                }
                                //grossweight style and position
                                if ($('#shipperlabelgrossweight_label').length != 0) {
                                    $('#grossweight_label_style').val($(
                                            '#shipperlabelgrossweight_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelgrossweight_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelgrossweight_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelgrossweight_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelgrossweight_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelgrossweight_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelgrossweight_label').length === 0) {
                                    $('.grossweight_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.grossweight_labelposition').val($(
                                            '#shipperlabelgrossweight_label').css('top') + '_' +
                                        $(
                                            '#shipperlabelgrossweight_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelgrossweight_label').css('height') +
                                        '_' +
                                        $('#shipperlabelgrossweight_label').css('width') + '_' +
                                        $(
                                            '#shipperlabelgrossweight').css('width'));
                                }
                                //tareweight style and position
                                if ($('#shipperlabeltareweight_label').length != 0) {
                                    $('#tareweight_label_style').val($(
                                            '#shipperlabeltareweight_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabeltareweight_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabeltareweight_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabeltareweight_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabeltareweight_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabeltareweight_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabeltareweight_label').length === 0) {
                                    $('.tareweight_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.tareweight_labelposition').val($(
                                            '#shipperlabeltareweight_label').css('top') + '_' +
                                        $(
                                            '#shipperlabeltareweight_label').css('left') +
                                        '_' + $(
                                            '#shipperlabeltareweight_label').css('height') +
                                        '_' +
                                        $('#shipperlabeltareweight_label').css('width') + '_' +
                                        $(
                                            '#shipperlabeltareweight').css('width'));
                                }
                                //Dyanmaic1 style and position
                                if ($('#shipperlabeldynamicfield1_label').length != 0) {
                                    $('#dynamicfield1_label_style').val($(
                                            '#shipperlabeldynamicfield1_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabeldynamicfield1_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabeldynamicfield1_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabeldynamicfield1_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabeldynamicfield1_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabeldynamicfield1_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabeldynamicfield1_label').length === 0) {
                                    $('.dynamicfield1_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.dynamicfield1_labelposition').val($(
                                            '#shipperlabeldynamicfield1_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabeldynamicfield1_label').css('left') +
                                        '_' + $(
                                            '#shipperlabeldynamicfield1_label').css('height') +
                                        '_' +
                                        $('#shipperlabeldynamicfield1_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabeldynamicfield1').css('width'));
                                }
                                //Dyanmaic2 style and position
                                if ($('#shipperlabeldynamicfield2_label').length != 0) {
                                    $('#dynamicfield2_label_style').val($(
                                            '#shipperlabeldynamicfield2_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabeldynamicfield2_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabeldynamicfield2_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabeldynamicfield2_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabeldynamicfield2_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabeldynamicfield2_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabeldynamicfield2_label').length === 0) {
                                    $('.dynamicfield2_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.dynamicfield2_labelposition').val($(
                                            '#shipperlabeldynamicfield2_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabeldynamicfield2_label').css('left') +
                                        '_' + $(
                                            '#shipperlabeldynamicfield2_label').css('height') +
                                        '_' +
                                        $('#shipperlabeldynamicfield2_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabeldynamicfield2').css('width'));
                                }
                                //globalstaticfield1 style and position
                                if ($('#shipperlabelglobalstaticfield1_label').length != 0) {
                                    $('#globalstaticfield1_label_style').val($(
                                            '#shipperlabelglobalstaticfield1_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelglobalstaticfield1_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelglobalstaticfield1_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelglobalstaticfield1_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelglobalstaticfield1_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelglobalstaticfield1_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelglobalstaticfield1_label').length === 0) {
                                    $('.globalstaticfield1_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.globalstaticfield1_labelposition').val($(
                                            '#shipperlabelglobalstaticfield1_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabelglobalstaticfield1_label').css(
                                        'left') +
                                        '_' + $(
                                            '#shipperlabelglobalstaticfield1_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelglobalstaticfield1_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabelglobalstaticfield1').css('width'));
                                }
                                //globalstaticfield2 style and position
                                if ($('#shipperlabelglobalstaticfield2_label').length != 0) {
                                    $('#globalstaticfield2_label_style').val($(
                                            '#shipperlabelglobalstaticfield2_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelglobalstaticfield2_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelglobalstaticfield2_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelglobalstaticfield2_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelglobalstaticfield2_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelglobalstaticfield2_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelglobalstaticfield2_label').length === 0) {
                                    $('.globalstaticfield2_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.globalstaticfield2_labelposition').val($(
                                            '#shipperlabelglobalstaticfield2_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabelglobalstaticfield2_label').css(
                                        'left') +
                                        '_' + $(
                                            '#shipperlabelglobalstaticfield2_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabelglobalstaticfield2_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabelglobalstaticfield2').css('width'));
                                }
                                //labelstaticfield1 style and position
                                if ($('#shipperlabellabelstaticfield1_label').length != 0) {
                                    $('#labelstaticfield1_label_style').val($(
                                            '#shipperlabellabelstaticfield1_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabellabelstaticfield1_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabellabelstaticfield1_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabellabelstaticfield1_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabellabelstaticfield1_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabellabelstaticfield1_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabellabelstaticfield1_label').length === 0) {
                                    $('.labelstaticfield1_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.labelstaticfield1_labelposition').val($(
                                            '#shipperlabellabelstaticfield1_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabellabelstaticfield1_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabellabelstaticfield1_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabellabelstaticfield1_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabellabelstaticfield1').css('width'));
                                }
                                //labelstaticfield2 style and position
                                if ($('#shipperlabellabelstaticfield2_label').length != 0) {
                                    $('#labelstaticfield2_label_style').val($(
                                            '#shipperlabellabelstaticfield2_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabellabelstaticfield2_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabellabelstaticfield2_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabellabelstaticfield2_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabellabelstaticfield2_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabellabelstaticfield2_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabellabelstaticfield2_label').length === 0) {
                                    $('.labelstaticfield2_labelposition').val(
                                        '0px_0px_0px_0px_0px');
                                } else {
                                    $('.labelstaticfield2_labelposition').val($(
                                            '#shipperlabellabelstaticfield2_label').css(
                                        'top') + '_' +
                                        $(
                                            '#shipperlabellabelstaticfield2_label').css(
                                            'left') +
                                        '_' + $(
                                            '#shipperlabellabelstaticfield2_label').css(
                                            'height') +
                                        '_' +
                                        $('#shipperlabellabelstaticfield2_label').css(
                                        'width') + '_' +
                                        $(
                                            '#shipperlabellabelstaticfield2').css('width'));
                                }
                                //Sfreefield1 style and position
                                if ($('#shipperlabelSfreefield1_label').length != 0) {
                                    $('#Sfreefield1_label_style').val($(
                                            '#shipperlabelSfreefield1_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelSfreefield1_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelSfreefield1_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelSfreefield1_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelSfreefield1_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelSfreefield1_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelSfreefield1_label').length === 0) {
                                    $('.Sfreefield1_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.Sfreefield1_labelposition').val($(
                                            '#shipperlabelSfreefield1_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield1_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelSfreefield1_label').css('height') +
                                        '_' +
                                        $('#shipperlabelSfreefield1_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield1').css('width'));
                                }
                                //Sfreefield2 style and position
                                if ($('#shipperlabelSfreefield2_label').length != 0) {
                                    $('#Sfreefield2_label_style').val($(
                                            '#shipperlabelSfreefield2_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelSfreefield2_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelSfreefield2_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelSfreefield2_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelSfreefield2_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelSfreefield2_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelSfreefield2_label').length === 0) {
                                    $('.Sfreefield2_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.Sfreefield2_labelposition').val($(
                                            '#shipperlabelSfreefield2_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield2_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelSfreefield2_label').css('height') +
                                        '_' +
                                        $('#shipperlabelSfreefield2_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield2').css('width'));
                                }
                                //Sfreefield3 style and position
                                if ($('#shipperlabelSfreefield3_label').length != 0) {
                                    $('#Sfreefield3_label_style').val($(
                                            '#shipperlabelSfreefield3_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelSfreefield3_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelSfreefield3_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelSfreefield3_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelSfreefield3_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelSfreefield3_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelSfreefield3_label').length === 0) {
                                    $('.Sfreefield3_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.Sfreefield3_labelposition').val($(
                                            '#shipperlabelSfreefield3_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield3_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelSfreefield3_label').css('height') +
                                        '_' +
                                        $('#shipperlabelSfreefield3_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield3').css('width'));
                                }
                                //Sfreefield4 style and position
                                if ($('#shipperlabelSfreefield4_label').length != 0) {
                                    $('#Sfreefield4_label_style').val($(
                                            '#shipperlabelSfreefield4_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelSfreefield4_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelSfreefield4_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelSfreefield4_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelSfreefield4_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelSfreefield4_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelSfreefield4_label').length === 0) {
                                    $('.Sfreefield4_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.Sfreefield4_labelposition').val($(
                                            '#shipperlabelSfreefield4_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield4_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelSfreefield4_label').css('height') +
                                        '_' +
                                        $('#shipperlabelSfreefield4_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield4').css('width'));
                                }
                                //Sfreefield5 style and position
                                if ($('#shipperlabelSfreefield5_label').length != 0) {
                                    $('#Sfreefield5_label_style').val($(
                                            '#shipperlabelSfreefield5_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelSfreefield5_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelSfreefield5_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelSfreefield5_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelSfreefield5_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelSfreefield5_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelSfreefield5_label').length === 0) {
                                    $('.Sfreefield5_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.Sfreefield5_labelposition').val($(
                                            '#shipperlabelSfreefield5_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield5_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelSfreefield5_label').css('height') +
                                        '_' +
                                        $('#shipperlabelSfreefield5_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield5').css('width'));
                                }
                                //Sfreefield6 style and position
                                if ($('#shipperlabelSfreefield6_label').length != 0) {
                                    $('#Sfreefield6_label_style').val($(
                                            '#shipperlabelSfreefield6_label').css(
                                            'font-weight') +
                                        '_' + $('#shipperlabelSfreefield6_label').css(
                                            'font-style') + '_' + $(
                                            '#shipperlabelSfreefield6_label')
                                        .css('text-decoration') + '_' + $(
                                            '#shipperlabelSfreefield6_label').css(
                                            'text-align') +
                                        '_' + $('#shipperlabelSfreefield6_label').css(
                                            'font-size') +
                                        '_' + $('#shipperlabelSfreefield6_label').css(
                                            'font-family'));
                                }
                                if ($('#shipperlabelSfreefield6_label').length === 0) {
                                    $('.Sfreefield6_labelposition').val('0px_0px_0px_0px_0px');
                                } else {
                                    $('.Sfreefield6_labelposition').val($(
                                            '#shipperlabelSfreefield6_label').css('top') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield6_label').css('left') +
                                        '_' + $(
                                            '#shipperlabelSfreefield6_label').css('height') +
                                        '_' +
                                        $('#shipperlabelSfreefield6_label').css('width') +
                                        '_' +
                                        $(
                                            '#shipperlabelSfreefield6').css('width'));
                                }

                            }

                            $('#formId').attr('action', '/savelabeldesign');
                            $('#formId').attr('method', 'post');
                            $('#formId').submit();
                        }
                    });


                }
            });
            function selectbox() {
            if ((($(".nonstore:checked").length) + 1) == $(".nonstore").length) {
                $("#selectall").prop("checked", true);
            } else {
                $("#selectall").prop("checked", false);
            }
        }
        $('#labelname').change(function() {
                // console.log('label name');
                checkLabelName();
            });
            // -------------- non-store ------------

            $('.nonstore').click(function() {

                selectbox();
                $('#save').prop('disabled', false);
                var idPrefix_Labeltype = 'shipperlabel';
                // if ($("#dynamic-btn").is(":checked") == true) {
                //     idPrefix_Labeltype = "innerlabel";
                // }

                // if ($('#dynamic-btn').is(":checked") == true) {
                //     var count = 0;
                //     $.map($('#innerlabel').find(".textnonstore"), function(el) {
                //         count++;
                //     })
                //     // console.log(count, 'count');
                //     if (count == 12) {
                //         $('#selectall').prop("checked", true);
                //     } else {
                //         $('#selectall').prop("checked", false);

                //     }

                // }

                var label_metadata_master = @json($config_data);

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

                   if (this.id == 'organisationname') {

                        if (!$('#organisationnamefn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 40.9981px; top: 107.996px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}organisationname" style="display:inline-block; white-space: nowrap;"></span> <span class="delimiter"> <span style="color:#ff5454">XXXXXXXXXXXXXXX</span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 40.9981px; top: 107.996px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}organisationname" style="display:inline-block ; white-space: nowrap;">${metalabel.organization_name}</span><span> <span class="delimiter"> : <span style="color:#ff5454">XXXXXXXXXXXXXXX </span>
                                </span>`);
                        }
                    }else if (this.id == 'productname') {
                    if (!$('#productnamefn').is(':checked')) {
                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 40.9981px; top: 107.996px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productname" style="display:inline-block; white-space: nowrap;"></span> <span class="delimiter"> <span style="color:#ff5454">XXXXXXXXXXXXXXX</span>
                            </span>`);

                    } else {
                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 40.9981px; top: 107.996px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productname" style="display:inline-block ; white-space: nowrap;">${metalabel.product_name}</span><span> <span class="delimiter"> : <span style="color:#ff5454">XXXXXXXXXXXXXXX </span>
                            </span>`);
                    }
                    } else if (this.id == 'productid') {

                        if (!$('#productidfn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:197px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productid"  style="display:inline-block; white-space: nowrap;"></span> <span class="delimiter"> <span style="color:#ff5454"> XXXXXXXXXXXXXXX</span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:197px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productid" style="display:inline-block ; white-space: nowrap;">${metalabel.product_id}</span><span> <span class="delimiter"> : <span style="color:#ff5454">  XXXXXXXXXXXXXXX</span>
                                </span>`);
                        }
                    } else if (this.id == 'productcomments') {

                        if (!$('#productcommentsfn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:358px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productcomments"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalnetwt" style="color:#ff5454"> XXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:358px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productcomments" style="display:inline-block ; white-space: nowrap;"> ${metalabel.comments}</span><span class="decimalnetwt" style="color:#ff5454"> : XXX </span>
                               </span>`);
                        }
                    } else if (this.id == 'productstaticfield1') {

                        if (!$('#productstaticfield1fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:166px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield1"  style="display:inline-block; white-space: nowrap;"></span> <span class="delimiter"> <span style="color:#ff5454"> XXXXXXXXX</span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:166px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field1}</span><span> <span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX</span>
                                 </span>`);
                        }
                    } else if (this.id == 'productstaticfield2') {

                        if (!$('#productstaticfield2fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield2"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalbatchsize" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field2}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);
                        }
                    } else if (this.id == 'productstaticfield3') {

                        if (!$('#productstaticfield3fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield3"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields2" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield3" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field3}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);
                        }
                    } else if (this.id == 'productstaticfield4') {

                        if (!$('#productstaticfield4fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:184px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield4"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields3" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:184px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield4" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field4}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);
                        }
                    } else if (this.id == 'productstaticfield5') {

                        if (!$('#productstaticfield5fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:204px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield5"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields4" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:204px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield5" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field5}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'productstaticfield6') {

                        if (!$('#productstaticfield6fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:224px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields5" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:224px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field6}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'productstaticfield7') {

                        if (!$('#productstaticfield6fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:244px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields6" style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:244px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field7}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);
                        }
                    } else if (this.id == 'productstaticfield8') {

                        if (!$('#productstaticfield8fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:264px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields7" style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:264px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field8}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'productstaticfield9') {

                        if (!$('#productstaticfield9fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:284px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield9"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields8" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:284px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield9" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field9}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);
                        }
                    } else if (this.id == 'productstaticfield10') {

                        if (!$('#productstaticfield10fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:304px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield10"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields9" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:304px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield10" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field10}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'batchno') {

                        if (!$('#batchnofn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:324px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchno"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields10" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:324px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchno" style="display:inline-block ; white-space: nowrap;"> ${metalabel.batch_number}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'dateofmanufacture') {

                        if (!$('#dateofmanufacturefn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:344px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofmanufacture"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields11" style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:344px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofmanufacture" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_manufacturing}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'dateofexp') {

                        if (!$('#dateofexpfn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:364px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofexp"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields12" style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:364px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofexp" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_expiry}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'dateofretest') {

                        if (!$('#dateofretestfn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:384px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofretest"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields13" style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:384px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofretest" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_retest}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'batchstaticfield1') {

                        if (!$('#batchstaticfield1fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:404px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield1"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields14" style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:404px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field1}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'batchstaticfield2') {

                        if (!$('#batchstaticfield2fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:424px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield2"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalStaticfields15" style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:424px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field2}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'batchstaticfield3') {

                        if (!$('#batchstaticfield3fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:444px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield3"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimaldynamicfield1" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:444px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield3" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field3}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'batchstaticfield4') {

                        if (!$('#batchstaticfield4fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:464px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield4"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimaldynamicfield2" style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:464px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield4" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field4}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'batchstaticfield5') {

                        if (!$('#batchstaticfield5fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:left:337px; top:414px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield5"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalglobalstaticfield1" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:414px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield5" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field5}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'netweight') {

                        if (!$('#netweightfn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:440px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}netweight"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalglobalstaticfield2" style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:440px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}netweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.net_weight}</span><span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXX </span>
                                 </span>`);
                        }
                    } else if (this.id == 'grossweight') {

                        if (!$('#grossweightfn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:326px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}grossweight"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimalgrosswt" style="color:#ff5454">  XXX</span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:326px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}grossweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.gross_weight}</span><span class="decimalgrosswt" style="color:#ff5454"> : XXX</span>
                                </span>`);
                        }
                    } else if (this.id == 'tareweight') {

                        if (!$('#tareweightfn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:387px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}tareweight"  style="display:inline-block; white-space: nowrap;"></span> <span class="decimaltarewt" style="color:#ff5454"> XXX</span>
                                 </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:387px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}tareweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.tare_weight}</span><span class="decimaltarewt" style="color:#ff5454"> : XXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'dynamicfield1') {

                        if (!$('#dynamicfield1fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:225px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield1"  style="display:inline-block; white-space: nowrap;"></span> <span class="dateofretest" style="color:#ff5454"> XX-XX-XXXX  </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:225px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.dynamic_field1}</span><span class="dateofretest" style="color:#ff5454"> : XX-XX-XXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'dynamicfield2') {

                        if (!$('#dynamicfield2fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:256px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield2"  style="display:inline-block; white-space: nowrap;"></span> <span class="dateofmfg" style="color:#ff5454"> XX-XX-XXXX  </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:256px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.dynamic_field2}</span><span class="dateofmfg" style="color:#ff5454"> : XX-XX-XXXX </span>
                                </span>`);
                        }
                    } else if (this.id == 'globalstaticfield1') {

                        if (!$('#globalstaticfield1fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:292px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield1"  style="display:inline-block; white-space: nowrap;"></span> <span class="dateofexpiry" style="color:#ff5454">  XX-XX-XXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:292px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.global_static_field1}</span><span class="dateofexpiry" style="color:#ff5454"> : XX-XX-XXXX</span>
                                </span>`);
                        }
                    } else if (this.id == 'globalstaticfield2') {

                        if (!$('#globalstaticfield2fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:191px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield2"  style="display:inline-block; white-space: nowrap;"></span> <span class="containercount" style="color:#ff5454"> XXXXXXXX </span>
                                </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:191px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.global_static_field2}</span><span class="containercount" style="color:#ff5454"> : XXXXXXXX</span>
                                </span>`);
                        }
                    } else if (this.id == 'labelstaticfield1') {

                        var val = $('#labelstaticfield1_input').val();
                        var fieldValue = $('#labelstaticfield1_input').val();
                        if (!$('#labelstaticfield1fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:416px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield1"  style="display:inline-block;white-space: nowrap;"></span> <span id="labelstaticfield1Val" style="" class="fieldvalue">  </span>
                        </span>`);

                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:416px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield1"  style="display:inline-block;white-space: nowrap;"> {{ $config_data->label_static_field1 }} : </span> <span id="labelstaticfield1Val" style="" class="fieldvalue"> ${val}</span>
                        </span>`
                            );
                        }

                        $('#labelstaticfield1_label .fieldvalue').text($('#labelstaticfield1_input').val());
                    } else if (this.id == 'labelstaticfield2') {

                        var val2 = $('#labelstaticfield2_input').val();
                        var fieldValue = $('#labelstaticfield2_input')
                            .val(); // Get the value of the element with id "Staticfield2_name_input"
                        if (!$('#labelstaticfield2fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:450px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield2"  style="display:inline-block;white-space: nowrap;"></span> <span id="labelstaticfield2Val" style="" class="fieldvalue"></span>
                        </span>`
                            );
                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:450px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield2"  style="display:inline-block;white-space: nowrap;">{{ $config_data->label_static_field2 }} : </span> <span id="labelstaticfield2Val" style="" class="fieldvalue">${val2}</span>
                        </span>`
                            );
                        }
                        $('#labelstaticfield2_label .fieldvalue').text($('#labelstaticfield2_input').val());
//                      else if (this.id == 'Staticfield7') {
//                         var fieldValue = $('#Staticfield7_name_input').val();
//                         var imageSrc = "/images/image2.jpeg"; // path image

//                         $('#' + idPrefix_Labeltype).append(
//                             `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield7_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:502px; top:18px; position:absolute;">
// <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield7" style="display:inline-block;"></span>
// <span id="Staticfield7_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
//     <img src="" alt="Image1" style="width: 0.7in; height: 0.7in;" />
// </span>
// </span>`
//                         )
//                         $('#labelimage').on('change', function() {
//                             var file = this.files[0];
//                             var reader = new FileReader();

//                             reader.onload = function(e) {
//                                 var imageSrc = e.target.result;
//                                 $('#' + idPrefix_Labeltype + 'Staticfield7_label img').attr(
//                                     'src', imageSrc);
//                             }

//                             reader.readAsDataURL(file);

//                         });
//                     } else if (this.id == 'Staticfield8') {
//                         var fieldValue = $('#Staticfield8_name_input').val();
//                         var imageSrc = "/images/image2.jpeg"; // path image

//                         $('#' + idPrefix_Labeltype).append(
//                             `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Staticfield8_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:502px; top:58px; position:absolute;">
// <span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Staticfield8" style="display:inline-block;"></span>
// <span id="Staticfield8_label" style="word-wrap: break-all; word-wrap: break-word" class="fieldvalue">
//     <img src="" alt="Image2" style="width: 0.7in; height: 0.7in;" />
// </span>
// </span>`
//                         );
//                         $('#labelimage2').on('change', function() {
//                             var file = this.files[0];
//                             var reader = new FileReader();

//                             reader.onload = function(e) {
//                                 var imageSrc = e.target.result;
//                                 $('#' + idPrefix_Labeltype + 'Staticfield8_label img').attr(
//                                     'src', imageSrc);
//                             }

//                             reader.readAsDataURL(file);

//                         });



                    } else if (this.id == 'Sfreefield1') {

                        var field1Value = $('#Sfreefield1_input')
                            .val();
                        // console.log(field1Value);
                        if (!$('#Sfreefield1fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:219px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield1"  style="display:inline-block;"></span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                </span>`);
                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:219px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield1"  style="display:inline-block;">${field1Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                </span>`);
                        }

                    } else if (this.id == 'Sfreefield2') {

                        var field2Value = $('#Sfreefield2_input')
                            .val(); // Get the value of the element with id Freefield1_name_input
                        if (!$('#Sfreefield2fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:251px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield2"  style="display:inline-block;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                </span>`);
                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:251px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield2"  style="display:inline-block;">${field2Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                 </span>`);
                        }
                    } else if (this.id == 'Sfreefield3') {
                        var field3Value = $('#Sfreefield3_input').val();

                        if (!$('#Sfreefield3fn').is(':checked')) {

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:289px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield3"  style="display:inline-block;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                 </span>`);
                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:289px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield3"  style="display:inline-block;">${field3Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                 </span>`);
                        }

                    } else if (this.id == 'Sfreefield4') {
                        var field4Value = $('#Sfreefield4_input').val();
                        if (!$('#Sfreefield4fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:323px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield4"  style="display:inline-block;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX  </span>
                                </span>`);
                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:323px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield4"  style="display:inline-block;">${field4Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX  </span>
                                </span>`);
                        }
                    } else if (this.id == 'Sfreefield5') {

                        var field5Value = $('#Sfreefield5_input').val();
                        if (!$('#Sfreefield5fn').is(':checked')) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:360px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield5"  style="display:inline-block;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                </span>`);
                        } else {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:360px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield5"  style="display:inline-block;">${field5Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                </span>`);
                        }

                    } else if (this.id == 'Sfreefield6') {

                    var field6Value = $('#Sfreefield6_input').val();
                    if (!$('#Sfreefield6fn').is(':checked')) {
                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:400px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield6"  style="display:inline-block;"> </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                            </span>`);
                    } else {
                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}${this.id}_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:400px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield6"  style="display:inline-block;">${field6Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                            </span>`);
                    }

                    }
                    $('.fieldname_check').each(function() {
                        var idPrefix_Labeltype = 'shipperlabel';
                        if ($("#dynamic-btn").is(":checked") == true) {
                            idPrefix_Labeltype = "innerlabel";

                        }
                        var checkboxId = $(this).attr('id');
                        var metalabelId = checkboxId.replace('fn',''); // Construct the metalabel ID
                        if ($(this).is(':checked')) {
                            // Checkbox is checked, show the metalabel content
                            $('#' + idPrefix_Labeltype + metalabelId).show();
                        } else {
                            if ($('#' + idPrefix_Labeltype + this.id + '_label') !=
                                '#span_QRcode_nonstore' && $('#' + idPrefix_Labeltype + this.id +
                                    '_label') != '#inner-span_QRcode_nonstore') {
                                $('#' + idPrefix_Labeltype + this.id + '_label')
                                    .remove(); // remove the respective label
                            }
                            // Checkbox is unchecked, hide the metalabel content
                            $('#' + idPrefix_Labeltype + metalabelId).hide();
                        }
                    });

                }
                else {
                    console.log("yess");
                    $('#' + idPrefix_Labeltype + this.id + '_label').remove();
                    $('#selectall').prop('checked', false);
                    $('#Store_label').css('display', 'block');
                    $('#nonstore_lable').css('display', 'none');
                    $('#Store').prop('checked', false);
                    $('#Store').prop('disabled', false);
                    $('#' + this.id + '_label').remove();
                }
                po();
                checkLabelName();
                error();

                //----------------------------------------------------------------------------------------------
                setHeightWidth();
            });





    //-------------------------Selectall----------------------------//
            $("#selectall").on("click", function() {
            var idPrefix_Labeltype = 'shipperlabel';
            if ($("#dynamic-btn").is(":checked") == true) {
                idPrefix_Labeltype = "innerlabel";

            }

            var metalabel = @json($config_data);
            var label_metadata_master = @json($config_data);

            // productchange();
            error();
            // console.log($('#selectall').is(":checked"));
            if ($(this).is(":checked")) {
                // if ($(this).attr("data-select") == "false")
                //   $(this).find(".nonstore").prop("checked", false);
                $('#' + idPrefix_Labeltype).css('display', 'block');
                $('#save').prop('disabled', false);
                $('#Store_label').css('display', 'none');
                $('#nonstore_lable').css('display', 'block');
                $('.nonstore').prop("checked", true);
                @if ($config_data->image1_use === 'on')
                    $('#image1UploadOptionContainer').css('display', 'block');
                @endif
                @if ($config_data->image2_use === 'on')
                    $('#image2UploadOptionContainer').css('display', 'block');
                @endif
                @if ($config_data->l_field1_use === 'on')
                    $('#label1_text_container').css('display', 'block');
                @endif
                @if ($config_data->l_field2_use === 'on')
                    $('#label2_text_container').css('display', 'block');
                @endif


                if ($('.predefined_dynamic:checked').val() == 'predefined') {
                    if ($('#' + idPrefix_Labeltype + "organisationname_label").length == 0) {
                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}organisationname" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left: 40.9981px; top: 107.996px;  position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}organisationname" style="display:inline-block ; white-space: nowrap;">${metalabel.organization_name} : </span><span> <span class="delimiter">  <span style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                        </span>`);
                    }
                    if ($('#' + idPrefix_Labeltype + 'productname_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productname_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:43px; top:134px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productname" style="display:inline-block ; white-space: nowrap;"> Organization Name : </span><span> <span class="delimiter"> ${metalabel.product_name} <span> </span>
                                    </span>`);
                    }

                    if ($('#' + idPrefix_Labeltype + 'productid_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productid_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:197px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productid" style="display:inline-block ; white-space: nowrap;">${metalabel.product_id} </span><span> <span class="delimiter"> : <span style="color:#ff5454"> XXXXXXXXXXXXXXX</span>
                                    </span>`);
                    }

                    if ($('#' + idPrefix_Labeltype + 'productcomments_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productcomments_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:358px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}product_comments" style="display:inline-block ; white-space: nowrap;"> ${metalabel.comments}  </span><span> <span class="delimiter">:<span class="decimalnetwt" style="color:#ff5454"> XXX </span>
                                    </span>`);
                    }
                    if ($('#' + idPrefix_Labeltype + 'productstaticfield1_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:166px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field1}</span><span> <span class="delimiter"> : <span style="color:#ff5454">  XXXXXXXXX</span>
                                </span>`);
                    }
                    if ($('#' + idPrefix_Labeltype + 'productstaticfield2_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field2}</span><span> <span class="decimalbatchsize" style="color:#ff5454">: XXXXXXXXX</span>
                                </span>`);
                    }
                    if ($('#' + idPrefix_Labeltype + 'productstaticfield3_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}Staticfields2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:164px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield3" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field3} :</span><span> <span class="decimalStaticfields2" style="color:#ff5454"> XXXXXXXXX</span>
                                </span>`);
                    }
                    if ($('#' + idPrefix_Labeltype + 'productstaticfield4_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield4_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:184px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield4" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field4} :</span><span> <span class="decimalStaticfields3" style="color:#ff5454"> XXXXXXXXX</span>
                                </span>`);

                    }
                    if ($('#' + idPrefix_Labeltype + 'productstaticfield5_label').length == 0) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield5_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:204px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield5" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field5}:</span><span> <span class="decimalStaticfields4" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);

                    }
                    if ($('#' + idPrefix_Labeltype + 'productstaticfield6_label').length == 0) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield6_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:224px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield6" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field6}:</span><span> <span class="decimalStaticfields5" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);
                    }

                    if ($('#' + idPrefix_Labeltype + 'productstaticfield7_label').length == 0) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield7_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:244px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield7" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field7}:</span><span> <span class="decimalStaticfields6" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                    }
                    if ($('#' + idPrefix_Labeltype + 'productstaticfield8_label').length == 0) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield8_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:264px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield8" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field8}:</span><span> <span class="decimalStaticfields7" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);
                    }

                    if ($('#' + idPrefix_Labeltype + 'productstaticfield9_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield9_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:284px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield9" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field9}:</span><span> <span class="decimalStaticfields8" style="color:#ff5454"> XXXXXXXXX</span>
                                </span>`);
                    }
                    if ($('#' + idPrefix_Labeltype + 'productstaticfield10_label').length == 0) {

                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}productstaticfield10_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:304px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}productstaticfield10" style="display:inline-block ; white-space: nowrap;"> ${metalabel.p_static_field10}:</span><span> <span class="decimalStaticfields9" style="color:#ff5454"> XXXXXXXXX</span>
                                </span>`);


                    }

                    if ($('#' + idPrefix_Labeltype + 'batchno_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchno_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:324px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchno" style="display:inline-block ; white-space: nowrap;"> ${metalabel.batch_number}:</span><span> <span class="decimalStaticfields10" style="color:#ff5454"> XXXXXXXXX</span>
                                </span>`);


                    }


                    if ($('#' + idPrefix_Labeltype + 'dateofmanufacture_label').length == 0) {
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dateofmanufacture_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:344px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofmanufacture" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_manufacturing}:</span><span> <span class="decimalStaticfields11" style="color:#ff5454"> XXXXXXXXX</span>
                                </span>`);

                    }


                        if ($('#' + idPrefix_Labeltype + 'dateofexp_label').length == 0) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dateofexp_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:364px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofexp" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_expiry}:</span><span> <span class="decimalStaticfields12" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                        }


                        if ($('#' + idPrefix_Labeltype + 'dateofretest_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dateofretest_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:384px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dateofretest" style="display:inline-block ; white-space: nowrap;"> ${metalabel.date_of_retest}:</span><span> <span class="decimalStaticfields13" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                        }


                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield1_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:404px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field1}:</span><span> <span class="decimalStaticfields14" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                        }


                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield2_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:424px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field2}:</span><span> <span class="decimalStaticfields15" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                        }

                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield3_label').length == 0) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield3_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:444px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield3" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field3}:</span><span> <span class="decimaldynamicfield1" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                        }


                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield4_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield4_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:552px; top:464px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield4" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field4}:</span><span> <span class="decimaldynamicfield2" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                        }


                        if ($('#' + idPrefix_Labeltype + 'batchstaticfield5_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}batchstaticfield5_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:440px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}batchstaticfield5" style="display:inline-block ; white-space: nowrap;"> ${metalabel.b_static_field5}:</span><span> <span class="decimalglobalstaticfield2" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                        }


                        if ($('#' + idPrefix_Labeltype + 'netweight_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}netweight_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:337px; top:414px;position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}netweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.net_weight}:</span><span> <span class="decimalglobalstaticfield1" style="color:#ff5454"> XXXXXXXXX</span>
                                    </span>`);


                        }

                        if ($('#' + idPrefix_Labeltype + 'grossweight_label').length == 0) {
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}grossweight_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:326px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}grossweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.gross_weight}:</span> <span class="decimalgrosswt" style="color:#ff5454"> XXX </span>
                                    </span>`);


                        }

                        if ($('#' + idPrefix_Labeltype + 'tareweight_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}tareweight_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:387px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}tareweight" style="display:inline-block ; white-space: nowrap;"> ${metalabel.tare_weight}:</span> <span class="decimaltarewt" style="color:#ff5454">  XXX</span>
                                    </span>`);


                        }

                        if ($('#' + idPrefix_Labeltype + 'dynamicfield1_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dynamicfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:225px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.dynamic_field1}:</span><span class="dateofretest" style="color:#ff5454">  XX-XX-XXXX</span>
                                    </span>`);


                        }
                        if ($('#' + idPrefix_Labeltype + 'dynamicfield2_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}dynamicfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:256px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}dynamicfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.dynamic_field2}:</span><span class="dateofmfg" style="color:#ff5454">  XX-XX-XXXX </span>
                                    </span>`);


                        }

                        if ($('#' + idPrefix_Labeltype + 'globalstaticfield1_label').length == 0) {

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}globalstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:191px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.global_static_field1}:</span><span  style="color:#ff5454"> XX-XX-XXXX</span>
                                    </span>`);

                        }
                        if ($('#' + idPrefix_Labeltype + 'globalstaticfield2_label').length == 0) {

                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}globalstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:191px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}globalstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.global_static_field2}:</span><span  style="color:#ff5454"> XX-XX-XXXX</span>
                            </span>`);

                        }if ($('#' + idPrefix_Labeltype + 'labelstaticfield1_label').length == 0) {

                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}labelstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:292px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield1" style="display:inline-block ; white-space: nowrap;"> ${metalabel.label_static_field1}:</span><span class="dateofexpiry" style="color:#ff5454"> XX-XX-XXXX</span>
                            </span>`);

                        }if ($('#' + idPrefix_Labeltype + 'labelstaticfield2_label').length == 0) {

                        $('#' + idPrefix_Labeltype).append(
                            `<span class="textnonstore ui-state-default " id="${idPrefix_Labeltype}labelstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:292px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield2" style="display:inline-block ; white-space: nowrap;"> ${metalabel.label_static_field2}:</span><span class="dateofexpiry" style="color:#ff5454"> XX-XX-XXXX</span>
                            </span>`);

                        }

                        if ($('#' + idPrefix_Labeltype + 'labelstaticfield1_label').length == 0) {
                                    var val = $('#labelstaticfield1_input').val();
                                    var fieldValue = $('#labelstaticfield1_input').val();

                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:416px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield1"  style="display:inline-block;">{{ $config_data->label_static_field1 }} : </span> <span id="Staticfield_label" style="" class="fieldvalue"></span>
                        </span>`);

                        }

                        if ($('#' + idPrefix_Labeltype + 'labelstaticfield2_label').length == 0) {

                                    var val = $('#labelstaticfield2_input').val();
                                    var fieldValue = $('#labelstaticfield2_input')
                                .val(); // Get the value of the element with id "Staticfield2_name_input"
                                    $('#' + idPrefix_Labeltype).append(
                                        `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}labelstaticfield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:46px; top:450px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}labelstaticfield2"  style="display:inline-block;">{{ $config_data->label_static_field2 }} : </span> <span id="Staticfield2_label" style="" class="fieldvalue"></span>
                        </span>`);

                        }
                        if ($('#' + idPrefix_Labeltype + 'Sfreefield1_label').length == 0) {

                            var field1Value = $('#Sfreefield1_input')
                                .val(); // Get the value of the element with id "Freefield1_name_input"
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Sfreefield1_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:219px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname"  id="${idPrefix_Labeltype}Sfreefield1" style="display:inline-block;"> ${field1Value} : </span>  <span class="fieldname" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                            </span>`);

                            var parameter_canDoubleClickKeyup = this.id + '_name';
                            canDoubleClickKeyup(parameter_canDoubleClickKeyup);
                            }

                            if ($('#' + idPrefix_Labeltype + 'Sfreefield2_label').length == 0) {
                                var field2Value = $('#Sfreefield2_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Sfreefield2_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:251px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield2"  style="display:inline-block;">${field2Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                                </span>`);
                            }

                            if ($('#' + idPrefix_Labeltype + 'Sfreefield3_label').length == 0) {

                            var field3Value = $('#Sfreefield3_input').val();
                            $('#' + idPrefix_Labeltype).append(
                                `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Sfreefield3_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:289px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield3"  style="display:inline-block;">${field3Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                            </span>`);
                            }

                            if ($('#' + idPrefix_Labeltype + 'Sfreefield4_label').length == 0) {
                                var field4Value = $('#Freefield4_name_input').val();
                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Sfreefield4_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:323px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield4"  style="display:inline-block;">${field4Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                            </span>`);

                            }

                            if ($('#' + idPrefix_Labeltype + 'Sfreefield5_label').length == 0) {
                                var field5Value = $('#Sfreefield5_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Sfreefield5_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:356px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield5"  style="display:inline-block;">${field5Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                            </span>`);

                            }

                            if ($('#' + idPrefix_Labeltype + 'Sfreefield6_label').length == 0) {

                                var field6Value = $('#Sfreefield6_input').val();

                                $('#' + idPrefix_Labeltype).append(
                                    `<span class="textnonstore ui-state-default" id="${idPrefix_Labeltype}Sfreefield6_label" style="font-family:Arial;font-size:12px;text-align:left;white-space: pre-line;left:338px; top:388px; position:absolute;"><span class="${idPrefix_Labeltype}fieldname" id="${idPrefix_Labeltype}Sfreefield6"  style="display:inline-block;">${field6Value} : </span>  <span class="fieldvalue" style="color:#ff5454"> XXXXXXXXXXXXXXX </span>
                            </span>`);

                            }
                            }
                            // if(idPrefix_Labeltype == 'shipperlabel'){
                            //     if(($("#span_QRcode_nonstore").length) == 0){
                            //         $('#containerlabel').append(
                            //             '<span id="span_QRcode_nonstore" style="position:absolute;left:436px; top:174px;"></span>'
                            //         );
                            //     }
                            // }

                            // if(idPrefix_Labeltype == 'innerLabel'){
                            //     if (($("#inner-span_QRcode_nonstore").length) == 0) {
                            //         $('#innerlabel').append(
                            //             '<span id="inner-span_QRcode_nonstore" style="position:absolute;left:436px; top:174px;"></span>'
                            //         );
                            //     }
                            // }

                            $('.fieldname_check').each(function() {
                            var idPrefix_Labeltype = 'shipperlabel';
                            if ($("#dynamic-btn").is(":checked") == true) {
                            idPrefix_Labeltype = "innerlabel";

                            }
                            var checkboxId = $(this).attr('id'); // Get the ID of the clicked checkbox
                            var metalabelId = checkboxId.replace('fn', ''); // Construct the metalabel ID
                            // console.log(metalabelId,"metadataId");

                            if ($(this).is(':checked')) {
                            // Checkbox is checked, show the metalabel content
                            $('#' + idPrefix_Labeltype + metalabelId).show();

                            } else {
                            // Checkbox is unchecked, hide the metalabel content
                            $('#' + idPrefix_Labeltype + metalabelId).hide();
                            }
                            });

                            } else {
                            $.map($('#' + idPrefix_Labeltype).find('.textnonstore'), function(el) {
                            $('#' + $(el).attr('id')).remove();
                            });

                            $('.nonstore').prop("checked", false);
                            setHeightWidth();
                            $('#image1UploadOptionContainer').css('display', 'none');
                            $('#image2UploadOptionContainer').css('display', 'none');
                            $('#label1_text_container').css('display', 'none');
                            $('#label2_text_container').css('display', 'none');



                            }

                            // dateFormat();
                            // decimal();
                            // containerCount();
                            });
        });
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
            /* cursor:pointer; */
        }

        .but1:disabled {
            color: #fff;
            background-color: #aeb7c1 !important;
            border-color: #aeb7c1 !important;
        }

        .delimiter {
            color: black !important;
        }

        .navbar {
            zoom: 75% !important;
        }

        .swal2-popup {
            zoom: 75% !important;
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
            background-color: #0377d0;
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
            width: 100%;
            margin-left: -11.8%;
            margin-top: 0.2%;
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
            zoom: 90% !important;
        }

        #span_QRcode_nonstore:hover {
            cursor: grab;
            border: 0.5px dashed rgb(0 0 0);
        }

        #span_datamatrix_nonstore:hover {
            cursor: grab;
            border: 0.5px dashed rgb(0 0 0);
        }

        #inner-span_QRcode_nonstore:hover {
            cursor: grab;
            border: 0.5px dashed rgb(0 0 0);
        }
    </style>
@endsection
