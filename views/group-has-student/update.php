<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupHasStudent */

$this->title = $model->group->name . ' - ' . $model->student->name . 'módosítása';
?>
<div class="group-has-student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
