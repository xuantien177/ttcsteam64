<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\DonHangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="don-hang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ngay_dat') ?>

    <?= $form->field($model, 'tong_tien') ?>

    <?= $form->field($model, 'ho_ten') ?>

    <?= $form->field($model, 'dien_thoai') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'dia_chi_giao_hang') ?>

    <?php // echo $form->field($model, 'ghi_chu') ?>

    <?php // echo $form->field($model, 'ship') ?>

    <?php // echo $form->field($model, 'vat') ?>

    <?php // echo $form->field($model, 'thanh_tien') ?>

    <?php // echo $form->field($model, 'chiet_khau') ?>

    <?php // echo $form->field($model, 'kieu_chiet_khau') ?>

    <?php // echo $form->field($model, 'hinh_thuc_thanh_toan') ?>

    <?php // echo $form->field($model, 'tinh_trang') ?>

    <?php // echo $form->field($model, 'ly_do_huy') ?>

    <?php // echo $form->field($model, 'tong_so_luong') ?>

    <?php // echo $form->field($model, 'khach_hang_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
