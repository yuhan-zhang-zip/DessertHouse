<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'修改信息',
);

?>

<div class="container-fluid">
	<div class="row-fluid">
    <div class="span5">
        <fieldset>
          <legend>修改您的個人信息</legend>
          <div class="control-group">
            <label class="control-label">您的姓名</label>
            <div class="controls">
              <span class="input-xlarge uneditable-input"><?php echo $user->username?></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="focusedInput">您的密碼</label>
            <div class="controls">
              <input class="input-xlarge edit" id="focusedInput" type="text" placeholder="<?php echo $user->password?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">性別</label>
            <div class="controls">
              <span class="input-xlarge uneditable-input"><?php echo $user->sex?></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="focusedInput">您的年齡</label>
            <div class="controls">
              <input class="input-xlarge edit num" id="focusedInput" type="text" placeholder="<?php echo $user->age?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="focusedInput">地址</label>
            <div class="controls">
              <input class="input-xlarge edit" id="focusedInput" type="text" placeholder="<?php echo $user->address?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="focusedInput">☎</label>
            <div class="controls">
              <input class="input-xlarge edit" id="focusedInput" type="text" placeholder="<?php echo $user->tel?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="focusedInput">E-mail</label>
            <div class="controls">
              <input class="input-xlarge edit" id="focusedInput" type="text" placeholder="<?php echo $user->email?>">
            </div>
          </div>
          <div class="">
            <button class="btn btn-primary" id="revise_submit">提交修改</button>
            <button class="btn revise_cancel">取消</button>
          </div>
        </fieldset> 
    </div>
    <div class="span5" style="margin-left:120px;">
    	<img src="images/contact.png">
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
 		$('#revise_submit').click(function(){
 			  	  var inputCompArray = $(".edit");
 			  	  var password;
 			  	  var age;
 			  	  var address;
 			  	  var tel;
 			  	  var email;
 			  	  password = $(inputCompArray[0]).val();
 			  	  age = $(inputCompArray[1]).val();
 			  	  address=$(inputCompArray[2]).val();
 			  	  tel=$(inputCompArray[3]).val();
 			  	  email=$(inputCompArray[4]).val();
 			  	  if (password=="") {
 			  	  	password = $(inputCompArray[0]).attr("placeholder");
 			  	  };
 			  	  if (age=="") {
 			  	  	age= $(inputCompArray[1]).attr("placeholder");
 			  	  };
 			  	  if (address=="") {
 			  	  	address= $(inputCompArray[2]).attr("placeholder");
 			  	  };
 			  	  if (tel=="") {
 			  	  	tel= $(inputCompArray[3]).attr("placeholder");
 			  	  };
 			  	  if (email=="") {
 			  	  	email= $(inputCompArray[4]).attr("placeholder");
 			  	  };
 			  	  age = parseInt(age);
 			  	  $.get("http://localhost/testdrive/index.php?r=user/revise", 
 			  	  	{ "password": password,"age" : age,"address": address,"tel":tel,"email":email});
 			  	  window.location.href='http://localhost/testdrive/index.php';
 				});	 
 	    $(".num").blur(function(){
 	    	if(isNaN($(this).val())){
 	    		$(this).val("");
 	    	}
 	    }); 
 	    $(".revise_cancel").click(function(){
 	    		$(".edit").val("");
 	    });
 	});
</script>










