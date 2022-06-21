<?php

/* @var $this yii\web\View
 * @var \common\models\Blog[] $blog

 */

use yii\helpers\Html;

$this->title = "Blog";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>

    <!--responsive-mobile-menu end-->
    <section>
        <div class="block2 rs-overlay">
            <div class="fixed-bg bg4"></div>
            <div class="container">
                <div class="pager-sec">
                    <div class="page-title">
                        <h3>Blog</h3>
                    </div>
                    <!--page-title end-->
                    <div class="page-links">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::toRoute('site/index') ?>" title="">Home</a></li>
                            <li><a href="<?=\yii\helpers\Url::toRoute(['site/blog']) ?>" title="">Blog</a></li>
                        </ul>
                    </div>
                    <!--page-links end-->
                </div>
                <!--pager-sec end-->
            </div>
        </div>
    </section>
    <section>
        <div class="block4 bd-btm">
            <div class="container">
                <div class="blog-section">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mgs-btm-60">
                            <?php foreach ($blog as $item):?>
                            <div class="blog">
                                <div class="blog-img wow fadeInDown animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <img src="images/<?=$item->anh_dai_dien?>" alt="">
                                </div>
                                <!--blog-img end-->
                                <div class="blog-info">
                                    <ul class="blog-post-date">
                                        <li><i class="fa fa-user-o"></i><span>Đăng bởi <a href="#" title=""><?=$item->nguoiDang->username?></a></span></li>
                                        <li><i class="fa fa-calendar-o"></i><span><?=$item->ngay_dang?></span></li>
                                        <li><i class="fa fa-comment-o"></i><span>68</span></li>
                                    </ul>
                                    <h3><a href="#" title=""><?=$item->tieu_de?></a></h3>
                                    <p><?=$item->mo_ta_ngan?></p>
                                    <a href="<?=\yii\helpers\Url::toRoute(['site/chi-tiet-blog','path'=>$item->id])?>" title="">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                                <!--blog-info end-->
                            </div>
                            <?php endforeach;?>
                            <!--blog end-->
                        </div>
                    </div>
                </div>
                <!--blog-section end-->
            </div>
        </div>
    </section>
</div>
