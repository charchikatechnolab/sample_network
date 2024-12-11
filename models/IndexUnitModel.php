<?php
    require_once COMMON_PATH . "/Connection.php";
    class IndexUnitModel{
        public $conn;
        public $table;
        public function __construct($table_url)
        {
            $conn = new Connection();
            $this->conn = $conn->connect();
            $this->table = $table_url;
            
        }
        public function __destruct()
        {
            $conn = $this->conn;
            if ($conn->close()) {
            }
        }
        //FETCH URL STRING
        public function get_url_id($qs1,$qs2){
            $conn = $this->conn;
            $query = "select url_list_id from $this->table WHERE url = '". $qs1."' and value='".$qs2."'";
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row['url_list_id'];
            }else{
                return false;
            }        
        }
        // fetch the interlink url Populer converstion
        public function get_interlink($start_id ,$end_id){
            $conn = $this->conn;
            $query = "SELECT * FROM $this->table WHERE url_list_id > $start_id and url_list_id <= $end_id";
            $result = $conn->query($query);
            return $result;
        }
        // get max id
        public function get_max_id(){
            $conn = $this->conn;
            $query = "SELECT max(url_list_id) as max_id FROM $this->table";
           
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row['max_id'];
            }else{
                return false;
            }
        }
        //get top 33 row 
        public function get_top_33(){
            $conn = $this->conn;
            $query = "SELECT * FROM $this->table LIMIT 33";
            $result = $conn->query($query);
            return $result;
        }
        //latest link url
        public function latest_link(){
            $conn = $this->conn;
            $query = "select  *  from $this->table where flag_sitemap = 1 order by url_list_id DESC limit 12";
            $result = $conn->query($query);
            return $result;
        }
        //get sitemap
        // public function get_sitemap($from_url, $to_url){
        public function get_sitemap($sitemap){
            $conn = $this->conn;
            // $query = "SELECT * from  $this->table where url_list_id >= $from_url and url_list_id <= $to_url ;";
            $query = "select * from $this->table where sitemap_name = '$sitemap'";
            $result = $conn->query($query);
            return $result;
        }
        //analysis
        public function analysis($title,$region){
            $conn = $this->conn;
            $query = "INSERT INTO $this->table (title,currentdate,region) values ('$title',Now(),'$region')";
            $result = $conn->query($query);
            return $result;
        }
        //get pairid
        public function get_pairid($pair){
            $conn = $this->conn;
            $query = "select id from pair_master where pair = '$pair'";
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row['id'];
            }else{
                return false;
            }   
        }
        //get faq
        public function get_faq($pairid){
            $conn = $this->conn;
            $query = "SELECT p.id,p.pair, q.question,q.answer,q.pair_value FROM `faq` as f left join question_master q on q.id = f.questionid left join pair_master p on p.id = $pairid";
            $result = $conn->query($query);
            return $result;
        }
        //get invalid click
        public function ad_click($ip,$time_stamp){
            $conn = $this->conn;
            $cur_date = date("Y-m-d");
            $query = "INSERT INTO `invalid_click`(`ip`, `click_count`, `local_time_stamp`,`server_date`) VALUES ('$ip','1','$time_stamp','$cur_date' )";
            $result = $conn->query($query);
            return $result;
        }
        public function get_adclick_today($ip){
            $conn = $this->conn;
            $cur_date = date("Y-m-d");
            $query = "select * from invalid_click where ip = '$ip' and server_date = '$cur_date' and reset_flag = 0 ";
            $result = $conn->query($query);
            return $result;
        }
        public function ip_exist($ip){
            $conn = $this->conn;
            $cur_date = date("Y-m-d");
            $query = "select * from suspected_ip where ip = '$ip' ";
            $result = $conn->query($query);
            if($result->num_rows > 0){
                return 1;
            }else{
                return 0;
            }   
        }
        public function get_suspect($ip){
            $conn = $this->conn;
            $query = "SELECT *   FROM `suspected_ip`  where ip = '$ip' and adshow=0";
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return 1;
            }else{
                return 0;
            }   
            
        }
        public function insert_suspected($ip,$ip_exist){
            $conn = $this->conn;
            $cur_date = date("Y-m-d");
            if($ip_exist == 1){
                $query = "UPDATE `suspected_ip` SET `adshow`= 0 where `ip` = '$ip'";
                $result = $conn->query($query);
            }else{
                $query = "INSERT INTO `suspected_ip`( `ip`,`server_date`,`adshow`) VALUES ('$ip','$cur_date',0)";
                $result = $conn->query($query);
            }
            
            return $result;
        }

    }
?>
