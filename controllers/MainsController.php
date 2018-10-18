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
        return $this->renderPartial("@app/views/zhibo/main/index");
    }

    /**
     * 直播页面
     * @return [type] [deception]
     */
    public function actionDetail()
    {
        return $this->renderPartial("@app/views/zhibo/main/detail");
    }


}