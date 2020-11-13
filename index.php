<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>
    <title>Manipuler JSON en PHP</title>
</head>
<body>
    <?php
    # Afficher les erreurs
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>



    <div class="ui three column doubling stackable grid container">
    <h3><br>Computer science figures</h3>
    <div class="ui link cards">
    <?php

    use League\Csv\Reader;

    require 'vendor/autoload.php';

    /* $fichierCSV = fopen("cs_figures.csv","r");
    $figures = fgetcsv($fichierCSV); */

    $figures = Reader::createFromPath('cs_figures.csv', 'r');
    $figures->setHeaderOffset(0);

    $fig = $figures;
    foreach ($fig as $figData) {
      ?>

<div class="card">
    <div class="image">
      <img src="<?php echo $figData['picture']; ?>">
    </div>
    <div class="content">
      <div class="header"><?php echo $figData['name']; ?></div>
      <div class="meta">
        <a><?php echo $figData['title']; ?></a>
      </div>
      <div class="description">
      <?php echo $figData['role']; ?>
      </div>
    </div>
    <div class="extra content">
      <span class="right floated">Born in 
      <?php echo $figData['birthyear']; ?>
    </div>
  </div>

      <?php
    
    }

    ?>

  </div>

</div>

</body>
</html>