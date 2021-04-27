<?php

use yii\db\Migration;

/**
 * Class m210419_185226_add_student_has_caregiver_table
 */
class m210419_185226_add_student_has_caregiver_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('student_has_caregiver', [
            'student_id' => $this->integer(11)->notNull(),
            'caregiver_id' => $this->integer(11)->notNull(),
            'PRIMARY KEY (student_id, caregiver_id)'
        ]);

        $this->addForeignKey(
            'student_has_caregiver_student_id_student_id',
            'student_has_caregiver',
            'student_id',
            'student',
            'id'
        );

        $this->addForeignKey(
            'student_has_caregiver_caregiver_id_caregiver_id',
            'student_has_caregiver',
            'caregiver_id',
            'caregiver',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('student_has_caregiver');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210419_185226_add_student_has_caregiver_table cannot be reverted.\n";

        return false;
    }
    */
}
