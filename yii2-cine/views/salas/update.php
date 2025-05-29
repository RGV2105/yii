<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Salas $model */

$this->title = Yii::t('app', 'Update Salas: {name}', [
    'name' => $model->id_sala,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sala, 'url' => ['view', 'id_sala' => $model->id_sala]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="salas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
