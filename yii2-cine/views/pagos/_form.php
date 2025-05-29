<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Reservas;
use app\models\Clientes;  // Si quieres mostrar datos del cliente

/** @var yii\web\View $this */
/** @var app\models\Pagos $model */
/** @var yii\widgets\ActiveForm $form */

// Obtener las reservas con datos de clientes para mostrar nombres en el dropdown
$reservas = Reservas::find()
    ->joinWith('cliente')  // Relación en Reservas con Cliente (debe existir)
    ->all();

// Mapear id_reserva => nombre_cliente (o lo que quieras mostrar)
$listaReservas = ArrayHelper::map($reservas, 'id_reserva', function($reserva) {
    // Ejemplo: "Reserva #123 - Juan Pérez"
    return 'Reserva #' . $reserva->id_reserva . ' - ' . ($reserva->cliente->nombre ?? 'Sin Cliente');
});

?>

<div class="pagos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_reserva')->dropDownList(
        $listaReservas,
        ['prompt' => 'Seleccione una reserva']
    ) ?>

    <?= $form->field($model, 'monto')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el monto a pagar'
    ]) ?>

    <?= $form->field($model, 'metodo_pago')->dropDownList(
        [
            'tarjeta' => 'Tarjeta',
            'efectivo' => 'Efectivo',
            'transferencia' => 'Transferencia',
            'app' => 'App',
        ],
        ['prompt' => 'Seleccione un método de pago']
    ) ?>

    <?= $form->field($model, 'fecha_pago')->textInput([
        'type' => 'date',
        'placeholder' => 'Seleccione la fecha de pago'
    ]) ?>

    <?= $form->field($model, 'estado')->dropDownList(
        [
            'pendiente' => 'Pendiente',
            'completado' => 'Completado',
            'reembolsado' => 'Reembolsado',
            'fallido' => 'Fallido',
        ],
        ['prompt' => 'Seleccione el estado del pago']
    ) ?>

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
