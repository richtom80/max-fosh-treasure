# Max Fosh Treasure Hunts

This is a few tools that have been thrown together for hunters interested in both of Max Fosh's treasure hunters, the W3W search was from the original hunt and word search created for the GOLDFosh hunt.

P.S. this has been thrown together and does not use good principles for writing PHP applications

## Installation

Clone the repository to a LAMP server with composer installed.

### Create vars.php

Required to create vars file in path "/includes/var.php" with the following syntax:

```php
<?php
define("W3W_API_KEY", "Your w3w api key here");
define("GOOGLE_ANALYTICS", "Your google analytics here");
?>
```

Run 'composer update' to update all dependencies
