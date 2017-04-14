<?php
require_once(dirname(__FILE__) . "/BusinessLogicLayer/thresholdClass.php");
$curThresh = (new thresholdClass())->getAllThreshData()[0];
//var_dump($curThresh);
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

                var x4 = $("[name='ax4']").val();
                var y4 = $("[name='ay4']").val();
                var z4 = $("[name='az4']").val();
                
                var data = {
                    x1: x1, y1: y1, z1: z1,
                    x2: x2, y2: y2, z2: z2,
                    x3: x3, y3: y3, z3: z3,
                    x4: x4, y4: y4, z4: z4
                }
                
                $.post("updateTresh.php", data)
                        .done(function (data) {
                            //$("#test").html(data);
                            if(data.indexOf("successfully updated") !== -1)
                            {
                                alert("Data Loaded Successfully: " + data);
                            } else {
                                alert("Update failed: "+ data);
                            }
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
                    <!--<li>
                        <a href="alerts.php">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="link-title">
                                Alerts
                            </span>
                        </a>
                    </li>-->
                    <li class="nav-divider"></li>


                </ul>
                <!-- /#menu -->
            </div>
            <!-- /#left -->
            <div id="content">

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
                                        <label>x value:<input class="form-control" type="text" name ="ax1" value="<?php echo $curThresh->x1 ?>" /></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>y value:<input class="form-control" type="text" name ="ay1" value="<?php echo $curThresh->y1 ?>" /></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>z value:<input class="form-control" type="text" name ="az1" value="<?php echo $curThresh->z1 ?>"/></label>
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
                                        <label>x value:<input class="form-control" type="text" name ="ax2" value="<?php echo $curThresh->x2 ?>"/></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>y value:<input class="form-control" type="text" name ="ay2"  value="<?php echo $curThresh->y2 ?>"/></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>z value:<input class="form-control" type="text" name ="az2"  value="<?php echo $curThresh->z2 ?>"/></label>
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
                                        <label>x value:<input class="form-control" type="text" name ="ax3"  value="<?php echo $curThresh->x3 ?>"/></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>y value:<input class="form-control" type="text" name ="ay3"  value="<?php echo $curThresh->y3 ?>"/></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>z value:<input class="form-control" type="text"  name ="az3" value="<?php echo $curThresh->z3 ?>"/></label>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 -->


                            <div class="col-lg-6">
                                <h2>Threshold for accel4: </h2>
                                <form>
                                    <!--<div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                                    </div>-->
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>x value:<input class="form-control" type="text" name ="ax4"  value="<?php echo $curThresh->x4 ?>"/></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>y value:<input class="form-control" type="text" name ="ay4" value="<?php echo $curThresh->y4 ?>"/></label>
                                    </div>
                                    <div class="row">
                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                        <label>z value:<input class="form-control" type="text" name ="az4" value="<?php echo $curThresh->z4 ?>"/></label>
                                    </div>
                                </form>
                                <!-- /.body -->

                                <!-- /.col-lg-6 -->
                            </div>
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

            <!--jQuery -->
            <script src="assets/lib/jquery/jquery.js"></script>

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
