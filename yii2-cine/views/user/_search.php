<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-search card card-body shadow-sm mb-3">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => 1],
    ]); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'id')->textInput(['placeholder' => 'ID']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'nombre')->textInput(['placeholder' => 'Nombre']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'apellido')->textInput(['placeholder' => 'Apellido']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Usuario']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Correo electrónico']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'role')->dropDownList([
                '' => 'Todos',
                'admin' => 'Administrador',
                'user' => 'Usuario',
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList([
                '' => 'Todos',
                1 => 'Activo',
                0 => 'Inactivo',
            ]) ?>
        </div>
    </div>

    <div class="form-group mt-2">
        <?= Html::submitButton('<i class="fas fa-search"></i> Buscar', [
            'class' => 'btn btn-primary',
            'encode' => false
        ]) ?>
        <?= Html::resetButton('<i class="fas fa-undo"></i> Limpiar', [
            'class' => 'btn btn-outline-secondary',
            'encode' => false
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
