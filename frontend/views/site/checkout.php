<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\models\Shoes;
use frontend\models\Images;
use frontend\models\Cart;




?>


 <!-- start checkout -->
    <section class="container-fluid top-margin-checkout">
    	<div class="row">
    		<div class="col-md-8">
    			<div class="card">
    				<div class="card-body">
    					<h3 class="card-title">Billing Address</h3>
    				<!--  -->
    					<form>
    						<div class="form-row">
    							<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="fname" name="firstname" placeholder="John M. Doe">	
    						</div>
    						<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="email" name="email" placeholder="john@example.com">
    						</div>
    						<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="adr" name="address" placeholder="542 W. 15th Street">
    						</div>
    						</div>
    						<!--  -->
    						<div class="form-row">
    							<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="city" name="city" placeholder="Nairobi">
    						</div>
    						<div class="form-group col-md-4">
    							<input class="form-control"  type="text" id="state" name="state" placeholder="Knairo">
    						</div>
    						<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="zip" name="zip" placeholder="10001">
    						</div>
    						</div>
    						<!--  -->
    						</form>
    					</div>
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
    				
    				<form>
    					<!--  -->
    					<div class="form-row">
    							<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="cname" name="cardname" placeholder="card name">
    						</div>
    						<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
    						</div>
    						<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="zip" name="zip" placeholder="10001">
    						</div>
    						</div>
    						<!--  -->
    						<div class="form-row">
    							<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="expyear" name="expyear" placeholder="expires 2018">
    						</div>
    						<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="expmonth" name="expmonth" placeholder="September">
    						</div>
    						<div class="form-group col-md-4">
    							<input class="form-control" type="text" id="cvv" name="cvv" placeholder="352">
    						</div>
    						</div>

    						<div class="form-row">
    							<div class="form-group col-md-4">
    							<label class="" for="fname">Lipa na Mpesa</label>
    							<input class="form-control" type="text" id="phone_number" name="expyear" placeholder="07XX-XXX-XXX">
    						</div>
    						<div class="form-group col-md-4">
    							<label>Confirmation Code</label>
    							<input class="form-control" type="text" id="mpesa_code" name="mpesa_code" placeholder="00000">
    						</div>
    						</div>
    						<button class="btn btn-primary btn-lg pull-right">continue to checkout</button>

    				</form>
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
    							<b>4</b>
    						</span>
    					</h4>
    					<hr>
    					<div class="row">
    						<div class="col-md-6">  						
    					<p><a href="#">Product 1</a> <span class="price-cart">$15</span></p>
    					<p><a href="#">Product 2</a> <span class="price-cart">$5</span></p>
    					<p><a href="#">Product 3</a> <span class="price-cart">$8</span></p>
    					<p><a href="#">Product 4</a> <span class="price-cart">$2</span></p>
    					
    					
    				</div>
    						
    					</div>
    					
    				<hr>
    					<p>Total <span class="price-cart" style="color:black"><b>$30</b></span></p>
    					
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <!-- end checkout -->