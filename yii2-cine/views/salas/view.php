<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Salas $model */

$this->title = $model->id_sala;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="salas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_sala' => $model->id_sala], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_sala' => $model->id_sala], [
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
        //'id_sala',
        'nombre',
        'capacidad',
        'tipo_sala',
        [
            'attribute' => 'habilitada',
            'value' => function ($model) {
                return $model->habilitada ? 'Sí' : 'No';
            },
        ],
    ],
]) ?>


</div>
