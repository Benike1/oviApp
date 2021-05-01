<?php

use yii\db\Migration;

/**
 * Class m210419_183141_add_student_table
 */
class m210419_183141_add_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student', [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'birth' => $this->date(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('student');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210419_183141_add_student_table cannot be reverted.\n";

        return false;
    }
    */
}
