<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="site-error text-center mt-5">
    <div class="error-icon mb-4">
        <i class="fas fa-exclamation-triangle fa-5x text-warning"></i>
    </div>

    <h1 class="display-4 text-danger"><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger mt-4 mx-auto" style="max-width: 600px;">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p class="mt-4 text-muted">
        Lo sentimos, ha ocurrido un error mientras se procesaba su solicitud.
    </p>

    <p class="text-muted">
        Si cree que se trata de un error del servidor, por favor <a href="mailto:soporte@ejemplo.com">contáctenos</a>.
        Gracias.
    </p>

    <div class="mt-4">
        <?= Html::a('<i class="fas fa-home"></i> Volver al inicio', Yii::$app->homeUrl, ['class' => 'btn btn-outline-primary']) ?>
    </div>
</div>