<?php

namespace backend\controllers;

use common\models\API_H17;
use common\models\Blog;
use common\models\SanPham;
use common\models\search\BlogSearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
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
                            'actions' => ['create','update','delete','xoa-anh-dai-dien','xoa-anh-san-pham'],
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
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
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
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();

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
     * Updates an existing Blog model.
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
     * Deletes an existing Blog model.
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
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionXoaAnhDaiDien($idblog){
        $blog = Blog::findOne($idblog);
        if($blog->anh_dai_dien!='no-image.jpeg'){
            $path =  dirname(dirname(__DIR__)).'/images/'.$blog->anh_dai_dien;
            if(is_file($path)){
                unlink($path);
                Blog::updateAll(['anh_dai_dien'=>'no-image.jpeg'],['id'=>$idblog]);
            }
        }else{
            \Yii::$app->session->setFlash('thongbao',"<div class='alert alert-danger'>Không thể xóa ảnh của blog này!</div>");
        }
        $this->redirect(Url::toRoute(['blog/update','id'=>$idblog]));
    }
}
