<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'cms' => [
            'class' => 'app\modules\cms\Module',
            'modules' => [
                'voice' => [
                    'class' => 'app\modules\cms\modules\voice\Module',
                ],
            ],
        ],
    ],
    'components' => [
        'mongodb' => [
            'class' => 'yii\mongodb\Connection',
            'dsn' => 'mongodb://localhost:27017/fightvaw',
        ],
        'urlManager' => [
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
//            'rules' => [
//                  'cms/voice/voice/updateInfo/<id:\d+>' => 'cms/voice/voice/updateInfo',
////                '<controller:\w+>/<id:\d+>' => '<controller>/view',
////                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
////                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
////                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
////                '<module:\w+>/<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<module>/<controller>/<action>',
////                '<module:\w+>/<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<module>/<controller>/<action>',
//            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ifsRFm1p2eaKtnsqCbhgTQCwOH0nJ5jI',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
    // 'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug']['class'] = 'yii\debug\Module';
    //$config['modules']['debug']['panels']['mongodb']['class'] = 'yii\mongodb\debug\MongoDbPanel';
    

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
