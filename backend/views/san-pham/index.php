<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel \common\models\search\QuanLySanPhamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="san-pham-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm sản phẩm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                [
                        'attribute'=>'anh_dai_dien',
                        'label'=>'Hình ảnh',

                        'value'=>function($data){
                            /** @var \common\models\SanPham $data  */
                            return Html::img('../images/'.$data->anh_dai_dien,['width'=>'80px']);
                        },
                        'format'=>'raw',
                        'filter'=>false
                ],

                'name',
                [
                    'attribute'=>'ban_chay',

                    'value'=>function($data){
                        if($data->ban_chay)
                            return '<span class="text-success"><i class="fa fa-check"></i></span>';
                        return '';
                    },
                    'format'=>'raw',//chỉ sử dụng format => raw nếu value có chưa thẻ html
                    'headerOptions'=>['class'=>'text-center'],
                    'contentOptions'=>['class'=>'text-center'],
                    'filter'=>Html::activeDropDownList($searchModel,'ban_chay',[
                            0=>'Không bán chạy',
                            1=>'Bán chạy'
                    ],['prompt'=>'Tất cả','class'=>'form-control'])
                ],
                'noi_bat',
                'moi_ve',
                [
                    'attribute'=>'gia_ban',

                    'value'=>function($data){
                        /** @var \common\models\SanPham $data */
                        return number_format($data->gia_ban,0,'','.');
                    },
                    'headerOptions'=>['class'=>'text-right'],
                    'contentOptions'=>['class'=>'text-right'],
                    'filter'=>Html::activeTextInput($searchModel,'gia_ban_tu',['class'=>'form-control','type'=>'number']).
                        Html::activeTextInput($searchModel,'gia_ban',['class'=>'form-control','type'=>'number'])
                ],
                //'code',
                //'mo_ta_ngan_gon',
                //'mo_ta_chi_tiet:ntext',

                //'gia_canh_tranh',

                [
                    'attribute'=>'ngay_dang',
                    'label'=>'Ngày đăng',
                    'value'=>function($data){
                        /** @var \common\models\SanPham $data */
                        return date("d/m/Y",strtotime($data->ngay_dang));
                    },
                    'headerOptions'=>['class'=>'text-center'],
                    'contentOptions'=>['class'=>'text-center'],
                    'filter'=>Html::activeTextInput($searchModel,'ngay_dang_tu',['class'=>'form-control']).
                        Html::activeTextInput($searchModel,'ngay_dang',['class'=>'form-control'])
                ],
                //'ngay_sua',
                [
                    'attribute'=>'thuong_hieu_id',
                    'label'=>'Thương hiệu',
                    'value'=>function($data){
                        /** @var \common\models\QuanLySanPham $data */
//                      cách 1:  $thuongHieu = \common\models\ThuongHieu::findOne($data->thuong_hieu_id);
//                        return $thuongHieu->name;
                        //cách 2 : dùng mối quan hệ giữa bảng thương hiệu và sản phẩm
                        return $data->thuongHieu->name;
                        //Sau khi đã thay đổi đối tượng search thành quản lý sản phẩm thì ta dùng cách này
                        //return $data->ten_thuong_hieu;
                    },
                    'headerOptions'=>['class'=>'text-right'],
                    'contentOptions'=>['class'=>'text-right'],
                    'filter'=>Html::activeDropDownList($searchModel,'thuong_hieu_id',\yii\helpers\ArrayHelper::map(
                            \common\models\ThuongHieu::find()->all(),
                        'id',
                        'name'
                    ),['class'=>'form-control','prompt'=>'Tất cả'])
                ],
//                'nguoi_tao_id',
//                'nguoi_sua_id',
                'so_luong',
                'ngay_hang_ve',
                ['class' => 'yii\grid\ActionColumn'],
                [
                    'attribute' =>'ten_phan_loai',
                    'label'=>'Phân loại sản phẩm',
                    //Sau khi thay đổi đối tượng search thành quản lý sản phẩm thì ko dùng cách dưới mà đung cách trên
                    'value'=>function($data){
                        /** @var \common\models\QuanLySanPham $data */
                        $phanLoai =[];
                        foreach ($data->phanLoaiSanPhams as $phanLoaiSanPham){
                            $phanLoai[]=$phanLoaiSanPham->phanLoai->name;//thêm tên của phân loại vào danh sách phaanloai[]
                        }
                        return implode(',',$phanLoai);
                    },
                ],

//                    'template'=>'{view}',
//                    'header'=>'Xem'
//                    ],//Sau khi thay đổi đối tượng search thành quản lý sản phẩm thì ko dùng cách dưới mà đung cách trên
//                [
//                        'header'=>'Xem',
//                        /** @var \common\models\QuanLySanPham $data */
//                        'value'=>function($data){
//                            return Html::a('<i class="fa fa-eye"></i>',\yii\helpers\Url::toRoute(
//                               ['san-pham/view','id'=>$data->id]
//                            ));
//                        },
//                    'format'=>'raw'
//                ],
//
//                ['header'=>'Sửa',
//                    /** @var \common\models\QuanLySanPham $data */
//                    'value'=>function($data){
//                        return Html::a('<i class="fa fa-pencil"></i>',\yii\helpers\Url::toRoute(
//                            ['san-pham/update','id'=>$data->id]
//                        ));
//                    },
//                    'format'=>'raw'
//                ],
//                ['header'=>'Xóa',
//                    /** @var \common\models\QuanLySanPham $data */
//                    'value'=>function($data){
//                        return Html::a('<i class="fa fa-trash"></i>',\yii\helpers\Url::toRoute(
//                            ['san-pham/delete','id'=>$data->id]
//                        ));
//                    },
//                    'format'=>'raw'
//                ],
            ],
        ]); ?>
    </div>


    <?php Pjax::end(); ?>

</div>
