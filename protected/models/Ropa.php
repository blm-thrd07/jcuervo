<?php

/**
 * This is the model class for table "tbl_ropa".
 *
 * The followings are the available columns in table 'tbl_ropa':
 * @property integer $id_ropa
 * @property string $url
 * @property string $complexion
 * @property integer $id_tipo_ropa
 *
 * The followings are the available model relations:
 * @property Memes[] $tblMemes
 * @property TipoRopa $idTipoRopa
 */
class Ropa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ropa the static model class
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
		return 'tbl_ropa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo_ropa', 'required'),
			array('id_tipo_ropa', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>45),
			array('complexion', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_ropa, url, complexion, id_tipo_ropa', 'safe', 'on'=>'search'),
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
			'Memes' => array(self::MANY_MANY, 'Memes', 'tbl_memes_has_tbl_ropa(id_ropa, memes_id)'),
			'TipoRopa' => array(self::BELONGS_TO, 'TipoRopa', 'id_tipo_ropa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ropa' => 'Id Ropa',
			'url' => 'Url',
			'complexion' => 'Complexion',
			'id_tipo_ropa' => 'Id Tipo Ropa',
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

		$criteria->compare('id_ropa',$this->id_ropa);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('complexion',$this->complexion,true);
		$criteria->compare('id_tipo_ropa',$this->id_tipo_ropa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}