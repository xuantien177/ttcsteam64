<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\DonHang $donHang
 * @var \common\models\SanPham[] $san_pham
 * @var int[] $so_luong
 * @var double $tong_tien
 * @var int $so_luong_da_dat
 * @var int[] $size_sanpham
 */
?>
<table class="table table-bordered table-striped" id="gio-hang">
    <thead>
    <tr>
        <th>STT</th>
        <th>Hình ảnh</th>
        <th>Tên</th>
        <th>Số lượng</th>
        <th>Size</th>
        <th>Đơn giá (VND)</th>
        <th>Thành tiền</th>
        <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
    <?php if(count($san_pham) == 0): ?>
        <tr>
            <td colspan="7">
                <h3>Bạn chưa đặt sản phẩm nào!</h3>
            </td>
        </tr>
    <?php else:?>
        <?php $dem=0;?>
        <?php foreach ($san_pham as $item): ?>
            <tr>
                <td class="text-center"><?=$dem+1?></td>
                <td><?=\yii\helpers\Html::img('images/'.$item->anh_dai_dien,['alt'=>$item->name,'width'=>'50px'])?></td>
                <td><?= $item->name ?></td>
                <td class="td-so-luong text-right"><?=$so_luong[$item->id]?></td>
                <td class="td-size"><?=$size_sanpham[$item->id]?></td>
                <td class="td-gia-ban text-right">
                    <?=number_format($item->gia_ban,0,'','.'); ?> đ
                    <?=\yii\helpers\Html::hiddenInput("Giaban[{$item->id}]",$item->gia_ban);?>
                </td>
                <td class="td-thanh-tien text-right"><?=number_format($item->gia_ban*$so_luong[$item->id],0,'','.'); ?> đ</td>
                <td class="text-center">
                    <?=\yii\helpers\Html::a('<i class="fa fa-trash"></i>','#',[
                        'class'=>'text-danger btn-delete-san-pham',
                        'data-value'=>$item->id
                    ]) ?>
                </td>
            </tr>
        <?php endforeach;?>
    <?php endif;?>
    </tbody>
</table>
<h2 class="text-right text-danger">Tổng tiền: <span id="tong-tien-gio-hang"><?=number_format($tong_tien,0,'','.');?></span> đ</h2>
