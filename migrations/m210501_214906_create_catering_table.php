<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catering}}`.
 */
class m210501_214906_create_catering_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('{{%catering}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'studentIds' => $this->json(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catering}}');
    }
}
