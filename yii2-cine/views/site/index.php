<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use app\models\Peliculas;
use yii\helpers\Url;



// Obtener las 3 últimas películas para el carrusel
$ultimasPeliculas = Peliculas::find()->orderBy(['id_pelicula' => SORT_DESC])->limit(3)->all();

?>




<div class="site-index container mt-5">

    <!-- Encabezado Principal -->
    <div class="text-center mb-5 p-4 bg-dark text-white rounded shadow-lg" style="background: linear-gradient(135deg, #1a1a2e, #16213e);">
        <h1 class="display-3 fw-bold text-warning mb-3">
            <i class="fas fa-film me-2"></i> ¡Bienvenido al Catálogo!
        </h1>
        <p class="lead fs-4 text-light">
            Descubre una gran selección de películas que hemos preparado para ti.
        </p>
        <hr class="w-25 mx-auto text-warning">
    </div>





<?php if (!empty($ultimasPeliculas)): ?>
<div id="carouselExampleDark" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php foreach ($ultimasPeliculas as $index => $pelicula): ?>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $index ?>" <?= $index === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $index + 1 ?>"></button>
    <?php endforeach; ?>
  </div>

  <div class="carousel-inner rounded shadow overflow-hidden">
    <?php foreach ($ultimasPeliculas as $index => $pelicula): ?>
      <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-bs-interval="4000">
        <img src="<?= Yii::getAlias('@web/portadas/' . $pelicula->portada) ?>"
             class="d-block w-100 img-carrusel"
             alt="<?= Html::encode($pelicula->titulo) ?>">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 p-3 rounded">
          <h5 class="text-white"><?= Html::encode($pelicula->titulo) ?></h5>
          <p class="text-white small"><?= Html::encode($pelicula->sinopsis ?? 'Una película imperdible.') ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>
<?php endif; ?>




<div class="site-index container mt-4">
   
    <!-- Lista completa de películas -->
    <div class="row">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_pelicula',
            'layout' => "{items}\n<div class='d-flex justify-content-center'>{pager}</div>",
            'options' => ['class' => 'row'],
            'itemOptions' => ['class' => 'col-lg-3 col-md-4 col-sm-6 mb-4'],
            'summaryOptions' => ['class' => 'summary text-muted mb-4 col-12'],
            'emptyText' => '<div class="alert alert-warning w-100 text-center">No se encontraron películas</div>',
        ]) ?>
    </div>
</div>

