<?php

list($one,  $two, $three) = explode(".", $_GET['search']);
include("includes/vars.php");
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <title>W3W Search</title>
  </head>
  <body>

  <?php include("header.php"); ?>

  <div class="container">
    <div class="row">
      <main class="col-md-12">
        <h1 class="mt-5">What3Words</h1>
        <p class="lead">This site has been put together to search what3words.com for possible clues in the Max Fosh Treasure Hunt. It takes your search terms and jumbles them in all the possible orders, it is designed to be used with all three words
        <p>There is also a <a href="wordsearch.php">word search tool</a>.</p>
      </main>
      <div class="col-md-4 col-sm-12">
        <form name="w3wsearch">
          <div class="form-group">
            <label for="one">First Word</label>
            <input type="text" class="form-control" name="one" id="one"
              placeholder="Enter your first word, or leave blank" value="<?= $one; ?>" required />
          </div>
          <div class="form-group">
            <label for="two">Second Word</label>
            <input type="text" class="form-control" name="two" id="two"
              placeholder="Enter your second word, or leave blank" value="<?= $two; ?>" required />
          </div>
          <div class="form-group">
            <label for="three">Third Word</label>
            <input type="text" class="form-control" name="three" id="three"
              placeholder="Enter your thrid word, or leave blank" value="<?= $three; ?>" required />
          </div>
          <div class="form-group"><button type="button" id="load-results" class="btn btn-success">Lookup
              Suggestions</button></div>
          <div id="linkHolder" class="alert alert-info" title="Right click to copy link">Lookup to Load Link</div>
        </form>
      </div>
      <div class="col-md-8 col-sm-12">
        <div class="alert alert-success">
          <h4 class="alert-heading">Results</h4>
          <hr />
          <div id="results">
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/assets/js/bootstrap.min.js" ></script>
    <script>
    $(function(){
    	$("#load-results").click(function(){
        $("#results").empty();

    		var searchterm = $("#one").val()+"."+$("#two").val()+"."+$("#three").val();

        $("#linkHolder").html("<strong>Link to this search:</strong> <a href='https://www.richtom80.co.uk/?search="+searchterm+"' target='_blank'>https://www.richtom80.co.uk/?search="+searchterm+"</a>");
        var searchterm2 = $("#one").val()+"."+$("#three").val()+"."+$("#two").val();
        var searchterm3 = $("#three").val()+"."+$("#two").val()+"."+$("#one").val();
        var searchterm4 = $("#three").val()+"."+$("#one").val()+"."+$("#two").val();
        var searchterm5 = $("#two").val()+"."+$("#one").val()+"."+$("#three").val();
        var searchterm6 = $("#two").val()+"."+$("#three").val()+"."+$("#one").val();

        $("#results").append("<h5>"+searchterm+"</h5><ul id='st1'>");
    		$.getJSON('w3w-ajax.php', { search: searchterm }).done(function(e){
          $.each(e, function(i, item){
            $("#st1").append("<li>Words: <strong><a href='https://w3w.co/"+item.words+"' target='_blank'>"+item.words+"</a></strong> | Near: <strong>"+item.nearestPlace+"</strong></li>");
          });
    		});
        $("#results").append("</ul>");

        $("#results").append("<h5>"+searchterm2+"</h5><ul id='st2'>");
    		$.getJSON('w3w-ajax.php', { search: searchterm2 }).done(function(e){
          $.each(e, function(i, item){
            $("#st2").append("<li>Words: <strong><a href='https://w3w.co/"+item.words+"' target='_blank'>"+item.words+"</a></strong> | Near: <strong>"+item.nearestPlace+"</strong></li>");
          });
    		});
        $("#results").append("</ul>");

        $("#results").append("<h5>"+searchterm3+"</h5><ul id='st3'>");
    		$.getJSON('w3w-ajax.php', { search: searchterm3 }).done(function(e){
          $.each(e, function(i, item){
            $("#st3").append("<li>Words: <strong><a href='https://w3w.co/"+item.words+"' target='_blank'>"+item.words+"</a></strong> | Near: <strong>"+item.nearestPlace+"</strong></li>");
          });
    		});
        $("#results").append("</ul>");

        $("#results").append("<h5>"+searchterm4+"</h5><ul id='st4'>");
    		$.getJSON('w3w-ajax.php', { search: searchterm4 }).done(function(e){
          $.each(e, function(i, item){
            $("#st4").append("<li>Words: <strong><a href='https://w3w.co/"+item.words+"' target='_blank'>"+item.words+"</a></strong> | Near: <strong>"+item.nearestPlace+"</strong></li>");
          });
    		});
        $("#results").append("</ul>");

        $("#results").append("<h5>"+searchterm5+"</h5><ul id='st5'>");
    		$.getJSON('w3w-ajax.php', { search: searchterm5 }).done(function(e){
          $.each(e, function(i, item){
            $("#st5").append("<li>Words: <strong><a href='https://w3w.co/"+item.words+"' target='_blank'>"+item.words+"</a></strong> | Near: <strong>"+item.nearestPlace+"</strong></li>");
          });
    		});
        $("#results").append("</ul>");

        $("#results").append("<h5>"+searchterm6+"</h5><ul id='st6'>");
    		$.getJSON('w3w-ajax.php', { search: searchterm6 }).done(function(e){
          $.each(e, function(i, item){
            $("#st6").append("<li>Words: <strong><a href='https://w3w.co/"+item.words+"' target='_blank'>"+item.words+"</a></strong> | Near: <strong>"+item.nearestPlace+"</strong></li>");
          });
    		});
        $("#results").append("</ul>");



    	});
    });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->

  </body>
</html>
