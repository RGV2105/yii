<?php

use app\models\Peliculas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\PeliculasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', '🎬 Catálogo de Películas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peliculas-index container bg-white shadow p-4 rounded">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary m-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('➕ Nueva Película', ['create'], ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php Pjax::begin(); ?>

    <style>
        .sinopsis-limitada {
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Número de líneas visibles */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-hover align-middle'],
        'summary' => 'Mostrando <b>{begin} - {end}</b> de <b>{totalCount}</b> películas',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'portada',
                'format' => 'html',
                'label' => 'Portada',
                'value' => function ($model) {
                    $ruta = Yii::getAlias('@webroot/portadas/' . $model->portada);
                    $web = Yii::getAlias('@web/portadas/' . $model->portada);
                    return $model->portada && file_exists($ruta)
                        ? Html::img($web, ['width' => '100', 'class' => 'img-thumbnail shadow-sm'])
                        : '<span class="text-muted">Sin imagen</span>';
                },
                'contentOptions' => ['style' => 'width: 120px; text-align: center'],
            ],

            [
                'attribute' => 'titulo',
                'label' => 'Título',
                'contentOptions' => ['style' => 'font-weight: bold'],
            ],

            [
                'attribute' => 'duracion_min',
                'label' => 'Duración',
                'value' => fn($model) => $model->duracion_min . ' min',
            ],

            'clasificacion',
            'genero',

            [
                'attribute' => 'sinopsis',
                'format' => 'raw',
                'label' => 'Sinopsis',
                'value' => function ($model) {
                    return Html::tag('div', Html::encode($model->sinopsis), ['class' => 'sinopsis-limitada']);
                },
                'contentOptions' => ['style' => 'max-width: 400px'],
            ],

            [
                'attribute' => 'fecha_estreno',
                'label' => 'Estreno',
                'format' => ['date', 'php:d/m/Y'],
            ],

            [
                'class' => ActionColumn::class,
                'urlCreator' => fn($action, Peliculas $model, $key, $index, $column) =>
                    Url::toRoute([$action, 'id_pelicula' => $model->id_pelicula]),
                'header' => 'Acciones',
                'headerOptions' => ['style' => 'width: 90px'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
