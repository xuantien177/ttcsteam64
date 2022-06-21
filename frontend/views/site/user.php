<?php
?>

<?php  $form = \yii\widgets\ActiveForm::begin() ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?=\yii\bootstrap\Html::img('images/no-image.jpeg',['class'=>'img-responsive']) ?>
            <h2><?=$user->username?> <?=$user->ho_ten?></h2>
        </div>
        <div class="col-md-9">
            <?=$form->field($user, 'password_hash')->passwordInput()->label('Password') ?>

            <?=$form->field($user, 'ho_ten')->label('Họ tên') ?>
            <?=$form->field($user, 'dien_thoai')->label('Điện thoại') ?>
            <?=$form->field($user, 'email')->label('Email') ?>
            <?=$form->field($user, 'dia_chi')->textarea()->label('Địa chỉ') ?>

            <?= \yii\helpers\Html::submitButton('<i class="fa fa-save"></i> Cập nhật thông tin',['class'=>'btn btn-primary'])?>

        </div>
    </div>
</div>

<?php \yii\widgets\ActiveForm::end()?>


