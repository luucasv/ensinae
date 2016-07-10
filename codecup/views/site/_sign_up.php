<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="site-_sign_up">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nome') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'senha') ?>
        <?= $form->field($model, 'cidade') ?>
        <?= $form->field($model, 'estado') ?>
        <?= $form->field($model, 'universidade') ?>
        <?= $form->field($model, 'data_cadastro') ?>
        <?= $form->field($model, 'foto') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_sign_up -->
