<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;

Class LoginController extends Controller {

    /**
     * 登陆路由
     * @return [type] [deception]
     */
    public function actionIndex()
    {
        return $this->renderPartial("@app/views/zhibo/login/login");
    }


}