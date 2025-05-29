<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Iniciar sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container my-5" style="max-width: 400px;">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <p>Por favor, complete los siguientes campos para iniciar sesión:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'form-label'],
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'invalid-feedback d-block'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Nombre de usuario']) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña']) ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"form-check\">{input} {label}</div>\n{error}",
        'labelOptions' => ['class' => 'form-check-label'],
        'inputOptions' => ['class' => 'form-check-input'],
    ]) ?>

    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('¿Olvidó su contraseña?', ['site/request-password-reset'], ['class' => 'btn btn-link']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
