<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Peliculas;
use app\models\Salas;


/** @var yii\web\View $this */
/** @var app\models\Funciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="funciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pelicula')->dropDownList(
        ArrayHelper::map(Peliculas::find()->all(), 'id_pelicula', 'titulo'),
        ['prompt' => 'Seleccione una película', 'required' => true]
    ) ?>

    <?= $form->field($model, 'id_sala')->dropDownList(
        ArrayHelper::map(Salas::find()->all(), 'id_sala', 'nombre'),
        ['prompt' => 'Seleccione una sala', 'required' => true]
    ) ?>


    <?= $form->field($model, 'fecha_hora')->textInput([
        'type' => 'datetime-local',
        'placeholder' => 'Seleccione fecha y hora',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'precio')->textInput([
        'type' => 'number',
        'step' => '0.01',
        'placeholder' => 'Ingrese el precio',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'asientos_disponibles')->textInput([
        'type' => 'number',
        'placeholder' => 'Ingrese cantidad de asientos',
        'required' => true
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>