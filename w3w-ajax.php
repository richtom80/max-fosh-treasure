<?php
require_once("vendor/autoload.php");
include("includes/vars.php");

use What3words\Geocoder\Geocoder;
use What3words\Geocoder\AutoSuggestOption;

$w3w = new Geocoder(W3W_API_KEY);

$result = $w3w->autosuggest($_GET['search'], [AutoSuggestOption::clipToCountry("GB")]);

echo json_encode($result['suggestions']);
?>
