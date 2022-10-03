
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
        <h1 class="mt-5">Jumbler - GoldFOSH</h1>
        <p class="lead"><?php if($_GET['spoken'] == 1){ echo "<a href='{$_SERVER['PHP_SELF']}' class='btn btn-primary btn-sm'>Original Spoken Clue</a>"; } else { echo "<a href='{$_SERVER['PHP_SELF']}?spoken=1' class='btn btn-primary btn-sm'>Original Subtile Clue</a>"; } ?></p>
      </div>

      <div class="col-lg-6 col-md-12">
        <h2>Clue</h2>
        <pre class="alert alert-success"><?= $clue; ?></pre>
      </div>

    </div>
  </div>
  <?php include("footer.php"); ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script type = "text/javascript" >

  "use strict";

  $(function() {

    var getTextNodesIn = function(el) {
      return $(el).find(":not(iframe,script)").addBack().contents().filter(function() {
        return this.nodeType == 3;
      });
    };

    // var textNodes = getTextNodesIn($("p, h1, h2, h3"));
    var textNodes = getTextNodesIn($("*"));



    function isLetter(char) {
      return /^[\d]$/.test(char);
    }


    var wordsInTextNodes = [];
    for (var i = 0; i < textNodes.length; i++) {
      var node = textNodes[i];

      var words = []

      var re = /\w+/g;
      var match;
      while ((match = re.exec(node.nodeValue)) != null) {

        var word = match[0];
        var position = match.index;

        words.push({
          length: word.length,
          position: position
        });
      }

      wordsInTextNodes[i] = words;
    };


    function messUpWords() {

      for (var i = 0; i < textNodes.length; i++) {

        var node = textNodes[i];

        for (var j = 0; j < wordsInTextNodes[i].length; j++) {

          // Only change a tenth of the words each round.
          if (Math.random() > 1 / 10) {

            continue;
          }

          var wordMeta = wordsInTextNodes[i][j];

          var word = node.nodeValue.slice(wordMeta.position, wordMeta.position + wordMeta.length);
          var before = node.nodeValue.slice(0, wordMeta.position);
          var after = node.nodeValue.slice(wordMeta.position + wordMeta.length);

          node.nodeValue = before + messUpWord(word) + after;
        };
      };
    }

    function messUpWord(word) {

      if (word.length < 3) {

        return word;
      }

      return word[0] + messUpMessyPart(word.slice(1, -1)) + word[word.length - 1];
    }

    function messUpMessyPart(messyPart) {

      if (messyPart.length < 2) {

        return messyPart;
      }

      var a, b;
      while (!(a < b)) {

        a = getRandomInt(0, messyPart.length - 1);
        b = getRandomInt(0, messyPart.length - 1);
      }

      return messyPart.slice(0, a) + messyPart[b] + messyPart.slice(a + 1, b) + messyPart[a] + messyPart.slice(b + 1);
    }

    // From https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
    function getRandomInt(min, max) {

      return Math.floor(Math.random() * (max - min + 1) + min);
    }


    setInterval(messUpWords, 50);
  });

</script>
  <!-- Global site tag (gtag.js) - Google Analytics -->

</body>

</html>
