<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\shop\ShopTags;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\shop\TagsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shop Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-tags-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shop Tags', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    [
                        'attribute' => 'name',
                        'value' => function (ShopTags $model) {
                            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'slug',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
