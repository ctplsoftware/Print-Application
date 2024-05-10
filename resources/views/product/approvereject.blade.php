@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
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
    <h2 class="headingfont-bold">Product master</h2>
    <form action="" method="get" enctype="multipart/form-data" id="formABC">
        @csrf
        @method('post')
        <input type="hidden" value="{{$product_edit->id}}" name="id">
        <div class="headingfont form-row " style="padding-bottom:20px;padding-top:40px;">
            <div class="form-group col-md-6 {{$config['product_name_use'] == 'off' ? '' : 'hideField'}}">
                <label>{{$config['product_name']}}
                    @if($config['product_name_mandatory'] == 'off')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="product_name" id="product_name"
                    value="{{$product_edit->product_name}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['product_name_mandatory'] == 'off' ? 'required' : ''}} />

            </div>
            <div class="form-group col-md-3 {{$config['product_id_use'] == 'off' ? '' : 'hideField'}}">
                <label>{{$config['product_id']}}
                    @if($config['product_id_mandatory'] == 'off')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="product_id" id="product_id"
                    value="{{$product_edit->product_id}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['product_id_mandatory'] == 'off' ? 'required' : ''}} />
            </div>
        </div>
        <div class="headingfont form-row ">
            <div class="form-group col-md-3 {{$config['p_field1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field1']}}
                    @if($config['p_field1_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field1" id="static_field1"
                    value="{{$product_edit->static_field1}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field1_mandatory'] == 'on' ? 'required' : ''}} />

            </div>
            <div class="form-group col-md-3 {{$config['p_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field2']}}
                    @if($config['p_field2_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field2" id="static_field2"
                    value="{{$product_edit->static_field2}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field2_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field3_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field3']}}
                    @if($config['p_field3_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field3" id="static_field3"
                    value="{{$product_edit->static_field3}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field3_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field4_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field4']}}
                    @if($config['p_field4_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field4" id="static_field4"
                    value="{{$product_edit->static_field4}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field4_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field5_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field5']}}
                    @if($config['p_field5_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field5" id="static_field5"
                    value="{{$product_edit->static_field5}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field5_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field6_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field6']}}
                    @if($config['p_field6_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field6" id="static_field6"
                    value="{{$product_edit->static_field6}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field6_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field7_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field7']}}
                    @if($config['p_field7_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field7" id="static_field7"
                    value="{{$product_edit->static_field7}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field7_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field8_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field8']}}
                    @if($config['p_field8_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field8" id="static_field8"
                    value="{{$product_edit->static_field8}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field8_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field9_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field9']}}
                    @if($config['p_field9_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field9" id="static_field9"
                    value="{{$product_edit->static_field9}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field9_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field10_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field10']}}
                    @if($config['p_field10_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field10" id="static_field10"
                    value="{{$product_edit->static_field10}}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['p_field10_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['g_field1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{ $config->global_fieldname1 }}
                    @if($config['g_field1_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="global_field1" id="global_field1"
                    value="{{ $config->global_static_field1 }}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['g_field1_mandatory'] == 'on' ? 'required' : ''}} readonly />
            </div>
            <div class="form-group col-md-3 {{$config['g_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{ $config->global_fieldname2 }}
                    @if($config['g_field2_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="varchar" maxlength="100" name="global_field2" id="global_field2"
                    value="{{ $config->global_static_field2 }}" class="required validate form-control form-control-sm"
                    autocomplete="off" {{$config['g_field2_mandatory'] == 'on' ? 'required' : ''}} readonly />
            </div>
            <div class="form-group col-md-3 {{$config['p_image1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_image_field1']}}
                    @if($config['p_image1_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>

                @if($product_edit->product_image1 == "null")
                <input type="file" maxlength="100" name="product_image1" id="image1" class="required validate file  "
                    autocomplete="off" {{$config['p_image1_mandatory'] == 'on' ? 'required' : ''}} />
                <img id="thumbnail-image1" src="{{ asset('images/no-image.png') }}" alt=""
                    style="width:100px;height:100px" />
                @else
                <input type="file" class="file"  name="product_image1">
                <input type="text" hidden class="required validate file " id="image" name="product_image1"
                    value="{{ $product_edit->product_image1 ? $product_edit->product_image1  : '' }}"
                    {{$config['p_image1_mandatory'] == 'on' ? 'required' : ''}}>
                <img id="thumbnail-image1" src="{{ asset('storage/' . $product_edit->product_image1) }}" alt="Image"
                    style="width:100px;height:100px">
                @endif
            </div>
            <div class="form-group col-md-3 {{$config['p_image2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_image_field2']}}
                    @if($config['p_image2_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                @if($product_edit->product_image2 == "null")
                <input type="file" maxlength="100" name="product_image2" id="image2" class="required validate file "
                    autocomplete="off" value="{{ asset('images/no-image.png') }}"
                    {{$config['p_image2_mandatory'] == 'on' ? 'required' : ''}} />
                <img id="thumbnail-image2" src="{{ asset('images/no-image.png') }}" alt=""
                    style="width:100px;height:100px" />
                @else
                <input type="file" class="file"  name="product_image2">
                <input type="text" hidden class="required validate file " id="image1" name="product_image2"
                    value="{{ $product_edit->product_image2 ? $product_edit->product_image2  : '' }}"
                    {{$config['p_image2_mandatory'] == 'on' ? 'required' : ''}}>
                <img id="thumbnail-detail" src="{{ asset('storage/' . $product_edit->product_image2) }}" alt="Image"
                    style="width:100px;height:100px">
                @endif
            </div>
            <div class="form-group col-md-3" style="">
                <label>Status</label><span style="color:red;">
                    <select class="form-control validate required form-control-sm" name="status" id="status" required>
                        <option value="Active" {{$product_edit->status == 'Active' ? "selected":''}}>Active</option>
                        <option value="Inactive" {{$product_edit->status == 'Inactive' ? "selected":''}}>Inactive
                        </option>
                        <input type="hidden" value="{{$product_edit->id}}" name="id">

                    </select>
            </div>
            <div class="form-group col-md-3 {{$config['comments_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['comments']}}
                    @if($config['comments_mandatory'] == 'on')
                    <span class="required-asterisk" style="color:red">*</span>
                    @endif
                </label>
                <input type="text" maxlength="100" name="comments" id="p_image2" value="{{$product_edit->comments}}"
                    class="required validate form-control form-control-sm " autocomplete="off"
                    {{$config['comments_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
        </div>
</div>
@if($productPermission['Approve'])
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
    <input type="submit" class="btn btn-success" style="float:right;" id="approveButton" value="Approve">&nbsp;
    <input type="submit" class="btn btn-danger" style="float:right;" id="rejectButton" value="Reject">
</div>
@endif
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
<a href="/requestapproval" class="btn btn-secondary" style="float:left; color:#fff !important">Back</a>
</div>

<input type="password" id="userPassword" name="userPassword" value="" hidden>
<input type="text" id="approval_rejection_comments" name="approval_rejection_comments" value="" hidden>
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

.button-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    /* Optional: Adds some space between the buttons and other elements */
}
/* this css is for alertbox inputbox in approval / reject confirm popup by navin on 4/3/24 */
.swal2-input{
            background-color:#fff;
            color:#000;
        }
.btn {
    margin-right: 10px;
    /* Optional: Adds space between the buttons */
}
</style>
<script>
$(document).ready(function() {
    $("#printapplication").html("Print Application - Product Edit");
    $(".alert").fadeOut(2000);
    //file size upload limit upto 1mb
    $('.file').change(function() {
            const inputId = $(this).attr('id');
            const thumbnailId = `thumbnail-${inputId}`;
             console.log(inputId,thumbnailId);
            const file = this.files[0];
            const allowedExtensions = ['jpeg', 'jpg', 'png'];
            const maxFileSize = 1024 * 1024; // 1MB
            if (file) {
                const fileNameParts = file.name.split('.');
                const fileExtension = fileNameParts[fileNameParts.length - 1].toLowerCase();

                if (file.size > maxFileSize) {
                    alert('File size exceeds 1MB limit.');
                    $(this).val('');
                    $(`#${thumbnailId}`).attr('src', '{{ asset('images/no-image.png') }}'); // Reset to the dummy image
                } else if (!allowedExtensions.includes(fileExtension)) {
                    alert('Unsupported file format. Only JPG, JPEG, and PNG are allowed.');
                    $(this).val('');
                    $(`#${thumbnailId}`).attr('src', '{{ asset('images/no-image.png') }}'); // Reset to the dummy image
                } else {
                    const reader = new FileReader();
                    reader.onload = function() {
                        $(`#${thumbnailId}`).attr('src', reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                // Reset to the dummy image if no file is selected
                $(`#${thumbnailId}`).attr('src', '{{ asset('images/no-image.png') }}');
            }
        });
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
                    $('#formABC').attr('action', '/productApprove');
                    $('#formABC').attr('method', 'post');
                    $('#formABC').submit();
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
                        $('#formABC').attr('action', '/productReject');
                        $('#formABC').attr('method', 'post');
                        $('#formABC').submit();
                        $('#rejectButton').attr('disabled', true);
                    }

                } else {
                    event.preventDefault();
                }

            });
        }
    });


});
</script>
@endsection
