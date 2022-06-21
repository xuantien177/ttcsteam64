<?php

namespace backend\controllers;

use common\models\API_H17;
use common\models\DonHang;
use common\models\LoginForm;
use common\models\SanPham;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yiister\gentelella\widgets\Accordion;
use yiister\gentelella\widgets\Menu;
use yiister\gentelella\widgets\Panel;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //Nếu không có roles: Tất cả mọi người
                // ? : Khách
                // @ : Người đã đăng nhập
                'rules' => [
                    [
                        'actions' => ['error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['login'],//Hàm actionLogin dành cho khách (người chưa đăng nhập)
                        'allow' => true,
                        'roles' =>['?'],
                    ],
                    [
                        'actions' => ['logout', 'index','panel'],//2 hàm action logout và actionIndex chỉ dành cho người đã đăng nhập
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $donHang = DonHang::find()->all();
        $sanPham = SanPham::find()->limit(5)->all();
        $khachHang = User::findAll(['vai_tro'=>'Khách hàng']);
        return $this->render('index',[
            'donHang'=>$donHang,
            'sanPham'=>$sanPham,
            'khachHang'=>$khachHang
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionPanel(){

        return $this->render('panel');
    }
}
