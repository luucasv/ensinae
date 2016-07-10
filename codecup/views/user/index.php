<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" name="validate-text" id="validate-text" placeholder="O que você quer aprender hoje? " required>
                <span class="input-group-addon danger"><span class="glyphicon glyphicon-search"></span></span>
            </div>
        </div>
    </div>
</div>
