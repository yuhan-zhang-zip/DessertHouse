<?php

/**
 * This is the model class for table "tbl_dorder".
 *
 * The followings are the available columns in table 'tbl_dorder':
 * @property integer $did
 * @property integer $oid
 * @property integer $pid
 * @property integer $amount
 */
class Dorder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dorder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_dorder';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('oid, pid, amount', 'required'),
			array('oid, pid, amount', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('did, oid, pid, amount', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'did' => 'Did',
			'oid' => 'Oid',
			'pid' => 'Pid',
			'amount' => 'Amount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions
	 *
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('did',$this->did);
		$criteria->compare('oid',$this->oid);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function rankAmountList(){
		$allSale = $this->findAll();
		$pidList = $this->getpidList();
		$rankList = array();
		for ($m=0; $m < count($pidList); $m++) { 
			$saleTotal = 0;
			for ($j=0; $j < count($allSale); $j++) { 
				 if ($pidList[$m]==$allSale[$j]->pid) {
					$saleTotal=$saleTotal+$allSale[$j]->amount;
			     }
			}
			array_push($rankList, array('pid'=>$pidList[$m],'amount'=>$saleTotal));
		}
		usort($rankList,function($x,$y){
			if ($x['amount'] == $y['amount']) {
				return 0;
			} else if($x['amount'] < $y['amount']){
				return 1;
			}
			else{
				return -1;
			}	
		});
		//return $rankList;
		return $rankList;
	}

	

	public function getpidList(){
		$allSale = $this->findAll();
		$pidList = array();
		$rankList = array();
		$pCount = 0;
		//add all pid to pid list
		for ($i=0; $i < count($allSale); $i++) { 
			array_push($pidList, $allSale[$i]->pid);
		}
		$pidList = array_unique($pidList);
		$pidList = array_values($pidList);
		return $pidList;
	}

	public function rankSalesList(){
		$allSale = $this->findAll();
		$pidList = $this->getpidList();
		$rankList = array();
		for ($m=0; $m < count($pidList); $m++) { 
			$saleTotal = 0;
			for ($j=0; $j < count($allSale); $j++) { 
				 if ($pidList[$m]==$allSale[$j]->pid) {
				 	$product = new Product();
				 	$product = $product->getProductById($pidList[$m]);
				 	$price  = $product->price;
					$saleTotal=$saleTotal+($allSale[$j]->amount) * $price;
			     }
			}
			array_push($rankList, array('pid'=>$pidList[$m],'sale'=>$saleTotal));
		}
		usort($rankList,function($x,$y){
			if ($x['sale'] == $y['sale']) {
				return 0;
			} else if($x['sale'] < $y['sale']){
				return 1;
			}
			else{
				return -1;
			}	
		});
		//return $rankList;
		return $rankList;
	}

	public function getTypeList(){
		$allSale = $this->findAll();
		$bread = 0;
		$dessert = 0;
		$homeDinner = 0;
		$wien = 0;
		foreach ($allSale as $saleItem) {
			$pid = $saleItem['pid'];
			$amount = $saleItem['amount'];
			$product = new Product();
			$product = $product->getProductById($pid);
			$price = $product->price;
			$type = $product->type;
			switch ($type) {
				case 0:
					$bread = $bread + $price * $amount;
					break;
				
				case 1:
					$dessert = $dessert + $price * $amount;
					break;
				
				case 2:
					$homeDinner = $homeDinner + $price * $amount;
					break;
				case 3:
					$wien = $wien + $price * $amount;
					break;
				
				default:
					# code...
					break;
			}
		}
		return array('bread'=>$bread,'dessert'=>$dessert,
					 'homeDinner'=>$homeDinner,'wien'=>$wien);
	}

}














