<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Asientos $model */

$this->title = '🎟️ Asiento ' . $model->fila . '-' . $model->numero;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="asientos-view container mt-4">

    <div class="card shadow rounded border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
            <div>
                <?= Html::a('✏️ Editar', ['update', 'id_asiento_reservado' => $model->id_asiento_reservado], ['class' => 'btn btn-warning btn-sm']) ?>
                <?= Html::a('🗑️ Eliminar', ['delete', 'id_asiento_reservado' => $model->id_asiento_reservado], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => Yii::t('app', '¿Estás seguro de que deseas eliminar este asiento?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-bordered table-striped'],
                'attributes' => [
                    
                    [
                        
                        'label' => 'Cliente',

                        'value' => function($model) {
                            return $model->reserva && $model->reserva->cliente
                                ? $model->reserva->cliente->nombre
                                : '<span class="text-muted">(Sin cliente)</span>';
                        },
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'attribute' => 'fila',
                        'label' => 'Fila',
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'attribute' => 'numero',
                        'label' => 'Número de Asiento',
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
