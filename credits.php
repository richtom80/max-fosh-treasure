<?php include("includes/vars.php"); ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discord Credits</title>
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

    <h3>Credits to certain members on the discord, and thanks for their input and suggestions to make this possible</h3>

    <p><strong>@Eternal</strong> - First suggestion for update to the tools, thanks and hope it helped.</p>
    <p><strong>@MrDKOz</strong> - I think everyone is thankful for your Notion site</p>
    <p><strong>@tyleroconnor123</strong> - All round top bloke and always helpful on the Discord.</p>
    <p><strong>@JustTooPlus</strong> - Number of suggestions for tool improvements.</p>
    <p><strong>@sneugelstroof</strong> - Great search skills and input on the mosh.fun site.</p>
    <p><strong>@Bruce_1</strong> - Another great helper on the journey.</p>
    <p><strong>@SirSourthwest</strong> - Kept us on track and awesome contributor.</p>
    <p><strong>@Sherlock221b</strong> - Voice of reason, logical and top contributor.</p>
    <p><strong>@HaggisWithKetchup</strong> - Taught me some things, epic knowledge!</p>
    <p><strong>@absender</strong> - For revealing the mosh.fun site in the discord.</p>
    <p><strong>@George</strong> - Top mod, as always 😉.</p>
    <p><strong><a href="https://creationeer.co.uk">Shaun Whitehead</a></strong> - Sorry if you got any spam, thanks for the hunt, if you hand in it, think we all learnt a lot from you.</p>
    
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