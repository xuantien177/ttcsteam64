<?php

namespace frontend\controllers;

use common\models\DonHang;
use common\models\DonHangChiTiet;
use common\models\QuanLyChiTietDonHang;
use common\models\search\DonHangSearch;
use Yii;
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

    public function actionHuyDonHang($id){
        //$chi_tiet_don_hang = DonHangChiTiet::findAll(['id'=>$id]);
        $don_hang = DonHang::findOne(['id'=>$id]);
        $chi_tiet_don_hang = QuanLyChiTietDonHang::findAll(['don_hang_id'=>$id]);

        if(isset($_POST['DonHang']['ly_do_huy'])){
            DonHang::updateAll([
                'ly_do_huy'=>$_POST['DonHang']['ly_do_huy'],
                'tinh_trang'=>'Chờ xác nhận hủy',
            ],['id'=>$don_hang->id]);
            Yii::$app->session->setFlash('thongbao','<span class="text-success">Chúng tôi đã nhận được yêu cầu hủy đơn hàng của bạn và sẽ phản hồi sớm nhất có thể!</span>');
            return $this->redirect(['site/index']);
        }

        return $this->render('huy-don-hang',[
            'don_hang'=>$don_hang,
            'chi_tiet_don_hang'=> $chi_tiet_don_hang
        ]);
    }
}
