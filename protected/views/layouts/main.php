<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="bootstrap/css/docs.css" rel="stylesheet">
    
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/google-code-prettify/prettify.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script>
    <script src="bootstrap/js/application.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body data-spy="scroll" data-target=".subnav" data-offset="50">

<div class="container" id="page">

	
	<!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">PAUL</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="">
                <a href="index.php?r=site/index">首頁</a>
              </li>
              <li class="">
                <a href="index.php?r=site/page&view=about">關於我</a>
              </li>
              <li class="">
                <a href="index.php?r=site/contact">聯繫我們</a>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                  好吃的
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="index.php?r=product/display&type=0">麵包</a></li>
                  <li><a href="index.php?r=product/display&type=1">甜點</a></li>
                  <li><a href="index.php?r=product/display&type=2">法國媽媽家常料理</a></li>
                  <li class="divider"></li>
                  <li><a href="index.php?r=product/display&type=3">維也納系列</a></li>
                </ul>
              </li>
              <?php
              	if (Yii::app()->user->name=="admin") {
              		// echo "<li class=\"\">
                // 			<a href=\"http://localhost/testdrive/index.php?r=user/admin\">客戶管理</a>
              		// 	  </li>";
                      ?>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                          管理
                          <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="index.php?r=user/admin">客戶管理</a></li>
                          <li><a href="index.php?r=product/admin">產品管理</a></li>
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                          統計數據
                          <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="index.php?r=dorder/rankAmount">銷量統計</a></li>
                          <li><a href="index.php?r=dorder/rankSale">營業額統計</a></li>
                          <li><a href="index.php?r=user/displayUserTypeList">會員情況統計</a></li>
                          <li><a href="index.php?r=dorder/trend">趨勢分析</a></li>
                        </ul>
                      </li>
                      
                      <?php
              	}
              ?>
              <li class="divider-vertical"></li>
              <li class="divider-vertical"></li>
              
              <?php
              	if (Yii::app()->user->isGuest) {
              		echo "<li class=\"\">
                			<a href=\"index.php?r=site/login\">登入(".Yii::app()->user->name.")</a>
              			  </li>";
              	}
              	else {
              		echo "<li class=\"\">
                			<a href=\"index.php?r=site/logout\">登出(".Yii::app()->user->name.")</a>
              			  </li>";
                  echo "<li class=\"\"><a href=\"index.php?r=user/reviseInfo\">修改資料</a></li>";
                  echo "<li class=\"active\"><a href=\"index.php?r=res/display\"><i class=\"icon-shopping-cart icon-white\"></i> 購物車</a></li>";
              	}
              ?>
              
              <li class="">
                <form class="navbar-search pull-left offset1" action="">
                  <input type="text" class="search-query span2" placeholder="Search">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
  
	<?php echo $content; ?>

	<div class="clear"></div>
  <div style="margin:10px 450px;">
    <img src="images/hr.png">
  </div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Zhang Yuhan<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
