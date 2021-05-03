<?php

use app\models\Student;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $studentModel Student */

?>
<div class="student-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'studentModel' => $studentModel,
    ]) ?>
</div>
