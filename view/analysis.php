<?php
 $last_sec = 0; $first_sec = 0;$response = "no";
if (isset($_POST)) {
   include $_SERVER['DOCUMENT_ROOT'] . "/common/CommonFunction.php";
   include CONTROLLERS_PATH . "/IndexUnit.php";
   $obj_index = new IndexUnit("invalid_click");
   $json = json_decode($_POST['json'],true);
   $ip =  $json['ip'];
   $timestamp = $json['timestamp'];
   $obj_index->ad_click($ip,$timestamp);

   // logic to suspescted ip adress
  
    $result = $obj_index->get_adclick($ip);
    if($result->num_rows > 0){
    for ($i=0; $i < $result->num_rows ; $i++) { 
        $row = $result->fetch_assoc();
        if($i == 0){
            $first_sec = $row['local_time_stamp']; 
        }
        if($i ==  ($result->num_rows - 1)){
            $last_sec =$row['local_time_stamp']; 
        }
    }
    }
    $diff = $last_sec - $first_sec;
    $sec_diff = $diff/1000;
    if($sec_diff > 5  && $last_sec  > 0){
        $obj_index->insert_suspected($ip);
        $response = "yes";
    }
    echo $response;
    // echo "response : $response , first_sec : $first_sec , last_sec : $last_sec , diff = $sec_diff" ;
}
?>