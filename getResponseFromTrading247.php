<?php
  $result = file_get_contents('http://www.qa.trading247.com/RPCWP/getJsonFile/LastOptions.json');
  echo $result;
  exit;
?>
