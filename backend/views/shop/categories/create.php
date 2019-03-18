<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\shop\ShopCategories */

$this->title = 'Create Shop Categories';
$this->params['breadcrumbs'][] = ['label' => 'Shop Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
