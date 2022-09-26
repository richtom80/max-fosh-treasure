
<?php

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
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 style="margin: 1em 0;">Word Search - GoldFOSH</h1>
        <p>Quick tool to search through the clue from the vid. Also the <a href="/">W3W combo solver from last hunt</a>.
        </p>
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
        <h2>Word Search</h2>

        <div class="alert alert-info">
          <p>Use the arrow spaces to move the lines, if it helps.  Click once to add letter to scratchpad, double click to highlight. This is probably better on desktop rather than mobile. Also there is no state management, so refreshing the page will loose anything you've done.</p>
          <p><a href="wordsearch.php" class="btn btn-primary btn-sm">Original Grid</a></p>
          <?php
          $rl = ($lenmax + 12) * 30;
          foreach($ca as $line){
            echo "<div class='row' style='min-width: ".$rl."px; margin: 0 auto'>\n";
            echo "<div class='char-box-blank rarrow'>&rarr;</div>\n";
            echo "<div class='char-box-blank rarrow'>&rarr;</div>\n";
            echo "<div class='char-box-blank rarrow'>&rarr;</div>\n";
            echo "<div class='char-box-blank rarrow'>&rarr;</div>\n";
            echo "<div class='char-box-blank rarrow'>&rarr;</div>\n";
            echo "<div class='char-box-blank rarrow'>&rarr;</div>\n";
            $lc = 1;
            $lt = preg_replace("/[^A-Z]/", "", $line);
            foreach(str_split($lt) as $char){
              echo "<div class='char-box'>$char</div>\n";
              $lc++;
            }
            for($i = 0; $i <= $lenmax - $lc; $i++){
              echo "<div class='char-box-blank larrow'>&larr;</div>\n";
            }
            echo "<div class='char-box-blank larrow'>&larr;</div>\n";
            echo "<div class='char-box-blank larrow'>&larr;</div>\n";
            echo "<div class='char-box-blank larrow'>&larr;</div>\n";
            echo "<div class='char-box-blank larrow'>&larr;</div>\n";
            echo "<div class='char-box-blank larrow'>&larr;</div>\n";
            echo "<div class='char-box-blank larrow'>&larr;</div>\n";
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
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-1139617-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-1139617-1');
</script>
</body>

</html>
