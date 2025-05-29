<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Reservas;


/** @var yii\web\View $this */
/** @var app\models\Asientos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asientos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php


    // Obtener reservas con relación a cliente (ajusta según tu modelo)
    $reservas = Reservas::find()->with('cliente')->all();

    $listaReservas = ArrayHelper::map($reservas, 'id_reserva', function ($reserva) {
        return $reserva->cliente ? $reserva->cliente->nombre . ' - ' . $reserva->codigo_confirmacion : 'Reserva #' . $reserva->id_reserva;
    });
    ?>

    <?= $form->field($model, 'id_reserva')->dropDownList(
        $listaReservas,
        ['prompt' => 'Seleccione una reserva', 'required' => true]
    ) ?>


    <?= $form->field($model, 'fila')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>