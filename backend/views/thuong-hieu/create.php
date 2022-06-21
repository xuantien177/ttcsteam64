<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ThuongHieu */

$this->title = 'Thêm thương hiệu';
$this->params['breadcrumbs'][] = ['label' => 'Thuong Hieus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thuong-hieu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
