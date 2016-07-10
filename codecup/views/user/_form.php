<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use bupy7\cropbox\Cropbox;
use app\models\Estado;
use app\models\Cidade;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageUpload')->widget(Cropbox::className(), 
        [
            'attributeCropInfo' => 'cropInfo',
        ]
    ) ?>

    <?php if ($model->foto != '') { ?>
        <?= Html::img('@web/uploads/users/' . $model->foto); ?>
    <?php } else { ?>
        <?= Html::img('@web/img/default-avatar.png'); ?>
    <?php } ?>

    <br clear="all" />
    <br clear="all" />

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'senha')->textInput(['maxlength' => true])->passwordInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'universidade')->textInput(['maxlength' => true]) ?>
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
