<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\shop\ShopTags */

$this->title = 'Update Shop Tags: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Shop Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shop-tags-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
