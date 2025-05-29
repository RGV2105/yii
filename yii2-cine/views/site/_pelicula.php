<?php
use yii\helpers\Html;
use yii\helpers\Url;
/** @var app\models\Peliculas $model */
?>

<div class="pelicula-card">

    <?php if ($model->portada && file_exists(Yii::getAlias('@webroot/portadas/') . $model->portada)): ?>
        <img src="<?= Yii::getAlias('@web/portadas/') . $model->portada ?>" alt="<?= Html::encode($model->titulo) ?>"
            class="img-fluid pelicula-imagen">
    <?php else: ?>
        <div class="sin-imagen">
            <?= Html::img('@web/images/sin-imagen.jpg', [
                'alt' => 'Imagen no disponible',
                'class' => 'img-fluid'
            ]) ?>
        </div>
    <?php endif; ?>


    <div class="pelicula-info">
        <h3><?= Html::encode($model->titulo) ?></h3>
        <p class="text-muted"><?= Html::encode($model->genero) ?></p>
    </div>

    <!-- Botón de Ver Detalles -->
    <div class="text-center" style="margin-top:15px;">
        <?= Html::a(
            'Ver Detalles',
            ['peliculas/detalles', 'id' => $model->id_pelicula],
            [
                'class' => 'btn btn-primary btn-detalles',
                'style' => 'padding:8px 20px;'
            ]
        ) ?>
    </div>

</div>