<?php
@session_start();
require_once(dirname(__FILE__) . "/BusinessLogicLayer/BL_LoginClass.php");
if (isset($_SESSION['Login'])) {
    $Login = unserialize($_SESSION['Login']);
} else
    $Login = new BL_LoginClass();

if (!$Login->LoginCheck()) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
} else {

    $ch = curl_init("http://localhost:8085/threshold");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = json_decode(curl_exec($ch));
    
    ?>

    <!doctype html>
    <html>

        <head>
            <meta charset="UTF-8">
            <!--IE Compatibility modes-->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--Mobile first-->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <title>Home</title>

            <meta name="description" content="Accelerometer Data">
            <meta name="author" content="">

            <meta name="msapplication-TileColor" content="#5bc0de" />
            <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

            <!-- Bootstrap -->
            <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">

            <!-- Font Awesome -->
            <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">

            <!-- Metis core stylesheet -->
            <link rel="stylesheet" href="assets/css/main.css">

            <!-- metisMenu stylesheet -->
            <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">

            <!-- onoffcanvas stylesheet -->
            <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">

            <!-- animate.css stylesheet -->
            <link rel="stylesheet" href="assets/lib/animate.css/animate.css">

            <!-- niu start-->
            <link href="/niu/assets/masterto/includes/widgets/slideshow/css/nivo-slider.css" media="screen" rel="stylesheet" type="text/css" />
            <link href="/niu/assets/masterto/themes/cgs/css/fonts/BebasNeue.css" media="screen" rel="stylesheet" type="text/css" />
            <link href="/niu/assets/masterto/includes/widgets/slideshow/themes/default/default.css" media="screen" rel="stylesheet" type="text/css" />
            <link href="/niu/assets/masterto/themes/standard_grey/css/master_1.css" media="screen" rel="stylesheet" type="text/css" />
            <link href="/niu/assets/masterto/themes/standard_grey/css/print_1.css" media="print" rel="stylesheet" type="text/css" />
        <contenttext><br />
            <div id="divCleekiAttrib" style="display: none;" ></div>
            <div id="divCleekiAttrib" style="display: none;" ></div>
            <div id="divCleekiAttrib" style="display: none;" ></div>
            <div id="divCleekiAttrib" style="display: none;" ></div>
            <div id="divCleekiAttrib" style="display: none;" ></div>
            <div id="divCleekiAttrib" style="display: none;" ></div>
            <div id="divCleekiAttrib" style="display: none;" ></div></contenttext> 
        <link href="/niu/assets/masterto/includes/csslibrary/general.css" media="screen" rel="stylesheet" type="text/css" />
        <!-- nie end-->



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script>
            function updateThresh() {
                var x1 = $("[name='ax1']").val();
                var y1 = $("[name='ay1']").val();
                var z1 = $("[name='az1']").val();
                var x2 = $("[name='ax2']").val();
                var y2 = $("[name='ay2']").val();
                var z2 = $("[name='az2']").val();
                var x3 = $("[name='ax3']").val();
                var y3 = $("[name='ay3']").val();
                var z3 = $("[name='az3']").val();
                /*var x4 = $("[name='ax4']").val();
                 var y4 = $("[name='ay4']").val();
                 var z4 = $("[name='az4']").val();*/

                var data = JSON.stringify({
                    "x1_thresh": parseInt(z1, 10),
                    "y1_thresh": parseInt(y1, 10),
                    "z1_thresh": parseInt(z1, 10),
                    "x2_thresh": parseInt(x2, 10),
                    "y2_thresh": parseInt(y2, 10),
                    "z2_thresh": parseInt(z2, 10),
                    "x3_thresh": parseInt(x3, 10),
                    "y3_thresh": parseInt(y3, 10),
                    "z3_thresh": parseInt(z3, 10)
                });

                $.post("PresentationLayer/updateTresh.php", data)
                        .done(function (data) {
                            alert("Elastic Search Updated");

                        })
                        .fail(function () {
                            alert("error");
                        })

            }
        </script>
        <script>
            less = {
                env: "development",
                relativeUrls: false,
                rootpath: "/assets/"
            };
        </script>
        <style>
            .button {
                background-color: Red; /* Green */
                border: none;
                color: white;
                padding: 5px 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }

            .selected {
                background-color: #4CAF50;
            }

        </style>

        <link rel="stylesheet" href="assets/css/style-switcher.css">
        <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body class="  ">
        <div class="bg-dark dk" id="wrap">
            <div id="left">
                <hr style="margin-top:53.8%; box-shadow: 0 10px 10px -10px #8c8c8c inset; height: 10px"/>
                <div style="margin-top:10%">

                    <div class="media user-media bg-dark dker">
                        <div class="user-media-toggleHover">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="user-wrapper bg-dark">
                        </div>
                    </div>
                    <!-- #menu -->
                    <!--<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>-->
                    <ul id="menu" class="bg-blue dker">
                        <li class="nav-header" style="font-size:30px;">Menu</li>
                        <li class="nav-divider"></li>

                        <li>
                            <a href="index.php">
                                <i class="fa fa-home" style="font-size:20px;"></i>
                                <span class="link-title" style="font-size:20px;">
                                    &nbsp; Home
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="chart.php">
                                <i class="fa fa-bar-chart-o" style="font-size:20px;"></i>
                                <span class="link-title" style="font-size:20px;">
                                    &nbsp; Charts
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="threshold.php">
                                <i class="fa fa-bell" style="font-size:20px;"></i>
                                <span class="link-title" style="font-size:20px;">
                                    &nbsp; Alert
                                </span>
                            </a>
                        </li>
                        <li class="nav-divider"></li>
    <?php
    if (!$Login->LoginCheck()) {
        ?>
                            <li>
                                <a href="logout.php">
                                    <i class="fa fa-sign-out" style="font-size:20px;"></i>
                                    <span class="link-title" style="font-size:20px;">
                                        &nbsp; Logout
                                    </span>
                                </a>
                            </li>
                            <li class="nav-divider"></li>
        <?php
    }
    ?>
                </div>
                <!-- /#menu -->
            </div>
            <!-- /#left -->
            <div id="content">
                <div id="header">
                    <h1><a href="http://www.niu.edu">
                            <img alt="NIU" border="0" height="120" src="/niu/assets/masterto/themes/standard_grey/images/NIU_logo.gif" width="70" /></a>
                    </h1>
                    <h2><img alt="Northern Illinois University" border="0" height="71px" src="/niu/assets/shared_content/images/department_headers/FFrenergy.jpg" width="500px" /></h2>
                    <hr style="margin-top:8.5%; box-shadow: 0 10px 10px -10px #8c8c8c inset; height: 10px"/>
                </div> 

                <div class="outer">
                    <div class="inner bg-light lter">
                        <div class="row">
                            <div class="col-lg-6">

                                <h2>Threshold for accel1: </h2>
                                <form>
                                    <!--<div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                                    </div>-->
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>x value:<input class="form-control" type="text" name ="ax1" value="<?php echo $result->x1_thresh; ?>" /></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>y value:<input class="form-control" type="text" name ="ay1" value="<?php echo $result->y1_thresh; ?>" /></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>z value:<input class="form-control" type="text" name ="az1" value="<?php echo $result->y1_thresh; ?>"/></label>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 -->


                            <div class="col-lg-6">
                                <h2>Threshold for accel2: </h2>
                                <form>
                                    <!--<div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                                    </div>-->
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>x value:<input class="form-control" type="text" name ="ax2" value="<?php echo $result->x2_thresh; ?>" /></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>y value:<input class="form-control" type="text" name ="ay2"  value="<?php echo $result->y2_thresh; ?>" /></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>z value:<input class="form-control" type="text" name ="az2"  value="<?php echo $result->z2_thresh; ?>" /></label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2>Threshold for accel3: </h2>
                                <form>
                                    <!--<div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                                    </div>-->
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>x value:<input class="form-control" type="text" name ="ax3"  value="<?php echo $result->x3_thresh; ?>" /></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>y value:<input class="form-control" type="text" name ="ay3"  value="<?php echo $result->y3_thresh; ?>" /></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>z value:<input class="form-control" type="text"  name ="az3" value="<?php echo $result->z3_thresh; ?>" /></label>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div id="test"></div>


                            <!--<div class="col-lg-6">
                                <h2>Threshold for accel4: </h2>
                                <form>
                            <!--<div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                            </div>--
                            <div class="row">
                                <span><i class="glyphicon glyphicon-pencil"></i></span>
                                <label>x value:<input class="form-control" type="text" name ="ax4"  </label>
                            </div>
                            <div class="row">
                                <span><i class="glyphicon glyphicon-pencil"></i></span>
                                <label>y value:<input class="form-control" type="text" name ="ay4" 
                            </div>
                            <div class="row">
                                <span><i class="glyphicon glyphicon-pencil"></i></span>
                                <label>z value:<input class="form-control" type="text" name ="az4" 
                            </div>
                        </form>
                            <!-- /.body --

                            <!-- /.col-lg-6 --
                            </div>-->
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <br/><br/><br/>
                                <!--<span><i class="glyphicon glyphicon-floppy-disk"></i></span>-->
                                <input type="button" value="Update" onclick="updateThresh()" class="btn btn-primary btn-block"/>
                                <br/><br/><br/>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--jQuery -->
        <script src="assets/lib/jquery/jquery.js"></script>

            <!--        <script src="//cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.selection.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.resize.min.js"></script>-->

        <!--Bootstrap -->
        <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
        <!-- MetisMenu -->
        <script src="assets/lib/metismenu/metisMenu.js"></script>
        <!-- onoffcanvas -->
        <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
        <!-- Screenfull -->
        <script src="assets/lib/screenfull/screenfull.js"></script>


        <!-- Metis core scripts -->
        <script src="assets/js/core.js"></script>
        <!-- Metis demo scripts -->
        <script src="assets/js/app.js"></script>

            <!--        <script>
            $(function () {
                Metis.MetisChart();
            });
                    </script>-->


    </body>

    </html>

    <?php
}