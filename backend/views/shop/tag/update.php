<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\shop\ShopTags */

$this->title = 'Update Shop Tags: ' . $tag->name;
$this->params['breadcrumbs'][] = ['label' => 'Shop Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tag->name, 'url' => ['view', 'id' => $tag->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shop-tags-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
