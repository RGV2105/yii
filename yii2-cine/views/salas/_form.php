<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Card; // Usa bootstrap4 si aplica
?>

<div class="salas-form container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h4><i class="fas fa-door-open"></i> Formulario de Sala</h4>
        </div>
        <div class="card-body">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <?= $form->field($model, 'nombre')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nombre de la sala',
                        'class' => 'form-control',
                    ])->label('<i class="fas fa-tag"></i> Nombre') ?>
                </div>

                <div class="col-md-6 mb-3">
                    <?= $form->field($model, 'capacidad')->textInput([
                        'type' => 'number',
                        'min' => 1,
                        'placeholder' => 'Ej: 100',
                        'class' => 'form-control',
                    ])->label('<i class="fas fa-users"></i> Capacidad') ?>
                </div>

                <div class="col-md-6 mb-3">
                    <?= $form->field($model, 'tipo_sala')->dropDownList([
                        '2D' => '2D',
                        '3D' => '3D',
                        '4DX' => '4DX',
                        'VIP' => 'VIP',
                    ], [
                        'prompt' => 'Seleccione el tipo de sala',
                        'class' => 'form-select',
                    ])->label('<i class="fas fa-film"></i> Tipo de Sala') ?>
                </div>

                <div class="col-md-6 mb-3">
                    <?= $form->field($model, 'habilitada')->dropDownList([
                        1 => 'Sí',
                        0 => 'No',
                    ], [
                        'prompt' => '¿Está habilitada?',
                        'class' => 'form-select',
                    ])->label('<i class="fas fa-toggle-on"></i> Habilitada') ?>
                </div>
            </div>

            <div class="form-group mt-3">
                <?= Html::submitButton('<i class="fas fa-save"></i> Guardar', [
                    'class' => 'btn btn-success btn-lg',
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
