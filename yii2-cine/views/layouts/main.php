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
        body {
            padding-top: 70px;
        }
        #header .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }
        #header .nav-link:hover,
        #header .nav-link:focus {
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

    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Acerca de', 'url' => ['/site/about']],
        ['label' => 'Contactanos', 'url' => ['/site/contact']],

    ];

    if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isRoleAdmin()) {
        $menuItems[] = [
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
        ];
        $menuItems[] = ['label' => 'Usuarios', 'url' => ['/user/index']];
    }

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li class="nav-item">'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'd-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'nav-link btn btn-link logout p-0', 'style' => 'color:#fff;']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => $menuItems,
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

<footer id="footer" class="mt-auto py-3 bg-dark text-light text-center">
    <div class="container">
        <p class="mb-1">&copy; <?= date('Y') ?> <strong><?= Html::encode(Yii::$app->name) ?></strong>. Todos los derechos reservados.</p>
        <p class="mb-1">
            Desarrollado por <strong>Renè Balseca </strong> |
            <a href="https://www.yiiframework.com/" target="_blank" rel="noopener noreferrer" class="text-warning text-decoration-none">Yii Framework</a> y
            <a href="https://getbootstrap.com/" target="_blank" rel="noopener noreferrer" class="text-warning text-decoration-none">Bootstrap 5</a>.
        </p>
    </div>
</footer>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

<!-- Incluye FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">