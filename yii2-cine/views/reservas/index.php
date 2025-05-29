<?php

use app\models\Reservas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ReservasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Reservas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Reservas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'id_cliente',
            'value' => function ($model) {
                return $model->cliente->nombre ?? '(Sin nombre)';
            },
            'label' => 'Cliente',
        ],
        [
            'attribute' => 'id_funcion',
            'value' => function ($model) {
                return $model->funcion->pelicula->titulo ?? '(Sin título)';
            },
            'label' => 'Película',
        ],
        [
            'attribute' => 'fecha_reserva',
            'value' => function ($model) {
                return Yii::$app->formatter->asDate($model->fecha_reserva, 'php:Y-m-d');
            },
        ],
        'cantidad_asientos',
        'estado',
        'codigo_confirmacion',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Reservas $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id_reserva' => $model->id_reserva]);
            }
        ],
    ],
]); ?>


    <?php Pjax::end(); ?>

</div>
