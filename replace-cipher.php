
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

  <title>Replace Numerate Cipher</title>
</head>

<body>
  <?php include("header.php"); ?>
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="mt-5">Replace Numerate Cipher - GoldFOSH</h1>
        <p class="lead">Enter a phrase in the box below, the letters are numerated from 1&hellip; and output in the grid with corresponding numbers. <?php if($_GET['spoken'] == 1){ echo "<a href='{$_SERVER['PHP_SELF']}' class='btn btn-primary btn-sm'>Original Spoken Clue</a>"; } else { echo "<a href='{$_SERVER['PHP_SELF']}?spoken=1' class='btn btn-primary btn-sm'>Original Subtile Clue</a>"; } ?></p>
      </div>

      <div class="col-lg-6 col-md-12">
        <h2>Clue</h2>
        <pre class="alert alert-success"><?= $clue; ?></pre>
      </div>

      <div class="col-lg-6 col-md-12">
        <h2>Numerated phrase</h2>
        <form method="get" name="numerated">
            <input type="text" class="form-control" name="p" placeholder="Numerated phrase" value="<?= $_GET['p']; ?>" />
            <button type="submit" class="btn btn-primary mt-2">Numerate</button>
        </form>
      </div>

      <div class="col-md-12 card alert-warning p-2 m-2">
        <?php if(!empty($_GET['p'])){ 
            $unique_chars = array_unique(str_split(strtoupper($_GET['p'])));
            ?>
            <h2>Unique Characters</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <?php $i = 1; $la = array(); foreach($unique_chars as $v){ echo "<th>$v</th>"; $la[$v] = $i; $i++; } ?>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($la as $v){ echo "<td>$v</td>"; } ?>
                    </tr> 
                </tbody>
            </table>
        <? } ?>

        
      </div>
      <?php
          $rl = $lenmax * 50;
          foreach($ca as $line){
            echo "<div class='row' style='min-width: ".$rl."px; margin: 0 auto'>\n";
            $lc = 1;
            $lt = $line;
            foreach(str_split($lt) as $char){
              echo "<div class='char-box-lg'>
                <div class='char-numb'>".$la[strtoupper($char)]."</div>
                $char
                </div>\n";
              $lc++;
            }
            for($i = 0; $i <= $lenmax - $lc; $i++){
              echo "<div class='char-box-lg char-box-blank larrow'>&larr;</div>\n";
            }
            echo "</div>";
          }
          ?>
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
      
    });
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->

</body>

</html>
