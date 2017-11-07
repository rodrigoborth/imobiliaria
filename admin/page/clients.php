<?php
require $_SERVER['DOCUMENT_ROOT'].'/admin/auth.php';
$page = 'clients';
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
  <!--  JS GRID-->
  <link type="text/css" rel="stylesheet" href="/libs/jsgrid/dist/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="/libs/jsgrid/dist/jsgrid-theme.min.css" />
</head>
<body>
<?php require '../section/sidebar.php'?>
<main>
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb no-border-radius">
        <li class="active">Clientes</li>
      </ol>
    </div>
    <div id="jsGrid"></div>

  </div>
</main>
<!--Scripts-->
<script src="/libs/jquery/dist/jquery.min.js"></script>
<script src="/libs/flat-ui/dist/js/vendor/video.js"></script>
<script src="/libs/flat-ui/dist/js/flat-ui.min.js"></script>
<script src="/script/application.js"></script>
<!--JS GRID-->
<script type="text/javascript" src="/libs/jsgrid/dist/jsgrid.min.js"></script>
<script>
  var clients = [
    { "Nome": "Otto Clay", "Age": 25, "Country": 1, "Endereço": "Ap #897-1459 Quam Avenue", "Married": false },
    { "Nome": "Connor Johnston", "Age": 45, "Country": 2, "Endereço": "Ap #370-4647 Dis Av.", "Married": true },
    { "Nome": "Connor Johnston", "Age": 45, "Country": 2, "Endereço": "Ap #370-4647 Dis Av.", "Married": true },
    { "Nome": "Connor Johnston", "Age": 45, "Country": 2, "Endereço": "Ap #370-4647 Dis Av.", "Married": true },
    { "Nome": "Connor Johnston", "Age": 45, "Country": 2, "Endereço": "Ap #370-4647 Dis Av.", "Married": true },
    { "Nome": "Connor Johnston", "Age": 45, "Country": 2, "Endereço": "Ap #370-4647 Dis Av.", "Married": true },
    { "Nome": "Lacey Hess", "Age": 29, "Country": 3, "Endereço": "Ap #365-8835 Integer St.", "Married": false },
    { "Nome": "Lacey Hess", "Age": 29, "Country": 3, "Endereço": "Ap #365-8835 Integer St.", "Married": false },
    { "Nome": "Lacey Hess", "Age": 29, "Country": 3, "Endereço": "Ap #365-8835 Integer St.", "Married": false },
    { "Nome": "Lacey Hess", "Age": 29, "Country": 3, "Endereço": "Ap #365-8835 Integer St.", "Married": false },
    { "Nome": "Lacey Hess", "Age": 29, "Country": 3, "Endereço": "Ap #365-8835 Integer St.", "Married": false },
    { "Nome": "Lacey Hess", "Age": 29, "Country": 3, "Endereço": "Ap #365-8835 Integer St.", "Married": false },
    { "Nome": "Lacey Hess", "Age": 29, "Country": 3, "Endereço": "Ap #365-8835 Integer St.", "Married": false },
    { "Nome": "Timothy Henson", "Age": 56, "Country": 1, "Endereço": "911-5143 Luctus Ave", "Married": true },
    { "Nome": "Timothy Henson", "Age": 56, "Country": 1, "Endereço": "911-5143 Luctus Ave", "Married": true },
    { "Nome": "Timothy Henson", "Age": 56, "Country": 1, "Endereço": "911-5143 Luctus Ave", "Married": true },
    { "Nome": "Timothy Henson", "Age": 56, "Country": 1, "Endereço": "911-5143 Luctus Ave", "Married": true },
    { "Nome": "Timothy Henson", "Age": 56, "Country": 1, "Endereço": "911-5143 Luctus Ave", "Married": true },
    { "Nome": "Timothy Henson", "Age": 56, "Country": 1, "Endereço": "911-5143 Luctus Ave", "Married": true },
    { "Nome": "Timothy Henson", "Age": 56, "Country": 1, "Endereço": "911-5143 Luctus Ave", "Married": true },
    { "Nome": "Timothy Henson", "Age": 56, "Country": 1, "Endereço": "911-5143 Luctus Ave", "Married": true },
    { "Nome": "Ramona Benton", "Age": 32, "Country": 3, "Endereço": "Ap #614-689 Vehicula Street", "Married": false }
  ];

  var countries = [
    { Name: "", Id: 0 },
    { Name: "United States", Id: 1 },
    { Name: "Canada", Id: 2 },
    { Name: "United Kingdom", Id: 3 }
  ];

  $("#jsGrid").jsGrid({
    width: "100%",
    height: "auto",

    inserting: true,
    editing: true,
    sorting: true,
    paging: true,

    confirmDeleting: true,
    deleteConfirm: "Você tem certeza?",

    data: clients,

    fields: [
      { name: "Nome", type: "text", validate: "required" },
      { name: "Endereço", type: "text" },
      { type: "control", editButton: true, deleteButton: true }
    ]
  });
</script>
</body>
</html>
