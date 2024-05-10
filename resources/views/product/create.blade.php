@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
    <h2 class="headingfont-bold"></h2>
    <form action="{{route('productmaster.store')}}" method="POST" enctype="multipart/form-data" id="productCreate">
    <!-- @if(session()->has('msg'))
    <div class="alert alert-danger">
        {{ session()->get('msg') }}
        <input type="hidden" name="" id="message1" value="{{session()->get('msg')}}">
    </div>
    @endif -->

@if(session()->has('msg'))
<input type="hidden" name="" id="message" value="{{session()->get('msg')}}">
<script>
$(document).ready(function() {
    if ($('#message').val() == 'Product created successfully') {
        console.log('check');
        Swal.fire({
                        html: 'product created successfully',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',

                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User created successfully');

    }
  else  if ($('#message').val() == 'Product with the same name and a different ID already exists') {
        console.log('check');
        Swal.fire({
                        html: 'Product with the same name and a different ID already exists',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',

                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    })
        // alert('User created successfully');

    }

});
</script>
@endif
        @csrf
        <div class="headingfont form-row " style="padding-bottom:20px;padding-top:40px;">
            <div class="form-group col-md-5 {{$config['product_name_use'] == 'off' ? '' : 'hideField'}}">
                <label>{{$config['product_name']}}
                    @if($config['product_name_mandatory'] == 'off')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="product_name" id="product_name"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['product_name_mandatory'] == 'off' ? 'required' : ''}} />

            </div>
            <div class="form-group col-md-3 {{$config['product_id_use'] == 'off' ? '' : 'hideField'}}">
            <label>{{$config['product_id']}}
                @if($config['product_id_mandatory'] == 'off')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
            </label>
            <input type="number" maxlength="16" name="product_id" id="product_id"
                class="required validate form-control form-control-sm" autocomplete="off"  pattern="\d*"
                {{$config['product_id_mandatory'] == 'off' ? 'required' : ''}}
                 />
        </div>
        @if($config['serialization'] == 'user-input' && $config['product'] == 'on')
        <div id="serial" class="form-group col-md-2">
             <label>{{ 'Serial' }} </label>
            <select class="form-control validate required form-control-sm" name="serial" id="serial" required>
                <option value="">-SELECT-</option>
                <option value="none">None</option>
                <option value="prefix">Prefix</option>
                <option value="suffix">Suffix</option>
                <option value="both">Both</option>
            </select>
        </div>
        @endif
        @if($config['serialization'] == 'user-input' && $config['product'] == 'on')
        <div id="increment_decrement" class="form-group col-md-2">
            <label>{{ 'Increment/decrement' }} </label>
            <select class="form-control validate required form-control-sm" name="increment_decrement" id="increment_decrement" required>
                <option value="">-SELECT-</option>
                <option value="increment">Increment</option>
                <option value="decrement">Decrement</option>
            </select>
        </div>
        @endif
        </div>
        <div class="headingfont form-row ">
            <div class="form-group col-md-3 {{$config['p_field1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field1']}}
                    @if($config['p_field1_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field1" id="static_field1"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field1_mandatory'] == 'on' ? 'required' : ''}} />

            </div>
            <div class="form-group col-md-3 {{$config['p_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field2']}}
                    @if($config['p_field2_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field2" id="static_field2"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field2_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field3_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field3']}}
                    @if($config['p_field3_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field3" id="static_field3"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field3_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field4_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field4']}}
                    @if($config['p_field4_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field4" id="static_field4"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field4_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field5_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field5']}}
                    @if($config['p_field5_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field5" id="static_field5"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field5_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field6_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field6']}}
                    @if($config['p_field6_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field6" id="static_field6"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field6_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field7_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field7']}}
                    @if($config['p_field7_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field7" id="static_field7"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field7_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field8_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field8']}}
                    @if($config['p_field8_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field8" id="static_field8"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field8_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field9_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field9']}}
                    @if($config['p_field9_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field9" id="static_field9"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field9_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field10_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field10']}}
                    @if($config['p_field10_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="static_field10" id="static_field10"
                    class="required validate form-control form-control-sm" autocomplete="off"
                    {{$config['p_field10_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['g_field1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{ $config->global_fieldname1 }}
                    @if($config['g_field1_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="global_field1" id="global_field1"
                    class="required validate form-control form-control-sm" autocomplete="off" value="{{ $config->global_static_field1 }}"
                    {{$config['g_field1_mandatory'] == 'on' ? 'required' : ''}} readonly/>
            </div>
            <div class="form-group col-md-3 {{$config['g_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{ $config->global_fieldname2 }}
                    @if($config['g_field2_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="255" name="global_field2" id="global_field2"
                    class="required validate form-control form-control-sm" autocomplete="off" value="{{ $config->global_static_field2 }}"
                    {{$config['g_field2_mandatory'] == 'on' ? 'required' : ''}} readonly/>
            </div>
            <div class="form-group col-md-3 {{$config['p_image1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_image_field1']}}
                    @if($config['p_image1_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="file" maxlength="100" name="product_image1" id="image1" class="required validate file  "
                    autocomplete="off" {{$config['p_image1_mandatory'] == 'on' ? 'required' : ''}} />
                <img id="thumbnail-image1" src="{{ asset('images/no-image.png') }}" alt="Thumbnail"
                    style="width:100px;height:100px" />
            </div>
            <div class="form-group col-md-3 {{$config['p_image2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_image_field2']}}
                    @if($config['p_image2_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="file" maxlength="100" name="product_image2" id="image2" class="required validate file "
                    autocomplete="off" {{$config['p_image2_mandatory'] == 'on' ? 'required' : ''}} />
                <img id="thumbnail-image2" src="{{ asset('images/no-image.png') }}" alt="Thumbnail"
                    style="width:100px;height:100px" />
            </div>
            <div class="form-group col-md-3" style="">
                <label>Status</label><span style="color:red;">
                    <select name="status" id="status" class=" form-control validate required form-control-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
            </div>
            <div class="form-group col-md-3 {{$config['comments_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['comments']}}
                    @if($config['comments_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="text" maxlength="255" name="comments" id="p_image2"
                    class="required validate form-control form-control-sm " autocomplete="off"
                    {{$config['comments_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
        </div>
</div>
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
    <input type="submit" class="btn btn-primary" style="float:right;" id="submit_user" value="Submit">
    <a href="/productmaster/index" class="btn btn-secondary" style="float:left; color:#fff !important">Back</a>
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

.hideField {
    display: none;
}
</style>
<script>
    function validateIntegerInput(inputId) {
    // Get the input element by ID
    var input = document.getElementById(inputId);

    // Remove non-numeric characters using a regular expression
    input.value = input.value.replace(/\D/g, '');
   }
$(document).ready(function() {
    $("#printapplication").html("Print Application - Product Create");

    function validateInput(inputElement) {
    // Remove any non-numeric characters from the input value
    inputElement.value = inputElement.value.replace(/[^0-9]/g, '');

    // You can show an alert if needed
    if (inputElement.value !== '') {
        alert('Please enter only integers.');
    }
    }

    function validateIntegerInput(inputId) {
    // Get the input element by ID
    var input = document.getElementById(inputId);

    // Remove non-numeric characters using a regular expression
    input.value = input.value.replace(/\D/g, '');
   }
    // $('#productCreate').submit(function(e)){

    // }
    // $('.file').change(function() {
    //     const inputId = $(this).attr('id');
    //     const thumbnailId = `thumbnail-${inputId}`;
    //     const file = this.files[0];
    //     const allowedExtensions = ['jpeg', 'jpg', 'png'];
    //     const maxFileSize = 1024 * 1024; // 1MB

    //     if (file) {
    //         const fileNameParts = file.name.split('.');
    //         const fileExtension = fileNameParts[fileNameParts.length - 1].toLowerCase();

    //         if (file.size > maxFileSize) {
    //             alert('File size exceeds 1MB limit.');
    //             $(this).val('');
    //             $(`#${thumbnailId}`).attr('src', '{{ asset('
    //                 images / no - image.png ') }}'); // Reset to the dummy image
    //         } else if (!allowedExtensions.includes(fileExtension)) {
    //             alert('Unsupported file format. Only JPG, JPEG, and PNG are allowed.');
    //             $(this).val('');
    //             $(`#${thumbnailId}`).attr('src', '{{ asset('
    //                 images / no - image.png ') }}'); // Reset to the dummy image
    //         } else {
    //             const reader = new FileReader();
    //             reader.onload = function() {
    //                 $(`#${thumbnailId}`).attr('src', reader.result);
    //             };
    //             reader.readAsDataURL(file);
    //         }
    //     } else {
    //         // Reset to the dummy image if no file is selected
    //         $(`#${thumbnailId}`).attr('src', '{{ asset('
    //             images / no - image.png ') }}');
    //     }
    // });
    $('.alert').fadeOut(5000);
    // $('#product_name').change(function(){
    //    const productName = $('#product_name').val();
    //    console.log(productName);
    //    $.ajax({
    //         url: "{{ url('/productNameChange') }}",
    //         type: "GET",
    //         data: {
    //             productName: productName,
    //         },
    //         success: function(result) {
    //             if (result.exists) {
    //                 alert(result.message); // Display the message from the response
    //                 $('#product_name').val('').focus();
    //             } else {

    //             }
    //         }
    //     });

    // });
    // $('#product_id').change(function() {
    //     const productId = $('#product_id').val();
    //     const productName = $('#product_name').val();

    //     $.ajax({
    //         url: "{{ url('/productIdChange') }}",
    //         type: "GET",
    //         data: {
    //             productId: productId,
    //             productName: productName,
    //         },
    //         success: function(result) {
    //             console.log('Response:', result); // Log the entire response object

    //             if (result.exists) {
    //                 console.log('Product exists:', result.message);
    //                 alert(result.message);
    //                 $('#product_id').val('').focus();
    //             } else {
    //                 $('#product_id').val(productId);
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Error:', error);
    //             // Handle the error if there is an issue with the AJAX request
    //         }
    //     });
    // });


});
</script>
@endsection
