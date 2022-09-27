
<?php

include("includes/vars.php");

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

  <title>Word Info - GoldFOSH</title>
</head>

<body>
  <?php include("header.php"); ?>
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="mt-5">Word Info - GoldFOSH</h1>
        <p class="lead">Breakdown and definition of each word including length of word, lines it occurs in, number of occurrences in the clue and expanded definitions.</p>
      </div>

      <div class="col-lg-6 col-md-12">
        <h2>Clue</h2>
        <pre class="alert alert-success"><?= $clue; ?></pre>
      </div>

      <div class="col-lg-6 col-md-12">
        <h2>Breakdown</h2>
        <pre class="alert alert-warning"><?php
          $lenmax = 0;
          $words = 0;
          foreach($ca as $k => $l){
            echo "Line ".str_pad($k+1, 2, "0", STR_PAD_LEFT)." - Words: ".str_pad(str_word_count($l),2, "0", STR_PAD_LEFT)." | Length: ".strlen($l)." | Chars: ".trim(count_chars($l,3))." [".strlen(trim(count_chars($l,3)))."]\n";
            if($lenmax < strlen(preg_replace("/[^A-Z]/", "", $l))) $lenmax = strlen(preg_replace("/[^A-Z]/", "", $l));
            $words += str_word_count($l);
          }
          ?></pre>
      </div>

      <div class="col-sm-12">
        <div class="alert alert-info">
          <p>Words: <?= $words; ?></p>
          <table class="table table-striped table-bordered">
            <thead class="table-dark">
              <tr>
                <th>Word</th>
                <th>Length</th>
                <th>Line</th>
                <th>Occurrences</th>
                <th>Expand</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $word_array = array();
            foreach($ca as $k => $line){
              foreach(str_word_count($line,1) as $word){
                ?>
              <tr>
                <td><a href="https://www.wordnik.com/words/<?= strtolower($word); ?>" target="_blank"><?= $word; ?></a></td>
                <td><?= strlen($word); ?></td>
                <td><?php foreach($words_array[$word]['line'] as $line) { echo $line.", "; }?></td>
                <td><?= $words_array[$word]['count']; ?></td>
                <td>
                  <table class="table table-sm  table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>Definition</th>
                        <th>Type</th>
                        <th>Synonyms</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $wd = json_decode($words_array[$word]['json'],true);
                    foreach($wd['results'] as $r){ ?>
                      <tr>
                        <td><?= $r['definition']; ?></td>
                        <td><?= ucwords($r['partOfSpeech']); ?></td>
                        <td><?php foreach($r['synonyms'] as $s){ echo $s.", "; } ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </td>
              </tr>
            <?php } } ?>
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
      $('.char-box').click(function(e) {
        var letter = $(this).html();
        $('#scratchpad').val($('#scratchpad').val()+letter);
      });

      $('.char-box').dblclick(function(e) {
        $(this).toggleClass('char-box-click');
        $('#scratchpad').val($('#scratchpad').val().slice(0,-2));
      });
      $('body').on("click", ".larrow", function(){
        $(this).closest('.row').prepend("<div class='char-box-blank rarrow'>&rarr;</div>");
        $(this).remove();
      });
      $('body').on("click", ".rarrow", function(){
        $(this).closest('.row').append("<div class='char-box-blank larrow'>&larr;</div>");
        $(this).remove();
      });
    });
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->

</body>

</html>
