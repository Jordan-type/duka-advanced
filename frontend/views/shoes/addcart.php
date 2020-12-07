<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Shoes;
use common\models\user;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cart */
/* @var $form ActiveForm */
// ->where(['status'=>0])

$shoe = ArrayHelper::map(Shoes::find()->all(), 'shoe_id', 'price');
$user_id = user::find()->where(['id'=>Yii::$app->user->id])->one();
// $shoes = ArrayHelper::map(Shoes::find()->all(), 'shoes_id', 'shoe_name', 'price');

?>


<div class="top-margin-items">

    <?php $form = ActiveForm::begin(['id' => 'add-cart']); ?>

    <div class="form-row">
    	<div class="col-md-4">
    		<?= $form->field($model, 'shoe_id')->hiddenInput(['value' => $shoe_id, 'readonly'=> true])->label(false) ?>
    			
    		</div>
    		<div class="form-group col-md-4">
    			<?= $form->field($model, 'user_id')->hiddenInput(['value'=>$user_id->id, 'readonly'=> true])->label(false) ?>
    		</div>
        </div>            
        <div class="form-group">
            <?= Html::submitButton('Save to Cart', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addcart -->
