<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Msg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msg-form">

    <?php $form = ActiveForm::begin(['action' => 'create', 'method' => 'post']); ?>

    <?= $form->field($model, 'id_send')->hiddenInput(
            ['value' => Yii::$app->user->identity->id]
        ) ->label(false)
    ?>
    <?= $form->field($model, 'id_rec')->dropdownList(
            User::find()->select(['nome', 'id'])->indexBy('id')->column(),
            [
                'prompt'=>'Selecione o usuário',
            ]
        );
    ?>

    <?= $form->field($model, 'msg')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anexo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Enviar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
