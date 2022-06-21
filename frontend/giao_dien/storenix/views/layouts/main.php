<?php
/**
 * @var $this \yii\web\View
 */
use frontend\assets\StoreNixAsset;
use yii\helpers\Html;

?>

<?php
StoreNixAsset::register($this);

?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<?php $this->beginPage() ?>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
<!--$this->head() để load các file css js-->

    </head>

<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    <header>
        <div class="container">
            <div class="logo">
                <?=Html::a('<img style="top: 0" width="120px" src="frontend/giao_dien/storenix/assets/images/Shopee.png">', \yii\helpers\Url::toRoute('site/index'),['title'=>'My-Web Shoe']) ?>
            </div>
            <nav>
                <ul>
                    <li>
                        <?=Html::a('Trang chủ',\yii\helpers\Url::toRoute('site/index'),['title'=>'Trang chủ']) ?>
                    </li>
                    <li><?=Html::a('Sản phẩm','#',['title'=>'Sản phẩm']) ?>
                        <ul>
                            <?php $phanLoaiSanPham = \common\models\PhanLoai::find()->all(); ?>
                            <?php /** @var \common\models\PhanLoai $item */ ?>
<!--                            Tên: Giày thể thao=> Code: giay-the-thao-->
<!--                            http://localhost/my-web/index.php?r=site/san-pham$path=giay-the-thao.html-->
<!--                            http://localhost/my-web/san-pham-giay-the-thao.html-->
                                <?php foreach ($phanLoaiSanPham as $item): ?>
                                <li><?=Html::a($item->name,\yii\helpers\Url::toRoute(['site/san-pham','path'=> $item->code])) ?></li>
                                <?php endforeach; ?>
                        </ul>
                    </li>
                    <li>
                        <?=Html::a('Blog',\yii\helpers\Url::toRoute(['site/blog']),['title'=>'Blog']) ?>
                    </li>
                    <li>
                        <?=Html::a('Về chúng tôi',\yii\helpers\Url::toRoute(['site/about']),['title'=>'Về chúng tôi']) ?>
                    </li>
                    <li>
