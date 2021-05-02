<?php

use app\enums\GenderEnum;
use app\models\Student;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $studentModel Student */
/* @var $form ActiveForm */
?>

<div class="student-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($studentModel, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($studentModel, 'birth')->widget(DatePicker::class,[
                'name' => 'datePicker',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($studentModel, 'gender')->widget(Select2::class, [
                'data' => GenderEnum::getLabels(),
                'options' => ['placeholder' => 'Nem...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($studentModel, 'edu_id')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($studentModel, 'ssn_id')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Mentés', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
