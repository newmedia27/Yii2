<?php
	
	/* @var $this yii\web\View */
	use yii\helpers\Html;
	use yii\helpers\Url;

?>
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
		<div class="new-product">
			<div class="new-product-top">
				<ul class="product-top-list">
					<li><a href="/">Home</a>&nbsp;<span>&gt;</span></li>

					<!--		Bread crumbs			-->
					
					<?php if (isset($parentCategory)): ?>

						<li>
							<a href="<?= Url::to(['category/view', 'id' => $parentCategory['id']]) ?>"><?= $parentCategory['name'] ?></a>&nbsp;<span>&gt;</span>
						</li>
					
					<?php endif; ?>

					<li><span class="act"><?= $category['name'] ?></span>&nbsp;</li>
				</ul>
				<!--				<p class="back"><a href="-->
				<? //= Url::previous() ?><!--l">Back to Previous</a></p>-->

				<div class="clearfix"></div>
			</div>
			<div class="mens-toolbar">
				<div class="sort">
					<div class="sort-by">
						<label>Sort By</label>
						<select>
							<option value="">
								Position
							</option>
							<option value="">
								Name
							</option>
							<option value="">
								Price
							</option>
						</select>
						<a href=""><img src="/images/arrow2.gif" alt="" class="v-middle"></a>
					</div>
				</div>
				<?php if (!empty($products)): ?>
					<?= \yii\widgets\LinkPager::widget(['pagination' => $pages,]) ?>
				<?php endif; ?>


				<div class="clearfix"></div>
			</div>
			<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
				<div class="cbp-vm-options">
					<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid"
					   title="grid">Grid View</a>
					<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
				</div>
				<div class="pages">
					<div class="limiter visible-desktop">
						<label>Show</label>
						<select>
							<option value="" selected="selected">
								9
							</option>
							<option value="">
								15
							</option>
							<option value="">
								30
							</option>
						</select> per page
					</div>
				</div>
				<div class="clearfix"></div>
				<ul>

					<!--				PRODUCTS START-->
					
					<?php if (!empty($products)): ?>
					
					<?php foreach ($products as $product): ?>


					<li>
						<a class="cbp-vm-image" href="<?= Url::to(['product/index', 'id' => $product['id']]) ?>">
							<div class="simpleCart_shelfItem">
								<div class="view view-first">
									<div class="inner_content clearfix">
										<div class="product_image">
											
											<?= Html::img("{$product->getImage()->getUrl('256x320')}", ['alt' => $product['name'], 'class' => 'img-responsive']) ?>

											<div class="mask">
												<div class="info">Quick View</div>
											</div>
											<div class="product_container">
												<div class="cart-left">
													<p class="title"><?= $product['name'] ?></p>
												</div>
												<div class="pricey"><span
															class="item_price">$<?= $product['price'] ?></span></div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
						</a>
						<div class="cbp-vm-details">
							<?= $product['keywords'] ?>
						</div>
						<a data-id="<?= $product['id'] ?>" class="cbp-vm-icon cbp-vm-add item_add" href="#">Add to
																											cart</a>
			</div>
			</li>
			
			
			<?php endforeach; ?>
			
			
			
			<?php else: ?>

				<h3>Продукты на стадии добавления, зайдите позже пожалуйста!</h3>
			
			<?php endif; ?>
			<!--			PRODUCTS END-->


			</ul>
		</div>
		<div class="clearfix"></div>

		<!--					<span class="page1">Page:</span>-->
		<?php if (!empty($products)): ?>
			<?= \yii\widgets\LinkPager::widget(['pagination' => $pages,]) ?>
		<?php endif; ?>
	</div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
<!-- content-section-ends -->
<div class="other-products">
	<div class="container">
		<h3 class="like text-center">Новинки</h3>
		<ul id="flexiselDemo3">
			
			<?php foreach ($new as $value): ?>

				<li>
					<a href="<?= Url::to(['product/index', 'id' => $value['id']]) ?>"><?= Html::img("{$value->getImage()->getUrl('256x320')}", ['class' => 'img-responsive', 'alt' => $value['name']]) ?> </a>
					<div class="product liked-product simpleCart_shelfItem">
						<a class="like_name"
						   href="<?= Url::to(['product/index', 'id' => $value['id']]) ?>"><?= $value['name'] ?></a>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$<?= $value['price'] ?></span></a>
						</p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<script type="text/javascript">
            $(window).load(function () {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 4,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });

            });
		</script>
		<!--		<script type="text/javascript" src="/js/jquery.flexisel.js"></script>-->
	</div>
</div>
<!-- content-section-ends-here -->
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