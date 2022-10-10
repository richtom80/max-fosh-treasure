
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

if($_GET['transcribed'] == 1){
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

$words_json = file_get_contents("words.json");
$words_array = json_decode($words_json, true);

?><!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/wordsearch.css">

  <title>Alphabet Info - GoldFOSH</title>
</head>

<body>
  <?php include("header.php"); ?>
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="mt-5">Alphabet Analysis - GoldFOSH</h1>
        <p class="lead">Alphabet analysis line by line. Click line to highlight row.<br/>
        <?php if($_GET['transcribed'] != 1){ ?>
        <a href="clue-alphabet.php?transcribed=1" class="btn btn-primary btn-sm">Transcribed text</a></p>
        <?php } else { ?>
            <a href="clue-alphabet.php" class="btn btn-primary btn-sm">Spoken text</a></p>
        <?php } ?>
      </div>

      <div class="col-md-12">
        <h2>Clue</h2>
        <div class="alert alert-success">
          <?php foreach($ca as $k => $line){
            echo "<div id='clue-line-".($k+1)."'>Line ".($k+1).": ";
              foreach(str_word_count($line,1) as $word){
                echo $word." ";
              }
              echo "</div>";
            }
            ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-info table-responsive">
          <table class="table table-striped table-bordered table-sm table-hover" style="width:auto;">
            <thead class="table-dark">
                <tr>
                  <th style='width: 5em'>Line</th>
                  <?php for($a = 1; $a <= 26; $a++){ echo "<th style='width: 2em'>".chr($a+64)."</th>"; } ?>
                </tr>
              </thead>
              <tbody>
            <?php
            foreach($ca as $k => $line){
                $line_char_count = count_chars(preg_replace("/[^A-Z]/", "", $line),1);
              ?>
                <tr data-rowid="<?= $k+1; ?>">
                    <td class='line-row'><?= $k+1; ?></td>
                    <?php for($a = 1; $a <= 26; $a++){ echo "<td>".$line_char_count[$a+64]."</td>"; } ?>
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

  <script>
    $(function() {

      $('tbody td').click(function(e) {
        let trpartent = $(this).closest('tr');
        let trrowid = trpartent.data('rowid');
        trpartent.toggleClass('table-warning');
        $('#clue-line-'+trrowid).toggleClass('bg-warning');
      });
    });
    </script>

</body>

</html>
