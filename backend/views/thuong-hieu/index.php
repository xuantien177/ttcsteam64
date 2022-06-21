<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ThuongHieuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý thương hiệu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thuong-hieu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm thương hiệu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            'logo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
