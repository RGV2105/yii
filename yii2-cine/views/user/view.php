<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->nombre . ' ' . $model->apellido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view container my-4">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary me-2']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Back to list'), ['index'], ['class' => 'btn btn-secondary ms-2']) ?>
    </p>

    <div class="card shadow-sm">
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-bordered table-striped'],
                'attributes' => [
                   
                    'nombre',
                    'apellido',
                    'username',
                    'email:email',
                    
                    [
                        'attribute' => 'role',
                        'value' => function($model) {
                            // Opcional: mostrar rol con nombre legible
                            $roles = [
                                'user' => 'Usuario',
                                'admin' => 'Administrador',
                            ];
                            return $roles[$model->role] ?? $model->role;
                        },
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function($model) {
                            return $model->status == 1 ? 'Activo' : 'Inactivo';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>
