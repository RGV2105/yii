<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Funciones $model */

$this->title = Yii::t('app', 'Update Funciones: {name}', [
    'name' => $model->id_funcion,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_funcion, 'url' => ['view', 'id_funcion' => $model->id_funcion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="funciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
