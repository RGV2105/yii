<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clientes-form container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">🎫 Formulario de Cliente</h4>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'needs-validation'],
            ]); ?>

            <div class="mb-3">
                <?= $form->field($model, 'nombre')->textInput([
                    'maxlength' => true,
                    'placeholder' => '🎟️ Ingrese el nombre completo',
                    'class' => 'form-control'
                ])->label('Nombre completo') ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'email')->textInput([
                    'maxlength' => true,
                    'placeholder' => '📧 Ingrese el correo electrónico',
                    'class' => 'form-control'
                ]) ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'telefono')->textInput([
                    'maxlength' => true,
                    'placeholder' => '📞 Ingrese el número de teléfono',
                    'required' => true,
                    'pattern' => '[0-9+ -]{10,}',
                    'title' => 'Ingrese un número válido, mínimo 10 caracteres',
                    'class' => 'form-control'
                ]) ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'fecha_registro')->textInput([
                    'type' => 'date',
                    'class' => 'form-control'
                ])->label('📅 Fecha de Registro') ?>
            </div>

            <div class="form-group text-end">
                <?= Html::submitButton('💾 Guardar Cliente', ['class' => 'btn btn-success px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
