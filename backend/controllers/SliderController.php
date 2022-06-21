<?php

namespace backend\controllers;

use common\models\AnhSlider;
use common\models\API_H17;
use common\models\Slider;
use common\models\search\SliderSearch;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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
                            'actions' => ['create','update','delete','xoa-anh-slider'],
                            'allow' => true,
                            'matchCallback'=> function($rule,$action){
                                return API_H17::isAccess(['Quản lý','Quản trị viên']);
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();

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
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $hinh_anh_slider = AnhSlider::findAll(['slider_id' => $id]);

        //beforeSave -> Save() ->afterSave()
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'hinh_anh_slider' => $hinh_anh_slider
        ]);
    }

    /**
     * Deletes an existing Slider model.
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
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //beforeDelete -> delete() ->afterDelete
    //         [Xóa ảnh trong db] -> [Xóa ảnh trong thư mục vật lý images]
    public function actionXoaAnhSlider($idhinhanh){
        $anh_slider = AnhSlider::findOne($idhinhanh);
        $id_slider = $anh_slider->slider_id;
        if($anh_slider->delete())
            return $this->redirect(Url::toRoute(['slider/update','id' => $id_slider]));
        else
            throw new HttpException(500, Html::errorSummary($anh_slider));
    }
}
