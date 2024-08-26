<!DOCTYPE html>
<html lang="en">

<head>

    <!-- All Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    <meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management">
    <meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
    <meta property="og:title" content="Akademi : School and Education Management Admin Dashboard Template">
    <meta property="og:description" content="Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
    <meta property="og:image" content="https://akademi.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title Here -->
    <title>Akademi : School and Education Management Admin Dashboard Template</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="../resources/template/images/favicon.png">
    <!-- Datatable -->
    <link href="../resources/template/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../resources/template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../resources/template/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="../resources/template/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../resources/template/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->

    <div id="preloader">
        <div class="loader">
            <div class="dots">
                <div class="dot mainDot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>

        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('layouts.header')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->


        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.menu')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body ">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>
        <!--**********************************
            Content body end
        ***********************************-->




        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button endw
        ***********************************-->
        <!--**********************************
			Footer start
		***********************************-->
        @include('layouts.footer') <!-- Incluye el footer -->
        <!--**********************************
			Footer end
		***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <!-- Required vendors -->
    <script src="../resources/template/vendor/global/global.min.js"></script>
    <script src="../resources/template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../resources/template/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../resources/template/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../resources/template/js/custom.js"></script>
    <script src="../resources/template/js/dlabnav-init.js"></script>
    <script src="../resources/template/js/demo.js"></script>
    <script src="../resources/template/js/styleSwitcher.js"></script>

    <!-- Datatable -->
    <script src="../resources/template/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../resources/template/js/plugins-init/datatables.init.js"></script>
    @yield('scripts')
</body>

</html>