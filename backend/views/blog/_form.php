<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tieu_de')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mo_ta_ngan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noi_dung')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 10],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'anh_dai_dien')->fileInput() ?>

    <?php if(!$model->isNewRecord):?>
        <?=Html::img('../images/'.$model->anh_dai_dien,['width'=>'150px'])?>
        <!--Tạo ra 1 action trong sanphamcontroller : xoa-anh-dai-dien&idsp=$model->id    -->
        <?php if($model->anh_dai_dien !='no-image.jpeg'): ?>
            <?=Html::a('<i class="fa fa-trash"></i> Xóa',\yii\helpers\Url::toRoute(['blog/xoa-anh-dai-dien','idsp' =>$model->id])
                ,['class'=>'btn btn-sm btn-danger'])?>
        <?php endif;?>
    <?php endif; ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
