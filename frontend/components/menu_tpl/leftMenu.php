<li ><a style="color: #8c2830" href=""><?= $category['name'] ?></a></li>
<?php if (isset($category['child'])): ?>
	<?php foreach ($category['child'] as $child): ?>
		<li>
			<a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $child['id']]) ?>"> -
				<?= $child['name'] ?></a>
		</li>
	<?php endforeach; ?>
<?php endif; ?>
