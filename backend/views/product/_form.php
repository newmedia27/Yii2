<?php
	
	use mihaildev\ckeditor\CKEditor;
	use mihaildev\elfinder\ElFinder;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	
	mihaildev\elfinder\Assets::noConflict($this);
	
	/* @var $this yii\web\View */
	/* @var $model backend\models\Product */
	/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
	
	<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


	<div class="form-group field-product-categories_id has-success __web-inspector-hide-shortcut__">
		<label class="control-label" for="product-categories_id">Родительская категория</label>
		<select id="product-categories_id" class="form-control" name="Product[category_id]" aria-invalid="false">
			
			<?= \frontend\components\MenuWidget::widget(['tpl' => 'selectProduct', 'model' => $model]) ?>
		</select>

	</div>
	
	
<!--	--><?//= $form->field($model, 'category_id')->textInput() ?>
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<!--	--><? //= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

	<!--	--><? //= $form->field($model,'content')->widget(CKEditor::className(),[
		//			'editorOptions'=>[
		//					'preset'=> 'full',
		//				'inline'=>false
		//			],
		//	]);
		//	?>
	<?php
		echo $form->field($model, 'content')->widget(CKEditor::className(), [
			
			'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['']),
		
		]);
	?>
	
	
	
	<?= $form->field($model, 'price')->textInput() ?>
	
	<?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
	
	
	
<!--	--><?//= $form->field($model, 'image')->fileInput() ?>
	<?= $form->field($model, 'gallery[]')->fileInput(['multiple'=>true, 'accept'=>'image/*']) ?>
	
	
	
	<?= $form->field($model, 'type')->dropDownList(['0'=>'Для мужчин', '1'=>'Для  женщин','2'=>'Для детей']) ?>
	<?= $form->field($model, 'hit')->checkbox(['0', '1']) ?>
	
	<?= $form->field($model, 'new')->checkbox(['0', '1']) ?>
	
	<?= $form->field($model, 'sale')->checkbox(['0', '1']) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
