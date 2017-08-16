<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

 <div class="row">
     <div class="col-md-6">
         <?php $form = ActiveForm::begin(); ?>

         <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

         <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

         <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

         <?= $form->field($model, 'cate_id')->dropDownList($data_cate,['pormpt'=>'Chọn danh mục cha']) ?>

         <div class="form-group">
             <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         </div>

         <?php ActiveForm::end(); ?>
     </div>
 </div>

</div>
