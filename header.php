
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Eleventh navbar example">
      <div class="container">
        <a class="navbar-brand" href="/">Max Fosh Treasure Hunt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mfth-navbar" aria-controls="mfth-navbar"  aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mfth-navbar">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?= ($_SERVER['PHP_SELF'] == "/index.php") ? "active" : ""; ?>" aria-current="page" href="/">W3W Search</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/wordsearch.php" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Wordsearches</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown01">
                <li class="nav-item"><a href="/wordsearch.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/wordsearch.php") ? "active" : ""; ?>">No-Spaces</a></li>
                <li class="nav-item"><a href="/wordsearch-spaces.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/wordsearch-spaces.php") ? "active" : ""; ?>">All Chars</a></li>
                <li class="nav-item"><a href="/wordsearch-large.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/wordsearch-large.php") ? "active" : ""; ?>">All Chars Large</a></li>
                <li class="nav-item"><a href="/wordsearch-extra.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/wordsearch-extra.php") ? "active" : ""; ?>">Extra Space</a></li>
                <li class="nav-item"><a href="/wordsearch-textbox.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/wordsearch-textbox.php") ? "active" : ""; ?>">Text Box</a></li>
                <li class="nav-item"><a href="/draggable.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/draggable.php") ? "active" : ""; ?>">Draggable</a></li>
              </ul>
            </li>
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">Analysis</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown02">
                <li class="nav-item"><a href="/clue-info.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/clue-info.php") ? "active" : ""; ?>">Words Analysis</a></li>
                <li class="nav-item"><a href="/number-info.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/number-info.php") ? "active" : ""; ?>">Number Analysis</a></li>
                <li class="nav-item"><a href="/clue-alphabet.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/clue-alphabet.php") ? "active" : ""; ?>">Alphabet Analysis</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Ciphers</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown03">
                <li class="nav-item"><a href="/caeser.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/caeser.php") ? "active" : ""; ?>">Caeser Cipher</a></li>
                <li class="nav-item"><a href="/null-cipher.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/null-cipher.php") ? "active" : ""; ?>">Null Cipher</a></li>
                <li class="nav-item"><a href="/replace-cipher.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/replace-cipher.php") ? "active" : ""; ?>">Replace Numerate</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Bits</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown04">
                <li class="nav-item"><a href="/mosh.fun.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/mosh.fun.php") ? "active" : ""; ?>">Mosh Fun</a></li>
                <li class="nav-item"><a href="/sillybits.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/sillybits.php") ? "active" : ""; ?>">Silly Bits</a></li>
                <li class="nav-item"><a href="/jumbler.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/jumbler.php") ? "active" : ""; ?>">Jumbler</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>