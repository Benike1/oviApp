<?php

use app\models\Group;
use app\models\Student;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GroupHasStudent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-has-student-form">
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
            <?= $form->field($model, 'student_id')->widget(Select2::class, [
                'data' => Student::getAllStudentIdWithName(),
                'options' => ['placeholder' => 'Óvodás'],
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
