<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <!-- Scripts -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('custom/app.css') }}" rel="stylesheet">
    <link href="{{ asset('custom/app2.css') }}" rel="stylesheet">
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script rel="stylesheet" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/date-1.1.0/sp-1.3.0/datatables.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-t1pcnkpLZWb5j5N5X5cWwbRdAgMyJ2ys+GwHgXMzqqp5XM10JgqC5AaXhtmy5O70RMMv0QrkD0wZz76bGpWgA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/date-1.1.0/sp-1.3.0/datatables.min.js"></script>
    <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">






    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" defer>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Import Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js" defer></script>

    <!--------------------------------- datatables ------------------------------------------------------------------>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/1.10.15/api/fnReloadAjax.js" />
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>

    <!-- fafa icon -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- ---------- -->


    <!-- ... other meta tags and stylesheets -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- ... -->
    {{-- PDF --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


</head>

<body>
    <div id="page-content-wrapper">
        @guest
        @else
        <nav class="navbar navbar-default no-margin"
            style="position: sticky;top: 0%; z-index:100;background-color:#2a5d78 !important;z-index:100">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- <button type="button" class="navbar-toggle collapsed"
                    style="border: none !important; background-color: #027c0200;  color: #fff; font-size: 24px;"
                    data-toggle="collapse" id="menu-toggle">
                    <i class="fa fa-bars"></i>
                </button> -->
            <button type="button" class="navbar-toggle collapsed"
                style="border: none; background-color:#027c0200!important; font-family: arial; font-weight: 600; color: #fff; font-size: 20px; margin-left: 40px;"
                data-toggle="collapse" data-target="#menu-collapse" id="menu-toggle">
                Menu <span style="color:#fff !important;pointer-events:none" class=" fa fa-angle-down"></span>

            </button>
            <div class="navbar-header fixed-brand" style=" text-align: center;">
                <a class="navbar-brand" href="/configuration" style="text-align:center">
                    <h3 id="printapplication" style="font-size:20px; font-family: Arial; color: white;font-weight: bold; ">
                        Print Application
                    </h3>
                </a>
                @endguest
            </div>
            @guest
            @else

            <div style="display:inline">
                <!-- <a id="helpDropdown" class="nav-link headingfont fixed-brand" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="vertical-align: middle;" v-pre>
                        <img src="/images/help.png" alt="">
                        <i class="fa fa-question-circle-o" aria-hidden="true"
                            style="color:#fff;float:left; font-size:25px;cursor:pointer;"></i>
                    </a> -->

                <!--li class="nav-item dropdown"-->
                <!-- <a id="navbarDropdown" class="nav-link headingfont fixed-brand" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre style="color: white !important;">
                    {{ Auth::user()->name }}
                </a> -->
                <a id="navbarDropdown" class="nav-link  headingfont fixed-brand" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                    style="color: white !important;margin-right:40px!"> <i class="profile_logo" aria-hidden="true">
                        {{ substr(Auth::user()->name, 0, 1) }}</i>

                </a>
            </div>

            <!-- <a type="button" class="navbar-toggle collapsed"
                    style="border: none; background-color: #084298;  color: #fff; font-size: 24px;"
                    data-toggle="collapse" id="navbarDropdown">
                    {{ Auth::user()->name }}
                    <img src="/images/sign-up.png" alt="">
                 </button> -->


            <!--new      -->
            <div class="dropdown-menu dropdown-menu-end menubaritems headingfont" aria-labelledby="navbarDropdown"
                id="navbar1"
                style="width: 100%; border-radius:0px !important;white-space: nowrap; margin-left: 0%; margin-top:0%;">
                <div class="dropdown1">
                    <a style="margin-left: 50px;" href="#"><i class=""></i> Masters <i class="fa fa-angle-down"
                            aria-hidden="true"></i>
                        <div class="dropdown1-content1 ">
                            @if(Auth::user()->checkPermission(['product_view']))
                            <a class="sidebar-brand" href="/productmaster/index"> Product Master</a>
                            @endif

                            <a class="sidebar-brand" href="{{route('organization.fetch')}}"> Location Master</a>
                            <!-- <a class="sidebar-brand" href="/line/index"> Line Master</a>
                            <a class="sidebar-brand" href="/printer/index"> Printer Master</a> -->
                            <!-- <a class="sidebar-brand" href="/line_assigned_packing/index">Line Assigned Packing Master</a> -->
                            <!-- <a class="sidebar-brand" href="/packing_level/index">   Packing Level Master</a> -->
                            <!-- <a class="sidebar-brand" href="/uom/index"> UOM Master</a>
                            <a class="sidebar-brand" href="/job/index"> Print template Master</a> -->
                            <!-- <a class="sidebar-brand" href="/formulation_type/index">   Formulation Type Master</a> -->


                        </div>
                </div>
                <div class="dropdown1">
                    <a href="#"><i class=""></i> Transaction <i class="fa fa-angle-down" aria-hidden="true"></i>
                        <div class="dropdown1-content1">

                            <a class="a sidebar-brand" href="/get-predefinedtransaction-list"> Predefined Transaction List</a>
                            <a class="a sidebar-brand" href="/dynamic"> Dynamic Transaction List</a>
                            @if(Auth::user()->checkPermission(['transaction_create']))
                            <a class="a sidebar-brand" href="/dynamictransaction-bulkupload"> Bulk upload Dynamic Transaction </a>
                            @endif
                            <a class="a sidebar-brand" href="/get-reprint-list"> Reprint Transaction List</a>
                        </div>
                    </a>
                </div>


                <div class="dropdown1">
                    <a href="#"><i class=""></i> Label <i class="fa fa-angle-down" aria-hidden="true"></i>
                        <div class="dropdown1-content1">
                            <!-- <a class="sidebar-brand" href="/labeldesign"> Label Design</a> -->
                            @if(Auth::user()->checkPermission(['label_view']))
                            <a class="sidebar-brand" href="/labellist"> Label Master</a>
                            @endif

                        </div>
                    </a>
                </div>

                <div class="dropdown1">
                    <a href="#"><i class=""></i> Report <i class="fa fa-angle-down" aria-hidden="true"></i>
                        <div class="dropdown1-content1">
                            <a class="sidebar-brand" href="/report">Predefined Report</a>
                            <a class="sidebar-brand" href="/dynamicreport">Dynamic Report</a>
                            <a class="sidebar-brand" href="/bulkdynamicreport">Bulk Dynamic Report</a>
                        </div>
                    </a>
                </div>
                @if(Auth::user()->checkPermission(['transaction_create']))
                <div class="dropdown1">
                    <a href="#"><i class=""></i> Bulk Upload <i class="fa fa-angle-down" aria-hidden="true"></i>
                        <div class="dropdown1-content1">
                            <a class="sidebar-brand" href="/bulkupload">Product Bulkupload</a>

                        </div>
                    </a>
                </div>
                @endif
                <div class="dropdown1">
                    <a href="#"><i class=""></i> Config <i class="fa fa-angle-down" aria-hidden="true"></i>
                        <div class="dropdown1-content1">
                            <a class="a sidebar-brand" href="/configuration">Configuration</a>
                            <!-- <a class="a sidebar-brand" href="/label">Label Config</a>
                            @if(Gate::allows('isadmin')||Gate::allows('isqa')) -->
                            <!-- <a class="sidebar-brand" href="/region/index">   Region Master</a> -->
                            <!-- <a class="sidebar-brand" href="/line_printer_assigned_label/index">Line Printer Assigned Label Master</a> -->
                            <!-- <a class="sidebar-brand" href="/organization/index">   Organisation Master</a>

                                <a class="sidebar-brand" href="/scanner/index">   Scanner Master</a>
                                <a class="sidebar-brand" href="/printer/index">   Printer Master</a> -->
                            <!-- <a class="sidebar-brand" href="/location/index"> Location Master</a>
                            <a class="sidebar-brand" href="/users/index"> Manage Users</a>
                            <a class="sidebar-brand" href="/roles/index"> Manage Roles</a>

                            @endif -->
                        </div>
                    </a>
                </div>
                <div class="dropdown1">
                @if(Auth::user()->checkPermission(['user_view']))
                    <a href="#"><i class=""></i> User Management <i class="fa fa-angle-down" aria-hidden="true"></i>
                        <div class="dropdown1-content1">
                            <a class="sidebar-brand" href="/users/index">Create Users</a>
                            <a class="sidebar-brand" href="/roles/index">Create Role</a>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
            <!-- olddddd -->
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="logbar"
                style="width: 17%;border-radius: 5px;  width: auto !important;box-shadow: 0 0 5px #519cc8; white-space: nowrap; margin-left: 80%;">

                <div class="container">

                    <div class="row font col-md-12" style="font-size:16px;margin-top:20px;">
                        <div class="form-group nonheadingfont"
                            style=" white-space: nowrap;cursor:pointer; font-size:18px !important;overflow: hidden; text-overflow: ellipsis; min-width: 270px;"
                            data-toggle="tooltip" data-placement="top" title="{{ Auth::user()->name }}">
                            <i class="fa fa-user-circle-o" style="font-size:24px;margin-right:8px;"
                                aria-hidden="true"></i> {{ Auth::user()->name }}
                        </div>

                        <div class="row font col-md-12 ">
                            <div class=" form-group nonheadingfont "
                                style="white-space: nowrap; font-size:18px !important; cursor:pointer;overflow: hidden; text-overflow: ellipsis; min-width: 270px;">
                                <i class="fa fa-envelope" style="font-size:22px;margin-right:10px;"
                                    aria-hidden="true"></i>
                                {{Auth::user()->email}}
                            </div>

                        </div>
                        {{-- <div class="row font  col-md-12">
                        <div class="form-group"  style="white-space:  nowrap; cursor:pointer;overflow: hidden; text-overflow: ellipsis; min-width: 270px;" data-toggle="tooltip" data-placement="top" title=" @php($location1 = DB::table('organization_master')->where('id',
                            Auth::user()->unit_id)->first())
                            {{$location1->location_name}} "><i class="fa fa-map-marker "
                                style="font-size: 20px;margin-left:5px;margin-right:12px; cursor:pointer;"  aria-hidden="true"></i>
                            @php($location1 = DB::table('organization_master')->where('id',
                            Auth::user()->unit_id)->first())
                            {{$location1->location_name}}</div>

                    </div> --}}

                        <div class="row font col-md-12">
                            <a href="/change-password" class="change form-group col-md-12"
                                style="padding: 1%; font-size:14px;text-align:center ">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                Change Password? </a>
                            <hr style="border:none;border-top: 1px solid #626C76 ; margin: 10px 5px;">

                        </div>

                        <div style="padding: 0px 0% 0px 25%;">

                            <div
                                style="border-style:solid;border-width:1px; border-color:#c43a27; border-radius:10px;margin-bottom:20px; margin-right:90px;">
                                <button class="dropdown-item"
                                    style="font-size:16px; background-color:#fff;color:#ff0000 !important; text-align: center"
                                    href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit(); "><i class="fa fa-sign-out"
                                        aria-hidden="true"></i>
                                    {{ __('Logout') }}
                                </button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>



                    </div>
                </div>






                <!--/li-->
                @endguest
                <!-- bs-example-navbar-collapse-1 -->
        </nav>
        <main class="py-4" style="min-height:82%;">
            <!-- 'po' -->
            <div class="text-center" id="loadingDiv">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div>Loading...</div>
            </div>
            <div id="boddy">

                @yield('content')
            </div>
        </main>
        @guest
        @else

        @endguest
    </div>
    </div>

    <!-- for customized alert box for success alert by navin dev on 22/3/23
        alertSuccess(title,content);
    -->
    <div id="modal-dialogsuccess" class="modal" style="pointer-events:none;">
        <div class="modal-dialog"
            style=" margin: 16% auto;max-width: 400px;max-height: 180px;text-align: center;display: flex;justify-content: center;">
            <div class="modal-content content1"
                style=" border-radius: 10px; border: none;font-family: Arial, sans-serif;text-align:center;">
                <div class="modal-header"
                    style="background-color: #2a5d78;color: #000; padding:15px; border-radius: 10px 10px 0 0;">
                    <h5 class="modal-title"
                        style="text-align:center !important; color:white!important;font-size: 20px; font-weight:600">
                    </h5>
                </div>
                <div class="modal-body" style="padding:10px;font-size: 16px;background-color: #d8e8e9;"></div>
                <div class="modal-footer" style=" border-radius: 0 0 10px 10px; background-color:#d8e8e9 ;text-align: center;padding:10px;
                    display: flex;justify-content: center;">
                    <button class="btn close-btnS okmodal" style=" background-color: #737f80;color: white;border: none;
                        padding: 5px 10px; border-radius: 5px;font-size: 15px;cursor: pointer;">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- for customized warning box for success alert by navin dev on 22/3/23
        alertWarning(title,body)
    -->
    <div id="modal-dialogwarning" class="modal" style=" pointer-events: none;">
        <div class="modal-dialog"
            style=" margin: 16% auto;min-width: 470px;min-height: 180px;text-align: center!important;display: flex;justify-content: center;">
            <div class="modal-content content2"
                style=" border-radius: 10px; border: none;font-family: Arial, sans-serif;">
                <div class="modal-header"
                    style="background-color: #2a5d78;color: #000; padding:15px; border-radius: 10px 10px 0 0;text-align: center!important;">
                    <h5 class="modal-title"
                        style="text-align: center!important; color:white!important;font-size: 20px; font-weight:600">
                    </h5>
                </div>
                <div class="modal-body" style="padding:10px;font-size: 16px;background-color: #d8e8e9;"></div>
                <div class="modal-footer" style=" border-radius: 0 0 10px 10px; background-color:#d8e8e9 ;text-align: center;padding:10px;
                    display: flex;justify-content: center;">
                    <button class="btnW close-btnW okmodal" id="ok" style=" background-color: #737f80;color: white;border: none;
                        padding: 5px 10px; border-radius: 5px;font-size: 15px;cursor: pointer;">OK</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
