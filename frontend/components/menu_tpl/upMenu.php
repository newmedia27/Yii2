<!--Up dropDownMenuCategories-->
<div class="col-sm-4">
	<ul class="multi-column-dropdown">
		
		<?php
		
//		echo '<pre>';
//		print_r($category);
//		echo '</pre>';die;
		?>
		
		<h6><?= $category['name'] ?></h6>
		<?php if (isset($category['child'])): ?>
			<?php foreach ($category['child'] as $child): ?>
				<li>
					<a href="<?= \yii\helpers\Url::to(['category/view','id'=> $child['id']]) ?>"><?= $child['name'] ?></a>
				</li>
			<?php endforeach; ?>
		
		<?php endif; ?>
	</ul>
</div>