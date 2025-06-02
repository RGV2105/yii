<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index card card-body shadow-sm">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-user-plus"></i> ' . Yii::t('app', 'Crear Usuario'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-hover table-striped'],
        'layout' => "{summary}\n{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apellido',
            'username',
            [
                'attribute' => 'email',
                'format' => 'email',
                'contentOptions' => ['style' => 'max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'],
            ],

            [
                'attribute' => 'role',
                'value' => function ($model) {
                        return $model->role === 'admin' ? 'Administrador' : 'Usuario';
                    },
                'filter' => ['admin' => 'Administrador', 'user' => 'Usuario'],
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                        return $model->status == 1 ? 'Activo' : 'Inactivo';
                    },
                'filter' => [1 => 'Activo', 0 => 'Inactivo'],
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                'header' => 'Acciones',
                'contentOptions' => ['style' => 'min-width:100px; text-align:center;'],
            ],
        ],

    ]); ?>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isRoleAdmin()): ?>
        <p>
            <?= Html::a('Crear Película', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>


    <?php Pjax::end(); ?>


</div>