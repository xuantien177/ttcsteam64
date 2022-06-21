<?php

/* @var $this yii\web\View
 * @var \common\models\ThuongHieu[] $thuongHieu
 */

use yii\helpers\Html;

$this->title = 'Về chúng tôi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">


    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!--header end-->

        <!--responsive-mobile-menu end-->

        <section>
            <div class="block less-padding3">
                <div class="container">
                    <div class="collection-sec">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="abt-img wow fadeInDown" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <img src="frontend/giao_dien/storenix/assets/images/Shopee.png" alt="">
                                </div>
                                <!--abt-img end-->
                            </div>
                            <div class="col-lg-6">
                                <div class="about-us-text wow fadeInRight" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <h4>Shop thương mại lớn nhất Hà Nội</h4>
                                    <h2>Đa dạng phong phú, nhiều mẫu mũ chủng loại</h2>
                                    <p>Tọa lạc tại đường Chiến Thắng, Văn Quán, Hà Đông, Hà Nội, Shop của chúng tôi
                                        chuyên cung cấp tất tần tật các loại sản phẩm, trong nhiều phân khúc như :
                                        Thể thao, chạy bộ, văn phòng, thời trang, giới trẻ,... Đảm bảo với quý khách hàng
                                        những sản phẩm chất lượng cao nhất, giá thành rẻ nhất ở khu vực Hà Nội .
                                    </p>
                                    <a href="#" title="">Click để xem thêm</a>
                                </div>
                                <!--about-us-text end-->
                            </div>
                        </div>
                    </div>
                    <!--collection-sec end-->
                </div>
            </div>
        </section>
        <!--    begin features    -->
        <section>
            <div class="block bd-btm">
                <div class="container">
                    <div class="our-features">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="feature wow fadeInLeft animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <div class="feature-icon">
                                        <img src="frontend/giao_dien/storenix/assets/images/feature-icon1.png" alt="">
                                    </div>
                                    <div class="feature-details">
                                        <h3>Miễn phí giao hàng</h3>
                                        <span>Áp dụng nội thành Hà Nội</span>
                                    </div>
                                </div>
                                <!--feature end-->
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="feature wow fadeInUp animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <div class="feature-icon">
                                        <img src="frontend/giao_dien/storenix/assets/images/feature-icon2.png" alt="">
                                    </div>
                                    <div class="feature-details">
                                        <h3>Chính sách hoàn trả hàng</h3>
                                        <span>Đổi trả hàng trong 24h</span>
                                    </div>
                                </div>
                                <!--feature end-->
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="feature wow fadeInRight animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <div class="feature-icon">
                                        <img src="frontend/giao_dien/storenix/assets/images/feature-icon3.png" alt="">
                                    </div>
                                    <div class="feature-details">
                                        <h3>Thanh toán đa dạng</h3>
                                        <span>Cho phép thanh toán sau khi nhận hàng</span>
                                    </div>
                                </div>
                                <!--feature end-->
                            </div>
                        </div>
                    </div><!-- our-features end-->
                </div>
            </div>
        </section>
        <!--     end features   -->

        <!--     begin thương hiệu   -->
        <section style="height: fit-content" id="thuong-hieu">
            <div class="block">
                <div class="container">
                    <div class="partners-section">
                        <ul class="partner-carousel">
                            <?php foreach ($thuongHieu as $item): ?>
                                <li><a href="<?=\yii\helpers\Url::toRoute(['site/thuong-hieu','path'=>$item->code])?>" title=""><img src="images/<?=$item->logo?>" alt=""></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- end thương hiệu-->
                </div>
            </div>
        </section>
    </div>
