<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\shop\ShopCharacteristics */

$this->title = 'Create Shop Characteristics';
$this->params['breadcrumbs'][] = ['label' => 'Shop Characteristics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-characteristics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
