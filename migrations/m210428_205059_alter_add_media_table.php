<?php

use yii\db\Migration;

/**
 * Class m210428_205059_alter_add_media_table
 */
class m210428_205059_alter_add_media_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('file', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'description' => $this->text(),
            'filename' => $this->string(),
            'upload_path' => $this->text()
        ]);

        $this->createTable('teacher_has_file', [
            'teacher_id' => $this->integer(11)->notNull(),
            'file_id' => $this->integer(11)->notNull(),
            'PRIMARY KEY (teacher_id, file_id)'
        ]);

        $this->addForeignKey(
            'fk_teacher_has_file_teacher_id_teacher_id',
            'teacher_has_file',
            'teacher_id',
            'teacher',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_teacher_has_file_file_id_file_id',
            'teacher_has_file',
            'file_id',
            'file',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210428_205059_alter_add_media_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210428_205059_alter_add_media_table cannot be reverted.\n";

        return false;
    }
    */
}
