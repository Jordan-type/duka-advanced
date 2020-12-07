<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Images */
/* @var $form ActiveForm */
?>
<div class="addimage">

    <?php $form = ActiveForm::begin(['id' => 'create-image'],[
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

        <?= $form->field($model, 'img_path')->fileInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'shoe_id')->hiddenInput(['value' => $shoe_id]) ->label(false) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addimage -->
