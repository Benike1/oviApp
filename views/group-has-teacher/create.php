<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupHasTeacher */

$this->title = 'Csoport - óvónők összerendelése';
?>
<div class="group-has-teacher-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
