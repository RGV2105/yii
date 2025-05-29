<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */

$this->title = $model->id_pelicula;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peliculas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peliculas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_pelicula' => $model->id_pelicula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_pelicula' => $model->id_pelicula], [
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
        [
            'attribute' => 'portada',
            'label' => 'Portada',
            'format' => 'html',
            'value' => function ($model) {
                return $model->portada && file_exists(Yii::getAlias('@webroot/portadas/' . $model->portada))
                    ? Html::img(Yii::getAlias('@web') . '/portadas/' . $model->portada, ['width' => '150'])
                    : 'Sin imagen';
            },
        ],
        'titulo',
        'genero',
        'clasificacion',
        'duracion_min',
        'fecha_estreno',
        'sinopsis:ntext',
        //'id_pelicula',
    ],
]) ?>


</div>

