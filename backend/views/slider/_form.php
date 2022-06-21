<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $form yii\widgets\ActiveForm */
/* @var $hinh_anh_slider \common\models\AnhSlider[] */

?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="slider-form">

    <?php $form = ActiveForm::begin([
            'options' => [
                    'enctype' => 'multipart/form-data'
            ]
    ]); ?>

    <?= $form->field($model, 'caption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tom_tat')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hinh_anhs[]')->fileInput(['multiple' => 'multiple']) ?>

    <?php if(!$model->isNewRecord): ?>
        <div class="row">
            <?php foreach ($hinh_anh_slider as $item):?>
                <div class="col-md-4">
                    <?=Html::img('../images/'.$item->file,['class' => 'img-responsive']) ?>
                    <p><?=Html::a('<i class="fa fa-trash"></i> Xóa',\yii\helpers\Url::toRoute(['slider/xoa-anh-slider','idhinhanh' =>$item->id]),['class'=>'btn btn-sm btn-danger'])?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
