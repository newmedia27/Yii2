<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>


<div class="container">
	<?php if (Yii::$app->session->hasFlash('success')) :?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&time</span></button>
	<?= Yii::$app->session->getFlash('success') ?>
	</div>
	<?php endif;?>
	
	<?php if (Yii::$app->session->hasFlash('error')) :?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&time</span></button>
			<?= Yii::$app->session->getFlash('success') ?>
		</div>
	<?php endif;?>
	
	<?php if (!empty($session['cart'])):  ?>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
				<tr>
					<th>Фото товара</th>
					<th>Наименование</th>
					<th>Количество</th>
					<th>Цена</th>
					<th>Сумма</th>
					
				</tr>
				</thead>
				<tbody>
				<?php foreach ($session['cart'] as $id => $item): ?>
					<tr>
						<td><?= \yii\helpers\Html::img("{$item['img']}",['alt'=>$item['name'], 'class'=> 'cart-img'])   ?></td>
						<td><a href="<?= Url::to(['product/index', 'id'=>$id])?>"><?= $item['name'] ?></a></td>
						<td><?= $item['count'] ?></td>
						<td>$<?= $item['price'] ?></td>
						<td>$<?= $item['price'] * $item['count'] ?></td>
						
						</td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="4">Количество товаров:</td>
					<td class="count"><?= $session['cart.count'] ?></td>
				</tr>
				<tr>
					<td colspan="4">Сумма:</td>
					<td class="sum">$<?= $session['cart.sum'] ?></td>
				</tr>
				</tbody>
			</table>
			<style>
				.cart-img{
					/*width: 150px;*/
					height: 100px;
				}
				.item-delete{
					cursor: pointer;
				}
			</style>
		</div>
		<hr>
		
	<?php $form=ActiveForm::begin() ?>
		<?= $form->field($order,'name')?>
		<?= $form->field($order,'email')?>
		<?= $form->field($order,'phone')?>
		<?= $form->field($order,'address')?>
		<?= Html::submitButton('Оформить заказ', ['class'=>'btn', 'style'=>'background-color: #816263; color: #ffffff ']) ?>
	<?php $form=ActiveForm::end() ?>
	
	<?php else: ?>
		<h3>Вы пока не добавили сюда товар...</h3>
	<?php endif; ?>

</div>
