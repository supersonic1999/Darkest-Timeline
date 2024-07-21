<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "votes".
 *
 * @property int $id
 * @property int $timeline_id
 * @property string $session_id
 * @property string $voted_at
 *
 * @property Timeline $timeline
 */
class Votes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'votes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timeline_id', 'session_id', 'voted_at'], 'required'],
            [['timeline_id'], 'integer'],
            [['session_id', 'voted_at'], 'string', 'max' => 255],
            [['timeline_id'], 'exist', 'skipOnError' => true, 'targetClass' => Timeline::class, 'targetAttribute' => ['timeline_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'timeline_id' => 'Timeline ID',
            'session_id' => 'Session ID',
            'voted_at' => 'Voted At',
        ];
    }

    /**
     * Gets query for [[Timeline]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimeline()
    {
        return $this->hasOne(Timeline::class, ['id' => 'timeline_id']);
    }
}
