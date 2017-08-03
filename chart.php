<?php
error_reporting(-1);
$graphLength = "50";
if (isset($_GET['graph_len_name'])) {
    $graphLength = $_GET['graph_len_name'];
}
require_once(dirname(__FILE__) . "/BusinessLogicLayer/accelClass.php");
require_once(dirname(__FILE__) . "/BusinessLogicLayer/ftt/FFT.class.php");
$acc = new accelClass($graphLength);

function echoFourierUI($accelId, $acc) {
    $accResult = $acc->getAllAccelData($accelId);
    $xFourier = array();
    $yFourier = array();
    $zFourier = array();
    if (count($accResult) > 0) {
        foreach ($accResult as $accI) {
            array_push($xFourier, $accI->x_val);
            array_push($yFourier, $accI->y_val);
            array_push($zFourier, $accI->z_val);
        }
        $xfft = new FFT(256);
        $yfft = new FFT(256);
        $zfft = new FFT(256);

        $xfftResult = $xfft->fft($xFourier);
        $yfftResult = $yfft->fft($yFourier);
        $zfftResult = $zfft->fft($zFourier);
        ?> 
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChartF<?php echo $accelId; ?>);
            function drawChartF<?php echo $accelId; ?>() {
                var dataF = google.visualization.arrayToDataTable([

                    ['', 'x Freq', 'y Freq', 'z Freq'],
        <?php
        for ($i = 3; $i < count($xfftResult) - 3; $i++) {
            echo '[\'\', ' . $xfftResult[$i]->getReal() . ', ' . $yfftResult[$i]->getReal() . ', ' . $zfftResult[$i]->getReal() . '],';
        }
        ?>
                ]);
                var optionsF<?php echo $accelId; ?> = {
                    title: 'Spectral Analysis',
                    curveType: 'function',
                    legend: {position: 'bottom'},
                    vAxis: {
                        title: 'Intensity',
                    }
                };
                var chart = new google.visualization.LineChart(document.getElementById('accel_chart_f<?php echo $accelId; ?>'));
                chart.draw(dataF, optionsF<?php echo $accelId; ?>);
            }
        </script>
        <?php
    }
}
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

        <!-- niu start-->
        <link href="/niu/assets/masterto/includes/widgets/slideshow/css/nivo-slider.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/niu/assets/masterto/themes/cgs/css/fonts/BebasNeue.css" media="screen" rel="stylesheet" type="text/css" />
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                    <li class="nav-header">Menu</li>
                    <li class="nav-divider"></li>

                    <li>
                        <a href="index.php">
                            <i class="fa fa-home"></i>
                            <span class="link-title">
                                Home
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="chart.php">
                            <i class="fa fa-bar-chart-o"></i>
                            <span class="link-title">
                                Charts
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="threshold.php">
                            <i class="fa fa-bell"></i>
                            <span class="link-title">
                                Alert
                            </span>
                        </a>
                    </li>
                    <li class="nav-divider"></li>


                </ul>
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
                    <br/>

                    <h4>From Date: <input type="text" id="chartdatefrom"></h4>

                    <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph1.php"); ?>                    
                    <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph2.php"); ?>

                    <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph3.php"); ?>
                    <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph4.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <!--jQuery -->
    <script src="assets/lib/jquery/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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


    <script>
        //2012-08-01T05%3A00%3A00.000Z   2012-08-01T05:00:00.000Z
        var fromDate = '1';
        var toDate = 'now/d';
        $(function () {
            $("#chartdatefrom").datepicker(
                    {
                        dateFormat: 'yy-mm-dd',
                        onSelect: function (dateText) {
                            var dFrom = Date.parse(dateText);
                            var dNow = new Date();
                            fromDate = Math.ceil((Math.abs(dNow - dFrom)) / (1000 * 3600 * 24));
                            var param = '(refreshInterval%3A(\'%24%24hashKey\'%3A\'object%3A1626\'%2Cdisplay%3A\'5%20seconds\'%2Cpause%3A!f%2Csection%3A1%2Cvalue%3A5000)%2Ctime%3A(from%3Anow-' + fromDate + 'd%2Cmode%3Arelative%2Cto%3Anow))';
                            $('#iframe_accel1').attr('src', $('#iframe_accel1').attr('src').split("g=")[0] + 'g=' + param);
                            $('#iframe_accel2').attr('src', $('#iframe_accel2').attr('src').split("g=")[0] + 'g=' + param);
                            $('#iframe_accel3').attr('src', $('#iframe_accel3').attr('src').split("g=")[0] + 'g=' + param);
                            $('#iframe_accel4').attr('src', $('#iframe_accel4').attr('src').split("g=")[0] + 'g=' + param);
                        }
                    });

        });
    </script>

</body>

</html>
