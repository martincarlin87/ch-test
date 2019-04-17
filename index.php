<?php

require_once __DIR__ . '/vendor/autoload.php';

$windTurbine = new WindTurbine();
$output = $windTurbine->getOutput();

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title>CH Technical Test</title>
  <meta name="description" content="CH Technical Test">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">

  <link rel="stylesheet" href="css/normalize.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <ol>
    <? foreach ($output as $index => $label) { ?>
      <li><? echo $label; ?></li>
    <? } ?>
  </ol>

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="js/plugins.js"></script>

</body>

</html>
