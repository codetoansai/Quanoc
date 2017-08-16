<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 8/15/2017
 * Time: 10:04 PM
 */
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

            <?= $form->field($model, 'image')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Submit',['class' =>'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
