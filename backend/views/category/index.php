<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\categorysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorys-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categorys', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'parent_id',
            'created_at',
            'updated_at',
            // 'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
