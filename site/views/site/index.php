<?php
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 */
$this->title = 'The Faster Scale App | Welcome';
$this->registerMetaTag([
  'name' => 'description',
  'content' => 'A totally free, online version of the Faster Scale. Increase your self-awareness and practice emotional mindfulness by signing up or logging in today.'
]);
$this->registerJsFile('/js/site/index.js', ['depends' => [\site\assets\AppAsset::className()]]);
?>
<div class="site-index">
  <div class="jumbotron">
    <h1>The Faster Scale App</h1>
    <p class="lead">Learn to be aware of your emotional state to see temptation coming before it hits.</p>
  </div>

  <div class="body-content">
    <div class="row block">
      <div class="col-md-12">
        <p>Relapse is not an event that suddenly occurs. By using Michael Dye's "The Faster Scale", a person can notice their pattern of biological, psychological, and social changes that lead to relapse.</p>
        <p>Once identified, evasive action can be taken.</p>
      </div>
    </div>
    <div class="row block">
      <div class="col-md-6">
        <p>This is an online version of The Faster Scale.</p>
      </div>
      <div class="col-md-4">
        <canvas id='example-scores-line-chart'></canvas>
      </div>
    </div>
    <div class="row block">
      <div class="col-md-12">
        <p>Log the emotions and behaviors you are exhibiting in order to see how vulnerable to temptation you are in the moment. Do a check-in every day to see how your mental state changes over time.</p>
        <p>More questions? Take a look at our <?=Html::a("FAQ", Url::to(['site/faq']))?>.</p>
      </div>
    </div>
    <div class="row block">
      <div class="col-md-12">
        <p>Your check-in data is displayed in several charts and graphs, helping you gain additional insights to your emotional tendencies. Daily check-in answers are stored according to the date -- you can go back to any point in history and view what you were experiencing at that time.</p>
      </div>
    </div>
    <div class="row block">
      <div class="col-md-8">
        <p>A Danger Score is calculated for each check-in, allowing you to get a simple summary of how close to relapse you are. As your score goes up, you become more and more likely to relapse. You can also choose to send a report to your friends if you score above a certain threshold, which opens up avenues for conversation.</p>
        <p><em>Don't let temptation blindside you into relapse. See it coming before it arrives, and take preventative action.</em></p>
      </div>
      <div class="col-md-4">
        <div class='alert alert-warning'>Definite warning signs. You aren't doing well. Take some time out, write down what you're feeling, and discuss it with someone.</div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 blog">
        <hr />
        <h2>Updates</h2>
        <?=$this->render('/partials/posts', ['posts' => $posts])?>
      </div>
    </div>
  </div>
