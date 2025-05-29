<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Asientos $model */

$this->title = Yii::t('app', 'Create Asientos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asientos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
