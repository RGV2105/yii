<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pagos $model */

$this->title = $model->id_pago;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pagos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_pago' => $model->id_pago], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_pago' => $model->id_pago], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_pago',
            [
                'label' => 'Cliente',
                'value' => $model->reserva->cliente->nombre ?? '(Sin cliente)',
            ],
            'monto',
            'metodo_pago',
            [
                'attribute' => 'fecha_pago',
                'value' => Yii::$app->formatter->asDate($model->fecha_pago, 'php:Y-m-d'),
            ],
            'estado',
            'transaccion_id',
        ],
    ]) ?>


</div>