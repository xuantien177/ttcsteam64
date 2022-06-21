<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhanLoai */

$this->title = 'Update Phan Loai: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý danh mục phân loại', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phan-loai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
