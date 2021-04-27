<?php

use yii\db\Migration;

/**
 * Class m210427_224010_create_group_has_student
 */
class m210427_224010_create_group_has_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group_has_student', [
            'group_id' => $this->integer(11)->notNull(),
            'student_id' => $this->integer(11)->notNull(),
            'PRIMARY KEY (group_id, student_id)'
        ]);

        $this->addForeignKey(
            'group_has_student_group_id_group_id',
            'group_has_student',
            'group_id',
            'group',
            'id'
        );

        $this->addForeignKey(
            'group_has_student_student_id_student_id',
            'group_has_student',
            'student_id',
            'student',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210427_224010_create_group_has_student cannot be reverted.\n";

        return false;
    }
}
