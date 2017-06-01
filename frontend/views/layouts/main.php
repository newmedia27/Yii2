<?php
	
	/* @var $this \yii\web\View */
	/* @var $content string */
	
	use frontend\assets\AppAsset;
	use frontend\assets\TopAsset;
	use yii\bootstrap\Modal;
	use yii\helpers\Html;
	
	AppAsset::register($this);
	TopAsset::register($this);
	
	/**
	 * up scripts libs
	 */

?>
<?php $this->beginPage() ?>

	<!DOCTYPE html>

	<html lang="<?= Yii::$app->language ?>">
	<head>
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>


		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<?php $this->head() ?>
	</head>
	<body>
	<?php $this->beginBody() ?>
	<!-- header-section-starts -->

	<div class="header">
		<div class="header-top-strip">
			<div class="container">


				<div class="header-top-left">
<!--					<ul>-->
<!--						--><?php //if (Yii::$app->user->isGuest): ?>
<!--							<li><a href="--><?//= \yii\helpers\Url::to(['site/login']) ?><!--"><span-->
<!--											class="glyphicon glyphicon-user"> </span>Login</a></li>-->
<!--						--><?php //endif; ?>
<!--						<!--**********For autorisation***********-->-->
<!--						-->
<!--						--><?php //if (!Yii::$app->user->isGuest): ?>
<!--							<li><a href="--><?//= \yii\helpers\Url::to(['site/logout']) ?><!--"><span-->
<!--											class="glyphicon glyphicon-user"> </span>Выход-->
<!--																					 (--><?//= Yii::$app->user->identity['username'] ?>
<!--																					 )</a></li>-->
<!--						--><?php //endif; ?>
<!--						-->
<!--						--><?php //if (Yii::$app->user->isGuest): ?>
<!--							<li><a href="register.html"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a>-->
<!--							</li>-->
<!--						--><?php //endif; ?>
<!--						--><?php //if (!Yii::$app->user->isGuest && Yii::$app->user->identity['role'] == 100): ?>
<!--							<li><a href="http://backend/"> </span>Go to Admin</a>-->
<!--							</li>-->
<!--						--><?php //endif; ?>
<!--					</ul>-->
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<a href="#" onclick="return getCart()">
							<h3><span class="simpleCart_total"> $ 0</span> (<span id="simpleCart_quantity"
																				  class="simpleCart_quantity"> 0 </span>)<img
										src="/images/bag.png" alt=""></h3>
						</a>
						<p><a onclick="return clearCart()" href="#" class="simpleCart_empty">Empty cart</a></p>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
	<div class="banner-top">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="logo">
						<h1><a href="<?= \yii\helpers\Url::home() ?>"><span>E</span> -Shop</a></h1>
					</div>
				</div>
				<!-- navbar-header-->

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href=<?= \yii\helpers\Url::home() ?>>Home</a></li>
					
									
									
									<?= \frontend\components\MenuWidget::widget(["tpl" => "upMenu"]) ?>
						
						</li>
						
						

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">search<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-1">
								<div class="row">
									<div class="col-sm-6">
										<ul class="multi-column-dropdown">

											<li>
												<form class="form-search" method="get"
													  action="<?= \yii\helpers\Url::to(['category/search']) ?>">
													<input type="text" class="input-medium search-query" name="search" style="margin-left: 2px;">
													<!--													<button type="submit" class="btn">Найти</button>-->
												</form>
											</li>

										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<!--						<li><a href="typography.html">TYPO</a></li>-->
						<li><a href="contact.html">CONTACT</a></li>
					</ul>

					<div class="clearfix"></div>
				</div>
				<!--/.navbar-collapse-->
			</nav>
			<!--/.navbar-->
		</div>
	</div>
	
	
	<?= $content; ?>


	<div class="footer">
		<div class="container">
			<div class="footer_top">
				<div class="span_of_4">
					<div class="col-md-3 span1_of_4">
						<h4>Shop</h4>
						<ul class="f_nav">
							<li><a href="#">new arrivals</a></li>
							<li><a href="#">men</a></li>
							<li><a href="#">women</a></li>
							<li><a href="#">accessories</a></li>
							<li><a href="#">kids</a></li>
							<li><a href="#">brands</a></li>
							<li><a href="#">trends</a></li>
							<li><a href="#">sale</a></li>
							<li><a href="#">style videos</a></li>
						</ul>
					</div>
					<div class="col-md-3 span1_of_4">
						<h4>help</h4>
						<ul class="f_nav">
							<li><a href="#">frequently asked questions</a></li>
							<li><a href="#">men</a></li>
							<li><a href="#">women</a></li>
							<li><a href="#">accessories</a></li>
							<li><a href="#">kids</a></li>
							<li><a href="#">brands</a></li>
						</ul>
					</div>
					<div class="col-md-3 span1_of_4">
						<h4>account</h4>
						<ul class="f_nav">
							<li><a href="account.html">login</a></li>
							<li><a href="register.html">create an account</a></li>
							<li><a href="#">create wishlist</a></li>
							<li><a href="checkout.html">my shopping bag</a></li>
							<li><a href="#">brands</a></li>
							<li><a href="#">create wishlist</a></li>
						</ul>
					</div>
					<div class="col-md-3 span1_of_4">
						<h4>popular</h4>
						<ul class="f_nav">
							<li><a href="#">new arrivals</a></li>
							<li><a href="#">men</a></li>
							<li><a href="#">women</a></li>
							<li><a href="#">accessories</a></li>
							<li><a href="#">kids</a></li>
							<li><a href="#">brands</a></li>
							<li><a href="#">trends</a></li>
							<li><a href="#">sale</a></li>
							<li><a href="#">style videos</a></li>
							<li><a href="#">login</a></li>
							<li><a href="#">brands</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="cards text-center">
				<img src="/images/cards.jpg" alt=""/>
			</div>
			<div class="copyright text-center">
				<p>© 2015 E Shop. All Rights Reserved | Design by <a href="http://w3layouts.com"> W3layouts</a></p>
			</div>
		</div>
	</div>

	<!--	modal window for Cart-->
	
	<?php
		Modal::begin([
			'header' => '<h2>Корзина</h2>',
			'id' => 'modal-cart',
			'size' => 'modal-lg',
			'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжаем шоппинг =)</button>
<a href="' . \yii\helpers\Url::to(['cart/']) . '" type="button" class="btn btn-primary">Оформляемся =)</a><button type="button" class="btn btn-success" onclick="clearCart()">Clear</button>',
		
		]);
		
		
		Modal::end();
	?>
	
	<?php $this->endBody() ?>

	</body>
	</html>
<?php $this->endPage() ?>