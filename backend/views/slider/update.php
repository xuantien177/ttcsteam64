<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $hinh_anh_slider \common\models\AnhSlider[] */

$this->title = 'Update Slider: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hinh_anh_slider' => $hinh_anh_slider // do biến hinh_anh_slider là 1 mảng nên khai báo phải có [] như trên
    ]) ?>

</div>
