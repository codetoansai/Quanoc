<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categorys".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 */
class Categorys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $data;
    public static function tableName()
    {
        return 'categorys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'required'],
            [['name','created_by'], 'required','message'=>'Tên không được để trống'],
            [['parent_id', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'date','format'=>'php:Y-m-d'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }
    public function getAllCate($parent=0,$level="--|"){
        $data_cate=Categorys::find()->asArray()->where('parent_id=:parent',['parent'=>$parent])->all();
        foreach ($data_cate as $value){
            if($value['parent_id']==0){
                $level="--|";
            }
            $this->data[$value['id']]=$level.$value['name'];
            self::getAllCate($value['id'],$level."--|");
        }
        return $this->data;
    }
}
