<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Заказ №<?= $model['id'] ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'update_at',
            'quantity',
            'sum',
	
			[
				'attribute' => 'status',
				'value' => !$model->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Заверщен</span>',
				
				'format'=>'html',
			],

//            'status',
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

	
	<?php $items = $model->orderItems; ?>

	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
			<tr>
				<th>Наименование</th>
				<th>Количество</th>
				<th>Цена</th>
				<th>Сумма</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($items as  $item): ?>
				<tr>
					
					<td><a href="<?=  Yii::$app->urlManagerFrontend->createUrl(['product/index', 'id'=>$item['product_id']]);  ?>"><?= $item['name'] ?></a></td>
					<td><?= $item['quantity_item'] ?></td>
					<td>$<?= $item['price'] ?></td>
					<td>$<?= $item['sum_item'] ?></td>
				
					
				</tr>
			<?php endforeach; ?>
			
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
</div>
