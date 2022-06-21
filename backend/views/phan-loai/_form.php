<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PhanLoai */
/* @var $form yii\widgets\ActiveForm */
/*Nhập dữ liệu -> beforeSave() -> Save(data->database | trigger | procedure) -> AfterSave() */
/*Convert d/m/y -> Y-m-d */
/*Gán id_user : người đang đăng nhập và xử lý */
/*Cộng các đơn giá -> tổng tiền -> chi phí, chiết khẩu */
/*Convert Name -> code */

/*AfterSave
    Lưu hình ảnh liên quan của bài viết/ sản phẩm / slider
    Lấy id của Model vừa lưu xong
*/
?>

<div class="phan-loai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    //= //$form->field($model, 'code')->textInput(['maxlength' => true])-->


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
