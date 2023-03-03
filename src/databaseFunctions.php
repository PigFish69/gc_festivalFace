<?php
require "../config/database.php";
function db_connect() {
    //local
    //$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    //cPanel ding
    $mysqli = new mysqli(DB_HOSTcPANEL, DB_USERcPANEL, DB_PASSWORDcPANEL, DB_NAMEcPANEL);
    return $mysqli;

//    try {
//        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
//        // set the PDO error mode to exception
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        return $conn;
//    } catch(PDOException $e) {
//        return "Connection failed: " . $e->getMessage();
//
//    }
}
function db_getData($query) {
    $mysqli= db_connect();
    $result =$mysqli->query($query);
    $mysqli->close();
//    $mysqli = null;
    return $result;

}
function db_insertData($query) {    //niet klaar??
    $mysqli= db_connect();
    $result = 0;
    if ($mysqli->query($query) === true) {
        //return row id for succes
        
        $last_id = $mysqli->insert_id;
//        $last_id = $mysqli->lastInsertId();

        $mysqli->close();
//        $mysqli = null;

        return $last_id;
    } else {
        $result = "Error: ".$query."<br>".$mysqli->error;
//        $result = "Error: ".$query."<br>".$mysqli->errorInfo();
        $mysqli->close();
//        $mysqli = null;

        return $result;
    }


}
?>