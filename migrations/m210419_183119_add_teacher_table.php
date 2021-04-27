<?php

use yii\db\Migration;

/**
 * Class m210419_183119_add_teacher_table
 */
class m210419_183119_add_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('teacher', [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'birth' => $this->date(),
                'postcode' => $this->integer(),
                'street' => $this->string(),
                'house_number' => $this->integer(),
                'distance_from' => $this->integer(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('teacher');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210419_183119_add_teacher_table cannot be reverted.\n";

        return false;
    }
    */
}
