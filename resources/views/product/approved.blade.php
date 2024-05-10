@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
    <h2 class="headingfont-bold"></h2>
    <form action="{{ route('productmaster.update', ['productmaster' => $product_edit->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <input type="hidden" value="{{$product_edit->id}}" name="id">
        <div class="headingfont form-row " style="padding-bottom:20px;padding-top:40px;">
            <div class="form-group col-md-6 {{$config['product_name_use'] == 'off' ? '' : 'hideField'}}">
                <label>{{$config['product_name']}}
                @if($config['product_name_mandatory'] == 'off')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="product_name" id="product_name"
                value="{{$product_edit->product_name}}"  data-oldvalue="{{$product_edit->product_name}}"   class="required validate form-control form-control-sm" autocomplete="off"
                  readonly  {{$config['product_name_mandatory'] == 'off' ? 'required' : ''}} />

            </div>
            <div class="form-group col-md-3 {{$config['product_id_use'] == 'off' ? '' : 'hideField'}}">
                <label>{{$config['product_id']}}
                @if($config['product_id_mandatory'] == 'off')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="product_id" id="product_id"
                value="{{$product_edit->product_id}}"  data-oldvalue="{{$product_edit->product_id}}"     class="required validate form-control form-control-sm" autocomplete="off"
                readonly  {{$config['product_id_mandatory'] == 'on' ? 'required' : ''}} />
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
                value="{{$product_edit->static_field1}}"      class="required validate form-control form-control-sm" autocomplete="off"
                readonly   {{$config['p_field1_mandatory'] == 'on' ? 'required' : ''}} />

            </div>
            <div class="form-group col-md-3 {{$config['p_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field2']}}
                @if($config['p_field2_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field2" id="static_field2"
                value="{{$product_edit->static_field2}}"     class="required validate form-control form-control-sm" autocomplete="off"
                readonly  {{$config['p_field2_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field3_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field3']}}
                @if($config['p_field3_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field3" id="static_field3"
                value="{{$product_edit->static_field3}}"    class="required validate form-control form-control-sm" autocomplete="off"
                readonly  {{$config['p_field3_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field4_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field4']}}
                @if($config['p_field4_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field4" id="static_field4"
                value="{{$product_edit->static_field4}}"      class="required validate form-control form-control-sm" autocomplete="off"
                readonly  {{$config['p_field4_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field5_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field5']}}
                @if($config['p_field5_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field5" id="static_field5"
                value="{{$product_edit->static_field5}}"     class="required validate form-control form-control-sm" autocomplete="off"
                readonly  {{$config['p_field5_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field6_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field6']}}
                @if($config['p_field6_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field6" id="static_field6"
                value="{{$product_edit->static_field6}}"     class="required validate form-control form-control-sm" autocomplete="off"
                readonly  {{$config['p_field6_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field7_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field7']}}
                @if($config['p_field7_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field7" id="static_field7"
                value="{{$product_edit->static_field7}}"       class="required validate form-control form-control-sm" autocomplete="off"
                readonly {{$config['p_field7_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field8_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field8']}}
                @if($config['p_field8_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field8" id="static_field8"
                value="{{$product_edit->static_field8}}"     class="required validate form-control form-control-sm" autocomplete="off"
                readonly {{$config['p_field8_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field9_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field9']}}
                @if($config['p_field9_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field9" id="static_field9"
                value="{{$product_edit->static_field9}}"    class="required validate form-control form-control-sm" autocomplete="off"
                readonly {{$config['p_field9_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['p_field10_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_static_field10']}}
                @if($config['p_field10_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="static_field10" id="static_field10"
                value="{{$product_edit->static_field10}}"   class="required validate form-control form-control-sm" autocomplete="off"
                readonly  {{$config['p_field10_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
            <div class="form-group col-md-3 {{$config['g_field1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{ $config->global_fieldname1 }}
                @if($config['g_field1_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="global_field1" id="global_field1"
                value="{{ $config->global_static_field2 }}" class="required validate form-control form-control-sm" autocomplete="off"
                readonly  {{$config['g_field1_mandatory'] == 'on' ? 'required' : ''}}readonly />
            </div>
            <div class="form-group col-md-3 {{$config['g_field2_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{ $config->global_fieldname2 }}
                @if($config['g_field2_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>
                <input type="varchar" maxlength="100" name="global_field2" id="global_field2"
                value="{{ $config->global_static_field2 }}"   class="required validate form-control form-control-sm" autocomplete="off"
                readonly {{$config['g_field2_mandatory'] == 'on' ? 'required' : ''}} readonly />
            </div>
            <div class="form-group col-md-3 {{$config['p_image1_use'] == 'on' ? '' : 'hideField'}}">
                <label>{{$config['p_image_field1']}}
                @if($config['p_image1_mandatory'] == 'on')
                <span class="required-asterisk" style="color:red">*</span>
                @endif
                </label>

                @if($product_edit->product_image1 == "null")
                <input type="file" maxlength="100" name="product_image1" id="image1"
                    class="required validate file  " autocomplete="off"
                    {{$config['p_image1_mandatory'] == 'on' ? 'required' : ''}} />
                    <img id="thumbnail-image1" src="{{ asset('images/no-image.png') }}" alt=""
                        style="width:100px;height:100px" />
                @else
                <input type="file" class="file" id="file" name="product_image1">
                        <input type="text" hidden class="required validate file " id="image1" name="product_image1"
                        value="{{ $product_edit->product_image1 ? $product_edit->product_image1  : '' }}"  {{$config['p_image1_mandatory'] == 'on' ? 'required' : ''}}>
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
                <input type="file" maxlength="100" name="product_image2" id="image2"
                    class="required validate file " autocomplete="off" value="{{ asset('images/no-image.png') }}"
                    {{$config['p_image2_mandatory'] == 'on' ? 'required' : ''}} />
                    <img id="thumbnail-image2" src="{{ asset('images/no-image.png') }}" alt=""
                        style="width:100px;height:100px" />
                  @else
                  <input type="file" class="file" id="file" name="product_image2">
                        <input type="text" hidden class="required validate file " id="image1" name="product_image2"
                        value="{{ $product_edit->product_image2 ? $product_edit->product_image2  : '' }}"  {{$config['p_image2_mandatory'] == 'on' ? 'required' : ''}}>
                    <img id="thumbnail-detail" src="{{ asset('storage/' . $product_edit->product_image2) }}" alt="Image"
                        style="width:100px;height:100px">
                        @endif
            </div>
            <div class="form-group col-md-3" style="">
                <label>Status</label><span style="color:red;">
                <select class="form-control validate required form-control-sm" name="status" id="status" required readonly>
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
                <input type="text" maxlength="100" name="comments" id="p_image2"
                value="{{$product_edit->comments}}"    class="required validate form-control form-control-sm " autocomplete="off"
                readonly  {{$config['comments_mandatory'] == 'on' ? 'required' : ''}} />
            </div>
        </div>
</div>
<div class="container-fluid" style="padding-right:6%;padding-left:6%;">
    <!-- <input type="submit" class="btn btn-primary" style="float:right;" id="submit_user" value="Update"> -->
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
    $(document).ready(function(){

        $("#printapplication").html("Print Application - Product Edit");
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

        $('#product_name').change(function(){
           const productName = $('#product_name').val();
           let oldValue = $(this).attr("data-oldvalue");
           console.log(oldValue);
           console.log(productName);
           $.ajax({
                url: "{{ url('/productNameChange') }}",
                type: "GET",
                data: {
                    productName: productName,
                },
                success: function(result) {
                    if (result.exists) {
                        console.log(result);
                        alert(result.message); // Display the message from the response
                        $('#product_name') .val('').focus();
                        $('#product_name').val(oldValue);
                    } else {

                    }
                }
            });

        });
        $('#product_id').change(function(){
           const productId = $('#product_id').val();
           let oldValue = $(this).attr("data-oldvalue");
           console.log(productId);
           $.ajax({
                url: "{{ url('/productIdChange') }}",
                type: "GET",
                data: {
                    productId: productId,
                },
                success: function(result) {
                    if (result.exists) {
                        alert(result.message); // Display the message from the response
                        $('#product_id').val('').focus();
                        $('#product_id').val(oldValue);
                    } else {

                    }
                }
            });

        });
    });
</script>
@endsection
