<?php

use yii\db\Migration;

/**
 * Class m210419_213410_user_admin
 */
class m210419_213410_user_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'Admin',
            'password' => 'admin'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'Admin']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210419_213410_user_admin cannot be reverted.\n";

        return false;
    }
    */
}
