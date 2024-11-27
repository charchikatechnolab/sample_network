<?php
//session_start();
//SERVER PATH
DEFINE('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/cmto');
DEFINE('SERVER_PATH', $_SERVER['DOCUMENT_ROOT']);
DEFINE('CONTROLLERS_PATH', SERVER_PATH . '/controllers');
DEFINE('MODELS_PATH', SERVER_PATH . '/models');
DEFINE('COMMON_PATH', SERVER_PATH . '/common');
//DEFINE('COMMON_PATH', $_SERVER['DOCUMENT_ROOT'] . '/common');
DEFINE('ENUMS_PATH', SERVER_PATH . '/enums');
DEFINE('ADMIN_SERVER_PATH', SERVER_PATH . '/admin');
DEFINE('ADMIN_VIEW_SERVER_PATH', ADMIN_SERVER_PATH . '/view');
DEFINE('VIEW_SERVER_PATH', SERVER_PATH . '/view');
DEFINE('USER_UPLOADS_SERVER_PATH', SERVER_PATH . '/uploads');
DEFINE('Unit_Path', SERVER_PATH . '/unit');
DEFINE('Content_Path', SERVER_PATH . '/content');
//SITE PATH
$protocol = 'http://';
if (isset($_SERVER['HTTPS'])) {
  $protocol = 'https://';
}
DEFINE('SITE_PATH', $protocol . $_SERVER['HTTP_HOST'] . '/cmto');
DEFINE('SITE_PATH', $protocol . $_SERVER['HTTP_HOST']);
DEFINE('ADMIN_SITE_PATH', SITE_PATH . '/admin');
DEFINE('ADMIN_VIEW_SITE_PATH', ADMIN_SITE_PATH . '/view');
DEFINE('ADMIN_CSS_PATH', ADMIN_SITE_PATH . '/css');
DEFINE('ADMIN_JS_PATH', ADMIN_SITE_PATH . '/js');
DEFINE('VIEW_SITE_PATH', SITE_PATH . '/view');
DEFINE('CSS_PATH', SITE_PATH . '/css');
DEFINE('JS_PATH', SITE_PATH . '/js');
DEFINE('SYSTEM_IMAGES_PATH', SITE_PATH . '/images');
DEFINE('USER_UPLOADS_SITE_PATH', SITE_PATH . '/uploads');
DEFINE('COMMON_SITE_PATH', SITE_PATH . '/common');
//DEFINE('COMMON_SITE_PATH', $_SERVER['HTTP_HOST'] . '/common');
class Common
{
  public function getEscapeString($param, $conn)
  {
    //$conn = $conn->connect();
    foreach ($param as $key => $value) {
      $param[$key] = $conn->real_escape_string($param[$key]);
    }

    return $param;
  }

  public function checkSession(){
    //print_r($_SESSION);
    if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == 'yes'){
      return true;
    }else{
      return false;
    }
  }
}
