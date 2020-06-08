<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products array */
/* @var $model common\models\ProductModification */

$this->title = 'Редактирование модификации: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Модификации', 'url' => ['/product-modification']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="product-modification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'products' => $products,
        'model' => $model,
    ]) ?>

</div>
