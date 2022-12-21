<?php
require "config.php";


alert(555);
    $postid = sec($_POST['postid']);
    $userid = sec($_POST['userid']);

    $insert_data = "DELETE FROM `favorite` WHERE `userid` = '$userid' AND  `postid` = '$postid')";
    $data_check = mysqli_query($db, $insert_data);
    if($data_check){
        $_SESSION['LikeSuccess'] = sec($lang['addfavorite']);
    }


?>     