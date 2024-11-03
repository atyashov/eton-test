<?php

use app\models\User;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Projects $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="projects-form">


<!--    --><?php //var_dump(Projects::listAll('id', 'title')); ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        User::listAll('id', 'fio'),
        ['prompt' => 'Выберите пользователя']
    ) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'date_start')->widget(DatePicker::classname(), [
            'options' => [
                'placeholder' => 'Укажите дату начала',
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ],
    ]) ?>

    <?= $form->field($model, 'date_handover')->widget(DatePicker::classname(), [
        'options' => [
            'placeholder' => 'Укажите дату начала',
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
