<?php

  $db_host = 'localhost';
  $db_name = 'sibpromstroi';
  $db_username = 'root';
  $db_password = 'root';
  $db_table_to_show = 'zlflats';

  $flat = $_GET['flat'];

  $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
  or die("Could not connect: " . mysql_error());

  mysql_select_db($db_name, $connect_to_db)
  or die("Could not select DB: " . mysql_error());

  mysql_set_charset('utf8');

  $qr_result = mysql_query("select * from " . $db_table_to_show . " where flat='" . $flat ."'")
  or die(mysql_error());

  while($data = mysql_fetch_array($qr_result)){
    $rooms=$data[5];
    $square=$data[6];
    $fixprice=$data[7];
    $auctionprice=$data[8];
    $status=$data[9];
  }

if ($status=='na') {
  echo '
  <div class="flat-info__caption">
    Квартира продана
  </div>
  ';
}
else if ($status=='br') {
  echo '
  <div class="flat-info__price">
    Квартира забронирована
  </div>
  ';
}
else if ($status=='s') {
  echo '
  <div class="flat-info__caption">
    <span id="flat-rooms">'.$rooms.'</span>-комнатная квартира <span id="square">'.$square.'</span> м<sup>2</sup>
  </div>
  <div class="flat-info__price">
    <span id="flat-price">'.$fixprice.'</span> ₽
  </div>
  <div class="flat-info__status">
    <span id="flat-status">Квартира в продаже</span>
  </div>
  ';
}
else if ($status=='a') {
  echo '
  <div class="flat-info__caption">
    <span id="flat-rooms">'.$rooms.'</span>-комнатная квартира <span id="square">'.$square.'</span> м<sup>2</sup>
  </div>
  <div class="flat-info__fixprice">
    <span id="flat-price">'.$fixprice.'</span> ₽
  </div>
  <div class="flat-info__aucprice">
    <span id="flat-price">'.$auctionprice.'</span> ₽
  </div>
  <div class="flat-info__status">
    <span id="flat-status">Квартира на аукционе</span>
  </div>
  ';
}

?>
