<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SanPham */
/* @var $form yii\widgets\ActiveForm */
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="san-pham-form">

    <?=Html::errorSummary($model)  ?>
    <?=Yii::$app->session->getFlash('thongbao');  ?>

    <?php $form = ActiveForm::begin([
            'options'=>[
                    'enctype'=>'multipart/form-data'
            ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mo_ta_ngan_gon')->textarea(['maxlength' => true, 'rows'=>'3']) ?>

    <?= $form->field($model, 'mo_ta_chi_tiet')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 10],
        'preset' => 'full'
    ]) ?>


    <div class="row container">
        <div class="col-md-3 font-weight-bold">
            <?= $form->field($model, 'ban_chay')->checkbox() ?>
        </div>
        <div class="col-md-3 font-weight-bold">
            <?= $form->field($model, 'noi_bat')->checkbox() ?>
        </div>
        <div class="col-md-3 font-weight-bold">
            <?= $form->field($model, 'moi_ve')->checkbox() ?>
        </div>
    </div>


    <?= $form->field($model, 'gia_ban')->textInput(['type'=>'number','min'=>0]) ?>

    <?= $form->field($model, 'gia_canh_tranh')->textInput(['type'=>'number','min'=>0]) ?>

    <?= $form->field($model, 'so_luong')->textInput(['type'=>'number','min'=>0]) ?>

    <?= $form->field($model, 'ngay_hang_ve')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'vi',
        'dateFormat' => 'dd/MM/yyyy',
        'options'=>[
            'class'=>'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'anh_dai_dien')->fileInput() ?>

    <?php if(!$model->isNewRecord):?>
        <?=Html::img('../images/'.$model->anh_dai_dien,['width'=>'150px'])?>
        <!--Tạo ra 1 action trong sanphamcontroller : xoa-anh-dai-dien&idsp=$model->id    -->
        <?php if($model->anh_dai_dien !='no-image.jpeg'): ?>
        <?=Html::a('<i class="fa fa-trash"></i> Xóa',\yii\helpers\Url::toRoute(['san-pham/xoa-anh-dai-dien','idsp' =>$model->id])
                ,['class'=>'btn btn-sm btn-danger'])?>
        <?php endif;?>
    <?php endif; ?>

    <?= $form->field($model, 'anh_san_phams[]')->fileInput(['multiple'=>'multiple']) ?>

    <?php if(!$model->isNewRecord): ?>
        <div class="row">
            <?php foreach ($model->anhSanPhams as $item):?>
                <?php /** @var \common\models\AnhSanPham $item */ ?>
                <div class="col-md-4">
                    <?=Html::img('../images/'.$item->file,['class' => 'img-responsive']) ?>
                    <p><?=Html::a('<i class="fa fa-trash"></i> Xóa',\yii\helpers\Url::toRoute(['san-pham/xoa-anh-san-pham','idhinhanh' =>$item->id]),['class'=>'btn btn-sm btn-danger'])?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <?= $form->field($model, 'thuong_hieu_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(//hamf convert 1 danh sach du lieu thanh 1 mang co 2 thuoc tinh
                    \common\models\ThuongHieu::find()->all(),
                'id',
                'name'
            ),[
                    'prompt'=>'--Chọn--'
        ]

    ) ?>

    <?= $form->field($model,'phan_loai_san_phams')->checkboxList(
            \yii\helpers\ArrayHelper::map(
                    //hàm arrayhelper map convert 1 mảng đối tượng thành mảng 1 chiều
                    //'index'=>'value'
                \common\models\PhanLoai::find()->all(),
                'id', //from là giá trị ẩn đi ,phần này giống trong c#
                'name' //to là giá trị hiện thị
            )
    ) ?>

    <?= $form->field($model,'size_san_phams')->checkboxList(
        \yii\helpers\ArrayHelper::map(
        //hàm arrayhelper map convert 1 mảng đối tượng thành mảng 1 chiều
        //'index'=>'value'
            \common\models\Size::find()->all(),
            'id', //from là giá trị ẩn đi ,phần này giống trong c#
            'size' //to là giá trị hiện thị
        )
    ) ?>


    <?= $form->field($model, 'tu_khoa_san_phams')->widget(\dosamigos\selectize\SelectizeTextInput::className(), [
        // calls an action that returns a JSON object with matched
        // tags
        'loadUrl' => ['tu-khoa/list'],
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'plugins' => ['remove_button'],
            'valueField' => 'name',
            'labelField' => 'name',
            'searchField' => ['name'],
            'create' => true,
        ],
    ])->hint('Mỗi từ khóa cách nhau bởi 1 dấu phẩy') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
