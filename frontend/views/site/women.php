<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\models\Shoes;
use frontend\models\Images;
use frontend\models\ShoeCategory;


$shoe_list_women = Shoes::find()->where(['cat_id'=> 2])->joinWith('images')->all();


?>
<!--women listing -->
     <div class="container-fluid top-margin">
        <div class="row">
            <div class="col-md-2">
                  Search by:
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="" class="form-control" placeholder="search...">

                    </div>
                    <div class=" col-md-4 pull-right">
                        <button class="btn btn-success">Search</button>
                    </div>
                </div>
                <br>
                Filter by:
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        Size
                    </div>
                    <div class=" col-md-4 pull-right">
                        <i class="fa fa-plus plus-grey" aria-hidden="true"></i>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        Brand </div>
                    <div class=" col-md-4 pull-right">
                        <i class="fa fa-plus plus-grey" aria-hidden="true"></i>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        Price
                    </div>
                    <div class=" col-md-4 pull-right">
                        <i class="fa fa-plus plus-grey" aria-hidden="true"></i>
                    </div>
                </div>
                <hr>
            </div>
            <!-- filleters -->
            <div class="col-md-10" style="margin-top: 40px;">
                <h4>Women's shoes</h4>
                <div class="row">
                    <div class="col-md-10" style="margin-top: 30px;">
                        <div class="row">
                        	<?php foreach ($shoe_list_women as $women) {?>
                            <div class="col-md-4">
                                <!-- Card -->
                                <div class="card promoting-card" style="width: 18rem;">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img class="card-img-top rounded-0 img-fluid" src="<?= Yii::$app->request->baseUrl.'/'.$women->images[0]->img_path?>" alt="">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <!-- Card content -->
                                    <div class="card-body">

                                        <div class="collapse-content">
                                            <h2 class="card-title text-center"><?=$women->shoe_name ?></h2>
                                            <p class="lead text-center">Ksh: <?=$women->price ?></p> 
                                            <div class="text-center">
                                                <a href="#" class="btn btn-primary text-center">Add to cart</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            
                                <!-- Card -->
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
