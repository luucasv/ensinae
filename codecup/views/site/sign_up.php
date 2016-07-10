<?php

use yii\helpers\Html;
use yii\web\View;
use kartik\widgets\ActiveForm;
use app\models\Cidade;
use app\models\Estado;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
/*$this->registerJs("
    $(function (){
        $('select#user-estado').trigger('change');
    });

", View::POS_END, 'inicialização');*/
?>
<section id="inscrever">
    <div class="container">
        <div class="table">
            <div class ="row">
                <h2 class="nice-font" style="text-align:center">Inscreva-se</h2>
            </div>
        </div>
    </div>
</section>
<section id="campos">
    <div class="container">
        <?php $form = ActiveForm::begin(["action" => Url::to(['user/create']), "options" => ["class" => 'sign_up_box']]); ?>
        <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'nome') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'email') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'senha')->passwordInput(); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'confirm_pass')->passwordInput(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'estado')->dropdownList(
                            Estado::find()->select(['nome', 'id'])->indexBy('id')->column(),
                            [
                                'prompt'=>'Selecione o estado',
                            ]
                        );
                    ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'cidade')->dropdownList(
                        Cidade::find()->select(['nome', 'id'])->indexBy('id')->orderBy('nome')->column(),
                        ['prompt' => 'Selecione a sua cidade']
                    ) ?>
                </div>
            </div>
            <?= $form->field($model, 'universidade') ?>

            <div class="form-group">
                <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-blue btn-block']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>
    