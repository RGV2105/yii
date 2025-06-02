<?php

use app\models\Asientos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\AsientosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', '🎬 Asientos de Cine');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="asientos-index container mt-4">

    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-danger"><?= Html::encode($this->title) ?></h1>
        <p class="text-muted fs-5">🎟️ Revisa los asientos reservados por los clientes en la sala de cine.</p>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <?= Html::a('<i class="fas fa-chair"></i> Reservar Asiento', ['create'], ['class' => 'btn btn-success shadow']) ?>
    </div>

    <div class="card shadow border-0">
        <div class="card-body">
            <?php Pjax::begin(); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-bordered table-hover align-middle text-center'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'id_reserva',
                        'label' => '👤 Cliente',
                        'value' => function ($model) {
                            return $model->reserva->cliente->nombre ?? '<span class="text-muted">(Sin nombre)</span>';
                        },
                        'format' => 'html',
                    ],
                    [
                        'attribute' => 'fila',
                        'label' => '🎫 Fila',
                        'contentOptions' => ['class' => 'fw-bold'],
                    ],
                    [
                        'attribute' => 'numero',
                        'label' => '🪑 Número',
                        'contentOptions' => ['class' => 'fw-bold'],
                    ],
                    [
                        'class' => ActionColumn::class,
                        'header' => '🔧 Acciones',
                        'urlCreator' => function ($action, Asientos $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_asiento_reservado' => $model->id_asiento_reservado]);
                        },
                        'contentOptions' => ['style' => 'white-space: nowrap'],
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
