<?php
	$this->breadcrumbs=array(
		'Sales Trend',
	);
?>
<script src="js/highcharts.src.js"></script>
<script src="js/modules/exporting.js"></script>



<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Monthly Average Temperature',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: WorldClimate.com',
                x: -20
            },
            xAxis: {
                categories: ['Sun', 'Mon', 'Tue', 'Wes', 'Thu', 'Fri',
                    'Sat']
            },
            yAxis: {
                title: {
                    text: 'Sales($ US Dollars)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>$'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Sales',
                data: [120, 150, 100, 400, 520, 300, 1200]
            }
            ]
        });
    });
    
});
        </script>



<div class="container-fluid">
	<div class="well forCart">
		<div class="row-fluid">
			<h1>一周銷售額趨勢分析 ：</h1>
		    <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

		</div>
	</div>
</div>

