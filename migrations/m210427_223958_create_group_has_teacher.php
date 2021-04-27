<?php

use yii\db\Migration;

/**
 * Class m210427_223958_create_group_has_teacher
 */
class m210427_223958_create_group_has_teacher extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group_has_teacher', [
            'group_id' => $this->integer(11)->notNull(),
            'teacher_id' => $this->integer(11)->notNull(),
            'PRIMARY KEY (group_id, teacher_id)'
        ]);

        $this->addForeignKey(
            'group_has_teacher_group_id_group_id',
            'group_has_teacher',
            'group_id',
            'group',
            'id'
        );

        $this->addForeignKey(
            'group_has_teacher_teacher_id_teacher_id',
            'group_has_teacher',
            'teacher_id',
            'teacher',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210427_223958_create_group_has_teacher cannot be reverted.\n";

        return false;
    }
}
