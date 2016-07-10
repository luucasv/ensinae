<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

$this->title = 'ensinaê';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="Somos um site de troca de aulas entre estudantes universitários" />
    <meta name="keywords" content="educação, aulas, aprender" />
    <meta name="author" content="Eu conheço Gabi" />
    <meta name="msapplication-TileColor" content="#00a8ff">
    <meta name="msapplication-config" content="<?= Yii::getAlias('@web'); ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web'); ?>/favicon.png">
    
    <link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/css/normalize.css">
    
    <?php $this->head() ?>
    
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/css/animate.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/fonts/font-awesome-4.1.0/css/font-awesome.min.css">
    <!-- Elegant Icons -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/fonts/eleganticons/et-icons.css">

    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/css/admin.css">
</head>
<body>
<?php $this->beginBody() ?>
    <div class="wrap">
    
   
    <?php
        NavBar::begin([
            'brandLabel' => "ensinaê",
            'brandUrl' => Url::to(['site/visaogeral']),
            
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);

    
        if (Yii::$app->user->isGuest) {
          //  $menuItems[] = ['label' => 'Assinar', 'url' => ['/assinaturas/planos']];  
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];        
        } else {
         
            $menuItems[] = ['label' => 'Visão Geral', 'url' => ['/user/index']];
            
            $menuItems[] = [
                        'label' => "Aulas",
                        'items' => [
                            ['label' => 'Suas Aulas', 'url' => ['/aulas/index']],
                            ['label' => 'Assistir Aula','url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ] 
            ];

            $menuItems[] = [
                        'label' => Yii::$app->user->identity->nome . "<img src='".Yii::getAlias('@web')."/img/default-avatar.png' class='avatar' />",
                        'items' => [
                            ['label' => 'Meu Perfil', 'url' => ['/user/profile']],
                            ['label' => 'Mensagens', 'url' => ['/user/profile']],
                            ['label' => 'Historico', 'url' => ['/historico/index']],
                            ['label' => 'Sair','url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ] 
            ];
            
        }

        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
    ?>

    <div class="container">
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
<script src="<?php echo Yii::getAlias('@web') ?>/js/admin_functions.js"></script>
</body>
</html>
<?php $this->endPage() ?>