<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SalasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_sala') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'capacidad') ?>

    <?= $form->field($model, 'tipo_sala') ?>

    <?= $form->field($model, 'habilitada') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
