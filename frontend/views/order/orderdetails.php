<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Shoes;
use frontend\models\Cart;



$cart_list = Cart::find()->JoinWith('shoe')->all();
$cart_total = Cart::find()->asArray()->all();




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Your Duka orders Details</h2>
<img class="card-img-top rounded-0 img-fluid" src="img/blue-official.jpg" alt="">

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id',
            'user_id',
            'paymethod',
            'card_no',
        ],
    ]) ?>
    <h4>Order Items Total
        <span class="price-cart" style="color:black">
            <i class="fa fa-shopping-cart"></i>
            <b><?= count($cart_total)?></b>
        </span>
    </h4>
       <?php foreach ($cart_list as $cart){?>
        <button class="btn btn-danger price-cart" title="Click to delete product" >
            <i class="fa fa-trash-o" aria-hidden="true"></i>
        </button>
        <p class=""><a href="#">
            <?= $cart->shoe->shoe_name ?></a>
            <span class="price-cart">KSH. <?= $cart->shoe->price ?></span>
        </p><?php } ?>
                        </div>
<p>Thank you for shopping @Duka prototype</p>
</body>
</html>