@extends('layouts.app')
@section('content')


<div class="container" id="example1" style="margin-top:5%;background-color:#fff;">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div>
                <!-- <h3 style="margin-left: 85px !important">PharmTracQR</h3> -->
                <h3 class="headingfont-bold"
                    style="color:#000000;margin-bottom:30px;margin-top:-25px; font-size:35px !important;"><i
                        class="fa fa-qrcode" aria-hidden="true" style="margin-right:10px;;"></i>Print Application</h3>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <!-- <x-input-label for="email" :value="__('Email')" /> -->
                        <x-text-input id="email" class="block mt-1 w-full form-control" placeholder="User Name"
                            type="text" name="username" required autofocus
                            autocomplete="username" />
                        <!-- <x-input-error :messages="$errors->get('username')" class="mt-2" /> -->
                        <div class="login-form">
                        @error('username')
                       <div class="error-message">
                       {{ $message }}
                       </div>
                       @enderror
                       </div>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <!-- <x-input-label for="password" :value="__('Password')" /> -->

                        <input id="password" class="block mt-1 w-full form-control" type="Password"
                        onpaste="return false"  name="password" placeholder="Password" required autocomplete="current-password" />
                        <i class="fa fa-eye fa-eye-slash" id="togglePassword"
                            style="position: relative;margin-left: 295px;cursor: pointer;top: -30px;"></i>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <!-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> -->

                    <div class="flex  justify-end mt-4">


                        <x-primary-button class="ml-3 btn btn-primary"
                            style="width:100% !important;color:#fff !important;margin-bottom:5%; background-color:#2a5d78 !important; margin-left:0% !important">
                            {{ __('Login') }}
                        </x-primary-button>
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            style="cursor:pointer !important;"href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                        @endif
                        <p style="color:#2a5d78;margin-top:4%">Powered By Codentrix</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // localStorage.setItem('isConnected', 0);


    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    }); 

    //  function generateCaptcha(length, chars) {
    //     var result = '';
    //     for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
    //     return result;
    // }

    // function regenerate() {
    //     $('.dynamic-code').text(generateCaptcha(7,
    //     '@#&0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'));
    //     console.log($('.dynamic-code').text());
    //     $('#dynamic-code').val($('.dynamic-code').text());
    // }

    // //default captcha
    // $('.dynamic-code').text(generateCaptcha(7, '@#&0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'));
    // $('#dynamic-code').val($('.dynamic-code').text());


    // $('.captcha-reload').on('click', function() {
    //     regenerate();
    //     $('#captcha-input').val('');
    // });
    // $('#captcha-input').on('change', function() {
    //     if ($(this).val() != $('.dynamic-code').text()) {
    //         $('#errCaptcha').html('<span id="dd" style="color: red;">Captcha not matched.</span>');
    //         $(this).val('');
    //     } else {
    //         $('#errCaptcha').html('');
    //     }
    // });
</script>
<style>
#example1 {
    text-align: center;
        border-radius: 0px;
        margin-top: 30%;
        float: right;
        /* border: 1px solid; */
        padding: 174px;
        width: 50%;
        height: 59%;
        z-index: 1;
        box-shadow: 5px 10px 5px 5px #fff;
    }

.container {
    background-color: #fff;
    margin-top: -54px !important;
    margin-right: 0px;
}

body {
        background-image: url("/images/printapplogin3.avif");
        background-repeat: no-repeat;
        background-size: 55%;
        overflow-y: hidden !important;

    }

#captcha .title {
    text-align: center;
    padding: 1px 0;
}

#captcha .captcha-group div {
    display: inline-block;
}

#captcha .captcha-code .code {
    width: 50px;
    height: 30px;
    margin-left: 10%;
}

#captcha .captcha-code .code .dynamic-code {
    /* color: #2d2d2; */
    text-align: center;
    font-size: 12px;
    display: inline-block;
}

#captcha .captcha-code .code .dynamic-code:first-letter {
    font-size: 12px;
}

#captcha .captcha-code .captcha-reload {
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    margin-top: 0;
    max-width: 20px;
}

.dynamic-code {
    /* text-decoration: line-through; */
    pointer-events: none;
    -webkit-user-select: none;
}

.swal-wide {
    width: 25%;
    font-size: 16px !important;
    color: white;
    text-align: center;
}

body {
    zoom: 90% !important;

}
.form-control{
    background-color:#f2f2f2 !important;
    border:1px solid #a0a0a0 !important;
}
.login-form .error-message {
    color: red;
}

</style>

@endsection