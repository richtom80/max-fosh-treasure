<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
    <span class="fs-4">Treasure Hunt Tools</span>
  </a>

  <ul class="nav nav-pills">
    <li class="nav-item"><a href="/" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/index.php") ? "active" : ""; ?>">W3W Search (orig Hunt)</a></li>
    <li class="nav-item"><a href="/wordsearch.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/wordsearch.php") ? "active" : ""; ?>">Wordsearch</a></li>
    <li class="nav-item"><a href="/caeser.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == "/caeser.php") ? "active" : ""; ?>">Caeser Cypher</a></li>
  </ul>
</header>
