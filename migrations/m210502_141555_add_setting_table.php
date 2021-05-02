<?php

use yii\db\Migration;

/**
 * Class m210502_141555_add_setting_table
 */
class m210502_141555_add_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('setting',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'value' => $this->string(),
            'description' => $this->text(),
        ]);

        $this->insert('setting',[
            'name' => 'Dolgozó menü ár',
            'value' => 900,
            'description' => 'A dolgozók étkeztetésének ára.',
        ]);

        $this->insert('setting',[
            'name' => 'Gyermek menü ár',
            'value' => 600,
            'description' => 'A gyerekek étkeztetésének ára.',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210502_141555_add_setting_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210502_141555_add_setting_table cannot be reverted.\n";

        return false;
    }
    */
}
