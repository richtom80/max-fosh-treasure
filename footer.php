<footer class="footer alert-success py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>Tools</h5>
        <div class="list-group">
          <a href="/" class="list-group-item">W3W Combo Search</a>
          <a href="/wordsearch.php" class="list-group-item">Wordsearch</a>
        </div>
      </div>
      <div class="text-center col-md-4">Built by <a href="http://richtom80.co.uk">Richard Thompson</a></div>
      <div class="col-md-4">Built by <a href="http://richtom80.co.uk">Richard Thompson</a></div>
    </div>
  </div>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GOOGLE_ANALYTICS; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', '<?= GOOGLE_ANALYTICS; ?>');
  </script>
</footer>
