<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Funciones $model */

$this->title = Yii::t('app', 'Create Funciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
