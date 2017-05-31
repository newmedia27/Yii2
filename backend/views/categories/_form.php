<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Categories;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>


<!--    --><?//= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(
//		    		Categories::find()->all(),'id','name'
//			)) ?>
	<div class="form-group field-categories-parent_id has-success __web-inspector-hide-shortcut__">
		<label class="control-label" for="categories-parent_id">Родительская категория</label>
		<select id="categories-parent_id" class="form-control" name="Categories[parent_id]" aria-invalid="false">
			<option value="0">Самостоятельная категория</option>
			<?= \frontend\components\MenuWidget::widget(['tpl'=>'select','model'=>$model])?>
		</select>
		
	</div>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
