<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Reservas;

/** @var yii\web\View $this */
/** @var app\models\Asientos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asientos-form container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-chair"></i> Reserva de Asiento</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?php
            // Obtener reservas con relación a cliente
            $reservas = Reservas::find()->with('cliente')->all();

            $listaReservas = ArrayHelper::map($reservas, 'id_reserva', function ($reserva) {
                return $reserva->cliente
                    ? $reserva->cliente->nombre . ' - ' . $reserva->codigo_confirmacion
                    : 'Reserva #' . $reserva->id_reserva;
            });
            ?>

            <div class="mb-3">
                <?= $form->field($model, 'id_reserva')->dropDownList(
                    $listaReservas,
                    [
                        'prompt' => '🎫 Seleccione una reserva...',
                        'class' => 'form-select',
                        'required' => true
                    ]
                )->label('Reserva del Cliente') ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'fila')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'Ej. A, B, C...',
                    'class' => 'form-control'
                ])->label('Fila del Asiento 🎟️') ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'numero')->textInput([
                    'type' => 'number',
                    'min' => 1,
                    'placeholder' => 'Ej. 12',
                    'class' => 'form-control'
                ])->label('Número de Asiento 🪑') ?>
            </div>

            <div class="form-group text-end">
                <?= Html::submitButton('<i class="fas fa-save"></i> Guardar', ['class' => 'btn btn-success px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
