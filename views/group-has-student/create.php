<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupHasStudent */

$this->title = 'Csoport - Óvódások összerendelése';
?>
<div class="group-has-student-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
