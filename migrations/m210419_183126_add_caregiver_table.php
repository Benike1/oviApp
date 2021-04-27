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
}
