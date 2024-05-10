<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <style>
.label-body {
background-color: #fff;
margin-left: 46%;
padding: 10px;
border-radius: 5px;
box-shadow: 1px 2px 8px rgb(103 71 13);
    /* Add a subtle box shadow */
}
.label_load{
    height: 100%;
    display: flex;
    align-items: center;
}
.modal {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    justify-content: center;
    align-items: center;
}
.print-back-but{
    display: inline;
}

</style>

    <!-- onload="window.print(); setTimeout(window.close, 0);" -->

<body>
<div class="border-box">
<h3 class="headingfont-bold" style="font-size:22px !important;position:fixed;z-index:4;top:7%;left:45%;">
                            Print Preview </h3>
    <div id="content" style="position: relative;margin-top:5%;zoom:85%;margin-bottom:5%">
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body row col-md-12">
                    <div class="col-md-4 p-1" style="margin-left:15%;margin-top:9%;zoom:85%;">

                        <div class="form-group row ">
                            <div class="col-md-3 "style="margin-bottom:0px;">
                                <label class="p-1 nonheadingfont-bold">Label Name </label>
                                    <input type="text" id="labelname" style="margin-left:1%;width:15%;"class="form-control grnprop1 "
                                        value="{{$label_name->label_name}}" readonly>
                                        <input type="hidden" id="labelid" style="margin-left:1%;width:15%;"class="form-control grnprop1 "
                                        value="{{$label_name->id}}" readonly>
                            </div>

                        </div>
                        <br>
                        <div class="form-group row ">
                            <div class="col-md-3">
                                <label class="p-1 nonheadingfont-bold" >Label Type </label>
                                <input type="text" id="ltype" style="margin-left:1.6%;width:15%;"class="form-control grnprop1 "
                                    value='' readonly>
                            </div>

                        </div>
                        <div class="form-group row "style="margin-top:3%;">
                            <div class="col-md-2" style="margin-left:10%;">
                                <label class="p-1 nonheadingfont-bold">Label Size</label>
                            </div>
                            <div class="col-md-3 mb-3" style="margin-top:1%;margin-left:2%;">
                            <label class="p-1 nonheadingfont">Width :</label>
                            <input type="text" class="form-control grnprop" style="margin-left:1.3%;width:5%;"id="lwidth" value="{{$shipper_print->label_width}}" readonly>

                            <label class="p-1 nonheadingfont" style="margin-left:1%;">Height :</label>
                            <input type="text" class="form-control grnprop"style="margin-left:0.7%;width:5%;" id="lheight" value="{{$shipper_print->label_height}}" readonly>
                        </div>
                        </div>
                        <div class="form-group row "style="margin-top:2%;">
                            <div class="col-md-3 "style="margin-bottom:3px;">
                                <label class="p-1 nonheadingfont-bold">No of Copies :</label>

                                @if($config_data->no_of_container_use == 'on')
                                <input type="text" id="no_of_container" style="margin-bottom: 25%;width:5%;margin-left:0.5%"
                                    class="form-control grnprop1 " value="" readonly>
                                @else
                                <input type="text" id="print_count" style="margin-bottom: 25%;width:5%;margin-left:0.5%"
                                    class="form-control grnprop1 " value="{{$header['no_of_copies']}}" readonly>
                                @endif
                            </div>
                            <div class="col-md-12" style="margin-top: -19%;">
                            <!-- "Back" button -->
                            <button class="btn btn-secondary" type="button" style="width: 115px !important; font-weight: 600 !important; background-color: #626C76!important; height: 37px; color: #ffffff; text-align: center; font-family: arial; cursor: pointer !important; border-radius: 5px;" onclick="window.location.href='/predefinedtransaction'">Back</button>

                            <!-- "Print" button -->
                            <button type="button" id="print" class="btn btn-primary" style="margin-left:3%;"
                                onclick="printDiv()">Print</button>
                                <input type="hidden" name="bulktransaction_id" value="{{$bulktransaction_id}}"  id="bulktransaction_id">
                        </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
