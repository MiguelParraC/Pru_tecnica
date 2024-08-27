<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\ProductsPool $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-pool-form container mt-4">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'row g-3'], // Clases de Bootstrap 5 para el formulario y el espaciado entre filas
    ]); ?>

    <div class="row">
        <div class="offset-md-4 col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'onkeyup' => 'converToMayus(this); cuenta_mensaje(this,"contador-1")', 'class' => 'form-control bg-light border-primary']) ?>
            <div class="row">
                <div class="offset-md-4" id="contador-1>">0/255</div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'status')->dropDownList($model->list_status, ['class' => 'form-control bg-light border-primary']) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'class' => 'form-control bg-light border-primary']) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'stock')->textInput(['class' => 'form-control bg-light border-primary']) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'who_created')->textInput(['class' => 'form-control bg-light border-primary']) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'created_at')->textInput(['class' => 'form-control bg-light border-primary']) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'who_updated')->textInput(['class' => 'form-control bg-light border-primary']) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'updated_at')->textInput(['class' => 'form-control bg-light border-primary']) ?>
    </div>

    <div class="col-12 text-center">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>