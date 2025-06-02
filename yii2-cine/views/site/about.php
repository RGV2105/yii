<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Acerca de EvolMovie';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .rb-header {
        background: linear-gradient(to right, #8B0000, #B22222);
        color: #fff;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.4);
        text-align: center;
        margin-bottom: 2rem;
    }

    .rb-about-card {
        background-color: #fffaf5;
        border: 2px solid #B22222;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 0 15px rgba(178, 34, 34, 0.2);
        color: #333;
    }

    .rb-about-card p {
        font-size: 1.1rem;
        margin-bottom: 1.2rem;
    }

    .rb-about-card strong {
        color: #B22222;
    }

    .rb-about-footer {
        text-align: center;
        margin-top: 2rem;
        font-weight: bold;
        color: #8B0000;
    }
</style>

<div class="site-about my-5">

    <div class="rb-header">
        <h1 class="mb-0"><i class="fas fa-star me-2"></i><?= Html::encode($this->title) ?></h1>
        <p class="mt-2">🎬 Conoce más sobre nuestra historia y pasión por el cine 🍿</p>
    </div>

    <div class="rb-about-card">
        <p class="lead">
            En <strong>RB Movie</strong> somos un cine de calidad, comprometidos con ofrecer la mejor experiencia
            cinematográfica para todos nuestros clientes.
        </p>

        <p>
            Nos enorgullece ser reconocidos como los mejores en el sector, brindando una gran variedad de películas y
            formatos para satisfacer todos los gustos y preferencias.
        </p>

        <p>
            En <strong>EvolMovie</strong>, cada función es una experiencia única, donde la innovación, la comodidad y el
            entretenimiento
            se combinan para que disfrutes al máximo.
        </p>

        <p>
            ¡Ven y vive el cine como nunca antes con nosotros!
        </p>
    </div>

    <div class="rb-about-footer">
        🎟️ ¡Te esperamos en tu próxima función!
    </div>

</div>
<!-- Botones de acción -->
<div class="botones-reserva d-flex flex-column flex-md-row gap-2 mt-3">

    <?= Html::a('<i class="fas fa-home"></i> Volver al Inicio', ['site/index'], [
        'class' => 'btn btn-secondary'
    ]) ?>
</div>

<!-- FontAwesome para los íconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">