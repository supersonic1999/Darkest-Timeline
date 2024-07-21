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
 * @property boolean|null $is_political
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
            [['is_political'], 'boolean'],
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
            'is_political' => 'Is Political',
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
            'is_political' => $this->is_political,
        ];
    }

    public function getVoteCount() {
        return Votes::find()->andWhere(['timeline_id' => $this->id])->count();
    }

    public function getVoteMonthlyCount() {
        return Votes::find()->andWhere(['timeline_id' => $this->id])
            ->andWhere(['>', 'voted_at', strtotime(date("Y-m-01", time()))])->count();
    }
}