<!--                        http://localhost/my-wen/index.php?r=site/lien-he-->
                        <?=Html::a('Liên hệ',\yii\helpers\Url::toRoute(['site/contact']),['title'=>'Liên hệ']) ?>
                    </li>
                    <?php if(!Yii::$app->user->isGuest): ?>
                        <li><?=\yii\bootstrap\Html::a(Yii::$app->user->identity->username .'  <i class="fa fa-user-circle-o"></i>','#',['title'=>'Tải khoản','class'=>'text-danger'])?>
                        <ul>
                            <li><?=\yii\bootstrap\Html::a('Quản lý tài khoản',\yii\helpers\Url::toRoute(['site/user'])) ?></li>
                            <li><?=\yii\bootstrap\Html::a('Quản lý đơn hàng',\yii\helpers\Url::toRoute(['don-hang/index'])) ?></li>
                            <?php if(Yii::$app->user->identity->vai_tro=='Quản trị viên'): ?>
                                <li><?=\yii\bootstrap\Html::a('Đi tới trang admin','http://localhost:8080/ttcs/quan-ly/') ?></li>
                            <?php endif;?>
                            <li>
                                <?=\yii\bootstrap\Html::a('Đăng xuất',\yii\helpers\Url::toRoute(['site/logout'])) ?>
                            </li>
                        </ul>
                        </li>
                    <?php else:?>
                        <?=\yii\bootstrap\Html::a('ĐĂNG NHẬP',\yii\helpers\Url::toRoute(['site/login']),['title'=>'Login','class'=>'text-danger']) ?>
                    <?php endif;?>
                </ul>
            </nav>
            <div class="mobile-men-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--mobile-men-btn end-->
            <div class="card-sec">
                <?php if(isset(Yii::$app->session['san_pham'])): ?>
                    <?=$this->render('../site/_mini_cart',[
                        'san_pham'=>Yii::$app->session['san_pham'],
                        'so_luong'=>Yii::$app->session['so_luong'],
                        'tong_tien'=>Yii::$app->session['da_dat_hang'],
                        'so_luong_da_dat'=>Yii::$app->session['so_luong_da_dat'],
                        'size_sanpham'=>Yii::$app->session['size_sanpham']
                    ]); ?>
                <?php else: ?>
                <ul>

                    <li>
                        <a class="cart-open" href="#" title="">
                            <i class="fa fa-cart-plus"></i>
                            <span>(0)</span>
                        </a>
                        <div class="cart-dropdown">
                            <h3>Bạn chưa đặt sản phẩm nào</h3>
                        </div>
                        <!--cart-dropdown end-->
                    </li>

                    <li><a href="#" title="" class="open-search"><i class="ion-android-search"></i></a></li>
                </ul>
                <?php endif;?>
            </div>
        </div>
    </header>

    <div class="responsive-mobile-menu">
        <a href="#" title="" class="close-menu-btn"><i class="fa fa-close"></i></a>
        <ul>
            <li>
                <?=Html::a('Trang chủ',\yii\helpers\Url::toRoute('site/index'),['title'=>'Trang chủ']) ?>
            </li>
            <li><?=Html::a('Sản phẩm','#',['title'=>'Sản phẩm']) ?>
                <ul>
                    <?php $phanLoaiSanPham = \common\models\PhanLoai::find()->all(); ?>
                    <?php /** @var \common\models\PhanLoai $item */ ?>
                    <!--                            Tên: Giày thể thao=> Code: giay-the-thao-->
                    <!--                            http://localhost/my-web/index.php?r=site/san-pham$path=giay-the-thao.html-->
                    <!--                            http://localhost/my-web/san-pham-giay-the-thao.html-->
                    <?php foreach ($phanLoaiSanPham as $item): ?>
                        <li><?=Html::a($item->name,\yii\helpers\Url::toRoute(['site/san-pham','path'=> $item->code])) ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li>
                <?=Html::a('Blog','#',['title'=>'Blog']) ?>
            </li>
            <li>
                <?=Html::a('Hình thức thanh toán','#',['title'=>'Hình thức thanh toán']) ?>
            </li>
            <li>
                <!--                        http://localhost/my-wen/index.php?r=site/lien-he-->
                <?=Html::a('Liên hệ',\yii\helpers\Url::toRoute(['site/lien-he']),['title'=>'Liên hệ']) ?>
            </li>
            <?php if(!Yii::$app->user->isGuest): ?>
                <li><?=\yii\bootstrap\Html::a(Yii::$app->user->identity->username .'  <i class="fa fa-user-circle-o"></i>','#',['title'=>'Tải khoản','class'=>'text-danger'])?>
                    <ul>
                        <li><?=\yii\bootstrap\Html::a('Quản lý tài khoản',\yii\helpers\Url::toRoute(['site/user'])) ?></li>
                        <li><?=\yii\bootstrap\Html::a('Quản lý đơn hàng',\yii\helpers\Url::toRoute(['don-hang/index'])) ?></li>
                        <?php if(Yii::$app->user->identity->vai_tro=='Quản trị viên'): ?>
                            <li><?=\yii\bootstrap\Html::a('Đi tới trang admin','http://localhost/my-web/quan-ly') ?></li>
                        <?php endif;?>
                        <li>
                            <?=\yii\bootstrap\Html::a('Đăng xuất',\yii\helpers\Url::toRoute(['site/logout'])) ?>
                        </li>
                    </ul>
                </li>
            <?php else:?>
                <?=\yii\bootstrap\Html::a('ĐĂNG NHẬP',\yii\helpers\Url::toRoute(['site/login']),['title'=>'Login','class'=>'text-danger']) ?>
            <?php endif;?>
        </ul>
    </div>
    <!--responsive-mobile-menu end-->

    <!--Biến content được yii2 hỗ trợ để hiển thị các view    -->
    <div class="thongbao"></div>
    <?=Yii::$app->session->getFlash('thongbao');?>
    <?= $content ?>

    <footer>
        <div class="footer-style wow fadeInUp animated" data-wow-delay="500ms" data-wow-duration="1500ms">
            <div class="container">
                <div class="footer-data">
                    <div class="title">
                        <h2>TTCS-64</h2>
                    </div>
                    <!--title end-->
                    <ul class="contact-info">
                        <li><span>Chiến Thắng, Văn Quán, Hà Đông</span></li>
                        <li><span>(+84) 566 362 058</span></li>
                        <li><span>xuantien17072001@gmail.com</span></li>
                    </ul>
                    <ul class="footer-links">
                        <li><a href="<?=\yii\helpers\Url::toRoute(['site/index']) ?>" title="">Trang chủ</a></li>
                        <li><a href="<?=\yii\helpers\Url::toRoute(['site/san-pham']) ?>" title="">Sản phẩm</a></li>
                        <li><a href="<?=\yii\helpers\Url::toRoute(['site/san-pham','type'=>'xu-huong']) ?>" title="">Xu hướng</a></li>
                        <li><a href="#" title="">Chính sách</a></li>
                        <li><a href="<?=\yii\helpers\Url::toRoute(['site/lien-he']) ?>" title="">Liên hệ</a></li>
                    </ul>
                    <ul class="social-links">
                        <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" title=""><i class="fa fa-vimeo"></i></a></li>
                        <li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" title=""><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" title=""><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                    <p class="copyright-text">© Copyrights 2022 by Team 64</p>
                </div>
                <!--footer-data end-->
            </div>
        </div>
        <!--footer-style end-->
    </footer>
    <a href="#" title="" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
    <div class="search-page">
        <div class="container">
            <div class="search-form-page">
                <h2>Search Products</h2>
                <form>
                    <input type="text" name="search" placeholder="Enter Your Keyword Here...">
                    <button type="submit"><i class="ion-android-search"></i></button>
                </form>
                <div class="close-search">
                    <a href="#" title="" class="close-search"> <i class="ion-android-close"></i> Close </a>
                </div>
                <!--close-search end-->
            </div>
            <!--search-form-page end-->
        </div>
    </div>
</div>


<?php $this->endBody() ?>
</body>
<?php $this->endPage();

