<?php

namespace backend\controllers;

use common\models\API_H17;
use common\models\DonHang;
use common\models\DonHangChiTiet;
use common\models\QuanLyChiTietDonHang;
use common\models\SanPham;
use common\models\search\DonHangSearch;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonHangController implements the CRUD actions for DonHang model.
 */
class DonHangController extends Controller
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
                            'actions' => ['create','update','delete','nhaphang'],
                            'allow' => true,
                            'matchCallback'=> function($rule,$action){
                                return API_H17::isAccess(['Quản lý','Bán hàng']);
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
     * Lists all DonHang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonHangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DonHang model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $chi_tiet_don_hang = QuanLyChiTietDonHang::findAll(['don_hang_id'=>$id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'chi_tiet_don_hang'=> $chi_tiet_don_hang
        ]);
    }

    /**
     * Creates a new DonHang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DonHang();

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
     * Updates an existing DonHang model.
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
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing DonHang model.
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
     * Finds the DonHang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DonHang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DonHang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionXoaSp($id){
        $don_hang_chi_tiet =  DonHangChiTiet::findOne($id);
        $id_donhang =  $don_hang_chi_tiet->don_hang_id;
        $donhang = DonHang::findOne($id_donhang);
        $so_luong_moi =  $donhang->tong_so_luong - $don_hang_chi_tiet->so_luong;
        $thanh_tien_moi = $donhang->thanh_tien - $don_hang_chi_tiet->so_luong * $don_hang_chi_tiet->don_gia;
        $tong_tien = $thanh_tien_moi * (1 - $donhang->chiet_khau/100);

        DonHangChiTiet::deleteAll(['id'=>$id]);
        DonHang::updateAll(['thanh_tien'=>$thanh_tien_moi, 'tong_so_luong'=>$so_luong_moi, 'tong_tien'=>$tong_tien],['id'=>$donhang->id]);
        $this->redirect(Url::toRoute(['don-hang/update','id'=>$id_donhang]));
    }

    public function actionNhaphang(){
//        VarDumper::dump($_POST['SanPham']);
//        exit();
        if(isset($_POST['SanPham'])){
            $donhang = new DonHang();
            $donhang->type =  'Nhập hàng';
            $donhang->ho_ten = '1';
            $donhang->dien_thoai = '2';
            $donhang->email = '3';
            $donhang->dia_chi_giao_hang = '4';
            $donhang->ghi_chu = '3';
            $tong_tien_don_hang = 0;
            $tong_so_luong = 0;
            if($donhang->save()){
                foreach ($_POST['SanPham']['SoLuong'] as $id_sp=>$sl){
                    $dh_chitiet = new DonHangChiTiet();
                    $dh_chitiet->don_hang_id = $donhang->id;
                    $dh_chitiet->san_pham_id = $id_sp;
                    $dh_chitiet->so_luong = $sl;
                    $dh_chitiet->gia_nhap = $_POST['SanPham']['GiaNhap'][$id_sp];
                    $dh_chitiet->don_gia = $_POST['SanPham']['GiaBan'][$id_sp];
                    $dh_chitiet->ton_kho =  $sl;
                    $dh_chitiet->thanh_tien = $_POST['SanPham']['GiaNhap'][$id_sp] * $sl;
                    $dh_chitiet->tong_tien = $dh_chitiet->thanh_tien;
                    if($dh_chitiet->save()){
                        $tong_so_luong +=$sl;
                        $tong_tien_don_hang +=$dh_chitiet->tong_tien;
                        $sanpham = SanPham::findOne($dh_chitiet->san_pham_id);
                        $soLuongMoi =  $sanpham->so_luong + $sl;
                        SanPham::updateAll([
                            'so_luong'=>$soLuongMoi,
                            'gia_ban'=> (new SanPham())->getGiaGoiY($dh_chitiet->san_pham_id)
                        ],['id'=>$sanpham->id]);
                    }
                }
            }
            DonHang::updateAll(['thanh_tien'=>$tong_tien_don_hang, 'tong_so_luong'=>$tong_so_luong, 'tong_tien'=>$tong_tien_don_hang],
            ['id'=>$donhang->id
            ]);
            echo Json::encode(['message'=>'Đã lưu đơn hàng thành công']);
        }
        else{
           return $this->render('nhaphang');
        }
    }


}
