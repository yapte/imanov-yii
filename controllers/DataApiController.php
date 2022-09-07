<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;

class DataApiController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // $authenticatorWithoutBearer = $behaviors['authenticator'];
        // $behaviors['authenticator'] = ['class' => HttpBearerAuth::class];
        // $controllersWithoutBearer = ['auth', 'data', 'create-message'];
        // if (in_array(Yii::$app->controller->id, $controllersWithoutBearer)) {
        //     $behaviors['authenticator'] = $authenticatorWithoutBearer;
        // }

        // INSTEAD CORS FILTER. (MAY BE INSERTED TO web/index.php)
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, x-compress');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Request-Method: GET, PUT, PATCH, DELETE, HEAD, OPTIONS');



        // $behaviors['corsFilter'] = [
        //     'class' => Cors::class,
        //     // restrict access to
        //     'Origin' => ['http://localhost:4200'],
        //     // Allow only POST and PUT methods
        //     'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        //     // Allow only headers 'X-Wsse'
        //     'Access-Control-Request-Headers' => ['X-Wsse'],
        //     // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
        //     'Access-Control-Allow-Credentials' => true,
        //     // Allow OPTIONS caching
        //     'Access-Control-Max-Age' => 3600,
        //     // Allow the X-Pagination-Current-Page header to be exposed to the browser.
        //     'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],


        //     // 'cors' => [
        //     //     'Origin' => '*'
        //     //         // 'http://localhost:4200',
        //     //         // 'http://node-store.injini.ru'
        //     //     ,
        //     //     // 'Access-Control-Allow-Origin' => '*',
        //     //     'Access-Control-Allow-Credentials' => true,
        //     //     'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        //     //     'Access-Control-Allow-Headers' => ['Origin', 'Content-Type', 'Authorization', 'x-compress']
        //     // ],
        // ];

        return $behaviors;
    }

    public function actionCategories()
    {
        $categories = Category::find()->all();
        return Json::encode($categories);
    }

    public function actionProducts($category_id)
    {
        $category = Category::findOne($category_id);
        $products = Product::find()
            ->where(['category_id' => $category_id])
            ->all();

        return Json::encode([
            'category' => $category,
            'products' => $products,
        ]);
    }

    public function actionProductsItem($product_id)
    {
        $product = Product::findOne($product_id);
        return Json::encode($product);
    }
}
