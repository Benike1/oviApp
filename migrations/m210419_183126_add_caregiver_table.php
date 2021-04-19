<?php

use yii\db\Migration;

/**
 * Class m210419_183126_add_caregiver_table
 */
class m210419_183126_add_caregiver_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('caregiver', [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'caregiver' => $this->boolean(),
                'postcode' => $this->integer(),
                'address' => $this->string(),
                'street' => $this->string(),
                'house_number' => $this->string(),
                'email' => $this->string(),
                'phone' => $this->string(),
                'phone_home' => $this->string(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('caregiver');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210419_183126_add_caregiver_table cannot be reverted.\n";

        return false;
    }
    */
}
