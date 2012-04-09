<?php
$this->breadcrumbs=array(
	'Res'=>array('/res'),
	'Cart',
);?>

<div class="modal fade" id="checkModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>付款確認</h3>
  </div>
  <div class="modal-body">
  	<div class="row">
  		<div class = "span4">
  		<h2 id="vipPrompt"></h2>
  		</div>
	</div>
	
	<div class="row">
		<div class = "span4">
  		<div id = "formerPrompt">
  			
  		</div>
  		</div>
  		
	</div>
	<div class="row">
		<div class = "span4">
  		<div id = "totalPrompt">
  			
  		</div>
  		</div>
  		
	</div>
  <div class="modal-footer">
    <button class="btn btn-primary buy" id="confirm">確認付款</button>
    <button class="btn btn-info buy" data-dismiss="modal">關閉</button>
  </div>
</div>
</div>

<div class="container-fluid">
	<div class="well forCart">
		<div class="row-fluid">
			<h1>🚗 購物車列表：</h1>
			<hr>
			      <?php
			      	$count = count($cart);
			      	//echo $count;
			      	if ($count>0){
			      		echo "<table class=\"table table-striped\" id=\"t_cart\">";
						echo "	  <thead>";
						echo "		    <tr>";
						echo "		      <th>商品名稱</th>";
						echo "		      <th>訂購數量</th>";
						echo "		      <th>單價</th>";
						echo "		      <th>小記</th>";
						echo "		      <th>取消訂單</th>";
						echo "		    </tr>";
						echo "		  </thead>";
						echo "		  <tbody>";
				      	for ($i=0; $i < $count; $i++) { 
				      		echo "<tr>";
				      		$pid = $cart[$i]->pid;
				      	    $product = (new Product());
				      	    $productQ = $product->getProductById($pid);
				      		$productName = $productQ->name;
				      		$productPrice = $productQ->price;
				      		echo "<td>".$productName."</td>";
				      		echo "<td>".$cart[$i]->amount."</td>";
				      		echo "<td>".$productPrice."</td>";
				      		echo "<td>".$productPrice*$cart[$i]->amount."</td>";
				      		echo "<td><button class=\"btn btn-warning cancel\">取消訂單</button><span class=\"c_rid\" style=\"display:none\">".$cart[$i]->rid."</span></td>";
				      		echo "</tr>";
				      	}
				      	echo "<td></td>";
			      		echo "<td></td>";
			      		echo "<td></td>";
			      		echo "<td></td>";
			      		echo "<td><button class=\"btn btn-success\" id=\"checkOut\">现在结算</button></td>";
			      		echo "</tr>";
				      	echo "</tbody>";
						echo "	</table>";
						echo "<button class=\"btn btn-large btn-primary disabled\" id=\"thank\" style=\"display:none\" disabled=\"disabled\">謝謝您的選購，歡迎下次光臨</button>";
			        }
			        else {echo "<h3>親，現在購物車裡還沒有訂單，先到處逛逛吧:D</h3>";}
			      ?>
		</div>

	</div>
	<div class="well forRes">
		<div class="row-fluid">
			<h1>☎ 預定列表：</h1>
			<hr>
			      <?php
			      	$count = count($res);
			      	//echo $count;
			      	if ($count>0){
			      		echo "<table class=\"table table-striped\">";
						echo "	  <thead>";
						echo "		    <tr>";
						echo "		      <th>商品名稱</th>";
						echo "		      <th>訂購數量</th>";
						echo "		      <th>單價</th>";
						echo "		      <th>小記</th>";
						echo "		      <th>取消訂單</th>";
						echo "		    </tr>";
						echo "		  </thead>";
						echo "		  <tbody>";
				      	for ($i=0; $i < $count; $i++) { 
				      		echo "<tr>";
				      		$pid = $res[$i]->pid;
				      	    $product = (new Product());
				      	    $productQ = $product->getProductById($pid);
				      		$productName = $productQ->name;
				      		$productPrice = $productQ->price;
				      		echo "<td>".$productName."</td>";
				      		echo "<td>".$res[$i]->amount."</td>";
				      		echo "<td>".$productPrice."</td>";
				      		echo "<td>".$productPrice*$res[$i]->amount."</td>";
				      		echo "<td><button class=\"btn btn-warning cancel\">取消訂單</button><span class=\"r_rid\" style=\"display:none\">".$res[$i]->rid."</span></td>";
				      		echo "</tr>";
				      	}
				      	echo "</tbody>";
						echo "	</table>";
			        }
			        else {echo "<h3>親，現在購物車裡還沒有預定任何產品，先到處逛逛吧:D</h3>";}
			      ?>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
 		  	  $('.cancel').click(function(){			  	  
 			  	  var rid = parseInt($(this).next().text());
 			  	  $.get("index.php?r=res/cancel", { "rid": rid });
 			  	  $(this).html("取消成功");
 			  	  $(this).attr("class","btn btn-inverse");
 			  	  $(this).parent().parent().fadeOut();
 		  	  });
 		  	  $('#checkOut').click(function(){	
 			  	  var ridString;
 			  	  var ridArray = new Array();
 			  	  var ridComp = $(".c_rid");
 			  	  var count = ridComp.size();
 			  	  for (var i = 0; i < count; i++) {
 			  	  	   ridArray.push($(ridComp[i]).html());
 			  	  };
 			  	  ridString = ridArray.join('.');
 			  	  $.get("index.php?r=dorder/getTotal", { "ridString": ridString },function(json){
 			  	  		var jsonObj = jQuery.parseJSON(json);
 			  	  		var total = jsonObj.total;
 			  	  		var type = jsonObj.type;
 			  	  		var former = jsonObj.former;
 			  	  		switch(type)
					   {
					   	   case '0':
						     $("#vipPrompt").html("您尚未激活：不享受優惠");
						     break;
						   case '1':
						     $("#vipPrompt").html("您是銅級VIP：享受0.9折優惠");
						     break;
						   case '2':
						     $("#vipPrompt").html("您是銀級VIP：享受0.85折優惠");
						     break;
						   case '3':
						     $("#vipPrompt").html("您是金級VIP：享受0.75折優惠");
						     break;
						   default:
					   }
					   $("#formerPrompt").html("這次消費原價總共：<b>$"+former+".00</b> ");
					   $("#totalPrompt").html("這次消費折扣後總共：<b>$"+total+".00</b> ");
 			  	  });
 			  	  $('#checkModal').modal('toggle');
 		  	  });
 		  	  $('#confirm').click(function(){	
 			  	  var ridString;
 			  	  var ridArray = new Array();
 			  	  var ridComp = $(".c_rid");
 			  	  var count = ridComp.size();
 			  	  for (var i = 0; i < count; i++) {
 			  	  	   ridArray.push($(ridComp[i]).html());
 			  	  };
 			  	  ridString = ridArray.join('.');
 			  	  $.get("index.php?r=dorder/makeOrder", { "ridString": ridString });
 			  	  $("#t_cart").fadeOut();
 			  	  $("#thank").attr("style","");
 			  	  $("#thank").fadeIn();
 			  	  $('#checkModal').modal('toggle');
 		  	  });
 	});
 	function   sleep(n) 
    { 
        var   start=new   Date().getTime(); 
        while(true)   if(new   Date().getTime()-start> n)   break; 
    } 
</script>
