<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Msgs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msg-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Msg', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_send',
            'id_rec',
            'msg:ntext',
            'anexo',
            // 'type',
            // 'data_msg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
