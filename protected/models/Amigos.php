<?php

/**
 * This is the model class for table "tbl_amigos".
 *
 * The followings are the available columns in table 'tbl_amigos':
 * @property integer $usuarios_id
 * @property integer $amigo_id
 *
 * The followings are the available model relations:
 * @property TblUsuarios $usuarios
 * @property TblUsuarios $amigo
 */
class Amigos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Amigos the static model class
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
		return 'tbl_amigos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuarios_id, amigo_id', 'required'),
			array('usuarios_id, amigo_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usuarios_id, amigo_id', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::BELONGS_TO, 'TblUsuarios', 'usuarios_id'),
			'amigo' => array(self::BELONGS_TO, 'TblUsuarios', 'amigo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuarios_id' => 'Usuarios',
			'amigo_id' => 'Amigo',
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

		$criteria->compare('usuarios_id',$this->usuarios_id);
		$criteria->compare('amigo_id',$this->amigo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}