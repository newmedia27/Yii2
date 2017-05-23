<?php
	
	use yii\grid\GridView;
	use yii\helpers\Html;
	
	/* @var $this yii\web\View */
	/* @var $dataProvider yii\data\ActiveDataProvider */
	
	$this->title = 'Products';
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'id',
			[
				'attribute' => 'category_id',
				'value' => function ($data) {
					return $data->category['name'];
				},
			],
//            'category_id',
			'name',
//            'content:ntext',
			'price',
			// 'keywords',
			// 'description',
			// 'img',
			[
				'attribute' => 'hit',
				'value' => function ($data) {
					return !$data->hit ? '<span class="text-danger">НЕТ</span>' : '<span class="text-success">ДА</span>';
				},
				'format' =>'html',
			],
//             'hit',
			[
				'attribute' => 'new',
				'value' => function ($data) {
					return !$data->new ? '<span class="text-danger">НЕТ</span>' : '<span class="text-success">ДА</span>';
					
				},
				'format' =>'html',
			],
//			'new',
			[
				'attribute' => 'sale',
				'value' => function ($data) {
					return !$data->sale ? '<span class="text-danger">НЕТ</span>' : '<span class="text-success">ДА</span>';
				},
				'format' =>'html',
			],
//			'sale',
			
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
