<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReservasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reservas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_reserva') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'id_funcion') ?>

    <?= $form->field($model, 'fecha_reserva') ?>

    <?= $form->field($model, 'cantidad_asientos') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'codigo_confirmacion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
