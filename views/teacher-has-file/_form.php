<?php

use app\models\File;
use app\models\Teacher;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TeacherHasFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-has-file-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'teacher_id')->widget(Select2::class, [
                'data' => Teacher::getAllTeacherIdWithName(),
                'options' => ['placeholder' => 'Gyermek'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'file_id')->widget(Select2::class, [
                'data' => File::getAllFileIdWithName(),
                'options' => ['placeholder' => 'Szülő'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Mentés', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
