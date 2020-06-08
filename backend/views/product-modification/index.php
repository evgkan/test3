<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductModificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Модификации товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-modification-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать модификацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            [
                'class' => \yii\grid\DataColumn::class,
                'label' => 'Название Товара',
                'value' => function ($data) {
                    return $data->product->name; // $data['name'] для массивов, например, при использовании SqlDataProvider.
                },
            ],
            [
                'label' => 'Модификация',
                'attribute' => 'name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
