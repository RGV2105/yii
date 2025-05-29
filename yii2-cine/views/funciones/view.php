<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Funciones $model */

$this->title = $model->id_funcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="funciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_funcion' => $model->id_funcion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_funcion' => $model->id_funcion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

   <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        //'id_funcion',
        [
            'attribute' => 'id_pelicula',
            'label' => 'Película',
            'value' => $model->pelicula->titulo, 
        ],
        [
            'attribute' => 'id_sala',
            'label' => 'Sala',
            'value' => $model->sala->nombre, 
        ],
        'fecha_hora',
        'precio',
        'asientos_disponibles',
    ],
]) ?>

</div>
