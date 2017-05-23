<option
		value="<?= $category['id'] ?>"
	<?php if ($category['id'] == $this->model->parent_id) echo 'selected' ?>
	<?php if ($category['id'] == $this->model->id) echo 'disabled' ?>
	><?= $tab . $category['name'] ?>
</option>
	<?php if (isset($category['child'])): ?>
		<ul>
			<?= $this->getMenuHtml($category['child'], $tab . '-') ?>
		</ul>
	<?php endif; ?>
