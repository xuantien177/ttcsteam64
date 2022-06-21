<?php
/**
 * @var \common\models\DonHang $don_hang
 * @var \common\models\QuanLyChiTietDonHang[] $chi_tiet_don_hang
 */
?>

<?php  $form = \yii\widgets\ActiveForm::begin() ?>
<div class="container">
    <table class="table table-bordered table-striped" id="gio-hang">
        <thead>
        <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên</th>
            <th>Số lượng</th>
            <th>Đơn giá (VND)</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php $dem=1;
        $tong_tien = 0;
        ?>
        <?php foreach ($chi_tiet_don_hang as $item): ?>
            <?php $tong_tien += $item->thanh_tien ?>
            <tr>
                <td class="text-center"><?=$dem++?></td>
                <td><?=\yii\helpers\Html::img('images/'.$item->anh_dai_dien,['alt'=>$item->name,'width'=>'50px'])?></td>
                <td><?= $item->name ?></td>
                <td class="td-so-luong text-right"><?=$item->so_luong?></td>
                <td class="td-gia-ban text-right">
                    <?=number_format($item->gia_ban,0,'','.'); ?> đ
                </td>
                <td class="td-thanh-tien text-right"><?=number_format($item->thanh_tien,0,'','.'); ?> đ</td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <h2 class="text-right text-danger">Tổng tiền: <span id="tong-tien-gio-hang">
            <?=number_format($tong_tien,0,'','.');?>
        </span> đ</h2>

    <div class="row">
        <div class="col-md-12">
            <?=$form->field($don_hang, 'ly_do_huy')->textarea()->label('Lý do hủy đơn') ?>

            <?= \yii\helpers\Html::submitButton('<i class="fa fa-save"></i> Xác nhận',['class'=>'btn btn-primary'])?>
        </div>
    </div>
</div>

<?php \yii\widgets\ActiveForm::end()?>