function printDiv() {
    // Redirect to another page when the "Print" button is clicked
    var label_name_value = $('#labelid').val();
    var bulktransaction_id = $('#bulktransaction_id').val();
    window.location.href = '/bulkuploaddynamicsave/' + bulktransaction_id+"/"+label_name_value;
}
</script>

<script>
$(document).ready(function() {
    var labelHeight = "{{$shipper_print->Label_Height}}";
    var labelWidth = "{{$shipper_print->Label_Width}}";

    $(".label-body").css({
        "height": labelHeight + "cm",
        "width": labelWidth + "cm"
    });
});
</script>

<script>
$(document).ready(function() {

    var lines = @json($lines);
    var config = @json($config_data);
    var qrbarcode = config.barcode_delimiter;
    var label = @json($label_name);
    var headerdetails=@json($header);
    let num = label.code_size;
    let code_type = label.code_type;
    let labelstaticfield1 = label.labelstaticfield1_input;
    let labelstaticfield2 = label.labelstaticfield2_input;
    let label_width = label.label_width;
    let label_height = label.label_height;
    var displaynone = '';
    var currLabelName = 'dynamiclabel';


  qrfreefiedl1 = label.Freefield1_label_value;
    // console.log(qrfreefiedl1);
    qrfreefiedl2 = label.Freefield2_label_value;
    qrfreefiedl3 = label.Freefield3_label_value;
    qrfreefiedl4 = label.Freefield4_label_value;
    qrfreefiedl5 = label.Freefield5_label_value;
    qrfreefiedl6 = label.Freefield6_label_value;

    qr_Freefield1_value = headerdetails.Freefield1_value.split(':')[1];
    qr_Freefield2_value = headerdetails.Freefield2_value.split(':')[1];
    qr_Freefield3_value = headerdetails.Freefield3_value.split(':')[1];
    qr_Freefield4_value = headerdetails.Freefield4_value.split(':')[1];
    qr_Freefield5_value = headerdetails.Freefield5_value.split(':')[1];
    qr_Freefield6_value = headerdetails.Freefield6_value.split(':')[1];

    let qrData = label.qrdata;
    let jsonObject = JSON.parse(qrData);
    let text = "";


            var freefield1 = jsonObject["freefield1"] == "yes" && jsonObject["freefield1fn"] == "yes" ?
                `${qrfreefiedl1} : ${qr_Freefield1_value}${qrbarcode}` :
                jsonObject["freefield1"] == "yes" ? `${qr_Freefield1_value}${qrbarcode}` : '';

            var freefield2 = jsonObject["freefield2"] == "yes" && jsonObject["freefield2fn"] == "yes" ?
                `${qrfreefiedl2} : ${qr_Freefield2_value}${qrbarcode}` :
                jsonObject["freefield2"] == "yes" ? `${qr_Freefield2_value}${qrbarcode}` : '';

            var freefield3 = jsonObject["freefield3"] == "yes" && jsonObject["freefield3fn"] == "yes" ?
                `${qrfreefiedl3} : ${qr_Freefield3_value}${qrbarcode}` :
                jsonObject["freefield3"] == "yes" ? `${qr_Freefield3_value}${qrbarcode}` : '';

            var freefield4 = jsonObject["freefield4"] == "yes" && jsonObject["freefield4fn"] == "yes" ?
                `${qrfreefiedl4} : ${qr_Freefield4_value}${qrbarcode}` :
                jsonObject["freefield4"] == "yes" ? `${qr_Freefield4_value}${qrbarcode}` : '';

            var freefield5 = jsonObject["freefield5"] == "yes" && jsonObject["freefield5fn"] == "yes" ?
                `${qrfreefiedl5} : ${qr_Freefield5_value}${qrbarcode}` :
                jsonObject["freefield5"] == "yes" ? `${qr_Freefield5_value}${qrbarcode}` : '';

            var freefield6 = jsonObject["freefield6"] == "yes" && jsonObject["freefield6fn"] == "yes" ?
                `${qrfreefiedl6} : ${qr_Freefield6_value}${qrbarcode}` :
                jsonObject["freefield6"] == "yes" ? `${qr_Freefield6_value}${qrbarcode}` : '';


            text =  freefield1 + freefield2 +
                freefield3 + freefield4 + freefield5 + freefield6;

                if(text === ''){
                    text = 'NA';
                }

                if(text.length > 1){
                    text = text.trim();

                    if (text.endsWith(qrbarcode)) {
                        text = text.slice(0, -1);
                    }
                }

    var Freefield1_label_style = label.Freefield1_label_style.split('_');
    var Freefield2_label_style = label.Freefield2_label_style.split('_');
    var Freefield3_label_style = label.Freefield3_label_style.split('_');
    var Freefield4_label_style = label.Freefield4_label_style.split('_');
    var Freefield5_label_style = label.Freefield5_label_style.split('_');
    var Freefield6_label_style = label.Freefield6_label_style.split('_');

    var Freefield1_label_value = label.Freefield1_label_value;
    var Freefield2_label_value = label.Freefield2_label_value;
    var Freefield3_label_value = label.Freefield3_label_value;
    var Freefield4_label_value = label.Freefield4_label_value;
    var Freefield5_label_value = label.Freefield5_label_value;
    var Freefield6_label_value = label.Freefield6_label_value;

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
    var labelstaticfield1_input = label.labelstaticfield1_input;
    var labelstaticfield2_input = label.labelstaticfield2_input;

    var output = "";

    var metaLabel_Freefield1_value = headerdetails.Freefield1_value.split(':')[0];
            var metaLabel_Freefield2_value = headerdetails.Freefield2_value.split(':')[0];
            var metaLabel_Freefield3_value = headerdetails.Freefield3_value.split(':')[0];
            var metaLabel_Freefield4_value = headerdetails.Freefield4_value.split(':')[0];
            var metaLabel_Freefield5_value = headerdetails.Freefield5_value.split(':')[0];
            var metaLabel_Freefield6_value = headerdetails.Freefield6_value.split(':')[0];

            var Freefield1_value = headerdetails.Freefield1_value.split(':')[1];
            var Freefield2_value = headerdetails.Freefield2_value.split(':')[1];
            var Freefield3_value = headerdetails.Freefield3_value.split(':')[1];
            var Freefield4_value = headerdetails.Freefield4_value.split(':')[1];
            var Freefield5_value = headerdetails.Freefield5_value.split(':')[1];
            var Freefield6_value = headerdetails.Freefield6_value.split(':')[1];

            var output =
                `<div class="label-body" style="width: ${label_width}mm; height: ${label_height}mm; position: relative; page-break-after: always;">`;


            if (Freefield1_labelposition != null && Freefield1_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield1_label_style[6] === 'on') {
                output += (
                    `<span id="${currLabelName}Freefield1_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="width:${Freefield1_pos[4]}; text-decoration:${Freefield1_label_style[2]}; white-space: nowrap; display:inline-block"> ${metaLabel_Freefield1_value}</span><span class="delimiter"> : </span><span>${Freefield1_value}</span> </span>`
                    );
            } else {
                output += (
                    `<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="width:${Freefield1_pos[4]}; text-decoration:${Freefield1_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield2">  ${Freefield1_value} </span> </span>`
                    );
            }
            }

            if (Freefield2_labelposition != null && Freefield2_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield2_label_style[6] === 'on') {
                output += (
                    `<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width:${Freefield2_pos[4]}; text-decoration:${Freefield2_label_style[2]}; white-space: nowrap; display:inline-block"> ${metaLabel_Freefield2_value}</span><span class="delimiter"> : </span><span> ${Freefield2_value} </span>  </span>`
                    );
            } else {
                output += (
                    `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width:${Freefield2_pos[4]}; text-decoration:${Freefield2_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield3">  ${Freefield2_value}  </span>  </span>`
                    );
            }
            }

            if (Freefield3_labelposition != null && Freefield3_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield3_label_style[6] === 'on') {
                output += (
                    `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width: ${Freefield3_pos[4]}; text-decoration:${Freefield3_label_style[2]}; white-space: nowrap; display:inline-block"> ${metaLabel_Freefield3_value}</span><span class="delimiter"> : </span><span> ${Freefield3_value} </span>  </span>`
                    );
            } else {
                output += (
                    `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width: ${Freefield3_pos[4]}; text-decoration:${Freefield3_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield3">  ${Freefield3_value}</span>  </span>`
                    );
            }
            }

            if (Freefield4_labelposition != null && Freefield4_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield4_label_style[6] === 'on') {
                output += (
                    `<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="width: ${Freefield4_pos[4]}; text-decoration:${Freefield4_label_style[2]}; white-space: nowrap; display:inline-block"> ${metaLabel_Freefield4_value}</span><span class="delimiter"> : </span><span> ${Freefield4_value} </span>  </span>`
                    );
            } else {
                output += (
                    `<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="width: ${Freefield4_pos[4]}; text-decoration:${Freefield4_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield4">  ${Freefield4_value} </span>  </span>`
                    );
            }
            }

            if (Freefield5_labelposition != null && Freefield5_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield5_label_style[6] === 'on') {
                output += (
                    `<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield5_pos[4]}; text-decoration:${Freefield5_label_style[2]}; white-space: nowrap; display:inline-block"> ${metaLabel_Freefield5_value}</span><span class="delimiter"> : </span><span> ${Freefield5_value} </span>  </span>`
                    );
            } else {
                output += (
                    `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield5_pos[4]}; text-decoration:${Freefield5_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield6">  ${Freefield5_value} </span>  </span>`
                    );
            }
            }
            if (Freefield6_labelposition != null && Freefield6_labelposition != '0px_0px_0px_0px_0px') {
                if (Freefield6_label_style[6] === 'on') {
                output += (
                    `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; white-space: nowrap; display:inline-block"> ${metaLabel_Freefield6_value}</span><span class="delimiter"> : </span><span> ${Freefield6_value} </span>  </span>`
                    );
            } else {
                output += (
                    `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield6">  ${Freefield6_value}x </span>  </span>`
                    );
            }
            }
            if(globalimage1_labelposition != "0px_0px_0px_0px"){
                    output += `<span id="global_image1" style="position: absolute; top: ${globalimage1_pos[0]}; left: ${globalimage1_pos[1]};"> <img src="{{ asset('storage/' . $config_data->g1_image) }}" class="global_image" id="global_image1_img" style="height: ${globalimage1_pos[2]}; width: ${globalimage1_pos[3]}"  alt="No Image"> </span>`
                }

            if(globalimage2_labelposition != "0px_0px_0px_0px"){
                output += `<span id="global_image2" style="position: absolute; top: ${globalimage2_pos[0]}; left: ${globalimage2_pos[1]};"> <img src="{{ asset('storage/' . $config_data->g2_image) }}" class="global_image" id="global_image2_img" style="height: ${globalimage2_pos[2]}; width: ${globalimage2_pos[3]}"  alt="No Image"> </span>`
            }

            if(labelimage1_labelposition != "0px_0px_0px_0px"){
                output += `<span id="label_image1" style="position: absolute; top: ${labelimage1_pos[0]}; left: ${labelimage1_pos[1]};"> <img src="{{ asset('storage/' . $shipper_print->labelimage1_path) }}" class="global_image" id="label_image1_img" style="height: ${labelimage1_pos[2]}; width: ${labelimage1_pos[3]}"  alt="No Image"> </span>`
            }

            if(labelimage2_labelposition != "0px_0px_0px_0px"){
                output += `<span id="label_image2" style="position: absolute; top: ${labelimage2_pos[0]}; left: ${labelimage2_pos[1]};"> <img src="{{ asset('storage/' . $shipper_print->labelimage2_path) }}" class="global_image" id="label_image2_img" style="height: ${labelimage2_pos[2]}; width: ${labelimage2_pos[3]}"  alt="No Image"> </span>`
            }

            if(code_type == 'QRcode'){
                var code_size = num.split("_");

            output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
            <img id="codeName" style="height:${code_size[0]}; width:${code_size[0]}" alt='QR Code Generator'
            src='https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(text)}'/> </span>`

            }
            if(code_type == 'GS1'){
                var code_size = num.split("_");
                    output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
                    <img id="codeName" style="height:${code_size[0]}; width:${code_size[1]}" alt='Barcode Generator TEC-IT'
                        src='https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(text)}&code=GS1DataMatrix&translate-esc=on'/> </span>`

            }
            if(code_type == 'Barcode'){
                var code_size = num.split("_");
                console.log(text);
                    output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
                    <img id="codeName" style="height:${code_size[0]}; width:${code_size[1]}" alt='Barcode Generator TEC-IT'
                    src='https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(text)}&code=Code128&multiplebarcodes=true&translate-esc=on&imagetype=Jpg&showhrt=no&eclevel=L'/></span> </span>`

            }
            if(lines !== null){
                for(var count = 0; count < lines.length; count++){
                        var position = lines[count].position.split("_");
                        console.log(position, 'positon');
            output += `<span style='position: absolute; border-bottom: 2px solid black ; width:${position[3]}px; height: ${position[2]}px; top: ${position[0]}px; left: ${position[1]}px;'> </span>`
            }
            }




    output += '</div>'
    $('#content').append(output);

    // }
    // printDiv();
});
</script>
<script>
window.onunload = refreshParent;

function refreshParent() {
    window.opener.location.reload();
}
</script>
<style>
    body{
        zoom:90%;
        overflow: hidden;
        margin-top:-4%;
    }
.label-body {
    background-color: #fff;
    margin-left: 46%;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 1px 2px 8px rgb(103 71 13);
    /* Add a subtle box shadow */
}
/* Apply box shadow and styles to the border box */
.border-box {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #f8f9fa;
    border-radius: 20px;
    padding: 20px;
    margin-left:11%;
    margin-top:8%;
    border: 1px solid #cdcdcd;
    background-color: #e7e9eb;
    width: 75%; /* Adjust the width as needed */
    height: 75%;
}


.btn-secondary{
    width: 115px !important;
    font-weight:600 !important;
    background-color: #626C76!important;
    height:37px;
    color:#ffffff;
    text-align:center;
    font-family:arial;
    cursor:pointer !important;
    border-radius:5px;
}
.row{
    padding:5px;
}
.headingfont{
    font-size: 18px !important;
    font-family: Arial !important;
}

.nonheadingfont{
    font-size: 14px !important;
    font-family: Arial !important;
}

.headingfont-bold{
    font-size: 18px !important;
    font-family: Arial !important;
    font-weight: bold !important;

}

.nonheadingfont-bold{
    font-size: 14px !important;
    font-family: Arial !important;
    font-weight: bold !important;
}
.btn-primary{
        background-color: #2a5d78 !important;
        width: 140px !important;
        height:37px !important;
        font-weight:600 !important;
        color:#ffffff;
        border-radius:5px;
        cursor:pointer;
}
.label_load {
    height: 100%;
    display: flex;
    align-items: center;
}

.modal {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    justify-content: center;
    align-items: center;
}
.form-control{
    border-radius:4px;
   height:6%;
   border-color:#f0f0f0 !important;
   background-color:#f5f5f5;
}

</style>
