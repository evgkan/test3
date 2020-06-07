<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['/site/products']];
$this->params['breadcrumbs'][] = ['label' => $model->product->name, 'url' => ['/site/product', 'slug' => $model->product->slug]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model->product,
        'attributes' => [
            'id',
            'slug',
            'name',
            'description:ntext',
            'cost',
            'cost_old',
            [
                'label' => 'Модификация',
                'value' => $model->name,
            ],
        ],
    ]) ?>

</div>
