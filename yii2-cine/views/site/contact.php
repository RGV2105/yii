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
<div class="site-contact my-5">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success text-center" role="alert">
            <i class="fas fa-check-circle fa-2x me-2"></i>
            Gracias por contactarnos. Te responderemos lo antes posible.
        </div>

        <p class="text-center mt-3">
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Nota: La aplicación está en modo desarrollo, el correo no se envía realmente sino que se guarda en
                <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Cambia la propiedad <code>useFileTransport</code> a <code>false</code> para enviar emails reales.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p class="lead mb-4">
            Si tienes consultas comerciales u otras preguntas, por favor completa el formulario y te responderemos.
            ¡Gracias!
        </p>

        <div class="row justify-content-center">
            <div class="col-lg-6">

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
                        'placeholder' => 'Escribe tu mensaje aquí...'
                    ]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row mb-3">
                            <div class="col-4">{image}</div>
                            <div class="col-8">{input}</div>
                        </div>',
                        'options' => ['class' => 'form-control', 'placeholder' => 'Código de verificación']
                    ]) ?>

                    <div class="form-group text-center mt-4">
                        <?= Html::submitButton('<i class="fas fa-paper-plane"></i> Enviar', ['class' => 'btn btn-primary px-5', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>

</div>

<!-- No olvides incluir FontAwesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
