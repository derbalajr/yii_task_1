<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property int|null $contract
 *
 * @property Contract $contract0
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['contract'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['contract'], 'exist', 'skipOnError' => true, 'targetClass' => Contract::class, 'targetAttribute' => ['contract' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'contract' => 'Contract',
        ];
    }

    /**
     * Gets query for [[Contract0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContract0()
    {
        return $this->hasOne(Contract::class, ['id' => 'contract']);
    }
}
