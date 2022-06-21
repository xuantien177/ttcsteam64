<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**  @var $this yii\web\View
 *   @var $model common\models\DonHang
 *   @var \common\models\QuanLyChiTietDonHang[] $chi_tiet_don_hang */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Don Hangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="don-hang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ngay_dat',
            'tong_tien',
            'ho_ten',
            'dien_thoai',
            'email:email',
            'dia_chi_giao_hang',
            'ghi_chu',
            'ship',
            'vat',
            'thanh_tien',
            'chiet_khau',
            'kieu_chiet_khau',
            'hinh_thuc_thanh_toan',
            'tinh_trang',
            'ly_do_huy',
            'tong_so_luong',
            'khach_hang_id',
        ],
    ]) ?>

    <table class="table table-bordered table-striped" id="gio-hang">
        <thead>
        <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên</th>
            <th>Số lượng</th>
            <th>Đơn giá (VND)</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
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
                    <td><?=\yii\helpers\Html::img('../images/'.$item->anh_dai_dien,['alt'=>$item->name,'width'=>'50px'])?></td>
                    <td><?= $item->name ?></td>
                    <td class="td-so-luong text-right"><?=$item->so_luong?></td>
                    <td class="td-gia-ban text-right">
                        <?=number_format($item->gia_ban,0,'','.'); ?> đ
                    </td>
                    <td class="td-thanh-tien text-right"><?=number_format($item->thanh_tien,0,'','.'); ?> đ</td>
                    <td class="text-center">
                        <?=\yii\helpers\Html::a('<i class="fa fa-trash"></i>','#',[
                            'class'=>'text-danger btn-delete-san-pham',
                            'data-value'=>$item->id
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <h2 class="text-right text-danger">Tổng tiền: <span id="tong-tien-gio-hang">
            <?=number_format($tong_tien,0,'','.');?>
        </span> đ</h2>

</div>

</div>
