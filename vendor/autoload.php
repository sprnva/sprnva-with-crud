<?php

// autoload classes
define('vendorDir', dirname(dirname(__FILE__)) . "/vendor");
define('baseDir', dirname(__DIR__));

spl_autoload_register(function ($class) {

    $vendorDir = vendorDir;
    $baseDir = baseDir;

    $userClasses = require $baseDir . '/autoload.php';

    $classes = array_merge([
        'App\\Core\\App' => $vendorDir . '/sprnva/framework/src/App/App.php',
        'App\\Core\\AppInterface' => $vendorDir . '/sprnva/framework/src/App/AppInterface.php',
        'App\\Core\\Auth' => $vendorDir . '/sprnva/framework/src/Auth.php',
        'App\\Core\\BcryptHasher' => $vendorDir . '/sprnva/framework/src/Hasher/BcryptHasher.php',
        'App\\Core\\Database\\Connection\\Connection' => $vendorDir . '/sprnva/framework/src/Database/Connection/Connection.php',
        'App\\Core\\Database\\Connection\\ConnectionInterface' => $vendorDir . '/sprnva/framework/src/Database/Connection/ConnectionInterface.php',
        'App\\Core\\Database\\Connection\\Exception\\ConnectionException' => $vendorDir . '/sprnva/framework/src/Database/Connection/Exception/ConnectionException.php',
        'App\\Core\\Database\\Migration\\Migration' => $vendorDir . '/sprnva/framework/src/Database/Migration/Migration.php',
        'App\\Core\\Database\\Migration\\MigrationRepository' => $vendorDir . '/sprnva/framework/src/Database/Migration/Repository.php',
        'App\\Core\\Database\\Migration\\Migrator' => $vendorDir . '/sprnva/framework/src/Database/Migration/Migrator.php',
        'App\\Core\\Database\\Migration\\SchemaFactory' => $vendorDir . '/sprnva/framework/src/Database/Migration/SchemaFactory.php',
        'App\\Core\\Database\\QueryBuilder\\Exception\\QueryBuilderException' => $vendorDir . '/sprnva/framework/src/Database/QueryBuilder/Exception/QueryBuilderException.php',
        'App\\Core\\Database\\QueryBuilder\\QueryBuilder' => $vendorDir . '/sprnva/framework/src/Database/QueryBuilder/QueryBuilder.php',
        'App\\Core\\Database\\QueryBuilder\\QueryBuilderInterface' => $vendorDir . '/sprnva/framework/src/Database/QueryBuilder/QueryBuilderInterface.php',
        'App\\Core\\Dumper' => $vendorDir . '/sprnva/framework/src/Dumper/Dumper.php',
        'App\\Core\\Error' => $vendorDir . '/sprnva/framework/src/Error.php',
        'App\\Core\\Exception\\AppException' => $vendorDir . '/sprnva/framework/src/App/Exception/AppException.php',
        'App\\Core\\Exception\\BaseException' => $vendorDir . '/sprnva/framework/src/Exception/BaseException.php',
        'App\\Core\\Filesystem\\Exception\\FilesystemException' => $vendorDir . '/sprnva/framework/src/Filesystem/Exception/FilesystemException.php',
        'App\\Core\\Filesystem\\Filesystem' => $vendorDir . '/sprnva/framework/src/Filesystem/Filesystem.php',
        'App\\Core\\Filesystem\\FilesystemInterface' => $vendorDir . '/sprnva/framework/src/Filesystem/FilesystemInterface.php',
        'App\\Core\\Hasher\\BcryptHasherInterface' => $vendorDir . '/sprnva/framework/src/Hasher/BcryptHasherInterface.php',
        'App\\Core\\Hasher\\Exception\\BcryptHasherException' => $vendorDir . '/sprnva/framework/src/Hasher/Exception/BcryptHasherException.php',
        'App\\Core\\Install\\Fortify' => $vendorDir . '/sprnva/fortify/src/Fortify.php',
        'App\\Core\\Parsedown' => $vendorDir . '/sprnva/framework/src/ParseDown/Parsedown.php',
        'App\\Core\\Request' => $vendorDir . '/sprnva/framework/src/Request.php',
        'App\\Core\\Routing\\Exception\\RoutingException' => $vendorDir . '/sprnva/framework/src/Routing/Exception/RoutingException.php',
        'App\\Core\\Routing\\Route' => $vendorDir . '/sprnva/framework/src/Routing/Route.php',
        'App\\Core\\Routing\\RouteBinding' => $vendorDir . '/sprnva/framework/src/Routing/RouteBinding.php',
        'PHPMailer\\PHPMailer\\Exception' => $vendorDir . '/sprnva/framework/src/Email/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => $vendorDir . '/sprnva/framework/src/Email/OAuth.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => $vendorDir . '/sprnva/framework/src/Email/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => $vendorDir . '/sprnva/framework/src/Email/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => $vendorDir . '/sprnva/framework/src/Email/SMTP.php',
        'App\\Controllers\\MigrationController' => $vendorDir . '/sprnva/framework/src/Database/Migration/controller/Migration/MigrationController.php',
    ], $userClasses);
    if (array_key_exists($class, $classes)) {
        require_once $classes[$class];
    }
});

require vendorDir . '/sprnva/framework/src/Helpers.php';
require vendorDir . '/sprnva/framework/src/bootstrap.php';
require vendorDir . '/sprnva/framework/src/Routes.php';
