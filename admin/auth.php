<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 24/10/17
 * Time: 15:48
 */
require $_SERVER['DOCUMENT_ROOT'].'/conf.php';
//Setup auth0
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'nextweb.auth0.com',
  'client_id' => 'LZwfvMIWhmQkgSxCA8PxFS34mPKrXOeb',
  'client_secret' => 'HqPVXwLPdngEZX53wdQNClj3X3oIa2Q4ryp3Ox9WMWFaC6Q0xFqM1vOOIYFOj7bk',
  'redirect_uri' => 'http://local.imobiliaria.com/admin',
  'audience' => 'https://nextweb.auth0.com/userinfo',
  'scope' => 'openid profile',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);
$userInfo = $auth0->getUser();

if (!$userInfo) {
  header("Location: /admin/login");
}