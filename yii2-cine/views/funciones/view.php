<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Funciones $model */

$this->title = 'Función #' . $model->id_funcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="funciones-view container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-film"></i> <?= Html::encode($this->title) ?></h5>
            <div>
                <?= Html::a('<i class="fas fa-pencil-alt"></i> Editar', ['update', 'id_funcion' => $model->id_funcion], ['class' => 'btn btn-light btn-sm me-2']) ?>
                <?= Html::a('<i class="fas fa-trash-alt"></i> Eliminar', ['delete', 'id_funcion' => $model->id_funcion], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => Yii::t('app', '¿Está seguro de eliminar esta función?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-striped table-hover'],
                'attributes' => [
                    [
                        'attribute' => 'id_pelicula',
                        'label' => '🎬 Película',
                        'value' => $model->pelicula->titulo ?? '(Sin título)',
                    ],
                    [
                        'attribute' => 'id_sala',
                        'label' => '🏟️ Sala',
                        'value' => $model->sala->nombre ?? '(Sin sala)',
                    ],
                    [
                        'attribute' => 'fecha_hora',
                        'label' => '📅 Fecha y Hora',
                        'value' => Yii::$app->formatter->asDatetime($model->fecha_hora, 'php:d-m-Y H:i'),
                    ],
                    [
                        'attribute' => 'precio',
                        'label' => '💵 Precio',
                        'value' => Yii::$app->formatter->asCurrency($model->precio, 'USD'),
                    ],
                    [
                        'attribute' => 'asientos_disponibles',
                        'label' => '🎟️ Asientos Disponibles',
                        'value' => $model->asientos_disponibles,
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>