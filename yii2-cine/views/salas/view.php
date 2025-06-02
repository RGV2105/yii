<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Salas $model */

$this->title = 'Sala: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="salas-view container mt-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-video"></i> Detalle de Sala</h4>
            <div>
                <?= Html::a('<i class="fas fa-edit"></i> Editar', ['update', 'id_sala' => $model->id_sala], [
                    'class' => 'btn btn-light btn-sm me-2'
                ]) ?>
                <?= Html::a('<i class="fas fa-trash"></i> Eliminar', ['delete', 'id_sala' => $model->id_sala], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => Yii::t('app', '¿Estás seguro de eliminar esta sala?'),
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
                        'label' => 'Nombre de la Sala',
                        'value' => $model->nombre,
                    ],
                    [
                        'label' => 'Capacidad',
                        'value' => $model->capacidad . ' personas',
                    ],
                    [
                        'label' => 'Tipo de Sala',
                        'value' => $model->tipo_sala,
                    ],
                    [
                        'label' => 'Habilitada',
                        'value' => $model->habilitada ? 'Sí' : 'No',
                        'format' => 'html',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
