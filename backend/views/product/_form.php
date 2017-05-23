<?php
	
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	
	/* @var $this yii\web\View */
	/* @var $model backend\models\Product */
	/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
	
	<?php $form = ActiveForm::begin(); ?>


	<div class="form-group field-product-categories_id has-success __web-inspector-hide-shortcut__">
		<label class="control-label" for="product-categories_id">Родительская категория</label>
		<select id="product-categories_id" class="form-control" name="Product[categories_id]" aria-invalid="false">
			
			<?= \frontend\components\MenuWidget::widget(['tpl' => 'selectProduct', 'model' => $model]) ?>
		</select>

	</div>
	
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'price')->textInput() ?>
	
	<?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
	
	
	
	<?= $form->field($model, 'hit')->checkbox(['0','1']) ?>
	
	<?= $form->field($model, 'new')->checkbox(['0','1']) ?>
	
	<?= $form->field($model, 'sale')->checkbox(['0','1']) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
