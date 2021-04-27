<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentHasCaregiver */

$this->title = 'Összerendelés módosítása';
?>
<div class="student-has-caregiver-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
