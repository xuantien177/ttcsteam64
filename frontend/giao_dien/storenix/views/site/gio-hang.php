<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\SanPham[] $san_pham
 * @var int[] $so_luong
 * @var double $tong_tien
 * @var int $so_luong_da_dat
 * @var int[] $size_sanpham
 * @var \common\models\SanPham $size_sanphams
 */

$this->title="Giỏ hàng của bạn";
//\yii\helpers\VarDumper::dump($size_sanpham,10,true);
//exit();
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


<div class="container">
    <div class="table-responsive">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
                'options'=>[
                        'id'=>'form-gio-hang'
                ]
        ]) ?>
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
                <?php $dem=1;?>
                <?php foreach ($san_pham as $item): ?>
                    <tr>
                        <td class="text-center"><?=$dem++?></td>
                        <td><?=\yii\helpers\Html::img('images/'.$item->anh_dai_dien,['alt'=>$item->name,'width'=>'50px'])?></td>
                        <td><?= $item->name ?></td>
                        <td class="td-so-luong"><?=\yii\helpers\Html::textInput("SoLuong[{$item->id}]",$so_luong[$item->id],['type'=>'number','class'=>'form-control']) ?></td>
                        <td class="td-size">
                            <?=\yii\helpers\Html::dropDownList("size_sanpham[{$item->id}]",$size_sanpham[$item->id],
                            \yii\helpers\ArrayHelper::map(//hamf convert 1 danh sach du lieu thanh 1 mang co 2 thuoc tinh
                                \common\models\QuanLySanPham::findAll(['id'=>$item->id]),
                                'size',
                                'size'
                            ),[
                                    'prompt'=>'--Chọn--'
                                ]
                            )?>
                        </td>
                        <td class="td-gia-ban text-right">
                            <?=number_format($item->gia_ban,0,'','.'); ?> đ
                            <?=\yii\helpers\Html::hiddenInput("Giaban[{$item->id}]",$item->gia_ban);?>
                        </td>
                        <td class="td-thanh-tien text-right"><?=number_format($item->gia_ban*$so_luong[$item->id],0,'','.'); ?> đ</td>
                        <td class="text-center">
                            <?=\yii\helpers\Html::a('<i class="fa fa-trash"></i>',\yii\helpers\Url::toRoute(['site/xoa-san-pham','idsanpham'=>$item->id]),[
                                'class'=>'text-danger btn-delete-san-pham',
//                                'data-value'=>$item->id
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>
        <h2 class="text-right text-danger">Tổng tiền: <span id="tong-tien-gio-hang"><?=number_format($tong_tien,0,'','.');?></span> đ</h2>
         <div class="action">
              <?=\yii\helpers\Html::a('<i class="fa fa-arrow-circle-o-left"></i> Tiếp tục mua hàng',\yii\helpers\Url::toRoute(['site/index']),['class'=>'btn btn-warning']) ?>
              <?=\yii\helpers\Html::a('<i class="fa fa-refresh"></i> Cập nhật giỏ hàng','#',['class'=>'btn btn-success btn-update-cart']) ?>
              <?=\yii\helpers\Html::a('<i class="fa fa-arrow-circle-o-right"></i> Thanh toán',\yii\helpers\Url::toRoute(['site/thanh-toan']),['class'=>'btn btn-primary']) ?>

         </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>
