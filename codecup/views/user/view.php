<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        <?php if ($model->foto != NULL) { ?>
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
        </div>
        <div class="useravatar">
            <img alt="" src="http://lorempixel.com/100/100/people/9/">
        </div>
        <?php } else { ?>
            <div class="card-background">
                <img class="card-bkimg" alt="" src="<?= Yii::getAlias('@web') ?>/img/default-avatar.png">
            </div>
            <div class="useravatar">
                <img alt="" src="<?= Yii::getAlias('@web') ?>/img/default-avatar.png">
            </div>
        <?php } ?>
        <div class="card-info"> 
            <span class="card-title"><?= $model->nome ?></span>
        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Dados</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
                <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
                <div class="hidden-xs">Aulas</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <div class="hidden-xs">Agenda</div>
            </button>
        </div>
    </div>

    <div class="well">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
                <div class="row-fluid">
                    <div class="col-md-4">
                        <b>Nome: </b> <?= $model->nome; ?>
                    </div>
                    <div class="col-md-4">
                        <b>E-mail: </b> <?= $model->email; ?>
                    </div>
                    <div class="col-md-4">
                        <b>Universidade: </b> <?= $model->universidade; ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="col-md-4">
                        <b>Cidade: </b> <?= $model->rCidade->nome; ?>
                    </div>
                    <div class="col-md-4">
                        <b>Estado: </b> <?= $model->rEstado->nome; ?>
                    </div>
                    <div class="col-md-4">
                        <b>Membro desde: </b> <?= date('d/m/Y', strtotime($model->data_cadastro)); ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade in" id="tab2">
                <?php if (count($model->rAulas) > 0) { ?>
                    s
                <?php } else { ?>
                    <center>Você não possui nenhuma aula cadastrada</center>
                <?php } ?>
            </div>
            <div class="tab-pane fade in" id="tab3">
                <?php if (count($model->rAulas) > 0) { ?>
                <?php } else { ?>
                    <center>Você não possui aulas programadas</center>
                <?php } ?>
            </div>
        </div>
    </div>
</div>