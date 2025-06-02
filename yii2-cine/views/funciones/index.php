<?php

use app\models\Funciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\Card; // Si usas Bootstrap 5
use yii\bootstrap5\Badge;

/** @var yii\web\View $this */
/** @var app\models\FuncionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Funciones');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="funciones-index">

    <div class="card shadow-lg border-primary mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="bi bi-film"></i> <?= Html::encode($this->title) ?></h3>
            <?= Html::a('<i class="bi bi-plus-circle"></i> Crear Función', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body">
            <?php Pjax::begin(); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-hover table-bordered'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'id_pelicula',
                        'label' => 'Película',
                        'value' => fn($model) => $model->pelicula->titulo ?? Html::tag('span', '(Sin película)', ['class' => 'text-muted']),
                        'format' => 'html',
                    ],
                    [
                        'attribute' => 'id_sala',
                        'label' => 'Sala',
                        'value' => fn($model) => Html::tag('span', $model->sala->nombre ?? '(Sin sala)', ['class' => 'badge bg-info text-dark']),
                        'format' => 'html',
                    ],
                    [
                        'attribute' => 'fecha_hora',
                        'format' => ['datetime', 'php:d/m/Y H:i'],
                        'label' => 'Fecha y Hora',
                        'contentOptions' => ['style' => 'white-space: nowrap'],
                    ],
                    'precio',

                    [
                        'attribute' => 'asientos_disponibles',
                        'label' => 'Asientos',
                        'value' => function ($model) {
                                        $clase = $model->asientos_disponibles < 10 ? 'bg-danger' : 'bg-success';
                                        return Html::tag('span', $model->asientos_disponibles, ['class' => "badge $clase"]);
                                    },
                        'format' => 'html',
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
                        'urlCreator' => function ($action, Funciones $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'id_funcion' => $model->id_funcion]);
                                    }
                    ],


                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>