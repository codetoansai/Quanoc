<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\categorys */

$this->title = 'Update Categorys: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categorys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categorys-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_cate'=>$data_cate
    ]) ?>

</div>
