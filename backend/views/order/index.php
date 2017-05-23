<?php
	
	use yii\grid\GridView;
	use yii\helpers\Html;
	
	/* @var $this yii\web\View */
	/* @var $dataProvider yii\data\ActiveDataProvider */
	
	$this->title = 'Orders';
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'id',
			'created_at',
			'update_at',
			'quantity',
			'sum',
			[
				'attribute' => 'status',
				'value' => function ($data) {
					return !$data->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Заверщен</span>';
				},
			'format'=>'html',
			],
//             'status',
				// 'name',
				// 'email:email',
				// 'phone',
				// 'address',
			
			['class' => 'yii\grid\ActionColumn'],
	],
    ]); ?>
</div>
