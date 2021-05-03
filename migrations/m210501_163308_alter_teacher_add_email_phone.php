<?php

use yii\db\Migration;

/**
 * Class m210501_163308_alter_teacher_add_email_phone
 */
class m210501_163308_alter_teacher_add_email_phone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('teacher','email',$this->string()->after('birth'));
        $this->addColumn('teacher','phone',$this->string()->after('email'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('teacher','email');
        $this->dropColumn('teacher','phone');
    }
}
