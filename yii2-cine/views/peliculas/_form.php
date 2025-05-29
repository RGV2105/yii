<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="peliculas-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php if ($model->portada && file_exists(Yii::getAlias('@webroot/portadas/' . $model->portada))): ?>
        <div class="mb-4 text-center">
            <label><strong>Portada actual:</strong></label><br>
            <img src="<?= Yii::getAlias('@web') . '/portadas/' . $model->portada ?>" alt="Portada" width="300"
                style="border: 2px solid #333; padding: 6px; border-radius: 6px;">
        </div>
    <?php endif; ?>




    <?= $form->field($model, 'imageFile')->fileInput()->label('Seleccionar la portada') ?>

    <?= $form->field($model, 'titulo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el título de la película',
        'required' => true,
    ]) ?>

    <?= $form->field($model, 'duracion_min')->textInput([
        'type' => 'number',
        'placeholder' => 'Ingrese la duración en minutos',
        'required' => true,
    ]) ?>

    <?= $form->field($model, 'clasificacion')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese la clasificación',
        'required' => true,
    ]) ?>

    <?= $form->field($model, 'genero')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el género',
        'required' => true,
    ]) ?>

    <?= $form->field($model, 'sinopsis')->textarea([
        'rows' => 6,
        'placeholder' => 'Ingrese la sinopsis',
        'required' => true,
    ]) ?>

    <?= $form->field($model, 'fecha_estreno')->input('date', [
        'placeholder' => 'Seleccione la fecha de estreno',
        'required' => true,
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>