$(document).ready(function() {

    /* Allowed characters in form field */
    // $("form").on('keypress',function(){
    //   return /[!@#'"%^&*:()_, \\\-./+=0-9a-zA-Z]/i.test(event.key);
    // });

    $('#wrapper').attr('class', localStorage.getItem("SidebarClass"))
    $('#wrapper').attr('class', localStorage.getItem("SidebarClass"))
    var sessiondetails = @json(session('lastActivityTime'));

    // during hover a menu button menu bar displays dev on 16/5/23 by navin
    // var navbar = $("#navbar1");
    // $(".navbar-toggle").mouseenter(function() {
    //     navbar.stop().slideToggle("slow");
    // });

    // var navbardropdown = $("#logbar");
    // $("#navbarDropdown").mouseenter(function() {
    //     navbardropdown.stop().slideToggle("slow");
    //     if ($('#helpbar').is(':visible')) {
    //         $("#helpbar").fadeOut("fast");
    //     }
    // });
    // Get the menu toggle button element
    var menuToggle = document.getElementById("menu-toggle");

    // Get the navbar collapse element
    var menuCollapse = document.getElementById("menu-collapse");

    // Get the fa fa-bars icon element
    var menuIcon = document.querySelector(".fa.fa-angle-down");

    // Add a click event listener to the menu toggle button
    menuToggle.addEventListener("click", function(event) {
        // Toggle the "collapsed" class on the navbar collapse element
        menuCollapse.classList.toggle("collapsed");

        // Prevent the event from bubbling up and closing the navbar automatically
        event.stopPropagation();
    });

    // Add a click event listener to the fa fa-bars icon
    menuIcon.addEventListener("click", function(event) {
        // Prevent the event from bubbling up and closing the navbar automatically
        event.stopPropagation();
    });
    // $("#navbarDropdown").click(function() {
    //     $("#logbar").slideToggle("slow");
    //     if ($('#helpbar').is(':visible')) {
    //         $("#helpbar").fadeOut("fast");
    //     }
    // });


    // menu bar toggle ui by navin 0n 15/5/23
    $(".navbar-toggle").click(function() {

        $("#navbar1").slideToggle("slow");

    });

    $("form").on('keypress', function(event) {
        // Check if the entered key is in the whitelist
        return /[!@#'"%^&*:()_, \\\-./+=0-9a-zA-Z]/i.test(event.key);
    });

    // this code will close the dropdown during clicking outside of the screen anywhere by dev navin on 16/5/23
    $(document).click(function(e) {
        var navbar = $("#navbar1");
        var menuToggle = $(".navbar-toggle");

        // Check if the clicked element is not part of the navbar or menu toggle
        if (!navbar.is(e.target) && !menuToggle.is(e.target) && navbar.has(e.target).length === 0) {
            navbar.slideUp("slow");
        }
    });

    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is("#navbarDropdown") && !target.closest("#navbarDropdown").length && !target.is(
                ".navbardropdown")) {
            // $("#logbar").slideUp("slow");
        }
    });
    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is("#helpDropdown") && !target.closest("#helpDropdown").length && !target.is(
                ".helpdropdown")) {
            $("#helpbar").slideUp("slow");
        }
    });
    /* To replace characters by empty string in input and textArea tags */
    // Created by Manoj on 3/2/2023
    // $("input").on("input", function() {
    //     var currentValue = $(this).val();
    //     var currentType =$(this).attr('type');
    //     if (currentType === 'email'){
    //         var updatedValue = currentValue;
    //     } else {
    //         var updatedValue = currentValue.replace(/[_]/g, "");
    //     }
    //     $(this).val(updatedValue);
    // });

    // $("textarea").on("input", function() {
    //     var currentValue = $(this).val();
    //     var updatedValue = currentValue.replace(/[_]/g, "");
    //     $(this).val(updatedValue);
    // });


    /* To Disable Inspect Element */
    //     document.addEventListener('contextmenu',(e)=>{
    //     e.preventDefault();
    //   }
    //   );
    //   document.onkeydown = function(e) {
    //   if(event.keyCode == 123) {
    //      return false;
    //   }
    //   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
    //      return false;
    //   }
    //   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
    //      return false;
    //   }
    //   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
    //      return false;
    //   }
    //   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    //      return false;
    //   }
    // }
    $("input").on('keyup', function(event) {
        var maxLength = $(this).attr("maxlength");
        var curLength = $(this).val().length;
        if (curLength >= maxLength) {

            $(this).val($(this).val().substring(0, maxLength));
            var curLength = $(this).val().length;
            Swal.fire({
                title: 'You cannot exceed ' + $(this).attr("maxlength") +
                    ' character for this field',
                confirmButtonText: 'OK',
                confirmButtonColor: 'rgb(36 63 161)',
                background: 'rgb(105 126 157)',



            });
        }
    });



    $('form').submit(function() {
        $(this).find(':input[type=submit]').prop('disabled', true);
        // console.log('in');
    });
});
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    localStorage.setItem("SidebarClass", $('#wrapper').attr('class'));
});
// $("#menu-toggle").click(function() {
//     $("#sidebar-wrapper").toggle();
//     if($("#sidebar-wrapper").css("display") == "block"){
//         console.log('ppp');
//         $("#wrapper").css("transition",' all 0.5s ease');

