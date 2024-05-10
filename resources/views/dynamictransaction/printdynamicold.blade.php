
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

<body>
    <div id="content" style="position:relative;">
    
    </div>

</body>

</html>

<script>

$(document).ready(function() {
    var headerdetails = @json($header);
    var config = @json($config_data);
    console.log(config,'config');
    var label = @json($shipper_print);
    console.log(label,'labelll');
    var productData = @json($productData);
    console.log(productData,'product data');
    var currLabelName="dynamic_";
    var code_type=label.code_type;
   
    var organizationname_label_style = label.organizationname_label_style.split('_');
        var productname_label_style = label.productname_label_style.split('_');
        var productid_label_style = label.productid_label_style.split('_');
        var productcomments_label_style = label.productcomments_label_style.split('_');
        var productstaticfield1_label_style = label.productstaticfield1_label_style.split('_');
        var productstaticfield2_label_style = label.productstaticfield2_label_style.split('_');
        var productstaticfield3_label_style = label.productstaticfield3_label_style.split('_');
        // var Adlfield_label_style = style.Adlfield_label_style.split('_');
        var productstaticfield4_label_style = label.productstaticfield4_label_style.split('_');
        var productstaticfield5_label_style = label.productstaticfield5_label_style.split('_');
        var productstaticfield6_label_style = label.productstaticfield6_label_style.split('_');
        var productstaticfield7_label_style = label.productstaticfield7_label_style.split('_');
        var productstaticfield8_label_style = label.productstaticfield8_label_style.split('_');
        var productstaticfield9_label_style = label.productstaticfield9_label_style.split('_');
        var productstaticfield10_label_style = label.productstaticfield10_label_style.split('_');
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
        // var containerno_label_style = label.containerno_label_style.split('_');
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
        var Freefield1_label_value = label.Freefield1_label_value;
        var Freefield2_label_value = label.Freefield2_label_value;
        var Freefield3_label_value = label.Freefield3_label_value;
        var Freefield4_label_value = label.Freefield4_label_value;
        var Freefield5_label_value = label.Freefield5_label_value;
        var Freefield6_label_value = label.Freefield6_label_value;
        console.log(label,'label');
        var organizationname_labelposition =label.organizationname_labelposition;
        var organizationname_pos = label.organizationname_labelposition.split('_');
        var productname_labelposition =label.productname_labelposition;
        var productname_pos = label.productname_labelposition.split('_');
        var productid_labelposition =label.productid_labelposition;
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
        var code_pos = label.code_position.split('_');
        var Freefield1_label_value = label.Freefield1_label_value;
        var Freefield2_label_value = label.Freefield2_label_value;
        var Freefield3_label_value = label.Freefield3_label_value;
        var Freefield4_label_value = label.Freefield4_label_value;
        var Freefield5_label_value = label.Freefield5_label_value;
        var Freefield6_label_value = label.Freefield6_label_value;
        var labelstaticfield1_input = label.labelstaticfield1_input;
        var labelstaticfield2_input = label.labelstaticfield1_input;
        // var staticfield_input = label.Staticfield_input;
        // var labelstaticfield_input = label.labelstaticfield_input;
        var output = "";
        console.log(organizationname_labelposition,'organizationname_labelposition');
    // $('#loadingDiv').show()  // Hide it initially
    console.log(headerdetails,'headerdetails.length');
    var labelstaticfield1=labelstaticfield2=''; 
    for (var count = 0; count < headerdetails.no_of_label; count++) {
    console.log(labelstaticfield1_labelposition,'labelstaticfield1_labelposition');

        output += `<div style="width:100mm; height:50mm; position: relative; page-break-after: always;">`;

if(organizationname_labelposition!=null && organizationname_labelposition!='0px_0px_0px_0px_0px')
{
    // console.log('in');
    // if (style.CompanyNamefn === 'on') {
        output += (`<span id="${currLabelName}CompanyName_label" class="textnonstore ui-state-default"  style='font-weight:${organizationname_label_style[0]}; font-style:${organizationname_label_style[1]}; text-decoration:${organizationname_label_style[2]}; text-align:${organizationname_label_style[3]}; font-size:${organizationname_label_style[4]}; font-family:${organizationname_label_style[5]}; position:absolute;  top: ${organizationname_pos[0]}; left: ${organizationname_pos[1]}; height:${organizationname_pos[2]}; width: ${organizationname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}CompanyName"style="width: ${organizationname_pos[4]}; text-decoration:${organizationname_label_style[2]}; white-space: nowrap; display:inline-block">Organization Name: </span><span class="delimiter">  </span><span  class="CompanyName">  {{$config_data->organization_name}}</span></span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}CompanyName_label" class="textnonstore ui-state-default"  style='font-weight:${CompanyName_label_style[0]}; font-style:${CompanyName_label_style[1]}; text-decoration:${CompanyName_label_style[2]}; text-align:${CompanyName_label_style[3]}; font-size:${CompanyName_label_style[4]}; font-family:${CompanyName_label_style[5]}; position:absolute;  top: ${CompanyName_pos[0]}; left: ${CompanyName_pos[1]}; height:${CompanyName_pos[2]}; width: ${CompanyName_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}CompanyName"style="width: ${CompanyName_pos[4]}; text-decoration:${CompanyName_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="delimiter"></span><span class="CompanyName"> {{$config_data->organization_name}}</span></span>`);
    // }
}



if(productname_labelposition!=null && productname_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}ProductName_label" class="textnonstore ui-state-default"  style='font-weight:${productname_label_style[0]}; font-style:${productname_label_style[1]}; text-decoration:${productname_label_style[2]}; text-align:${productname_label_style[3]}; font-size:${productname_label_style[4]}; font-family:${productname_label_style[5]}; position:absolute;  top: ${productname_pos[0]}; left: ${productname_pos[1]}; height:${productname_pos[2]}; width: ${productname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}ProductName"style="width: ${productname_pos[4]}; text-decoration:${productname_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->product_name}}</span><span class="delimiter">: </span><span style="color:#ff5454" class="productname">  {{$productData->product_name}}</span></span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}ProductName_label" class="textnonstore ui-state-default"  style='font-weight:${ProductName_label_style[0]}; font-style:${ProductName_label_style[1]}; text-decoration:${ProductName_label_style[2]}; text-align:${ProductName_label_style[3]}; font-size:${ProductName_label_style[4]}; font-family:${ProductName_label_style[5]}; position:absolute;  top: ${productname_pos[0]}; left: ${productname_pos[1]}; height:${productname_pos[2]}; width: ${productname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}ProductName"style="width: ${productname_pos[4]}; text-decoration:${ProductName_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="delimiter"></span><span class="productname" style="color:#ff5454">   XXXXXXXXXXXXXXX</span></span>`);
    // }
}

if(productid_labelposition!=null && productid_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.brandnamefn === 'on') {
    output += (`<span id="${currLabelName}brandname_label" class="textnonstore ui-state-default" style='font-weight:${productid_label_style[0]}; font-style:${productid_label_style[1]}; text-decoration:${productid_label_style[2]}; text-align:${productid_label_style[3]}; font-size:${ productid_label_style[4]}; font-family:${ productid_label_style[5]}; position:absolute; top:${productid_pos[0]}; left:${productid_pos[1]}; height:${productid_pos[2]}; width:${productid_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}brandname" style="width: ${productid_pos[4]}; text-decoration:${productid_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->product_id}} </span> <span class="delimiter"> :  </span>  <span style="color:#ff5454"> {{$productData->product_id}} </span></span>`);

// }
//     else{
//         output += (`<span id="${currLabelName}brandname_label" class="textnonstore ui-state-default" style='font-weight:${brandname_label_style[0]}; font-style:${brandname_label_style[1]}; text-decoration:${brandname_label_style[2]}; text-align:${brandname_label_style[3]}; font-size:${ brandname_label_style[4]}; font-family:${ brandname_label_style[5]}; position:absolute; top:${brandname_pos[0]}; left:${brandname_pos[1]}; height:${brandname_pos[2]}; width:${brandname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}brandname" style="width: ${brandname_pos[4]}; text-decoration:${brandname_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="delimiter"> :  </span>  <span style="color:#ff5454"> XXXXXX </span></span>`);

// }
}

if(productcomments_labelposition!=null && productcomments_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.BatchNofn === 'on') {
            output += (`<span id="${currLabelName}BatchNo_label" class="textnonstore ui-state-default" style='font-weight:${productcomments_label_style[0]}; font-style:${productcomments_label_style[1]}; text-decoration:${productcomments_label_style[2]}; text-align:${productcomments_label_style[3]}; font-size:${productcomments_label_style[4]}; font-family:${productcomments_label_style[5]}; position:absolute; top: ${productcomments_pos[0]}; left:${productcomments_pos[1]}; height:${productcomments_pos[2]}; width:${productcomments_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}BatchNo" style="width: ${productcomments_pos[4]}; text-decoration:${productcomments_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->comments}}</span> <span class="batchno" style="color:#ff5454"> <span class="delimiter"> : </span> {{$productData->comments}} </span></span>`);
    //     }
    // else{
    //     output += (`<span id="${currLabelName}BatchNo_label" class="textnonstore ui-state-default" style='font-weight:${BatchNo_label_style[0]}; font-style:${BatchNo_label_style[1]}; text-decoration:${BatchNo_label_style[2]}; text-align:${BatchNo_label_style[3]}; font-size:${BatchNo_label_style[4]}; font-family:${BatchNo_label_style[5]}; position:absolute; top: ${batchno_pos[0]}; left:${batchno_pos[1]}; height:${batchno_pos[2]}; width:${batchno_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}BatchNo" style="width: ${batchno_pos[4]}; text-decoration:${BatchNo_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="batchno" style="color:#ff5454"> <span class="delimiter"> : </span> XXXXXXXXXXXXXXX </span></span>`);

    // }
}

if(productstaticfield1_labelposition!=null && productstaticfield1_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.Batchsizefn === 'on') {
        output += (`<span id="${currLabelName}Batchsize_label" class="textnonstore ui-state-default" style='font-weight:${productstaticfield1_label_style[0]}; font-style:${productstaticfield1_label_style[1]}; text-decoration:${productstaticfield1_label_style[2]}; text-align:${productstaticfield1_label_style[3]}; font-size:${productstaticfield1_label_style[4]}; font-family:${productstaticfield1_label_style[5]}; position:absolute; top:${productstaticfield1_pos[0]}; left:${productstaticfield1_pos[1]}; height:${productstaticfield1_pos[2]}; width:200px;'> <span class="${currLabelName}fieldname" id="${currLabelName}Batchsize" style="width: 200px;" text-decoration:${productstaticfield1_label_style[2]}; display: inline-block; white-space: nowrap;">{{$config_data->p_static_field1}}</span><span class="decimalbatchsize" style="color:#ff5454"> <span class="delimiter"> :  </span> {{$productData->static_field1}} </span></span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Batchsize_label" class="textnonstore ui-state-default" style='font-weight:${Batchsize_label_style[0]}; font-style:${Batchsize_label_style[1]}; text-decoration:${Batchsize_label_style[2]}; text-align:${Batchsize_label_style[3]}; font-size:${Batchsize_label_style[4]}; font-family:${Batchsize_label_style[5]}; position:absolute; top:${batchsize_pos[0]}; left:${batchsize_pos[1]}; height:${batchsize_pos[2]}; width:${batchsize_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Batchsize" style="width: ${batchsize_pos[4]}; text-decoration:${Batchsize_label_style[2]}; display: inline-block; white-space: nowrap;"></span><span class="decimalbatchsize" style="color:#ff5454">  XXX </span></span>`);
    // }
}

if(productstaticfield2_labelposition!=null && productstaticfield2_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        // console.log(Staticfields2_pos,Staticfields2_labelposition,style.ProductNamefn,'Staticfields2_labelposition');
        output += (`<span id="${currLabelName}Staticfields2_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield2_label_style[0]}; font-style:${productstaticfield2_label_style[1]}; text-decoration:${productstaticfield2_label_style[2]}; text-align:${productstaticfield2_label_style[3]}; font-size:${productstaticfield2_label_style[4]}; font-family:${productstaticfield2_label_style[5]}; position:absolute; top:${productstaticfield2_pos[0]}; left:${productstaticfield2_pos[1]}; height:${productstaticfield2_pos[2]}; width:${productstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields2" style="width:${productstaticfield2_pos[4]}; text-decoration:${productstaticfield2_label_style[2]}; display:inline-block"> {{$config_data->p_static_field2}} </span> <span class="Staticfields2" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$productData->static_field2}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields2_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields2_label_style[0]}; font-style:${Staticfields2_label_style[1]}; text-decoration:${Staticfields2_label_style[2]}; text-align:${Staticfields2_label_style[3]}; font-size:${Staticfields2_label_style[4]}; font-family:${Staticfields2_label_style[5]}; position:absolute; top:${Staticfields2_pos[0]}; left:${Staticfields2_pos[1]}; height:${Staticfields2_pos[2]}; width:${Staticfields2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields2" style="width:${Staticfields2_pos[4]}; text-decoration:${Staticfields2_label_style[2]}; display:inline-block">  </span> <span class="Staticfields2" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(productstaticfield3_labelposition!=null && productstaticfield3_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields3_pos,Staticfields3_labelposition,style.ProductNamefn,'Staticfields3_labelposition');
        output += (`<span id="${currLabelName}Staticfields3_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield3_label_style[0]}; font-style:${productstaticfield3_label_style[1]}; text-decoration:${productstaticfield3_label_style[2]}; text-align:${productstaticfield3_label_style[3]}; font-size:${productstaticfield3_label_style[4]}; font-family:${productstaticfield3_label_style[5]}; position:absolute; top:${productstaticfield3_pos[0]}; left:${productstaticfield3_pos[1]}; height:${productstaticfield3_pos[2]}; width:${productstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields3" style="width:${productstaticfield3_pos[4]}; text-decoration:${productstaticfield3_label_style[2]}; display:inline-block"> {{$config_data->p_static_field3}} </span> <span class="Staticfields3" style="color:#ff5454"><span class="delimiter"> :  </span> {{$productData->static_field3}}</span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields3_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields3_label_style[0]}; font-style:${Staticfields3_label_style[1]}; text-decoration:${Staticfields3_label_style[2]}; text-align:${Staticfields3_label_style[3]}; font-size:${Staticfields3_label_style[4]}; font-family:${Staticfields3_label_style[5]}; position:absolute; top:${Staticfields3_pos[0]}; left:${Staticfields3_pos[1]}; height:${Staticfields3_pos[2]}; width:${Staticfields3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields3" style="width:${Staticfields3_pos[4]}; text-decoration:${Staticfields3_label_style[2]}; display:inline-block">  </span> <span class="Staticfields3" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(productstaticfield4_labelposition!=null && productstaticfield4_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields4_pos,Staticfields4_labelposition,style.ProductNamefn,'Staticfields4_labelposition');
        output += (`<span id="${currLabelName}Staticfields4_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield4_label_style[0]}; font-style:${productstaticfield4_label_style[1]}; text-decoration:${productstaticfield4_label_style[2]}; text-align:${productstaticfield4_label_style[3]}; font-size:${productstaticfield4_label_style[4]}; font-family:${productstaticfield4_label_style[5]}; position:absolute; top:${productstaticfield4_pos[0]}; left:${productstaticfield4_pos[1]}; height:${productstaticfield4_pos[2]}; width:${productstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields4" style="width:${productstaticfield4_pos[4]}; text-decoration:${productstaticfield4_label_style[2]}; display:inline-block"> {{$config_data->p_static_field4}} </span> <span class="Staticfields4" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$productData->static_field4}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields4_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields4_label_style[0]}; font-style:${Staticfields4_label_style[1]}; text-decoration:${Staticfields4_label_style[2]}; text-align:${Staticfields4_label_style[3]}; font-size:${Staticfields4_label_style[4]}; font-family:${Staticfields4_label_style[5]}; position:absolute; top:${Staticfields4_pos[0]}; left:${Staticfields4_pos[1]}; height:${Staticfields4_pos[2]}; width:${Staticfields4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields4" style="width:${Staticfields4_pos[4]}; text-decoration:${Staticfields4_label_style[2]}; display:inline-block">  </span> <span class="Staticfields4" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(productstaticfield5_labelposition!=null && productstaticfield5_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        // console.log(Staticfields5_pos,Staticfields5_labelposition,style.ProductNamefn,'Staticfields5_labelposition');
        output += (`<span id="${currLabelName}Staticfields5_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield5_label_style[0]}; font-style:${productstaticfield5_label_style[1]}; text-decoration:${productstaticfield5_label_style[2]}; text-align:${productstaticfield5_label_style[3]}; font-size:${productstaticfield5_label_style[4]}; font-family:${productstaticfield5_label_style[5]}; position:absolute; top:${productstaticfield5_pos[0]}; left:${productstaticfield5_pos[1]}; height:${productstaticfield5_pos[2]}; width:${productstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields5" style="width:${productstaticfield5_pos[4]}; text-decoration:${productstaticfield5_label_style[2]}; display:inline-block"> {{$config_data->p_static_field5}} </span> <span class="Staticfields5" style="color:#ff5454"><span class="delimiter"> :  </span> {{$productData->static_field5}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields5_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields5_label_style[0]}; font-style:${Staticfields5_label_style[1]}; text-decoration:${Staticfields5_label_style[2]}; text-align:${Staticfields5_label_style[3]}; font-size:${Staticfields5_label_style[4]}; font-family:${Staticfields5_label_style[5]}; position:absolute; top:${Staticfields5_pos[0]}; left:${Staticfields5_pos[1]}; height:${Staticfields5_pos[2]}; width:${Staticfields5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields5" style="width:${Staticfields5_pos[4]}; text-decoration:${Staticfields5_label_style[2]}; display:inline-block">  </span> <span class="Staticfields5" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(productstaticfield6_labelposition!=null && productstaticfield6_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields6_pos,Staticfields6_labelposition,style.ProductNamefn,'Staticfields6_labelposition');
        output += (`<span id="${currLabelName}Staticfields6_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield6_label_style[0]}; font-style:${productstaticfield6_label_style[1]}; text-decoration:${productstaticfield6_label_style[2]}; text-align:${productstaticfield6_label_style[3]}; font-size:${productstaticfield6_label_style[4]}; font-family:${productstaticfield6_label_style[5]}; position:absolute; top:${productstaticfield6_pos[0]}; left:${productstaticfield6_pos[1]}; height:${productstaticfield6_pos[2]}; width:${productstaticfield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields6" style="width:${productstaticfield6_pos[4]}; text-decoration:${productstaticfield6_label_style[2]}; display:inline-block"> {{$config_data->p_static_field6}} </span> <span class="Staticfields6" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$productData->static_field6}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields6_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields6_label_style[0]}; font-style:${Staticfields6_label_style[1]}; text-decoration:${Staticfields6_label_style[2]}; text-align:${Staticfields6_label_style[3]}; font-size:${Staticfields6_label_style[4]}; font-family:${Staticfields6_label_style[5]}; position:absolute; top:${Staticfields6_pos[0]}; left:${Staticfields6_pos[1]}; height:${Staticfields6_pos[2]}; width:${Staticfields6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields6" style="width:${Staticfields6_pos[4]}; text-decoration:${Staticfields6_label_style[2]}; display:inline-block">  </span> <span class="Staticfields6" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(productstaticfield7_labelposition!=null && productstaticfield7_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields7_pos,Staticfields7_labelposition,style.ProductNamefn,'Staticfields7_labelposition');
        output += (`<span id="${currLabelName}Staticfields7_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield7_label_style[0]}; font-style:${productstaticfield7_label_style[1]}; text-decoration:${productstaticfield7_label_style[2]}; text-align:${productstaticfield7_label_style[3]}; font-size:${productstaticfield7_label_style[4]}; font-family:${productstaticfield7_label_style[5]}; position:absolute; top:${productstaticfield7_pos[0]}; left:${productstaticfield7_pos[1]}; height:${productstaticfield7_pos[2]}; width:${productstaticfield7_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields7" style="width:${productstaticfield7_pos[4]}; text-decoration:${productstaticfield7_label_style[2]}; display:inline-block"> {{$config_data->p_static_field7}} </span> <span class="Staticfields7" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$productData->static_field7}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields7_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields7_label_style[0]}; font-style:${Staticfields7_label_style[1]}; text-decoration:${Staticfields7_label_style[2]}; text-align:${Staticfields7_label_style[3]}; font-size:${Staticfields7_label_style[4]}; font-family:${Staticfields7_label_style[5]}; position:absolute; top:${Staticfields7_pos[0]}; left:${Staticfields7_pos[1]}; height:${Staticfields7_pos[2]}; width:${Staticfields7_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields7" style="width:${Staticfields7_pos[4]}; text-decoration:${Staticfields7_label_style[2]}; display:inline-block">  </span> <span class="Staticfields7" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(productstaticfield8_labelposition!=null && productstaticfield8_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields8_pos,Staticfields8_labelposition,style.ProductNamefn,'Staticfields8_labelposition');
        output += (`<span id="${currLabelName}Staticfields8_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield8_label_style[0]}; font-style:${productstaticfield8_label_style[1]}; text-decoration:${productstaticfield8_label_style[2]}; text-align:${productstaticfield8_label_style[3]}; font-size:${productstaticfield8_label_style[4]}; font-family:${productstaticfield8_label_style[5]}; position:absolute; top:${productstaticfield8_pos[0]}; left:${productstaticfield8_pos[1]}; height:${productstaticfield8_pos[2]}; width:${productstaticfield8_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields8" style="width:${productstaticfield8_pos[4]}; text-decoration:${productstaticfield8_label_style[2]}; display:inline-block"> {{$config_data->p_static_field8}} </span> <span class="Staticfields8" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$productData->static_field8}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields8_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields8_label_style[0]}; font-style:${Staticfields8_label_style[1]}; text-decoration:${Staticfields8_label_style[2]}; text-align:${Staticfields8_label_style[3]}; font-size:${Staticfields8_label_style[4]}; font-family:${Staticfields8_label_style[5]}; position:absolute; top:${Staticfields8_pos[0]}; left:${Staticfields8_pos[1]}; height:${Staticfields8_pos[2]}; width:${Staticfields8_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields8" style="width:${Staticfields8_pos[4]}; text-decoration:${Staticfields8_label_style[2]}; display:inline-block">  </span> <span class="Staticfields8" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(productstaticfield9_labelposition!=null && productstaticfield9_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields9_pos,Staticfields9_labelposition,style.ProductNamefn,'Staticfields9_labelposition');
        output += (`<span id="${currLabelName}Staticfields9_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield9_label_style[0]}; font-style:${productstaticfield9_label_style[1]}; text-decoration:${productstaticfield9_label_style[2]}; text-align:${productstaticfield9_label_style[3]}; font-size:${productstaticfield9_label_style[4]}; font-family:${productstaticfield9_label_style[5]}; position:absolute; top:${productstaticfield9_pos[0]}; left:${productstaticfield9_pos[1]}; height:${productstaticfield9_pos[2]}; width:${productstaticfield9_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields9" style="width:${productstaticfield9_pos[4]}; text-decoration:${productstaticfield9_label_style[2]}; display:inline-block"> {{$config_data->p_static_field9}} </span> <span class="Staticfields9" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$productData->static_field9}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields9_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields9_label_style[0]}; font-style:${Staticfields9_label_style[1]}; text-decoration:${Staticfields9_label_style[2]}; text-align:${Staticfields9_label_style[3]}; font-size:${Staticfields9_label_style[4]}; font-family:${Staticfields9_label_style[5]}; position:absolute; top:${Staticfields9_pos[0]}; left:${Staticfields9_pos[1]}; height:${Staticfields9_pos[2]}; width:${Staticfields9_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields9" style="width:${Staticfields9_pos[4]}; text-decoration:${Staticfields9_label_style[2]}; display:inline-block">  </span> <span class="Staticfields9" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(productstaticfield10_labelposition!=null && productstaticfield10_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields10_pos,Staticfields10_labelposition,style.ProductNamefn,'Staticfields10_labelposition');
        output += (`<span id="${currLabelName}Staticfields10_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield10_label_style[0]}; font-style:${productstaticfield10_label_style[1]}; text-decoration:${productstaticfield10_label_style[2]}; text-align:${productstaticfield10_label_style[3]}; font-size:${productstaticfield10_label_style[4]}; font-family:${productstaticfield10_label_style[5]}; position:absolute; top:${productstaticfield10_pos[0]}; left:${productstaticfield10_pos[1]}; height:${productstaticfield10_pos[2]}; width:${productstaticfield10_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields10" style="width:${productstaticfield10_pos[4]}; text-decoration:${productstaticfield10_label_style[2]}; display:inline-block"> {{$config_data->p_static_field10}} </span> <span class="Staticfields10" style="color:#ff5454"><span class="delimiter"> :  </span>   {{$productData->static_field10}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields10_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields10_label_style[0]}; font-style:${Staticfields10_label_style[1]}; text-decoration:${Staticfields10_label_style[2]}; text-align:${Staticfields10_label_style[3]}; font-size:${Staticfields10_label_style[4]}; font-family:${Staticfields10_label_style[5]}; position:absolute; top:${Staticfields10_pos[0]}; left:${Staticfields10_pos[1]}; height:${Staticfields10_pos[2]}; width:${Staticfields10_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields10" style="width:${Staticfields10_pos[4]}; text-decoration:${Staticfields10_label_style[2]}; display:inline-block">  </span> <span class="Staticfields10" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}


if(batchno_labelposition!=null && batchno_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields11_pos,Staticfields11_labelposition,style.ProductNamefn,'Staticfields11_labelposition');
        output += (`<span id="${currLabelName}Staticfields11_label" class="textnonstore ui-state-default"  style='font-weight:${batchno_label_style[0]}; font-style:${batchno_label_style[1]}; text-decoration:${batchno_label_style[2]}; text-align:${batchno_label_style[3]}; font-size:${batchno_label_style[4]}; font-family:${batchno_label_style[5]}; position:absolute; top:${batchno_pos[0]}; left:${batchno_pos[1]}; height:${batchno_pos[2]}; width:${batchno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields11" style="width:${batchno_pos[4]}; text-decoration:${batchno_label_style[2]}; display:inline-block"> {{$config_data->batch_number}} </span> <span class="Staticfields11" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$header->batch_number}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields11_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields11_label_style[0]}; font-style:${Staticfields11_label_style[1]}; text-decoration:${Staticfields11_label_style[2]}; text-align:${Staticfields11_label_style[3]}; font-size:${Staticfields11_label_style[4]}; font-family:${Staticfields11_label_style[5]}; position:absolute; top:${Staticfields11_pos[0]}; left:${Staticfields11_pos[1]}; height:${Staticfields11_pos[2]}; width:${Staticfields11_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields11" style="width:${Staticfields11_pos[4]}; text-decoration:${Staticfields11_label_style[2]}; display:inline-block">  </span> <span class="Staticfields11" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(dateofmanufacture_labelposition!=null && dateofmanufacture_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields12_pos,Staticfields12_labelposition,style.ProductNamefn,'Staticfields12_labelposition');
        output += (`<span id="${currLabelName}Staticfields12_label" class="textnonstore ui-state-default"  style='font-weight:${dateofmanufacture_label_style[0]}; font-style:${dateofmanufacture_label_style[1]}; text-decoration:${dateofmanufacture_label_style[2]}; text-align:${dateofmanufacture_label_style[3]}; font-size:${dateofmanufacture_label_style[4]}; font-family:${dateofmanufacture_label_style[5]}; position:absolute; top:${dateofmanufacture_pos[0]}; left:${dateofmanufacture_pos[1]}; height:${dateofmanufacture_pos[2]}; width:${dateofmanufacture_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields12" style="width:${dateofmanufacture_pos[4]}; text-decoration:${dateofmanufacture_label_style[2]}; display:inline-block"> {{$config_data->date_of_manufacturing}} </span> <span class="Staticfields12" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$header->date_of_manufacturing}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields12_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields12_label_style[0]}; font-style:${Staticfields12_label_style[1]}; text-decoration:${Staticfields12_label_style[2]}; text-align:${Staticfields12_label_style[3]}; font-size:${Staticfields12_label_style[4]}; font-family:${Staticfields12_label_style[5]}; position:absolute; top:${Staticfields12_pos[0]}; left:${Staticfields12_pos[1]}; height:${Staticfields12_pos[2]}; width:${Staticfields12_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields12" style="width:${Staticfields12_pos[4]}; text-decoration:${Staticfields12_label_style[2]}; display:inline-block">  </span> <span class="Staticfields12" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(dateofexp_labelposition!=null && dateofexp_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields13_pos,Staticfields13_labelposition,style.ProductNamefn,'Staticfields13_labelposition');
        output += (`<span id="${currLabelName}Staticfields13_label" class="textnonstore ui-state-default"  style='font-weight:${dateofexp_label_style[0]}; font-style:${dateofexp_label_style[1]}; text-decoration:${dateofexp_label_style[2]}; text-align:${dateofexp_label_style[3]}; font-size:${dateofexp_label_style[4]}; font-family:${dateofexp_label_style[5]}; position:absolute; top:${dateofexp_pos[0]}; left:${dateofexp_pos[1]}; height:${dateofexp_pos[2]}; width:${dateofexp_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields13" style="width:${dateofexp_pos[4]}; text-decoration:${dateofexp_label_style[2]}; display:inline-block"> {{$config_data->date_of_expiry}} </span> <span class="Staticfields13" style="color:#ff5454"><span class="delimiter"> :  </span>   {{$header->date_of_expiry}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields13_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields13_label_style[0]}; font-style:${Staticfields13_label_style[1]}; text-decoration:${Staticfields13_label_style[2]}; text-align:${Staticfields13_label_style[3]}; font-size:${Staticfields13_label_style[4]}; font-family:${Staticfields13_label_style[5]}; position:absolute; top:${Staticfields13_pos[0]}; left:${Staticfields13_pos[1]}; height:${Staticfields13_pos[2]}; width:${Staticfields13_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields13" style="width:${Staticfields13_pos[4]}; text-decoration:${Staticfields13_label_style[2]}; display:inline-block">  </span> <span class="Staticfields13" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(dateofretest_labelposition!=null && dateofretest_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields14_pos,Staticfields14_labelposition,style.ProductNamefn,'Staticfields14_labelposition');
        output += (`<span id="${currLabelName}Staticfields14_label" class="textnonstore ui-state-default"  style='font-weight:${dateofretest_label_style[0]}; font-style:${dateofretest_label_style[1]}; text-decoration:${dateofretest_label_style[2]}; text-align:${dateofretest_label_style[3]}; font-size:${dateofretest_label_style[4]}; font-family:${dateofretest_label_style[5]}; position:absolute; top:${dateofretest_pos[0]}; left:${dateofretest_pos[1]}; height:${dateofretest_pos[2]}; width:${dateofretest_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields14" style="width:${dateofretest_pos[4]}; text-decoration:${dateofretest_label_style[2]}; display:inline-block"> {{$config_data->date_of_retest}} </span> <span class="Staticfields14" style="color:#ff5454"><span class="delimiter"> :  </span>   {{$header->date_of_retest}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields14_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields14_label_style[0]}; font-style:${Staticfields14_label_style[1]}; text-decoration:${Staticfields14_label_style[2]}; text-align:${Staticfields14_label_style[3]}; font-size:${Staticfields14_label_style[4]}; font-family:${Staticfields14_label_style[5]}; position:absolute; top:${Staticfields14_pos[0]}; left:${Staticfields14_pos[1]}; height:${Staticfields14_pos[2]}; width:${Staticfields14_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields14" style="width:${Staticfields14_pos[4]}; text-decoration:${Staticfields14_label_style[2]}; display:inline-block">  </span> <span class="Staticfields14" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(batchstaticfield1_labelposition!=null && batchstaticfield1_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(Staticfields15_pos,Staticfields15_labelposition,style.ProductNamefn,'Staticfields15_labelposition');
        output += (`<span id="${currLabelName}Staticfields15_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield1_label_style[0]}; font-style:${batchstaticfield1_label_style[1]}; text-decoration:${batchstaticfield1_label_style[2]}; text-align:${batchstaticfield1_label_style[3]}; font-size:${batchstaticfield1_label_style[4]}; font-family:${batchstaticfield1_label_style[5]}; position:absolute; top:${batchstaticfield1_pos[0]}; left:${batchstaticfield1_pos[1]}; height:${batchstaticfield1_pos[2]}; width:${batchstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields15" style="width:${batchstaticfield1_pos[4]}; text-decoration:${batchstaticfield1_label_style[2]}; display:inline-block"> {{$config_data->b_static_field1}} </span> <span class="Staticfields15" style="color:#ff5454"><span class="delimiter"> :  </span> {{$header->b_field1}}  </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfields15_label" class="textnonstore ui-state-default"  style='font-weight:${Staticfields15_label_style[0]}; font-style:${Staticfields15_label_style[1]}; text-decoration:${Staticfields15_label_style[2]}; text-align:${Staticfields15_label_style[3]}; font-size:${Staticfields15_label_style[4]}; font-family:${Staticfields15_label_style[5]}; position:absolute; top:${Staticfields15_pos[0]}; left:${Staticfields15_pos[1]}; height:${Staticfields15_pos[2]}; width:${Staticfields15_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields15" style="width:${Staticfields15_pos[4]}; text-decoration:${Staticfields15_label_style[2]}; display:inline-block">  </span> <span class="Staticfields15" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(batchstaticfield2_labelposition!=null && batchstaticfield2_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(dynamicfield1_pos,dynamicfield1_labelposition,style.ProductNamefn,'dynamicfield1_labelposition');
        output += (`<span id="${currLabelName}dynamicfield1_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield2_label_style[0]}; font-style:${batchstaticfield2_label_style[1]}; text-decoration:${batchstaticfield2_label_style[2]}; text-align:${batchstaticfield2_label_style[3]}; font-size:${batchstaticfield2_label_style[4]}; font-family:${batchstaticfield2_label_style[5]}; position:absolute; top:${batchstaticfield2_pos[0]}; left:${batchstaticfield2_pos[1]}; height:${batchstaticfield2_pos[2]}; width:${batchstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield1" style="width:${batchstaticfield2_pos[4]}; text-decoration:${batchstaticfield2_label_style[2]}; display:inline-block"> {{$config_data->b_static_field2}} </span> <span class="dynamicfield1" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$header->b_field2}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}dynamicfield1_label" class="textnonstore ui-state-default"  style='font-weight:${dynamicfield1_label_style[0]}; font-style:${dynamicfield1_label_style[1]}; text-decoration:${dynamicfield1_label_style[2]}; text-align:${dynamicfield1_label_style[3]}; font-size:${dynamicfield1_label_style[4]}; font-family:${dynamicfield1_label_style[5]}; position:absolute; top:${dynamicfield1_pos[0]}; left:${dynamicfield1_pos[1]}; height:${dynamicfield1_pos[2]}; width:${dynamicfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield1" style="width:${dynamicfield1_pos[4]}; text-decoration:${dynamicfield1_label_style[2]}; display:inline-block">  </span> <span class="dynamicfield1" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(batchstaticfield3_labelposition!=null && batchstaticfield3_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(dynamicfield2_pos,dynamicfield2_labelposition,style.ProductNamefn,'dynamicfield2_labelposition');
        output += (`<span id="${currLabelName}dynamicfield2_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield3_label_style[0]}; font-style:${batchstaticfield3_label_style[1]}; text-decoration:${batchstaticfield3_label_style[2]}; text-align:${batchstaticfield3_label_style[3]}; font-size:${batchstaticfield3_label_style[4]}; font-family:${batchstaticfield3_label_style[5]}; position:absolute; top:${batchstaticfield3_pos[0]}; left:${batchstaticfield3_pos[1]}; height:${batchstaticfield3_pos[2]}; width:${batchstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield2" style="width:${batchstaticfield3_pos[4]}; text-decoration:${batchstaticfield3_label_style[2]}; display:inline-block"> {{$config_data->b_static_field3}} </span> <span class="dynamicfield2" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$header->b_field3}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}dynamicfield2_label" class="textnonstore ui-state-default"  style='font-weight:${dynamicfield2_label_style[0]}; font-style:${dynamicfield2_label_style[1]}; text-decoration:${dynamicfield2_label_style[2]}; text-align:${dynamicfield2_label_style[3]}; font-size:${dynamicfield2_label_style[4]}; font-family:${dynamicfield2_label_style[5]}; position:absolute; top:${dynamicfield2_pos[0]}; left:${dynamicfield2_pos[1]}; height:${dynamicfield2_pos[2]}; width:${dynamicfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield2" style="width:${dynamicfield2_pos[4]}; text-decoration:${dynamicfield2_label_style[2]}; display:inline-block">  </span> <span class="dynamicfield2" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(batchstaticfield4_labelposition!=null && batchstaticfield4_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(globalstaticfield1_pos,globalstaticfield1_labelposition,style.ProductNamefn,'globalstaticfield1_labelposition');
        output += (`<span id="${currLabelName}globalstaticfield1_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield4_label_style[0]}; font-style:${batchstaticfield4_label_style[1]}; text-decoration:${batchstaticfield4_label_style[2]}; text-align:${batchstaticfield4_label_style[3]}; font-size:${batchstaticfield4_label_style[4]}; font-family:${batchstaticfield4_label_style[5]}; position:absolute; top:${batchstaticfield4_pos[0]}; left:${batchstaticfield4_pos[1]}; height:${batchstaticfield4_pos[2]}; width:${batchstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield1" style="width:${batchstaticfield4_pos[4]}; text-decoration:${batchstaticfield4_label_style[2]}; display:inline-block"> {{$config_data->b_static_field4}} </span> <span class="globalstaticfield1" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$header->b_field4}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}globalstaticfield1_label" class="textnonstore ui-state-default"  style='font-weight:${globalstaticfield1_label_style[0]}; font-style:${globalstaticfield1_label_style[1]}; text-decoration:${globalstaticfield1_label_style[2]}; text-align:${globalstaticfield1_label_style[3]}; font-size:${globalstaticfield1_label_style[4]}; font-family:${globalstaticfield1_label_style[5]}; position:absolute; top:${globalstaticfield1_pos[0]}; left:${globalstaticfield1_pos[1]}; height:${globalstaticfield1_pos[2]}; width:${globalstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield1" style="width:${globalstaticfield1_pos[4]}; text-decoration:${globalstaticfield1_label_style[2]}; display:inline-block">  </span> <span class="globalstaticfield1" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(batchstaticfield5_labelposition!=null && batchstaticfield5_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
    //     console.log(globalstaticfield2_pos,globalstaticfield2_labelposition,style.ProductNamefn,'globalstaticfield2_labelposition');
        output += (`<span id="${currLabelName}globalstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield5_label_style[0]}; font-style:${batchstaticfield5_label_style[1]}; text-decoration:${batchstaticfield5_label_style[2]}; text-align:${batchstaticfield5_label_style[3]}; font-size:${batchstaticfield5_label_style[4]}; font-family:${batchstaticfield5_label_style[5]}; position:absolute; top:${batchstaticfield5_pos[0]}; left:${batchstaticfield5_pos[1]}; height:${batchstaticfield5_pos[2]}; width:${batchstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield2" style="width:${batchstaticfield5_pos[4]}; text-decoration:${batchstaticfield5_label_style[2]}; display:inline-block"> {{$config_data->b_static_field5}} </span> <span class="globalstaticfield2" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$header->b_field5}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}globalstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${globalstaticfield2_label_style[0]}; font-style:${globalstaticfield2_label_style[1]}; text-decoration:${globalstaticfield2_label_style[2]}; text-align:${globalstaticfield2_label_style[3]}; font-size:${globalstaticfield2_label_style[4]}; font-family:${globalstaticfield2_label_style[5]}; position:absolute; top:${globalstaticfield2_pos[0]}; left:${globalstaticfield2_pos[1]}; height:${globalstaticfield2_pos[2]}; width:${globalstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield2" style="width:${globalstaticfield2_pos[4]}; text-decoration:${globalstaticfield2_label_style[2]}; display:inline-block">  </span> <span class="globalstaticfield2" style="color:#ff5454">  XXXXXXXXXX </span>  </span>`);
    // }
}

if(netweight_labelposition!=null && netweight_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.Netweightfn === 'on') {
        output += (`<span id="${currLabelName}Netweight_label" class="textnonstore ui-state-default" style='font-weight:${netweight_label_style[0]}; font-style: ${netweight_label_style[1]}; text-decoration: ${netweight_label_style[2]}; text-align: ${netweight_label_style[3]}; font-size:${netweight_label_style[4]}; font-family:${netweight_label_style[5]}; position:absolute; top: ${netweight_pos[0]}; left:${netweight_pos[1]}; height:${netweight_pos[2]}; width:${netweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Netweight" style="width: ${netweight_pos[4]}; text-decoration: ${netweight_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->net_weight}}</span> <span class="decimalnetwt" style="color:#ff5454"> <span class="delimiter"> :  </span> ${netWeight}  </span></span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Netweight_label" class="textnonstore ui-state-default" style='font-weight:${Netweight_label_style[0]}; font-style: ${Netweight_label_style[1]}; text-decoration: ${Netweight_label_style[2]}; text-align: ${Netweight_label_style[3]}; font-size:${Netweight_label_style[4]}; font-family:${Netweight_label_style[5]}; position:absolute; top: ${netweight_pos[0]}; left:${netweight_pos[1]}; height:${netweight_pos[2]}; width:${netweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Netweight" style="width: ${netweight_pos[4]}; text-decoration: ${Netweight_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="decimalnetwt" style="color:#ff5454"> XXX  </span></span>`);
    // }
}

if(grossweight_labelposition!=null && grossweight_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.GrossWeightfn === 'on') {
        output += (`<span id="${currLabelName}GrossWeight_label" class="textnonstore ui-state-default  " style='font-weight:${grossweight_label_style[0]}; font-style: ${grossweight_label_style[1]}; text-decoration: ${grossweight_label_style[2]}; text-align: ${grossweight_label_style[3]}; font-size:${grossweight_label_style[4]}; font-family:${grossweight_label_style[5]};position:absolute; top:${grossweight_pos[0]}; left:${grossweight_pos[1]}; height:${grossweight_pos[2]}; width: ${grossweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}GrossWeight" style="width: ${grossweight_pos[4]}; text-decoration: ${grossweight_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->gross_weight}}</span><span class="decimalgrosswt" style="color:#ff5454"> <span class="delimiter"> :  </span>  ${grossWeight}  </span> </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}GrossWeight_label" class="textnonstore ui-state-default  " style='font-weight:${GrossWeight_label_style[0]}; font-style: ${GrossWeight_label_style[1]}; text-decoration: ${GrossWeight_label_style[2]}; text-align: ${GrossWeight_label_style[3]}; font-size:${GrossWeight_label_style[4]}; font-family:${GrossWeight_label_style[5]};position:absolute; top:${grossweight_pos[0]}; left:${grossweight_pos[1]}; height:${grossweight_pos[2]}; width: ${grossweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}GrossWeight" style="width: ${grossweight_pos[4]}; text-decoration: ${GrossWeight_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="decimalgrosswt" style="color:#ff5454">  XXX </span> </span>`);
    // }
}

if(tareweight_labelposition!=null && tareweight_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.tareWeightfn === 'on') {
        output += (`<span id="${currLabelName}tareWeight_label" class="textnonstore ui-state-default" style='font-weight:${tareweight_label_style[0]}; font-style:${tareweight_label_style[1]}; text-decoration: ${tareweight_label_style[2]}; text-align: ${tareweight_label_style[3]}; font-size: ${tareweight_label_style[4]}; font-family:${tareweight_label_style[5]};position:absolute; top:${tareweight_pos[0]}; left:${tareweight_pos[1]}; height:${tareweight_pos[2]}; width: ${tareweight_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}tareWeight" style="width: ${tareweight_pos[4]}; text-decoration: ${tareweight_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->tare_weight}}</span> <span class="decimaltarewt" style="color:#ff5454"> <span class="delimiter"> :  </span> ${tareWeight}  </span> </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}tareWeight_label" class="textnonstore ui-state-default" style='font-weight:${Tarewt_label_style[0]}; font-style:${Tarewt_label_style[1]}; text-decoration: ${Tarewt_label_style[2]}; text-align: ${Tarewt_label_style[3]}; font-size: ${Tarewt_label_style[4]}; font-family:${Tarewt_label_style[5]};position:absolute; top:${tarewt_pos[0]}; left:${tarewt_pos[1]}; height:${tarewt_pos[2]}; width: ${tarewt_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}tareWeight" style="width: ${tarewt_pos[4]}; text-decoration: ${Tarewt_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="decimaltarewt" style="color:#ff5454"> XXX </span> </span>`);
    // }
}


if(dynamicfield1_labelposition!=null && dynamicfield1_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.DateofMFGfn === 'on') {
        output +=(`<span id="${currLabelName}DateofMFG_label" class="textnonstore ui-state-default" style='font-weight:${dynamicfield1_label_style[0]}; font-style:${dynamicfield1_label_style[1]}; text-decoration:${dynamicfield1_label_style[2]}; text-align:${dynamicfield1_label_style[3]}; font-size: ${dynamicfield1_label_style[4]}; font-family:${dynamicfield1_label_style[5]}; position:absolute; top:${dynamicfield1_pos[0]}; left:${dynamicfield1_pos[1]}; height:${dynamicfield1_pos[2]}; width:${dynamicfield1_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}DateofMFG" style="width: ${dynamicfield1_pos[4]}; text-decoration:${dynamicfield1_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->dynamic_field1}}</span><span class="dateofmfg" style="color:#ff5454"> <span class="delimiter"> :  </span>${dynamic1[count].dynamic_field2}  </span></span>`);
    // }
    // else{
    //     output +=(`<span id="${currLabelName}DateofMFG_label" class="textnonstore ui-state-default" style='font-weight:${DateofMFG_label_style[0]}; font-style:${DateofMFG_label_style[1]}; text-decoration:${DateofMFG_label_style[2]}; text-align:${DateofMFG_label_style[3]}; font-size: ${DateofMFG_label_style[4]}; font-family:${DateofMFG_label_style[5]}; position:absolute; top:${dateofmfg_pos[0]}; left:${dateofmfg_pos[1]}; height:${dateofmfg_pos[2]}; width:${dateofmfg_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}DateofMFG" style="width: ${dateofmfg_pos[4]}; text-decoration:${DateofMFG_label_style[2]}; white-space: nowrap; display:inline-block"> </span><span class="dateofmfg" style="color:#ff5454">XX-XX-XXXX </span></span>`);
    // }
}

if(dynamicfield2_labelposition!=null && dynamicfield2_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.DateofExpfn === 'on') {
        output +=(`<span id="${currLabelName}DateofExp_label" class="textnonstore ui-state-default"  style='font-weight:${dynamicfield2_label_style[0]}; font-style:${dynamicfield2_label_style[1]}; text-decoration:${dynamicfield2_label_style[2]}; text-align:${dynamicfield2_label_style[3]}; font-size:${dynamicfield2_label_style[4]}; font-family:${dynamicfield2_label_style[5]}; position:absolute; top:${dynamicfield2_pos[0]}; left: ${dynamicfield2_pos[1]}; height:${dynamicfield2_pos[2]}; width:${dynamicfield2_pos[3]};'> <span class="${currLabelName}fieldname" id="${currLabelName}DateofExp" style="width: ${dynamicfield2_pos[4]}; text-decoration:${dynamicfield2_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->dynamic_field2}}</span><span class="dateofexpiry" style="color:#ff5454"> <span class="delimiter"> :  </span>${dynamic2[count].dynamic_field2}  </span> </span>`);
    // }
    // else{
    //     output +=(`<span id="${currLabelName}DateofExp_label" class="textnonstore ui-state-default"  style='font-weight:${DateofExp_label_style[0]}; font-style:${DateofExp_label_style[1]}; text-decoration:${DateofExp_label_style[2]}; text-align:${DateofExp_label_style[3]}; font-size:${DateofExp_label_style[4]}; font-family:${DateofExp_label_style[5]}; position:absolute; top:${dateofexp_pos[0]}; left: ${dateofexp_pos[1]}; height:${dateofexp_pos[2]}; width:${dateofexp_pos[3]};'> <span class="${currLabelName}fieldname" id="${currLabelName}DateofExp" style="width: ${dateofexp_pos[4]}; text-decoration:${DateofExp_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="dateofexpiry" style="color:#ff5454">XX-XX-XXXX </span> </span>`);
    // }
}

if(globalstaticfield1_labelposition!=null && globalstaticfield1_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.DateofRetestfn === 'on') {
        output += (`<span id="${currLabelName}DateofRetest_label" class="textnonstore ui-state-default" style='font-weight:${globalstaticfield1_label_style[0]}; font-style:${globalstaticfield1_label_style[1]}; text-decoration:${globalstaticfield1_label_style[2]}; text-align:${globalstaticfield1_label_style[3]}; font-size:${globalstaticfield1_label_style[4]}; font-family:${globalstaticfield1_label_style[5]}; position:absolute; top:${globalstaticfield1_pos[0]}; left:${globalstaticfield1_pos[1]}; height:${globalstaticfield1_pos[2]}; width:${globalstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}DateofRetest" style="width: ${globalstaticfield1_pos[4]}; text-decoration:${globalstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->global_static_field1}}</span><span class="dateofretest" style="color:#ff5454"><span class="delimiter"> :  </span>  {{$header->global_field1}}  </span></span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}DateofRetest_label" class="textnonstore ui-state-default" style='font-weight:${DateofRetest_label_style[0]}; font-style:${DateofRetest_label_style[1]}; text-decoration:${DateofRetest_label_style[2]}; text-align:${DateofRetest_label_style[3]}; font-size:${DateofRetest_label_style[4]}; font-family:${DateofRetest_label_style[5]}; position:absolute; top:${dateofretest_pos[0]}; left:${dateofretest_pos[1]}; height:${dateofretest_pos[2]}; width:${dateofretest_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}DateofRetest" style="width: ${dateofretest_pos[4]}; text-decoration:${DateofRetest_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="dateofretest" style="color:#ff5454">  XX-XX-XXXX </span></span>`);

    // }
}

// if(Adlfield_labelposition!=null && Adlfield_labelposition!='0px_0px_0px_0px_0px')
// {
//     if (style.Adlfieldfn === 'on') {
//         output += (`<span id="${currLabelName}Adlfield_label" class="textnonstore ui-state-default"  style='font-weight:${Adlfield_label_style[0]}; font-style:${Adlfield_label_style[1]}; text-decoration:${Adlfield_label_style[2]}; text-align:${Adlfield_label_style[3]}; font-size:${Adlfield_label_style[4]}; font-family:${Adlfield_label_style[5]}; position:absolute; top:${adlfield_pos[0]}; left:${adlfield_pos[1]}; height:${adlfield_pos[2]}; width:${adlfield_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Adlfield" style="width:${adlfield_pos[4]}; text-decoration:${Adlfield_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->container_no}}</span> <span class="containercount" style="color:#ff5454"> <span class="delimiter"> :  </span> XXX </span></span>`);
//     }
//     else{
//         output += (`<span id="${currLabelName}Adlfield_label" class="textnonstore ui-state-default"  style='font-weight:${Adlfield_label_style[0]}; font-style:${Adlfield_label_style[1]}; text-decoration:${Adlfield_label_style[2]}; text-align:${Adlfield_label_style[3]}; font-size:${Adlfield_label_style[4]}; font-family:${Adlfield_label_style[5]}; position:absolute; top:${adlfield_pos[0]}; left:${adlfield_pos[1]}; height:${adlfield_pos[2]}; width:${adlfield_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Adlfield" style="width:${adlfield_pos[4]}; text-decoration:${Adlfield_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="containercount" style="color:#ff5454">  XXX </span></span>`);

//     }
// }
if(globalstaticfield2_labelposition!=null && globalstaticfield2_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        // console.log(staticfield_pos,staticfield_labelposition,style.ProductNamefn,'staticfield_labelposition');
        output += (`<span id="${currLabelName}staticfield_label" class="textnonstore ui-state-default"  style='font-weight:${globalstaticfield2_label_style[0]}; font-style:${globalstaticfield2_label_style[1]}; text-decoration:${globalstaticfield2_label_style[2]}; text-align:${globalstaticfield2_label_style[3]}; font-size:${globalstaticfield2_label_style[4]}; font-family:${globalstaticfield2_label_style[5]}; position:absolute; top:${globalstaticfield2_pos[0]}; left:${globalstaticfield2_pos[1]}; height:${globalstaticfield2_pos[2]}; width:${globalstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield" style="width:${globalstaticfield2_pos[4]}; text-decoration:${globalstaticfield2_label_style[2]}; display:inline-block"> {{$config_data->global_static_field2}} </span> <span class="staticfield" style="color:#ff5454"><span class="delimiter"> :  </span> </span> {{$header->global_field1}}   </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}staticfield_label" class="textnonstore ui-state-default"  style='font-weight:${staticfield_label_style[0]}; font-style:${staticfield_label_style[1]}; text-decoration:${staticfield_label_style[2]}; text-align:${staticfield_label_style[3]}; font-size:${staticfield_label_style[4]}; font-family:${staticfield_label_style[5]}; position:absolute; top:${staticfield_pos[0]}; left:${staticfield_pos[1]}; height:${staticfield_pos[2]}; width:${staticfield_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield" style="width:${staticfield_pos[4]}; text-decoration:${staticfield_label_style[2]}; display:inline-block">  </span> <span class="staticfield" style="color:#ff5454">  ${staticfield_input} </span>  </span>`);
    // }
}

if(labelstaticfield1_labelposition!=null && labelstaticfield1_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}staticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield1_label_style[0]}; font-style:${labelstaticfield1_label_style[1]}; text-decoration:${labelstaticfield1_label_style[2]}; text-align:${labelstaticfield1_label_style[3]}; font-size:${labelstaticfield1_label_style[4]}; font-family:${labelstaticfield1_label_style[5]}; position:absolute; top:${labelstaticfield1_pos[0]}; left:${labelstaticfield1_pos[1]}; height:${labelstaticfield1_pos[2]}; width:${labelstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield2" style="width:${labelstaticfield1_pos[4]}; text-decoration:${labelstaticfield1_label_style[2]}; display:inline-block"> {{$config_data->label_static_field1}} </span> <span class="staticfield2" style="color:#ff5454"><span class="delimiter"> :  </span>  </span> ${labelstaticfield1}  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${staticfield2_label_style[0]}; font-style:${staticfield2_label_style[1]}; text-decoration:${staticfield2_label_style[2]}; text-align:${staticfield2_label_style[3]}; font-size:${staticfield2_label_style[4]}; font-family:${staticfield2_label_style[5]}; position:absolute; top:${staticfield2_pos[0]}; left:${staticfield2_pos[1]}; height:${staticfield2_pos[2]}; width:${staticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield2" style="width:${staticfield2_pos[4]}; text-decoration:${staticfield2_label_style[2]}; display:inline-block"> : </span> <span class="staticfield2" style="color:#ff5454">  ${labelstaticfield_input} </span>  </span>`);
    // }
}

if(labelstaticfield2_labelposition!=null && labelstaticfield2_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}staticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${labelstaticfield2_label_style[0]}; font-style:${labelstaticfield2_label_style[1]}; text-decoration:${labelstaticfield2_label_style[2]}; text-align:${labelstaticfield2_label_style[3]}; font-size:${labelstaticfield2_label_style[4]}; font-family:${labelstaticfield2_label_style[5]}; position:absolute; top:${labelstaticfield2_pos[0]}; left:${labelstaticfield1_pos[1]}; height:${labelstaticfield2_pos[2]}; width:${labelstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield2" style="width:${labelstaticfield2_pos[4]}; text-decoration:${labelstaticfield2_label_style[2]}; display:inline-block"> {{$config_data->label_static_field2}} </span> <span class="staticfield2" style="color:#ff5454"><span class="delimiter"> :  </span>  </span> ${labelstaticfield2} </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Staticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${staticfield2_label_style[0]}; font-style:${staticfield2_label_style[1]}; text-decoration:${staticfield2_label_style[2]}; text-align:${staticfield2_label_style[3]}; font-size:${staticfield2_label_style[4]}; font-family:${staticfield2_label_style[5]}; position:absolute; top:${staticfield2_pos[0]}; left:${staticfield2_pos[1]}; height:${staticfield2_pos[2]}; width:${staticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield2" style="width:${staticfield2_pos[4]}; text-decoration:${staticfield2_label_style[2]}; display:inline-block"> : </span> <span class="staticfield2" style="color:#ff5454">  ${labelstaticfield_input} </span>  </span>`);
    // }
}

if(Freefield1_labelposition!=null && Freefield1_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}Freefield1_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="width:${Freefield1_pos[4]}; text-decoration:${Freefield1_label_style[2]}; display:inline-block"> ${Freefield1_label_value}</span> <span class="Freefield2" style="color:#ff5454"> <span class="delimiter"> :  </span> {{$header->freefield1}} </span> </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="width:${Freefield2_pos[4]}; text-decoration:${Freefield2_label_style[2]}; display:inline-block">${Freefield2_label_value}</span> <span class="Freefield2" style="color:#ff5454">  ${Freefield2_label_value} </span> </span>`);
    // }
}

if(Freefield2_labelposition!=null && Freefield2_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width:${Freefield2_pos[4]}; text-decoration:${Freefield2_label_style[2]}; display:inline-block"> ${Freefield2_label_value}</span> <span class="Freefield3" style="color:#ff5454"> <span class="delimiter"> :  </span> {{$header->freefield2}} </span>  </span>`);
//     }
//     else{
//         output += (`<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width:${Freefield3_pos[4]}; text-decoration:${Freefield3_label_style[2]}; display:inline-block"> ${Freefield3_label_value}</span> <span class="Freefield3" style="color:#ff5454">  ${Freefield3_label_value}  </span>  </span>`);
// }
}

if(Freefield3_labelposition!=null && Freefield3_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield5" style="width: ${Freefield3_pos[4]}; text-decoration:${Freefield3_label_style[2]}; display:inline-block"> ${Freefield3_label_value}</span> <span class="Freefield5" style="color:#ff5454"> <span class="delimiter"> :  </span> {{$header->freefield3}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield5" style="width: ${Freefield5_pos[4]}; text-decoration:${Freefield5_label_style[2]}; display:inline-block">${Freefield4_label_value} </span> <span class="Freefield5" style="color:#ff5454">  ${Freefield4_label_value} </span>  </span>`);
    // }
}

if(Freefield4_labelposition!=null && Freefield4_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="width: ${Freefield4_pos[4]}; text-decoration:${Freefield4_label_style[2]}; display:inline-block"> ${Freefield4_label_value}</span> <span class="Freefield4" style="color:#ff5454"> <span class="delimiter"> :  </span> {{$header->freefield4}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="width: ${Freefield4_pos[4]}; text-decoration:${Freefield4_label_style[2]}; display:inline-block"> ${Freefield5_label_value}</span> <span class="Freefield4" style="color:#ff5454">  ${Freefield5_label_value} </span>  </span>`);
    // }
}

if(Freefield5_labelposition!=null && Freefield5_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield5_pos[4]}; text-decoration:${Freefield5_label_style[2]}; display:inline-block"> ${Freefield5_label_value}</span> <span class="Freefield6" style="color:#ff5454"> <span class="delimiter"> :  </span> {{$header->freefield5}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; display:inline-block"> ${Freefield6_label_value}</span> <span class="Freefield6" style="color:#ff5454">  XXXXXXXXXXXXXXX </span>  </span>`);
    // }
}
if(Freefield6_labelposition!=null && Freefield6_labelposition!='0px_0px_0px_0px_0px')
{
    // if (style.ProductNamefn === 'on') {
        output += (`<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; display:inline-block"> ${Freefield6_label_value}</span> <span class="Freefield6" style="color:#ff5454"> <span class="delimiter"> :  </span> {{$header->freefield6}} </span>  </span>`);
    // }
    // else{
    //     output += (`<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; display:inline-block"> ${Freefield6_label_value}</span> <span class="Freefield6" style="color:#ff5454">  XXXXXXXXXXXXXXX </span>  </span>`);
    // }
}



if(code_type === "QRcode"){
        $.ajax({
                    async: false,
                    url: "{{url('/labelsize')}}",
                    method:'get',
                    data: {
                        num: 60,
                        text:'hi',
                        code_type: code_type,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        output += `<span id="span_QRcode_nonstore" style="position:absolute ;top: ${code_pos[0]}; left: ${code_pos[1]}">${result}</span>`;
                        var code_container = code_pos[0] + '_' + code_pos[1];
                        $('.Qr_nonstore_labelposition').val(code_container);
                    }
});
}

output += `</div>`;
}
var num = parseInt(label.code_size);
console.log(output,'p');
$('#content').append(output);



   
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
.navbar{
    zoom:90% !important;
}
</style>