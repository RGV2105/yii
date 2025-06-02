<?php

namespace app\controllers;

use app\models\Funciones;
use app\models\FuncionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FuncionesController implements the CRUD actions for Funciones model.
 */
class FuncionesController extends BaseController
{
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
     * Lists all Funciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FuncionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Funciones model.
     * @param int $id_funcion Id Funcion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_funcion)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_funcion),
        ]);
    }

    /**
     * Creates a new Funciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Funciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_funcion' => $model->id_funcion]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Funciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_funcion Id Funcion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_funcion)
    {
        $model = $this->findModel($id_funcion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_funcion' => $model->id_funcion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Funciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_funcion Id Funcion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_funcion)
    {
        $this->findModel($id_funcion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Funciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_funcion Id Funcion
     * @return Funciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_funcion)
    {
        if (($model = Funciones::findOne(['id_funcion' => $id_funcion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
