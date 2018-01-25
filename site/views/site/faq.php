<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'The Faster Scale App | FAQ';
$this->registerMetaTag([
  'name' => 'description',
  'content' => Html::encode("Have questions about the Faster Scale App? You might find your answers in this FAQ.")
]);
?>

<div class="site-faq">
  <h1>Frequently Asked Questions</h1>

  <div>
    <strong>Is this free?</strong>
    <p class="indent">Yes, this is completely free. How? Well...we don't make any money from this. Nor did we intend to in the beginning. We also don't intend to in the future. The code is all free (<a href="https://github.com/CorWatts/fasterscale">on Github</a>) -- this hosted site (fasterscaleapp.com) is a convenience for our users.</p>
    <p class="indent">Additionally, this software is Open Source licensed. You are free to take this codebase and use it yourself or install it on your own server. You can do what you like with it.</p>
  </div>

  <div>
    <strong>Do you have ads on FSA?</strong>
    <p class="indent">Nope. Like we said above, we don't make any money from this. Additionally, we don't want to make your usage experience obnoxious. Nor are we comfortable with the potential privacy concerns advertising might bring. So, no ads.</p>
  </div>

  <div>
    <strong>What do you do with my data?</strong>
    <p class="indent">Nothing. We don't sell it, trade it, barter it, exchange it, or give it away. Only you can download all of your data, at any time, by visiting your profile page and exporting it. You can delete all of your data (and account) on your profile page as well.</p>
    <p class="indent">NOTE: Backups of this server and database are taken regularly, encrypted, stored for a relatively short period, and then deleted on a rotating basis.</p>
  </div>

  <div>
    <strong>How do I ensure a partner email is always sent, regardless of my score?</strong>
    <p class="indent">It's as simple as setting your Email Threshold (on the <?=Html::a("/profile", Url::to(['site/profile']))?> page) to 0. Then a report will be sent to your partners with each check-in.</p>
  </div>

  <div>
    <strong>How can I contribute?</strong>
    <p class="indent">We welcome contributions of any kind. Programming, design, feature suggestions, testing, or general feedback is always appreciated. You can find our codebase online at the Github link above. For non-technical feedback, please use our mailing list or contact form.</p>
  </div>

</div>
