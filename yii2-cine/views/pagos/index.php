<?php

use app\models\Pagos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PagosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Pagos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pagos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_reserva',
                'value' => function ($model) {
                        return $model->reserva->cliente->nombre ?? '(Sin nombre)';
                    },
                'label' => 'Cliente',
            ],
            'monto',
            'metodo_pago',
            [
                'attribute' => 'fecha_pago',
                'value' => function ($model) {
                        return Yii::$app->formatter->asDate($model->fecha_pago, 'php:Y-m-d');
                    },
                'format' => 'raw',
            ],
            'estado',
            'transaccion_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pagos $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_pago' => $model->id_pago]);
                    }
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>

</div>