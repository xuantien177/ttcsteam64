<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DonHang */

$this->title = 'Thêm đơn hàng';
$this->params['breadcrumbs'][] = ['label' => 'Don Hangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="don-hang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
