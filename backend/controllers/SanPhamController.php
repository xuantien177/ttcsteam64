<?php

namespace backend\controllers;

use common\models\AnhSanPham;
use common\models\AnhSlider;
use common\models\API_H17;
use common\models\PhanLoaiSanPham;
use common\models\SanPham;
use common\models\search\QuanLySanPhamSearch;
use common\models\search\SanPhamSearch;
use common\models\SizeSanPham;
use common\models\TuKhoa;
use common\models\TuKhoaSanPham;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SanPhamController implements the CRUD actions for SanPham model.
 */
class SanPhamController extends Controller
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
     * Lists all SanPham models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SanPhamSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SanPham model.
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
     * Creates a new SanPham model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()//
    {
        $model = new SanPham();

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
     * Updates an existing SanPham model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //Lấy ra thông tin phân loại sản phẩm để hiển thị khi update
        $model->phan_loai_san_phams =  ArrayHelper::map(
            PhanLoaiSanPham::findAll(['san_pham_id'=>$id]),
            'phan_loai_id',
            'phan_loai_id'
        );

        $model->size_san_phams =  ArrayHelper::map(
            SizeSanPham::findAll(['san_pham_id'=>$id]),
            'size_id',
            'size_id'
        );

        $tukhoa_sanpham = TuKhoaSanPham::findAll(['san_pham_id'=>$id]);
        $model->tu_khoa_san_phams = [];

        foreach ($tukhoa_sanpham as $item){
            //$tukhoa = TuKhoa::findOne($item->tu_khoa_id);
            //$model->tu_khoa_san_phams[] = $tukhoa->name;
            $model->tu_khoa_san_phams[] = $item->tuKhoa->name;
        }
        $model->tu_khoa_san_phams = implode(',',$model->tu_khoa_san_phams);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SanPham model.
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
     * Finds the SanPham model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SanPham the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SanPham::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionXoaAnhDaiDien($idsp){
        $san_pham = SanPham::findOne($idsp);
        if($san_pham->anh_dai_dien!='no-image.jpeg'){
            $path =  dirname(dirname(__DIR__)).'/images/'.$san_pham->anh_dai_dien;
            if(is_file($path)){
                unlink($path);
                SanPham::updateAll(['anh_dai_dien'=>'no-image.jpeg'],['id'=>$idsp]);
            }
        }else{
            \Yii::$app->session->setFlash('thongbao',"<div class='alert alert-danger'>Không thể xóa ảnh của sản phẩm này!</div>");
        }
        $this->redirect(Url::toRoute(['san-pham/update','id'=>$idsp]));
    }

    public function actionXoaAnhSanPham($idhinhanh){
        $anh_san_pham = AnhSanPham::findOne($idhinhanh);
        $id_anh_san_pham = $anh_san_pham->san_pham_id;
        if($anh_san_pham->delete())
            return $this->redirect(Url::toRoute(['san-pham/update','id' => $id_anh_san_pham]));
        else
            throw new HttpException(500, Html::errorSummary($anh_san_pham));
    }
}
