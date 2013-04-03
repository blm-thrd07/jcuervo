<?php

/**
 * This is the model class for table "tbl_usuarios_has_tbl_comics".
 *
 * The followings are the available columns in table 'tbl_usuarios_has_tbl_comics':
 * @property integer $tbl_usuarios_id
 * @property integer $tbl_comics_id
 * @property integer $destacado
 * @property integer $NoComentarios
 * @property integer $NoVisto
 */
class UsuariosHasTblComics extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UsuariosHasTblComics the static model class
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
		return 'tbl_usuarios_has_tbl_comics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_usuarios_id, tbl_comics_id', 'required'),
			array('tbl_usuarios_id, tbl_comics_id, destacado, NoComentarios, NoVisto', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tbl_usuarios_id, tbl_comics_id, destacado, NoComentarios, NoVisto', 'safe', 'on'=>'search'),
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
				'Comic' => array(self::BELONGS_TO, 'Comics', 'tbl_comics_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tbl_usuarios_id' => 'Tbl Usuarios',
			'tbl_comics_id' => 'Tbl Comics',
			'destacado' => 'Destacado',
			'NoComentarios' => 'No Comentarios',
			'NoVisto' => 'No Visto',
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

		$criteria->compare('tbl_usuarios_id',$this->tbl_usuarios_id);
		$criteria->compare('tbl_comics_id',$this->tbl_comics_id);
		$criteria->compare('destacado',$this->destacado);
		$criteria->compare('NoComentarios',$this->NoComentarios);
		$criteria->compare('NoVisto',$this->NoVisto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}