<?php

use app\models\Clientes;
use app\models\Funciones;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Reservas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php
use yii\helpers\ArrayHelper;
use app\models\Cliente;
use app\models\Funcion;

// Obtener arrays de clientes y funciones
$clientes = ArrayHelper::map(Clientes::find()->all(), 'id_cliente', 'nombre');
$funciones = ArrayHelper::map(Funciones::find()
    ->joinWith('pelicula') // si quieres mostrar el nombre de la película
    ->all(), 'id_funcion', function($model) {
        return $model->pelicula->titulo . ' - ' ;
    });
?>

<div class="reservas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente')->dropDownList($clientes, [
        'prompt' => 'Seleccione un cliente',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'id_funcion')->dropDownList($funciones, [
        'prompt' => 'Seleccione una función',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'fecha_reserva')->input('date', [
        'required' => true
    ]) ?>

    <?= $form->field($model, 'cantidad_asientos')->textInput([
        'placeholder' => 'Ingrese la cantidad de asientos',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'estado')->dropDownList([
        'pendiente' => 'Pendiente',
        'confirmada' => 'Confirmada',
        'cancelada' => 'Cancelada',
        'utilizada' => 'Utilizada',
    ], [
        'prompt' => 'Seleccione un estado',
        'required' => true
    ]) ?>

   


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
