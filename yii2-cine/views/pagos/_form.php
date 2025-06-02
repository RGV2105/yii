<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Reservas;
use app\models\Clientes;

/** @var yii\web\View $this */
/** @var app\models\Pagos $model */
/** @var yii\widgets\ActiveForm $form */

$reservas = Reservas::find()->joinWith('cliente')->all();

$listaReservas = ArrayHelper::map($reservas, 'id_reserva', function ($reserva) {
    return 'Reserva #' . $reserva->id_reserva . ' - ' . ($reserva->cliente->nombre ?? 'Sin Cliente');
});
?>

<div class="pagos-form card shadow-sm p-4 rounded" style="max-width: 600px; margin: auto; background-color: #fdfdfd;">

    <h3 class="mb-4 text-primary text-center">Formulario de Pago</h3>

    <?php $form = ActiveForm::begin(); ?>

    <div class="mb-3">
        <?= $form->field($model, 'id_reserva')->dropDownList(
            $listaReservas,
            ['prompt' => 'Seleccione una reserva']
        )->label('Reserva del Cliente') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'monto')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ingrese el monto a pagar'
        ]) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'metodo_pago')->dropDownList(
            [
                'tarjeta' => 'Tarjeta',
                'efectivo' => 'Efectivo',
                'transferencia' => 'Transferencia',
                'app' => 'App',
            ],
            ['prompt' => 'Seleccione un método de pago']
        ) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'fecha_pago')->textInput([
            'type' => 'date'
        ])->label('Fecha del Pago') ?>
    </div>

    <div class="mb-4">
        <?= $form->field($model, 'estado')->dropDownList(
            [
                'pendiente' => 'Pendiente',
                'completado' => 'Completado',
                'reembolsado' => 'Reembolsado',
                'fallido' => 'Fallido',
            ],
            ['prompt' => 'Seleccione el estado del pago']
        ) ?>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('💾 Guardar Pago', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>