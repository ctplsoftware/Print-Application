@extends('layouts.app')
@section('content')
<div class="container card"style="padding-left:15%;padding-right:15%;padding-bottom:5%;">
<br>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {!! Form::open(array('route' => ['users.update',$user->id],'method'=>'PATCH','autocomplete'=>'off')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" class="form-control form-control-sm" name="name" id="name"
                          value="{{ $user->name}}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User Name</strong>
                    <input type="text" class="form-control form-control-sm" name="username" id="username"
                          value="{{ $user->username}}" required>
                    
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <!-- <input type="text" name="emqil" placeholder="Email" class="form-control " id="email"value="" autocomplete="off"> -->
                    <input type="email" class="form-control form-control-sm" name="email" id="email" 
                       value="{{ $user->email}}"required >
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Manufacturing location</strong>
                <select class="form-control form-control-sm" name="organization" required id="">
                    <option value="">--Select--</option>
                    @foreach($organizations as $name)
                    <option value="{{$name->id}}" @if($user2->unit_id == $name->id) selected @endif>{{$name->location_name}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>       
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role</strong>
                    <select class="form-control form-control-sm" name="roles" id="roles" >
                    @foreach($getRoleNames as $roleName)
                                @if($roleName->id == $user->role_id)
                                <option value="{{$roleName->id}}" selected>{{$roleName->name}}</option>
                                @else
                                <option value="{{ $roleName->id}}">{{ $roleName->name }}</option>
                                @endif

                                @endforeach
                            </select>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Status</strong>
                  <select type="text" class="form-control  form-control-sm" id="status" name="status"  value="{{ $user->status }}">
                  
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    </select>
                  
                    </div>  
                    </div>
                    </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-secondary float-left" href="/users/index" style="color:white !important;"> Back</a>
            <button id="submit" type="submit" class="btn btn-primary float-right">Update</button>
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
$(document).ready(function() {
    // var some_id = $('#email');
    // some_id.prop('type', 'text');
    // some_id.removeAttr('autocomplete');
    $("#printapplication").html("Print Application - User edit "); 
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
                    // if (result.exists) {
                    //     alert(result.message); // Display the message from the response
                    //     $('#username').val('').focus();
                    // } else {

                    // }

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
                            // User clicked "OK", set the input value to the existing batch number
                            $('#username').val();
                        } else {
                            // User clicked "Cancel", clear the input
                            $('#username').val('').focus();
                        }
                    });
                } else {
                   
                }
                }
            });

    });

});

</script>

@endsection
