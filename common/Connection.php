<?php
class Connection
{
  public function connect()
  {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = "allconvert";

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }
}
?>