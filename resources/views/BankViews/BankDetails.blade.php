<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fyle | Bank Detail</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="/js/BankDetailAjax.js"></script>


    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom CSS -->
    <link href="/css/style.css" rel='stylesheet' type='text/css'/>
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="/js/jquery-1.11.1.min.js"></script>

    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="/css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->


    <link href="/css/custom.css" rel="stylesheet">
    {{--<script type="application/javascript">--}}
        {{--$(document).ready(function () {--}}
            {{--alert("Document loaded");--}}
            {{--var id = localStorage.getItem('Id');--}}
            {{--alert(id);--}}
            {{--$('#temp').html(id);--}}
        {{--});--}}
    {{--</script>--}}
</head>
<body class="cbp-spmenu-push">
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<div class="main-content">

    <div class="sticky-header header-section ">
        <div class="header-left">
            <div class="logo">
                <a href="/bank">
                    <h1>Fyle</h1>
                    <span>#Task 1</span>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="main-page " style="margin-top: 30px;">
        <div class="tables">
            <h3 class="title1">Tables</h3>


            <div class="panel-body widget-shadow">
                <h4 id="bankId">Bank Id :</h4>
                <table class="table" id="tblData">
                    <thead>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
</div>


<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeftPush = document.getElementById('showLeftPush'),
        body = document.body;

    showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
</script>

<script src="/js/bootstrap.js"></script>
</body>
</html>