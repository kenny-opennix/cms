<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property string $id
 * @property string $categories_group_id
 * @property string $name
 * @property integer $is_main
 * @property integer $is_show
 * @property integer $sort_index
 *
 * The followings are the available model relations:
 * @property CategoriesGroup $categoriesGroup
 * @property Topics[] $topics
 */
class Categories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_main, is_show, sort_index', 'numerical', 'integerOnly'=>true),
			array('categories_group_id', 'length', 'max'=>11),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, categories_group_id, name, is_main, is_show, sort_index', 'safe', 'on'=>'search'),
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
			'categoriesGroup' => array(self::BELONGS_TO, 'CategoriesGroup', 'categories_group_id'),
			'topics' => array(self::HAS_MANY, 'Topics', 'categories_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'categories_group_id' => 'Categories Group',
			'name' => 'Name',
			'is_main' => 'Is Main',
			'is_show' => 'Is Show',
			'sort_index' => 'Sort Index',
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
		$criteria->compare('categories_group_id',$this->categories_group_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('is_main',$this->is_main);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('sort_index',$this->sort_index);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
