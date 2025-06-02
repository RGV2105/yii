<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */

$this->title = '🎫 Cliente: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => '🎬 Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nombre;
\yii\web\YiiAsset::register($this);
?>

<div class="clientes-view container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
            <div>
                <?= Html::a('✏️ Editar', ['update', 'id_cliente' => $model->id_cliente], ['class' => 'btn btn-warning btn-sm']) ?>
                <?= Html::a('🗑️ Eliminar', ['delete', 'id_cliente' => $model->id_cliente], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => '¿Estás seguro de que deseas eliminar este cliente?',
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
                        'attribute' => 'nombre',
                        'label' => 'Nombre completo',
                        'contentOptions' => ['style' => 'font-weight: bold; font-size: 1.1rem;'],
                        
                    ],
                    'email:email',
                    
                    [
                        'attribute' => 'telefono',
                        'label' => 'Teléfono de contacto',
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'attribute' => 'fecha_registro',
                        'label' => 'Fecha de Registro',
                        'format' => ['date', 'php:d-m-Y'],
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>
