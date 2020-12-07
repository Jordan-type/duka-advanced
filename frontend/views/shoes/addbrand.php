<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ShoeBrand */
/* @var $form ActiveForm */
?>
<div class="addbrand">

    <?php $form = ActiveForm::begin(['id' => 'create-brand'],[
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

        <?= $form->field($model, 'brand_name') ?>
        <?= $form->field($model, 'brand_logo')->fileInput(['maxlength' => true]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addbrand -->
