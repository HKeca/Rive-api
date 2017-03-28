<?php
/*
    Rive api App
*/

/* include dependencies */
require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,

        'db' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'rivedb',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],
]);


/* Container */
$container = $app->getContainer();

/* Eloquent Database */
$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();

$capsule->bootEloquent();

/*
    Container objects
*/
$container['db'] = function($container) use ($capsule) {
    $capsule;
};

$container['APIController'] = function($container) {
    return new \App\Controllers\APIController($container);
};

/* Require routes */
require __DIR__ . '/../app/routes.php';