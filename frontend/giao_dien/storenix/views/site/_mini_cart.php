<?php
/**
 * @var int[] $size_sanpham
 */


use yii\helpers\Html; ?>

<ul>
    <li>
        <a class="cart-open" href="#" title="">
            <i class="fa fa-cart-plus"></i>
            <span>(<?=$so_luong_da_dat?>)</span>
        </a>
        <div class="cart-dropdown">
            <?php /** @var \common\models\SanPham $item */ ?>
            <?php foreach ($san_pham as $item): ?>
                <div class="cart-prdct-info">
                    <div class="cart-pdct-img">
                        <?=\yii\helpers\Html::img('images/'.$item->anh_dai_dien,['width'=>'50px'])?>
                    </div>
                    <div class="crt-info">
                        <h3><?=\yii\helpers\Html::a($item->name,\yii\helpers\Url::toRoute(['site/product','path'=>$item->code]),['title'=>$item->name]) ?></h3>
                        <span><?=number_format($item->gia_ban,0,'','.');?> đ</span>
                        <b>Số lượng: <?=$so_luong[$item->id];?></b>
                        <br>
                        <br>
                        <b>Size: <?=$size_sanpham[$item->id];?></b>
                        <a href="#" title=""><i class="fa fa-close"></i></a>
                    </div>

                </div>
            <?php endforeach;?>

            <!--cart-prdct-info end-->
            <span>Subtotal: <strong><?=number_format($tong_tien,0,'','.'); ?> đ</strong></span>
            <ul>
                <li><?=\yii\helpers\Html::a('Thanh toán',\yii\helpers\Url::toRoute('site/thanh-toan'))?></li>
                <li><?=\yii\helpers\Html::a('Giỏ hảng',\yii\helpers\Url::toRoute('site/gio-hang'))?></li>
            </ul>

        </div>
        <!--cart-dropdown end-->
    </li>
    <li><a href="#" title="" class="open-search"><i class="ion-android-search"></i></a></li>

</ul>
