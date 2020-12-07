<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use frontend\models\ShoeBrand;

$popular_list = ShoeBrand::find()->all();



?>
<div class="row top-margin-items">
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img/welcome-men.jpg" class="card-img img-fluid" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Shoe Name</h5>
                  <p class="card-text lead">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-title lead"><del>Ksh 2000</del> <span>Ksh 1999</span></p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <!--  -->
                    <div class="form-group">
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <label for="formGroupExampleInput">Qty</label>
                        <span class="text-muted"><input class="form-control" type="number" value="1" /></span>
                        <a href="" class="btn btn-primary btn-lg pull-right" role="button">Add to Cart</a>
                      </li>
                    </div>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>

                </div>
              </div>
            </div>
          </div>
          <!-- tabs navigations -->
          <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="review" aria-selected="true">Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Add Reviews</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Reviews</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Add Reviews</div>
          </div>        
        </div>
        <!-- featured products -->
        <div class="col-md-4">
          <h4>Featured Products</h4>
          <hr>
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img/welcome-men.jpg" class="card-img img-fluid" alt="...">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h4 class="card-title">Shoe Name</h4>
                  <p class="card-text lead"><del>Ksh 2000</del> <span>Ksh 1999</span></p>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
          </div>
          </div>

           <h4>Popular Brands</h4>
          <hr>
          <div class="card mb-3">
            <div class="row no-gutters">
              <?php foreach ($popular_list as $popular){?>
              <div class="col-md-4">
                <img src="<?= Yii::$app->request->baseUrl.'/'.$popular->brand_logo ?>" class="card-img img-fluid" alt="brand_logo">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h4 class="card-title"><?= $popular->brand_name ?></h4>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
              <?php } ?>
          </div>
          </div>
        </div>        
      </div>