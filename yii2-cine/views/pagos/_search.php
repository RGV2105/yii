<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PagosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pagos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_pago') ?>

    <?= $form->field($model, 'id_reserva') ?>

    <?= $form->field($model, 'monto') ?>

    <?= $form->field($model, 'metodo_pago') ?>

    <?= $form->field($model, 'fecha_pago') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'transaccion_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
