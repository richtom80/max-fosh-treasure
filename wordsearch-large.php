
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

?><!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/wordsearch.css">

  <title>Word Search</title>
</head>

<body>
  <?php include("header.php"); ?>
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="mt-5">Word Search - GoldFOSH</h1>
        <p class="lead">Large format grid with character numbers. <?php if($_GET['spoken'] == 1){ echo "<a href='{$_SERVER['PHP_SELF']}' class='btn btn-primary btn-sm'>Original Spoken Clue</a>"; } else { echo "<a href='{$_SERVER['PHP_SELF']}?spoken=1' class='btn btn-primary btn-sm'>Original Subtile Clue</a>"; } ?></p>
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
            if($lenmax < strlen($l)) $lenmax = strlen($l);
          }
          ?></pre>
      </div>

      <div class="col-md-12">
        <h2>Word Search</h2>

        <div class="alert alert-info">
          <p>Use the arrow spaces to move the lines, if it helps.  Click once to add letter to scratchpad, double click to highlight. This is probably better on desktop rather than mobile.  Also there is no state management, so refreshing the page will loose anything you've done.</p>
          <p><a href="wordsearch.php" class="btn btn-primary btn-sm">Grid without spaces</a></p>
          <?php
          $rl = $lenmax * 50;
          foreach($ca as $line){
            echo "<div class='row' style='min-width: ".$rl."px; margin: 0 auto'>\n";
            $lc = 1;
            $lt = $line;
            foreach(str_split($lt) as $char){
              echo "<div class='char-box-lg'>
                <div class='char-numb'>".(((ord(strtolower($char)) - 96) < 0) ? 0 : (ord(strtolower($char)) - 96))."</div>
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

      <div class="col-sm-12">
        <h2>Scratchpad</h2>
        <div class="alert alert-success">
          <textarea id="scratchpad" class="form-control" rows="8" placeholder="Click the characters above to add to the scratchpad, or double click to highlight"></textarea>
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
        $(this).closest('.row').prepend("<div class='char-box-blank char-box-lg rarrow'>&rarr;</div>");
        $(this).remove();
      });
      $('body').on("click", ".rarrow", function(){
        $(this).closest('.row').append("<div class='char-box-blank char-box-lg larrow'>&larr;</div>");
        $(this).remove();
      });
    });
  </script>

</body>

</html>
