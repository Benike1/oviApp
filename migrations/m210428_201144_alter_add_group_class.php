<?php

use yii\db\Migration;

/**
 * Class m210428_201144_alter_add_group_class
 */
class m210428_201144_alter_add_group_class extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('group', 'description', $this->text());
        $this->addColumn('group','age_group', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('group', 'description', $this->integer());
        $this->dropColumn('group','age_group');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210428_201144_alter_add_group_class cannot be reverted.\n";

        return false;
    }
    */
}
