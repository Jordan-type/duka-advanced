<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\ShoeBrand;
use frontend\models\ShoeCategory;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\modal;


/* @var $this yii\web\View */
/* @var $model frontend\models\Shoes */
/* @var $form yii\widgets\ActiveForm */
$brand = ArrayHelper::map(ShoeBrand::find()->all(), 'brand_id', 'brand_name');
$category = ArrayHelper::map(ShoeCategory::find()->all(), 'cat_id', 'cat_name');
?>
<div class="container-fluid">
<div class="shoes-form">

    <?php $form = ActiveForm::begin(); ?>

   <div class="form-row">
    <div class="form-group col-md-4">
    <?= $form->field($model, 'shoe_name')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-md-4">
       <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?> 
    </div>

   <div class="form-group col-md-4">
    <?= $form->field($model, 'shoe_type')->textInput(['maxlength' => true]) ?>
</div>
</div>
<div class="form-row">
    <div class="form-group col-md-8">
    <?= $form->field($model, 'cat_id')->dropDownList($category, ['placeholder'=>'Select Shoe Category']) ?> 
    </div>
    <div class="col-md-4" style="margin-top: 30px;">
        <button type="button" class="btn btn-block btn-success addcategory"><i class="fa fa-plus" aria-hidden="true"></i> Add Shoe Category</button>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-8">
        <?= $form->field($model, 'brand_id')->dropDownList($brand) ?>
    </div>
    <div class="col-md-4" style="margin-top: 30px;">
        <button type="button" class="btn btn-block btn-success addbrand"><i class="fa fa-plus" aria-hidden="true"></i> Add Shoe Brand</button>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">

    <?= $form->field($model, 'shoe_size')->textInput(['maxlength' => true]) ?>
</div>
<div class="form-group col-md-4">
    <?= $form->field($model, 'price')->textInput() ?>
</div>
</div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>

<?php
Modal::begin([
  'title'=>'<h4>Add Category</h4>',
  'id'=>'addcategory',
  'size'=>'modal-lg'
  ]);
echo "<div id='addcategoryContent'></div>";
Modal::end();
?>

<?php
Modal::begin([
  'title'=>'<h4>Add Brand</h4>',
  'id'=>'addbrand',
  'size'=>'modal-lg'
  ]);
echo "<div id='addbrandContent'></div>";
Modal::end();
?>
