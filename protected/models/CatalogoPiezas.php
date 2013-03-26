<?php

/**
 * This is the model class for table "tbl_catalogo_piezas".
 *
 * The followings are the available columns in table 'tbl_catalogo_piezas':
 * @property integer $id
 * @property integer $tipo_pieza_id
 * @property string $url
 *
 * The followings are the available model relations:
 * @property TblAvatarsPiezas[] $tblAvatarsPiezases
 * @property TblAvatarsPiezas[] $tblAvatarsPiezases1
 * @property TblTiposPiezas $tipoPieza
 */
class CatalogoPiezas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CatalogoPiezas the static model class
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
		return 'tbl_catalogo_piezas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_pieza_id, url', 'required'),
			array('tipo_pieza_id', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipo_pieza_id, url', 'safe', 'on'=>'search'),
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
			'tblAvatarsPiezases' => array(self::HAS_MANY, 'TblAvatarsPiezas', 'pieza_avatar_id'),
			'tblAvatarsPiezases1' => array(self::HAS_MANY, 'TblAvatarsPiezas', 'tipo_pieza_id'),
			'tipoPieza' => array(self::BELONGS_TO, 'TblTiposPiezas', 'tipo_pieza_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipo_pieza_id' => 'Tipo Pieza',
			'url' => 'Url',
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
		$criteria->compare('tipo_pieza_id',$this->tipo_pieza_id);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}