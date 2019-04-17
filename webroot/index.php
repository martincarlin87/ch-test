<?php

require_once __DIR__ . '/vendor/autoload.php';

use Models\WindTurbine;

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

  <link rel="stylesheet" href="css/styles.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="py-6 bg-grey-lighter">

  <div class="w-full lg:w-1/2 px-4 mx-auto">
    <div class="bg-indigo-darker border-t border-b sm:rounded sm:border shadow">
      <div class="border-b">
        <div class="flex justify-between px-6 -mb-px">
          <div class="w-2/3">
            <h3 class="text-2xl text-white font-semibold py-4">
              Wind Turbine
              <span class="text-sm text-blue-lighter">
                <?php echo sprintf("%d item%s", count($output), count($output) === 1 ? '' : 's') ?>
              </span>
            </h3>
          </div>
          <div class="w-1/3">
            <div class="turbine">
              <div class="pilot">
                <div class="prop-container">
                  <div class="prop"></div>
                  <div class="prop"></div>
                  <div class="prop"></div>
                </div>
              </div>
              <div class="pole"></div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="px-6 py-2 text-blue-lighter mb-4">
          <ol class="mt-2">
            <? foreach ($output as $index => $label) { ?>
              <li class="mb-2">
                <span class="text-grey-light">
                  <? echo ($index == $label) ? '-' : $label; ?>
                </span>
              </li>
            <? } ?>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="js/plugins.js"></script>

</body>

</html>