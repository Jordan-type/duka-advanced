<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ShoeCategory */
/* @var $form ActiveForm */
?>
<div class="addcategory">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'cat_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addcategory -->
