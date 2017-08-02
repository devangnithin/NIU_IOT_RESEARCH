<div class="row">
    <div class="col-lg-6">
        <iframe src="http://localhost:5601/app/kibana#/visualize/edit/48a4d950-7733-11e7-9714-319201388e7e?embed=true&_g=(refreshInterval%3A('%24%24hashKey'%3A'object%3A682'%2Cdisplay%3A'5%20seconds'%2Cpause%3A!f%2Csection%3A1%2Cvalue%3A5000)%2Ctime%3A(from%3Anow-15m%2Cmode%3Aquick%2Cto%3Anow))" height="400px" width="100%"></iframe>
        <!--<iframe src="http://localhost:5601/app/kibana#/visualize/edit/48a4d950-7733-11e7-9714-319201388e7e?embed=true&_g=()" height="400px" width="100%"></iframe>-->
    </div>
    <div class="col-lg-6">
        <div id="accel_chart_f1" style="height: 500px;" width="100%"></div>
    </div>
</div>
<?php
echoFourierUI(1, $acc);
