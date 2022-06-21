<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhanLoai */

$this->title = 'Thêm phân loại';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý phân loại', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phan-loai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
