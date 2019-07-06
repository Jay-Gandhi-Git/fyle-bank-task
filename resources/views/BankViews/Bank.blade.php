<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fyle | Bank</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>--}}

    <script src="js/BankAjax.js"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>--}}

    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>

    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->


    <link href="css/custom.css" rel="stylesheet">
    {{--<script type="text/javascript">--}}
        {{--jQuery(window).load(function () {--}}
            {{--//jQuery("#status").fadeOut();--}}
            {{--jQuery("#preloader").delay(1800).fadeOut("slow");--}}
        {{--})--}}
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


            <div class="bs-example widget-shadow table table-responsive" data-example-id="hoverable-table">
                <h4>Bank Details</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="search-box">
                                <form class="input form-inline">
                                    <input class="sb-search-input input__field--madoka" placeholder="Search here..."
                                           type="search"
                                           id="input-31"/>
                                    <label class="input__label" for="input-31">
                                        <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77"
                                             preserveAspectRatio="none">
                                            <path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
                                        </svg>
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="search-box">
                                <form class="input form-inline">
                                    <label for="sel1" class="col-md-3">City </label>
                                    <select class="form-control" class="col-md-3" id="city">
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Banglore">Banglore</option>
                                        <option value="Chennai">Chennai</option>
                                        <option value="Pune">Pune</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover" id="tblData">
                    <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Bank Name</th>
                        <th style="text-align: center">Branch</th>
                        <th style="text-align: center">City</th>
                        <th style="text-align: center">State</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-9">
                        <div id="pager" class="col-md-6">
                            <ul id="pagination" class="pagination-sm"></ul>

                        </div>
                        <div class="col-md-2">
                            <div class="search-box">
                                <form class="input form-inline">
                                    {{--<label for="sel1" class="col-md-3">Per Page</label>--}}
                                    <select class="form-control" class="col-md-2" id="perPage">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

<script src="js/bootstrap.js"></script>

<script src="js/jquery.twbsPagination.min.js"></script>
<script src="js/jquery.twbsPagination.js"></script>

</body>
</html>