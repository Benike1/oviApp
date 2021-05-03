<?php

use yii\db\Migration;

/**
 * Class m210503_095933_add_setting
 */
class m210503_095933_add_setting extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('setting',[
            'name' => 'Üzemanyag ár (HUF/Km)',
            'value' => 8,
            'description' => 'A kilométerenként számolandó üzemanyag költségtérítés.',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210503_095933_add_setting cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210503_095933_add_setting cannot be reverted.\n";

        return false;
    }
    */
}
