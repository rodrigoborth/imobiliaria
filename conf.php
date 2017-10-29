<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 16/10/17
 * Time: 21:04
 */
require __DIR__ . '/vendor/autoload.php';
//DATABASE
$configuration = [
    "database" => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'user' => 'user',
        'port' => 3306,
        'password' => 'pass',
        'dbname' => 'imobiliaria',
        'charset' => 'utf8'
    ],
    'password' => [
        'cost' => 8,
        'salt' => random_bytes(22)
    ],
    'form' => [
        'contact' => 'contact@nextweb.digital',
        'reply' => 'contact@nextweb.digital',
        'sender' => 'no-reply@nextweb.digital'
    ]
];

//create db connection
$config = new \Doctrine\DBAL\Configuration();
$conn = \Doctrine\DBAL\DriverManager::getConnection($configuration['database'], $config);