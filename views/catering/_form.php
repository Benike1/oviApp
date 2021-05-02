<?php

use app\models\Student;
use app\models\Teacher;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Catering */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catering-form">
    <?php $form = ActiveForm::begin() ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'date')->widget(DatePicker::class, [
                'name' => 'datePicker',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'full_price_ids')->widget(Select2::class, [
                'data' => Student::getAllStudentIdWithName(),
                'options' => ['placeholder' => 'Teljes árúak'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'half_price_ids')->widget(Select2::class, [
                'data' => Student::getAllStudentIdWithName(),
                'options' => ['placeholder' => 'Kedvezményre jogosultak (50%)...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true
                ],
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'non_price_ids')->widget(Select2::class, [
                'data' => Student::getAllStudentIdWithName(),
                'options' => ['placeholder' => 'Ingyenesek...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'teacher_ids')->widget(Select2::class, [
                'data' => Teacher::getAllTeacherIdWithName(),
                'options' => ['placeholder' => 'Dolgozók...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true
                ],
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
