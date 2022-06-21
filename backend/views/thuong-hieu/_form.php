<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ThuongHieu */
/* @var $form yii\widgets\ActiveForm */
// beforeSave của thương hiệu cũng khá giống với phân loại
?>

<div class="thuong-hieu-form">

    <?php $form = ActiveForm::begin([
            'options'=>[
                'enctype'=>'multipart/form-data'
            ]

    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'logo')->fileInput() ?>

    <?php if(!$model->isNewRecord):?>
        <?=Html::img('../../images/'.$model->logo,['width'=>'150px'])?>
    <?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
