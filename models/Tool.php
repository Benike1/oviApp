<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "tool".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $count
 */
class Tool extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tool';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Név',
            'description' => 'Leírás',
            'count' => 'Mennyiség',
        ];
    }
}