//         $("#wrapper").css("padding-left",'250px');
//     }else{
//         console.log('p887');

//         $("#wrapper").css("padding-left",'0px');
//     }
// });
$("#navbarDropdown").click(function() {
    $("#logbar").slideToggle("slow");
    if ($('#helpbar').is(':visible')) {
        $("#helpbar").fadeOut("fast");
    }
});
$("#helpDropdown").click(function() {
    $("#helpbar").slideToggle("slow");
    if ($('#logbar').is(':visible')) {
        $("#logbar").fadeOut("slow");
    }
});
$("#closebtn").click(function() {
    $("#logbar").slideToggle("slow");
});
$("#closebtnhelp").click(function() {
    $("#helpbar").slideToggle("slow");
});
$('#masters').click(function() {
    $(".submaster").slideToggle();
    $(".updown").toggle();
    $(".containersub").hide();
    $(".reports").hide();
    $(".sublog").hide();
    $(".subpallet").hide();
    $(".subshipping").hide();
    $(".config").hide();
});




$('#configuration').click(function() {
    $(".config").slideToggle();
    $(".updown5").toggle();
    $(".submaster").hide();
    $(".containersub").hide();
    $(".reports").hide();
    $(".subpallet").hide();
    $(".sublog").hide();
    $(".subshipping").hide();
});
$('#Container').click(function() {
    $(".containersub").slideToggle();
    $(".updowncon1").toggle();
    $(".submaster").hide();
    $(".reports").hide();
});

