<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FuncionesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="funciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_funcion') ?>

    <?= $form->field($model, 'id_pelicula') ?>

    <?= $form->field($model, 'id_sala') ?>

    <?= $form->field($model, 'fecha_hora') ?>

    <?= $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'asientos_disponibles') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
