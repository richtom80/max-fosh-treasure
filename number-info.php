
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

use Romans\Filter\IntToRoman;
$filter = new IntToRoman();

function gemletter($in) {
    $values = array(
      'a' => 6,
      'b' => 12,
      'c' => 18,
      'd' => 24,
      'e' => 30,
      'f' => 36,
      'g' => 42,
      'h' => 48,
      'i' => 54,
      'j' => 60,
      'k' => 66,
      'l' => 72,
      'm' => 78,
      'n' => 84,
      'o' => 90,
      'p' => 96,
      'q' => 102,
      'r' => 108,
      's' => 114,
      't' => 120,
      'u' => 126,
      'v' => 132,
      'w' => 138,
      'x' => 144,
      'y' => 150,
      'z' => 156,
    );
    return $values[$in];
  }

  $heb_array = array (
     'a' =>	1
    ,'b' =>	2
    ,'c' =>	8
    ,'d' =>	4
    ,'e' =>	5
    ,'f' =>	80
    ,'g' =>	3
    ,'h' =>	5
    ,'i' =>	10
    ,'j' =>	10
    ,'k' =>	20
    ,'l' =>	30
    ,'m' =>	40
    ,'n' =>	50
    ,'o' =>	70
    ,'p' =>	80
    ,'q' =>	100
    ,'r' =>	200
    ,'s' =>	60
    ,'t' =>	9
    ,'u' =>	6
    ,'v' =>	6
    ,'w' =>	6
    ,'x' =>	60
    ,'y' =>	10
    ,'z' =>	7
  );

  $scrabble_array = array(
    'A' => 1,
    'B' => 3,
    'C' => 3,
    'D' => 2,
    'E' => 1,
    'F' => 4,
    'G' => 2,
    'H' => 4,
    'I' => 1,
    'J' => 8,
    'K' => 5,
    'L' => 1,
    'M' => 3,
    'N' => 1,
    'O' => 1,
    'P' => 3,
    'Q' => 10,
    'R' => 1,
    'S' => 1,
    'T' => 1,
    'U' => 1,
    'V' => 4,
    'W' => 4,
    'X' => 8,
    'Y' => 4,
    'Z' => 10
  );

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

  <title>Number bits</title>
</head>

<body>
  <?php include("header.php"); ?>
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="mt-5">Number Analysis - GoldFOSH</h1>
        <p class="lead">Tool for simple number substitution of letters. <?php if($_GET['spoken'] == 1){ echo "<a href='{$_SERVER['PHP_SELF']}' class='btn btn-primary btn-sm'>Original Spoken Clue</a>"; } else { echo "<a href='{$_SERVER['PHP_SELF']}?spoken=1' class='btn btn-primary btn-sm'>Original Subtile Clue</a>"; } ?></p>
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
        <h2>Breakdown Simple</h2>

        <div class="alert alert-info">
          <p>Simple substitution (e.g. A=1, B=2, &hellip;)</p>

          <?php
          $wa = array();
          foreach($ca as $lk => $line){
            $lc = 0;

            foreach(str_word_count($line,1) as $word){
              $wc = 0;
              $gc = 0;
              $sac = 0;
              $hgc = 0;
              $lt = preg_replace("/[^A-Z ]/", "", $word);
              foreach(str_split($lt) as $char){
                $cn = (((ord(strtolower($char)) - 96) < 0) ? 0 : (ord(strtolower($char)) - 96));
                $lc += $cn;
                $wc += $cn;
                $gc += gemletter(strtolower($char));
                $sac += $scrabble_array[$char];
                $hgc += $heb_array[strtolower($char)];
                echo $char."<sup>$cn</sup> ";
              }
              $wa[$wc][$word]['line'][]= $lk+1;
              $wa[$wc][$word]['gem'] = $gc;
              $wa[$wc][$word]['hgem'] = $hgc;
              $wa[$wc][$word]['scrabble'] = $sac;
              echo "<strong>[$word]<sup>$wc</sup></strong> ";
            }
            echo " - <em><b>LINE TOTAL: $lc</b></em><br/>";
          } ksort($wa);
          ?>
        </div>
      </div>

      <div class="col-md-12">
        <div class="alert alert-warning table-responsive">
          <table class="table table-bordered table-striped" id="word-data">
            <thead>
              <tr>
                <th>Count</th>
                <th>Chars</th>
                <th>Word</th>
                <th>Lines</th>
                <th>Roman</th>
                <th>Gematria</th>
                <th>Scrabble</th>
              </tr>
            </thead>
            <tbody>
              <?php
                      $cword = 0;
                      foreach($wa as $k => $l){
                        foreach($l as $kl => $kw){ ?>
              <tr <?= ($cword != $k) ? "style='border-top: solid #333'" : ""; ?>>
                <td><?= $k; ?></td>
                <td><?= strlen($kl); ?></td>
                <td><?= $kl; ?></td>
                <td><?php array_map(function($lines) { echo "$lines, "; }, $kw[line]); ?></td>
                <td><?= $filter->filter($k); ?></td>
                <td><?= $kw['hgem']; ?></td>
                <td><?= $kw['scrabble']; ?></td>
              </tr>
              <?php $cword = $k; } } ?>
            </tbody>
          </table>
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
