<?php
session_start();
$db = mysqli_connect('localhost' , 'root' , '' , 'bkarhati');
if(!$db){
	echo mysqli_connect_error($db);
	echo "Database Not Connected";
}

$db->query("SET NAMES utf8");
$db->query("SET CHARACTER SET utf8");

// Security Conf
function sec($data){
    global $db;
    $data = mysqli_real_escape_string($db,htmlspecialchars($data));
    return $data;
}

// visitors
function getRows($condition){
    global $db;
    $query = mysqli_query($db , "SELECT * FROM $condition");
    echo mysqli_num_rows($query);
}
 //vistors to web page just view in my database 
$ip = $_SERVER['REMOTE_ADDR'];
$query = mysqli_query($db , "SELECT * FROM `visitors` WHERE `ip` = '$ip'");
if(mysqli_num_rows($query) == 0 ){
    $query = mysqli_query($db , "INSERT INTO `visitors`(`ip`) VALUES('$ip')");
}

if (!isset($_SESSION['lang']))
    $_SESSION['lang'] = "ba";
else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
    if ($_GET['lang'] == "ba")
        $_SESSION['lang'] = "ba";
    else if ($_GET['lang'] == "so")
        $_SESSION['lang'] = "so";
}

require_once "languages/" . $_SESSION['lang'] . ".php";

// User Conf
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

if(isset($_GET['logout'])){
    session_unset();
    unset($_SESSION['userid']);
    session_destroy();
    header('Location: index.php');
    }

?>