<?php

namespace app\models;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property int|null $cost
 * @property string|null $date_start
 * @property string|null $date_handover
 *
 * @property User $user
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'cost'], 'integer'],
            [['date_start', 'date_handover'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'title' => 'Название',
            'cost' => 'Стоимость',
            'date_start' => 'Дата начала',
            'date_handover' => 'Дата сдачи',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
