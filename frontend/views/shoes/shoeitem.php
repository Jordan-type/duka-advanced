<?php

use yii\helpers\Url;

/** @var $model \frontend\models\Shoe */

?>
<a class="card-title" href="<?= echo Url::to(['shoes/view', 'id' => $model->shoe_id]) ?>">
    <div class="card">
        <img class="" src="<?= $model->getImageUrl() ?>" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><?php echo $model->shoe_name ?><br><?php 'Ksh.' .$model->price ?></h5> 
        </div>
    </div
</a>
