<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Asientos $model */

$this->title = $model->id_asiento_reservado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asientos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_asiento_reservado' => $model->id_asiento_reservado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_asiento_reservado' => $model->id_asiento_reservado], [
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
        'id_asiento_reservado',
        [
            'attribute' => 'id_reserva',
            'label' => 'Cliente',
            'value' => function($model) {
                return $model->reserva && $model->reserva->cliente 
                    ? $model->reserva->cliente->nombre 
                    : '(Sin cliente)';
            },
        ],
        'fila',
        'numero',
    ],
]) ?>


</div>
