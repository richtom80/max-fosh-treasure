
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
GET on TikTok videos?
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
GET ON TIKTOK VIDEOS?
NO NEED TO SPAM OR GUESS OR STIR UP THINGS UP
JUST COPY WHAT THIS SONG SILLY SHOWS";
}

$clue = strtoupper($clue);

$ca = $array = preg_split("/\r\n|\n|\r/", $clue);

//https://www.quinapalus.com/cgi-bin/jumblefinder?twod=1&minl=5&maxl=31&m0=on&m2=on&m4=on&m1=on&m3=on&bmode=0&text=

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
        <div class="card alert-danger p-3 my-2" >
            <form class="row g-3" method="GET">
              <div class="col-auto">
                <p>Leave every x letter</p>
              </div>
              <div class="col-auto">
                <input type="number" class="form-control" id="ln" name="ln" placeholder="Number" value="<?= $_GET['ln']; ?>">
                <input type="hidden" name="spoken" value="<?= $_GET['spoken']; ?>">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Show</button>
              </div>
              <?php if(!empty($_GET['ln'])){ 
                echo "<h3>Letters Only</h3><pre>";
                $cn = preg_replace("/[^A-Z]/", "", $clue);
                $i = 1;
                foreach(str_split($cn) as $l){
                  if($i%$_GET['ln'] == 0) echo $l;
                  $i++;
                }
                echo "</pre>";
                echo "<h3>All Chars</h3><pre>";
                $cn =$clue;
                $i = 1;
                foreach(str_split($cn) as $l){
                  if($i%$_GET['ln'] == 0) echo $l;
                  $i++;
                }
                echo "</pre>";
                } ?>
            </form>
          </div>
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
          <h2>First Letter Each Line</h2>
          <pre><?php
          foreach($ca as $lk => $line){
            echo substr(preg_replace("/[^A-Z]/", "",$line),0,1);
          } 
          ?></pre>
          <h2>Replace FISH</h2>
          <pre><?php
          foreach($ca as $lk => $line){
            echo preg_replace("/[FISH \"\,\'\?]/", "",$line);
          } 
          ?></pre>
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
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(function() {
      $('pre').dblclick(function(){
        window.open("https://www.quinapalus.com/cgi-bin/jumblefinder?twod=2&minl=5&maxl=31&m0=on&m2=on&m4=on&m1=on&m3=on&bmode=0&text="+$(this).html()+"&dict=0&ent=Search",'_blank').focus();;
      });
    });
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->

</body>

</html>
