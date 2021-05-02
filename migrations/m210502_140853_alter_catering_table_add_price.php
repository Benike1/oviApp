<?php

use yii\db\Migration;

/**
 * Class m210502_140853_alter_catering_table_add_price
 */
class m210502_140853_alter_catering_table_add_price extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('catering', 'studentIds');
        $this->addColumn('catering', 'full_price_ids', $this->json());
        $this->addColumn('catering', 'half_price_ids', $this->json());
        $this->addColumn('catering', 'non_price_ids', $this->json());
        $this->addColumn('catering', 'teacher_ids', $this->json());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('catering', 'studentIds', $this->json());
        $this->dropColumn('catering', 'full_price_ids');
        $this->dropColumn('catering', 'half_price_ids');
        $this->dropColumn('catering', 'non_price_ids');
        $this->dropColumn('catering', 'teacher_ids');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210502_140853_alter_catering_table_add_price cannot be reverted.\n";

        return false;
    }
    */
}
