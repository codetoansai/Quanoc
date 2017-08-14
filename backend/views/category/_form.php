<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\categorys */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorys-form">
    <div class="row">
       <div class="col-md-6">
           <?php $form = ActiveForm::begin(); ?>

           <?= $form->field($model, 'parent_id')->dropDownList($data_cate,['pormpt' => 'Chọn danh mục cha']) ?>

           <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


           <div class="form-group">
               <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
           </div>

           <?php ActiveForm::end(); ?>
       </div>
    </div>


</div>
