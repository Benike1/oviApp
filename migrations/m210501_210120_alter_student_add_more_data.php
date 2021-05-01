<?php

use yii\db\Migration;

/**
 * Class m210501_210120_alter_student_add_more_data
 */
class m210501_210120_alter_student_add_more_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('student', 'edu_id', $this->string());
        $this->addColumn('student', 'ssn_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('student', 'edu_id');
        $this->dropColumn('student', 'ssn_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210501_210120_alter_student_add_more_data cannot be reverted.\n";

        return false;
    }
    */
}
