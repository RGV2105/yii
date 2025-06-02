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

$this->title = Yii::t('app', '📅 Reservas');
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .reservas-index h1 {
        font-size: 2.2rem;
        margin-bottom: 20px;
        font-weight: 600;
        color: #343a40;
    }

    .btn-create-reserva {
        margin-bottom: 20px;
        font-weight: 500;
    }

    .grid-view th, .grid-view td {
        vertical-align: middle;
        text-align: center;
    }

    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-hover tbody tr:hover {
        background-color: #eef6ff;
    }

    .action-column a {
        margin: 0 4px;
    }
</style>

<div class="reservas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-plus-circle"></i> Nueva Reserva', ['create'], ['class' => 'btn btn-success btn-create-reserva']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_cliente',
                'value' => fn($model) => $model->cliente->nombre ?? '(Sin nombre)',
                'label' => 'Cliente',
            ],
            [
                'attribute' => 'id_funcion',
                'value' => fn($model) => $model->funcion->pelicula->titulo ?? '(Sin título)',
                'label' => 'Película',
            ],
            [
                'attribute' => 'fecha_reserva',
                'value' => fn($model) => Yii::$app->formatter->asDate($model->fecha_reserva, 'php:d M Y'),
                'label' => 'Fecha de Reserva',
            ],
            [
                'attribute' => 'cantidad_asientos',
                'label' => 'Asientos',
                'contentOptions' => ['class' => 'text-center']
            ],
            [
                'attribute' => 'estado',
                'label' => 'Estado',
                'format' => 'raw',
                'value' => function ($model) {
                    $class = $model->estado === 'Confirmada' ? 'success' : ($model->estado === 'Pendiente' ? 'warning' : 'secondary');
                    return "<span class='badge bg-{$class}'>{$model->estado}</span>";
                }
            ],
          
            [
                'class' => ActionColumn::className(),
                'header' => 'Acciones',
                'contentOptions' => ['class' => 'action-column'],
                'urlCreator' => function ($action, Reservas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_reserva' => $model->id_reserva]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>

<!-- FontAwesome CDN (si no está incluido en tu layout principal) -->
<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
?>
