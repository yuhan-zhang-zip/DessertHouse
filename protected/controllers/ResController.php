<?php

class ResController extends Controller
{
	public function actionCart()
	{
		$this->render('cart');
	}

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

	/****************************************
	 *    SELF DEFINED METOD BEGIN          *
	 ****************************************
	 */
	/**
	 * DISPLAY ALL THE NORMAL AND RES
	 */
	public function actionDisplay(){
		$id = Yii::app()->user->id;
		$res = new Res();
		$carts = $res->getCartById($id);
		$n_res = $res->getResById($id);
		$this->render("cart",array("cart"=>$carts,"res"=>$n_res));
	}

	/**
	 * MAKE A RESERVATION OR AN ORDER
	 * @param not necessary:int id(user id) 
	 * 		  :int pid : int amount: int status;
	 */
	public function actionToCart($pid,$amount,$status){
		$res = new Res(); 
	    $res->makeRes($pid,$amount,$status);
	}

	public function actionCancel($rid){
		$res = Res::model()->findByPk($rid);
		$res->delete();
	}


}