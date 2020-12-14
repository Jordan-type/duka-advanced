<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Shoes;
use common\models\user;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cart */
/* @var $form ActiveForm */
$shoe = ArrayHelper::map(Shoes::find()->all(), 'shoe_id', 'price');
$user_id = user::find()->where(['id'=>Yii::$app->user->id])->one();
?>
<div class="addtocart">

    <?php $form = ActiveForm::begin(['id' => 'add-cart']); ?>

        <?= $form->field($model, 'shoe_id')->hiddenInput(['value' => $shoe_id, 'readonly'=> true])->label(false) ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['value'=>$user_id->id, 'readonly'=> true])->label(false) ?>

        <div class="col-md-8">
              
            <div class="row no-gutters">
              <div class="col-md-6">
                <img src="img/welcome-men.jpg" class="card-img img-fluid" alt="...">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text lead">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-title lead"><del>Ksh 2000</del> <span>Ksh 1999</span></p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>

                </div>
              </div>
            </div>
              </div>
    
        <div class="form-group pull-right">
        	<?= Html::submitButton('Continue to Shop', ['class' => 'btn btn-danger']) ?>
            <?= Html::submitButton('Add to Cart', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addtocart -->
