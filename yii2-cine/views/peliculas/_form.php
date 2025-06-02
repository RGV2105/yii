<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="peliculas-form container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="m-0"><i class="fas fa-clapperboard me-2"></i><?= $model->isNewRecord ? 'Crear Película' : 'Actualizar Película' ?></h4>
        </div>

        <div class="card-body">

            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <?php if ($model->portada && file_exists(Yii::getAlias('@webroot/portadas/' . $model->portada))): ?>
                <div class="text-center mb-4">
                    <label class="form-label"><strong>Portada actual:</strong></label><br>
                    <img src="<?= Yii::getAlias('@web') . '/portadas/' . $model->portada ?>" 
                         alt="Portada" 
                         style="max-width: 300px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                </div>
            <?php endif; ?>

            <?= $form->field($model, 'imageFile')->fileInput([
                'class' => 'form-control'
            ])->label('Seleccionar nueva portada') ?>

            <?= $form->field($model, 'titulo')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese el título de la película',
                'class' => 'form-control'
            ]) ?>

            <?= $form->field($model, 'duracion_min')->input('number', [
                'placeholder' => 'Duración en minutos',
                'class' => 'form-control'
            ]) ?>

            <?= $form->field($model, 'clasificacion')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ej: PG-13, R, etc.',
                'class' => 'form-control'
            ]) ?>

            <?= $form->field($model, 'genero')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ej: Acción, Drama, Comedia',
                'class' => 'form-control'
            ]) ?>

            <?= $form->field($model, 'sinopsis')->textarea([
                'rows' => 5,
                'placeholder' => 'Ingrese una breve sinopsis...',
                'class' => 'form-control',
                'style' => 'resize: vertical'
            ]) ?>

            <?= $form->field($model, 'fecha_estreno')->input('date', [
                'class' => 'form-control'
            ]) ?>

            <div class="form-group mt-4">
                <?= Html::submitButton('<i class="fas fa-save"></i> Guardar', [
                    'class' => 'btn btn-success px-4 py-2'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!-- FontAwesome CDN (si no está cargado ya en el layout) -->
<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
?>
