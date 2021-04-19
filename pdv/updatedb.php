<?php

header('Content-Type: application/json');
function update_campaign_status($id, $ap, $st, $ct)
{
    include "db.php";
    $sql = "UPDATE campaigns SET approved = $st, edited_by = '$ct', status = '$ap' WHERE id = $id";
    $run_sql = mysqli_query($conn, $sql);
    return $run_sql;
}
function update_record($id, $event_name, $type, $ct)
{
    include "db.php";
    $sql = "UPDATE campaigns SET e_name = '$event_name', edited_by = '$ct', type = '$type' WHERE id = $id";
    echo $sql;
    $run_sql = mysqli_query($conn, $sql);
    return $run_sql;
}
$aResult = array();

if (!isset($_POST['functionname'])) {
    $aResult['error'] = 'No function name!';
}

if (!isset($_POST['arguments'])) {
    $aResult['error'] = 'No function arguments here!';
}

if (!isset($aResult['error'])) {
    switch ($_POST['functionname']) {
        case 'update_campaign_status':
           if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 3)) {
               $aResult['error'] = 'Error in arguments!';
           } else {
               $aResult['val1'] = intval($_POST['arguments'][0]);
               $aResult['val2'] = strval($_POST['arguments'][1]);
               $aResult['val3'] = intval($_POST['arguments'][2]);
               $aResult['val4'] = strval($_POST['arguments'][3]);
               $aResult['result'] = update_campaign_status(intval($_POST['arguments'][0]), strval($_POST['arguments'][1]), intval($_POST['arguments'][2]), strval($_POST['arguments'][3]));
           }
           break;
           case 'update_record':
                if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 3)) {
                    $aResult['error'] = 'Error in arguments!';
                  } else {
                    $aResult['val1'] = intval($_POST['arguments'][0]);
                    $aResult['val2'] = strval($_POST['arguments'][1]);
                    $aResult['val3'] = strval($_POST['arguments'][2]);
                    $aResult['val4'] = strval($_POST['arguments'][3]);
                    $aResult['result'] = update_record(intval($_POST['arguments'][0]), strval($_POST['arguments'][1]), strval($_POST['arguments'][2]), strval($_POST['arguments'][3]));
                  }
             break;
        //other case for different db update
        default:
           $aResult['error'] = 'Function '.$_POST['functionname'].' not found!';
           break;
    }
}

echo json_encode($aResult);
