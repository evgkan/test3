<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'slug',
            //'name',
            [
                'class' => \yii\grid\DataColumn::class,
                'attribute' => 'name',
                'value' => function ($model) {
                    $link = \yii\helpers\Url::to(['/site/product', 'slug' => $model->slug]);
                    return "<a href='$link'>{$model->name}</a>";
                },
                'format' => 'raw',
            ],
            'description:ntext',
            'cost',
            'cost_old',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
