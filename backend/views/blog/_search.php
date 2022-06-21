<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\BlogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tieu_de') ?>

    <?= $form->field($model, 'mo_ta_ngan') ?>

    <?= $form->field($model, 'noi_dung') ?>

    <?= $form->field($model, 'ngay_dang') ?>

    <?php // echo $form->field($model, 'ngay_sua') ?>

    <?php // echo $form->field($model, 'nguoi_dang_id') ?>

    <?php // echo $form->field($model, 'nguoi_sua_id') ?>

    <?php // echo $form->field($model, 'anh_dai_dien') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
