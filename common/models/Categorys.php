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
            [['name', 'parent_id', 'created_at', 'updated_at', 'created_by'], 'required'],
            [['parent_id', 'created_by'], 'integer'],
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
}
