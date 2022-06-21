<?php

namespace frontend\controllers;

use common\models\AnhSanPham;
use common\models\Blog;
use common\models\ChiTietSanPham;
use common\models\DanhMucSanPham;
use common\models\DonHang;
use common\models\PhanLoai;
use common\models\PhanLoaiSanPham;
use common\models\QuanLySanPham;
use common\models\SanPham;
use common\models\SizeSanPham;
use common\models\Slider;
use common\models\ThuongHieu;
use common\models\User;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\BaseObject;
use yii\base\InvalidArgumentException;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\swiftmailer\Mailer;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\HttpException;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $sliders = Slider::find()->all();
        $hangMoiVes= SanPham::find()
            ->orderBy(['ngay_hang_ve'=>SORT_DESC])
            ->limit(5)
            ->all();
        $hangTrends = ChiTietSanPham::find()
            ->andFilterWhere(['noi_bat'=>1])
            ->all();
        $phanLoai = PhanLoai::find()->all();

        $phanLoai_thoitrang = PhanLoai::findOne(['code'=>'thoi-trang']);

        $phanLoai_thethao = PhanLoai::findOne(['code'=>'the-thao']);

        $phanLoai_vanphong = PhanLoai::findOne(['code'=>'van-phong']);

        $thuongHieu = ThuongHieu::find()->all();


       /** @var PhanLoaiSanPham $plsp
        *  @var SanPham $sp
        */
        return $this->render('index',[
            'sliders'=>$sliders,
            'hangMoiVes'=>$hangMoiVes,
            'hangTrends' =>$hangTrends,
            'phanLoai'=>$phanLoai,
            'phanLoai_thoitrang'=>$phanLoai_thoitrang,
            'phanLoai_thethao'=>$phanLoai_thethao,
            'phanLoai_vanphong'=>$phanLoai_vanphong,
            'thuongHieu'=>$thuongHieu
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $thuongHieu = ThuongHieu::find()->all();
        return $this->render('about',[
            'thuongHieu'=>$thuongHieu
        ]);
    }

    public function actionBlog(){
        $blog = Blog::find()->all();
        return $this->render('blog',[
            'blog'=>$blog
        ]);
    }

    public function actionChiTietBlog($path){
        $blog = Blog::findOne(['id'=>$path]);
        return $this->render('chi-tiet-blog',[
            'blog'=>$blog
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    /**
     * $path : code của phân loại sản phẩm
     * @param $path string
     */
    public function actionSanPham($path){
       $sanphams = DanhMucSanPham::findAll(['code_phan_loai'=>$path]);
       $phan_loai_san_pham = PhanLoai::findOne(['code'=>$path]);
       $sanphams_banchay =  ChiTietSanPham::findAll(['ban_chay'=>1]);
       $sanphams_noibat = ChiTietSanPham::findAll(['noi_bat'=>1]);
       $ds_phanLoai = PhanLoai::find()->all();
       //$ds_sanpham = ChiTietSanPham::find()->all();
        $san_pham = new QuanLySanPham();

//       VarDumper::dump($ds_sanpham,10,true);
//       exit();
       return $this->render('san-pham',[
           'sanphams'=>$sanphams,
           'phan_loai_san_pham'=>$phan_loai_san_pham,
           'sanphams_banchay'=>$sanphams_banchay,
           'sanphams_noibat'=>$sanphams_noibat,
           'ds_phanLoai'=>$ds_phanLoai,
           'san_pham' => $san_pham
       ]);
    }

    public function actionThuongHieu($path){
        $sanPhams_ThuongHieu = ChiTietSanPham::findAll(['code_thuong_hieu'=>$path]);
        $ThuongHieu = ThuongHieu::findOne(['code'=>$path]);
        $sanphams_banchay =  ChiTietSanPham::findAll(['ban_chay'=>1]);
        $sanphams_noibat = ChiTietSanPham::findAll(['noi_bat'=>1]);
        $ds_phanLoai = PhanLoai::find()->all();
        $san_pham = new QuanLySanPham();
        return $this->render('thuong-hieu',[
           'sanPhams_ThuongHieu'=>$sanPhams_ThuongHieu,
           'ThuongHieu'=>$ThuongHieu,
            'sanphams_banchay'=>$sanphams_banchay,
            'sanphams_noibat'=>$sanphams_noibat,
            'ds_phanLoai'=>$ds_phanLoai,
            'san_pham' => $san_pham
        ]);
    }

    public function actionTimKiem(){
        $sanphams_banchay =  ChiTietSanPham::findAll(['ban_chay'=>1]);
        $sanphams_noibat = ChiTietSanPham::findAll(['noi_bat'=>1]);
        $ds_phanLoai = PhanLoai::find()->all();
        //$ds_sanpham = ChiTietSanPham::find()->all();
        $san_pham = new QuanLySanPham();
        $quanLySanPham = new QuanLySanPham();
        $quanLySanPham->load(Yii::$app->request->get());//hàm này để lấy dữ liệu từ form đẩy lên
//        VarDumper::dump($quanLySanPham->attributes,10,true);
//        exit();
        $ket_qua = QuanLySanPham::find();
        if($quanLySanPham->name!='' && !is_null($quanLySanPham->name))
            $ket_qua->andFilterWhere(['like','name',$quanLySanPham->name]);
        if($quanLySanPham->thuong_hieu_id!='' && !is_null($quanLySanPham->thuong_hieu_id))
            $ket_qua->andFilterWhere(['thuong_hieu_id'=>$quanLySanPham->thuong_hieu_id]);
        if($quanLySanPham->phan_loai_id!='' && !is_null($quanLySanPham->phan_loai_id))
            $ket_qua->andFilterWhere(['phan_loai_id'=>$quanLySanPham->phan_loai_id]);
        if($quanLySanPham->gia_ban_tu != '' && !is_null($quanLySanPham->gia_ban_tu))
            $ket_qua->andFilterWhere(['>=','gia_ban',$quanLySanPham->gia_ban_tu]);

        if($quanLySanPham->gia_ban != '' && !is_null($quanLySanPham->gia_ban))
            $ket_qua->andFilterWhere(['<=','gia_ban',$quanLySanPham->gia_ban]);

        $ket_qua = $ket_qua->all();
        return $this->render('tim-kiem',[
            'ket_qua'=>$ket_qua,
            'du_lieu_tim_kiem'=>$quanLySanPham,
            'sanphams_banchay'=>$sanphams_banchay,
            'sanphams_noibat'=>$sanphams_noibat,
            'ds_phanLoai'=>$ds_phanLoai,
            'san_pham' => $san_pham
        ]);
    }

    public function actionProduct($path){
        $sanpham = QuanLySanPham::findOne(['code'=>$path]);
        $anh_san_pham = AnhSanPham::findAll(['san_pham_id'=>$sanpham->id]);
        $size_san_phams = SanPham::findOne(['id'=>$sanpham->id]);
        $sanphamlienquan = ChiTietSanPham::find()
            ->andFilterWhere(['thuong_hieu_id'=>$sanpham->thuong_hieu_id])
            ->andFilterWhere(['phan_loai_id'=>$sanpham->phan_loai_id])
        ->all();
        $ds_phanloai = PhanLoai::find()->all();
        return $this->render('chi-tiet-san-pham',[
            'san_pham'=>$sanpham,
            'anh_san_pham'=>$anh_san_pham,
            'sanphamlienquan'=>$sanphamlienquan,
            'ds_phanloai'=>$ds_phanloai,
            'size_san_pham'=>$size_san_phams
        ]);
    }

    public function actionAddToCart(){
        $cach_dat =  'Trang chủ';
        //20-11-2021 loại bỏ cách đặt hàng ở trang chủ do tham khảo một số website giày thì ko cần thiết
        if(isset($_POST['quantity_sanpham'])){
            $code = $_POST['san_pham'];
            $sl_dat_them = $_POST['quantity_sanpham'];
            $size = $_POST['size_sanpham'];
            $cach_dat='Trang chi tiết';
        }else{
            $sl_dat_them = 1;
            $size = 0;
            $code = $_POST['code'];
        }
//        VarDumper::dump($size,10,true);
//        exit();
        //$code : code sản phẩm, code sản phẩm - id

        $array_id_sp = explode('-',$code);//['x','y','z',....1] : phần từ cuối cùng của id_sp sẽ là id, cần bỏ đi
        $array_id_sp = array_reverse($array_id_sp);
        $id_sp = $array_id_sp[0];
        $san_pham_da_dat = SanPham::findOne($id_sp);

        //Liêt kê ds sản phẩm đã đặt
        $san_pham = array();
        if(isset(Yii::$app->session['san_pham'])){
            $san_pham = Yii::$app->session['san_pham'];//[1 => sp1, 2=>sp2, 3=>sp3]
        }
        $san_pham[$id_sp] = SanPham::findOne($id_sp);//[1 => sp1, 2=>sp2, 3=>sp3]
        Yii::$app->session['san_pham']=$san_pham;

        //
        $so_luong_sp = array();
        $size_sanpham = array();
        if(isset(Yii::$app->session['so_luong'])){
            $so_luong_sp =  Yii::$app->session['so_luong'];
        }
        if(isset($so_luong_sp[$id_sp])){
           $so_luong_sp[$id_sp]+=$sl_dat_them;
        }
        //$so_luong_sp = [1 => sp1, 2=>sp2, 3=>sp3]
        else{
            $so_luong_sp[$id_sp] = $sl_dat_them;
        }

        if(isset(Yii::$app->session['size_sanpham'])){
            $size_sanpham = Yii::$app->session['size_sanpham'];
        }
        if(isset($size_sanpham[$id_sp])){
            $size_sanpham[$id_sp] = $size;
        }else{
            $size_sanpham[$id_sp] = $size;
        }

        Yii::$app->session['size_sanpham'] = $size_sanpham;
        Yii::$app->session['so_luong']=$so_luong_sp;

        $tongTienDaDat = 0;
        if($cach_dat=='Trang chủ'){
            $tongtien = $san_pham_da_dat->gia_ban;
        }else{
            $tongtien = $san_pham_da_dat->gia_ban*$sl_dat_them;
        }
        if(isset(Yii::$app->session['da_dat_hang']))
            $tongTienDaDat = Yii::$app->session['da_dat_hang'];
        $tongTienDaDat += $tongtien;
        Yii::$app->session['da_dat_hang'] = $tongTienDaDat;

        $so_luong_da_dat = 0;
        if(isset(Yii::$app->session['so_luong_da_dat']))
            $so_luong_da_dat = Yii::$app->session['so_luong_da_dat'];
        if($cach_dat=='Trang chủ'){
            $so_luong_da_dat++;
        }else{
            $so_luong_da_dat+=$sl_dat_them;
        }

        Yii::$app->session['so_luong_da_dat'] = $so_luong_da_dat;
//        VarDumper::dump($so_luong_sp,10,true);
//        VarDumper::dump($size_sanpham,10,true);
//        var_dump($size_sanpham);
//        exit();

//        VarDumper::dump($so_luong_sp);
        if(is_null($san_pham))
            throw new HttpException(500,'Không tìm thấy sản phẩm');
        else
            echo Json::encode([
                'mini_cart'=>$this->renderAjax('_mini_cart',[
                   'san_pham'=>Yii::$app->session['san_pham'],
                    'so_luong'=>Yii::$app->session['so_luong'],
                    'tong_tien'=>Yii::$app->session['da_dat_hang'],
                    'so_luong_da_dat'=>Yii::$app->session['so_luong_da_dat'],
                    'size_sanpham'=>Yii::$app->session['size_sanpham']
                ]),
                'message'=>"Đã đặt hàng thành công"
            ]);
    }

    public function actionGioHang(){
        if(isset(Yii::$app->session['san_pham'])){
            $san_pham = Yii::$app->session['san_pham'];
            $so_luong=Yii::$app->session['so_luong'];
            $tong_tien=Yii::$app->session['da_dat_hang'];
            $so_luong_da_dat=Yii::$app->session['so_luong_da_dat'];
            $size_sanpham = Yii::$app->session['size_sanpham'];
        }else{
            $san_pham=[];
            $so_luong=[];
            $tong_tien=0;
            $so_luong_da_dat=0;
            $size_sanpham = 0;
        }

        $size_sanphams = SanPham::findOne(['id'=>$san_pham]);
        return $this->render('gio-hang',[
            'san_pham'=>$san_pham,
            'so_luong'=>$so_luong,
            'tong_tien'=>$tong_tien,
            'so_luong_da_dat'=>$so_luong_da_dat,
            'size_sanpham'=>$size_sanpham,
            'size_sanphams'=>$size_sanphams
        ]);
    }

    public function actionUpdateCart(){
        $san_pham = Yii::$app->session['san_pham'];
        $tong_tien=0;
        $so_luong=Yii::$app->session['so_luong'];
        $so_luong_da_dat=0;

        $size_sanpham = Yii::$app->session['size_sanpham'];
//        VarDumper::dump($size_sanpham,10,true);
//        exit();

        foreach ($_POST['SoLuong'] as $idSP => $item){
            $so_luong[$idSP]=$item;
            $tong_tien += $item * $_POST['Giaban'][$idSP];
            $so_luong_da_dat += $item;
            $size_sanpham[$idSP] = $_POST['size_sanpham'][$idSP];
        }
        Yii::$app->session['so_luong_da_dat'] = $so_luong_da_dat;
        Yii::$app->session['so_luong']=$so_luong;
        Yii::$app->session['da_dat_hang']=$tong_tien;
        Yii::$app->session['size_sanpham']=$size_sanpham;

        echo Json::encode(array(
            'message'=>'<div class="label label-success">Đã cập nhật giỏ hàng</div>'
        ));
    }

    public function actionThanhToan(){
        $donHang = new DonHang();
        if(Yii::$app->user->isGuest){
            if(!isset($_GET['notlogin']))
                $this->redirect(Url::toRoute('site/login'));
            if(isset($_POST['DonHang'])){
                $donHang->load(Yii::$app->request->post());
                if($donHang->save()){


                    Yii::$app->session->setFlash('thongbao',"<div class='text-success'>Đã lưu thông tin đơn hàng thành công</div>");

                    $chi_tiet_don_hang = $this->renderPartial('_tbl_san_pham_da_dat_mailer',[
                        'san_pham' =>Yii::$app->session['san_pham'],
                        'so_luong'=>Yii::$app->session['so_luong'],
                        'tong_tien'=>Yii::$app->session['da_dat_hang'],
                        'so_luong_da_dat'=>Yii::$app->session['so_luong_da_dat'],
                        'size_sanpham'=>Yii::$app->session['size_sanpham']
                    ]);

                    //Gửi thông tin email tới khách hàng
                    //Đơn hàng #<Mã đơn hàng> của bạn
                    //Bảng chi tiết sản phẩm đã đặt
                    $yiiMailer =  new Mailer();
                    $tranSport = new \Swift_SmtpTransport('smtp.gmail.com','465','SSL');
                    $tranSport->setUsername('dodaiihoc2019@gmail.com');
                    $tranSport->setPassword('htdqcsoaqllzolwt');
                    $yiiMailer->htmlLayout=true;

                    $yiiMailer->setTransport($tranSport);
                    $yiiMailer->compose()->setCharset('utf8')
                        ->setFrom(['dodaiihoc2019@gmail.com'=>'XuanTienSJC'])
                        ->setTo($donHang->email)
                        ->setHtmlBody($chi_tiet_don_hang)
                        ->setSubject('Thông tin đơn hàng #'.$donHang->id.'của bạn')
                        ->send();

                    unset(Yii::$app->session['san_pham']);
                    unset(Yii::$app->session['so_luong']);
                    unset(Yii::$app->session['da_dat_hang']);
                    unset(Yii::$app->session['so_luong_da_dat']);
                    unset(Yii::$app->session['size_sanpham']);

                    return $this->redirect(Url::toRoute(['site/index']));
                }else{
                    VarDumper::dump(Html::errorSummary($donHang));
                }
            }
        }
        else{
            if(isset($_POST['DonHang'])){
                $donHang->load(Yii::$app->request->post());
                if($donHang->save()){


                    Yii::$app->session->setFlash('thongbao',"<div class='text-success'>Đã lưu thông tin đơn hàng thành công</div>");

                    $chi_tiet_don_hang = $this->renderPartial('_tbl_san_pham_da_dat_mailer',[
                        'san_pham' =>Yii::$app->session['san_pham'],
                        'so_luong'=>Yii::$app->session['so_luong'],
                        'tong_tien'=>Yii::$app->session['da_dat_hang'],
                        'so_luong_da_dat'=>Yii::$app->session['so_luong_da_dat'],
                        'size_sanpham'=>Yii::$app->session['size_sanpham']
                    ]);

                    //Gửi thông tin email tới khách hàng
                    //Đơn hàng #<Mã đơn hàng> của bạn
                    //Bảng chi tiết sản phẩm đã đặt
                    $yiiMailer =  new Mailer();
                    $tranSport = new \Swift_SmtpTransport('smtp.gmail.com','465','SSL');
                    $tranSport->setUsername('dodaiihoc2019@gmail.com');
                    $tranSport->setPassword('htdqcsoaqllzolwt');
                    $yiiMailer->htmlLayout=true;

                    $yiiMailer->setTransport($tranSport);
                    $yiiMailer->compose()->setCharset('utf8')
                        ->setFrom(['dodaiihoc2019@gmail.com'=>'XuanTienSJC'])
                        ->setTo($donHang->email)
                        ->setHtmlBody($chi_tiet_don_hang)
                        ->setSubject('Thông tin đơn hàng #'.$donHang->id.'của bạn')
                        ->send();

                    unset(Yii::$app->session['san_pham']);
                    unset(Yii::$app->session['so_luong']);
                    unset(Yii::$app->session['da_dat_hang']);
                    unset(Yii::$app->session['so_luong_da_dat']);
                    unset(Yii::$app->session['size_sanpham']);

                    return $this->redirect(Url::toRoute(['site/index']));
                }else{
                    VarDumper::dump(Html::errorSummary($donHang));
                }
            }
            else{
                $donHang->ho_ten = Yii::$app->user->identity->ho_ten;//sau khi đăng nhập thì thông tin sẽ được lưu vào biến identity
                $donHang->dia_chi_giao_hang = Yii::$app->user->identity->dia_chi;
                $donHang->dien_thoai = Yii::$app->user->identity->dien_thoai;
                $donHang->email = Yii::$app->user->identity->email;
            }
//        if(isset(Yii::$app->session['san_pham'])){
//            $san_pham = Yii::$app->session['san_pham'];
//            $so_luong=Yii::$app->session['so_luong'];
//            $tong_tien=Yii::$app->session['da_dat_hang'];
//            $so_luong_da_dat=Yii::$app->session['so_luong_da_dat'];
//        }else{
//            $san_pham=[];
//            $so_luong=[];
//            $tong_tien=0;
//            $so_luong_da_dat=0;
//
        }

        return $this->render('thanh-toan',[
            'san_pham'=>Yii::$app->session['san_pham'],
            'so_luong'=>Yii::$app->session['so_luong'],
            'tong_tien'=>Yii::$app->session['da_dat_hang'],
            'so_luong_da_dat'=>Yii::$app->session['so_luong_da_dat'],
            'size_sanpham'=>Yii::$app->session['size_sanpham'],
            'donHang'=>$donHang
        ]);
    }

    public function actionXoaSanPham($idsanpham){
        $san_pham = Yii::$app->session['san_pham'];
        $so_luong=Yii::$app->session['so_luong'];
        $tong_tien=Yii::$app->session['da_dat_hang'];
        $so_luong_da_dat=Yii::$app->session['so_luong_da_dat'];
        $size_sanpham = Yii::$app->session['size_sanpham'];

        //$so_luong[idsanpham] = số lượng;
        $so_luong_xoa = $so_luong[$idsanpham];
        $san_pham_xoa =  $san_pham[$idsanpham];

        $so_luong_da_dat = $so_luong_da_dat - $so_luong_xoa;
        $tong_tien = $tong_tien - $san_pham_xoa->gia_ban * $so_luong_xoa;

        unset($san_pham[$idsanpham]);
        unset($so_luong[$idsanpham]);
        unset($size_sanpham[$idsanpham]);

        Yii::$app->session['so_luong_da_dat'] = $so_luong_da_dat;
        Yii::$app->session['so_luong']=$so_luong;
        Yii::$app->session['da_dat_hang']=$tong_tien;
        Yii::$app->session['san_pham']=$san_pham;
        Yii::$app->session['size_sanpham']=$size_sanpham;

        Yii::$app->session->setFlash('thongbao','<div class="text-success">Đã xóa sản phẩm khỏi giỏ hàng</div>');
        return $this->redirect(Url::toRoute(['site/gio-hang']));

    }

    public function actionUser(){
        $user = User::findOne(Yii::$app->user->id);
        $old_pass = $user->password_hash;
        if(isset($_POST['User'])){
            if($_POST['User']['password_hash'] != $old_pass){
                $new_pass = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
            }else
                $new_pass = $old_pass;

        User::updateAll([
            'ho_ten'=>$_POST['User']['ho_ten'],
            'dia_chi'=>$_POST['User']['dia_chi'],
            'dien_thoai'=>$_POST['User']['dien_thoai'],
            'email'=>$_POST['User']['email'],
            'updated_at'=>new Expression('NOW()'),
            'password_hash'=>$new_pass
        ],['id'=>$user->id]);

        }

        return $this->render('user',[
            'user'=>$user
        ]);
    }

    public function actionDonHang(){

    }



    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
}
