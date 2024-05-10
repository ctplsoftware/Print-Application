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


<body onload="printPage()">
     {{-- <body> --}}

    <div id="content" style="position: relative;">

    </div>

</body>

</html>

<script>
    function printPage() {
    window.print();
    setTimeout(function() {
        console.log("Innnnn");
        window.location.href = "/get-predefinedtransaction-list";
    }, 0);
    }
$(document).ready(function() {

    var details = @json($data1);
    console.log(details,'details');
    var lines = @json($lines);
    var countValue;
    var headerdetails = @json($header);
    var config = @json($config_data);
    var label = @json($shipper_print);
    let code_size = label.code_size.split('_');
    let code_type = label.code_type;
    let labelstaticfield1 = label.labelstaticfield1_input;
    let labelstaticfield2 = label.labelstaticfield2_input;
    let label_width = label.label_width;
    let label_height = label.label_height;
    var productData = @json($productData);
    var idPrefix_Labeltype = 'shipperlabel';
    var displaynone = '';
    var currLabelName = 'shipperlabel';

    var qrserial = serial = @json($header->serial_no);

    var serial = @json($serialNo->serial_no);
    if(serial != null){
        var num_length = serial.length;
    }
    // if(config.print_preview === 'off'){
    //     serial = serial.substr(-7);

    // }



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

    var Freefield1_label_value = label.Freefield1_label_value;
    var Freefield2_label_value = label.Freefield2_label_value;
    var Freefield3_label_value = label.Freefield3_label_value;
    var Freefield4_label_value = label.Freefield4_label_value;
    var Freefield5_label_value = label.Freefield5_label_value;
    var Freefield6_label_value = label.Freefield6_label_value;

    // var company_name_field = '';
    // company_name_field = label.organisationnamefn == 'on' ? config.product_name : '';
    // var product_name_field = '';
    // product_name_field = label.ProductNamefn == 'on' ? config.product_name : '';
    // var brand_name_field = '';
    // brand_name_field =  label.brandnamefn == 'on' ? config.product_name : '';
    // // var unique_product_code_field = '';
    // // unique_product_code_field = metalabel.unique_product_code_field == 'on' ? metalabel.unique_product_code : '';
    // var batch_no_field = '';
    // batch_no_field =  style.label == 'on' ? config.product_name : '';
    // var batch_size_field = '';
    // batch_size_field =  style.label == 'on' ? config.product_name : '';
    // var net_weight_field = '';
    // net_weight_field =  style.label == 'on' ? config.product_name : '';
    // var gross_weight_field = '';
    // gross_weight_field = style.label == 'on' ? config.product_name : '';
    // var tare_weight_field = '';
    // tare_weight_field =  style.label == 'on' ? config.product_name : '';
    // var date_of_manufacturing_field = '';
    // date_of_manufacturing_field =  label.DateofMFGfn == 'on' ? config.product_name : '';
    // var date_of_expiry_field = '';
    // date_of_expiry_field = label.DateofExpfn == 'on' ? config.product_name : '';
    // var date_of_retest_field = '';
    // date_of_retest_field =  label.DateofRetestfn == 'on' ? config.product_name : '';
    // var additional_field = '';
    // additional_field=  label.Adlfieldfn == 'on' ? config.product_name : '';

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

    var containerno_labelposition = label.containerno_labelposition;
    var containerno_pos = label.containerno_labelposition.split('_');

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
    var labelstaticfield2_input = label.labelstaticfield1_input;
    // var staticfield_input = label.Staticfield_input;
    // var labelstaticfield_input = label.labelstaticfield_input;
    var output = "";

    countValue = headerdetails.no_of_container !== null ? headerdetails.no_of_container : headerdetails.print_count;
    // countValue = headerdetails.no_of_container !== null ? headerdetails.no_of_container : headerdetails.print_count;
//   console.log(countValue);
    // $('#loadingDiv').show()  // Hide it initially
    for (var count = 0; count < countValue; count++) {
        var detail1 = details[0];

        var netWeight = config.net_weight_use == "on" ? detail1.net_weight : "NA";
        var tareWeight = config.tare_weight_use == "on" ? detail1.tare_weight : "NA";
        var grossWeight = config.gross_weight_use == "on" ? detail1.gross_weight : "NA";
        var dynamic1 = config.d_field1_use == "on" ? detail1.dynamic_field1 : "NA";
        var dynamic2 = config.d_field2_use == "on" ? detail1.dynamic_field2 : "NA";
        var container_no = config.no_of_container_use == "on" ? detail1.container_no : "NA";
        console.log(container_no,'container_no');

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
        console.log(qrfreefiedl1);
        qrfreefiedl2 = label.Freefield2_label_value;
        qrfreefiedl3 = label.Freefield3_label_value;
        qrfreefiedl4 = label.Freefield4_label_value;
        qrfreefiedl5 = label.Freefield5_label_value;
        qrfreefiedl6 = label.Freefield6_label_value;
        let qrData = label.qrdata;
        let jsonObject= JSON.parse(qrData);
        let text ="";

        var organisationName = jsonObject["organizationname"] == "yes" && jsonObject["organizationnamefn"] ==
                "yes" ? `${qrorganizationname_fieldname} : ${qrorganizationname}${qrbarcodedelimiter}` :
                jsonObject["organizationname"] == "yes" ? `${qrorganizationname}${qrbarcodedelimiter}` : '';

            var productName = jsonObject["productname"] == "yes" && jsonObject["productnamefn"] == "yes" ?
                `${qrproductname} : ${productData.product_name}${qrbarcodedelimiter}` :
                jsonObject["productname"] == "yes" ? `${productData.product_name}${qrbarcodedelimiter}` : '';

            var productId = jsonObject["productid"] == "yes" && jsonObject["productidfn"] == "yes" ?
                `${qrproductid} : ${productData.product_id}${qrbarcodedelimiter}` :
                jsonObject["productid"] == "yes" ? `${productData.product_id}${qrbarcodedelimiter}` : '';

            var productComments = jsonObject["productcomments"] == "yes" && jsonObject["productcommentsfn"] ==
                "yes" ? `${qrproductcomments} : ${productData.comments}${qrbarcodedelimiter}` :
                jsonObject["productcomments"] == "yes" ? `${productData.comments}${qrbarcodedelimiter}` : '';


            var productstaticfield1 = jsonObject["productstaticfield1"] == "yes" && jsonObject[
                    "productstaticfield1fn"] == "yes" ? `${qrproductstaticfield1} : ${productData.static_field1}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield1"] == "yes" ? `${productData.static_field1}${qrbarcodedelimiter}` : '';

            var productstaticfield2 = jsonObject["productstaticfield2"] == "yes" && jsonObject[
                    "productstaticfield2fn"] == "yes" ? `${qrproductstaticfield2} : ${productData.static_field2}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield2"] == "yes" ? `${productData.static_field2}${qrbarcodedelimiter}` : '';

            var productstaticfield3 = jsonObject["productstaticfield3"] == "yes" && jsonObject[
                    "productstaticfield3fn"] == "yes" ? `${qrproductstaticfield3} : ${productData.static_field3}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield3"] == "yes" ? `${productData.static_field3}${qrbarcodedelimiter}` : '';

            var productstaticfield4 = jsonObject["productstaticfield4"] == "yes" && jsonObject[
                    "productstaticfield4fn"] == "yes" ? `${qrproductstaticfield4} : ${productData.static_field4}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield4"] == "yes" ? `${productData.static_field4}${qrbarcodedelimiter}` : '';

            var productstaticfield5 = jsonObject["productstaticfield5"] == "yes" && jsonObject[
                    "productstaticfield5fn"] == "yes" ? `${qrproductstaticfield5} : ${productData.static_field5}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield5"] == "yes" ? `${productData.static_field5}${qrbarcodedelimiter}` : '';

            var productstaticfield6 = jsonObject["productstaticfield6"] == "yes" && jsonObject[
                    "productstaticfield6fn"] == "yes" ? `${qrproductstaticfield6} : ${productData.static_field6}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield6"] == "yes" ? `${productData.static_field6}${qrbarcodedelimiter}` : '';

            var productstaticfield7 = jsonObject["productstaticfield7"] == "yes" && jsonObject[
                    "productstaticfield7fn"] == "yes" ? `${qrproductstaticfield7} : ${productData.static_field7}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield7"] == "yes" ? `${productData.static_field7}${qrbarcodedelimiter}` : '';

            var productstaticfield8 = jsonObject["productstaticfield8"] == "yes" && jsonObject[
                    "productstaticfield8fn"] == "yes" ? `${qrproductstaticfield8} : ${productData.static_field8}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield8"] == "yes" ? `${productData.static_field8}${qrbarcodedelimiter}` : '';

            var productstaticfield9 = jsonObject["productstaticfield9"] == "yes" && jsonObject[
                    "productstaticfield9fn"] == "yes" ? `${qrproductstaticfield9} : ${productData.static_field9}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield9"] == "yes" ? `${productData.static_field9}${qrbarcodedelimiter}` : '';

            var productstaticfield10 = jsonObject["productstaticfield10"] == "yes" && jsonObject[
                    "productstaticfield10fn"] == "yes" ? `${qrproductstaticfield10} : ${productData.static_field10}${qrbarcodedelimiter}` :
                jsonObject["productstaticfield10"] == "yes" ? `${productData.static_field10}${qrbarcodedelimiter}` : '';

            var serialno = jsonObject["serialno"] == "yes" && jsonObject["serialnofn"] == "yes" ?
            `${qrserial} : ${headerdetails.prefix || ''}${qrserial || ''}${headerdetails.suffix || ''}${qrbarcodedelimiter}` :
            jsonObject["serialno"] == "yes" ? `${headerdetails.prefix || ''}${qrserial || ''}${headerdetails.suffix || ''}${qrbarcodedelimiter}` : '';

            var batchno = jsonObject["batchno"] == "yes" && jsonObject["batchnofn"] == "yes" ?
                `${qrbatchno} : ${headerdetails.batch_number}${qrbarcodedelimiter}` :
                jsonObject["batchno"] == "yes" ? `${headerdetails.batch_number}${qrbarcodedelimiter}` : '';

            var dateofmanufacture = jsonObject["dateofmanufacture"] == "yes" && jsonObject["dateofmanufacturefn"] ==
                "yes" ? `${qrdateofmanufacture} : ${headerdetails.date_of_manufacturing}${qrbarcodedelimiter}` :
                jsonObject["dateofmanufacture"] == "yes" ? `${headerdetails.date_of_manufacturing}${qrbarcodedelimiter}` : '';

            var dateofexp = jsonObject["dateofexp"] == "yes" && jsonObject["dateofexpfn"] == "yes" ?
                `${qrdateofexp} : ${headerdetails.date_of_expiry}${qrbarcodedelimiter}` :
                jsonObject["dateofexp"] == "yes" ? `${headerdetails.date_of_expiry}${qrbarcodedelimiter}` : '';

            var dateofretest = jsonObject["dateofretest"] == "yes" && jsonObject["dateofretestfn"] == "yes" ?
                `${qrdateofretest} : ${headerdetails.date_of_retest}${qrbarcodedelimiter}`:
                jsonObject["dateofretest"] == "yes" ? `${headerdetails.date_of_retest}${qrbarcodedelimiter}` : '';

            var batchstaticfield1 = jsonObject["batchstaticfield1"] == "yes" && jsonObject["batchstaticfield1fn"] ==
                "yes" ? `${qrbatchstaticfield1} : ${headerdetails.b_field1}${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield1"] == "yes" ? `${headerdetails.b_field1}${qrbarcodedelimiter}` : '';

            var batchstaticfield2 = jsonObject["batchstaticfield2"] == "yes" && jsonObject["batchstaticfield2fn"] ==
                "yes" ? `${qrbatchstaticfield2} : ${headerdetails.b_field2}${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield2"] == "yes" ? `${headerdetails.b_field2}${qrbarcodedelimiter}` : '';

            var batchstaticfield3 = jsonObject["batchstaticfield3"] == "yes" && jsonObject["batchstaticfield3fn"] ==
                "yes" ? `${qrbatchstaticfield3} : ${headerdetails.b_field3}${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield3"] == "yes" ? `${headerdetails.b_field3}${qrbarcodedelimiter}` : '';

            var batchstaticfield4 = jsonObject["batchstaticfield4"] == "yes" && jsonObject["batchstaticfield4fn"] ==
                "yes" ? `${qrbatchstaticfield4} : ${headerdetails.b_field4}${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield4"] == "yes" ? `${headerdetails.b_field4}${qrbarcodedelimiter}` : '';

            var batchstaticfield5 = jsonObject["batchstaticfield5"] == "yes" && jsonObject["batchstaticfield5fn"] ==
                "yes" ? `${qrbatchstaticfield5} : ${headerdetails.b_field5}${qrbarcodedelimiter}` :
                jsonObject["batchstaticfield5"] == "yes" ? `${headerdetails.b_field5}${qrbarcodedelimiter}` : '';

            var containerno = jsonObject["containerno"] == "yes" && jsonObject["containernofn"] == "yes" ?
                `${qrcontainerno} : ${container_no}${qrbarcodedelimiter}` :
                jsonObject["containerno"] == "yes" ? `${container_no}${qrbarcodedelimiter}` : '';

            var netweight = jsonObject["netweight"] == "yes" && jsonObject["netweightfn"] == "yes" ?
                `${qrnetweight} : ${netWeight ?? 'NA'}${qrbarcodedelimiter}` :
                jsonObject["netweight"] == "yes" ? `${netWeight ?? 'NA'}${qrbarcodedelimiter}` : '';

            var tareweight = jsonObject["tareweight"] == "yes" && jsonObject["tareweightfn"] == "yes" ?
                `${qrtareweight} : ${tareWeight ?? 'NA'}${qrbarcodedelimiter}` :
                jsonObject["tareweight"] == "yes" ? `${tareWeight ?? 'NA'}${qrbarcodedelimiter}` : '';

            var grossweight = jsonObject["grossweight"] == "yes" && jsonObject["grossweightfn"] == "yes" ?
                `${qrgrossweight} : ${grossWeight ?? 'NA'}${qrbarcodedelimiter}` :
                jsonObject["grossweight"] == "yes" ? `${grossWeight ?? 'NA'}${qrbarcodedelimiter}` : '';

            var dynamicfield1 = jsonObject["dynamicfield1"] == "yes" && jsonObject["dynamicfield1fn"] == "yes" ?
                `${qrdynamicfield1} : ${dynamic1 ?? 'NA'}${qrbarcodedelimiter}` :
                jsonObject["dynamicfield1"] == "yes" ? `${dynamic1 ?? 'NA'}${qrbarcodedelimiter}` : '';

            var dynamicfield2 = jsonObject["dynamicfield2"] == "yes" && jsonObject["dynamicfield2fn"] == "yes" ?
                `${qrdynamicfield2} : ${dynamic2 ?? 'NA'}${qrbarcodedelimiter}` :
                jsonObject["dynamicfield2"] == "yes" ? `${dynamic2 ?? 'NA'}${qrbarcodedelimiter}` : '';

            var globalstaticfield1 = jsonObject["globalstaticfield1"] == "yes" && jsonObject[
                "globalstaticfield1fn"] == "yes" ? `${qrglobalstaticfield1} : ${qrglobalfieldname1}${qrbarcodedelimiter}` :
                jsonObject["globalstaticfield1"] == "yes" ? `${qrglobalfieldname1}${qrbarcodedelimiter}` : '';

            var globalstaticfield2 = jsonObject["globalstaticfield2"] == "yes" && jsonObject[
                "globalstaticfield2fn"] == "yes" ? `${qrglobalstaticfield2} : ${qrglobalfieldname2}${qrbarcodedelimiter}` :
                jsonObject["globalstaticfield2"] == "yes" ? `${qrglobalfieldname2}${qrbarcodedelimiter}` : '';

            var label_labelstaticfield1 = jsonObject["labelstaticfield1"] == "yes" && jsonObject[
                    "labelstaticfield1fn"] == "yes" ? `${qrlabelstaticfield1} : ${label.labelstaticfield1_input}${qrbarcodedelimiter}` :
                jsonObject["labelstaticfield1"] == "yes" ? `${label.labelstaticfield1_input}${qrbarcodedelimiter}` : '';

            var label_labelstaticfield2 = jsonObject["labelstaticfield2"] == "yes" && jsonObject[
                    "labelstaticfield2fn"] == "yes" ? `${qrlabelstaticfield2} : ${label.labelstaticfield2_input}${qrbarcodedelimiter}` :
                jsonObject["labelstaticfield2"] == "yes" ? `${label.labelstaticfield2_input}${qrbarcodedelimiter}` : '';

            var freefield1 = jsonObject["freefield1"] == "yes" && jsonObject["freefield1fn"] == "yes" ?
                `${qrfreefiedl1} : ${headerdetails.freefield1}${qrbarcodedelimiter}` :
                jsonObject["freefield1"] == "yes" ? `${headerdetails.freefield1}${qrbarcodedelimiter}` : '';

            var freefield2 = jsonObject["freefield2"] == "yes" && jsonObject["freefield2fn"] == "yes" ?
                `${qrfreefiedl2} : ${headerdetails.freefield2}${qrbarcodedelimiter}` :
                jsonObject["freefield2"] == "yes" ? `${headerdetails.freefield2}${qrbarcodedelimiter}` : '';

            var freefield3 = jsonObject["freefield3"] == "yes" && jsonObject["freefield3fn"] == "yes" ?
                `${qrfreefiedl3} : ${headerdetails.freefield3}${qrbarcodedelimiter}` :
                jsonObject["freefield3"] == "yes" ? `${headerdetails.freefield3}${qrbarcodedelimiter}` : '';

            var freefield4 = jsonObject["freefield4"] == "yes" && jsonObject["freefield4fn"] == "yes" ?
                `${qrfreefiedl4} : ${headerdetails.freefield4}${qrbarcodedelimiter}` :
                jsonObject["freefield4"] == "yes" ? `${headerdetails.freefield4}${qrbarcodedelimiter}` : '';

            var freefield5 = jsonObject["freefield5"] == "yes" && jsonObject["freefield5fn"] == "yes" ?
                `${qrfreefiedl5} : ${headerdetails.freefield5}${qrbarcodedelimiter}` :
                jsonObject["freefield5"] == "yes" ? `${headerdetails.freefield5}${qrbarcodedelimiter}` : '';

            var freefield6 = jsonObject["freefield6"] == "yes" && jsonObject["freefield6fn"] == "yes" ?
                `${qrfreefiedl6} : ${headerdetails.freefield6}${qrbarcodedelimiter}` :
                jsonObject["freefield6"] == "yes" ? `${headerdetails.freefield6}${qrbarcodedelimiter}` : '';


            text = organisationName + productName + productId + productComments + productstaticfield1 +
                productstaticfield2 + productstaticfield3 + productstaticfield4 + productstaticfield5 +
                productstaticfield6 + productstaticfield7 + productstaticfield8 + productstaticfield9 +
                productstaticfield10 + serialno +
                batchno + dateofmanufacture + dateofexp + dateofretest + batchstaticfield1 + batchstaticfield2 +
                batchstaticfield3 + batchstaticfield4 + batchstaticfield5 + containerno +
                netweight + tareweight + grossweight + dynamicfield1 + dynamicfield2 + globalstaticfield1 +
                globalstaticfield2 + label_labelstaticfield1 + label_labelstaticfield2 + freefield1 + freefield2 +
                freefield3 + freefield4 + freefield5 + freefield6;

                if(text.length > 1){
                    text = text.trim();

                    if (text.endsWith(qrbarcodedelimiter)) {
                        text = text.slice(0, -1);
                    }
                }


                output += `<div style="width:${label.label_width}mm; height:${label.label_height}mm; position: relative; page-break-after: always;">`;

        if (organizationname_labelposition != null && organizationname_labelposition != '0px_0px_0px_0px_0px') {
            if (organizationname_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}ProductName_label" class="textnonstore ui-state-default"  style='font-weight:${organizationname_label_style[0]}; font-style:${organizationname_label_style[1]}; text-decoration:${organizationname_label_style[2]}; text-align:${organizationname_label_style[3]}; font-size:${organizationname_label_style[4]}; font-family:${organizationname_label_style[5]}; position:absolute;  top: ${organizationname_pos[0]}; left: ${organizationname_pos[1]}; height:${organizationname_pos[2]}; width: ${organizationname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}ProductName"style="width: ${organizationname_pos[4]}; text-decoration:${organizationname_label_style[2]}; white-space: nowrap; display:inline-block">Company Name</span><span class="delimiter"> : </span><span class="organizationname"> {{$config_data->organization_name}}</span></span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}CompanyName_label" class="textnonstore ui-state-default"  style='font-weight:${organizationname_label_style[0]}; font-style:${organizationname_label_style[1]}; text-decoration:${organizationname_label_style[2]}; text-align:${organizationname_label_style[3]}; font-size:${organizationname_label_style[4]}; font-family:${organizationname_label_style[5]}; position:absolute;  top: ${organizationname_pos[0]}; left: ${organizationname_pos[1]}; height:${organizationname_pos[2]}; width: ${organizationname_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}CompanyName"style="width: ${organizationname_pos[4]}; text-decoration:${organizationname_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="delimiter"></span><span class="organizationname"> {{$config_data->organization_name}}</span></span>`
                );
        }
        }

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

        if (productid_labelposition != null && productid_labelposition != '0px_0px_0px_0px_0px') {
            if (productid_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}brandname_label" class="textnonstore ui-state-default" style='font-weight:${productid_label_style[0]}; font-style:${productid_label_style[1]}; text-decoration:${productid_label_style[2]}; text-align:${productid_label_style[3]}; font-size:${ productid_label_style[4]}; font-family:${ productid_label_style[5]}; position:absolute; top:${productid_pos[0]}; left:${productid_pos[1]}; height:${productid_pos[2]}; width:${productid_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}brandname" style="width: ${productid_pos[4]}; text-decoration:${productid_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->product_id}} </span> <span class="delimiter"> : </span>  <span> {{$productData->product_id}} </span></span>`
                );

        } else {
            output += (
                `<span id="${currLabelName}brandname_label" class="textnonstore ui-state-default" style='font-weight:${productid_label_style[0]}; font-style:${productid_label_style[1]}; text-decoration:${productid_label_style[2]}; text-align:${productid_label_style[3]}; font-size:${ productid_label_style[4]}; font-family:${ productid_label_style[5]}; position:absolute; top:${productid_pos[0]}; left:${productid_pos[1]}; height:${productid_pos[2]}; width:${productid_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}brandname" style="width: ${productid_pos[4]}; text-decoration:${productid_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="delimiter"></span>  <span> {{$productData->product_id}} </span></span>`
                );

        }
        }

        if (productcomments_labelposition != null && productcomments_labelposition != '0px_0px_0px_0px_0px') {
            if (productcomments_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}BatchNo_label" class="textnonstore ui-state-default" style='font-weight:${productcomments_label_style[0]}; font-style:${productcomments_label_style[1]}; text-decoration:${productcomments_label_style[2]}; text-align:${productcomments_label_style[3]}; font-size:${productcomments_label_style[4]}; font-family:${productcomments_label_style[5]}; position:absolute; top: ${productcomments_pos[0]}; left:${productcomments_pos[1]}; height:${productcomments_pos[2]}; width:${productcomments_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}BatchNo" style="width: ${productcomments_pos[4]}; text-decoration:${productcomments_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->comments}}</span><span class="delimiter"> : </span><span>{{$productData->comments}} </span></span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}BatchNo_label" class="textnonstore ui-state-default" style='font-weight:${productcomments_label_style[0]}; font-style:${productcomments_label_style[1]}; text-decoration:${productcomments_label_style[2]}; text-align:${productcomments_label_style[3]}; font-size:${productcomments_label_style[4]}; font-family:${productcomments_label_style[5]}; position:absolute; top: ${productcomments_pos[0]}; left:${productcomments_pos[1]}; height:${productcomments_pos[2]}; width:${productcomments_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}BatchNo" style="width: ${productcomments_pos[4]}; text-decoration:${productcomments_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="batchno"> <span class="delimiter"></span> {{$productData->comments}} </span></span>`
                );

        }
        }

        if (productstaticfield1_labelposition != null && productstaticfield1_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield1_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Batchsize_label" class="textnonstore ui-state-default" style='font-weight:${productstaticfield1_label_style[0]}; font-style:${productstaticfield1_label_style[1]}; text-decoration:${productstaticfield1_label_style[2]}; text-align:${productstaticfield1_label_style[3]}; font-size:${productstaticfield1_label_style[4]}; font-family:${productstaticfield1_label_style[5]}; position:absolute; top:${productstaticfield1_pos[0]}; left:${productstaticfield1_pos[1]}; height:${productstaticfield1_pos[2]}; width:200px;'> <span class="${currLabelName}fieldname" id="${currLabelName}Batchsize" style="width: ${productstaticfield1_pos[4]}; text-decoration:${productstaticfield1_label_style[2]}; display: inline-block; white-space: nowrap;">{{$config_data->p_static_field1}}</span><span class="delimiter"> : </span><span>{{$productData->static_field1}} </span></span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Batchsize_label" class="textnonstore ui-state-default" style='font-weight:${productstaticfield1_label_style[0]}; font-style:${productstaticfield1_label_style[1]}; text-decoration:${productstaticfield1_label_style[2]}; text-align:${productstaticfield1_label_style[3]}; font-size:${productstaticfield1_label_style[4]}; font-family:${productstaticfield1_label_style[5]}; position:absolute; top:${productstaticfield1_pos[0]}; left:${productstaticfield1_pos[1]}; height:${productstaticfield1_pos[2]}; width:${productstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Batchsize" style="width: ${productstaticfield1_pos[4]}; text-decoration:${productstaticfield1_label_style[2]}; display: inline-block; white-space: nowrap;"></span><span class="decimalbatchsize">  {{$productData->static_field1}} </span></span>`
                );
        }
        }

        if (productstaticfield2_labelposition != null && productstaticfield2_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield2_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields2_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield2_label_style[0]}; font-style:${productstaticfield2_label_style[1]}; text-decoration:${productstaticfield2_label_style[2]}; text-align:${productstaticfield2_label_style[3]}; font-size:${productstaticfield2_label_style[4]}; font-family:${productstaticfield2_label_style[5]}; position:absolute; top:${productstaticfield2_pos[0]}; left:${productstaticfield2_pos[1]}; height:${productstaticfield2_pos[2]}; width:${productstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields2" style="width:${productstaticfield2_pos[4]}; text-decoration:${productstaticfield2_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field2}} </span><span class="delimiter"> : </span><span>{{$productData->static_field2}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields2_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield2_label_style[0]}; font-style:${productstaticfield2_label_style[1]}; text-decoration:${productstaticfield2_label_style[2]}; text-align:${productstaticfield2_label_style[3]}; font-size:${productstaticfield2_label_style[4]}; font-family:${productstaticfield2_label_style[5]}; position:absolute; top:${productstaticfield2_pos[0]}; left:${productstaticfield2_pos[1]}; height:${productstaticfield2_pos[2]}; width:${productstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields2" style="width:${productstaticfield2_pos[4]}; text-decoration:${productstaticfield2_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields2">  {{$productData->static_field2}} </span>  </span>`
                );
        }
        }

        if (productstaticfield3_labelposition != null && productstaticfield3_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield3_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields3_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield3_label_style[0]}; font-style:${productstaticfield3_label_style[1]}; text-decoration:${productstaticfield3_label_style[2]}; text-align:${productstaticfield3_label_style[3]}; font-size:${productstaticfield3_label_style[4]}; font-family:${productstaticfield3_label_style[5]}; position:absolute; top:${productstaticfield3_pos[0]}; left:${productstaticfield3_pos[1]}; height:${productstaticfield3_pos[2]}; width:${productstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields3" style="width:${productstaticfield3_pos[4]}; text-decoration:${productstaticfield3_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field3}} </span><span class="delimiter"> : </span><span>{{$productData->static_field3}}</span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields3_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield3_label_style[0]}; font-style:${productstaticfield3_label_style[1]}; text-decoration:${productstaticfield3_label_style[2]}; text-align:${productstaticfield3_label_style[3]}; font-size:${productstaticfield3_label_style[4]}; font-family:${productstaticfield3_label_style[5]}; position:absolute; top:${productstaticfield3_pos[0]}; left:${productstaticfield3_pos[1]}; height:${productstaticfield3_pos[2]}; width:${productstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields3" style="width:${productstaticfield3_pos[4]}; text-decoration:${productstaticfield3_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields3">  {{$productData->static_field3}} </span>  </span>`
                );
        }
        }

        if (productstaticfield4_labelposition != null && productstaticfield4_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield4_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields4_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield4_label_style[0]}; font-style:${productstaticfield4_label_style[1]}; text-decoration:${productstaticfield4_label_style[2]}; text-align:${productstaticfield4_label_style[3]}; font-size:${productstaticfield4_label_style[4]}; font-family:${productstaticfield4_label_style[5]}; position:absolute; top:${productstaticfield4_pos[0]}; left:${productstaticfield4_pos[1]}; height:${productstaticfield4_pos[2]}; width:${productstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields4" style="width:${productstaticfield4_pos[4]}; text-decoration:${productstaticfield4_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field4}} </span><span class="delimiter"> : </span><span>{{$productData->static_field4}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields4_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield4_label_style[0]}; font-style:${productstaticfield4_label_style[1]}; text-decoration:${productstaticfield4_label_style[2]}; text-align:${productstaticfield4_label_style[3]}; font-size:${productstaticfield4_label_style[4]}; font-family:${productstaticfield4_label_style[5]}; position:absolute; top:${productstaticfield4_pos[0]}; left:${productstaticfield4_pos[1]}; height:${productstaticfield4_pos[2]}; width:${productstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields4" style="width:${productstaticfield4_pos[4]}; text-decoration:${productstaticfield4_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields4">  {{$productData->static_field4}} </span>  </span>`
                );
        }
        }

        if (productstaticfield5_labelposition != null && productstaticfield5_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield5_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields5_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield5_label_style[0]}; font-style:${productstaticfield5_label_style[1]}; text-decoration:${productstaticfield5_label_style[2]}; text-align:${productstaticfield5_label_style[3]}; font-size:${productstaticfield5_label_style[4]}; font-family:${productstaticfield5_label_style[5]}; position:absolute; top:${productstaticfield5_pos[0]}; left:${productstaticfield5_pos[1]}; height:${productstaticfield5_pos[2]}; width:${productstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields5" style="width:${productstaticfield5_pos[4]}; text-decoration:${productstaticfield5_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field5}} </span><span class="delimiter"> : </span><span>{{$productData->static_field5}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields5_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield5_label_style[0]}; font-style:${productstaticfield5_label_style[1]}; text-decoration:${productstaticfield5_label_style[2]}; text-align:${productstaticfield5_label_style[3]}; font-size:${productstaticfield5_label_style[4]}; font-family:${productstaticfield5_label_style[5]}; position:absolute; top:${productstaticfield5_pos[0]}; left:${productstaticfield5_pos[1]}; height:${productstaticfield5_pos[2]}; width:${productstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields5" style="width:${productstaticfield5_pos[4]}; text-decoration:${productstaticfield5_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields5">  {{$productData->static_field5}} </span>  </span>`
                );
        }
        }

        if (productstaticfield6_labelposition != null && productstaticfield6_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield6_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields6_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield6_label_style[0]}; font-style:${productstaticfield6_label_style[1]}; text-decoration:${productstaticfield6_label_style[2]}; text-align:${productstaticfield6_label_style[3]}; font-size:${productstaticfield6_label_style[4]}; font-family:${productstaticfield6_label_style[5]}; position:absolute; top:${productstaticfield6_pos[0]}; left:${productstaticfield6_pos[1]}; height:${productstaticfield6_pos[2]}; width:${productstaticfield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields6" style="width:${productstaticfield6_pos[4]}; text-decoration:${productstaticfield6_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field6}} </span><span class="delimiter"> : </span><span>{{$productData->static_field6}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields6_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield6_label_style[0]}; font-style:${productstaticfield6_label_style[1]}; text-decoration:${productstaticfield6_label_style[2]}; text-align:${productstaticfield6_label_style[3]}; font-size:${productstaticfield6_label_style[4]}; font-family:${productstaticfield6_label_style[5]}; position:absolute; top:${productstaticfield6_pos[0]}; left:${productstaticfield6_pos[1]}; height:${productstaticfield6_pos[2]}; width:${productstaticfield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields6" style="width:${productstaticfield6_pos[4]}; text-decoration:${productstaticfield6_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields6">  {{$productData->static_field6}} </span>  </span>`
                );
        }
        }

        if (productstaticfield7_labelposition != null && productstaticfield7_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield7_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields7_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield7_label_style[0]}; font-style:${productstaticfield7_label_style[1]}; text-decoration:${productstaticfield7_label_style[2]}; text-align:${productstaticfield7_label_style[3]}; font-size:${productstaticfield7_label_style[4]}; font-family:${productstaticfield7_label_style[5]}; position:absolute; top:${productstaticfield7_pos[0]}; left:${productstaticfield7_pos[1]}; height:${productstaticfield7_pos[2]}; width:${productstaticfield7_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields7" style="width:${productstaticfield7_pos[4]}; text-decoration:${productstaticfield7_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field7}} </span><span class="delimiter"> : </span><span>{{$productData->static_field7}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields7_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield7_label_style[0]}; font-style:${productstaticfield7_label_style[1]}; text-decoration:${productstaticfield7_label_style[2]}; text-align:${productstaticfield7_label_style[3]}; font-size:${productstaticfield7_label_style[4]}; font-family:${productstaticfield7_label_style[5]}; position:absolute; top:${productstaticfield7_pos[0]}; left:${productstaticfield7_pos[1]}; height:${productstaticfield7_pos[2]}; width:${productstaticfield7_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields7" style="width:${productstaticfield7_pos[4]}; text-decoration:${productstaticfield7_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields7">  {{$productData->static_field7}} </span>  </span>`
                );
        }
        }

        if (productstaticfield8_labelposition != null && productstaticfield8_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield8_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields8_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield8_label_style[0]}; font-style:${productstaticfield8_label_style[1]}; text-decoration:${productstaticfield8_label_style[2]}; text-align:${productstaticfield8_label_style[3]}; font-size:${productstaticfield8_label_style[4]}; font-family:${productstaticfield8_label_style[5]}; position:absolute; top:${productstaticfield8_pos[0]}; left:${productstaticfield8_pos[1]}; height:${productstaticfield8_pos[2]}; width:${productstaticfield8_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields8" style="width:${productstaticfield8_pos[4]}; text-decoration:${productstaticfield8_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field8}} </span><span class="delimiter"> : </span><span>{{$productData->static_field8}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields8_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield8_label_style[0]}; font-style:${productstaticfield8_label_style[1]}; text-decoration:${productstaticfield8_label_style[2]}; text-align:${productstaticfield8_label_style[3]}; font-size:${productstaticfield8_label_style[4]}; font-family:${productstaticfield8_label_style[5]}; position:absolute; top:${productstaticfield8_pos[0]}; left:${productstaticfield8_pos[1]}; height:${productstaticfield8_pos[2]}; width:${productstaticfield8_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields8" style="width:${productstaticfield8_pos[4]}; text-decoration:${productstaticfield8_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields8">  {{$productData->static_field8}} </span>  </span>`
                );
        }
        }

        if (productstaticfield9_labelposition != null && productstaticfield9_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield9_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields9_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield9_label_style[0]}; font-style:${productstaticfield9_label_style[1]}; text-decoration:${productstaticfield9_label_style[2]}; text-align:${productstaticfield9_label_style[3]}; font-size:${productstaticfield9_label_style[4]}; font-family:${productstaticfield9_label_style[5]}; position:absolute; top:${productstaticfield9_pos[0]}; left:${productstaticfield9_pos[1]}; height:${productstaticfield9_pos[2]}; width:${productstaticfield9_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields9" style="width:${productstaticfield9_pos[4]}; text-decoration:${productstaticfield9_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field9}} </span><span class="delimiter"> : </span><span>{{$productData->static_field9}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields9_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield9_label_style[0]}; font-style:${productstaticfield9_label_style[1]}; text-decoration:${productstaticfield9_label_style[2]}; text-align:${productstaticfield9_label_style[3]}; font-size:${productstaticfield9_label_style[4]}; font-family:${productstaticfield9_label_style[5]}; position:absolute; top:${productstaticfield9_pos[0]}; left:${productstaticfield9_pos[1]}; height:${productstaticfield9_pos[2]}; width:${productstaticfield9_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields9" style="width:${productstaticfield9_pos[4]}; text-decoration:${productstaticfield9_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields9">  {{$productData->static_field9}} </span>  </span>`
                );
        }
        }

        if (productstaticfield10_labelposition != null && productstaticfield10_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (productstaticfield10_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields10_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield10_label_style[0]}; font-style:${productstaticfield10_label_style[1]}; text-decoration:${productstaticfield10_label_style[2]}; text-align:${productstaticfield10_label_style[3]}; font-size:${productstaticfield10_label_style[4]}; font-family:${productstaticfield10_label_style[5]}; position:absolute; top:${productstaticfield10_pos[0]}; left:${productstaticfield10_pos[1]}; height:${productstaticfield10_pos[2]}; width:${productstaticfield10_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields10" style="width:${productstaticfield10_pos[4]}; text-decoration:${productstaticfield10_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->p_static_field10}} </span><span class="delimiter"> : </span><span>{{$productData->static_field10}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields10_label" class="textnonstore ui-state-default"  style='font-weight:${productstaticfield10_label_style[0]}; font-style:${productstaticfield10_label_style[1]}; text-decoration:${productstaticfield10_label_style[2]}; text-align:${productstaticfield10_label_style[3]}; font-size:${productstaticfield10_label_style[4]}; font-family:${productstaticfield10_label_style[5]}; position:absolute; top:${productstaticfield10_pos[0]}; left:${productstaticfield10_pos[1]}; height:${productstaticfield10_pos[2]}; width:${productstaticfield10_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields10" style="width:${productstaticfield10_pos[4]}; text-decoration:${productstaticfield10_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields10">  {{$productData->static_field10}} </span>  </span>`
                );
        }
        }
        if (serialno_labelposition != null && serialno_labelposition != '0px_0px_0px_0px_0px') {
                if (serialno_label_style[6] === 'on') {
                    output += (
                        `<span id="${currLabelName}serialno_label" class="textnonstore ui-state-default"  style='font-weight:${serialno_label_style[0]}; font-style:${serialno_label_style[1]}; text-decoration:${serialno_label_style[2]}; text-align:${serialno_label_style[3]}; font-size:${serialno_label_style[4]}; font-family:${serialno_label_style[5]}; position:absolute; top:${serialno_pos[0]}; left:${serialno_pos[1]}; height:${serialno_pos[2]}; width:${serialno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}serialno" style="width:${serialno_pos[4]}; text-decoration:${serialno_label_style[2]}; display:inline-block; white-space:nowrap;"> {{ $config_data->serialno }} </span> <span class="serialno"><span class="delimiter"> :  </span>  {{ $serialNo->prefix }}${serial || ''}{{ $serialNo->suffix }} </span>  </span>`
                        );
                } else {
                    output += (
                        `<span id="${currLabelName}serialno_label" class="textnonstore ui-state-default"  style='font-weight:${serialno_label_style[0]}; font-style:${serialno_label_style[1]}; text-decoration:${serialno_label_style[2]}; text-align:${serialno_label_style[3]}; font-size:${serialno_label_style[4]}; font-family:${serialno_label_style[5]}; position:absolute; top:${serialno_pos[0]}; left:${serialno_pos[1]}; height:${serialno_pos[2]}; width:${serialno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}serialno" style="width:${serialno_pos[4]}; text-decoration:${serialno_label_style[2]}; display:inline-block; white-space:nowrap;"></span> <span class="serialno"> {{ $header->prefix }}${serial || ''}{{ $header->suffix }} </span>  </span>`
                        );
                }
        }


        if (batchno_labelposition != null && batchno_labelposition != '0px_0px_0px_0px_0px') {
            if (batchno_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields11_label" class="textnonstore ui-state-default"  style='font-weight:${batchno_label_style[0]}; font-style:${batchno_label_style[1]}; text-decoration:${batchno_label_style[2]}; text-align:${batchno_label_style[3]}; font-size:${batchno_label_style[4]}; font-family:${batchno_label_style[5]}; position:absolute; top:${batchno_pos[0]}; left:${batchno_pos[1]}; height:${batchno_pos[2]}; width:${batchno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields11" style="width:${batchno_pos[4]}; text-decoration:${batchno_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->batch_number}} </span> <span class="Staticfields11"><span class="delimiter"> :  </span>  {{$header->batch_number}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields11_label" class="textnonstore ui-state-default"  style='font-weight:${batchno_label_style[0]}; font-style:${batchno_label_style[1]}; text-decoration:${batchno_label_style[2]}; text-align:${batchno_label_style[3]}; font-size:${batchno_label_style[4]}; font-family:${batchno_label_style[5]}; position:absolute; top:${batchno_pos[0]}; left:${batchno_pos[1]}; height:${batchno_pos[2]}; width:${batchno_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields11" style="width:${batchno_pos[4]}; text-decoration:${batchno_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields11">  {{$header->batch_number}} </span>  </span>`
                );
        }
        }

        if (dateofmanufacture_labelposition != null && dateofmanufacture_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (dateofmanufacture_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields12_label" class="textnonstore ui-state-default"  style='font-weight:${dateofmanufacture_label_style[0]}; font-style:${dateofmanufacture_label_style[1]}; text-decoration:${dateofmanufacture_label_style[2]}; text-align:${dateofmanufacture_label_style[3]}; font-size:${dateofmanufacture_label_style[4]}; font-family:${dateofmanufacture_label_style[5]}; position:absolute; top:${dateofmanufacture_pos[0]}; left:${dateofmanufacture_pos[1]}; height:${dateofmanufacture_pos[2]}; width:${dateofmanufacture_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields12" style="width:${dateofmanufacture_pos[4]}; text-decoration:${dateofmanufacture_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->date_of_manufacturing}} </span><span class="delimiter"> : </span><span>{{$header->date_of_manufacturing}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields12_label" class="textnonstore ui-state-default"  style='font-weight:${dateofmanufacture_label_style[0]}; font-style:${dateofmanufacture_label_style[1]}; text-decoration:${dateofmanufacture_label_style[2]}; text-align:${dateofmanufacture_label_style[3]}; font-size:${dateofmanufacture_label_style[4]}; font-family:${dateofmanufacture_label_style[5]}; position:absolute; top:${dateofmanufacture_pos[0]}; left:${dateofmanufacture_pos[1]}; height:${dateofmanufacture_pos[2]}; width:${dateofmanufacture_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields12" style="width:${dateofmanufacture_pos[4]}; text-decoration:${dateofmanufacture_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields12">  {{$header->date_of_manufacturing}} </span>  </span>`
                );
        }
        }

        if (dateofexp_labelposition != null && dateofexp_labelposition != '0px_0px_0px_0px_0px') {
            if (dateofexp_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields13_label" class="textnonstore ui-state-default"  style='font-weight:${dateofexp_label_style[0]}; font-style:${dateofexp_label_style[1]}; text-decoration:${dateofexp_label_style[2]}; text-align:${dateofexp_label_style[3]}; font-size:${dateofexp_label_style[4]}; font-family:${dateofexp_label_style[5]}; position:absolute; top:${dateofexp_pos[0]}; left:${dateofexp_pos[1]}; height:${dateofexp_pos[2]}; width:${dateofexp_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields13" style="width:${dateofexp_pos[4]}; text-decoration:${dateofexp_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->date_of_expiry}} </span><span class="delimiter"> : </span><span>{{$header->date_of_expiry}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields13_label" class="textnonstore ui-state-default"  style='font-weight:${dateofexp_label_style[0]}; font-style:${dateofexp_label_style[1]}; text-decoration:${dateofexp_label_style[2]}; text-align:${dateofexp_label_style[3]}; font-size:${dateofexp_label_style[4]}; font-family:${dateofexp_label_style[5]}; position:absolute; top:${dateofexp_pos[0]}; left:${dateofexp_pos[1]}; height:${dateofexp_pos[2]}; width:${dateofexp_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields13" style="width:${dateofexp_pos[4]}; text-decoration:${dateofexp_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields13">  {{$header->date_of_expiry}} </span>  </span>`
                );
        }
        }

        if (dateofretest_labelposition != null && dateofretest_labelposition != '0px_0px_0px_0px_0px') {
            if (dateofretest_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields14_label" class="textnonstore ui-state-default"  style='font-weight:${dateofretest_label_style[0]}; font-style:${dateofretest_label_style[1]}; text-decoration:${dateofretest_label_style[2]}; text-align:${dateofretest_label_style[3]}; font-size:${dateofretest_label_style[4]}; font-family:${dateofretest_label_style[5]}; position:absolute; top:${dateofretest_pos[0]}; left:${dateofretest_pos[1]}; height:${dateofretest_pos[2]}; width:${dateofretest_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields14" style="width:${dateofretest_pos[4]}; text-decoration:${dateofretest_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->date_of_retest}} </span><span class="delimiter"> : </span><span>{{$header->date_of_retest}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields14_label" class="textnonstore ui-state-default"  style='font-weight:${dateofretest_label_style[0]}; font-style:${dateofretest_label_style[1]}; text-decoration:${dateofretest_label_style[2]}; text-align:${dateofretest_label_style[3]}; font-size:${dateofretest_label_style[4]}; font-family:${dateofretest_label_style[5]}; position:absolute; top:${dateofretest_pos[0]}; left:${dateofretest_pos[1]}; height:${dateofretest_pos[2]}; width:${dateofretest_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields14" style="width:${dateofretest_pos[4]}; text-decoration:${dateofretest_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields14">  {{$header->date_of_retest}} </span>  </span>`
                );
        }
        }

        if (batchstaticfield1_labelposition != null && batchstaticfield1_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (batchstaticfield1_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Staticfields15_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield1_label_style[0]}; font-style:${batchstaticfield1_label_style[1]}; text-decoration:${batchstaticfield1_label_style[2]}; text-align:${batchstaticfield1_label_style[3]}; font-size:${batchstaticfield1_label_style[4]}; font-family:${batchstaticfield1_label_style[5]}; position:absolute; top:${batchstaticfield1_pos[0]}; left:${batchstaticfield1_pos[1]}; height:${batchstaticfield1_pos[2]}; width:${batchstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields15" style="width:${batchstaticfield1_pos[4]}; text-decoration:${batchstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->b_static_field1}} </span><span class="delimiter"> : </span><span>{{$header->b_field1}}  </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Staticfields15_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield1_label_style[0]}; font-style:${batchstaticfield1_label_style[1]}; text-decoration:${batchstaticfield1_label_style[2]}; text-align:${batchstaticfield1_label_style[3]}; font-size:${batchstaticfield1_label_style[4]}; font-family:${batchstaticfield1_label_style[5]}; position:absolute; top:${batchstaticfield1_pos[0]}; left:${batchstaticfield1_pos[1]}; height:${batchstaticfield1_pos[2]}; width:${batchstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Staticfields15" style="width:${batchstaticfield1_pos[4]}; text-decoration:${batchstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="Staticfields15">  {{$header->b_field1}} </span>  </span>`
                );
        }
        }

        if (batchstaticfield2_labelposition != null && batchstaticfield2_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (batchstaticfield2_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}dynamicfield1_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield2_label_style[0]}; font-style:${batchstaticfield2_label_style[1]}; text-decoration:${batchstaticfield2_label_style[2]}; text-align:${batchstaticfield2_label_style[3]}; font-size:${batchstaticfield2_label_style[4]}; font-family:${batchstaticfield2_label_style[5]}; position:absolute; top:${batchstaticfield2_pos[0]}; left:${batchstaticfield2_pos[1]}; height:${batchstaticfield2_pos[2]}; width:${batchstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield1" style="width:${batchstaticfield2_pos[4]}; text-decoration:${batchstaticfield2_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->b_static_field2}} </span><span class="delimiter"> : </span><span>{{$header->b_field2}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}dynamicfield1_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield2_label_style[0]}; font-style:${batchstaticfield2_label_style[1]}; text-decoration:${batchstaticfield2_label_style[2]}; text-align:${batchstaticfield2_label_style[3]}; font-size:${batchstaticfield2_label_style[4]}; font-family:${batchstaticfield2_label_style[5]}; position:absolute; top:${batchstaticfield2_pos[0]}; left:${batchstaticfield2_pos[1]}; height:${batchstaticfield2_pos[2]}; width:${batchstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield1" style="width:${batchstaticfield2_pos[4]}; text-decoration:${batchstaticfield2_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="dynamicfield1">  {{$header->b_field2}} </span>  </span>`
                );
        }
        }

        if (batchstaticfield3_labelposition != null && batchstaticfield3_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (batchstaticfield3_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}dynamicfield2_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield3_label_style[0]}; font-style:${batchstaticfield3_label_style[1]}; text-decoration:${batchstaticfield3_label_style[2]}; text-align:${batchstaticfield3_label_style[3]}; font-size:${batchstaticfield3_label_style[4]}; font-family:${batchstaticfield3_label_style[5]}; position:absolute; top:${batchstaticfield3_pos[0]}; left:${batchstaticfield3_pos[1]}; height:${batchstaticfield3_pos[2]}; width:${batchstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield2" style="width:${batchstaticfield3_pos[4]}; text-decoration:${batchstaticfield3_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->b_static_field3}} </span><span class="delimiter"> : </span><span>{{$header->b_field3}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}dynamicfield2_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield3_label_style[0]}; font-style:${batchstaticfield3_label_style[1]}; text-decoration:${batchstaticfield3_label_style[2]}; text-align:${batchstaticfield3_label_style[3]}; font-size:${batchstaticfield3_label_style[4]}; font-family:${batchstaticfield3_label_style[5]}; position:absolute; top:${batchstaticfield3_pos[0]}; left:${batchstaticfield3_pos[1]}; height:${batchstaticfield3_pos[2]}; width:${batchstaticfield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}dynamicfield2" style="width:${batchstaticfield3_pos[4]}; text-decoration:${batchstaticfield3_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="dynamicfield2">  {{$header->b_field3}} </span>  </span>`
                );
        }
        }

        if (batchstaticfield4_labelposition != null && batchstaticfield4_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (batchstaticfield4_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}globalstaticfield1_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield4_label_style[0]}; font-style:${batchstaticfield4_label_style[1]}; text-decoration:${batchstaticfield4_label_style[2]}; text-align:${batchstaticfield4_label_style[3]}; font-size:${batchstaticfield4_label_style[4]}; font-family:${batchstaticfield4_label_style[5]}; position:absolute; top:${batchstaticfield4_pos[0]}; left:${batchstaticfield4_pos[1]}; height:${batchstaticfield4_pos[2]}; width:${batchstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield1" style="width:${batchstaticfield4_pos[4]}; text-decoration:${batchstaticfield4_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->b_static_field4}} </span><span class="delimiter"> : </span><span>{{$header->b_field4}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}globalstaticfield1_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield4_label_style[0]}; font-style:${batchstaticfield4_label_style[1]}; text-decoration:${batchstaticfield4_label_style[2]}; text-align:${batchstaticfield4_label_style[3]}; font-size:${batchstaticfield4_label_style[4]}; font-family:${batchstaticfield4_label_style[5]}; position:absolute; top:${batchstaticfield4_pos[0]}; left:${batchstaticfield4_pos[1]}; height:${batchstaticfield4_pos[2]}; width:${batchstaticfield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield1" style="width:${batchstaticfield4_pos[4]}; text-decoration:${batchstaticfield4_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="globalstaticfield1">  {{$header->b_field4}} </span>  </span>`
                );
        }
        }

        if (batchstaticfield5_labelposition != null && batchstaticfield5_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (batchstaticfield5_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}globalstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield5_label_style[0]}; font-style:${batchstaticfield5_label_style[1]}; text-decoration:${batchstaticfield5_label_style[2]}; text-align:${batchstaticfield5_label_style[3]}; font-size:${batchstaticfield5_label_style[4]}; font-family:${batchstaticfield5_label_style[5]}; position:absolute; top:${batchstaticfield5_pos[0]}; left:${batchstaticfield5_pos[1]}; height:${batchstaticfield5_pos[2]}; width:${batchstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield2" style="width:${batchstaticfield5_pos[4]}; text-decoration:${batchstaticfield5_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->b_static_field5}} </span><span class="delimiter"> : </span><span>{{$header->b_field5}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}globalstaticfield2_label" class="textnonstore ui-state-default"  style='font-weight:${batchstaticfield5_label_style[0]}; font-style:${batchstaticfield5_label_style[1]}; text-decoration:${batchstaticfield5_label_style[2]}; text-align:${batchstaticfield5_label_style[3]}; font-size:${batchstaticfield5_label_style[4]}; font-family:${batchstaticfield5_label_style[5]}; position:absolute; top:${batchstaticfield5_pos[0]}; left:${batchstaticfield5_pos[1]}; height:${batchstaticfield5_pos[2]}; width:${batchstaticfield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}globalstaticfield2" style="width:${batchstaticfield5_pos[4]}; text-decoration:${batchstaticfield5_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="globalstaticfield2">  {{$header->b_field5}} </span>  </span>`
                );
        }
        }

        if (netweight_labelposition != null && netweight_labelposition != '0px_0px_0px_0px_0px') {
            if (netweight_label_style[6] === 'on') {
            output +=
                `<span id="${currLabelName}Netweight_label" class="textnonstore ui-state-default" style='font-weight:${netweight_label_style[0]}; font-style: ${netweight_label_style[1]}; text-decoration: ${netweight_label_style[2]}; text-align: ${netweight_label_style[3]}; font-size:${netweight_label_style[4]}; font-family:${netweight_label_style[5]}; position:absolute; top: ${netweight_pos[0]}; left:${netweight_pos[1]}; height:${netweight_pos[2]}; width:${netweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Netweight" style="width: ${netweight_pos[4]}; text-decoration: ${netweight_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->net_weight}}</span><span class="delimiter"> : </span> <span id="netWeightPlaceholder">${netWeight ?? 'NA'} </span></span>`;
        } else {
            output += (
                `<span id="${currLabelName}netweight_label" class="textnonstore ui-state-default" style='font-weight:${netweight_label_style[0]}; font-style: ${netweight_label_style[1]}; text-decoration: ${netweight_label_style[2]}; text-align: ${netweight_label_style[3]}; font-size:${netweight_label_style[4]}; font-family:${netweight_label_style[5]}; position:absolute; top: ${netweight_pos[0]}; left:${netweight_pos[1]}; height:${netweight_pos[2]}; width:${netweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}netweight" style="width: ${netweight_pos[4]}; text-decoration: ${netweight_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="decimalnetwt">${netWeight ?? 'NA'}  </span></span>`
                );
            }
        }

        if (grossweight_labelposition != null && grossweight_labelposition != '0px_0px_0px_0px_0px') {
            if (grossweight_label_style[6] === 'on') {
                output += (`<span id="${currLabelName}GrossWeight_label" class="textnonstore ui-state-default  " style='font-weight:${grossweight_label_style[0]}; font-style: ${grossweight_label_style[1]}; text-decoration: ${grossweight_label_style[2]}; text-align: ${grossweight_label_style[3]}; font-size:${grossweight_label_style[4]}; font-family:${grossweight_label_style[5]};position:absolute; top:${grossweight_pos[0]}; left:${grossweight_pos[1]}; height:${grossweight_pos[2]}; width: ${grossweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}GrossWeight" style="width: ${grossweight_pos[4]}; text-decoration: ${grossweight_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->gross_weight}}</span><span class="delimiter"> : </span><span class="decimalgrosswt">${grossWeight ?? 'NA'}</span></span>`);
            }else{
                output += (`<span id="${currLabelName}GrossWeight_label" class="textnonstore ui-state-default  " style='font-weight:${grossweight_label_style[0]}; font-style: ${grossweight_label_style[1]}; text-decoration: ${grossweight_label_style[2]}; text-align: ${grossweight_label_style[3]}; font-size:${grossweight_label_style[4]}; font-family:${grossweight_label_style[5]};position:absolute; top:${grossweight_pos[0]}; left:${grossweight_pos[1]}; height:${grossweight_pos[2]}; width: ${grossweight_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}GrossWeight" style="width: ${grossweight_pos[4]}; text-decoration: ${grossweight_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="decimalgrosswt">  ${grossWeight ?? 'NA'} </span> </span>`);
            }
        }

        if (tareweight_labelposition != null && tareweight_labelposition != '0px_0px_0px_0px_0px') {
            if (tareweight_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}tareWeight_label" class="textnonstore ui-state-default" style='font-weight:${tareweight_label_style[0]}; font-style:${tareweight_label_style[1]}; text-decoration: ${tareweight_label_style[2]}; text-align: ${tareweight_label_style[3]}; font-size: ${tareweight_label_style[4]}; font-family:${tareweight_label_style[5]};position:absolute; top:${tareweight_pos[0]}; left:${tareweight_pos[1]}; height:${tareweight_pos[2]}; width: ${tareweight_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}tareWeight" style="width: ${tareweight_pos[4]}; text-decoration: ${tareweight_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->tare_weight}}</span><span class="delimiter"> : </span><span>${tareWeight ?? 'NA'}</span> </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}tareWeight_label" class="textnonstore ui-state-default" style='font-weight:${tareweight_label_style[0]}; font-style:${tareweight_label_style[1]}; text-decoration: ${tareweight_label_style[2]}; text-align: ${tareweight_label_style[3]}; font-size: ${tareweight_label_style[4]}; font-family:${tareweight_label_style[5]};position:absolute; top:${tareweight_pos[0]}; left:${tareweight_pos[1]}; height:${tareweight_pos[2]}; width: ${tareweight_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}tareWeight" style="width: ${tareweight_pos[4]}; text-decoration: ${tareweight_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="decimaltarewt"> ${tareWeight ?? 'NA'} </span> </span>`
                );
        }
        }
        if (containerno_labelposition != null && containerno_labelposition != '0px_0px_0px_0px_0px') {
            if (containerno_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}containerno_label" class="textnonstore ui-state-default" style='font-weight:${containerno_label_style[0]}; font-style:${containerno_label_style[1]}; text-decoration:${containerno_label_style[2]}; text-align:${containerno_label_style[3]}; font-size: ${containerno_label_style[4]}; font-family:${containerno_label_style[5]}; position:absolute; top:${containerno_pos[0]}; left:${containerno_pos[1]}; height:${containerno_pos[2]}; width:${containerno_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}containerno" style="width: ${containerno_pos[4]}; text-decoration:${containerno_label_style[2]}; white-space: nowrap; display:inline-block"> {{ $config_data->container_no }}</span><span class="delimiter"> : </span><span> ${container_no}</span></span>`
            );
        } else {
            output += (
                `<span id="${currLabelName}containerno_label" class="textnonstore ui-state-default" style='font-weight:${containerno_label_style[0]}; font-style:${containerno_label_style[1]}; text-decoration:${containerno_label_style[2]}; text-align:${containerno_label_style[3]}; font-size: ${containerno_label_style[4]}; font-family:${containerno_label_style[5]}; position:absolute; top:${containerno_pos[0]}; left:${containerno_pos[1]}; height:${containerno_pos[2]}; width:${containerno_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}containerno" style="width: ${containerno_pos[4]}; text-decoration:${containerno_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="containerno"> ${container_no} </span></span>`
            );
        }
        }


        if (dynamicfield1_labelposition != null && dynamicfield1_labelposition != '0px_0px_0px_0px_0px') {
            if (dynamicfield1_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}DateofMFG_label" class="textnonstore ui-state-default" style='font-weight:${dynamicfield1_label_style[0]}; font-style:${dynamicfield1_label_style[1]}; text-decoration:${dynamicfield1_label_style[2]}; text-align:${dynamicfield1_label_style[3]}; font-size: ${dynamicfield1_label_style[4]}; font-family:${dynamicfield1_label_style[5]}; position:absolute; top:${dynamicfield1_pos[0]}; left:${dynamicfield1_pos[1]}; height:${dynamicfield1_pos[2]}; width:${dynamicfield1_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}DateofMFG" style="width: ${dynamicfield1_pos[4]}; text-decoration:${dynamicfield1_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->dynamic_field1}}</span><span class="delimiter"> : </span><span>${dynamic1 ?? 'NA'}</span></span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}DateofMFG_label" class="textnonstore ui-state-default" style='font-weight:${dynamicfield1_label_style[0]}; font-style:${dynamicfield1_label_style[1]}; text-decoration:${dynamicfield1_label_style[2]}; text-align:${dynamicfield1_label_style[3]}; font-size: ${dynamicfield1_label_style[4]}; font-family:${dynamicfield1_label_style[5]}; position:absolute; top:${dynamicfield1_pos[0]}; left:${dynamicfield1_pos[1]}; height:${dynamicfield1_pos[2]}; width:${dynamicfield1_pos[3]}'><span class="${currLabelName}fieldname" id="${currLabelName}DateofMFG" style="width: ${dynamicfield1_pos[4]}; text-decoration:${dynamicfield1_label_style[2]}; white-space: nowrap; display:inline-block"> </span><span class="dateofmfg">${dynamic1 ?? 'NA'}</span></span>`
                );
        }
        }

        if (dynamicfield2_labelposition != null && dynamicfield2_labelposition != '0px_0px_0px_0px_0px') {
            if (dynamicfield2_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}DateofExp_label" class="textnonstore ui-state-default"  style='font-weight:${dynamicfield2_label_style[0]}; font-style:${dynamicfield2_label_style[1]}; text-decoration:${dynamicfield2_label_style[2]}; text-align:${dynamicfield2_label_style[3]}; font-size:${dynamicfield2_label_style[4]}; font-family:${dynamicfield2_label_style[5]}; position:absolute; top:${dynamicfield2_pos[0]}; left: ${dynamicfield2_pos[1]}; height:${dynamicfield2_pos[2]}; width:${dynamicfield2_pos[3]};'> <span class="${currLabelName}fieldname" id="${currLabelName}DateofExp" style="width: ${dynamicfield2_pos[4]}; text-decoration:${dynamicfield2_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->dynamic_field2}}</span><span class="delimiter"> : </span><span>${dynamic2 ?? 'NA'}  </span> </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}DateofExp_label" class="textnonstore ui-state-default"  style='font-weight:${dynamicfield2_label_style[0]}; font-style:${dynamicfield2_label_style[1]}; text-decoration:${dynamicfield2_label_style[2]}; text-align:${dynamicfield2_label_style[3]}; font-size:${dynamicfield2_label_style[4]}; font-family:${dynamicfield2_label_style[5]}; position:absolute; top:${dynamicfield2_pos[0]}; left: ${dynamicfield2_pos[1]}; height:${dynamicfield2_pos[2]}; width:${dynamicfield2_pos[3]};'> <span class="${currLabelName}fieldname" id="${currLabelName}DateofExp" style="width: ${dynamicfield2_pos[4]}; text-decoration:${dynamicfield2_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="dateofexpiry">${dynamic2 ?? 'NA'} </span> </span>`
                );
        }
        }

        if (globalstaticfield1_labelposition != null && globalstaticfield1_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (globalstaticfield1_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}DateofRetest_label" class="textnonstore ui-state-default" style='font-weight:${globalstaticfield1_label_style[0]}; font-style:${globalstaticfield1_label_style[1]}; text-decoration:${globalstaticfield1_label_style[2]}; text-align:${globalstaticfield1_label_style[3]}; font-size:${globalstaticfield1_label_style[4]}; font-family:${globalstaticfield1_label_style[5]}; position:absolute; top:${globalstaticfield1_pos[0]}; left:${globalstaticfield1_pos[1]}; height:${globalstaticfield1_pos[2]}; width:${globalstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}DateofRetest" style="width: ${globalstaticfield1_pos[4]}; text-decoration:${globalstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->global_static_field1}}</span><span class="delimiter"> : </span><span>{{$config_data->global_fieldname1}}  </span></span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}DateofRetest_label" class="textnonstore ui-state-default" style='font-weight:${globalstaticfield1_label_style[0]}; font-style:${globalstaticfield1_label_style[1]}; text-decoration:${globalstaticfield1_label_style[2]}; text-align:${globalstaticfield1_label_style[3]}; font-size:${globalstaticfield1_label_style[4]}; font-family:${globalstaticfield1_label_style[5]}; position:absolute; top:${globalstaticfield1_pos[0]}; left:${globalstaticfield1_pos[1]}; height:${globalstaticfield1_pos[2]}; width:${globalstaticfield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}DateofRetest" style="width: ${globalstaticfield1_pos[4]}; text-decoration:${globalstaticfield1_label_style[2]}; white-space: nowrap; display:inline-block"></span><span class="dateofretest">  {{$config_data->global_fieldname1}} </span></span>`
                );
        }
        }

        // if(Adlfield_labelposition!=null && Adlfield_labelposition!='0px_0px_0px_0px_0px')
        // {
        //     if (style.Adlfieldfn === 'on') {
        //         output += (`<span id="${currLabelName}Adlfield_label" class="textnonstore ui-state-default"  style='font-weight:${Adlfield_label_style[0]}; font-style:${Adlfield_label_style[1]}; text-decoration:${Adlfield_label_style[2]}; text-align:${Adlfield_label_style[3]}; font-size:${Adlfield_label_style[4]}; font-family:${Adlfield_label_style[5]}; position:absolute; top:${adlfield_pos[0]}; left:${adlfield_pos[1]}; height:${adlfield_pos[2]}; width:${adlfield_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Adlfield" style="width:${adlfield_pos[4]}; text-decoration:${Adlfield_label_style[2]}; white-space: nowrap; display:inline-block">{{$config_data->container_no}}</span> <span class="containercount"> <span class="delimiter"> :  </span> XXX </span></span>`);
        //     }
        //     else{
        //         output += (`<span id="${currLabelName}Adlfield_label" class="textnonstore ui-state-default"  style='font-weight:${Adlfield_label_style[0]}; font-style:${Adlfield_label_style[1]}; text-decoration:${Adlfield_label_style[2]}; text-align:${Adlfield_label_style[3]}; font-size:${Adlfield_label_style[4]}; font-family:${Adlfield_label_style[5]}; position:absolute; top:${adlfield_pos[0]}; left:${adlfield_pos[1]}; height:${adlfield_pos[2]}; width:${adlfield_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Adlfield" style="width:${adlfield_pos[4]}; text-decoration:${Adlfield_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="containercount">  XXX </span></span>`);

        //     }
        // }
        if (globalstaticfield2_labelposition != null && globalstaticfield2_labelposition !=
            '0px_0px_0px_0px_0px') {
                if (globalstaticfield2_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}staticfield_label" class="textnonstore ui-state-default"  style='font-weight:${globalstaticfield2_label_style[0]}; font-style:${globalstaticfield2_label_style[1]}; text-decoration:${globalstaticfield2_label_style[2]}; text-align:${globalstaticfield2_label_style[3]}; font-size:${globalstaticfield2_label_style[4]}; font-family:${globalstaticfield2_label_style[5]}; position:absolute; top:${globalstaticfield2_pos[0]}; left:${globalstaticfield2_pos[1]}; height:${globalstaticfield2_pos[2]}; width:${globalstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield" style="width:${globalstaticfield2_pos[4]}; text-decoration:${globalstaticfield2_label_style[2]}; white-space: nowrap; display:inline-block"> {{$config_data->global_static_field2}} </span><span class="delimiter"> : </span><span>{{$config_data->global_fieldname2}}</span></span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}staticfield_label" class="textnonstore ui-state-default"  style='font-weight:${globalstaticfield2_label_style[0]}; font-style:${globalstaticfield2_label_style[1]}; text-decoration:${globalstaticfield2_label_style[2]}; text-align:${globalstaticfield2_label_style[3]}; font-size:${globalstaticfield2_label_style[4]}; font-family:${globalstaticfield2_label_style[5]}; position:absolute; top:${globalstaticfield2_pos[0]}; left:${globalstaticfield2_pos[1]}; height:${globalstaticfield2_pos[2]}; width:${globalstaticfield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}staticfield" style="width:${globalstaticfield2_pos[4]}; text-decoration:${globalstaticfield2_label_style[2]}; white-space: nowrap; display:inline-block">  </span> <span class="staticfield">  {{$config_data->global_fieldname2}} </span>  </span>`
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
                `<span id="${currLabelName}Freefield1_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="width:${Freefield1_pos[4]}; text-decoration:${Freefield1_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield1_label_value}</span><span class="delimiter"> : </span><span>{{$header->freefield1}} </span> </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield1_label_style[0]}; font-style:${Freefield1_label_style[1]}; text-decoration:${Freefield1_label_style[2]}; text-align:${Freefield1_label_style[3]}; font-size:${Freefield1_label_style[4]}; font-family:${Freefield1_label_style[5]}; position:absolute; top:${Freefield1_pos[0]}; left:${Freefield1_pos[1]}; height:${Freefield1_pos[2]}; width:${Freefield1_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield2" style="width:${Freefield1_pos[4]}; text-decoration:${Freefield1_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield2">  {{$header->freefield1}} </span> </span>`
                );
        }
        }

        if (Freefield2_labelposition != null && Freefield2_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield2_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield2_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width:${Freefield2_pos[4]}; text-decoration:${Freefield2_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield2_label_value}</span><span class="delimiter"> : </span><span> {{$header->freefield2}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield2_label_style[0]}; font-style:${Freefield2_label_style[1]}; text-decoration:${Freefield2_label_style[2]}; text-align:${Freefield2_label_style[3]}; font-size:${Freefield2_label_style[4]}; font-family:${Freefield2_label_style[5]}; position:absolute; top:${Freefield2_pos[0]}; left:${Freefield2_pos[1]}; height:${Freefield2_pos[2]}; width:${Freefield2_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield3" style="width:${Freefield2_pos[4]}; text-decoration:${Freefield2_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield3">  {{$header->freefield2}}  </span>  </span>`
                );
        }
        }

        if (Freefield3_labelposition != null && Freefield3_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield3_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield3_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield5" style="width: ${Freefield3_pos[4]}; text-decoration:${Freefield3_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield3_label_value}</span><span class="delimiter"> : </span><span> {{$header->freefield3}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield3_label_style[0]}; font-style:${Freefield3_label_style[1]}; text-decoration:${Freefield3_label_style[2]}; text-align:${Freefield3_label_style[3]}; font-size:${Freefield3_label_style[4]}; font-family:${Freefield3_label_style[5]}; position:absolute; top:${Freefield3_pos[0]}; left:${Freefield3_pos[1]}; height:${Freefield3_pos[2]}; width:${Freefield3_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield5" style="width: ${Freefield3_pos[4]}; text-decoration:${Freefield3_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield5">  {{$header->freefield3}} </span>  </span>`
                );
        }
        }

        if (Freefield4_labelposition != null && Freefield4_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield4_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="width: ${Freefield4_pos[4]}; text-decoration:${Freefield4_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield4_label_value}</span><span class="delimiter"> : </span><span> {{$header->freefield4}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield4_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield4_label_style[0]}; font-style:${Freefield4_label_style[1]}; text-decoration:${Freefield4_label_style[2]}; text-align:${Freefield4_label_style[3]}; font-size:${Freefield4_label_style[4]}; font-family:${Freefield4_label_style[5]}; position:absolute; top:${Freefield4_pos[0]}; left:${Freefield4_pos[1]}; height:${Freefield4_pos[2]}; width:${Freefield4_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield4" style="width: ${Freefield4_pos[4]}; text-decoration:${Freefield4_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield4">  {{$header->freefield4}} </span>  </span>`
                );
        }
        }

        if (Freefield5_labelposition != null && Freefield5_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield5_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield5_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield5_pos[4]}; text-decoration:${Freefield5_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield5_label_value}</span><span class="delimiter"> : </span><span> {{$header->freefield5}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield5_label_style[0]}; font-style:${Freefield5_label_style[1]}; text-decoration:${Freefield5_label_style[2]}; text-align:${Freefield5_label_style[3]}; font-size:${Freefield5_label_style[4]}; font-family:${Freefield5_label_style[5]}; position:absolute; top:${Freefield5_pos[0]}; left:${Freefield5_pos[1]}; height:${Freefield5_pos[2]}; width:${Freefield5_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield5_pos[4]}; text-decoration:${Freefield5_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield6">  {{$header->freefield5}} </span>  </span>`
                );
        }
        }
        if (Freefield6_labelposition != null && Freefield6_labelposition != '0px_0px_0px_0px_0px') {
            if (Freefield6_label_style[6] === 'on') {
            output += (
                `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; white-space: nowrap; display:inline-block"> ${Freefield6_label_value}</span><span class="delimiter"> : </span><span> {{$header->freefield6}} </span>  </span>`
                );
        } else {
            output += (
                `<span id="${currLabelName}Freefield6_label" class="textnonstore ui-state-default"  style='font-weight:${Freefield6_label_style[0]}; font-style:${Freefield6_label_style[1]}; text-decoration:${Freefield6_label_style[2]}; text-align:${Freefield6_label_style[3]}; font-size:${Freefield6_label_style[4]}; font-family:${Freefield6_label_style[5]}; position:absolute; top:${Freefield6_pos[0]}; left:${Freefield6_pos[1]}; height:${Freefield6_pos[2]}; width:${Freefield6_pos[3]}'> <span class="${currLabelName}fieldname" id="${currLabelName}Freefield6" style="width: ${Freefield6_pos[4]}; text-decoration:${Freefield6_label_style[2]}; white-space: nowrap; display:inline-block"></span> <span class="Freefield6">  {{$header->freefield6}} </span>  </span>`
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

        if(serial != null){
        serial++;
        serial = String(serial).padStart(num_length,'0');
        }
    }


    var num = parseInt(label.code_size);
    $('#content').append(output);

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