$('#boddy').on('ajaxStart', function() {
    $(this).show();
    $('#boddy').hide();
}).on('ajaxStop', function() {
    $(this).hide();
    $('#boddy').show();
});
$("#loadingDiv").bind({
    ajaxStart: function() {
        $(this).show();
    },
    ajaxStop: function() {
        $(this).hide();
    }
});
$('#loadingDiv').hide() // Hide it initially
$('#boddy').ajaxStart(function() {
    $('#boddy').hide();
    $(this).show();
})
$('#boddy').ajaxStop(function() {
    $('#boddy').show();
    $(this).hide();
});
$('#report').click(function() {
    $(".reports").slideToggle();
    $(".updown2").toggle();
    $(".submaster").hide();
    $(".containersub").hide();
    $(".subpallet").hide();
    $(".sublog").hide();
    $(".subshipping").hide();
    $(".config").hide();
});
$('#subscription').click(function() {
    $(".sub").slideToggle();
    $(".updown6").toggle();
});

// Close the dropdown if the user clicks outside of it


$('.close-btnW').on('click', function() {
    event.stopPropagation(); // Prevent the click event from propagating to other elements
    event.preventDefault(); // Prevent the default behavior of the button
    $('#modal-dialogwarning').modal('hide');
    $('body').removeClass('modal-open');
    $('.page-overlay').remove();
});

