<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\shop\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shop Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shop Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'created_at',
            'code',
            'name',
            //'description:ntext',
            //'price_old',
            //'price_new',
            //'rating',
            //'meta_json:ntext',
            //'main_photo_id',
            //'status',
            //'weight',
            //'quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
