<?php
	
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	
	/* @var $this yii\web\View */
	/* @var $model backend\models\Order */
	/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">
	
	<?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'created_at')->textInput() ?>
	
	<?= $form->field($model, 'update_at')->textInput() ?>
	
	<?= $form->field($model, 'quantity')->textInput() ?>
	
	<?= $form->field($model, 'sum')->textInput() ?>

	<!--    --><? //= $form->field($model, 'status')->textInput() ?>
	<?= $form->field($model, 'status')->dropDownList(['0'=>'Активен', '1'=>'Завершен'])?>
	
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
