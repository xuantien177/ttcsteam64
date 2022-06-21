<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\AnhSanPham[] $anh_san_pham
 * @var \common\models\QuanLySanPham $san_pham
 * @var \common\models\ChiTietSanPham[] $sanphamlienquan
 * @var \common\models\SanPham $size_san_pham
 */
$this->title = $san_pham->name
?>

<!--Hình ảnh sản phâm, mổ tả ngắn gọn-->
<section>
            <div class="product-main-section">
                <div class="container">
                    <div class="page-links full">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::toRoute('site/index') ?>" title="Trang chủ">Trang chủ</a></li>
                            <li><a href="<?=\yii\helpers\Url::toRoute(['site/thuong-hieu','path'=>$san_pham->code_thuong_hieu])?>" title="<?=$san_pham->ten_thuong_hieu?>"><?=$san_pham->ten_thuong_hieu?></a></li>
                            <li><a href="<?=\yii\helpers\Url::toRoute(['site/san-pham','path'=>$san_pham->code_phan_loai])?>" title="<?=$san_pham->ten_phan_loai?>"><?=$san_pham->ten_phan_loai?></a></li>
                            <li><span><?=$san_pham->name?></span></li>
                        </ul>
                    </div>
                    <!--page-links end-->
                    <div class="full-item-details">
                        <div class="row">
                            <div class="col-lg-5 wow fadeInLeft animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                <div class="items-carousel">
                                    <?php foreach ($anh_san_pham as $item): ?>
                                        <div class="item-main-img">
                                            <img src="images/<?=$item->file?>" alt="">
                                        </div>
                                        <!--item-main-img end-->
                                    <?php endforeach; ?>
                                </div>
<!--                                items-carousel end-->
<!--                                <div class="items-thumb">-->
<!--                                   foreach ($anh_san_pham as $item)-->
<!--                                    <div class="thumb-img">-->
<!--                                        <img src="images/$item->file?>" alt="">-->
<!--                                    </div>-->
<!--                                   /endforeach;?>-->
<!--                                </div>-->
<!--                                items-thumb end-->
                            </div>
                            <div class="col-lg-7">
                                <div class="item_description wow fadeInRight animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <h2><?=$san_pham->name?></h2>
                                    <?php $form = \yii\bootstrap\ActiveForm::begin([
                                            'options'=>[
                                                    'id'=>'form-add-to-cart'
                                            ]
                                    ]) ?>
                                    <?=\yii\helpers\Html::hiddenInput('san_pham',$san_pham->code.'-'.$san_pham->id) ?>
                                    <div class="rating-info">
                                        <ul class="rating">
                                            <li><a href="#" tabindex="0"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#" tabindex="0"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#" tabindex="0"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#" tabindex="0"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#" tabindex="0"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                        <span>(4 Customer Reviews)</span>
                                    </div>
<!--                                    rating-info end-->
                                    <strong><?=number_format($san_pham->gia_ban,0,'','.') ?> đ<del><?=number_format($san_pham->gia_canh_tranh,0,'','.')?> đ</del></strong>
                                    <span style="margin-left: 100px;"><i class="fa fa-check-square"></i> Còn hàng</span>
                                    <p><?=$san_pham->mo_ta_ngan_gon ?></p>
                                    <ul class="item-specs">
                                        <li><span>Flowy fabric</span></li>
                                        <li><span>Floral print</span></li>
                                        <li><span>Back zip closure</span></li>
                                        <li><span>Side length 24.8 in</span></li>
                                    </ul>
                                    <div class="cart-ok">
                                        <ul>
                                            <li>
                                                <span>Số lượng</span>
                                            </li>
<!--                                            <li class="slct">-->
<!--                                                <select>-->
<!--                                                    <option>xxl</option>-->
<!--                                                    <option>xs</option>-->
<!--                                                    <option>md</option>-->
<!--                                                </select>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <span>Quantity</span>-->
<!--                                            </li>-->
                                            <li>
                                                <div class="handle-counter" id="handleCounter2">
                                                    <input name="quantity_sanpham" type="number" value="1" data-num="3">
                                                    <ul>
<!--                                                        <li><button class="counter-minus btn"><i class="fa fa-angle-up"></i></button></li>-->
<!--                                                        <li><button class="counter-plus btn"><i class="fa fa-angle-down"></i></button></li>-->
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="cart-btn" href="#" title=""><i class="fa fa-cart-plus"></i>Thêm vào giỏ hàng</a>
                                            </li>

                                        </ul>
                                        <ul>
                                            <li>
                                                <span>Size</span>
                                            </li>
                                            <li class="slct">
                                                <select name="size_sanpham">
                                                    <?php foreach ($size_san_pham->sizeSanPhams as $item):?>
                                                    <option><?=$item->size->size?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </li>
                                            <li>

                                            </li>
                                        </ul>
                                    </div>
                                    <?php \yii\bootstrap\ActiveForm::end() ?>
                                    <!--cart-ok end-->
<!--                                    <div class="other-options">-->
<!--                                        <a href="#" title=""><i class="fa fa-heart-o"></i>add to wishlist</a>-->
<!--                                        <ul>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-instagram"></i></a></li>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-pinterest-p"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
                                    <!--other-options end-->
                                </div>
                                <!--item_description end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product-main-section end-->
</section>

<!--Mô tả chi tiết sản phẩm-->
<section>
    <div class="block less-padding bd-btm">
        <div class="container">
            <div class="description_sec">
                <div class="descp-list">
                    <ul>
                        <li class="current" data-tab="tab-1">
                            <h3>Mô tả chi tiết</h3>
                        </li>
