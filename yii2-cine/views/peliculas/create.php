<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */

$this->title = Yii::t('app', 'Create Peliculas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peliculas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peliculas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php if ($model->portada): ?>
    <div>
        <label>Portada actual:</label><br>
        <img src="<?= Yii::getAlias('@web') . '/portadas/' . $model->portada ?>" alt="Portada" width="200">
    </div>
<?php endif; ?>