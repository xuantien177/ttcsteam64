<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'password_hash')->textInput(['type'=>'password']) ?>
    <?= $form->field($model, 'email')->textInput(['type'=>'email']) ?>

    <?= $form->field($model, 'status')->dropDownList([
           10 => 'Hoạt động',
            0 => 'Không hoạt động',
    ]) ?>

    <?= $form->field($model, 'vai_tro')->dropDownList([
        'Quản lý'=>'Quản lý',
        'Bán hàng'=>'Bán hàng',
        'Quản trị viên'=>'Quản trị viên',
        'Khách hàng'=>'Khách hàng'
    ],[
            'prompt'=>'--Chọn--'
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
