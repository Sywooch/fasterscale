<?php

/**
 * @var \yii\web\View $this
 * @var string $content
 */

use yii\helpers\Url;
use common\components\Utility;

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\Nav;
use macgyer\yii2materializecss\widgets\NavBar;
use macgyer\yii2materializecss\widgets\Breadcrumbs;
use macgyer\yii2materializecss\widgets\Alert;

site\assets\AppAsset::register($this);

if($hash = Utility::getRevHash()) {
  $rev_link = '<a href="'.Utility::getGithubRevUrl().'">'.Utility::getRevHash().'</a>';
} else $rev_link = 'DEVELOPMENT';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>

  <body>
  <?php $this->beginBody() ?>
    <header class="page-header">
      <nav id="my-background-brand-logo" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container nav-wrapper">
          <a class="brand-logo" href="/">The Faster Scale App</a>
          <a class="button-collapse" href="#" data-activates="mobile-demo"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <?php foreach($menuItems as $menuItem) {
            echo Html::a($menuItem['label'], $menuItem['url']);
            } ?>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <?php foreach($menuItems as $menuItem) {
            echo Html::a($menuItem['label'], $menuItem['url']);
            } ?>
          </ul>
        </div>
      </nav>
    </header>

    <main class="content">
      <div class="container">
        <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>

        <?= $content ?>
      </div>
    </main>

    <footer class="footer page-footer">
      <div class="container">
        <div class="row">
          <div class="col offset-6 s4">
            <h5 class="grey-text text-lighten-3">Links</h5>
          </div>
        </div>
        <div class="row">
          <div class="col l6 s12">
            <p class="grey-text text-lighten-3">&copy; <a class="grey-text text-lighten-3" href="https://corwatts.com">Corey Watts</a> <?= date('Y') ?></p>
          </div>
          <div class="col l4 offset-l2 s12">
            <ul>
              <li><a class="grey-text text-lighten-3" href="<?=Url::to(['site/privacy'])?>">Privacy</a></li>
              <li><a class="grey-text text-lighten-3" href="<?=Url::to(['site/terms'])?>">Terms</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
