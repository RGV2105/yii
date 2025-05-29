<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Asientos $model */

$this->title = Yii::t('app', 'Update Asientos: {name}', [
    'name' => $model->id_asiento_reservado,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_asiento_reservado, 'url' => ['view', 'id_asiento_reservado' => $model->id_asiento_reservado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="asientos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
