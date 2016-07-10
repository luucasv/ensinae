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
    
    <?php $this->head() ?>

    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/css/normalize.css">
    <!-- Owl -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/css/owl.css">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/css/animate.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/fonts/font-awesome-4.1.0/css/font-awesome.min.css">
    <!-- Elegant Icons -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/fonts/eleganticons/et-icons.css">
    <!-- Main style -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web'); ?>/css/cardio.css">
</head>
<body>
<?php $this->beginBody() ?>
    
    <nav class="navbar" style="position:relative; top: 0; padding-top: 15px">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Url::to(['site/index']) ?>" style = "font-size: 240%; font-family: Gloria Hallelujah; color:#0066cc; margin-top: 10px;">ensinaê</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-nav">
                    <li><a href="<?php echo Url::to(['site/login']) ?>" class="btn btn-blue">Já possuo uma conta</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $content ?>

    <script src="<?= Yii::getAlias('@web'); ?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?= Yii::getAlias('@web'); ?>/js/owl.carousel.min.js"></script>
    <script src="<?= Yii::getAlias('@web'); ?>/js/bootstrap.min.js"></script>
    <script src="<?= Yii::getAlias('@web'); ?>/js/wow.min.js"></script>
    <script src="<?= Yii::getAlias('@web'); ?>/js/typewriter.js"></script>
    <script src="<?= Yii::getAlias('@web'); ?>/js/jquery.onepagenav.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>