<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'G3tdk1cSblRfGDs_AyLT-R3jzdTHBsLc',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                header("Access-Control-Allow-Origin: *");
            }
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'POST login' => 'user/login',
                'OPTIONS login' => 'user/options',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'city'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'airline'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'flight',
                    'extraPatterns' => [
                        'POST bookings' => 'book',
                        'OPTIONS bookings' => 'options',
                        'GET bookings/{id}' => 'get-book',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'hotel',
                    'extraPatterns' => [
                        'POST bookings' => 'book',
                        'OPTIONS bookings' => 'options',
                        'GET bookings/{id}' => 'get-book',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'transaction'
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
