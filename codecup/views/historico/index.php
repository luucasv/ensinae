<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HistoricoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Histórico';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historico-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid){
            
            if ($model->type == 0){
                 return ['style'=>'color:red;'];
            } else {
                return ['style'=>'color:green;'];
            }
            
            return [];
         
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'qnt_coins',
            ['attribute'=>'type','value'=>function($model){
                 return $model->type == 1?'ENTRADA':'SAÍDA';
             }],
             ['attribute'=>'data_cadastro','value'=>function($model){
                 return date('d/m/Y H:i:s', strtotime($model->data_cadastro));
             }],
        ],
    ]); ?>
</div>
