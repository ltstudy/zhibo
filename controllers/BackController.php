<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;

Class BackController extends Controller {

    /**
     * 后台管理
     * @return [type] [deception]
     */
    public function actionIndex()
    {
        return $this->renderPartial("@app/views/zhibo/backend/live");
    }

    public function actionAdd()
    {
        echo 1111;
    }

}