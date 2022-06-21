<?php
/* @var $this yii\web\View
 * @var \common\models\Blog $blog

 */

use yii\helpers\Html;

$this->title = $blog->tieu_de;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
    	<!-- Preloader -->
        <div class="preloader"></div>

        <section>
            <div class="block2 rs-overlay">
                <div class="fixed-bg bg4"></div>
                <div class="container">
                    <div class="pager-sec">
                        <div class="page-title">
                            <h3><?=$blog->tieu_de?></h3>
                        </div>
                        <!--page-title end-->
                        <div class="page-links">
                            <ul>
                                <li><a href="<?=\yii\helpers\Url::toRoute('site/index') ?>" title="">Home</a></li>
                                <li><a href="<?=\yii\helpers\Url::toRoute(['site/blog']) ?>" title="">Blog</a></li>
                                <li><a href="<?=\yii\helpers\Url::toRoute(['site/chi-tiet-blog','path'=>$blog->id]) ?>" title=""><?=$blog->tieu_de?></a></li>
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
                    <div class="blog-section details">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 mgs-btm-60">
                                <div class="blog no-margin wow fadeInUp animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <div class="blog-img">
                                        <img src="images/<?=$blog->anh_dai_dien?>" alt="">
                                    </div>
                                    <!--blog-img end-->
                                    <div class="blog-info bd-btm pd-btm-80">
                                        <ul class="blog-post-date">
                                            <li><i class="fa fa-user-o"></i><span>Đăng bởi <a href="#" title=""><?=$blog->nguoiDang->username?></a></span></li>
                                            <li><i class="fa fa-calendar-o"></i><span><?=$blog->ngay_dang?></span></li>
                                            <li><i class="fa fa-comment-o"></i><span>68</span></li>
                                        </ul>
                                        <h3><a href="#" title=""><?=$blog->tieu_de?></a></h3>
                                        <p><?=$blog->mo_ta_ngan?></p>
                                        <p><?=$blog->noi_dung?></p>
                                        <div class="widget-tags style2">
                                            <h3 class="tgs-hd">Post Tags:</h3>
                                            <ul>
                                                <li><a href="#" title="">Fashion</a></li>
                                                <li><a href="#" title="">Accessories</a></li>
                                                <li><a href="#" title="">Shop</a></li>
                                                <li><a href="#" title="">Bags</a></li>
                                            </ul>
                                        </div>
                                        <div class="share-links">
                                            <h3 class="tgs-hd">Share:</h3>
                                            <ul>
                                                <li><a href="#" title=""><i class="fa fa-vimeo"></i></a></li>
                                                <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title=""><i class="fa fa-pinterest-p"></i></a></li>
                                            </ul>
                                        </div>
                                        <!--share-links end-->
                                    </div>
                                    <!--blog-info end-->
                                </div>
                                <!--blog end-->
                                <!--comments-section end-->
                                <div class="contact-form wow fadeInDown animated" data-wow-delay="500ms" data-wow-duration="1500ms">
                                    <h3 class="sub-heading">post a comment</h3>
                                    <p class="success alert alert-success" id="success" style="display:none;"></p>
                                    <p class="error alert alert-danger" id="error" style="display:none;"></p>
                                    <form name="contact_form_3" id="contact_form_3" method="post">
                                        <input type="hidden" name="axn" value="contact_3">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <input type="text" name="username" id="username" placeholder="Name">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="email" id="email" placeholder="Email">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="Website" placeholder="Website">
                                            </div>
                                            <div class="col-lg-12">
                                                <textarea name="description" id="description" placeholder="Message"></textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="button" id="submit_3">Send Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--blog-section end-->
                </div>
            </div>
        </section>
    </div>