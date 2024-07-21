<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timeline".
 *
 * @property int $id
 * @property string $date
 * @property string|null $dotColor
 * @property string|null $icon
 * @property string $title
 * @property string|null $text
 * @property string|null $suggester
 */
class Timeline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timeline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'title'], 'required'],
            [['date', 'dotColor', 'icon', 'title', 'text', 'suggester'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'dotColor' => 'Dot Color',
            'icon' => 'Icon',
            'title' => 'Title',
            'text' => 'Text',
            'suggester' => 'Suggester',
        ];
    }

    public function getJSONData() {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'dotColor' => $this->dotColor,
            'icon' => $this->icon,
            'title' => $this->title,
            'text' => $this->text,
            'suggester' => $this->suggester,
        ];
    }

    public function getVoteCount() {
        return Votes::find()->andWhere(['timeline_id' => $this->id])->count();
    }
}
