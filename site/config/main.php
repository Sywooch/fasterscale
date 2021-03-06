<?php
$params = array_merge(
  require(__DIR__ . '/../../common/config/params.php'),
  require(__DIR__ . '/../../common/config/params-local.php'),
  require(__DIR__ . '/params.php'),
  require(__DIR__ . '/params-local.php')
);

return [
  'id' => 'emotional-checkin-frontend',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'controllerNamespace' => 'site\controllers',
  'components' => [
    'user' => [
      'identityClass' => 'common\models\User',
      'enableAutoLogin' => true,
    ],
    'log' => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets' => [
        [
          'class' => 'yii\log\FileTarget',
          'levels' => ['error', 'warning'],
        ],
      ],
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
        '' => 'site/index',
        '<action:(index|about|faq|contact|signup|login|logout|welcome|profile|privacy|terms|request-password-reset|reset-password|delete-account)>' => 'site/<action>',
        'checkin/view/<date:\d{4}-\d{2}-\d{2}>' => 'checkin/view',
        'report/view/<date:\d{4}-\d{2}-\d{2}>' => 'report/view',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',

      ]
    ],
    'request' => [
      'enableCookieValidation' => true,
      'enableCsrfValidation' => true
    ],
    'assetManager' => [
      'bundles' => [
        'yii\bootstrap\BootstrapPluginAsset' => false,
        'yii\bootstrap\BootstrapAsset' => false,
        'yii\web\JqueryAsset' => [
          'sourcePath' => '@assets',
          'js' => ['js/jquery-3.2.1.min.js'],
        ],
      ],
      'linkAssets' => true,
      'converter' => [
        'class' => 'yii\web\AssetConverter',
        'commands' => [
          'scss' => ['css', 'node-sass --include-path "../../vendor/bower-asset/pickadate/lib/themes" --include-path "../../vendor/bower-asset/bootstrap-sass/assets/stylesheets" --output-style compressed {from} > {to}'],
        ],
      ],
    ],
    'view' => [
      'class' => 'site\classes\View'
    ]
  ],
  'params' => $params,
];
