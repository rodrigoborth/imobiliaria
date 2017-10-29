<?php
require $_SERVER['DOCUMENT_ROOT'].'/admin/auth.php';
$page = 'dashboard';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/libs/normalize-css/normalize.css">
  <link rel="stylesheet" href="/libs/components-font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/libs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/libs/flat-ui/dist/css/flat-ui.css">
  <link rel="stylesheet" href="/scss/admin/page/home.css">
</head>
<body>
<?php require '../section/sidebar.php'?>
<main>
  <div class="container-fluid">
    home
  </div>
</main>
<!--Scripts-->
<script src="/libs/jquery/dist/jquery.min.js"></script>
<script src="/libs/flat-ui/dist/js/vendor/video.js"></script>
<script src="/libs/flat-ui/dist/js/flat-ui.min.js"></script>
<script src="/script/application.js"></script>
</body>
</html>
