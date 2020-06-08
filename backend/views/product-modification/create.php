<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products array */
/* @var $model common\models\ProductModification */

$this->title = 'Создание модификации';
$this->params['breadcrumbs'][] = ['label' => 'Модификации', 'url' => ['/product-modification']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-modification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'products' => $products,
        'model' => $model,
    ]) ?>

</div>
