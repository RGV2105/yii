<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Reservas $model */

$this->title = 'Detalle de Reserva #' . $model->id_reserva;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<style>
    .reservas-view .card {
        margin-top: 20px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .reservas-view .card-header {
        font-size: 1.3rem;
        font-weight: bold;
        background-color: #f0f2f5;
    }

    .reservas-view .btn {
        margin-right: 10px;
    }

    .reservas-view .detail-view th {
        width: 25%;
        font-weight: 600;
    }

    .reservas-view h1 {
        font-size: 26px;
        margin-bottom: 20px;
        color: #333;
    }
</style>

<div class="reservas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-edit"></i> Editar', ['update', 'id_reserva' => $model->id_reserva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fas fa-trash-alt"></i> Eliminar', ['delete', 'id_reserva' => $model->id_reserva], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Está seguro de que desea eliminar esta reserva?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="card">
        <div class="card-header">
            Información de la Reserva
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'id_cliente',
                        'value' => function ($model) {
                            return $model->cliente ? $model->cliente->nombre : '(No asignado)';
                        },
                        'label' => 'Cliente',
                    ],
                    [
                        'attribute' => 'id_funcion',
                        'value' => function ($model) {
                            return $model->funcion ? $model->funcion->pelicula->titulo : '(No asignado)';
                        },
                        'label' => 'Película / Función',
                    ],
                    [
                        'attribute' => 'fecha_reserva',
                        'format' => ['date', 'php:Y-m-d'],
                        'label' => 'Fecha de Reserva',
                    ],
                    [
                        'attribute' => 'cantidad_asientos',
                        'label' => 'Cantidad de Asientos',
                    ],
                    [
                        'attribute' => 'estado',
                        'label' => 'Estado',
                        'value' => function ($model) {
                            switch ($model->estado) {
                                case 'pendiente': return 'Pendiente';
                                case 'confirmada': return 'Confirmada';
                                case 'cancelada': return 'Cancelada';
                                case 'utilizada': return 'Utilizada';
                                default: return ucfirst($model->estado);
                            }
                        }
                    ],
                    [
                        'attribute' => 'codigo_confirmacion',
                        'label' => 'Código de Confirmación',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>

<!-- FontAwesome (solo si no está incluido en el layout) -->
<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
?>
