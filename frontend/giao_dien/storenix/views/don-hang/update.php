<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DonHang */

$this->title = 'Update Don Hang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Don Hangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="don-hang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
