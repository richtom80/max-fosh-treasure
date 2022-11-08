<?php include("includes/vars.php"); ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>So long and thanks for all the fish!</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@300&display=swap');
    body{
        background-color: #404258;
        color: #efefef;
        text-align: center;
        font-family: 'Raleway', sans-serif;
        font-size: 1.2em;
    }
    a, a:link, a:visited, a:hover{
        color: #eee;
    }
    #so-long{
        width: 20vw;
        margin-top: 5vh;
    }
    h1, h2{
        font-family: 'Pacifico', cursive;
        font-size: 4em;
        margin: 0em 0;
        padding: 0;
        color: #E94E1B;
    }
    h2{ color: #F28B17; }

    @media only screen and (max-width: 600px) {

        #so-long{
            width: 80vw;
            margin-top: 2vh;
        }
        h1, h2{
            font-size: 2em;
        }
    }
</style>
<body>

    <div><img src="assets/images/solong.svg" id="so-long" /></div>
    <h1>So Long!</h1>
    <h2>And thanks for all the fish</h2>

    <p>Just wanted to say thank you all for the fun hunt and congratulations to the winner, met some awesome people on the way.</p>
    <p>I am leaving the site up for some time, but as is a test domain, it may pull it down at any point.</p>
    <p>The link to <a href="w3w.php">access the site is here</a> and the code for everything can still be found on the <a href="https://github.com/richtom80/max-fosh-treasure">GitHub</a></p>
    <p>Until next time, take care and happy hunting!</p>
    <p>Richard Thompson (aka richtom80)</p>
    
</body>


<script async src="https://www.googletagmanager.com/gtag/js?id=<?= GOOGLE_ANALYTICS; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', '<?= GOOGLE_ANALYTICS; ?>');
  </script>

</html>