<!--                        <li data-tab="tab-2">-->
<!--                            <h3>Reviews</h3>-->
<!--                        </li>-->
                    </ul>
                </div>
                <!--descp-list end-->
                <div class="description_content">
                    <div class="description_text current" id="tab-1">
                        <?=$san_pham->mo_ta_chi_tiet?>
                    </div>
                    <!--description_text end-->
<!--                    <div class="description_text" id="tab-2">-->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-6">-->
<!--                                <div class="reviews-list">-->
<!--                                    <h3 class="sub-title">2 Reviews for this item</h3>-->
<!--                                    <div class="review remove-top-gap">-->
<!--                                        <div class="reviewer-img">-->
<!--                                            <img src="images/resources/user-img1.png" alt="">-->
<!--                                        </div>-->
<!--                                        reviewer-img end-->
<!--                                        <div class="reviewer-info">-->
<!--                                            <div class="reviewer-name">-->
<!--                                                <h3>James Hope</h3>-->
<!--                                                <span>September 12, 2020</span>-->
<!--                                            </div>-->
<!--                                            <ul class="rating">-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                            </ul>-->
<!--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.</p>-->
<!--                                        </div>-->
<!--                                        reviewer-info end-->
<!--                                    </div>-->
<!--                                    review end-->
<!--                                    <div class="review">-->
<!--                                        <div class="reviewer-img">-->
<!--                                            <img src="images/resources/user-img2.png" alt="">-->
<!--                                        </div>-->
<!--                                        reviewer-img end-->
<!--                                        <div class="reviewer-info">-->
<!--                                            <div class="reviewer-name">-->
<!--                                                <h3>Nobita Deo</h3>-->
<!--                                                <span>September 12, 2020</span>-->
<!--                                            </div>-->
<!--                                            <ul class="rating">-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                                <li><i class="fa fa-star"></i></li>-->
<!--                                            </ul>-->
<!--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.</p>-->
<!--                                        </div>-->
<!--                                        reviewer-info end-->
<!--                                    </div>-->
<!--                                    review end-->
<!--                                </div>-->
<!--                                reviews-list end-->
<!--                            </div>-->
<!--                            <div class="col-lg-6">-->
<!--                                <div class="review-contact">-->
<!--                                    <h3 class="sub-title">Add a Review</h3>-->
<!--                                    <div class="add-review">-->
<!--                                        <h4>Rate this product</h4>-->
<!--                                        <ul>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-star-o"></i></a></li>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-star-o"></i></a></li>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-star-o"></i></a></li>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-star-o"></i></a></li>-->
<!--                                            <li><a href="#" title=""><i class="fa fa-star-o"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                    <form>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-lg-12">-->
<!--                                                <div class="input-field">-->
<!--                                                    <h3>Your Name</h3>-->
<!--                                                    <input type="text" name="name">-->
<!--                                                </div>-->
<!--                                                input-field end-->
<!--                                            </div>-->
<!--                                            <div class="col-lg-12">-->
<!--                                                <div class="input-field">-->
<!--                                                    <h3>Email address</h3>-->
<!--                                                    <input type="text" name="email">-->
<!--                                                </div>-->
<!--                                                input-field end-->
<!--                                            </div>-->
<!--                                            <div class="col-lg-12">-->
<!--                                                <div class="input-field">-->
<!--                                                    <h3>Your Review</h3>-->
<!--                                                    <textarea name="review"></textarea>-->
<!--                                                </div>-->
<!--                                                input-field end-->
<!--                                            </div>-->
<!--                                            <div class="col-lg-12">-->
<!--                                                <button type="submit">add review <i class="fa fa-long-arrow-right"></i></button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </form>-->
<!--                                </div>-->
<!--                                review-contact end-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!--description_text end-->
                </div>
                <!--description_content end-->
            </div>
            <!--description_sec end-->
        </div>
    </div>
</section>

<!--Sản phẩm khác liên quan-->
<section>
    <div class="block less-padding">
        <div class="container">
            <div class="title">
                <h2>Bạn có thể thích</h2>
            </div>
            <!--title end-->
            <div class="portfolio-carousel">
                <?php foreach ($sanphamlienquan as $item): ?>
                <div class="col-lg-4">
                    <div class="portfolio-item">
                        <div class="item-img">
                            <img src="images/<?=$item->anh_dai_dien?>" alt="">
                            <div class="add-to-cart">
                                <a href="<?=\yii\helpers\Url::toRoute(['site/product','path'=>$item->code])?>" title="">
                                    <i class="fa fa-cart-plus"></i>
                                    Xem chi tiết
                                </a>
                                <a href="#" title="">
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </div>
                        </div>
<!--                        <ul class="rating">-->
<!--                            <li><i class="fa fa-star"></i></li>-->
<!--                            <li><i class="fa fa-star"></i></li>-->
<!--                            <li><i class="fa fa-star"></i></li>-->
<!--                            <li><i class="fa fa-star"></i></li>-->
<!--                            <li><i class="fa fa-star"></i></li>-->
<!--                        </ul>-->
                        <h3><?=\yii\helpers\Html::a($item->name,\yii\helpers\Url::toRoute(['site/product','path'=>$item->code]))?></h3>
                        <span><?=number_format($item->gia_ban,0,',','.')?> đ</span>
                    </div>
                    <!--portfolio-item end-->
                </div>
                <?php endforeach; ?>
            </div>
            <!--project-carousel end-->
        </div>
    </div>
</section>

