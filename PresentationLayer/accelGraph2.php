<!--<div id="accel_chart2" style="width: 800px; height: 500px; float: left"></div>-->
<div class="row">
    <div class="col-lg-6">
        <!--<div id="accel_chart2" style="height: 500px;"></div>-->
        <iframe id="iframe_accel2" src="http://localhost:5601/app/kibana#/visualize/edit/16b18860-77bc-11e7-885b-f1bb4ab5f061?embed=true&_g=(refreshInterval%3A('%24%24hashKey'%3A'object%3A682'%2Cdisplay%3A'5%20seconds'%2Cpause%3A!f%2Csection%3A1%2Cvalue%3A5000)%2Ctime%3A(from%3Anow-15m%2Cmode%3Aquick%2Cto%3Anow))" height="400px" width="100%"></iframe>
    </div>
    <div class="col-lg-6">
        <div id="accel_chart_f2" style="height: 500px;"></div>
    </div>
</div>
<?php
echoFourierUI(2, $acc);
