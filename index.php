<?php
$graphLength = "50";
if (isset($_GET['graph_len_name'])) {
    $graphLength = $_GET['graph_len_name'];
}
require_once(dirname(__FILE__) . "/BusinessLogicLayer/accelClass.php");
$acc = new accelClass($graphLength);
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
        <title>Charts</title>

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



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--For Development Only. Not required -->
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
    </head>

    <body class="  ">
        <div class="bg-dark dk" id="wrap">
            <div id="left">
                <div class="media user-media bg-dark dker">
                    <div class="user-media-toggleHover">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="user-wrapper bg-dark">

                    </div>
                </div>
                <!-- #menu -->
                <ul id="menu" class="bg-blue dker">
                    <li class="nav-header">Menu</li>
                    <li class="nav-divider"></li>

                    <li>
                        <a href="test.php">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="link-title">
                                Charts
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="threshold.php">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="link-title">
                                Threshold
                            </span>
                        </a>
                    </li>
                    <li class="nav-divider"></li>


                </ul>
                <!-- /#menu -->
            </div>
            <!-- /#left -->
            <div id="content">
                <form>
                    <button name="graph_len_name" value="50" class="button">50</button>
                    <button name="graph_len_name" value="100" class="button">100</button>
                    <button name="graph_len_name" value="250" class="button">250</button>
                    <button name="graph_len_name" value="500" class="button">500</button>
                    <button name="graph_len_name" value="1mn" class="button">1 min</button>
                    <button name="graph_len_name" value="5mn" class="button">5 min</button>
                    <button name="graph_len_name" value="30mn" class="button">30 min</button>
                    <button name="graph_len_name" value="1hr" class="button">1 hr</button>
                    <button name="graph_len_name" value="5hr" class="button">5 hr</button>
                    <!--<button name="graph_len_name" value="td" class="button">Today</button>-->
                </form>

                <div class="outer">
                    <div class="inner bg-light lter">
                        <hr/>
                        <h1 class="display-4" style="text-align:center; color: brown">Northern Illionois University</h1>
                        <h3 class="display-4" style="text-align:right; color: brown">_Bridge IoT Experiment.</h3>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-6">
                                <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph1.php"); ?>
                            </div>
                            <!-- /.col-lg-6 -->


                            <div class="col-lg-6">
                                <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph2.php"); ?>
                                <!-- /.body -->

                                <!-- /.col-lg-6 -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph3.php"); ?>
                            </div>
                            <!-- /.col-lg-6 -->


                            <div class="col-lg-6">
                                <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph4.php"); ?>
                                <!-- /.body -->

                                <!-- /.col-lg-6 -->
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

            <script src="assets/js/style-switcher.js"></script>
    </body>

</html>
