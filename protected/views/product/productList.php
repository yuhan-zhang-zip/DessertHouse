<?php
	$this->breadcrumbs=array(
		'Products View',
	);
?>

<h1>
	<?php
		switch ($type) {
			case 0:
				echo "麵包";
				break;
			case 1:
				echo "甜點";
				break;
			case 2:
				echo "法國媽媽的家常料理";
				break;
			case 3:
				echo "維也納系列";
				break;
			default:
				# code...
				break;
		}
	?>
</h1>
<br>
<div style="margin:10px 450px;">
	<img src="images/hr.png">
</div>
<br>

<?php 
	$productList = $this->productList;
	$count = count($productList);
	for ($i=0; $i < $count; $i++) { 
		echo "<div class=\"row\">";
		echo "<div class=\"span2\">";
		echo "<img src=\"".$productList[$i]['url']."\" class=\"productPic\">";
		echo "</div>";
		echo "<div class=\"span3 offset1\">";
		echo "<h3>簡介：".$productList[$i]['name']."</h3></br>";
		echo "<p>".$productList[$i]['info']."</p>";
		echo "</div>";
		echo "<div class=\"span2 offset2\">";
		echo "<h3>價格：</h3></br>";
		echo "<p>$".$productList[$i]['price'].".00</p>";
		echo "<i>餘量：</i>".$productList[$i]['amount']." 個";
		echo "</br>";echo "</br>";
		if ($productList[$i]['amount']>0) {
			echo "<button class=\"btn btn-info buynow\" data-toggle=\"modal\" href=\"#myModal\" id=".$i.">馬上訂購</button>";
			echo "<p style=\"display:none\">".$productList[$i]['pid']."</p>";
		}
		else{
			echo "<button class=\"btn btn-danger res buynow\" data-toggle=\"modal\" href=\"#myModal\" id=".$i.">現在預定</button>";
			echo "<p style=\"display:none\">".$productList[$i]['pid']."</p>";
		}
		echo "</div>";
		echo "</div>";
		echo "<hr>";
	}

?>
<div class="modal fade" id="myModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>下單</h3>
  </div>
  <div class="modal-body">
  	<div class="row">
  		<div class="span3">
	   		<h2></h2>
	   		<hr>
	    	<h3 id="priceBuy"></h3>
	    	<h3 id="amountBuy"></h3>
	    </div>
	    <div class="span2">
	   		<img src="" class="productPic">
	    </div>
	</div>
    <div class="control-group success">
            <label class="control-label" for="inputSuccess">購買數量</label>
            <div class="controls">
              <input type="text" id="inputSuccess">
              <span class="help-inline"></span>
            </div>
          </div>
    </div>
  <div class="modal-footer">
    <button class="btn btn-primary buy">加入購物車</button>
    <button class="btn btn-info buy" data-dismiss="modal">關閉</button>
  </div>
</div>
<script type="text/javascript">
 	var tobuyid;
 	var pid;
 	var amount;
 	var isRes = false;
 	$(document).ready(function(){
 			  $('.buy').click(function(){			  	  
 			  	  //$.post("test.cgi", { "pid": pid });
 			  	  if(!isRes){
	 			  	  if(isNaN($('#inputSuccess').val())) {
	 			  	  	$(".help-inline").html("請輸入數字");
	 			  	  }
	 			  	  else if(parseInt($('#inputSuccess').val())>amount){
	 			  	  	$(".help-inline").html("親，貨不夠了唷～");
	 			  	  }
	 			  	  else{
	 			  	  	$(".help-inline").html("");
	 			  	  	var need = parseInt($('#inputSuccess').val());
	 			  	  	//alert(need);
	 			  	  	$.get("index.php?r=res/toCart", 
	 			  	  		{ "pid": pid ,"amount":need,"status":0});
	 			  	  	$('#inputSuccess').val("");
	 			  	  	$('#myModal').modal('hide');
	 			  	  }	
 			  	  }	  	 
 			  	  else {
 			  	  	var need = parseInt($('#inputSuccess').val());
 			  	  	$.get("index.php?r=res/toCart", 
	 			  	  		{ "pid": pid ,"amount":need,"status":1});
 			  	  	$('#myModal').modal('hide');
 			  	  } 
 		  	  });
 		  	  $('.res').click(function(){			  	  
 			  	  $(".modal-header h3").html("預購");
 			  	  isRes = true;
 		  	  });
 		  	  
 		  	  $('.buynow').click(function(){
 			  	  tobuyid = $(this).attr("id");
 			  	  pid = parseInt($("#"+tobuyid).next().text());
 			  	  //alert(tobuyid);
 			  	  $.get("index.php?r=product/getProductInfo", { "pid": pid },
 					  function(json){
					    var jsonObj = jQuery.parseJSON(json);
					    var name = jsonObj.name;
					    var price = jsonObj.price;
					    var url = jsonObj.url;
					    amount = jsonObj.amount;
					    $(".modal-body h2").html("品名："+name);
					    $("#priceBuy").html("單價：$"+price+".00");
					    $("#amountBuy").html("餘量："+amount);
					    $(".modal-body img").attr("src",url);
 				   });
 		  	  });
 	});
 </script>



