<?php
use yii\helpers\Html;
use yii\helpers\Url;
/** @var app\models\Peliculas $model */
?>

<div class="card h-100 shadow-sm border-0 pelicula-card">
    <!-- Imagen de la película -->
    <?php if ($model->portada && file_exists(Yii::getAlias('@webroot/portadas/') . $model->portada)): ?>
        <?= Html::img(Url::to('@web/portadas/' . $model->portada), [
            'alt' => Html::encode($model->titulo),
            'class' => 'card-img-top img-fluid rounded-top'
        ]) ?>
    <?php else: ?>
        <?= Html::img('@web/images/sin-imagen.jpg', [
            'alt' => 'Imagen no disponible',
            'class' => 'card-img-top img-fluid rounded-top'
        ]) ?>
    <?php endif; ?>

    <!-- Información -->
    <div class="card-body d-flex flex-column">
        <h5 class="card-title text-primary fw-bold"><?= Html::encode($model->titulo) ?></h5>
        <p class="card-text text-muted"><i class="fas fa-film me-1"></i><?= Html::encode($model->genero) ?></p>

        <div class="mt-auto text-center">
            <?= Html::a('<i class="fas fa-eye"></i> Ver Detalles', ['peliculas/detalles', 'id' => $model->id_pelicula], [
                'class' => 'btn btn-outline-primary btn-sm w-100 mt-2'
            ]) ?>
        </div>
    </div>
</div>