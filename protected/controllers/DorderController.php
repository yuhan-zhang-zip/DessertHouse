<?php

class DorderController extends Controller
{
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	/********************************************
     *              SELF DEFINE ACTION          *
	 ********************************************
	 */

	/**
	 * MAKE AN ORDER: ORDER , DETAILED ORDER
	 */
	public function actionMakeOrder($ridString){
		$uid = Yii::app()->user->id;
		$curUser = User::Model()->findByPk($uid);
		$userType = $curUser->type;
		$ridStrArray = explode(".", $ridString);
		$count = count($ridStrArray);
		$ridArray = array();
		$resArray = array();
		$productArray = array();
		$total = 0;
		for ($i=0; $i < $count; $i++) { 
			$ridArray[] = (int)$ridStrArray[$i];
			$resArray[] = Res::Model()->findByPk($ridArray[$i]);
			$productArray[] = Product::Model()->findByPk($resArray[$i]->pid);
			$total = $total+ $productArray[$i]->price * $resArray[$i]->amount;
			//update the status of cart
			$resArray[$i]->status = 2;
			$resArray[$i]->save();
			// update the amount in the product
			$productArray[$i]->amount = $productArray[$i]->amount - $resArray[$i]->amount;
			$productArray[$i]->save();
		}
		switch ($userType) {
			case 1:
				$total = $total * 0.9;
				break;
			
			case 2:
				$total = $total * 0.85;
				break;

			case 3:
				$total = $total * 0.75;
				break;

			default:
				# code...
				break;
		}
		$order = new Order();
		$order->total = $total;
		$order->save();
		$oid = $order->oid;
		for ($i=0; $i < $count; $i++) { 
			$dorder = new Dorder();
			$dorder->oid = $oid;
			$dorder->pid = $productArray[$i]->pid;
			$dorder->amount = $resArray[$i]->amount;
			$dorder->save();
		}
	}

	public function actionGetTotal($ridString){
		$uid = Yii::app()->user->id;
		$curUser = User::Model()->findByPk($uid);
		$userType = $curUser->type;
		$ridStrArray = explode(".", $ridString);
		$count = count($ridStrArray);
		$ridArray = array();
		$resArray = array();
		$productArray = array();
		$total = 0;
		$newTotal = 0;
		for ($i=0; $i < $count; $i++) { 
			$ridArray[] = (int)$ridStrArray[$i];
			$resArray[] = Res::Model()->findByPk($ridArray[$i]);
			$productArray[] = Product::Model()->findByPk($resArray[$i]->pid);
			$total = $total+ $productArray[$i]->price * $resArray[$i]->amount;
		}
		switch ($userType) {
			case 1:
				$newTotal = $total * 0.9;
				break;
			
			case 2:
				$newTotal = $total * 0.85;
				break;

			case 3:
				$newTotal = $total * 0.75;
				break;

			default:
				$newTotal = $total;
				break;
		}
		$totalArray = array("total"=>$newTotal,"type"=>$userType,"former"=>$total);
		echo json_encode($totalArray);
	}
	/**
	 * RENDER THE VIEW OF RANK OF SALE
	 */
	public function actionRankAmount(){
		$dorder = new Dorder();
		$rankList = $dorder->rankAmountList();
		$this->render('amountList',array("rankList"=>$rankList));
	}

	/**
	 * RENDER THE VIEW OF RANK OF SALE
	 */
	public function actionRankSale(){
		$dorder = new Dorder();
		$rankList = $dorder->rankSalesList();
		$this->render('saleList',array("rankList"=>$rankList));
	}

	public function actionMakeTypeGraph(){
		 $dorder = new Dorder();
		 $rankList = $dorder->rankSalesList();
		 include("pChart/pData.class");
		 include("pChart/pChart.class");

		 $typeList = $dorder->getTypeList();
		 echo json_encode($typeList);

	}

	public function actionTrend(){
		$this->render('trend');
	}
}











