<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Reservas $model */

$this->title = $model->id_reserva;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reservas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_reserva' => $model->id_reserva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_reserva' => $model->id_reserva], [
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
            //'id_reserva',
            [
                'attribute' => 'id_cliente',
                'value' => function ($model) {
                return $model->cliente ? $model->cliente->nombre : '(no asignado)';
            },
                'label' => 'Cliente',
            ],

            [
                'attribute' => 'id_funcion',
                'value' => function ($model) {
                return $model->funcion ? $model->funcion->pelicula->titulo : '(no asignado)';
            },
                'label' => 'Función',
            ],

            'fecha_reserva',
            'cantidad_asientos',
            'estado',
            'codigo_confirmacion',
        ],
    ]) ?>

</div>