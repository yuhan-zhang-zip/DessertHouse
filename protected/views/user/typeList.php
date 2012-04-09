<?php
	$this->breadcrumbs=array(
		'Type Statistics',
	);
?>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<script type="text/javascript">
$(function () {
    var chart;
    var admin = 0;
    var tong = 0;
    var sil = 0;
    var gold = 0;
    admin  = parseInt($($(".typeList")[0]).text());
    tong  = parseInt($($(".typeList")[1]).text());
    sil  = parseInt($($(".typeList")[2]).text());
    gold  = parseInt($($(".typeList")[3]).text());
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: '會員統計信息'
            },
            subtitle: {
                text: '來自PAUL的甜品屋'
            },
            xAxis: {
                categories: [
                    '未激活',
                    '銅牌會員',
                    '銀牌會員',
                    '銅牌會員',
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: '會員數量（個）'
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' mm';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: '會員類型',
                data: [admin,tong,sil,gold]
    
            }]
        });
    });
    
});
		</script>

<div class="modal fade" id="myModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>統計圖表</h3>
  </div>
  <div class="modal-body">
	<div class="row">
		<div class = "span5">
  		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
  		</div>
	</div>
  <div class="modal-footer">
    <button class="btn btn-info buy" data-dismiss="modal">關閉</button>
  </div>
</div>
</div>
<div class="container-fluid">
	<div class="well forCart">
		<div class="row-fluid">
			<h1>會員類型統計信息 ：</h1>
			<hr>
			<div class = "span10">
			<?php
			      		echo "<table class=\"table table-striped\" id=\"t_cart\">";
						echo "	  <thead>";
						echo "		    <tr>";
						echo "		      <th scope=\"col\">類型編號</th>";
						echo "		      <th scope=\"col\">會員類型</th>";
						echo "		      <th scope=\"col\">會員折扣</th>";
						
						echo "		      <th scope=\"col\">會員數量</th>";
						echo "		    </tr>";
						echo "	  </thead>";
						echo "<tbody>";
				      	for ($i=0; $i < count($typeList); $i++) { 
				      		$typeName = "";
				      		$discount = "";
				      		switch ($i) {
				      			case 0:
				      				$typeName = "未激活";
				      				$discount = "不參與優惠";
				      				break;
				      			
				      			case 1:
				      				$typeName = "銅牌會員";
				      				$discount = "95折";
				      				break;

				      			case 2:
				      				$typeName = "銀牌會員";
				      				$discount = "85折";
				      				break;

				      			case 3:
				      				$typeName = "金牌會員";
				      				$discount = "75折";
				      				break;
				      			default:
				      				# code...
				      				break;
				      		}

				      		echo "<tr>";
				      		echo "<td>".$i."</td>";
				      		echo "<td>".$typeName."</td>";
				      		echo "<td>".$discount."</td>";
				      		echo "<td class = \"typeList\">".$typeList[$i]."</td>";
				      		echo "</tr>";
				      	}
				      	echo "</tbody>";
						echo "	</table>";
						echo "<hr>";
			      ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class = "span3 offset5" style = "margin-left:400px;">
				<button class="btn btn-info buynow" data-toggle="modal" href="#myModal" id="$i">查看圖表</button>
			</div>
		</div>
	</div>
</div>

