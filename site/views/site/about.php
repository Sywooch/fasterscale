<?php
use yii\helpers\Html;
use yii\jui\DatePicker;

/**
 * @var yii\web\View $this
 */
$this->title = 'About';
$this->registerJsFile('/js/site/about.js', ['depends' => [\site\assets\AppAsset::className()]]);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Hopefully you've heard of Michael Dye's emotional check-in tool called the Faster Scale. I've found the Faster Scale helpful in my personal life as I've tried to become more emotionally mindful. People I've talked to find it helpful as well. This aims to be an electronic version of the paper questionaire. It stores a history of your check-ins so you can visually see your emotional state change over time. I had a lot of fun building this, and I hope it helps you!</p>

    <h2>Who am I?</h2>
    <p>Hi! I'm Corey! I'm a software engineer living in San Francisco. I love coding and I love coding even more when it helps other people. I hope this app helps you to be more mindful of your emotional state. If you have any questions, comments, complaints, or feedback please drop me a line on the contact form!</p>

    <h2>The Code</h2>
    <p>If you're interested in peeking beneath the hood, or maybe even helping me with some code contributions, you can find the repo at <a href='https://github.com/CorWatts/fasterscale'>Github</a>.</p>

    <h2>Latest Commits</h2>
    <table id='commits' class="table table-striped">
        <tr>
            <th>When</th>
            <th>Link</th>
            <th>Committer</th>
            <th>Description</th>
        </tr>
    </table>
    <div id="spinner"><img src="/img/spinner.gif" id="spinner-gif" /></div>
</div>
