
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

$clue = strtoupper($clue);

$ca = $array = preg_split("/\r\n|\n|\r/", $clue);

$words_json = file_get_contents("words.json");
$words_array = json_decode($words_json, true);

use DaveChild\TextStatistics as TS;
$textStatistics = new TS\TextStatistics;

$syl = new TS\Syllables();
$syl::$arrProblemWords['packed'] = 1;
$syl::$arrProblemWords['queen'] = 1;
$syl::$arrProblemWords['squeaky'] = 2;


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
        <h1 class="mt-5">Word Analysis - GoldFOSH</h1>
        <p class="lead">Breakdown and definition of each word including length of word, lines it occurs in, number of occurrences in
          the clue and expanded definitions. Click the word in the clue to jump to the word analysis.<br/>
        <a href="clue-info-transcription.php" class="btn btn-primary btn-sm">Transcribed text</a></p>
      </div>

      <div class="col-md-12">
        <h2>Clue</h2>
        <div class="alert alert-success">
          <?php foreach($ca as $k => $line){
            echo "Line ".($k+1).": ";
              foreach(str_word_count($line,1) as $word){
                $wac[$word] += 1;
                echo "<a href=\"#".urlencode($word.$wac[$word])."\" class='wcc'>".$word."</a> ";
                $words++;
              }
              echo "</br>";
            }
            ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-info table-responsive">
          <table class="table table-striped table-bordered ">

            <?php
            $table_id = 1;
            $lct = 0;
            foreach($ca as $k => $line){
              $wc = 0;
              $sc = 0;
              $lc = 0;
              ?>
              <thead class="table-dark">
                <tr>
                  <th>Word</th>
                  <th>Syl</th>
                  <th>Chr</th>
                  <th>Line</th>
                  <th>Occur.</th>
                  <th>Expand</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach(str_word_count($line,1) as $word){
                $wa[$word] += 1; $wc++;
                ?>
              <tr>
                <td><a href="https://www.wordnik.com/words/<?= strtolower($word); ?>" target="_blank" id="<?= $word.$wa[$word]; ?>"><?= $word; ?></a></td>
                <td><?php $sc += $syl::syllableCount(strtolower($word)); echo  $syl::syllableCount(strtolower($word)); ?></td>
                <td><?php $lc += strlen($word); echo strlen($word); ?></td>
                <td><?php foreach($words_array[$word]['line'] as $line) { echo $line.", "; }?></td>
                <td><?= $words_array[$word]['count']; ?></td>
                <td width="60%">
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#table-<?= $table_id; ?>">Display</button>
                  <table class="table table-sm table-hover table-bordered table-striped collapse" id="table-<?= $table_id; ?>">
                    <thead>
                      <tr>
                        <th>Definition</th>
                        <th width="5%">Speach</th>
                        <th width="15%">Synonyms</th>
                        <th width="15%">Type</th>
                        <th width="15%">Has</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $wd = json_decode($words_array[$word]['json'],true);
                    foreach($wd['results'] as $r){ ?>
                      <tr>
                        <td><?= $r['definition']; ?></td>
                        <td><?= ucwords($r['partOfSpeech']); ?></td>
                        <td><?php foreach($r['synonyms'] as $s){ echo $s.", "; } ?></td>
                        <td><?php foreach($r['typeOf'] as $t){ echo $t.", "; } ?></td>
                        <td><?php foreach($r['hasTypes'] as $h){ echo $h.", "; } ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </td>
              </tr>
            <?php $table_id++; } $lct += $lc; ?>
            </tbody>
              <tr class="table-warning">
                <th>Words: <?= $wc; ?></th>
                <td><?= $sc; ?></td>
                <td><?= $lc; ?></td>
                <td colspan="3"><strong>Used Chr:</strong>
                  <?php
                  $replace = count_chars(preg_replace("/[^A-Z]/", "", $ca[$line-1]),1);
      						arsort($replace);
      						foreach($replace as $k => $v){
      							echo chr($k)."<sup>$v</sup> ";
      						} ?>
                  | <strong>Unused Chr:</strong>
                  <?php
                  echo preg_replace("/[^A-Z]/", "", count_chars(preg_replace("/[^A-Z]/", "", $ca[$line-1]),4));
      						?>
                </td>
              </tr>
          <?php } ?>
            <tfoot class="table-dark">
              <tr>
                <th>Words: <?= $words; ?></th>
                <th><?= $syl::syllableCount(strtolower($clue)); ?></th>
                <th><?= $lct; ?></th>
                <th colspan="3">
                  <strong>Used Chr:</strong>
                  <?php
                  $replace = count_chars(preg_replace("/[^A-Z]/", "", $clue),1);
      						arsort($replace);
      						foreach($replace as $k => $v){
      							echo chr($k)."<sup>$v</sup> ";
      						} ?>
                </th>
              </tr>
              <tr>
                <th colspan="6">
                  <?php
                  foreach($words_array as $wk => $w){ $was[$wk] = $w['count']; }
                  arsort($was);
                  foreach($was as $wask => $wasv){ echo $wask."<sup>$wasv</sup> "; }
                  ?>
                </th>
              </tr>
            </tfoot>
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

</body>

</html>
