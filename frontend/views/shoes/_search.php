<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ShoesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shoes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'shoe_id') ?>

    <?= $form->field($model, 'shoe_name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'shoe_type') ?>

    <?= $form->field($model, 'cat_id') ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <?php // echo $form->field($model, 'shoe_size') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'img_path') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
