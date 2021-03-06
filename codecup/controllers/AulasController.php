<?php

namespace app\controllers;

use Yii;
use app\models\Aulas;
use app\models\AulasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AulasController implements the CRUD actions for Aulas model.
 */
class AulasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionBusca()
    {
        $this->layout = "admin";

        return $this->render('busca');
    }

    /**
     * Lists all Aulas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "admin";

        $searchModel = new AulasSearch();

        $searchModel->id_user = Yii::$app->user->identity->id;
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aulas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $this->layout = "admin";

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Aulas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $this->layout = "admin";

        $model = new Aulas();

        $model->disponibilidade = 1;

        $date = new \DateTime();
        //$model->data_cadastro = $date->getTimestamp();
        
        if($model->load(Yii::$app->request->post())) {
            $model->tags = implode(",", $model->tags);
            
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Aulas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = "admin";

        $model = $this->findModel($id);

        $model->tags = explode(",", $model->tags);

        if($model->load(Yii::$app->request->post())) {
            $model->tags = implode(",", $model->tags);
            
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Aulas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Aulas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aulas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aulas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
