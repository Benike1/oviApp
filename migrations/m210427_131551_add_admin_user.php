<?php

use app\enums\StatusEnum;
use app\models\User;
use yii\db\Migration;

/**
 * Class m210427_131551_add_admin_user
 */
class m210427_131551_add_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User([
            'id' => 1,
            'username' => 'admin',
            'password_hash' => 'admin',
            'email' => 'admin@admin.a',
            'status' => StatusEnum::ACTIVE,
        ]);

        $user->generateAuthKey();
        $user->setPassword('admin');

        if (!$user->save()){
            return false;
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210427_131551_add_admin_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210427_131551_add_admin_user cannot be reverted.\n";

        return false;
    }
    */
}
