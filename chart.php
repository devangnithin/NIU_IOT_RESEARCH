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
                <!--<div id="globalNav">
                <a id="NIU_Nav" name="NIU_Nav" ></a>
                <a href="http://www.niu.edu/web.shtml">A-Z </a> | 
                <a href="https://webcourses.niu.edu/webapps/portal/frameset.jsp">Blackboard</a> | 
                <a href="http://www.niu.edu/eas/caldirect.aspx?cal=*&amp;view=week&amp;format=list">Calendar</a> | 
                <a href="https://directory.niu.edu">Directory</a> | 
                <a href="http://myniu.niu.edu/">MyNIU</a> | 
            <a href="http://www.niutoday.info">NIU Today</a> | 
            <a href="http://www.niu.edu">NIU Home</a><br />
                </div>
            <div id="search"><a id="NIU_Site_Search" name="NIU_Site_Search" ></a>
            <form action="http://www.niu.edu/niusearch.asp" id="NIU_Search" name="SearchForm">
                <input name="cx" type="hidden" value="015599932022858976637:nq6dbpwtmdi" />
                <input name="cof" type="hidden" value="FORID:11" />
                <input accesskey="S" id="SearchNIU" maxlength="255" name="q" onfocus="this.value = '';" size="14" title="Search NIU" value="Search NIU" />
                                <input name="go" type="submit" value="GO!" /><br />
                                <a href="http://www.niu.edu/niusearch.asp" title="Advanced Search">Advanced Search</a>
                            </form>
                        </div>-->
                <hr style="margin-top:8.5%; box-shadow: 0 10px 10px -10px #8c8c8c inset; height: 10px"/>
            </div> 

            <div class="outer">
                <div class="inner bg-light lter">
                    <br/>
                    <!--<div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Range
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button onclick="window.open('chart.php?graph_len_name=50', '_self')"class="btn btn-secondary dropdown-toggle">  50  </button>
                            <button onclick="window.open('chart.php?graph_len_name=100', '_self')" class="btn btn-secondary dropdown-toggle"> 100 </button>
                            <button onclick="window.open('chart.php?graph_len_name=250', '_self')" class="btn btn-secondary dropdown-toggle"> 250</button>
                            <button onclick="window.open('chart.php?graph_len_name=500', '_self')" class="btn btn-secondary dropdown-toggle"> 500</button>
                            <button onclick="window.open('chart.php?graph_len_name=1mn', '_self')" class="btn btn-secondary dropdown-toggle"> 1 min</button>
                            <button onclick="window.open('chart.php?graph_len_name=5mn', '_self')" class="btn btn-secondary dropdown-toggle"> 5 min</button>
                            <button onclick="window.open('chart.php?graph_len_name=30mn', '_self')"  class="btn btn-secondary dropdown-toggle"> 30 min </button>
                            <button onclick="window.open('chart.php?graph_len_name=1hr', '_self')"  class="btn btn-secondary dropdown-toggle"> 1 hr</button>
                            <button onclick="window.open('chart.php?graph_len_name=5hr', '_self')"  class="btn btn-secondary dropdown-toggle"> 5 hr</button>
                        </div>
                    </div>-->

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
