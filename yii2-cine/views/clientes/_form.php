<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el nombre completo'
    ]) ?>

    <?= $form->field($model, 'email')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el correo electrónico'
    ]) ?>

    <?= $form->field($model, 'telefono')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el número de teléfono',
        'required' => true,
        'pattern' => '[0-9+ -]{10}',  
        'title' => 'Ingrese un número válido, entre 10 caracteres',
    ]) ?>

    <?= $form->field($model, 'fecha_registro')->textInput([
        'placeholder' => 'Seleccione la fecha de registro',
        'type' => 'date'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

