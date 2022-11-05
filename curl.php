
<?php

include("includes/vars.php");
require_once("vendor/autoload.php");

$clue = "\"In the name of Max Fosh, dish out the fish\"
That's all you need to spout
Exactly who to ask and how?
Just use my vid to find out
To claim the precious trout
Neighbour on the bus or a dear old queen
With the possibility the world is packed
But the keeper of the secret is not close to Max
And that's beyond a fact
Dance in a crazy way, use a squeaky voice
Post on TikTok videos?
No need to spam or guess or stir things up
Just copy what this silly song shows";

$clue = strtoupper($clue);

$ca = $array = preg_split("/\r\n|\n|\r/", $clue);

$words_json = file_get_contents("words.json");
$words_array = json_decode($words_json, true);

use DaveChild\TextStatistics as TS;
$textStatistics = new TS\TextStatistics;

$syl = new TS\Syllables();
$syl::$arrProblemWords['packed'] = 1;
$syl::$arrProblemWords['queen'] = 1;
$syl::$arrProblemWords['squeaky'] = 2;


?><!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/wordsearch.css">

  <title>Word Info - GoldFOSH</title>
</head>

<body>
  <?php include("header.php"); ?>
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="mt-5">Word Analysis - GoldFOSH</h1>
        <p class="lead">Breakdown and definition of each word including length of word, lines it occurs in, number of occurrences in
          the clue and expanded definitions. Click the word in the clue to jump to the word analysis.<br/>
        <a href="clue-info-transcription.php" class="btn btn-primary btn-sm">Transcribed text</a></p>
      </div>

      <div class="col-md-12">
        <h2>Clue</h2>
        <div class="alert alert-success">
          <?php foreach($ca as $k => $line){
            echo "Line ".($k+1).": ";
              foreach(str_word_count($line,1) as $word){
                $wac[$word] += 1;
                echo "<a href=\"#".urlencode($word.$wac[$word])."\" class='wcc'>".$word."</a> ";
                $words++;
              }
              echo "</br>";
            }
            ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-info table-responsive">
          <table class="table table-striped">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Response</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($words_array as $word){ ?>
                    <tr>
                        <td>http://mosh.fun/<?= strtolower(preg_replace("/[^A-Z]/", "", $word['word'])); ?>.html / .gif </td>
                        <td><?php 
                        /* disable lookup
                        $url = "http://mosh.fun/".strtolower(preg_replace("/[^A-Z]/", "", $word['word'])).".gif";
                        $handle = curl_init($url);
                        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

                        $response = curl_exec($handle);

                        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        if($httpCode == 404) {
                            echo "No page";
                        } else { 
                            echo "<a href='$url'>$url</a>";
                        }

                        curl_close($handle); */ echo "No page";
                        
                        ?></td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
  <?php include("footer.php"); ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="/assets/js/bootstrap.min.js"></script>

</body>

</html>
