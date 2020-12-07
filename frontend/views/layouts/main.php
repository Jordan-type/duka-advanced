<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


 <nav class="navbar nav-boot navbar-expand-lg fixed-top navbar-light bg-light navbar-fixed">
        <a class="navbar-brand" href="<?= Url::to(['site/index'])?>">Viatu Duka</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="container">

          <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= Url::to(['site/index'])?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= Url::to(['site/women'])?>">Women</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= Url::to(['site/men'])?>">Men</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= Url::to(['site/kids'])?>">Kids</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accessories</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Socks</a>
                <a class="dropdown-item" href="#">piercings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">stockings</a>
              </div>
            </li>
          </ul>
          <form action="<?= Url::to(['shoes/shoesearch']) ?>" class="form-inline rounded-pill ml-5">
            <input class="form-control form-control-sm border-primary rounded-pill mr-2 w-85 search-inp" type="text" placeholder="Search"
        name="keyword"
        value="<?= Yii::$app->request->get('keyword') ?>"
        aria-label="Search">
   <button class="btn btn-outline-primary btn-sm rounded-pill"><i class="fa fa-search" aria-hidden="true"></i></button>
        
 </form>
        </div>
      </div>
      <!-- ! search-cart-nav -->
      <div class="search-cart-nav pull-right">
        <ul class="navbar-nav mr-auto right">
          <!--/.search-->
          <li class="nav-item dropdown dropleft">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown dropdownMenuOffset">
              <a class="dropdown-item" href="<?= Url::to(['site/Profile'])?>">Profile</a>
              <a class="dropdown-item" href="<?= Url::to(['site/login'])?>">Login</a>
              <a class="dropdown-item" href="<?= Url::to(['site/signup'])?>">Signup</a>
              <a class="dropdown-item" href="<?= Url::to(['shoes/create'])?>">Add Shoes</a>
              <a class="dropdown-item" href="#">Account</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= Url::to(['/site/logout'])?>">Logout</a>
            </div>
          </li>
          <li class="nav-item dropdown dropleft">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown dropdownMenuOffset">
              <a class="dropdown-item" href="#">Item(s)  <span class="centered">Quality</span> <span class="pull-right">Price</span></a>
              <a class="dropdown-item" href="#">Vans 1   <span class="centered">1</span><span class="pull-right">200</span></a>
              <a class="dropdown-item" href="#">Jordan x <span class="centered">1</span> <span class="pull-right">200</span></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Total price <span class="pull-right">400</span></a>
            </div>
          </li>
        </ul>
      </div> 
      <!-- end search -->
    </nav>
    <!-- end navigation -->

    <div class="container-fluid top-margin">
        <?= $content ?>
    </div>
    <!-- footer -->
<footer class="footer">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-2 col-sm-6 col-xs-12">
            <ol class="text-left footer-two">
            <h3 class="text-left">My acount</h3>            
              <li>sign-in</li>
              <li>Register</li>
              <li>Order status</li>
            </ol>  
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <ol class="text-left footer-two">
              <h3 class="text-left">Legal</h3>
              <li>Terms of use</li>
              <li>Terms of sale</li>
              <li>Privacy policy</li>
            </ol>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <ol class="text-left footer-two">
              <h3 class="text-left">Shipping</h3>
              <li>Returns</li>
              <li>Sizing</li>
              <li>Pick up</li>
            </ol>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <ol class="text-left footer-two">
              <h3 class="text-left">Our Story</h3>
              <li>sign-in</li>
              <li>Sustainability</li>
            </ol>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <h3 class="text-center footer-two">Follow Us</h3>
            <ol class="socials text-center">
              <a href=""><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-twitter fa-3x" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
            </ol>
          </div>
        </div>
        </div>
    </div>
    <div class="copyright">
      <p class="text-center"> &copy; 2020  Viatu Duka Inc. All Rights Reserved</p>
    </div> 
</footer>

<?php $this->endBody() ?>
    <!-- scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
<?php $this->endPage() ?>