// Hide the  success alert box when the button is clicked
$('.close-btnS').on('click', function() {
    event.stopPropagation(); // Prevent the click event from propagating to other elements
    event.preventDefault(); // Prevent the default behavior of the button
    $('#modal-dialogsuccess').modal('hide');
    $('body').removeClass('modal-open');
    $('.page-overlay').remove();
});


function alertSuccess(title, body) {
    $('#modal-dialogsuccess').modal('show');
    $('.modal-title').text(title);
    $('.modal-body').text(body);
}

function alertWarning(title, body) {
    $('#modal-dialogwarning').modal('show');
    $('.modal-title').text(title);
    $('.modal-body').text(body);
}

</script>
<!-- <script>
        // Disable the text cursor for non-input elements
        document.getElementById('content').addEventListener('selectstart', function(e) {
            e.preventDefault();
            return false;
        });
    </script> -->
<style>
.config {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

    {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.submaster,
.containersub,
.subpallet,
.reports,
.sublog,
.subshipping,
.config {
    height: 4.5%;
}

.subshipping {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.submaster {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.subpallet {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.containersub {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.sub {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}
body {
            user-select: none !important;
        }

        input, textarea {
            user-select: text !important;
        }
.sublog {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.mainmenu {
    /* font-weight:500; */
    color: #027c02e0 !important;
    font-weight: bold;
    padding-top: 10px;
    margin-right: 10px;
}


/* .a:hover {
    color: #faedcd;
} */

.profile {
    text-align: center;
    font-size: 17px;
    font-family: 'Arial';
}

.center {
    text-align: center !important;
}

.font {
    font-size: 14px;
}

.change {
    text-align: center;
    color: #027c02b3 !important;
}

/* li:hover {
    background-color: #faedcd;
} */


.borders {
    border-bottom: 1px solid #dadce0;
    border-top: 1px solid #dadce0;
}

#logbar {
    /* color:#061a7d; */
    display: none;

}

.reports {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
    margin-bottom: 10px;
}

.swal2-popup {
    font-size: 12px;
    font-family: 'Arial';
}
.swal2-input{
    width:80%;
}
/* // above css is for sweet alert constant widthsize for all pages*/

.nav-link {
    display: inline-block !important;
}

#sidebar-wrapper {
    background: #ccd5ae40
}

thead {
    background-color: #027c02a6 !important;
}

body {
    zoom: 85%;
}



/* .card-body {
    background-color: #edede9 !important;
    color: #716f6f !important;
} */

thead tr th {
    color: white !important;
    text-align: center;
}

.config {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}



.submaster,
.containersub,
.subpallet,
.reports,
.sublog,
.subshipping,
.config {
    height: 4.5%;
}

.subshipping {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.submaster {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.subpallet {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.containersub {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.sub {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.sublog {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
}

.mainmenu {
    /* font-weight:500; */
    color: #004e8a !important;
    font-weight: bold;
    padding-top: 10px;
    margin-right: 10px;
}

.a {
    color: black !important;
}

.profile {
    text-align: center;
    font-size: 17px;
    font-family: 'Arial';
}

.center {
    text-align: center !important;
}

.font {
    font-size: 14px;
}

.change {
    text-align: center;
    color: blue !important;
}


.borders {
    border-bottom: 1px solid #dadce0;
    border-top: 1px solid #dadce0;
}

#logbar {
    /* color:#061a7d; */
    display: none;

}

.reports {
    display: none;
    font-weight: 400;
    font-size: 14px;
    padding-left: 10px;
    margin-bottom: 10px;
}

.swal2-popup {
    font-size: 12px;
    font-family: 'Arial';
}


@media screen and (max-width: 1100px) {
    #logbar {
        width: 30% !important;
    }
}

@media screen and (max-width: 1200px) {
    #logbar {
        width: 20% !important;
    }
}


/* alert box UI for success , warning */
.content1 {
    position: relative;
    z-index: 1;
    background-color: #d8e8e9;
    box-shadow: 0 0 20px #f7fffaf1, 0 0 40px rgb(194, 235, 212) inset;
    border-radius: 10px;
    overflow: hidden;
}

.content2 {
    position: relative;
    z-index: 1;
    background-color: #d8e8e9;
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.928), 0 0 40px rgb(255, 236, 234) inset;

    border-radius: 10px;
    overflow: hidden;
}

.modal-content1:before {
    content: "";
    position: absolute;
    top: -2px;
    left: -2px;
    bottom: -2px;
    right: -2px;
    z-index: -1;
    background-image: linear-gradient(-45deg, rgba(12, 190, 244, 0.2) 0%, rgba(5, 194, 237, 0) 100%);
    animation: sparkle 1.5s linear infinite;
}

.page-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1040;
    background-color: transparent;
    opacity: 0;
}

.modal-content2:before {
    content: "";
    position: absolute;
    top: -2px;
    left: -2px;
    bottom: -2px;
    right: -2px;
    z-index: -1;
    background-image: linear-gradient(-45deg, rgba(12, 190, 244, 0.2) 0%, rgba(5, 194, 237, 0) 100%);
    animation: sparkle 1.5s linear infinite;
}

.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.9);
    /* semi-transparent black color */
    filter: brightness(100%);
    /* reduce brightness by 50% */
    backdrop-filter: blur(5px);
    width: 200%;
    height: 200%;
}

</style>

</html>
