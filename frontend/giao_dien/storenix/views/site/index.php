<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\Slider[] $sliders
 * @var \common\models\SanPham[] $hangMoiVes
 * @var \common\models\ChiTietSanPham[] $hangTrends
 * @var \common\models\PhanLoai[] $phanLoai
 * @var \common\models\PhanLoai $phanLoai_thoitrang
 * @var \common\models\PhanLoai $phanLoai_thethao
 * @var \common\models\PhanLoai $phanLoai_vanphong
 * @var \common\models\ThuongHieu[] $thuongHieu
 * @
 */

use yii\helpers\VarDumper;

$this->title = 'Shop TTCS';

?>
<section class="main-slider indxone" id="home">
    <div class="container">
        <div id="rev_slider_476_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="christmas-snow-scene" data-source="gallery" style="background-color:transparent;padding:0px;">
            <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
            <div id="rev_slider_476_1" class="rev_slider" style="display:none;" data-version="5.3.0.2">
                <ul>
                    <?php foreach ($sliders as $slider): ?>
                    <?php foreach ($slider->anhSliders as $hinh_anh): ?>
                            <li data-index="rs-1648" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1000" data-thumb="images/<?=$hinh_anh->file?>" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="images/<?=$hinh_anh->file?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->
                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption lyr1 tp-resizeme" id="slide-1648-layer-1" data-x="left" data-hoffset="80" data-y="center" data-voffset="-95" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":700,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]' data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[15,15,15,15]" data-paddingleft="[0,0,0,0]" data-start="200" data-splitin="chars" data-splitout="none" data-elementdelay="0.04" style="">Bộ sưu tập
                                </div>
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption lyr2 tp-resizeme" id="slide-1648-layer-2" data-x="left" data-hoffset="420" data-y="center" data-voffset="-95" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1700,"to":"o:1;","delay":1000,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]' data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[15,15,15,15]" data-paddingleft="[0,0,0,0]" data-start="2000" data-splitin="chars" data-splitout="none" data-elementdelay="0.06" style="">2022
                                </div>
                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption lyr3 tp-resizeme" id="slide-1648-layer-3" data-x="left" data-hoffset="80" data-y="center" data-voffset="-20" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-start="1400" data-splitin="" data-splitout="none" data-elementdelay="0.02" style="">Hàng mới về
                                </div>
                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption lyr4 tp-resizeme" id="slide-1648-layer-4" data-x="left" data-hoffset="284" data-y="center" data-voffset="33" data-width="['270']" data-height="['4']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-start="1400" data-splitin="" data-splitout="none" data-elementdelay="0.02" style="">Hot !!!
                                </div>
                                <!-- Layer 4 -->
                                <a href="#" title="" class="tp-caption lyr5 tp-resizeme" id="slide-1-layer-5" data-x="left" data-hoffset="400" data-y="center" data-voffset="66" data-width="['auto','auto','auto','auto']" data-height="['auto','auto','auto','auto']" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="2000" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="">Khám phá ngay <i class="fa fa-long-arrow-right"></i>
                                </a>
                                <!-- LAYER NR. 5 -->
                                <div class="tp-caption lyr10 tp-resizeme" id="slide-1648-layer-6" data-x="right" data-hoffset="300" data-y="center" data-voffset="0" data-width="['279']" data-height="['818']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-start="1400" data-splitin="" data-splitout="none" data-elementdelay="0.02" style="">
                                </div>
                                <!-- LAYER NR. 6 -->
                                <div class="tp-caption lyr10 tp-resizeme" id="slide-1648-layer-7" data-x="right" data-hoffset="0" data-y="center" data-voffset="0" data-width="['279']" data-height="['818']" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-start="1400" data-splitin="" data-splitout="none" data-elementdelay="0.02" style="">
                                </div>
                            </li>

                        <?php endforeach;?>
                        <!-- SLIDE  -->
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!--Revolution Slider end-->
    </div>
</section>


<!--main-slider end-->

<!--Các feature-->
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
<!--feature end-->

<!--Hàng hot,trend-->
<section>
    <div class="block">
        <div class="container">
            <div class="featured-categories">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="featured-img wow fadeInLeft animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <img src="frontend/giao_dien/storenix/assets/images/resources/feature-img1.jpg" alt="">
                            <h2>
                                <?=\yii\helpers\Html::a('Hàng HOT <i class="fa fa-long-arrow-right"></i>',
                                    \yii\helpers\Url::toRoute(['site/san-pham-hot']),['title'=>'Hàng hot']) ?>

                            </h2>
                        </div>
                        <!--featured-img end-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="featured-img style2 wow fadeInRight animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <img src="frontend/giao_dien/storenix/assets/images/resources/feature-img2.jpg" alt="">
                            <h2>
                                <?=\yii\helpers\Html::a('Xu hướng mới <i class="fa fa-long-arrow-right"></i>',
                                    \yii\helpers\Url::toRoute(['site/xu-huong-moi']),['title'=>'Xu hướng mới']) ?>
                            </h2>
                        </div>
                        <!--featured-img end-->
                    </div>
                </div>
            </div>
            <!--featured-categories end-->
        </div>
    </div>
</section>
<!--Hàng hot,trend end-->

