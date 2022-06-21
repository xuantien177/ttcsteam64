<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DonHangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý đơn hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="don-hang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm đơn hàng', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'ngay_dat',
            'dia_chi_giao_hang',
            'tong_tien',
            'ship',
            'chiet_khau',
            'vat',
            //'email:email',
            //'ghi_chu',
            [
                    'attribute'=>'thanh_tien',
                    'value' => function($data){
                        return number_format($data->thanh_tien,0,'','.');
                    },
                'contentOptions'=>array(
                        'class'=>'text-right',
                ),
                'headerOptions'=>array(
                        'class'=>'text-right'
                )
            ],
            [
                    'header'=>'Tình trạng',
                    'attribute'=>'tinh_trang',
                    'value'=> function($data){
                        return (new \common\models\DonHang())->getIconTinhTrang($data->tinh_trang);
                    },
                'format'=>'raw'
            ],
            'tong_so_luong',
            'khach_hang_id',
            ['class' => 'yii\grid\ActionColumn'],
            ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
