<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cd.php";

    $app = new Silex\Application();

    $app->get("/", function() {
      $first_cd = new CD("Master of Reality", "Black Sabbath", "/images/reality.jpg");
      $second_cd = new CD("Electric Ladyland", "Jimi Hendrix", "/images/ladyland.jpg");
      $third_cd = new CD("Nevermind", "Nirvana", "/images/nevermind.jpg");
      $fourth_cd = new CD("I don't get it", "Pork Lion", "/images/porklion.jpg", 49.99);
      $fourth_cd->setPrice("1.3925");

      $cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);

      $output = "";
      foreach ($cds as $album) {
          $output = $output . "<head><link rel='stylesheet' href='css/styles.css'></head><div class='row'>
                <div class='col-md-6'>
                    <img src=" . $album->getCoverArt() . ">
                </div>
                <div class='col-md-6'>
                    <p>" . $album->getTitle() . "</p>
                    <p>By " . $album->getArtist() . "</p>
                    <p>$" . $album->getPrice() . "</p>
                </div>
            </div>
            ";
      }
      return $output;
    });

    return $app;
?>
