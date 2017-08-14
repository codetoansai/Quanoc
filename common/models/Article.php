<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $image
 * @property integer $viewed
 * @property integer $user_id
 * @property integer $cate_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'content', 'image', 'viewed', 'user_id', 'cate_id', 'created_at', 'updated_at', 'created_by'], 'required'],
            [['description', 'content'], 'string'],
            [['viewed', 'user_id', 'cate_id', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 150],
            [['image'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'cate_id' => 'Cate ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }
}
