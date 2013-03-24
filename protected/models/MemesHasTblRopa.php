<?php

/**
 * This is the model class for table "tbl_memes_has_tbl_ropa".
 *
 * The followings are the available columns in table 'tbl_memes_has_tbl_ropa':
 * @property integer $memes_id
 * @property integer $id_ropa
 */
class MemesHasTblRopa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemesHasTblRopa the static model class
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
		return 'tbl_memes_has_tbl_ropa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('memes_id, id_ropa', 'required'),
			array('memes_id, id_ropa', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('memes_id, id_ropa', 'safe', 'on'=>'search'),
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
			'memes_id' => 'Memes',
			'id_ropa' => 'Id Ropa',
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

		$criteria->compare('memes_id',$this->memes_id);
		$criteria->compare('id_ropa',$this->id_ropa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}