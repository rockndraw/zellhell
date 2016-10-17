<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

	$db_host = 'localhost';
    $db_name = 'sibpromstroi';
    $db_username = 'root';
    $db_password = 'root';
    $db_table_to_show = 'zlflats';

    $korpus = $_GET['korpus'];
    $section = $_GET['section'];
    $floor = $_GET['floor'];

    switch ($korpus) {
    case 1:
        switch ($section) {
    		case 1:
        	$plan = 'plan3'; $flats = 4; $firstflat=1;
        	break;
    		case 2:
        	$plan = 'plan3'; $flats = 4; $firstflat=69;
        	break;
    		case 3:
        	$plan = 'plan3'; $flats = 4; $firstflat=137;
        	break;
        	case 4:
        	$plan = 'plan3'; $flats = 4; $firstflat=205;
        	break;
    		case 5:
        	$plan = 'plan5'; $flats = 5; $firstflat=273;
        	break;
        	case 6:
        	$plan = 'plan1'; $flats = 8; $firstflat=358;
        	break;
		}
        break;
    case 2:
        switch ($section) {
    		case 1:
        	$plan = 'plan3'; $flats = 4; $firstflat=1;
        	break;
    		case 2:
        	$plan = 'plan3'; $flats = 4; $firstflat=69;
        	break;
    		case 3:
        	$plan = 'plan3'; $flats = 4; $firstflat=137;
        	break;
        	case 4:
        	$plan = 'plan3'; $flats = 4; $firstflat=205;
        	break;
    		case 5:
        	$plan = 'plan5'; $flats = 5; $firstflat=273;
        	break;
        	case 6:
        	$plan = 'plan3'; $flats = 4; $firstflat=358;
        	break;
        	case 6:
        	$plan = 'plan3'; $flats = 4; $firstflat=426;
        	break;
		}
        break;
    case 3:
        switch ($section) {
    		case 1:
        	$plan = 'plan3'; $flats = 4; $firstflat=1;
        	break;
    		case 2:
        	$plan = 'plan1'; $flats = 8; $firstflat=69;
        	break;
    		case 3:
        	$plan = 'plan3'; $flats = 4; $firstflat=205;
        	break;
        	case 4:
        	$plan = 'plan4'; $flats = 5; $firstflat=273;
        	break;
    		case 5:
        	$plan = 'plan2'; $flats = 4; $firstflat=341;
        	break;
        	case 6:
        	$plan = 'plan2'; $flats = 4; $firstflat=409;
        	break;
        	case 6:
        	$plan = 'plan2'; $flats = 4; $firstflat=477;
        	break;
		}
        break;
}



    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysql_error());

    mysql_select_db($db_name, $connect_to_db)
    or die("Could not select DB: " . mysql_error());

    mysql_set_charset('utf8');


