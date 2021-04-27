<?php

use yii\db\Migration;

/**
 * Class m210426_212228_alter_student_table
 */
class m210426_212228_alter_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('student','class', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210426_212228_alter_student_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210426_212228_alter_student_table cannot be reverted.\n";

        return false;
    }
    */
}
