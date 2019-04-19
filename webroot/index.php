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
      <div class="border-b px-6">
        <div class="flex justify-start -mb-px">
          <div class="flex w-4/5 pt-6">
            
            <div class="sm:flex w-full">
              <h3 class="text-2xl text-white font-semibold mr-5 md:flex sm:block">
                Wind Turbine
              </h3>

              <div class="pt-1">
                <span class="text-sm text-blue-lighter item-count">
                  <?php echo sprintf("%d item%s", count($output), count($output) === 1 ? '' : 's') ?>
                </span>
              </div>
            </div>

          </div>
          <div class="w-1/5">
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

        <div class="w-full mb-3 mt-2">
          <button data-filter="empty" class="bg-indigo-dark hover:bg-indigo text-grey-lightest font-bold py-2 px-4 rounded text-xs mr-2 mb-2 md:inline-block sm:block block">Show Empty</button>
          <button data-filter="matches" class="bg-indigo-dark hover:bg-indigo text-grey-lightest font-bold py-2 px-4 rounded text-xs mr-2 mb-2 md:inline-block sm:block block">Show Matches</button>
          <button data-filter="all" class="bg-indigo-dark hover:bg-indigo text-grey-lightest font-bold py-2 px-4 rounded text-xs mb-2 cursor-not-allowed opacity-50 md:inline-block sm:block block">Show All</button>
        </div>

      </div>
      <div>
        <div class="px-6 py-2 text-blue-lighter mb-4">
          <ol class="mt-2 list-reset">
            <? foreach ($output as $index => $label) { ?>
              <li class="mb-2 truncate">
                <span class="pr-2"><? echo str_replace('~', '&nbsp;', str_pad($index, 3, '~', STR_PAD_LEFT)); ?>.</span>
                <span class="text-grey-light result">
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
  <script src="js/app.js"></script>

</body>

</html>
