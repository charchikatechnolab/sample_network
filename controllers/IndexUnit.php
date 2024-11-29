<?php
include MODELS_PATH . "/IndexUnitModel.php";
class IndexUnit{
    public $status = '';
    public $objIndexUnitModel;
    public $table;
    
    public function __construct($table_url)
    {
        $this->table = $table_url;
        $this->objIndexUnitModel = new IndexUnitModel($table_url);
    }
    //FETCH URL STRING
    public function get_url_id($qs1,$qs2){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->get_url_id($qs1,$qs2);
        return $result;
    }
    // fetch the interlink url
    public function get_interlink($start_id ,$end_id){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->get_interlink($start_id,$end_id);
        return $result;
    }
    // fetch max unitid
    public function get_max_id(){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->get_max_id();
        return $result;
    }
    //get top 33 row 
    public function get_top_33(){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->get_top_33();
        return $result;
    }
    public function latest_link(){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->latest_link();
        return $result;
    }
    //sitemap database
    // public function get_sitemap($from_url, $to_url){
    public function get_sitemap($sitemap){
        $objIndexUnitModel = $this->objIndexUnitModel;
        // $result = $objIndexUnitModel->get_sitemap($from_url, $to_url);
        $result = $objIndexUnitModel->get_sitemap($sitemap);
        return $result;
    }
    public function analysis($title,$region){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->analysis($title,$region);
        return $result;
    }
    public function get_pairid($pair){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->get_pairid($pair);
        return $result;
    }
    public function get_faq($pairid){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->get_faq($pairid);
        return $result;
    }
    public function ad_click($ip,$time_stamp){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->ad_click($ip,$time_stamp);
        return $result;
    }
    public function get_adclick_today($ip){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->get_adclick_today($ip);
        return $result;
    }
    public function ip_exist($ip){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->ip_exist($ip);
        return $result;
    }
    public function get_suspect($ip){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->get_suspect($ip);
        return $result;
    }
    public function insert_suspected($ip,$ip_exist){
        $objIndexUnitModel = $this->objIndexUnitModel;
        $result = $objIndexUnitModel->insert_suspected($ip,$ip_exist);
        return $result;
    }
}
?>