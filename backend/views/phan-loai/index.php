<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PhanLoaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý danh mục phân loại';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="phan-loai-index">

    <h1 class="text-center text-info"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Thêm phân loại', ['create'], ['class' => 'btn btn-success']) ?>
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
