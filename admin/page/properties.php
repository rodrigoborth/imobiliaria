<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 24/10/17
 * Time: 16:06
 */
require $_SERVER['DOCUMENT_ROOT'].'/admin/auth.php';
$page = 'properties';
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
  <link rel="stylesheet" href="/scss/admin/page/properties.css">
</head>
<body>
<?php require '../section/sidebar.php'?>
<main>
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb no-border-radius">
        <li class="active">Imóveis</li>
      </ol>
    </div>
    <div class="property-list">
      <?php for($i=1; $i<=12; $i++):?>
        <div class="card col-lg-3">
          <div class="card-body col-lg-12">
            <div class="img-container">
              <img src="https://trapptechnology.com/wp-content/uploads/2016/07/pexels-photo-106399-1024x683.jpeg">
            </div>
            <div class="card-main col-xs-12">
              <h4 class="card-title">Cod: <?php echo(sprintf("%04d", $i))?></h4>
              <h6 class="card-subtitle">Casa</h6>
            </div>
            <div class="card-info">
              <div class="col-xs-6">
                <p><i class="fa fa-bed" aria-hidden="true"></i> 5</p>
                <p><i class="fa fa-car" aria-hidden="true"></i> 3</p>
              </div>
              <div class="col-xs-6">
                <p><i class="fa fa-bath" aria-hidden="true"></i> 3</p>
                <p><i class="fa fa-arrows" aria-hidden="true"></i> 158m²</p>
              </div>
            </div>
            <div class="row card-btn">
              <a class="col-xs-6" href="#"><i class="fa fa-pencil"></i> Editar</a>
              <a class="col-xs-6" href="#"><i class="fa fa-trash"></i> Excluir</a>
            </div>
          </div>
        </div>
      <?php endfor;?>
    </div>
  </div>
</main>
<!--Scripts-->
<script src="/libs/jquery/dist/jquery.min.js"></script>
<script src="/libs/flat-ui/dist/js/vendor/video.js"></script>
<script src="/libs/flat-ui/dist/js/flat-ui.min.js"></script>
<script src="/script/application.js"></script>
</body>
</html>

