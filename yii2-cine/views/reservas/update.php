<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reservas $model */

$this->title = Yii::t('app', 'Update Reservas: {name}', [
    'name' => $model->id_reserva,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_reserva, 'url' => ['view', 'id_reserva' => $model->id_reserva]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="reservas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
