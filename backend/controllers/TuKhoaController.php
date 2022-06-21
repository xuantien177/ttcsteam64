<?php

namespace backend\controllers;

use common\models\API_H17;
use common\models\TuKhoa;
use common\models\search\TuKhoaSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * TuKhoaController implements the CRUD actions for TuKhoa model.
 */
class TuKhoaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    //Nếu không có roles: Tất cả mọi người
                    // ? : Khách
                    // @ : Người đã đăng nhập
                    'rules' => [
                        [
                            'actions' => ['index','view'],
                            'allow' => true,
                            'matchCallback'=> function($rule,$action){
                                return API_H17::isAccess(['Quản lý','Bán hàng']);
                            }
                        ],
                        [
                            'actions' => ['create','update','delete','list'],
                            'allow' => true,
                            'matchCallback'=> function($rule,$action){
                                return API_H17::isAccess(['Quản lý']);
                            }
                        ],
                    ],
                ],
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
     * Lists all TuKhoa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TuKhoaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TuKhoa model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TuKhoa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TuKhoa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TuKhoa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TuKhoa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TuKhoa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TuKhoa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TuKhoa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionList($query)
    {
        $models = TuKhoa::find()->andFilterWhere(['LIKE','name',$query])
        ->all(); // tạo danh sách cá đối tượng
        $items = [];

        /** @var TuKhoa $model */
        foreach ($models as $model) {
            $items[] = ['name' => $model->name]; // chuyển danh sách trên sang mảng 1 chiều
        }
        // We know we can use ContentNegotiator filter
        // this way is easier to show you here :)
        Yii::$app->response->format = Response::FORMAT_JSON;

        return $items;
    }
}
