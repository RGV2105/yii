<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pagos $model */

$this->title = 'Detalle del Pago de ' . ($model->reserva->cliente->nombre ?? '(Sin cliente)');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="pagos-view container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-receipt"></i> <?= Html::encode($this->title) ?></h5>
            <div>
                <?= Html::a('<i class="fas fa-pen"></i> Editar', ['update', 'id_pago' => $model->id_pago], ['class' => 'btn btn-light btn-sm me-2']) ?>
                <?= Html::a('<i class="fas fa-trash-alt"></i> Eliminar', ['delete', 'id_pago' => $model->id_pago], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => Yii::t('app', '¿Está seguro de eliminar este pago?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-striped table-bordered'],
                'attributes' => [
                    [
                        'label' => 'Cliente',
                        'value' => $model->reserva->cliente->nombre ?? '(Sin cliente)',
                    ],
                    [
                        'attribute' => 'monto',
                        'label' => 'Monto ($)',
                        'value' => Yii::$app->formatter->asCurrency($model->monto, 'USD'),
                    ],
                    [
                        'attribute' => 'metodo_pago',
                        'label' => 'Método de Pago',
                    ],
                    [
                        'attribute' => 'fecha_pago',
                        'value' => Yii::$app->formatter->asDate($model->fecha_pago, 'php:d-m-Y'),
                        'label' => 'Fecha de Pago',
                    ],
                    [
                        'attribute' => 'estado',
                        'format' => 'html',
                        'value' => function () use ($model) {
                            if ($model->estado === 'Completado') {
                                return '<span class="badge bg-success">Completado</span>';
                            } elseif ($model->estado === 'Pendiente') {
                                return '<span class="badge bg-warning text-dark">Pendiente</span>';
                            } else {
                                return '<span class="badge bg-secondary">' . Html::encode($model->estado) . '</span>';
                            }
                        },
                    ],
                    [
                        'attribute' => 'transaccion_id',
                        
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
