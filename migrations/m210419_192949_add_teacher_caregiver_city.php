<?php

use yii\db\Migration;

/**
 * Class m210419_192949_add_teacher_caregiver_city
 */
class m210419_192949_add_teacher_caregiver_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('teacher', 'city', $this->string()->after('birth'));
        $this->addColumn('caregiver', 'city', $this->string()->after('caregiver'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('teacher', 'city');
        $this->dropColumn('caregiver', 'city');
    }
}
