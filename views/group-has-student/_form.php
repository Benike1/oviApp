<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GroupHasStudent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-has-student-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'group_id')->textInput() ?>
    <?= $form->field($model, 'student_id')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
