<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Salas $model */

$this->title = Yii::t('app', 'Creacion Salas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
