<?php


?>
<!-- content-section-starts -->
<div class="container">
	<div class="products-page">
		<div class="products">
			<!--			LEFT MENU-->
			<div class="product-listy">
				<h2>Категории</h2>
				<ul class="product-list">
					<?= \frontend\components\MenuWidget::widget(['tpl' => 'leftMenu']) ?>
				</ul>
			</div>

			<!--			LEFT MENU END-->
			<div class="latest-bis">
				<img src="/images/l4.jpg" class="img-responsive" alt=""/>
				<div class="offer">
					<p>40%</p>
					<small>Top Offer</small>
				</div>
			</div>
			<div class="tags">
				<h4 class="tag_head">Tags Widget</h4>
				<ul class="tags_links">
					<li><a href="#">Kitesurf</a></li>
					<li><a href="#">Super</a></li>
					<li><a href="#">Duper</a></li>
					<li><a href="#">Theme</a></li>
					<li><a href="#">Men</a></li>
					<li><a href="#">Women</a></li>
					<li><a href="#">Equipment</a></li>
					<li><a href="#">Best</a></li>
					<li><a href="#">Accessories</a></li>
					<li><a href="#">Men</a></li>
					<li><a href="#">Apparel</a></li>
					<li><a href="#">Super</a></li>
					<li><a href="#">Duper</a></li>
					<li><a href="#">Theme</a></li>
					<li><a href="#">Responsive</a></li>
					<li><a href="#">Women</a></li>
					<li><a href="#">Equipment</a></li>
				</ul>

			</div>

		</div>
		
		<?php
			$mainImg = $product->getImage();
			$gallery = $product->getImages();
		?>

		<div class="new-product">
			<div class="col-md-5 zoom-grid">
				<div class="flexslider">
					<ul class="slides">
						<?php $i = 0;
							foreach ($gallery as $item): ?>
								
								<?php if ($i < 3): ?>

									<li data-thumb="<?= $item->getUrl() ?>">

										<div class="thumb-image">
											
											<?= \yii\helpers\Html::img($item->getUrl(), ['data-imagezoom' => 'true', 'class' => 'img-responsive', 'alt' => $product['name']]) ?>

										</div>
									</li>
									<?php $i++; ?>
								<?php endif; ?>
							<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-7 dress-info">


				<div class="dress-name">
					<h3><?= $product['name'] ?></h3>
					<span>$<?= $product['price'] ?></span>
					<div class="clearfix"></div>

					<span class="dress-name-span">Quantity:</span>
					<input id="quantity" type="text" value="1">
					<a href="#" class="cbp-vm-icon cbp-vm-add item_add" data-id="<?= $product['id'] ?>">Add to cart</a>
					<div class="clearfix"></div>
					<p><?= $product['content'] ?></p>
				</div>
				<div class="span span1">
					<p class="left">FABRIC ORIGIN</p>
					<p class="right">Japan</p>
					<div class="clearfix"></div>
				</div>
				<div class="span span2">
					<p class="left">MADE IN</p>
					<p class="right">China</p>
					<div class="clearfix"></div>
				</div>
				<div class="span span3">
					<p class="left">COLOR</p>
					<p class="right">White</p>
					<div class="clearfix"></div>
				</div>
				<div class="span span4">
					<p class="left">SIZE</p>
					<p class="right"><span class="selection-box"><select class="domains valid" name="domains">
										   <option>M</option>
										   <option>L</option>
										   <option>XL</option>
										   <option>FS</option>
										   <option>S</option>
									   </select></span></p>
					<div class="clearfix"></div>
				</div>
				<div class="purchase">
					<a href="#">Purchase Now</a>
					<div class="social-icons">
						<ul>
							<li><a class="facebook1" href="#"></a></li>
							<li><a class="twitter1" href="#"></a></li>
							<li><a class="googleplus1" href="#"></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>

				<script>
                    // Can also be used with $(document).ready()
                    $(window).load(function () {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
				</script>
			</div>
			<div class="clearfix"></div>
			<div class="reviews-tabs">


				<!-- Main component for a primary marketing message or call to action -->
				<ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
					<li class="test-class active"><a class="deco-none misc-class" href="#how-to"> Подробнее</a>
					</li>
					<li class="test-class"><a href="#features">Спецификация</a></li>
<!--					<li class="test-class"><a class="deco-none" href="#source">Reviews (7)</a></li>-->
				</ul>

				<div class="tab-content responsive hidden-xs hidden-sm">
					<div class="tab-pane active" id="how-to">
						<p class="tab-text">Maecenas mauris velit, consequat sit amet feugiat rit, elit vitaeert
											scelerisque elementum, turpis nisl accumsan ipsum Lorem Ipsum is simply
											dummy text of the printing and typesetting industry. and scrambled it to
											make a type specimen book. It has survived Auction your website on Flippa
											and you'll get the best price from serious buyers, dedicated support and a
											much better deal than you'll find with any website broker. Sell your site
											today I need a twitter bootstrap 3.0 theme for the full-calendar plugin. it
											would be great if the theme includes the add event; remove event, show event
											details. this must be RESPONSIVE and works on mobile devices. Also, I've
											seen so many bootstrap themes that comes up with the fullcalendar plugin.
											However these . </p>
					</div>
					<div class="tab-pane" id="features">
						<p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh
											urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat
											suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin
											nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur
											nibh quis urna gravida mollis.This tab has icon in consectetur adipiscing
											eliconse consectetur adipiscing elit. Vestibulum nibh urna, ctetur
											adipiscing elit. Vestibulum nibh urna, t.consectetur adipiscing elit.
											Vestibulum nibh urna, Vestibulum nibh urna,it.</p>
						<p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many
											variations of passages of Lorem Ipsum available,
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class="tab-pane" id="source">
						<div class="response">
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Username</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many
									   variations of passages of Lorem Ipsum available,
									   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>MARCH 21, 2015</li>
										<li><a href="single.html">Reply</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Username</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many
									   variations of passages of Lorem Ipsum available,
									   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>MARCH 26, 2054</li>
										<li><a href="single.html">Reply</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Username</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many
									   variations of passages of Lorem Ipsum available,
									   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>MAY 25, 2015</li>
										<li><a href="single.html">Reply</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Username</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many
									   variations of passages of Lorem Ipsum available,
									   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>FEB 13, 2015</li>
										<li><a href="single.html">Reply</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Username</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many
									   variations of passages of Lorem Ipsum available,
									   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>JAN 28, 2015</li>
										<li><a href="single.html">Reply</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Username</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many
									   variations of passages of Lorem Ipsum available,
									   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>APR 18, 2015</li>
										<li><a href="single.html">Reply</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Username</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many
									   variations of passages of Lorem Ipsum available,
									   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>DEC 25, 2014</li>
										<li><a href="single.html">Reply</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="other-products products-grid">
	<div class="container">
		<header>
			<h3 class="like text-center">Популярные товары</h3>
		</header>
		
		
		<?php foreach ($hits as $hit): ?>
			<?php $img = $hit->getImage() ?>
			<div class="col-md-4 product simpleCart_shelfItem text-center">
				<a href="<?= \yii\helpers\Url::to(['product/index', 'id' => $hit['id']]) ?>"><?= \yii\helpers\Html::img("{$img->getUrl('350x438')}", ['alt' => $hit['name']]) ?></a>

				<div class="mask">
					<a href="<?= \yii\helpers\Url::to(['product/index', 'id' => $hit['id']]) ?>">Quick View</a>
				</div>
				<a class="product_name" href="single.html"><?= $hit['name'] ?></a>
				<p><a class="item_add" href="#" data-id="<?= $hit['id'] ?>"><i></i> <span
								class="item_price">$<?= $hit['price'] ?></span></a></p>
			</div>
		<?php endforeach; ?>


		<div class="clearfix"></div>
	</div>
</div>
<!-- content-section-ends -->
<div class="news-letter">
	<div class="container">
		<div class="join">
			<h6>JOIN OUR MAILING LIST</h6>
			<div class="sub-left-right">
				<form>
					<input type="text" value="Enter Your Email Here" onfocus="this.value = '';"
						   onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}"/>
					<input type="submit" value="SUBSCRIBE"/>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>



