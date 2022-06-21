<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DonHang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="don-hang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ngay_dat')->textInput() ?>

    <?= $form->field($model, 'tong_tien')->textInput() ?>

    <?= $form->field($model, 'ho_ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dien_thoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_chi_giao_hang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ghi_chu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ship')->textInput() ?>

    <?= $form->field($model, 'vat')->textInput() ?>

    <?= $form->field($model, 'thanh_tien')->textInput() ?>

    <?= $form->field($model, 'chiet_khau')->textInput() ?>

    <?= $form->field($model, 'kieu_chiet_khau')->dropDownList([ 'Phần trăm' => 'Phần trăm', 'Tiền mặt' => 'Tiền mặt', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hinh_thuc_thanh_toan')->dropDownList([ 'Tiền mặt' => 'Tiền mặt', 'Chuyển khoản' => 'Chuyển khoản', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tinh_trang')->dropDownList([ 'Đang chờ xử lý' => 'Đang chờ xử lý', 'Đang xử lý' => 'Đang xử lý', 'Đang giao hàng' => 'Đang giao hàng', 'Hủy' => 'Hủy', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ly_do_huy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tong_so_luong')->textInput() ?>

    <?= $form->field($model, 'khach_hang_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
