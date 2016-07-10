<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Msg */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Msgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12 col-sm-12">
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="enviado" class="btn btn-primary" href="#tab1" data-toggle="tab">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Enviado</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="recebido" class="btn btn-default" href="#tab2" data-toggle="tab">
                <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
                <div class="hidden-xs">Recebidos</div>
            </button>
        </div>
    </div>

    <div class="well">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
            </div>
            <div class="tab-pane fade in" id="tab2">
            </div>
        </div>
    </div>
</div>
