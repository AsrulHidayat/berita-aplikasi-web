<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $comment_id
 * @property int|null $article_id
 * @property string $name
 * @property string $email
 * @property string $content
 * @property string $comment_date
 * @property int|null $id_user
 *
 * @property Articles $article
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'id_user'], 'integer'],
            [['name', 'email', 'content'], 'required'],
            [['content'], 'string'],
            [['comment_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::class, 'targetAttribute' => ['article_id' => 'article_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'article_id' => 'Article ID',
            'name' => 'Name',
            'email' => 'Email',
            'content' => 'Content',
            'comment_date' => 'Comment Date',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::class, ['article_id' => 'article_id']);
    }
}
