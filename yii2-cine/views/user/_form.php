<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <h4>Información personal</h4>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese su nombre'
            ])->label('Nombre completo') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'apellido')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese su apellido'
            ])->label('Apellido') ?>
        </div>
    </div>

    <h4>Credenciales</h4>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput([
                'maxlength' => true,
                'placeholder' => 'Nombre de usuario'
            ])->hint('Este será su nombre de acceso al sistema') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput([
                'maxlength' => true,
                'placeholder' => 'Correo electrónico',
                'type' => 'email'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if ($model->isNewRecord): ?>
                <?= $form->field($model, 'password')->passwordInput([
                    'maxlength' => true,
                    'placeholder' => 'Ingrese la contraseña'
                ])->label('Contraseña') ?>
            <?php else: ?>
                <?= $form->field($model, 'password')->passwordInput([
                    'maxlength' => true,
                    'placeholder' => 'Dejar en blanco si no desea cambiarla'
                ])->label('Nueva contraseña (opcional)') ?>
            <?php endif; ?>
        </div>
    </div>

    <h4>Acceso y estado</h4>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'role')->dropDownList([
                'user' => Yii::t('app', 'Usuario'),
                'admin' => Yii::t('app', 'Administrador'),
            ], ['prompt' => Yii::t('app', 'Seleccione un rol')]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList([
                1 => Yii::t('app', 'Activo'),
                0 => Yii::t('app', 'Inactivo'),
            ], ['prompt' => Yii::t('app', 'Seleccione estado')]) ?>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar usuario', [
            'class' => 'btn btn-success',
            'encode' => false
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
