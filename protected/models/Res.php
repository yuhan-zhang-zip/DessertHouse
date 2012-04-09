<?php

/**
 * This is the model class for table "tbl_res".
 *
 * The followings are the available columns in table 'tbl_res':
 * @property integer $rid
 * @property integer $id
 * @property integer $pid
 * @property integer $amount
 * @property string $time
 * @property integer $status
 */
class Res extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Res the static model class
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
		return 'tbl_res';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, pid, amount', 'required'),
			array('id, pid, amount, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rid, id, pid, amount,status', 'safe', 'on'=>'search'),
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
			'rid' => 'Rid',
			'id' => 'ID',
			'pid' => 'Pid',
			'amount' => 'Amount',
			'status' => 'Status',
		);
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

		$criteria->compare('rid',$this->rid);
		$criteria->compare('id',$this->id);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/****************************************
	 *    SELF DEFINED METOD BEGIN          *
	 ****************************************
	 */

	/**
	 * MAKE A RESERVATION
	 * @param int id(user id) :int pid : int amount: int status;
	 */
	public function makeRes($pid,$amount,$status=0){
		$res = new Res();
		$res->id = Yii::app()->user->id;
		$res->pid= $pid;
		$res->amount = $amount;
		$res->status = $status;
		$res->save();
	}
	/**
	 *	GET CART RESERVATION OBJECTS BY USER ID
	 *  @param int id(user id);
	 *  @return array of Res;
	 */
	public function getCartById($id){
		$criteria=new CDbCriteria;
		$criteria->condition='id=:id AND status=0';
		$criteria->params=array(':id'=>$id);
		$res=$this->findAll($criteria); // $params is not needed
		return $res;
	}
	/**
	 *	GET CART RESERVATION OBJECTS BY USER ID
	 *  @param int id(user id);
	 *  @return array of Res;
	 */
	public function getResById($id){
		$criteria=new CDbCriteria;
		$criteria->condition='status=1 AND id=:id';
		$criteria->params=array(':id'=>$id);
		$res=$this->findAll($criteria); // $params is not needed
		return $res;
	}

}