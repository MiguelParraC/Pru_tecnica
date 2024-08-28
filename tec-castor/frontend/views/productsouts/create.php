<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ProductsOuts $model */

$this->title = Yii::t('app', 'Create Products Outs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products Outs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-outs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
