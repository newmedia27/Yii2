<?php if (!empty($session['cart'])):  ?>
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
			<tr>
				<th>Фото товара</th>
				<th>Наименование</th>
				<th>Количество</th>
				<th>Цена</th>
				<th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($session['cart'] as $id => $item): ?>
				<tr>
					<td><?= \yii\helpers\Html::img("{$item['img']}",['alt'=>$item['name'], 'class'=> 'cart-img'])   ?></td>
					<td><?= $item['name'] ?></td>
					<td><?= $item['count'] ?></td>
					<td>$<?= $item['price'] ?></td>
					<td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger item-delete"  aria-hidden="true"></span>
					</td>
				</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="4">Количество товаров:</td>
				<td class="count"><?= $session['cart.count'] ?></td>
			</tr>
			<tr>
				<td colspan="4">Сумма:</td>
				<td class="sum"><?= $session['cart.sum'] ?></td>
			</tr>
			</tbody>
		</table>
		<style>
			.cart-img{
				/*width: 150px;*/
				height: 50px;
			}
			.item-delete{
				cursor: pointer;
			}
		</style>
	</div>
<?php else: ?>
	<h3>Вы пока не добавили сюда товар...</h3>
<?php endif; ?>