<!--Hàng mới về-->
<section>
    <div class="block">
        <div class="container">
            <div class="title">
                <h2>Hàng mới về</h2>
            </div>
            <!--title end-->
            <div class="portfolio-carousel">
                    <?php foreach ($hangMoiVes as $item): ?>
                        <div class="col-lg-4">
                            <div class="portfolio-item">
                                <div class="item-img">
                                    <?=\yii\bootstrap\Html::img('images/'.$item->anh_dai_dien,['alt'=>$item->name]) ?>
                                    <div class="add-to-cart">
                                        <?=\yii\bootstrap\Html::a('<i class="fa fa-cart-plus"></i> Xem chi tiết'
                                            ,\yii\helpers\Url::toRoute(['site/product','path'=>$item->code]),['data-value'=>$item->code.'-'.$item->id, 'title'=>$item->name]) ?>
                                    </div>
                                </div>
                                <h3>
                                    <?=\yii\bootstrap\Html::a($item->name, \yii\helpers\Url::toRoute(['site/product','path'=>$item->code]),
                                        ['title'=>$item->name]) ?>
                                </h3>
                                <span>
                                <?=number_format($item->gia_ban,0,'','.') ;?> đ
                            </span>
                            </div>
                            <!--portfolio-item end-->
                        </div>
                    <?php endforeach; ?>
            </div>
            <!--project-carousel end-->
        </div>
    </div>
</section>
<!--Hàng mới về end-->

<!--Trending item-->
<section>
    <div class="block">
        <div class="container">
            <div class="title">
                <h2>Sản Phẩm Trending</h2>
            </div>
            <!--title end-->
            <section class="options">
                <div class="option-isotop">
                    <ul id="filter" class="option-set filters-nav" data-option-key="filter">
                        <li><a class="selected" data-option-value="*">Tất cả sản phẩm</a></li>
                        <?php foreach ($phanLoai as $item): ?>
                        <li>
                            <?=\yii\bootstrap\Html::a($item->name,'#',['data-option-value'=>'.'.$item->code])?>
                        </li>
<!--                        <li><a data-option-value=".clothing">clothing</a></li>-->
<!--                        <li><a data-option-value=".footwear">foot wear</a></li>-->
<!--                        <li><a data-option-value=".accessories">accessories</a></li>-->
                        <?php endforeach;?>
                    </ul>
                </div>
            </section>
            <!--options list end-->
            <div class="masonary">
                <?php foreach ($hangTrends as $hangTrend): ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12
                    <?php $dsphanloai = explode(",",$hangTrend->code_phan_loai);
                          foreach ($dsphanloai as $item)
                              echo $item.' ';
                    ?>">
                        <div class="portfolio-item wow fadeInLeft animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <div class="item-img">
                                <?=\yii\bootstrap\Html::img('images/'.$hangTrend->anh_dai_dien,['alt'=>$hangTrend->name]) ?>
                                <div class="add-to-cart">
                                    <?=\yii\bootstrap\Html::a('<i class="fa fa-cart-plus"></i> Xem chi tiết'
                                        ,\yii\helpers\Url::toRoute(['site/product','path'=>$hangTrend->code]),['data-value'=>$hangTrend->code.'-'.$hangTrend->id, 'title'=>$hangTrend->name]) ?>
                                    <a href="#" title="">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="rating">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <h3>
                                <?=\yii\bootstrap\Html::a($hangTrend->name,\yii\helpers\Url::toRoute(['site/product','path'=>$hangTrend->code])) ?>
                            </h3>
                            <span><?=number_format($hangTrend->gia_ban,0,'','.') ?></span>
                        </div>

                        <!--portfolio-item end-->
                    </div>
                <?php endforeach;?>
            </div>
            <!--project-carousel end-->
        </div>
    </div>
</section>
<!--Trending item end -->

<!--Offer danh mục giày thể thảo, sneaker,....-->
<section>
    <div class="block">
        <div class="container">
            <div class="our-offers">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="offer-details wow fadeInLeft animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <img src="frontend/giao_dien/storenix/assets/images/resources/fashion_shoe.jpg" alt="">
                            <div class="offer-info">
                                <h2><?=$phanLoai_thoitrang->name?></h2>
                                <h4>Luxury</h4>
                                <a href="<?=\yii\helpers\Url::toRoute(['site/san-pham','path'=>$phanLoai_thoitrang->code])?>" title=""><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div><!-- offer-details end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="offer-details margin-bottom-30 wow fadeInRight animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <img height="250px" src="frontend/giao_dien/storenix/assets/images/resources/sport_shoe.jpg" alt="">
                                    <div class="offer-info style2">
                                        <h2><?=$phanLoai_thethao->name?></h2>
                                        <h4>Flat Sale! 20% Off</h4>
                                        <a href="<?=\yii\helpers\Url::toRoute(['site/san-pham','path'=>$phanLoai_thethao->code])?>" title=""><i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- offer-details end-->
                            </div>
                            <div class="col-lg-12">
                                <div class="offer-details wow fadeInRight animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <img height="263px" src="frontend/giao_dien/storenix/assets/images/resources/vanphong_shoe.jpg" alt="">
                                    <div class="offer-info style3">
                                        <h2><?=$phanLoai_vanphong->name?></h2>
                                        <h4>Công sở</h4>
                                        <a href="<?=\yii\helpers\Url::toRoute(['site/san-phan','path'=>$phanLoai_vanphong->code])?>" title=""><i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- offer-details end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--our-offers end-->
        </div>
    </div>
</section>
<!--Offer danh mục giày thể thảo, sneaker,.... END-->

<!-- Thương hiệu -->
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
            <!--partners-section end-->
        </div>
    </div>
</section>
<!--Thương hiệu end-->

<!-- Đăng ký trang-->
<section>
    <div class="block no-padding">
        <div class="fixed-bg bg1"></div>
        <div class="container">
            <div class="subscribe-section style2 style3">
                <h2>Subscribe to TTCS-64</h2>
                <form>
                    <input type="text" name="email" placeholder="Nhập địa chỉ email">
                    <button>subscribe <i class="fa fa-long-arrow-right"></i></button>
                </form>
            </div>
            <!--subscribe-section end-->
        </div>
    </div>
</section>
<!-- Dăng ký trang END-->