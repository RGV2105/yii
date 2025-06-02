<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class BaseController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [

                    // Acciones restringidas solo para el rol admin
                    [
                        'allow' => true,
                        'actions' => ['','','','detalles','index', 'view','create', 'update', 'delete'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity && Yii::$app->user->identity->isRoleAdmin();
                        },
                    ],

                    // Acciones permitidas para cualquier usuario logueado
                    [
                        'allow' => true,
                        'actions' => ['','','','','detalles','index', 'view'],
                        'roles' => ['@'],
                    ],
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
}
