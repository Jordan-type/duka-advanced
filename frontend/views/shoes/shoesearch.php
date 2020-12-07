<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */

?>
<h1 class="content-main">Found Shoes</h1>
<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class,
    ],
    'itemView' => 'shoeitem',
    'layout' => '<div class="col-sm-12 d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>