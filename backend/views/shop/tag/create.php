<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\shop\ShopTags */

$this->title = 'Create Shop Tags';
$this->params['breadcrumbs'][] = ['label' => 'Shop Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-tags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
