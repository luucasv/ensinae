<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model app\models\Aulas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aulas-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_user')->hiddenInput(
            ['value' => Yii::$app->user->identity->id]
        ) ->label(false)
    ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true])->hint('Digite um título.') ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6])->hint('Fale mais sobre a aula.') ?>

     <?= $form->field($model, 'tags')->widget(Select2::classname(), [
            'maintainOrder' => true,
            'options' => ['placeholder' => 'Tags ...', 'multiple' => true],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 30
            ],
        ])
    ?>

    <?= $form->field($model, 'disponibilidade')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
