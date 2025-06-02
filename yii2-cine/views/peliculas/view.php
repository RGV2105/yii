<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Películas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="peliculas-view container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="m-0"><i class="fas fa-film me-2"></i><?= Html::encode($this->title) ?></h3>
            <div>
                <?= Html::a('<i class="fas fa-edit"></i> Editar', ['update', 'id_pelicula' => $model->id_pelicula], ['class' => 'btn btn-primary me-2']) ?>
                <?= Html::a('<i class="fas fa-trash-alt"></i> Eliminar', ['delete', 'id_pelicula' => $model->id_pelicula], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', '¿Estás seguro de que deseas eliminar esta película?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="card-body">
            <?php
            echo DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-bordered table-hover align-middle'],
                'attributes' => [
                    [
                        'attribute' => 'portada',
                        'label' => 'Portada',
                        'format' => 'html',
                        'value' => function ($model) {
                            $ruta = Yii::getAlias('@webroot/portadas/' . $model->portada);
                            $web = Yii::getAlias('@web/portadas/' . $model->portada);
                            return $model->portada && file_exists($ruta)
                                ? Html::img($web, ['width' => '200', 'class' => 'img-fluid rounded shadow'])
                                : '<span class="text-muted">Sin imagen</span>';
                        },
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    'titulo',
                    'genero',
                    'clasificacion',
                    [
                        'attribute' => 'duracion_min',
                        'label' => 'Duración',
                        'value' => $model->duracion_min . ' min',
                    ],
                    [
                        'attribute' => 'fecha_estreno',
                        'format' => ['date', 'php:d/m/Y'],
                        'label' => 'Fecha de Estreno',
                    ],
                    [
                        'attribute' => 'sinopsis',
                        'format' => 'ntext',
                        'label' => 'Sinopsis',
                        'value' => $model->sinopsis,
                        'contentOptions' => ['style' => 'text-align: justify'],
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>

<!-- FontAwesome CDN (si no lo tienes ya en el layout) -->
<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
?>
