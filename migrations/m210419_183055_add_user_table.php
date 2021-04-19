<?php

use yii\db\Migration;

/**
 * Class m210419_183055_add_user_table
 */
class m210419_183055_add_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
                'id' => $this->primaryKey(),
                'username' => $this->string(),
                'password' => $this->string(),
                'authKey' => $this->string(),
                'accessToken' => $this->string()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }

}
