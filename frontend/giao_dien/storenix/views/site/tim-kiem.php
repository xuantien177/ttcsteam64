<?php
/**
 * @var \common\models\QuanLySanPham[] $ket_qua
 * @var \common\models\PhanLoai[] $ds_phanLoai
 * @var \yii\web\View $this
 * @var \common\models\QuanLySanPham $san_pham
 * @var  \common\models\ChiTietSanPham[] $sanphams_banchay
 * @var  \common\models\ChiTietSanPham[] $sanphams_noibat
 * @var \common\models\QuanLySanPham $du_lieu_tim_kiem
 */


$this->title = "Kết quả tìm kiếm";
?>

<section>
    <div class="block2 rs-overlay">
        <div class="fixed-bg bg4"></div>
        <div class="container">
            <div class="pager-sec">
                <div class="page-title">
                    <h3><?="Kết quả tìm kiếm"?></h3>
                </div>
                <!--page-title end-->
            </div>
            <!--pager-sec end-->
        </div>
    </div>
</section>

<section>
    <div class="block less-padding3 remove-btm-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="widget-sidebar mg_btm_70">
                        <h3 class="widget-title">Tìm kiếm</h3>
                        <?php $form =  \yii\bootstrap\ActiveForm::begin([
                            'options'=>[
                                'id' =>'search-product',
                            ],
                            'action'=>\yii\helpers\Url::to(['site/tim-kiem']),
                            'method'=>'get'
                        ]) ?>
                        <?=$form->field($san_pham,'name')->label('Tên sản phẩm') ?>
                        <?=$form->field($san_pham,'gia_ban_tu')->textInput(['type'=>'number','min'=>0])->label('Giá bán, từ....')?>
                        <?=$form->field($san_pham,'gia_ban')->textInput(['type'=>'number','min'=>0])->label('Giá bán, đến....')?>
                        <?=$form->field($san_pham,'thuong_hieu_id')->dropDownList(
                            \yii\helpers\ArrayHelper::map(
                                \common\models\ThuongHieu::find()->all(),
                                'id',
                                'name'
                            ),['prompt'=>'Tất cả']
                        )->label('Thương hiệu')?>
                        <?=$form->field($san_pham,'phan_loai_id')->dropDownList(
                            \yii\helpers\ArrayHelper::map(
                                \common\models\PhanLoai::find()->all(),
                                'id',
                                'name'
                            ),['prompt'=>'Tất cả']
                        )->label('Loại sản phẩm')?>

                        <?=\yii\helpers\Html::submitButton('<i class="fa fa-search"></i> Tìm kiếm',['class'=>'btn btn-primary'])?>
                        <?php \yii\bootstrap\ActiveForm::end(); ?>
                        <div class="widget widget-categories wow fadeInLeft animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <h3 style="margin-top: 15px" class="widget-title">Các danh mục sản phẩm</h3>
                            <ul>
                                <?php foreach ($ds_phanLoai as $san_pham): ?>
                                    <li>
                                        <?=\yii\bootstrap\Html::a($san_pham->name,\yii\helpers\Url::toRoute(['site/san-pham','path'=>$san_pham->code])) ?>
                                        <ul>
                                            <?php foreach ($san_pham->phanLoaiSanPhams as $item): ?>
                                                <li><?=\yii\bootstrap\Html::a($item->sanPham->name,\yii\helpers\Url::toRoute(['site/san-pham','path'=>$item->sanPham->code])) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <h3 style="margin-top: 15px" class="widget-title">Sản phẩm bán chạy</h3>
                            <ul>
                                <?php foreach ($sanphams_banchay as $san_pham): ?>
                                    <li>
                                        <?=\yii\bootstrap\Html::a($san_pham->name,\yii\helpers\Url::toRoute(['site/san-pham','path'=>$san_pham->code])) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <h3 style="margin-top: 15px" class="widget-title">Sản phẩm nổi bật</h3>
                            <ul>
                                <?php foreach ($sanphams_noibat as $san_pham): ?>
                                    <li>
                                        <?=\yii\bootstrap\Html::a($san_pham->name,\yii\helpers\Url::toRoute(['site/san-pham','path'=>$san_pham->code])) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!--widget-categories end-->
                    </div>
                    <!--widget-sidebar end-->
                </div>
                <div class="col-lg-9">
                    <div class="main-items-sec">
                        <div class="items-show-sec current" id="tab-v1">
                            <div class="row">
                                <?php foreach ($ket_qua as $sanpham): ?>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="portfolio-item wow fadeInLeft animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                            <div class="item-img">
                                                <?=\yii\bootstrap\Html::img('images/'.$sanpham->anh_dai_dien,['alt'=>$sanpham->name]) ?>
                                                <div class="add-to-cart">
                                                    <a class="cart-btn" href="#" title="" data-value="<?=$sanpham->code.'-'.$san_pham->id?>">
                                                        <i class="fa fa-cart-plus"></i>
                                                        Thêm vào giỏ hàng
                                                    </a>
                                                </div>
                                                <!--                                            <h4 class="item-status blue-color">new</h4>-->
                                            </div>
                                            <h3>
                                                <?=\yii\bootstrap\Html::a($sanpham->name,\yii\helpers\Url::toRoute(['site/product','path'=>$sanpham->code])) ?>
                                            </h3>
                                            <span><?=number_format($sanpham->gia_ban,0,'','.') ?> đ</span>
                                        </div>
                                        <!--portfolio-item end-->
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="load-more-items">
                            <a href="#" title="">LOADING more items ...</a>
                        </div>
                        <!--load-more-items end-->
                    </div>
                    <!--main-items-sec end-->
                </div>
            </div>
        </div>
    </div>
</section>

