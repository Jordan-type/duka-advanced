<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\ArrayHelper;

// $cat_list = ArrayHelper::index($shoes_cat, null, 'cat_id');




// $categories = ShoeCategory::findAll()->asArray()->all();

// var_dump($categories);
// exit();




/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ShoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shoes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shoes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shoes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
      

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shoe_id',
            'shoe_name',
            'description',
            'shoe_type',
            'cat_id',
            //'brand_id',
            //'shoe_size',
            //'price',
            //'img_path',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
