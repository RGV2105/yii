<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $pelicula app\models\Pelicula */

$ruta = Yii::getAlias('@web/portadas/' . $pelicula->portada);
$img = Html::img($ruta, ['class' => 'img-fluid rounded shadow', 'alt' => $pelicula->titulo]);
?>

<div class="item text-center">
    <a href="<?= Url::to(['peliculas/view', 'id' => $pelicula->id_pelicula]) ?>">
        <?= $img ?>
        <div class="mt-2 text-white bg-dark p-2 rounded">
            <?= Html::encode($pelicula->titulo) ?>
        </div>
    </a>
</div>
