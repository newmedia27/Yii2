<?php
	
	use yii\grid\GridView;
	use yii\helpers\Html;
	
	/* @var $this yii\web\View */
	/* @var $dataProvider yii\data\ActiveDataProvider */
	
	$this->title = 'Категории';
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'id',
			[
				'attribute' => 'parent_id',
				'value' => function ($data) {
					return $data->categories['name'] ? $data->categories['name'] : 'Самостоятельная категория';
				},
			],
//            'parent_id',
			'name',
			'keywords',
			'description',
			
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
