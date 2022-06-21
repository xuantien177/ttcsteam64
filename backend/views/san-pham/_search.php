<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\SanPhamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="san-pham-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'mo_ta_ngan_gon') ?>

    <?= $form->field($model, 'mo_ta_chi_tiet') ?>

    <?php // echo $form->field($model, 'ban_chay') ?>

    <?php // echo $form->field($model, 'noi_bat') ?>

    <?php // echo $form->field($model, 'moi_ve') ?>

    <?php // echo $form->field($model, 'gia_ban') ?>

    <?php // echo $form->field($model, 'gia_canh_tranh') ?>

    <?php // echo $form->field($model, 'anh_dai_dien') ?>

    <?php // echo $form->field($model, 'ngay_dang') ?>

    <?php // echo $form->field($model, 'ngay_sua') ?>

    <?php // echo $form->field($model, 'thuong_hieu_id') ?>

    <?php // echo $form->field($model, 'nguoi_tao_id') ?>

    <?php // echo $form->field($model, 'nguoi_sua_id') ?>

    <?php // echo $form->field($model, 'so_luong') ?>

    <?php // echo $form->field($model, 'ngay_hang_ve') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
