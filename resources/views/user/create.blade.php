@extends('layouts.app')
@section('content')

@if(session()->has('error'))
<input type="hidden" name="" id="message" value="{{session()->get('error')}}">
<script>
$(document).ready(function() {

    if ($('#message').val() == 'User Name already exists') {
        console.log('check');

        Swal.fire({
                        html: 'User Name already exists',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',

                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                        preConfirm: function() {
                        // Retrieve existing data or perform additional actions here
                        // Example: You can make an AJAX request to get the existing data
                        console.log('Retrieving existing data...');

                    }
                 })
          //alert('User created successfully');

    } else if($('#message').val() == 'Password does not match'){

        Swal.fire({
                        html: 'Password does not match',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'rgb(36 63 161)',

                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                        preConfirm: function() {

                    }
                 })
    }


});
</script>
@endif

<div class="container card"style="padding-left:15%;padding-right:5%;padding-bottom:5%;">
<br>
    @if (count($errors) > 0)
    <div class="alert alert-danger">

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif






    {!! Form::open(array('route' => 'users.store','method'=>'POST','autocomplete'=>'off')) !!}

        <div class="row">
            <div class="col-xs-9 col-sm-9 col-md-9">
                <div class="form-group">
                    <strong>Name</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9">

            </div>
        </div>
        <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9">
                <div class="form-group">
                    <strong>User Name</strong>
                    <input id="username" placeholder="User Name" autocomplete="off" class="form-control" type="text" name="username">
                    <!-- {!! Form::text('username', null, array('placeholder' => 'User Name','autocomplete'=>'off','class' => 'form-control')) !!} -->
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-9 col-sm-9 col-md-9">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="text" name="email" placeholder="Email" class="form-control " id="email"  autocomplete="off">
                    <!-- {!! Form::email('email', null, array('placeholder' => 'Email','class' =>
                    'form-control','value'=>'null','autocomplete'=>'off')) !!} -->
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-9 col-sm-9 col-md-9">
                <div class="form-group">
                    <strong>Manufacturing location</strong>
                    <select name="unit_id" id="" class="form-control form-control-md" required>
                        <option value="select">Select</option>
                    @foreach ($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->location_name}}</option>
                                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-9 col-sm-9 col-md-9">
                <div id="strengthMessage"></div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group value">
                            <strong>Password</strong>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control
                            pass','autocomplete'=>'off')) !!}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="progress" style="width:60%;margin-top:35px">
                            <div class="progress-bar" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
             <div class="col-xs-9 col-sm-9 col-md-9">
                <div class="form-group">
                    <strong>Confirm Password</strong>
                    {!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','autocomplete'=>'off','class' =>
                    'form-control con_pass')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9 col-sm-9 col-md-9">
                <div class="form-group">
                    <strong>Role</strong>
                    <select name="role_id" id="" class="form-control form-control-md" required>
                        <option value="select">Select</option>
                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name}}</option>
                                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-secondary float-left" href="/users/index" style="color:white !important;"> Back</a>
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>



    </div>
{!! Form::close() !!}

<style>
.progress-bar-success {
    background-color: #5cb85c
}

.progress-striped.progress-bar-success {
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)
}

.progress-bar-danger {
    background-color: #d9534f
}

.progress-striped .progress-bar-danger {
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)
}

.media {
    margin-top: 15px
}

.progress-bar-warning {
    background-color: #f0ad4e
}

.progress-striped .progress-bar-warning {
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)
}
.form-control {
  border: none; /* Make all borders invisible */
  border-bottom: 1px solid #2fa517; /* Add a visible bottom border */
}
/* .form-group{
    text-align:center !important;
} */
</style>
<script>
$(document).ready(function() {
    // var some_id = $('#email');
    // some_id.prop('type', 'text');
    // some_id.removeAttr('autocomplete');
    $("#printapplication").html("Print Application - User Creation ");


    var config_pwd_val = $('#pwd_len').val();
    $(".pass").attr('minlength', config_pwd_val);
    $(".con_pass").attr('minlength', config_pwd_val);
    $('.pass').keyup(function() {
        $('#strengthMessage').html(checkStrength($('.pass').val()))
    })
    $(".len").html(config_pwd_val)

    function checkStrength(password) {
        // console.log(password);
        var strength = 0
        if (password.length < config_pwd_val) {
            $('.progress-bar').removeClass('progress-bar-danger')
            $('.progress-bar').removeClass('progress-bar-success')
            $('.progress-bar').removeClass('progress-bar-warning')
        }
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        if (password.length >= config_pwd_val) strength += 1
        // Calculated strength value, we can return messages
        // If value is less than 2
        console.log(strength);
        if (strength < 2) {
            // $('#strengthMessage').removeClass()
            // $('#strengthMessage').addClass('Weak')
            // return 'Weak'
            $('.progress-bar').addClass('progress-bar-danger')
            $('.progress-bar').removeClass('progress-bar-success')
            $('.progress-bar').removeClass('progress-bar-warning')
            $('.progress-bar').css('width', "33%")
            $('.progress-bar').text('Weak')
        } else if (strength == 2 || strength == 3) {
            $('.progress-bar').addClass('progress-bar-warning')
            $('.progress-bar').removeClass('progress-bar-success')
            $('.progress-bar').removeClass('progress-bar-danger')
            $('.progress-bar').css('width', "66%")
            $('.progress-bar').text('Good')
        } else {
            $('.progress-bar').addClass('progress-bar-success')
            $('.progress-bar').removeClass('progress-bar-warning')
            $('.progress-bar').removeClass('progress-bar-danger')
            $('.progress-bar').css('width', '100%')
            $('.progress-bar').text('Strong')
        }
    }

    $('#username').change(function(){
    console.log('test');
    var userName = $('#username').val();
    console.log(userName);

    $.ajax({
        url: "{{ url('/userNameChange') }}",
        type: "GET",
        data: {
            userName: userName,
        },
        success: function(result) {

            if (result.exists) {
                    Swal.fire({
                        html: result.message,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancel',
                        confirmButtonColor: 'rgb(36 63 161)',
                        cancelButtonColor: '#d33',
                        background: 'rgb(105 126 157)',
                        customClass: 'swal-wide',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // User clicked "OK",
                            $('#username').val();
                        } else {
                            // User clicked "Cancel", clear the input
                            $('#username').val('').focus();
                        }
                    });
                } else {

                }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle the AJAX error here, such as displaying an error message
        }
    });
});


});

</script>
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

@endsection
