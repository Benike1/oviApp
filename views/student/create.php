<?php

use app\models\Student;
use app\models\StudentHasCaregiver;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $studentModel Student */

$this->title = 'Óvódás hozzáadása';

?>
<div class="student-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'studentModel' => $studentModel,
    ]) ?>
</div>
