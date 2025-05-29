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

$this->title = Yii::t('app', 'Peliculas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peliculas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Peliculas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pelicula',
            [
                'attribute' => 'portada',
                'format' => 'html',
                'value' => function ($model) {
                        return $model->portada && file_exists(Yii::getAlias('@webroot/portadas/' . $model->portada))
                            ? Html::img(Yii::getAlias('@web') . '/portadas/' . $model->portada, ['width' => '80'])
                            : 'Sin imagen';
                    },
            ],

            'titulo',
            'duracion_min',
            'clasificacion',
            'genero',
            'sinopsis:ntext',
            'fecha_estreno',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Peliculas $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_pelicula' => $model->id_pelicula]);
                    }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>