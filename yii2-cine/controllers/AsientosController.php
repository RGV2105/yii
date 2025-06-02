<?php

namespace app\controllers;

use app\models\Asientos;
use app\models\AsientosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controller\Yii;

/**
 * AsientosController implements the CRUD actions for Asientos model.
 */
class AsientosController extends BaseController
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
     * Lists all Asientos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AsientosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asientos model.
     * @param int $id_asiento_reservado Id Asiento Reservado
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_asiento_reservado)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_asiento_reservado),
        ]);
    }

    /**
     * Creates a new Asientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Asientos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_asiento_reservado' => $model->id_asiento_reservado]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Asientos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_asiento_reservado Id Asiento Reservado
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_asiento_reservado)
    {
        $model = $this->findModel($id_asiento_reservado);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_asiento_reservado' => $model->id_asiento_reservado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asientos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_asiento_reservado Id Asiento Reservado
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_asiento_reservado)
    {
        $this->findModel($id_asiento_reservado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_asiento_reservado Id Asiento Reservado
     * @return Asientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_asiento_reservado)
    {
        if (($model = Asientos::findOne(['id_asiento_reservado' => $id_asiento_reservado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
