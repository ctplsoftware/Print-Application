@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<!-- hii -->
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
    <h2 class="headingfont-bold">Product master</h2>



<form action="/productmaster/store" method="POST">
    @csrf
    <div class="headingfont form-row " style="padding-bottom:20px;padding-top:40px;">

        <div class="form-group col-md-6">
            <label>Product name</label><span style="color:red;"> <b>*</b> <span>
                    <input type="text" maxlength="100" placeholder="Enter Product Name" name="field1"
                        class="required withborder validate existvalidate form-control-sm form-control"
                        style="border: 0px 0px 2px 0px #000" id="product_name" autocomplete="off" autofocus required />
        </div>

        <div class="form-group col-md-3" style="">
            <label>product ID</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field2" id="product_id"
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
    </div>

    <div class="headingfont form-row ">
        <div class="form-group col-md-3" style="">
            <label>Static Field 1</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field3" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Static Field 2</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field4" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Static Field 3</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field5" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Static Field 4</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field6" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
    </div>
    <div class="headingfont form-row ">
        <div class="form-group col-md-3" style="">
            <label>Static Field 5</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field7" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Static Field 6</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field8" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Static Field 7</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field9" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Static Field 8</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field10" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
    </div>
    <div class="headingfont form-row ">
        <div class="form-group col-md-3" style="">
            <label>Static Field 9</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field11" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Static Field 10</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field12" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Global Field</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="field13" id=""
                        class="required validate form-control form-control-sm" autocomplete="off" required />

        </div>
        <div class="form-group col-md-3" style="">
            <label>Status</label><span style="color:red;"> <b>*</b> <span>
                    <select name="status"  id="status" class=" form-control validate required form-control-sm">
                        <option value="" selected disabled>-Select-</option>

                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>


                    </select>
        </div>

    </div>
    <div class="headingfont form-row ">
        <div class="form-group col-md-3" style="">
            <label>Comments</label><span style="color:red;"> <b>*</b> <span>
                    <input type="varchar" maxlength="100" name="" id=""
                        class="  validate form-control form-control-sm" autocomplete="off"  />

        </div>
    </div>

</div>
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">

    <input type="submit" class="btn btn-primary" style="float:right;" id="submit_user" value="Request">

    <a href="/fetch" class="btn btn-secondary" style="float:left; color:#fff !important">Back</a>
</div>
</form>
<style>
body {
    zoom: 80% !important;
}

.form-control {
    border: 1px solid #899097 !important;
}

.form-row {
    padding-bottom: 10px !important;
}
</style>
@endsection
