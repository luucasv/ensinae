<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

?>
<section id="inscrever">
    <div class="container">
        <div class="table">
            <div class ="row">
                <h2 class="nice-font" style="text-align:center">Login</h2>
            </div>
        </div>
    </div>
</section>
<section id="campos">
    <div class="container">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
             "options" => ["class" => 'sign_up_box'],
        ]); ?>
            <div class="row">
                <?= $form->field($model, 'username',['addon' => ['prepend' => ['content'=>'@']]
                                                    ])->label(false)->textInput(array('placeholder' => 'Digite seu e-mail')) ?>

                <?= $form->field($model, 'password',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-lock"></i>']]])->passwordInput(array('placeholder' => 'Digite sua senha'))->label(false) ?>
            
                <div class="form-group">
                    <div class="col-lg-12">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-blue', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
    <br clear="all" />
</section>
