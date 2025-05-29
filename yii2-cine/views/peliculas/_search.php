<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PeliculasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="peliculas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_pelicula') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'duracion_min') ?>

    <?= $form->field($model, 'clasificacion') ?>

    <?= $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'sinopsis') ?>

    <?php // echo $form->field($model, 'fecha_estreno') ?>

    <?php // echo $form->field($model, 'portada') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
