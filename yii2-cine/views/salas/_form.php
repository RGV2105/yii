<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Salas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacidad')->textInput(['type' => 'number', 'min' => 1]) ?>

    <?= $form->field($model, 'tipo_sala')->dropDownList([
        '2D' => '2D',
        '3D' => '3D',
        '4DX' => '4DX',
        'VIP' => 'VIP',
    ], ['prompt' => 'Seleccione el tipo de sala']) ?>

    <?= $form->field($model, 'habilitada')->dropDownList([
        1 => 'Sí',
        0 => 'No',
    ], ['prompt' => '¿Está habilitada?']) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>