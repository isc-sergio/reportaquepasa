<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
//use yii\bootstrap4\NavBar;
use app\assets\BootstrapAsset;
use app\assets\AppWebAsset;
use app\components\BytesizeIcons;

BootstrapAsset::register($this);
AppWebAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="<?= Yii::$app->request->baseUrl ?>/favicon.ico" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="app-web" class="wrap">
    <?php echo Nav::widget([
        'options' => ['class' => 'container bg-white justify-content-between fixed-top'],
        'items' => [
            ['label' => BytesizeIcons::getIcon('i-home') . ' ¿qué vas a reportar?', '#app-web', 'linkOptions' => ['id' => 'navbar-brand_11', 'class' => 'navbar-brand'], 'encode' => false],
            ['label' => 'PUBLICAR', 'url' => ['/site/about']],
            //['label' => Html::img('@web/feather/folder.svg', ['class' => 'feather']) . ' mis Reportes ' . Html::tag('span', '3', ['class' => 'badge badge-secondary']), 'url' => ['/site/about'], 'encode' => false],
        ],
    ]); ?>

    <div id="wrap-container" class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center"><?= date('Y') ?> Uruapan Michoacán</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