if ($plan == 'plan1') {

	$flatsarr = array();

	for ($i=0; $i<$flats; $i++) {

		$qr_result = mysql_query("select * from " . $db_table_to_show . " where flat='" . ($i+$firstflat+($flats*($floor-1))) ."' and building='" . $korpus ."'")
    	or die(mysql_error());

        while($data = mysql_fetch_array($qr_result)){

            $flatclass='';

            if (($data[9]=='na')||($data[0]=='br')) {
                $flatclass =' plan--red';
            }
            else if ($data[9]=='a') {
                $flatclass =' plan--green';
            }
            array_push($flatsarr, $flatclass);

        }


	}

	$svg = '
	<a href="flat.html?flat='.($firstflat+($flats*($floor-1))).'">
		<path class="plan'.$flatsarr[0].'" onmouseover="flatInfoShow('.($firstflat+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M862 443.2H712.3l-.8 151.7-73.1-2.4V288.8h149.4V251h54.6l19.6 12.1z"/></a>
	<a href="flat.html?flat='.($firstflat+1+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[1].'"  onmouseover="flatInfoShow('.($firstflat+1+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M862 406.9h151.4V254.3H960l-22.3 11.5v24.7H862z"/></a>
	<a href="flat.html?flat='.($firstflat+2+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[2].'"  onmouseover="flatInfoShow('.($firstflat+2+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1164.6 407.3h151.7V289.8h-75.8v-25.9l-20.9-12.5h-55z"/></a>
	<a href="flat.html?flat='.($firstflat+3+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[3].'"  onmouseover="flatInfoShow('.($firstflat+3+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1316.3 442.7V262.8l21.6-11.4h54.3v37.4l148.5 1.6v304.7h-74.2l.8-153.2z"/></a>
	<a href="flat.html?flat='.($firstflat+4+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[4].'"  onmouseover="flatInfoShow('.($firstflat+4+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1467.3 441.9l-.8 153.2h-75.1v37.4h-55.3l-19.8-10.8v-26.6h-75.8V441.9z"/></a>
	<a href="flat.html?flat='.($firstflat+5+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[5].'"  onmouseover="flatInfoShow('.($firstflat+5+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1240.5 441.9h-151.9v190.6h55.9l20-11.5v-26.1l76 .2z"/></a>
	<a href="flat.html?flat='.($firstflat+6+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[6].'"  onmouseover="flatInfoShow('.($firstflat+6+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1088.6 632.5V441.9H937.7v153.2h75.4V621l18 11.5z"/></a>
	<a href="flat.html?flat='.($firstflat+7+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[7].'"  onmouseover="flatInfoShow('.($firstflat+7+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M937.7 441.9v153.2H862V621l-18.6 11.5h-54.9v-37.6h-77l.8-151.7z"/></a>

	';
}

else if (($plan == 'plan2')||($plan == 'plan3')) {

	$flatsarr = array();

	for ($i=0; $i<$flats; $i++) {

        $qr_result = mysql_query("select * from " . $db_table_to_show . " where flat='" . ($i+$firstflat+($flats*($floor-1))) ."' and building='" . $korpus ."'")
        or die(mysql_error());

        while($data = mysql_fetch_array($qr_result)){

            $flatclass='';

            if (($data[9]=='na')||($data[0]=='br')) {
                $flatclass =' plan--red';
            }
            else if ($data[9]=='a') {
                $flatclass =' plan--green';
            }
            array_push($flatsarr, $flatclass);

        }


    }

	$svg = '
	<a href="flat.html?flat='.($firstflat+($flats*($floor-1))).'">
		<path class="plan'.$flatsarr[0].'" onmouseover="flatInfoShow('.($firstflat+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1045.2 442.6v221h-63.6l-24.1-13.5v-30.2h-73.3l.4-177.3z"/></a>
	<a href="flat.html?flat='.($firstflat+1+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[1].'"  onmouseover="flatInfoShow('.($firstflat+1+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1203.7 442.6l3 177.3h-75.1v30.2l-21.8 13.5h-64.6v-221z"/></a>
	<a href="flat.html?flat='.($firstflat+2+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[2].'"  onmouseover="flatInfoShow('.($firstflat+2+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M955.7 442.6V223.9h-48.9l-22.6 12.9v28.6l-84.4 1v355.1l84.4-1.6.4-177.3z"/></a>
	<a href="flat.html?flat='.($firstflat+3+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[3].'"  onmouseover="flatInfoShow('.($firstflat+3+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1131.3 223.9v218.7h72.4l3 177.3h84.7V263l-84.7-1.1v-23.8l-26.6-14.2z"/></a>


	';
}

