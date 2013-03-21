<?php

/**
 * This is the model class for table "tbl_tipo_cara".
 *
 * The followings are the available columns in table 'tbl_tipo_cara':
 * @property integer $id_tipo_cara
 * @property string $tipo_cara
 *
 * The followings are the available model relations:
 * @property Cara[] $caras
 */
class TipoCara extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TipoCara the static model class
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
		return 'tbl_tipo_cara';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo_cara', 'numerical', 'integerOnly'=>true),
			array('tipo_cara', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tipo_cara, tipo_cara', 'safe', 'on'=>'search'),
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
			'caras' => array(self::HAS_MANY, 'Cara', 'id_tipo_cara'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_cara' => 'Id Tipo Cara',
			'tipo_cara' => 'Tipo Cara',
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

		$criteria->compare('id_tipo_cara',$this->id_tipo_cara);
		$criteria->compare('tipo_cara',$this->tipo_cara,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}