<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;

Class MainsController extends Controller {

    /**
     * 直播页面
     * @return [type] [deception]
     */
    public function actionIndex()
    {
        return $this->renderPartial("@app/views/zhibo/main/detail");
    }

    public function actionServer()
    {
        echo 1111;
    }


}