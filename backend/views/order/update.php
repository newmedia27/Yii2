<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = 'Редактирование ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="order-update">

    <h1><?= $model['id'] ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
