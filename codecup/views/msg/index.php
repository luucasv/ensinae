<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Msg;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Msgs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12 col-sm-12">
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="enviado" class="btn btn-primary" href="#tab1" data-toggle="tab">
                <span class="fa-arrow-circle-up  fa" aria-hidden="true"></span>
                <div class="hidden-xs">Enviados</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="recebido" class="btn btn-default" href="#tab2" data-toggle="tab">
                <span class="fa-envelope fa" aria-hidden="true"></span>
                <div class="hidden-xs">Recebidos</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="recebido" class="btn btn-default" href="#tab3" data-toggle="tab">
                <span class="fa-paper-plane fa" aria-hidden="true"></span>
                <div class="hidden-xs">Enviar Mensagem</div>
            </button>
        </div>
    </div>

    <div class="well">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
                <?php if(count($Enviadas) <= 0) { ?>
                    <center>Você não enviou mensagens</center>
                <?php } else{?>
                    <div class="container">
                        <div class="row col-md-11  custyle">
                            <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>Para</th>
                                    <th>Título</th>
                                </tr>
                            </thead>
                            <?php foreach ($Enviadas as $elem){ ?>
                                <?php count($Enviadas); exit; ?>
                                <tr>
                                    <td>
                                        <a  href="<?= Url::to(['user/view', 'id' => $elem->rReceptor->id])?>">
                                            <?= $elem->rReceptor->nome ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a  href="<?= Url::to(['msg/view', 'id' => $elem->id])?>">
                                            <?= $elem->titulo ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php }?>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade in" id="tab2">
                    <?php if(count($Recebidos) <= 0) { ?>
                        <center>Você não recebeu mensagens</center>
                    <?php } else{?>
                        <div class="container">
                            <div class="row col-md-11  custyle">
                                <table class="table table-striped custab">
                                <thead>
                                    <tr>
                                        <th>De</th>
                                        <th>Título</th>
                                    </tr>
                                </thead>
                                <?php foreach ($Recebidos as $elem){ ?>
                                    <tr>
                                        <td>
                                            <a  href="<?= Url::to(['user/view', 'id' => $elem->rAutor->id])?>">
                                                <?= $elem->rAutor->nome ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a  href="<?= Url::to(['msg/view', 'id' => $elem->id])?>">
                                                <?= $elem->titulo ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }?>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <div class="tab-pane fade in" id="tab3">
                <?= $this->render('_form', ['model' => new Msg()]); ?>
            </div>
        </div>
    </div>
</div>
