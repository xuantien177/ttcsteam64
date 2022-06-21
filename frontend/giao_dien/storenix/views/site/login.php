<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to login:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <?= Html::a('Đăng ký',\yii\helpers\Url::toRoute(['site/signup']) ,['class' => 'btn btn-primary']) ?>
                    <?= Html::a('<i class="fa fa-money"></i> Thanh toán không cần tài khoản',\yii\helpers\Url::toRoute(['site/thanh-toan','notlogin'=>'1']),[
                            'class'=>'btn btn-primary'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

