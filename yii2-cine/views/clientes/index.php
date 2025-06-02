<?php

use app\models\Clientes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\ClientesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = '🎬 Clientes Registrados';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="clientes-index container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
            <?= Html::a('➕ Nuevo Cliente', ['create'], ['class' => 'btn btn-light text-primary']) ?>
        </div>

        <div class="card-body">
            <?php Pjax::begin(); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-bordered table-hover table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_cliente',
                    [
                        'attribute' => 'nombre',
                        'label' => 'Nombre del Cliente',
                        'contentOptions' => ['style' => 'font-weight: bold;'],
                    ],
                    'email:email',
                    [
                        'attribute' => 'telefono',
                        'label' => 'Teléfono',
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'attribute' => 'fecha_registro',
                        'label' => 'Fecha de Registro',
                        'format' => ['date', 'php:d-m-Y'],
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'class' => ActionColumn::class,
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
                                    'data' => [
                                        'confirm' => '¿Estás seguro de eliminar este cliente?',
                                        'method' => 'post',
                                    ],
                                ]);
                            },
                        ],
                        'urlCreator' => function ($action, Clientes $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_cliente' => $model->id_cliente]);
                        }
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>

</div>
