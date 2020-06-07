<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['/site/products']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'name',
            'description:ntext',
            'cost',
            'cost_old',
        ],
    ]) ?>

    <h3>Модификации товара</h3>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>ID</th>
            <th>Название</th>
        </tr>

        <?php foreach ($model->modifications as $modification): ?>

            <tr>
                <td><?= $modification->id ?></td>
                <td>
                    <a href="<?= \yii\helpers\Url::to(['/site/product-modification', 'slug' => $model->slug, 'modId' => $modification->id]) ?>">
                        <?= $modification->name ?>
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>

</div>
