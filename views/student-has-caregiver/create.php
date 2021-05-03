<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentHasCaregiver */

$this->title = 'Összerendelés';
?>
<div class="student-has-caregiver-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
