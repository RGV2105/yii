<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .rb-header {
        background: linear-gradient(to right, #8B0000, #B22222);
        color: #fff;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
        margin-bottom: 2rem;
    }

    .rb-card {
        background-color: #fff8f0;
        border: 2px solid #B22222;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 0 10px rgba(178, 34, 34, 0.3);
    }

    .rb-btn {
        background-color: #B22222;
        border-color: #B22222;
    }

    .rb-btn:hover {
        background-color: #8B0000;
        border-color: #8B0000;
    }

    .input-group-text {
        background-color: #ffd700;
        color: #000;
        font-weight: bold;
    }

    .form-label {
        font-weight: bold;
        color: #8B0000;
    }

    .lead {
        color: #333;
    }
</style>

<div class="site-contact my-5">
    <div class="rb-header">
        <h1 class="mb-0"><i class="fas fa-film me-2"></i><?= Html::encode($this->title) ?> - RB Movie</h1>
        <p class="mt-2">🎬 ¡Queremos saber de ti! 🍿</p>
    </div>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="alert alert-success text-center shadow-sm" role="alert">
            <i class="fas fa-check-circle fa-2x mb-2 text-success"></i><br>
            <strong>Gracias por contactarnos.</strong><br> Te responderemos lo antes posible.
        </div>

        <?php if (Yii::$app->mailer->useFileTransport): ?>
            <p class="alert alert-warning text-center mt-3 small">
                <i class="fas fa-info-circle me-1"></i>
                Nota: El correo fue guardado en:<br>
                <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code><br>
                Cambia <code>useFileTransport</code> a <code>false</code> para enviarlos realmente.
            </p>
        <?php endif; ?>

    <?php else: ?>

        <p class="lead text-center mb-4">
            ¿Tienes dudas sobre funciones, entradas o combos? Completa el formulario y nuestro equipo RB Movie te responderá
            pronto.
        </p>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="rb-card">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name', [
                        'template' => "{label}\n<div class='input-group mb-3'>
                            <span class='input-group-text'><i class='fas fa-user'></i></span>{input}
                        </div>\n{error}"
                    ])->textInput(['autofocus' => true, 'placeholder' => 'Tu nombre']) ?>

                    <?= $form->field($model, 'email', [
                        'template' => "{label}\n<div class='input-group mb-3'>
                            <span class='input-group-text'><i class='fas fa-envelope'></i></span>{input}
                        </div>\n{error}"
                    ])->input('email', ['placeholder' => 'tu@email.com']) ?>

                    <?= $form->field($model, 'subject', [
                        'template' => "{label}\n<div class='input-group mb-3'>
                            <span class='input-group-text'><i class='fas fa-tag'></i></span>{input}
                        </div>\n{error}"
                    ])->textInput(['placeholder' => 'Asunto']) ?>

                    <?= $form->field($model, 'body')->textarea([
                        'rows' => 6,
                        'placeholder' => 'Escribe tu mensaje aquí...',
                        'class' => 'form-control mb-3'
                    ]) ?>

                    <div class="form-group text-center mt-4">
                        <?= Html::submitButton('<i class="fas fa-paper-plane"></i> Enviar', [
                            'class' => 'btn rb-btn text-white px-5',
                            'name' => 'contact-button'
                        ]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>
<!-- Botones de acción -->
<div class="botones-reserva d-flex flex-column flex-md-row gap-2 mt-3">

    <?= Html::a('<i class="fas fa-home"></i> Volver al Inicio', ['site/index'], [
        'class' => 'btn btn-secondary'
    ]) ?>
</div>
<!-- FontAwesome para iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">