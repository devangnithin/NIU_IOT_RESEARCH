<div class="row">
    <div class="col-lg-6">
        <h4>Acceleration Values (Accelerometer 2):</h4>
        <!--<iframe id = 'iframe_accel1' src="http://localhost:5601/app/kibana#/visualize/edit/48a4d950-7733-11e7-9714-319201388e7e?embed=true&_g=(refreshInterval%3A('%24%24hashKey'%3A'object%3A1626'%2Cdisplay%3A'5%20seconds'%2Cpause%3A!f%2Csection%3A1%2Cvalue%3A5000)%2Ctime%3A(from%3Anow-2d%2Cmode%3Arelative%2Cto%3Anow))" height="400px" width="100%"></iframe>-->
        <iframe src="http://localhost:5601/app/kibana#/visualize/edit/8b9c7150-7e18-11e7-a28f-c595b5bf2154?embed=true&_g=(refreshInterval%3A('%24%24hashKey'%3A'object%3A596'%2Cdisplay%3A'5%20seconds'%2Cpause%3A!f%2Csection%3A1%2Cvalue%3A5000)%2Ctime%3A(from%3Anow-15m%2Cmode%3Aquick%2Cto%3Anow))" height="600" width="800"></iframe>
    </div>
    <div class="col-lg-6">
        <!-- selecter start-->
<!--        <div class="filter-bar" ng-show="filters.length || showAddFilterButton()" style="background: #ecf0f1; padding: 5px 6px 3px">

            <div class="filter-link">
                <div class="filter-description small">
                    <a tabindex="0" role="button">
                        Add a filter
                        <span class="fa fa-plus"></span>
                    </a>
                </div>
            </div>

             ngIf: editingFilter 
        </div>-->
        <!-- selected end -->
        <!--<div id="accel_chart_f1" style="height: 500px;" width="100%"></div>-->
        <h4>Spectral Analysis (Accelerometer 2):</h4>
        <iframe src="http://localhost:5601/app/kibana#/visualize/edit/0a004710-7d9c-11e7-bfc6-632c43c7d213?embed=true&_g=(refreshInterval%3A('%24%24hashKey'%3A'object%3A596'%2Cdisplay%3A'5%20seconds'%2Cpause%3A!f%2Csection%3A1%2Cvalue%3A5000)%2Ctime%3A(from%3Anow-15m%2Cmode%3Aquick%2Cto%3Anow))"  height="600" width="800"></iframe>
    </div>
</div>
<?php
//echoFourierUI(1, $acc);
