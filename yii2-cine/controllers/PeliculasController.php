<?php

namespace app\controllers;

use app\models\Peliculas;
use app\models\PeliculasSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;




/**
 * PeliculasController implements the CRUD actions for Peliculas model.
 */
class PeliculasController extends Controller
{

    public function actionDetalles($id)
    {
        $model = Peliculas::findOne($id);


        if (!$model) {
            throw new NotFoundHttpException('La película no existe.');
        }



        return $this->render('detalles', [
            'model' => $model,

        ]);
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Peliculas models.
     *
     * @return string
     */
    public function actionIndex()
    {


        $searchModel = new PeliculasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peliculas model.
     * @param int $id_pelicula Id Pelicula
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pelicula)
    {
        $model = Peliculas::findOne($id_pelicula);

        if ($model === null) {
            throw new NotFoundHttpException('La película no existe.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id_pelicula),
        ]);
    }

    /**
     * Creates a new Peliculas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */


    public function actionCreate()
    {
        $model = new Peliculas();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->validate()) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($model->save(false)) {
                        // Subir imagen después de guardar el modelo
                        if ($model->imageFile && $model->upload()) {
                            $model->save(false); // Guardar el nombre del archivo
                        }
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', 'Película creada');
                        return $this->redirect(['view', 'id_pelicula' => $model->id_pelicula]);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', 'Error: ' . $e->getMessage());
                }
            }
        }

        return $this->render('create', ['model' => $model]);
    }


    /**
     * Updates an existing Peliculas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pelicula Id Pelicula
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pelicula)
    {
        $model = $this->findModel($id_pelicula);
        $message = '';

        if ($this->request->isPost && $model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

                if ($model->validate()) {

                    // Subir imagen antes de guardar
                    if ($model->imageFile && !$model->upload()) {
                        throw new \Exception('Error al subir la imagen');
                    }

                    if ($model->save(false)) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', 'Película actualizada correctamente');
                        return $this->redirect(['view', 'id_pelicula' => $model->id_pelicula]);
                    }
                }

                $message = 'Error: ' . implode(' ', $model->getFirstErrors());
                $transaction->rollBack();

            } catch (\Exception $e) {
                $transaction->rollBack();
                $message = 'Error: ' . $e->getMessage();
                Yii::error($e);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'message' => $message,
        ]);
    }




    /**
     * Deletes an existing Peliculas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pelicula Id Pelicula
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pelicula)
    {
        $this->findModel($id_pelicula)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peliculas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pelicula Id Pelicula
     * @return Peliculas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pelicula)
    {
        if (($model = Peliculas::findOne(['id_pelicula' => $id_pelicula])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }



}
