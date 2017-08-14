<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\categorys */

$this->title = 'Create Categorys';
$this->params['breadcrumbs'][] = ['label' => 'Categorys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_cate'=>$data_cate
    ]) ?>

</div>
