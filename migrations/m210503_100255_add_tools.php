<?php

use yii\db\Migration;

/**
 * Class m210503_100255_add_tools
 */
class m210503_100255_add_tools extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('tool',[
            'name' => 'Kistraktor',
            'description' => 'Múlt héten vásárolt piros színű traktorok',
            'count' => 2,
        ]);
        $this->insert('tool',[
            'name' => 'Gumilabda',
            'description' => 'Hálós gumilabdák!',
            'count' => 45,
        ]);
        $this->insert('tool',[
            'name' => 'Ágyak',
            'description' => 'Az óvoda ágyai',
            'count' => 97,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210503_100255_add_tools cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210503_100255_add_tools cannot be reverted.\n";

        return false;
    }
    */
}
