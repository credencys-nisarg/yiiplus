<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'authClientCollection' => [
          'class' => 'yii\authclient\Collection',
          'clients' => [
                'facebook' => [
                  'class' => 'yii\authclient\clients\Facebook',
                  'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',              
                  'clientId' => '1733348906907569',
                  'clientSecret' => '015ff35ddb7e10d57b60a1a75bb6a7a7',
                  'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
                ],
                'google' => [
                      'class'        => 'dektrium\user\clients\Google',
                      'clientId'     => 'oauth_google_clientId',
                      'clientSecret' => 'oauth_google_clientSecret',
                ],
                'twitter' => [
                      'class' => 'yii\authclient\clients\Twitter',
                      'consumerKey' => 'oauth_twitter_key',
                      'consumerSecret' => 'oauth_twitter_secret',
                ],
                'instagram' => [
                       'class' => 'kotchuprik\authclient\Instagram',
                       'clientId' => 'instagram_client_id',
                       'clientSecret' => 'instagram_client_secret',
                ],
          ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
