<?php

/**
 * This is the model class for table "tbl_memes".
 *
 * The followings are the available columns in table 'tbl_memes':
 * @property integer $id
 * @property integer $id_background
 * @property string $comentario_globo
 * @property integer $id_zapato
 *
 * The followings are the available model relations:
 * @property Accesorios[] $tblAccesorioses
 * @property Destacatos[] $destacatoses
 * @property Background $idBackground
 * @property Zapatos $idZapato
 * @property Cara[] $tblCaras
 * @property Ropa[] $tblRopas
 * @property Usuarios[] $tblUsuarioses
 */
class Memes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Memes the static model class
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
		return 'tbl_memes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_background, id_zapato', 'required'),
			array('id_background, id_zapato', 'numerical', 'integerOnly'=>true),
			array('comentario_globo', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_background, comentario_globo, id_zapato', 'safe', 'on'=>'search'),
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
			'tblAccesorioses' => array(self::MANY_MANY, 'Accesorios', 'tbl_accesorios_has_tbl_memes(memes_id, id_accesorios)'),
			'destacatoses' => array(self::HAS_MANY, 'Destacatos', 'memes_id'),
			'idBackground' => array(self::BELONGS_TO, 'Background', 'id_background'),
			'idZapato' => array(self::BELONGS_TO, 'Zapatos', 'id_zapato'),
			'tblCaras' => array(self::MANY_MANY, 'Cara', 'tbl_memes_has_tbl_cara(memes_id, id_cara)'),
			'tblRopas' => array(self::MANY_MANY, 'Ropa', 'tbl_memes_has_tbl_ropa(memes_id, id_ropa)'),
			'tblUsuarioses' => array(self::MANY_MANY, 'Usuarios', 'tbl_usuarios_has_tbl_memes(memes_id, usuarios_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_background' => 'Id Background',
			'comentario_globo' => 'Comentario Globo',
			'id_zapato' => 'Id Zapato',
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
		$criteria->compare('id_background',$this->id_background);
		$criteria->compare('comentario_globo',$this->comentario_globo,true);
		$criteria->compare('id_zapato',$this->id_zapato);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}