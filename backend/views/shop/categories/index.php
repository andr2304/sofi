<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\shop\ShopCategories;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\shop\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shop Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-categories-index">
    <p>
        <?= Html::a('Create Shop Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'name',
                'value' => function (ShopCategories $model) {
                    $indent = ($model->depth > 1 ? str_repeat('&nbsp;&nbsp;', $model->depth - 1) . ' ' : '');
                    return $indent . Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'slug',
            'title',
            //'description:ntext',
            //'meta_json:ntext',
            //'lft',
            //'rgt',
            //'depth',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
