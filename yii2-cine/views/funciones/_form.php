<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Peliculas;
use app\models\Salas;

/** @var yii\web\View $this */
/** @var app\models\Funciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="funciones-form container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-calendar-plus"></i> <?= $model->isNewRecord ? 'Crear Nueva Función' : 'Editar Función' ?></h5>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'needs-validation', 'novalidate' => true]
            ]); ?>

            <div class="mb-3">
                <?= $form->field($model, 'id_pelicula')->dropDownList(
                    ArrayHelper::map(Peliculas::find()->all(), 'id_pelicula', 'titulo'),
                    ['class' => 'form-select', 'prompt' => '🎞️ Seleccione una película', 'required' => true]
                )->label('Película') ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'id_sala')->dropDownList(
                    ArrayHelper::map(Salas::find()->all(), 'id_sala', 'nombre'),
                    ['class' => 'form-select', 'prompt' => '🏟️ Seleccione una sala', 'required' => true]
                )->label('Sala') ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'fecha_hora')->textInput([
                    'type' => 'datetime-local',
                    'class' => 'form-control',
                    'required' => true
                ])->label('Fecha y Hora') ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'precio')->textInput([
                    'type' => 'number',
                    'step' => '0.01',
                    'class' => 'form-control',
                    'required' => true
                ])->label('Precio ($)') ?>
            </div>

            <div class="mb-4">
                <?= $form->field($model, 'asientos_disponibles')->textInput([
                    'type' => 'number',
                    'class' => 'form-control',
                    'required' => true
                ])->label('Asientos Disponibles') ?>
            </div>

            <div class="form-group text-end">
                <?= Html::submitButton('<i class="fas fa-save"></i> Guardar', ['class' => 'btn btn-success px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
