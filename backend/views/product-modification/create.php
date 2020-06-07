<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products array */
/* @var $model common\models\ProductModification */

$this->title = 'Create Product Modification';
$this->params['breadcrumbs'][] = ['label' => 'Product Modifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-modification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'products' => $products,
        'model' => $model,
    ]) ?>

</div>
