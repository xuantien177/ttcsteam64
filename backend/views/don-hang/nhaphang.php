<?php

/**
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 * @var  \common\models\SanPham[] $san_pham
 */

$san_pham =  \common\models\SanPham::find()->all();
$this->title="Đơn hàng nhập";
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="table-responsive">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'options'=>[
                'id'=>'form-nhap-hang'
            ]
        ]) ?>
        <select name="SanPham" id="san-pham">
            <?php foreach ($san_pham as $item):?>
                <option><?=$item->name?></option>
            <?php endforeach;?>
        </select>
        <table class="table table-bordered table-striped" id="gio-hang">
            <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá nhập</th>
                <th>Giá bán</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-san-pham"></td>
                    <td class="td-so-luong"><?=\yii\helpers\Html::textInput("SoLuong",1,['type'=>'number','class'=>'form-control']) ?></td>
                    <td class="td-gia-ban"><?=\yii\helpers\Html::textInput("GiaBan",1,['type'=>'number','class'=>'form-control']) ?></td>
                    <td class="td-gia-nhap"><?=\yii\helpers\Html::textInput("GiaNhap",1,['type'=>'number','class'=>'form-control']) ?></td>
                    <td class="td-thanh-tien text-right">10000</td>
                    <td> <?=\yii\helpers\Html::a('<i class="fa fa-trash"></i>',\yii\helpers\Url::toRoute(['#']),[
                            'class'=>'text-danger btn-delete-san-pham',
//                                'data-value'=>$item->id
                        ]) ?></td>
                </tr>
                <tr>
                    <td colspan="3">Tổng tiền :</td>
                    <td class="text-right" colspan="2">10000</td>
                </tr>

            </tbody>
        </table>
        <div class="action">
            <?=\yii\helpers\Html::a('<i class="fa fa-save"></i> Lưu đơn hàng',\yii\helpers\Url::toRoute(['don-hang/nhaphang']),['class'=>'btn btn-success']) ?>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>
