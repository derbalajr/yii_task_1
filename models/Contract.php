<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property int $id
 * @property int|null $freelancer
 * @property string $title
 * @property string|null $description
 * @property float|null $rate
 *
 * @property Freelancer $freelancer0
 * @property Project[] $projects
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['freelancer'], 'integer'],
            [['title'], 'required'],
            [['title', 'description'], 'string'],
            [['rate'], 'number'],
            [['freelancer'], 'exist', 'skipOnError' => true, 'targetClass' => Freelancer::class, 'targetAttribute' => ['freelancer' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'freelancer' => 'Freelancer',
            'title' => 'Title',
            'description' => 'Description',
            'rate' => 'Rate',
        ];
    }

    /**
     * Gets query for [[Freelancer0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFreelancer0()
    {
        return $this->hasOne(Freelancer::class, ['id' => 'freelancer']);
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::class, ['contract' => 'id']);
    }
}
