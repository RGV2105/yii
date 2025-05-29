<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<style>
    .pelicula-detalles {
        padding: 20px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #343a40;
    }

    .pelicula-meta p {
        margin-bottom: 0.5rem;
        font-size: 1rem;
        color: #555;
    }

    .pelicula-meta strong {
        color: #000;
    }

    .card-text {
        font-size: 1.05rem;
        color: #444;
        line-height: 1.6;
    }

    h2.card-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #007bff;
    }

    @media (max-width: 767px) {
        .pelicula-detalles .row>div {
            margin-bottom: 20px;
        }
    }
</style>

<div class="pelicula-detalles">
    <div class="row">
        <!-- Columna izquierda - Portada y detalles -->
        <div class="col-md-5">
            <div class="card mb-4">
                <?= Html::img(Yii::getAlias('@web/portadas/') . $model->portada, [
                    'class' => 'card-img-top',
                    'alt' => $model->titulo,
                    'style' => 'max-height: 350px; object-fit: contain; background-color: #f8f9fa; padding: 10px;'
                ]) ?>

                <div class="card-body">
                    <h1 class="card-title"><?= Html::encode($model->titulo) ?></h1>

                    <div class="pelicula-meta">
                        <p><strong>Género:</strong> <?= Html::encode($model->genero) ?></p>
                        <p><strong>Clasificación:</strong> <?= Html::encode($model->clasificacion) ?></p>
                        <p><strong>Duración:</strong> <?= Html::encode($model->duracion_min) ?> minutos</p>
                        <p><strong>Fecha Estreno:</strong>
                            <?= Yii::$app->formatter->asDate($model->fecha_estreno, 'long') ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna derecha - Sinopsis y reserva -->
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Sinopsis</h2>
                    <p class="card-text"><?= nl2br(Html::encode($model->sinopsis)) ?></p>
                </div>
            </div>

            <!-- Formulario de Reserva -->

        </div>
    </div>
</div>

<div class="d-flex flex-column flex-md-row gap-2 mt-3">
    <!-- Botón para clientes existentes -->
    <?= Html::a('Soy Cliente - Reservar', ['reservas/create', 'id_pelicula' => $model->id_pelicula], [
        'class' => 'btn btn-success'
    ]) ?>

    <!-- Botón para nuevos clientes -->
    <?= Html::a('No Soy Cliente - Registrarme', ['clientes/create'], [
        'class' => 'btn btn-warning'
    ]) ?>

    <!-- Botón para volver al inicio -->
    <?= Html::a('Volver al Inicio', ['site/index'], [
        'class' => 'btn btn-secondary'
    ]) ?>
</div>