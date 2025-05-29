<?php
/** @var yii\web\View $this */
/** @var app\models\PeliculasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Catálogo de Películas';
use yii\widgets\ListView;
?>

<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">¡Bienvenido!</h1>
        <p class="lead">Explora nuestro catálogo de películas</p>
    </div>

    <div class="body-content">
        <!-- Opcional: Mostrar el buscador si lo necesitas -->
        <?php /*thth echo $this->render('_search', ['model' => $searchModel]); */ ?>

        <div class="row">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_pelicula', // Vista parcial para cada película
                'layout' => "{items}\n{pager}",
                'options' => ['class' => 'row'],
                'itemOptions' => ['class' => 'col-lg-3 col-md-4 col-sm-6 mb-4'],
                'summaryOptions' => ['class' => 'summary mb-4'],
                'emptyText' => 'No se encontraron películas',
                'emptyTextOptions' => ['class' => 'empty text-center col-12'],
            ]) ?>
        </div>
    </div>
</div>

