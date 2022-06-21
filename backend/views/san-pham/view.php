<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SanPham */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'San Phams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="san-pham-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div id="noi-dung-chi-tiet">
        <dl class="dl-horizontal">
            <dt>Sản phẩm:</dt><dd><?=$model->name ?></dd>
            <dt>Mô tả ngắn gọn :</dt><dd><?=$model->mo_ta_ngan_gon ?></dd>
        </dl>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'mo_ta_ngan_gon',
            'mo_ta_chi_tiet:ntext',
            'ban_chay',
            'noi_bat',
            'moi_ve',
            'gia_ban',
            'gia_canh_tranh',
            'anh_dai_dien',
            'ngay_dang',
            'ngay_sua',
            'thuong_hieu_id',
            'nguoi_tao_id',
            'nguoi_sua_id',
            'so_luong',
            'ngay_hang_ve',
        ],
    ]) ?>

</div>
