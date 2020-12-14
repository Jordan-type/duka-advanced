<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Shoes;
use frontend\models\Images;
use frontend\models\Cart;
use common\models\user;

$cart_list = Cart::find()->JoinWith('shoe')->all();
$cart_total = Cart::find()->asArray()->all();
$total_price = Cart::find()->JoinWith('shoe')->sum('price');
$user_id = user::find()->where(['id'=>Yii::$app->user->id])->one();

/* @var $this yii\web\View */
/* @var $model frontend\models\Order */
/* @var $form ActiveForm */
?>

</div><!-- order -->
 <!-- start checkout -->
    <section class="container-fluid top-margin-checkout">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    
                </div>
                <!-- payments accepted -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Payment</h3>
                        <label class="" for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'add-order']); ?>

        <?= $form->field($model, 'user_id')->hiddenInput(['value'=>$user_id->id, 'readonly'=> true])->label(false) ?>
                    <form>
                        <!--  -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <?= $form->field($model, 'paymethod') ?>
                            </div>
                            <div class="form-group col-md-4">
                                <?= $form->field($model, 'card_no') ?>
                            </div>
                           </div>
                         


                            <div class="form-group">
                                <?= Html::submitButton('continue to checkout', ['class' => 'btn btn-primary btn-lg pull-right']) ?>
                                    
                                </div>

                    </form>
                    <?php ActiveForm::end(); ?>
                 </div>
                </div>
                <!-- end payments -->
            </div>
            <!-- cart items -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Cart
                            <span class="price-cart" style="color:black">
                                <i class="fa fa-shopping-cart"></i>
                                <b><?= count($cart_total)?></b>
                            </span>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> 
                            <?php foreach ($cart_list as $cart){?>
                                <button class="btn btn-danger price-cart" title="Click to delete product" >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                                <p class=""><a href="#">
                                    <?= $cart->shoe->shoe_name ?></a>
                                    <span class="price-cart">KSH. <?= $cart->shoe->price ?></span>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <p>Total <span class="price-cart" style="color:black"><b>ksh.<?= $total_price ?></b></span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end checkout -->


