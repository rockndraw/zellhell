<?php

    $korpus = $_POST['korpus'];
    $section = $_POST['section'];

    switch ($korpus) {
    case 1:
        switch ($section) {
    		case 1:
        	echo "floor-plan--plan3";
        	break;
    		case 2:
        	echo "floor-plan--plan3";
        	break;
    		case 3:
        	echo "floor-plan--plan3";
        	break;
        	case 4:
        	echo "floor-plan--plan3";
        	break;
    		case 5:
        	echo "floor-plan--plan5";
        	break;
        	case 6:
        	echo "floor-plan--plan1";
        	break;
		}
    break;
    case 2:
        switch ($section) {
    		case 1:
        	echo "floor-plan--plan3";
        	break;
    		case 2:
        	echo "floor-plan--plan3";
        	break;
    		case 3:
        	echo "floor-plan--plan3";
        	break;
        	case 4:
        	echo "floor-plan--plan3";
        	break;
    		case 5:
        	echo "floor-plan--plan5";
        	break;
        	case 6:
        	echo "floor-plan--plan3";
        	break;
        	case 6:
        	echo "floor-plan--plan3";
        	break;
		}
    break;
    case 3:
        switch ($section) {
    		case 1:
        	echo "floor-plan--plan3";
        	break;
    		case 2:
        	echo "floor-plan--plan1";
        	break;
    		case 3:
        	echo "floor-plan--plan3";
        	break;
        	case 4:
        	echo "floor-plan--plan4";
        	break;
    		case 5:
        	echo "floor-plan--plan2";
        	break;
        	case 6:
        	echo "floor-plan--plan2";
        	break;
        	case 6:
        	echo "floor-plan--plan2";
        	break;
		}
    break;
}

?>
