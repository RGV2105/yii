<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<style>
    .pelicula-detalles {
        padding: 30px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        overflow: hidden;
    }

    .card-title {
        font-size: 2rem;
        font-weight: bold;
        color: #212529;
    }

    .pelicula-meta p {
        margin-bottom: 0.6rem;
        font-size: 1rem;
        color: #555;
    }

    .pelicula-meta i {
        color: #007bff;
        margin-right: 6px;
    }

    .card-text {
        font-size: 1.1rem;
        color: #333;
        line-height: 1.7;
    }

    .card-sinopsis-title {
        font-size: 1.4rem;
        color: #0d6efd;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .botones-reserva .btn {
        min-width: 200px;
        font-weight: 500;
    }

    @media (max-width: 767px) {
        .pelicula-detalles .row > div {
            margin-bottom: 20px;
        }
    }
</style>

<div class="pelicula-detalles">
    <div class="row align-items-start">
        <!-- Columna izquierda - Portada y detalles -->
        <div class="col-md-5">
            <div class="card mb-4">
                <?= Html::img(Yii::getAlias('@web/portadas/') . $model->portada, [
                    'class' => 'card-img-top',
                    'alt' => Html::encode($model->titulo),
                    'style' => 'max-height: 380px; object-fit: contain; background-color: #f9f9f9; padding: 12px;'
                ]) ?>

                <div class="card-body">
                    <h1 class="card-title"><?= Html::encode($model->titulo) ?></h1>
                    <div class="pelicula-meta mt-3">
                        <p><i class="fas fa-film"></i><strong> Género:</strong> <?= Html::encode($model->genero) ?></p>
                        <p><i class="fas fa-certificate"></i><strong> Clasificación:</strong> <?= Html::encode($model->clasificacion) ?></p>
                        <p><i class="fas fa-clock"></i><strong> Duración:</strong> <?= Html::encode($model->duracion_min) ?> min</p>
                        <p><i class="fas fa-calendar-alt"></i><strong> Estreno:</strong>
                            <?= Yii::$app->formatter->asDate($model->fecha_estreno, 'long') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna derecha - Sinopsis -->
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-sinopsis-title">📝 Sinopsis</div>
                    <p class="card-text"><?= nl2br(Html::encode($model->sinopsis)) ?></p>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="botones-reserva d-flex flex-column flex-md-row gap-2 mt-3">
               

                <?= Html::a('<i class="fas fa-home"></i> Volver al Inicio', ['site/index'], [
                    'class' => 'btn btn-secondary'
                ]) ?>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome CDN (si aún no lo cargas en layout) -->
<?php

?>
