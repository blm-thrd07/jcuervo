<?php

/**
 * This is the model class for table "tbl_avatars".
 *
 * The followings are the available columns in table 'tbl_avatars':
 * @property integer $id_meme
 * @property integer $tbl_usuarios_id
 * @property integer $id_zapato
 * @property string $imagen_armada
 *
 * The followings are the available model relations:
 * @property TblZapatos $idZapato
 * @property TblUsuarios $tblUsuarios
 * @property TblCara[] $tblCaras
 * @property TblRopa[] $tblRopas
 */
class Avatars extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Avatars the static model class
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
		return 'tbl_avatars';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_usuarios_id, id_zapato', 'required'),
			array('tbl_usuarios_id, id_zapato', 'numerical', 'integerOnly'=>true),
			array('imagen_armada', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_meme, tbl_usuarios_id, id_zapato, imagen_armada', 'safe', 'on'=>'search'),
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
			'idZapato' => array(self::BELONGS_TO, 'TblZapatos', 'id_zapato'),
			'tblUsuarios' => array(self::BELONGS_TO, 'TblUsuarios', 'tbl_usuarios_id'),
			'tblCaras' => array(self::MANY_MANY, 'TblCara', 'tbl_memes_has_tbl_cara(memes_id, id_cara)'),
			'tblRopas' => array(self::MANY_MANY, 'TblRopa', 'tbl_memes_has_tbl_ropa(memes_id, id_ropa)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_meme' => 'Id Meme',
			'tbl_usuarios_id' => 'Tbl Usuarios',
			'id_zapato' => 'Id Zapato',
			'imagen_armada' => 'Imagen Armada',
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

		$criteria->compare('id_meme',$this->id_meme);
		$criteria->compare('tbl_usuarios_id',$this->tbl_usuarios_id);
		$criteria->compare('id_zapato',$this->id_zapato);
		$criteria->compare('imagen_armada',$this->imagen_armada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}