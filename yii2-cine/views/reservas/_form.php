<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Clientes;
use app\models\Funciones;

/** @var yii\web\View $this */
/** @var app\models\Reservas $model */
/** @var yii\widgets\ActiveForm $form */

// Obtener arrays de clientes y funciones
$clientes = ArrayHelper::map(Clientes::find()->all(), 'id_cliente', 'nombre');
$funciones = ArrayHelper::map(Funciones::find()
    ->joinWith('pelicula')
    ->all(), 'id_funcion', function($model) {
        return $model->pelicula->titulo . ' - Función #' . $model->id_funcion;
    });
?>

<style>
    .reservas-form .card {
        margin-top: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .reservas-form .card-header {
        font-size: 1.2rem;
        font-weight: 600;
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .reservas-form .form-group {
        margin-bottom: 16px;
    }

    .reservas-form label {
        font-weight: 500;
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 6px;
    }
</style>

<div class="reservas-form">

    <div class="card">
        <div class="card-header">
            📝 Formulario de Reserva
        </div>
        <div class="card-body">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'id_cliente')->dropDownList($clientes, [
                'prompt' => 'Seleccione un cliente',
                'required' => true
            ])->label('Cliente') ?>

            <?= $form->field($model, 'id_funcion')->dropDownList($funciones, [
                'prompt' => 'Seleccione una función',
                'required' => true
            ])->label('Función / Película') ?>

            <?= $form->field($model, 'fecha_reserva')->input('date', [
                'required' => true,
            ])->label('Fecha de Reserva') ?>

            <?= $form->field($model, 'cantidad_asientos')->textInput([
                'type' => 'number',
                'min' => 1,
                'placeholder' => 'Ingrese la cantidad de asientos',
                'required' => true
            ])->label('Cantidad de Asientos') ?>

            <?= $form->field($model, 'estado')->dropDownList([
                'pendiente' => 'Pendiente',
                'confirmada' => 'Confirmada',
                'cancelada' => 'Cancelada',
                'utilizada' => 'Utilizada',
            ], [
                'prompt' => 'Seleccione un estado',
                'required' => true
            ])->label('Estado de la Reserva') ?>

            <div class="form-group mt-4">
                <?= Html::submitButton('<i class="fas fa-save"></i> Guardar Reserva', [
                    'class' => 'btn btn-success btn-submit'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!-- FontAwesome (solo si no está en tu layout principal) -->
<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
?>
