<?php
// Function to get the client IP address
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
include $_SERVER['DOCUMENT_ROOT'] . "/common/CommonFunction.php";
include CONTROLLERS_PATH . "/IndexUnit.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .ins {
        border: 5px solid black;
        background-color: red;
        width: 80%;
        margin-inline: auto;
        height: 200px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <?php
       $suspect_flag = false;
        $obj_index = new IndexUnit("invalid_click");
        $result = $obj_index->get_suspect(get_client_ip());
        if($result == 1){
            $suspect_flag = true ;
        }
    ?>
    <?php
        if( $suspect_flag){
            echo "You Are Suspected";
        }else{
            echo "<div class='ins'>";
            echo "</div>";
        }

    ?>
    
    <input type="hidden" id="ipadress" value="<?= get_client_ip(); ?>">
    <script src="network.js"></script>
</body>

</html>