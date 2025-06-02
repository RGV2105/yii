<?php

use app\models\Pagos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\PagosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Pagos');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pagos-index container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-credit-card"></i> <?= Html::encode($this->title) ?></h5>
            <?= Html::a('<i class="fas fa-plus"></i> Registrar Pago', ['create'], ['class' => 'btn btn-light btn-sm']) ?>
        </div>

        <div class="card-body">
            <?php Pjax::begin(); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'options' => ['class' => 'table-responsive'],
                'tableOptions' => ['class' => 'table table-striped table-bordered align-middle text-center'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'id_reserva',
                        'label' => 'Cliente',
                        'value' => function ($model) {
                            return $model->reserva->cliente->nombre ?? '(Sin nombre)';
                        },
                    ],
                    [
                        'attribute' => 'monto',
                        'format' => ['currency', 'USD'],
                        'label' => 'Monto ($)',
                    ],
                    [
                        'attribute' => 'metodo_pago',
                        'label' => 'Método',
                        'filter' => [
                            'Efectivo' => 'Efectivo',
                            'Tarjeta' => 'Tarjeta',
                            'Transferencia' => 'Transferencia',
                        ],
                    ],
                    [
                        'attribute' => 'fecha_pago',
                        'value' => function ($model) {
                            return Yii::$app->formatter->asDate($model->fecha_pago, 'php:d-m-Y');
                        },
                        'label' => 'Fecha de Pago',
                    ],
                    [
                        'attribute' => 'estado',
                        'format' => 'html',
                        'value' => function ($model) {
                            if ($model->estado === 'Completado') {
                                return '<span class="badge bg-success">Completado</span>';
                            } elseif ($model->estado === 'Pendiente') {
                                return '<span class="badge bg-warning text-dark">Pendiente</span>';
                            } else {
                                return '<span class="badge bg-secondary">' . Html::encode($model->estado) . '</span>';
                            }
                        },
                        'filter' => [
                            'Completado' => 'Completado',
                            'Pendiente' => 'Pendiente',
                            'Cancelado' => 'Cancelado',
                        ],
                    ],
                    [
                        'attribute' => 'transaccion_id',
                        'label' => 'ID Transacción',
                    ],
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, Pagos $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_pago' => $model->id_pago]);
                        },
                        'header' => 'Acciones',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                           'view' => function ($url) {
                                return Html::a('👁️', $url, ['title' => 'Ver', 'class' => 'btn btn-sm btn-outline-primary']);
                            },
                            'update' => function ($url) {
                                return Html::a('✏️', $url, ['title' => 'Editar', 'class' => 'btn btn-sm btn-outline-warning']);
                            },
                            'delete' => function ($url) {
                                return Html::a('🗑️', $url, [
                                    'title' => 'Eliminar',
                                    'class' => 'btn btn-sm btn-outline-danger',
                                    'data-confirm' => '¿Está seguro de eliminar este pago?',
                                    'data-method' => 'post',
                                ]);
                            },
                        ],
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
