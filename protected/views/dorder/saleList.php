<?php
	$this->breadcrumbs=array(
		'Sales Rank',
	);
?>
<script src="js/highcharts.src.js"></script>
<script src="js/modules/exporting.js"></script>



<script type="text/javascript">
$(function () {
    var chart;
    var dataList = new Array();
    var pName = $('.pName');
    var amountList = $('.amountList');
    for (var i = 0; i < pName.length; i++) {
    	var tmpArray = new Array();
    	tmpArray.push($(pName[i]).text());
    	tmpArray.push(parseInt($(amountList[i]).text()));
    	dataList.push(tmpArray);
    	//alert($(amountList[i]).text());
    };

    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: '銷售餅圖'
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Sale Statistics',
                data: dataList
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
			<h1>一周銷售額排名（BY TOTAL INCOME）：</h1>
			<hr>
			<div class="span10">
			<?php
			      		echo "<table class=\"table table-striped\" id=\"t_cart\">";
						echo "	  <thead>";
						echo "		    <tr>";
						echo "		      <th scope>商品名稱</th>";
						echo "		      <th scope=\"col\">排名</th>";
						echo "		      <th scope=\"col\">商品ID</th>";
						echo "		      <th scope=\"col\">一周總銷售額</th>";
						echo "		    </tr>";
						echo "		  </thead>";
						echo "		  <tbody>";
				      	for ($i=0; $i < 10; $i++) { 
				      		echo "<tr>";
				      		$pid = $rankList[$i]['pid'];
				      		$product = new Product();
				      		$product = $product->getProductById($pid);
				      		$productName = $product->name;
				      		$productID = $product->pid;
				      		echo "<th scope=\"row\" class=\"pName\">".$productName."</th>";
				      		echo "<td>".($i+1)."</td>";
				      		echo "<td>".$productID."</td>";
				      		echo "<td class=\"amountList\">".$rankList[$i]['sale']."</td>";
				      		echo "</tr>";
				      		if($i == (count($rankList)-1)){
				      			break;
				      		}
				      	}
				      	echo "</tbody>";
						echo "	</table>";
			      ?>
			      </div>
			      <!-- <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div> -->
		</div>
		<div class="row-fluid">
			<div class = "span3 offset5" style = "margin-left:400px;">
				<button class="btn btn-info buynow" data-toggle="modal" href="#myModal" id="$i">查看圖表</button>
			</div>
		</div>
	</div>
</div>

