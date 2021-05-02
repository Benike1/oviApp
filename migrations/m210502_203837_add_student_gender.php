<?php

use yii\db\Migration;

/**
 * Class m210502_203837_add_student_gender
 */
class m210502_203837_add_student_gender extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('student', 'gender', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('student', 'gender');

    }

}
