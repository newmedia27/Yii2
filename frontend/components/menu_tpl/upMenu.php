<!--Up dropDownMenuCategories-->


<li class="dropdown">
	<?php if ($category['sort']!=0):?>
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $category['name'] ?> <b class="caret"></b></a>
	<ul class="dropdown-menu multi-column columns-1">
		<div class="row">
			<?php if (isset($category['child'])): ?>
				<?php foreach ($category['child'] as $child): ?>
					
					<ul class="multi-column-dropdown">


						<h6>
							<li>
								<a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $child['id']]) ?>"><?= $child['name'] ?></a>
							</li>
						</h6>
					</ul>
				
				<?php endforeach; ?>
			<?php endif; ?>

			<div class="clearfix"></div>
		</div>
	</ul>
	<?php endif;?>
</li>