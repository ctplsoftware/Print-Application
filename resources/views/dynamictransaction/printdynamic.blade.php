<!DOCTYPE html>
<html>

<head>
    <!-- <script type="text/javascript" src="jquery.qrcode.min.js"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>


    <style type="text/css" media="print">
    * {
        -webkit-print-color-adjust: exact !important;
        color-adjust: exact !important;
    }

    td,
    th {

        padding-top: 2px;
    }

    tr {
        padding-top: 2px;
    }
    </style>
</head>
<!-- onload="window.print(); setTimeout(window.close, 0);" -->

<body onload="printPage();">
    <!-- <body> -->


</body>


</html>

<script>

function printPage() {
    window.print();
    setTimeout(function() {
        console.log("Innnnn");
        window.location.href = "/dynamic";
    }, 0);
}



$(document).ready(function() {
    var headerdetails = @json($header);
    var lines = @json($lines);
    var config = @json($config_data);
    var qrbarcode = config.barcode_delimiter;
    console.log(qrbarcode);
    var label = @json($shipper_print);
    var productData = @json($productData);
    var currLabelName = "dynamic_";
    var labelstaticfield = @json($labelstaticfield);
    let code_size = label.code_size.split("_");
    let code_type = label.code_type;
    let labelstaticfield1 = label.labelstaticfield1_input;
    let labelstaticfield2 = label.labelstaticfield2_input;
    let label_width = label.label_width;
    let label_height = label.label_height;

    //qr code
    let qrData = label.qrdata;
        let jsonObject= JSON.parse(qrData);;
        let text ="";
        qrproductname = "{{ $config_data->product_name }}";
        qrlabelstaticfield1 = "{{ $config_data->label_static_field1 }}";
        qrlabelstaticfield2 = "{{ $config_data->label_static_field2 }}";
        qrfreefield1 = label.Freefield1_label_value;
        qrfreefield2 = label.Freefield2_label_value;
        qrfreefield3 = label.Freefield3_label_value;
        qrfreefield4 = label.Freefield4_label_value;
        qrfreefield5 = label.Freefield5_label_value;
        qrfreefield6 = label.Freefield6_label_value;

        var productName = jsonObject["productname"] == "yes" && jsonObject["productnamefn"] == "yes" ?
                `${qrproductname} : ${productData.product_name}${qrbarcode}` :
                jsonObject["productname"] == "yes" ? `${productData.product_name}${qrbarcode}` : '';

        var label_labelstaticfield1 = jsonObject["labelstaticfield1"] == "yes" && jsonObject[
                    "labelstaticfield1fn"] == "yes" ? `${qrlabelstaticfield1} : ${label.labelstaticfield1_input}${qrbarcode}` :
                jsonObject["labelstaticfield1"] == "yes" ? `${label.labelstaticfield1_input}${qrbarcode}` : '';

        var label_labelstaticfield2 = jsonObject["labelstaticfield2"] == "yes" && jsonObject[
                    "labelstaticfield2fn"] == "yes" ? `${qrlabelstaticfield2} : ${label.labelstaticfield2_input}${qrbarcode}` :
                jsonObject["labelstaticfield2"] == "yes" ? `${label.labelstaticfield2_input}${qrbarcode}` : '';

        var freefield1 = jsonObject["freefield1"] == "yes" && jsonObject["freefield1fn"] == "yes" ?
            `${qrfreefield1} : ${headerdetails.free_field1}${qrbarcode}` :
            jsonObject["freefield1"] == "yes" ? `${headerdetails.free_field1}${qrbarcode}` : '';

            var freefield2 = jsonObject["freefield2"] == "yes" && jsonObject["freefield2fn"] == "yes" ?
                `${qrfreefield2} : ${headerdetails.free_field2}${qrbarcode}` :
                jsonObject["freefield2"] == "yes" ? `${headerdetails.free_field2}${qrbarcode}` : '';

            var freefield3 = jsonObject["freefield3"] == "yes" && jsonObject["freefield3fn"] == "yes" ?
                `${qrfreefield3} : ${headerdetails.free_field3}${qrbarcode}` :
                jsonObject["freefield3"] == "yes" ? `${headerdetails.free_field3}${qrbarcode}` : '';

            var freefield4 = jsonObject["freefield4"] == "yes" && jsonObject["freefield4fn"] == "yes" ?
                `${qrfreefield4} : ${headerdetails.free_field4}${qrbarcode}` :
                jsonObject["freefield4"] == "yes" ? `${headerdetails.free_field4}${qrbarcode}` : '';

            var freefield5 = jsonObject["freefield5"] == "yes" && jsonObject["freefield5fn"] == "yes" ?
                `${qrfreefield5} : ${headerdetails.free_field5}${qrbarcode}` :
                jsonObject["freefield5"] == "yes" ? `${headerdetails.free_field5}${qrbarcode}` : '';

            var freefield6 = jsonObject["freefield6"] == "yes" && jsonObject["freefield6fn"] == "yes" ?
                `${qrfreefield6} : ${headerdetails.free_field6}${qrbarcode}` :
                jsonObject["freefield6"] == "yes" ? `${headerdetails.free_field6}${qrbarcode}` : '';

        text =  productName + label_labelstaticfield1 + label_labelstaticfield2 + freefield1 +
        freefield2 + freefield3 + freefield4 + freefield5 +freefield6 ;

        if(text.length > 1){
        text = text.trim();

            if (text.endsWith(",")) {
                text = text.slice(0, -1);
            }
        }


    var productname_label_style = label.productname_label_style.split('_');
    var labelstaticfield1_label_style = label.labelstaticfield1_label_style.split('_');
    var labelstaticfield2_label_style = label.labelstaticfield2_label_style.split('_');
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

    var productname_labelposition = label.productname_labelposition;
    var productname_pos = label.productname_labelposition.split('_');
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
    var code_pos = label.code_position.split('_');
    var Freefield1_label_value = label.Freefield1_label_value;
    var Freefield2_label_value = label.Freefield2_label_value;
    var Freefield3_label_value = label.Freefield3_label_value;
    var Freefield4_label_value = label.Freefield4_label_value;
    var Freefield5_label_value = label.Freefield5_label_value;
    var Freefield6_label_value = label.Freefield6_label_value;
    var labelstaticfield1_input = label.labelstaticfield1_input;
    var labelstaticfield2_input = label.labelstaticfield1_input;

    var globalimage1_labelposition = label.globalimage1_labelposition
    var globalimage1_pos = globalimage1_labelposition.split("_");

    var globalimage2_labelposition = label.globalimage2_labelposition
    var globalimage2_pos = globalimage2_labelposition.split("_");

    var labelimage1_labelposition = label.labelimage1_labelposition
    var labelimage1_pos = labelimage1_labelposition.split("_");

    var labelimage2_labelposition = label.labelimage2_labelposition
    var labelimage2_pos = labelimage2_labelposition.split("_");

    // var staticfield_input = label.Staticfield_input;
    // var labelstaticfield_input = label.labelstaticfield_input;
    var output = "";

    // $('#loadingDiv').show()  // Hide it initially

    for (var count = 0; count < headerdetails.no_of_label; count++) {

        var output =
            `<div class="label-body" style="width: ${label_width}mm; height: ${label_height}mm; position: relative; page-break-after: always;">`;
                if (productname_labelposition != null && productname_labelposition != '0px_0px_0px_0px_0px') {
            if (productname_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}ProductName_label" class="textnonstore ui-state-default"  style='font-weight:${productname_label_style[0]}; font-style:${productname_label_style[1]}; text-decoration:${productname_label_style[2]}; text-align:${productname_label_style[3]}; font-size:${productname_label_style[4]}; font-family:${productname_label_style[5]}; position:absolute;  top: ${productname_pos[0]}; left: ${productname_pos[1]}; height:${productname_pos[2]}; width: ${productname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}ProductName"style="width: ${productname_pos[4]}; text-decoration:${productname_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->product_name}}</span><span class="delimiter"> : </span><span class="productname">  {{$productData->product_name}}</span></span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}ProductName_label" class="textnonstore ui-state-default"  style='font-weight:${productname_label_style[0]}; font-style:${productname_label_style[1]}; text-decoration:${productname_label_style[2]}; text-align:${productname_label_style[3]}; font-size:${productname_label_style[4]}; font-family:${productname_label_style[5]}; position:absolute;  top: ${productname_pos[0]}; left: ${productname_pos[1]}; height:${productname_pos[2]}; width: ${productname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}ProductName"style="width: ${productname_pos[4]}; text-decoration:${productname_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="delimiter"></span><span class="productname">   {{$productData->product_name}}</span></span>`
                );
        }
        }


        if (labelstaticfield1_labelposition != null && labelstaticfield1_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (labelstaticfield1_label_style[6] === 'on') {
            output += (`<span id="${currLabelName}staticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield1_label_style[0]}; font-style:${labelstaticfield1_label_style[1]}; text-decoration:${labelstaticfield1_label_style[2]}; text-align:${labelstaticfield1_label_style[3]}; font-size:${labelstaticfield1_label_style[4]}; font-family:${labelstaticfield1_label_style[5]}; position:absolute; top:${labelstaticfield1_pos[0]}; left:${labelstaticfield1_pos[1]}; height:${labelstaticfield1_pos[2]}; width:${labelstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield2" style="width:${labelstaticfield1_pos[4]}; text-decoration:${labelstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->label_static_field1}} </span><span class="delimiter"> : </span><span>${labelstaticfield1}</span></span>`);
        }else{
            output += (`<span id="${currLabelName}Staticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield1_label_style[0]}; font-style:${labelstaticfield1_label_style[1]}; text-decoration:${labelstaticfield1_label_style[2]}; text-align:${labelstaticfield1_label_style[3]}; font-size:${labelstaticfield1_label_style[4]}; font-family:${labelstaticfield1_label_style[5]}; position:absolute; top:${labelstaticfield1_pos[0]}; left:${labelstaticfield1_pos[1]}; height:${labelstaticfield1_pos[2]}; width:${labelstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield2" style="width:${labelstaticfield1_pos[4]}; text-decoration:${labelstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block"> </span> <span class="staticfield2">  ${labelstaticfield1} </span>  </span>`);
        }
        }

        if (labelstaticfield2_labelposition != null && labelstaticfield2_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (labelstaticfield2_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}staticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield2_label_style[0]}; font-style:${labelstaticfield2_label_style[1]}; text-decoration:${labelstaticfield2_label_style[2]}; text-align:${labelstaticfield2_label_style[3]}; font-size:${labelstaticfield2_label_style[4]}; font-family:${labelstaticfield2_label_style[5]}; position:absolute; top:${labelstaticfield2_pos[0]}; left:${labelstaticfield2_pos[1]}; height:${labelstaticfield2_pos[2]}; width:${labelstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield2" style="width:${labelstaticfield2_pos[4]}; text-decoration:${labelstaticfield2_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->label_static_field2}} </span><span class="delimiter"> : </span><span>${labelstaticfield2}</span></span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield2_label_style[0]}; font-style:${labelstaticfield2_label_style[1]}; text-decoration:${labelstaticfield2_label_style[2]}; text-align:${labelstaticfield2_label_style[3]}; font-size:${labelstaticfield2_label_style[4]}; font-family:${labelstaticfield2_label_style[5]}; position:absolute; top:${labelstaticfield2_pos[0]}; left:${labelstaticfield2_pos[1]}; height:${labelstaticfield2_pos[2]}; width:${labelstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield2" style="width:${labelstaticfield2_pos[4]}; text-decoration:${labelstaticfield2_label_style[2]}; white-space: nowrap; display:inline-block"> </span> <span class="staticfield2">  ${labelstaticfield2} </span>  </span>`
                );
        }
        }

        if (Freefield1_labelposition != null && Freefield1_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield1_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield1_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="width:${Freefield1_pos[4]}; text-decoration:${Freefield1_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield1_label_value}</span><span class="delimiter"> : </span><span>${headerdetails.free_field1}</span> </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="width:${Freefield1_pos[4]}; text-decoration:${Freefield1_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield2">  ${headerdetails.free_field1} </span> </span>`
                );
        }
        }

        if (Freefield2_labelposition != null && Freefield2_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield2_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width:${Freefield2_pos[4]}; text-decoration:${Freefield2_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield2_label_value}</span><span class="delimiter"> : </span><span> ${headerdetails.free_field2} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width:${Freefield2_pos[4]}; text-decoration:${Freefield2_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield3">  ${headerdetails.free_field2}  </span>  </span>`
                );
        }
        }

        if (Freefield3_labelposition != null && Freefield3_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield3_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield5" style="width: ${Freefield3_pos[4]}; text-decoration:${Freefield3_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield3_label_value}</span><span class="delimiter"> : </span><span> ${headerdetails.free_field3} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield5" style="width: ${Freefield3_pos[4]}; text-decoration:${Freefield3_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield5">  ${headerdetails.free_field3}</span>  </span>`
                );
        }
        }

        if (Freefield4_labelposition != null && Freefield4_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield4_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="width: ${Freefield4_pos[4]}; text-decoration:${Freefield4_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield4_label_value}</span><span class="delimiter"> : </span><span> ${headerdetails.free_field4} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="width: ${Freefield4_pos[4]}; text-decoration:${Freefield4_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield4">  ${headerdetails.free_field4} </span>  </span>`
                );
        }
        }

        if (Freefield5_labelposition != null && Freefield5_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield5_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield5_pos[4]}; text-decoration:${Freefield5_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield5_label_value}</span><span class="delimiter"> : </span><span> ${headerdetails.free_field5} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield5_pos[4]}; text-decoration:${Freefield5_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield6">  ${headerdetails.free_field5} </span>  </span>`
                );
        }
        }
        if (Freefield6_labelposition != null && Freefield6_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield6_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield6_label_value}</span><span class="delimiter"> : </span><span> ${headerdetails.free_field6} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield6">  ${headerdetails.free_field6}x </span>  </span>`
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

        output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
        <img id="codeName" style="height:${code_size[0]}; width:${code_size[0]}" alt='QR Code Generator'
        src='https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(text)}'/> </span>`
        }
        if(code_type == 'GS1'){
            output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
            <img id="codeName" style="height:${code_size[0]}; width:${code_size[0]}" alt='Barcode Generator TEC-IT'
                src='https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(text)}&code=GS1DataMatrix&translate-esc=on'/> </span>`

        }
        if(code_type == 'Barcode'){
            output += `<span id="span_QRcode_nonstore" style="position: absolute; top: ${code_pos[0]}; left: ${code_pos[1]}">
            <img id="codeName" style="height:${code_size[0]}; width:${code_size[1]}" alt='Barcode Generator TEC-IT'
            src='https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(text)}&showhrt=no'/> </span>`

        }

        if(lines !== null){
            for(var count1 = 0; count1 < lines.length; count1++){
                var position = lines[count1].position.split("_");
                console.log(position, 'positon');
                output += `<span style='position: absolute; border-bottom: 2px solid black ; width:${position[3]}px; height: ${position[2]}px; top: ${position[0]}px; left: ${position[1]}px;'> </span>`;
        }
        }


        output += `</div>`;


    var num = parseInt(label.code_size);
    // console.log(output,'p');
    $('body').append(output);
    }

});
</script>
<script>
window.onunload = refreshParent;

function refreshParent() {
    window.opener.location.reload();
}
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
    background-color: #fff;
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
    zoom: 90% !important;
}
</style>
