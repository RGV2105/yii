<?php

use app\models\Salas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\Button; // o bootstrap4 si usas otra versión

/** @var yii\web\View $this */
/** @var app\models\SalasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Salas de Cine';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="salas-index mt-4">

    <h1 class="mb-4">
        <i class="fas fa-theater-masks"></i> <?= Html::encode($this->title) ?>
    </h1>

    <p>
        <?= Html::a('<i class="fas fa-plus-circle"></i> Nueva Sala', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_sala',
            [
                'attribute' => 'nombre',
                'label' => 'Nombre de Sala',
                'contentOptions' => ['style' => 'font-weight:bold;'],
            ],
            'capacidad',
            [
                'attribute' => 'tipo_sala',
                'label' => 'Tipo',
                'value' => function ($model) {
                        return ucfirst($model->tipo_sala);
                    },
            ],
            [
                'attribute' => 'habilitada',
                'label' => 'Habilitada',
                'format' => 'raw',
                'value' => function ($model) {
                        return $model->habilitada
                            ? '<span class="text-success"><i class="fas fa-check-circle"></i> Sí</span>'
                            : '<span class="text-danger"><i class="fas fa-times-circle"></i> No</span>';
                    },
            ],
            [
                'class' => ActionColumn::class,
                'header' => 'Acciones',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url) {
                            return Html::a('👁️' , $url, [
                                'title' => 'Ver',
                                'class' => 'btn btn-sm btn-outline-primary mx-1',
                            ]);
                        },
                    'update' => function ($url) {
                            return Html::a('✏️', $url, [
                                'title' => 'Actualizar',
                                'class' => 'btn btn-sm btn-outline-warning mx-1',
                            ]);
                        },
                    'delete' => function ($url) {
                            return Html::a('🗑️', $url, [
                                'title' => 'Eliminar',
                                'class' => 'btn btn-sm btn-outline-danger mx-1',
                                'data' => [
                                    'confirm' => '¿Estás seguro de eliminar esta sala?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                ],
                'urlCreator' => function ($action, Salas $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_sala' => $model->id_sala]);
                    },
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>