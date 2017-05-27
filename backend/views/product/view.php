<?php
	
	use yii\helpers\Html;
	use yii\widgets\DetailView;
	
	/* @var $this yii\web\View */
	/* @var $model backend\models\Product */
	
	$this->title = $model->name;
	$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

	<h1><?= Html::encode($this->title) ?></h1>

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
	
	
	<?php $img = $model->getImage();?>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
//            'category_id',
			
			[
				'attribute' => 'category_id',
				'value' => $model->category['name'],
			
			],
			
			'name',
			'content:html',
			'price',
//            'keywords',
			[
				'attribute' => 'keywords',
				'value' => isset($model['keywords']) ? $model['keywords'] : '<span class="text-danger">(не задано)</span>',
				'format' => 'html',
			],
//            'description',
			[
				'attribute' => 'description',
				'value' => isset($model['description']) ? $model['description'] : '<span class="text-danger">(не задано)</span>',
				'format' => 'html',
			],
			[
				'attribute' => 'image',
				'value' =>"<img src= '{$img->getUrl(200)}'>",
				'format' => 'html',
			],
			'hit',
			'new',
			'sale',
		],
	]) ?>

</div>
