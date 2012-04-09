<?php

/**
 * This is the model class for table "tbl_product".
 *
 * The followings are the available columns in table 'tbl_product':
 * @property integer $pid
 * @property string $name
 * @property double $price
 * @property integer $type
 * @property integer $amount
 * @property string $url
 * @property string $info
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'tbl_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, price, type, amount, url', 'required'),
			array('type, amount', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name, url', 'length', 'max'=>50),
			array('info', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pid, name, price, type, amount, url, info', 'safe', 'on'=>'search'),
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
			'pid' => 'Pid',
			'name' => 'Name',
			'price' => 'Price',
			'type' => 'Type',
			'amount' => 'Amount',
			'url' => 'Url',
			'info' => 'Info',
		);
	}

	public function getProducts($type){
		$criteria=new CDbCriteria;
		$criteria->condition='type=:type';
		$criteria->params=array(':type'=>$type);
		$products=$this->findAll($criteria); // $params is not needed
		return $products;
	}

	public function getProductById($pid){
		$product = $this->findByPk($pid);
		return $product;
	}

	public function buy($pid,$amount){
		$product = getProductById($pid);
		$product->amount = $product->amount-$amount;
		$product->save();
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pid',$this->pid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('type',$this->type);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('info',$this->info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}