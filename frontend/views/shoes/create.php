<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Shoes */

$this->title = 'Create Shoes';
$this->params['breadcrumbs'][] = ['label' => 'Shoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
