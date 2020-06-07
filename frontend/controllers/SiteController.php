<?php

namespace frontend\controllers;

use common\models\Product;
use common\models\ProductSearch;
use Yii;
use yii\web\Controller;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionProducts()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['cost' => SORT_ASC]
        ]);

        return $this->render('productList', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionProduct($slug)
    {
        $model = Product::find()->where(['slug' => $slug])->one();
        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('productView', [
            'model' => $model,
        ]);
    }


    public function actionProductModification($slug, $modId)
    {
        /** @var Product $product */
        $product = Product::find()->where(['slug' => $slug])->one();
        if (!$product) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $model = $product->getModifications()->where(['id' => $modId])->one();
        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('productModificationView', [
            'model' => $model,
        ]);

    }


    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

}
