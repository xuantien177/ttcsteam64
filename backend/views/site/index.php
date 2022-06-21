<?php
/* @var $this yii\web\View
 /**
 * @var \common\models\DonHang[] $donHang
 * @var \common\models\SanPham[] $sanPham
 * @var \common\models\User[] $khachHang
 *
 */


$this->title = 'TTCS-64';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Hello <?=Yii::$app->user->identity->username?></h1>

        <p class="lead">Đây là trang quản lý website của bạn</p>

        <p><a class="btn btn-lg btn-success" href="http://localhost:8080/ttcs/">Đi tới trang người dùng</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Đơn hàng hiện tại</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $dem = 0;?>
                        <?php foreach ($donHang as $item): ?>
                        <?php $dem++?>
                        <tr>
                            <td><?=$dem?></td>
                            <td><?=$item->id?></td>
                            <td><?=$item->tinh_trang?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

                <p><a class="btn btn-outline-secondary" href="<?=\yii\helpers\Url::toRoute(['don-hang/index'])?>">Đi tới trang quản lý đơn hàng &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Một số sản phẩm nổi bật</h2>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $dem = 0;?>
                    <?php foreach ($sanPham as $item): ?>
                        <?php $dem++?>
                        <tr>
                            <td><?=$dem?></td>
                            <td><?=$item->id?></td>
                            <td><?=$item->name?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

                <p><a class="btn btn-outline-secondary" href="<?=\yii\helpers\Url::toRoute(['san-pham/index'])?>">Đi tới trang quản lý sản phẩm &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Một số khách hàng nổi bật</h2>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã khách hàng</th>
                        <th>Tên khách hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $dem = 0;?>
                    <?php foreach ($khachHang as $item): ?>
                        <?php $dem++?>
                        <tr>
                            <td><?=$dem?></td>
                            <td><?=$item->id?></td>
                            <td><?=$item->ho_ten?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

                <p><a class="btn btn-outline-secondary" href="<?=\yii\helpers\Url::toRoute(['user/index'])?>">Đi tới trang quản lý khách hàng &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
