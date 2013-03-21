<?php

/**
 * This is the model class for table "tbl_tipo_ropa".
 *
 * The followings are the available columns in table 'tbl_tipo_ropa':
 * @property integer $id_tipo_ropa
 * @property string $tipo_ropa
 *
 * The followings are the available model relations:
 * @property Ropa[] $ropas
 */
class TipoRopa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TipoRopa the static model class
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
		return 'tbl_tipo_ropa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_ropa', 'length', 'max'=>45),
			array('id_tipo_ropa, tipo_ropa', 'safe', 'on'=>'search'),
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
			'ropas' => array(self::HAS_MANY, 'Ropa', 'id_tipo_ropa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_ropa' => 'Id Tipo Ropa',
			'tipo_ropa' => 'Tipo Ropa',
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

		$criteria->compare('id_tipo_ropa',$this->id_tipo_ropa);
		$criteria->compare('tipo_ropa',$this->tipo_ropa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}