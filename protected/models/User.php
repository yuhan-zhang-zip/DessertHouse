<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $sex
 * @property integer $age
 * @property string $address
 * @property string $tel
 * @property string $email
 * @property integer $type
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, type', 'required'),
			array('age, type', 'numerical', 'integerOnly'=>true),
			array('username, password, address', 'length', 'max'=>128),
			array('sex', 'length', 'max'=>6),
			array('tel, email', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, sex, age, address, tel, email, type', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'sex' => 'Sex',
			'age' => 'Age',
			'address' => 'Address',
			'tel' => 'Tel',
			'email' => 'Email',
			'type' => 'Type',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/****************************************
	 *    SELF DEFINED METOD BEGIN          *
	 ****************************************
	 */

	/*
	 * Return the current login user;
	 */
	public function getCurrentUser(){
		$curUserId = Yii::app()->user->id;
		$curUser = $this->findByPk($curUserId);
		return $curUser;
	}

	/**
	 * Get current user Type
	 */
	public function getUserType(){
		$curUser = $this->getCurrentUser();
		$type = $curUser->type;
		return $type;
	}

	/**
	 *	Get user type list
	 */
	public function getUserTypeList(){
		$userTypeList = array();
		for ($i=0; $i < 4; $i++) { 
			$userTypeList[$i] = 0;
		}

		$userList = $this->findAll();
		foreach ($userList  as $user) {
			switch ($user->type) {
				case 0:
					$userTypeList[0]++;
					break;
				case 1:
					$userTypeList[1]++;		
					break;
				case 2:
					$userTypeList[2]++;
					break;
				case 3:
					$userTypeList[3]++;
					break;
				
				default:
					# code...
					break;
			}
		}
		return $userTypeList;
	}

}