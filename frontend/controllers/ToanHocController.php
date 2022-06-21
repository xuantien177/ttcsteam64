<?php


namespace frontend\controllers;


use yii\web\Controller;

class ToanHocController extends Controller
{
    public function actionCongHaiSo(){
        return $this->render("_form_cong_hai_so",[
            'a1' => rand(1,1000),
            'b1' => rand(2,2000)
            ]);
    }
}