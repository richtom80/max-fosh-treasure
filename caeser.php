
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

function Encipher($input, $key){
	$output = "";

	$inputArr = str_split($input);
	foreach ($inputArr as $ch)
		$output .= Cipher($ch, $key);

	return $output;
}

function Cipher($ch, $key){
	if (!ctype_alpha($ch))
		return $ch;

	$offset = ord(ctype_upper($ch) ? 'A' : 'a');
	return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

?><!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/wordsearch.css">

  <title>Caeser Cypher</title>
</head>

<body>
	<?php include("header.php"); ?>
  <div class="container">
    <div class="row">

			<div class="col-md-12">
        <h1 class="mt-5">Caeser Cypher</h1>
        <p class="lead">Quick tool to add all 26 caeser character shift cypher to clues.</p>
      </div>

      <div class="col-md-12">
        <div class="alert alert-success">
          <h2>Input</h2>
          <form action="" method="post">
            <textarea name="input" class="form-control" rows="13"><?= $clue; ?></textarea>
            <button type="submit" class="btn btn-primary btn-sm">Cypherise</button>
          </form>
        </div>
      </div>



      <?php for($i = 1; $i <= 26; $i++){ ?>
      <div class="col-md-12">
        <div class="alert alert-warning">
          <h2>Output A&rarr;<?= $i; ?></h2>
          <pre><?= Encipher($_POST['input'],$i); ?></pre>
        </div>
      </div>
      <?php } ?>


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

    });
  </script>

</body>

</html>
