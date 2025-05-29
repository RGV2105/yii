<?php

use app\models\Asientos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\AsientosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Asientos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asientos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Asientos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_asiento_reservado',
            [
                'attribute' => 'id_reserva',
                'label' => 'Cliente',
                'value' => function ($model) {
                        return $model->reserva->cliente->nombre ?? '(Sin nombre)';
                    },
            ],
            'fila',
            'numero',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Asientos $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_asiento_reservado' => $model->id_asiento_reservado]);
                    }
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>

</div>