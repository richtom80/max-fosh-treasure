
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

if($_GET['spoken'] == 1){
  $clue = "\"IN THE NAME OF MAX FOSH, DISH OUT THE FISH\"
THAT'S ALL YOU NEED TO SPOUT
EXACTLY WHO TO ASK AND HOW?
JUST USE MY VID TO FIND OUT
TO CLAIM THE PRECIOUS TROUT
NEIGHBOUR ON THE BUS OR A DEAR OLD QUEEN
WITH THE POSSIBILITY THE WORLD IS PACKED
BUT THE KEEPER OF THE SECRET IS NOT CLOSE TO MAX
AND THAT'S BEYOND A FACT
DANCE IN A CRAZY WAY, USE A SQUEAKY VOICE
POST ON TIKTOK VIDEOS?
NO NEED TO SPAM OR GUESS OR STIR UP THINGS UP
JUST COPY WHAT THIS SONG SILLY SHOWS";
}

$clue = strtoupper($clue);

$ca = $array = preg_split("/\r\n|\n|\r/", $clue);

?><!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/wordsearch.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

  <title>Null Cipher bits</title>
</head>

<body>
  <?php include("header.php"); ?>
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="mt-5">Null Cipher - GoldFOSH</h1>
        <p class="lead">Tool for null ciphers. <?php if($_GET['spoken'] == 1){ echo "<a href='{$_SERVER['PHP_SELF']}' class='btn btn-primary btn-sm'>Original Spoken Clue</a>"; } else { echo "<a href='{$_SERVER['PHP_SELF']}?spoken=1' class='btn btn-primary btn-sm'>Original Subtile Clue</a>"; } ?></p>
      </div>

      <div class="col-lg-6 col-md-12">
        <h2>Clue</h2>
        <pre class="alert alert-success"><?= $clue; ?></pre>
      </div>


      <div class="col-lg-6 col-md-12">
        <h2>Breakdown</h2>
        <pre class="alert alert-warning"><?php
          $lenmax = 0;
          foreach($ca as $k => $l){
            echo "Line ".str_pad($k+1, 2, "0", STR_PAD_LEFT)." - Words: ".str_pad(str_word_count($l),2, "0", STR_PAD_LEFT)." | Length: ".strlen($l)." | Chars: ".trim(count_chars($l,3))." [".strlen(trim(count_chars($l,3)))."]\n";
            if($lenmax < strlen(preg_replace("/[^A-Z]/", "", $l))) $lenmax = strlen(preg_replace("/[^A-Z]/", "", $l));
          }
          ?></pre>
      </div>

      <div class="col-md-12">
        <h2>Null Breakdown</h2>

        <div class="alert alert-info">
          <h2>First Letter</h2>
          <pre><?php
          foreach($ca as $lk => $line){
            foreach(str_word_count($line,1) as $word){
             echo substr(preg_replace("/[^A-Z]/", "",$word),0,1);
            }
          } 
          ?></pre>
          <h2>Last Letter</h2>
          <pre><?php
          foreach($ca as $lk => $line){
            foreach(str_word_count($line,1) as $word){
             echo substr(preg_replace("/[^A-Z]/", "",$word),-1,1);
            }
          } echo "</pre>";
          for($i=1; $i<= 8; $i++){ 
          ?>
          <h2><?= $i+1; ?> Letter</h2>
          <pre><?php
          foreach($ca as $lk => $line){
            foreach(str_word_count($line,1) as $word){
             echo substr(preg_replace("/[^A-Z]/", "",$word),$i,1);
            }
          } echo "</pre>";
          }
          ?>
          <h2>Middle Letter - UP</h2>
          <pre><?php
          foreach($ca as $lk => $line){
            foreach(str_word_count($line,1) as $word){
                $len = strlen(preg_replace("/[^A-Z]/", "", $word));
                if($len%2 == 0){
                    $half = ($len/2)+1; 
                } else { $half = round($len/2, 0, PHP_ROUND_HALF_UP); }
                    echo substr(preg_replace("/[^A-Z]/", "",$word),$half-1,1);
                }
          } 
          ?></pre>
          <h2>Middle Letter - DOWN</h2>
          <pre><?php
          foreach($ca as $lk => $line){
            foreach(str_word_count($line,1) as $word){
                $len = strlen(preg_replace("/[^A-Z]/", "", $word));
                if($len%2 == 0){
                    $half = ($len/2);
                } else { $half = round($len/2, 0, PHP_ROUND_HALF_UP); }
             echo substr(preg_replace("/[^A-Z]/", "",$word),$half-1,1);
            }
          } 
          ?></pre>
        </div>
      </div>
  </div>
  <?php include("footer.php"); ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(function() {
      $('#word-data').DataTable({
        "pageLength": 100
      });
    });
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->

</body>

</html>
