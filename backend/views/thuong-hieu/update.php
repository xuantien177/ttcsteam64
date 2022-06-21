<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ThuongHieu */

$this->title = 'Update Thuong Hieu: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Thuong Hieus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="thuong-hieu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
