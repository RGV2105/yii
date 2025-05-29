<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */

$this->title = Yii::t('app', 'Update Peliculas: {name}', [
    'name' => $model->id_pelicula,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peliculas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelicula, 'url' => ['view', 'id_pelicula' => $model->id_pelicula]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="peliculas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
