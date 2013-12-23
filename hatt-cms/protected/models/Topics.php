<?php

/**
 * This is the model class for table "topics".
 *
 * The followings are the available columns in table 'topics':
 * @property string $id
 * @property string $users_id
 * @property string $categories_id
 * @property string $name
 * @property string $text
 * @property string $text_html
 * @property string $created_date
 * @property string $modify_date
 * @property integer $status
 * @property string $mod_comment
 *
 * The followings are the available model relations:
 * @property Categories $categories
 * @property Users $users
 * @property TopicsAttach[] $topicsAttaches
 */
class Topics extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'topics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text, text_html', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('users_id, categories_id', 'length', 'max'=>11),
			array('name', 'length', 'max'=>255),
			array('mod_comment', 'length', 'max'=>128),
			array('created_date, modify_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_id, categories_id, name, text, text_html, created_date, modify_date, status, mod_comment', 'safe', 'on'=>'search'),
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
			'categories' => array(self::BELONGS_TO, 'Categories', 'categories_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'topicsAttaches' => array(self::HAS_MANY, 'TopicsAttach', 'topics_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'users_id' => 'Users',
			'categories_id' => 'Categories',
			'name' => 'Name',
			'text' => 'Text',
			'text_html' => 'Text Html',
			'created_date' => 'Created Date',
			'modify_date' => 'Modify Date',
			'status' => 'Status',
			'mod_comment' => 'Mod Comment',
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
		$criteria->compare('users_id',$this->users_id,true);
		$criteria->compare('categories_id',$this->categories_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('text_html',$this->text_html,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('mod_comment',$this->mod_comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Topics the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