else if ($plan == 'plan4') {

	$flatsarr = array();

	for ($i=0; $i<$flats; $i++) {

        $qr_result = mysql_query("select * from " . $db_table_to_show . " where flat='" . ($i+$firstflat+($flats*($floor-1))) ."' and building='" . $korpus ."'")
        or die(mysql_error());

        while($data = mysql_fetch_array($qr_result)){

            $flatclass='';

            if (($data[9]=='na')||($data[0]=='br')) {
                $flatclass =' plan--red';
            }
            else if ($data[9]=='a') {
                $flatclass =' plan--green';
            }
            array_push($flatsarr, $flatclass);

        }


    }

	$svg = '
	<a href="flat.html?flat='.($firstflat+($flats*($floor-1))).'">
	<path class="plan'.$flatsarr[0].'" onmouseover="flatInfoShow('.($firstflat+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1172.7 272.8h42.3l21.2 10.1v27.6h76.2v314.3h-77.2V467.6h-62.5z"/></a>
		<a href="flat.html?flat='.($firstflat+1+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[1].'"  onmouseover="flatInfoShow('.($firstflat+1+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1093.7 466.7l141.5.9v157.2h-62.5V650l-22.6 13.8h-56.4z"/></a>
		<a href="flat.html?flat='.($firstflat+2+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[2].'"  onmouseover="flatInfoShow('.($firstflat+2+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1093.7 663.8h-55.5l-22-12.4v-26.6h-77.5V466.7h155z"/></a>
		<a href="flat.html?flat='.($firstflat+3+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[3].'"  onmouseover="flatInfoShow('.($firstflat+3+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M938.7 624.8H808V466.7h-27l-12.8-17.9v-59.6h170.5z"/></a>
		<a href="flat.html?flat='.($firstflat+4+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[4].'"  onmouseover="flatInfoShow('.($firstflat+4+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M768.2 389.2v-55.7l13-21.7h26.5v-66.2h208.5v182.1h-77.5v-38.5z"/></a>

	';

}


else if ($plan == 'plan5') {

	$flatsarr = array();

	for ($i=0; $i<$flats; $i++) {

        $qr_result = mysql_query("select * from " . $db_table_to_show . " where flat='" . ($i+$firstflat+($flats*($floor-1))) ."' and building='" . $korpus ."'")
        or die(mysql_error());

        while($data = mysql_fetch_array($qr_result)){

            $flatclass='';

            if (($data[9]=='na')||($data[0]=='br')) {
                $flatclass =' plan--red';
            }
            else if ($data[9]=='a') {
                $flatclass =' plan--green';
            }
            array_push($flatsarr, $flatclass);

        }


    }

	$svg = '
	<a href="flat.html?flat='.($firstflat+($flats*($floor-1))).'">
	<path class="plan'.$flatsarr[0].'" onmouseover="flatInfoShow('.($firstflat+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M915.3 270.4H873l-21.1 10.1v27.6h-76.3v314.2h77.2V465.2h62.5z"/></a>
<a href="flat.html?flat='.($firstflat+1+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[1].'"  onmouseover="flatInfoShow('.($firstflat+1+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M994.3 464.3l-141.5.9v157.1h62.5v25.3l22.6 13.7h56.4z"/></a>
<a href="flat.html?flat='.($firstflat+2+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[2].'"  onmouseover="flatInfoShow('.($firstflat+2+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M994.3 661.3h55.5l22-12.3v-26.7h77.5v-158h-155z"/></a>
<a href="flat.html?flat='.($firstflat+3+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[3].'"  onmouseover="flatInfoShow('.($firstflat+3+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1149.3 622.3H1280v-158h27l12.8-17.9v-59.6h-170.5z"/></a>
<a href="flat.html?flat='.($firstflat+4+($flats*($floor-1))).'">
    <path class="plan'.$flatsarr[4].'"  onmouseover="flatInfoShow('.($firstflat+4+($flats*($floor-1))).')" onmouseleave="flatInfoHide()" d="M1319.8 386.8v-55.7l-13-21.7h-26.5v-66.2h-208.5v182.1h77.5v-38.5z"/></a>

	';
}

mysql_close($connect_to_db);

echo $svg;

?>
