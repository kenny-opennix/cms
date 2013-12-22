<?php

/**
 * This is the model class for table "topics_attach".
 *
 * The followings are the available columns in table 'topics_attach':
 * @property string $id
 * @property string $topics_id
 * @property string $name
 * @property string $create_date
 * @property string $physic_file
 *
 * The followings are the available model relations:
 * @property Topics $topics
 */
class TopicsAttach extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'topics_attach';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('topics_id', 'length', 'max'=>11),
			array('name', 'length', 'max'=>50),
			array('physic_file', 'length', 'max'=>256),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, topics_id, name, create_date, physic_file', 'safe', 'on'=>'search'),
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
			'topics' => array(self::BELONGS_TO, 'Topics', 'topics_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'topics_id' => 'Topics',
			'name' => 'Name',
			'create_date' => 'Create Date',
			'physic_file' => 'Physic File',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('topics_id',$this->topics_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('physic_file',$this->physic_file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TopicsAttach the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
