<?php

use app\models\Group;
use app\models\Teacher;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GroupHasTeacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-has-teacher-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'group_id')->widget(Select2::class, [
                'data' => Group::getAllGroupIdWithName(),
                'options' => ['placeholder' => 'Csoport'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'teacher_id')->widget(Select2::class, [
                'data' => Teacher::getAllTeacherIdWithName(),
                'options' => ['placeholder' => 'Óvónő'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
