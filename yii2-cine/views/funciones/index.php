<?php

use app\models\Funciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\FuncionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Funciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Funciones'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_pelicula',
                'label' => 'Película',
                'value' => function ($model) {
                        return $model->pelicula->titulo ?? '(Sin película)';
                    },
            ],
            [
                'attribute' => 'id_sala',
                'label' => 'Sala',
                'value' => function ($model) {
                        return $model->sala->nombre ?? '(Sin sala)';
                    },
            ],
            [
                'attribute' => 'fecha_hora',
                'format' => ['date', 'php:Y-m-d'], // muestra solo fecha sin hora
            ],
            'precio',
            'asientos_disponibles',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Funciones $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_funcion' => $model->id_funcion]);
                    }
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>

</div>