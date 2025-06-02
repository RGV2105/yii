<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">



<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        /* Estilos personalizados para el navbar y footer */
        body {
            padding-top: 70px; /* Para evitar que el contenido quede oculto tras navbar fixed */
        }
        #header .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }
        #header .nav-link:hover, #header .nav-link:focus {
            color: #f8c146 !important;
        }
        #footer {
            background-color: #222;
            color: #ccc;
            font-size: 0.9rem;
        }
        #footer a {
            color: #f8c146;
            text-decoration: none;
        }
        #footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => '<img src="' . Yii::getAlias('@web/portadas/RJ.png') . '" alt="RBMovie logo" style="height:30px; margin-right:10px;"> RB Movie',

            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow-sm'],
            'brandOptions' => ['class' => 'd-flex align-items-center'],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto'],
            'items' => [
                ['label' => 'Inicio', 'url' => ['/site/index']],
                ['label' => 'Acerca de', 'url' => ['/site/about']],
                [
                    'label' => 'Cine',
                    'items' => [
                        ['label' => 'Asientos', 'url' => ['/asientos/index']],
                        ['label' => 'Clientes', 'url' => ['/clientes/index']],
                        ['label' => 'Funciones', 'url' => ['/funciones/index']],
                        ['label' => 'Pagos', 'url' => ['/pagos/index']],
                        ['label' => 'Películas', 'url' => ['/peliculas/index']],
                        ['label' => 'Reservas', 'url' => ['/reservas/index']],
                        ['label' => 'Salas', 'url' => ['/salas/index']],
                    ],
                ],
                ['label' => 'Usuarios', 'url' => ['/user/index']],
                Yii::$app->user->isGuest
                    ? ['label' => 'Login', 'url' => ['/site/login']]
                    : '<li class="nav-item">'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'd-inline'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'nav-link btn btn-link logout p-0', 'style' => 'color:#fff;']
                        )
                        . Html::endForm()
                        . '</li>'
            ],
            'encodeLabels' => false,
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container py-4">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'],
                    'options' => ['class' => 'breadcrumb'],
                ]) ?>
            <?php endif; ?>

            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 text-center">
        <div class="container">
            <p>&copy; <?= date('Y') ?> <strong><?= Html::encode(Yii::$app->name) ?></strong>. Todos los derechos reservados.</p>
            <p>
                Desarrollado con <a href="https://www.yiiframework.com/" target="_blank" rel="noopener noreferrer">Yii Framework</a> y
                <a href="https://getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap 5</a>.
            </p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>


