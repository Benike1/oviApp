<?php

use app\models\Caregiver;
use app\models\Student;
use app\models\StudentHasCaregiver;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model StudentHasCaregiver */
/* @var $form ActiveForm */
?>

<div class="student-has-caregiver-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'student_id')->widget(Select2::class, [
                'data' => Student::getAllStudentIdWithName(),
                'options' => ['placeholder' => 'Gyermek'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'caregiver_id')->widget(Select2::class, [
                'data' => Caregiver::getAllCaregiverIdWithName(),
                'options' => ['placeholder' => 'Szülő'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Összerendelés', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
